<?php

namespace App\Http\Controllers;

use App\Models\Favs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FavsController extends Controller
{
    /**
     * Display a listing of the favourite flats.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saved()
    {
        return view('favs.saved', [
            'favs' => Favs::where('user_id', '=', auth()->id())->get(),
            'rand' => Str::random(5)
        ]);
    }

    /**
     * Store a newly created favourite flat in database.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => auth()->id()]);
        $fav = new Favs($request->all());
        $check = $fav->save();

        $arr = array('msg' => 'Coś poszło nie tak... Spróbuj jeszcze raz', 'status' => false);
        if ($check) {
            $arr = array('msg' => 'Dodałeś mieszkanie do ulubionych!', 'status' => true);
        }

        return $arr;
    }

    /**
     * Remove the specified favourite flat.
     *
     * @param \App\Models\Filter $filter
     */
    public function destroy($id)
    {
        Favs::destroy($id);
        return redirect()->route('favs.index');
    }

    /**
     * Remove all favourites flats.
     *
     */
    public function destroyAll()
    {
        $ids = DB::table('favs')
            ->where('user_id', '=', auth()->id())
            ->get();

        foreach ($ids as $id) {
            Favs::destroy($id->id);
        }

        return redirect()->route('favs.index');
    }
}
