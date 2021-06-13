<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Goutte\Client;
use Illuminate\Support\Str;
use Kolirt\Openstreetmap\Facade\Openstreetmap;
use Spatie\Geocoder\Facades\Geocoder;

class SearchController extends Controller
{

    private $flats = array();

    public function index(Request $request)
    {
        $cities = json_decode(DB::table('cities')->get(['slug']), true);

        $this->search(
            $request->input('localization'),
            $request->input('direction'),
            $request->input('dir_time'),
            $request->input('min_budget'),
            $request->input('max_budget'),
            $request->input('min_space'),
            $request->input('max_space'),
            $request->input('rooms'),
        );

        $count_flats = count($this->flats);

        return view('search.search')->with(['cities' => $cities, 'flats' => $count_flats, 'data' => $this->flats]);
    }

    public function search($localization, $direction, $dir_time, $min_b, $max_b, $min_s, $max_s, $rooms){
        ini_set('max_execution_time', '300');
        $data = array();
        $client = new Client();
        $url = $this->createURL($localization, $min_b, $max_b, $min_s, $max_s, $rooms);

        $crawler = $client->request('GET', $url);

        $pagesNumber = ($this->HelperPaginationExist($crawler));

        for ($i=1; $i<=$pagesNumber; $i++){
            $currentUrl = $url . '&page=' . $i;
            $this->HelperGetFlats($currentUrl, $client, $max_b, $direction, $dir_time);
        }
    }

    //    OTODOM QUERY STRING SCHEMA
//    HEAD->https://www.otodom.pl/wynajem/mieszkanie/
//    CITY->gorzow-wielkopolski/
//    QUERY_STARTS->?
//    QUERY_KEY->search or &search (if second and more)
//    QUERIES:
//        MIN_BUDGET->[filter_float_price%3Afrom]=/VALUE/
//        MAX_BUDGET->[filter_float_price%3Ato]=/VALUE/
//        MIN_SPACE->[filter_float_m%3Afrom]=/VALUE/
//        MAX_SPACE->[filter_float_m%3Ato]=/VALUE/
//        ROOMS:
//            [filter_enum_rooms_num][0]=3
//            [filter_enum_rooms_num][1]=2
//            [filter_enum_rooms_num][2]=1
//    PAGING->&page=2,3,4,5,...
    public function createURL($localization, $min_b, $max_b, $min_s, $max_s, $rooms): string
    {
        $head = 'https://www.otodom.pl/wynajem/mieszkanie/';
        $city = DB::table('cities')
                    ->where('slug', '=', $localization)
                    ->pluck('name');
        $city = $city[0] . '/?';
        $query_key = 'search';
        $and = '&';
        $min_budget = '[filter_float_price%3Afrom]=' . $min_b;
        $max_budget = '[filter_float_price%3Ato]=' . $max_b;
        $min_space = '[filter_float_m%3Afrom]=' . $min_s;
        $max_space = '[filter_float_m%3Ato]=' . $max_s;
        $min_rooms = array();

        $index=0;
        //rooms append
        while ($rooms > 0){
            array_push($min_rooms,'[filter_enum_rooms_num]['.$index.']='.$rooms);
            $index++;
            $rooms--;
        }

        $url =
            $head.
            $city.
            $query_key.
            $min_budget.
            $and.$query_key.
            $max_budget.
            $and.$query_key.
            $min_space.
            $and.$query_key.
            $max_space;

        foreach ($min_rooms as $room){
            $url = $url.$and.$query_key.$room;
        }

        return $url;
    }

    public function HelperPaginationExist($crawler)
    {
        if( $crawler->filter('ul.pager > li')->eq(4)->count() )
        {
            return $crawler->filter('ul.pager > li')->eq(4)->text();
        }else{
            return 1;
        }
    }

    public function HelperGetFlats($url, $client, $max_b, $direction, $dir_time){
        $crawler = $client->request('GET', $url);

        $crawler->filter('article')->each(
            function ($node, $i) use ($client, $max_b, $direction, $dir_time)
            {
                if ($i >= 3){
                    $flat_url = $node->filter('h3 > a')->attr('href');
                    $flat_body = $client->request('GET', $flat_url);

                    $localization = $flat_body->filter('div[aria-label="Adres"] > a')->text();

                    //if ($dir_time = $this->HelperMap($localization, $direction, $dir_time) === NULL) return;

                    $photo = $flat_body->filter('picture > img')->attr('src');

                    $price = $flat_body->filter('strong[aria-label="Cena"]')->text();
                    $price_int = (float) filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT);

                    if( $flat_body->filter('div[aria-label="Czynsz - dodatkowo"]')->filter('div.css-1ytkscc')->count() )
                    {
                        $rent = $flat_body->filter('div[aria-label="Czynsz - dodatkowo"]')->filter('div.css-1ytkscc')->text();
                        $rent_int = (float) filter_var($rent, FILTER_SANITIZE_NUMBER_FLOAT);

                        $full_price = $price_int + $rent_int;

                        if ($full_price > $max_b) return;

                        $full_price .= ' zł/msc';
                    }else{
                        $full_price = $price.'/msc + czynsz ';
                    }


                    if( $flat_body->filter('div[aria-label="Powierzchnia"]')->filter('div.css-1ytkscc')->count() )
                    {
                        $space = $flat_body->filter('div[aria-label="Powierzchnia"]')->filter('div.css-1ytkscc')->text();
                    }else{
                        $space = 'brak informacji';
                    }

                    if( $flat_body->filter('div[aria-label="Liczba pokoi"]')->filter('div.css-1ytkscc')->count() )
                    {
                        $rooms = $flat_body->filter('div[aria-label="Liczba pokoi"]')->filter('div.css-1ytkscc')->text();
                    }else{
                        $rooms = 'brak informacji';
                    }

                    return array_push( $this->flats, [
                        'url' => $flat_url,
                        'localization' => $localization,
                        'price' => $full_price,
                        'space' => $space,
                        'rooms' => $rooms,
                        'photo' => $photo,
                        'rand' => Str::random(5) ,
                        'dir_time' => $dir_time,
                    ]);
                }

            });
    }

    public function HelperMap($localization, $direction, $dir_time){
        //$loc_info = Geocoder::getCoordinatesForAddress($localization);

       // print_r($loc_info, $dir_info);
    }
}
