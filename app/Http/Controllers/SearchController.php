<?php

namespace App\Http\Controllers;

use App\Events\FlatsCounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Goutte\Client;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    /**
     * Array which store found flats during the crawl process.
     */
    public $flats = array();

    /**
     * Show the search results.
     */
    public function index(Request $request)
    {
        $cities = json_decode(DB::table('cities')->get(['slug']), true);

        session(['flats_count' => 0]);

        $this->search(
            $request->input('localization'),
            $request->input('direction'),
            $request->input('direction_time'),
            $request->input('min_budget'),
            $request->input('max_budget'),
            $request->input('min_space'),
            $request->input('max_space'),
            $request->input('rooms'),
        );

        $count_flats = count($this->flats);

        $req = [
            'localization' => $request->input('localization'),
            'direction' => $request->input('direction'),
            'direction_time' => $request->input('direction_time'),
            'min_budget' => $request->input('min_budget'),
            'max_budget' => $request->input('max_budget'),
            'min_space' => $request->input('min_space'),
            'max_space' => $request->input('max_space'),
            'rooms' => $request->input('rooms')
        ];

        return view('search.search')->with(['cities' => $cities, 'flats' => $count_flats, 'data' => $this->flats, 'req' => $req]);
    }

    /**
     * Create crawler object to examine flats listing using pregenerated url.
     */
    public function search($localization, $direction, $dir_time, $min_b, $max_b, $min_s, $max_s, $rooms)
    {
        ini_set('max_execution_time', '300');
        $client = new Client();
        $url = $this->createURL($localization, $min_b, $max_b, $min_s, $max_s, $rooms);
        $crawler = $client->request('GET', $url);

        $pagesNumber = ($this->HelperPaginationExist($crawler));

        for ($i = 1; $i <= $pagesNumber; $i++) {
            $currentUrl = $url . '&page=' . $i;
            $this->HelperGetFlats($currentUrl, $client, $max_b, $direction, $dir_time, $client->getHistory()->current()->getUri());
        }
    }

    /**
     * Create Otodom URL from passed inputs and saved url parts
     */
    public function createURL($localization, $min_b, $max_b, $min_s, $max_s, $rooms): string
    {
        $head = 'https://www.otodom.pl/pl/oferty/wynajem/mieszkanie/';
        $city = DB::table('cities')
            ->where('slug', '=', $localization)
            ->pluck('name');
        $city = $city[0] . '?';
        $query_key = 'search';
        $and = '&';
        $min_budget = 'priceMin=' . $min_b;
        $max_budget = 'priceMax=' . $max_b;
        $min_space = 'areaMin=' . $min_s;
        $max_space = 'areaMax=' . $max_s;
        $min_rooms = array();

        $values = [1 => 'ONE', 2 => 'TWO', 3 => 'THREE', 4 => 'FOUR', 5 => 'FIVE', 6 => 'SIX', 7 => 'SEVEN', 8 => 'EIGHT', 9 => 'NINE', 10 => 'TEN'];

        //rooms append
        $rooms_array = 'roomsNumber=[';
        for (; $rooms<=10; $rooms++){
            $rooms_array .= $values[$rooms];
            if ($rooms < 10){
                $rooms_array .= '%2C';
            }
        }
        $rooms_array .= ']';



        $url =
            $head .
            $city .
            $min_budget .
            $and .
            $max_budget .
            $and .
            $min_space .
            $and .
            $max_space .
            $and .
            $rooms_array;

        return $url;
    }

    /**
     * Get from crawled site number of existing pages.
     */
    public function HelperPaginationExist($crawler)
    {
        return intval(ceil($crawler->filter('span.css-klxieh')->text()/24));
    }

    /**
     * Search in each found flats for specific information, then push array with flat's info to array $flats.
     */
    public function HelperGetFlats($url, $client, $max_b, $direction, $dir_time, $uri)
    {

        $crawler = $client->request('GET', $url);
        $crawler->filter('div[role="main"]')->filter('ul')->filter('li.css-x9km8e')->each(
            function ($node, $index) use ($client, $max_b, $direction, $dir_time) {

                if ($index < 2) return;

                if ($node->filter('a')->count()) {
                    $flat_url = 'https://www.otodom.pl' . $node->filter('a')->attr('href');
                } else {
                    return;
                }

                //get flat's data
                $flat_body = $client->request('GET', $flat_url);

                if ($flat_body->filter('div[aria-label="Adres"] > a')->count()) {
                    $localization = $flat_body->filter('div[aria-label="Adres"] > a')->text();
                } else {
                    return;
                }

                $time = $this->HelperMap($localization, $direction) ;
                if ($time > intval($dir_time)){
                    return;
                }elseif ($time == null){
                    $time = 'Brak danych';
                }else{
                    $time .= 'min';
                }



                if ($flat_body->filter('picture > img')->count()) {
                    $photo = $flat_body->filter('picture > img')->attr('src');
                } else {
                    $photo = 'https://via.placeholder.com/400x400?text=NIe+Znaleziono+Zdj%C4%99cia';
                }

                if ($flat_body->filter('div[aria-label="Powierzchnia"]')->filter('div.css-1ytkscc')->count()) {
                    $space = $flat_body->filter('div[aria-label="Powierzchnia"]')->filter('div.css-1ytkscc')->text();
                } else {
                    $space = 'brak informacji';
                }

                if ($flat_body->filter('div[aria-label="Liczba pokoi"]')->filter('div.css-1ytkscc')->count()) {
                    $rooms = $flat_body->filter('div[aria-label="Liczba pokoi"]')->filter('div.css-1ytkscc')->text();
                } else {
                    $rooms = 'brak informacji';
                }

                //fire event to flats counter in search modal
                event(new FlatsCounter(count($this->flats)));

                $price = $flat_body->filter('strong[aria-label="Cena"]')->text();
                $price_int = (float)filter_var($price, FILTER_SANITIZE_NUMBER_FLOAT);
                $isRent = $flat_body->filter('div[aria-label="Czynsz - dodatkowo"]')->filter('div.css-1ytkscc')->count();

                //order flats dividing them by these with rent and without;
                //flats with summed montly price + rent goes at the beginning of array
                //flats without rent goes at the end of array
                if ($isRent) {
                    $rent = $flat_body->filter('div[aria-label="Czynsz - dodatkowo"]')->filter('div.css-1ytkscc')->text();
                    $rent_int = (float)filter_var($rent, FILTER_SANITIZE_NUMBER_FLOAT);

                    $full_price = $price_int + $rent_int;

                    if ($full_price > $max_b) return;

                    $full_price .= ' zł/msc';

                    return array_unshift($this->flats, [
                        'url' => $flat_url,
                        'localization' => $localization,
                        'price' => $full_price,
                        'space' => $space,
                        'rooms' => $rooms,
                        'photo' => $photo,
                        'rand' => Str::random(5),
                        'dir_time' => $time,
                    ]);

                } else {
                    $full_price = $price . '/msc + czynsz ';

                    return array_push($this->flats, [
                        'url' => $flat_url,
                        'localization' => $localization,
                        'price' => $full_price,
                        'space' => $space,
                        'rooms' => $rooms,
                        'photo' => $photo,
                        'rand' => Str::random(5),
                        'dir_time' => $time,
                    ]);

                }
            });
    }

    /**
     * Check for estimated route duration to check if flat is an near as user wants to.
     * Function is using Google Maps API
     */
    public function HelperMap($localization, $direction)
    {
        $response = \GoogleMaps::load('directions')
            ->setParam ([
                'origin' =>$localization,
                'destination' => $direction,
                'mode' => 'transit',
                'departure_time' => strtotime('today 8am'),
                'transit_routing_preference' => 'less_walking',

            ])
            ->get();

        $json = json_decode($response);

        if ($json->routes[0]->legs[0]->duration->value ?? null){
            return ceil($json->routes[0]->legs[0]->duration->value/60);
        }else{
            return null;
        }





    }
}
