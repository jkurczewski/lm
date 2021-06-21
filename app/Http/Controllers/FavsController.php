<?php

namespace App\Http\Controllers;

use App\Models\Favs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FavsController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => auth()->id()]);
        $fav = new Favs($request->all());
        $fav->save();

        return redirect()->route('favs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Favs::destroy($id);
            return redirect()->route('favs.index');
        }catch (Exception $e){
            //
        }
    }
}
