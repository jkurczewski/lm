<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    /**
     * Display a listing of the saved filters.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saved()
    {
        return view('filters.saved', [
            'filters' => Filter::where('user_id', '=', auth()->id())->get()
        ]);
    }

    /**
     * Store a newly created filter in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => auth()->id()]);
        $filter = new Filter($request->all());
        $filter->save();

        return redirect()->route('filters.index');
    }
    /**
     * Remove the specified filter from database.
     *
     * @param  \App\Models\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Filter::destroy($id);
            return redirect()->route('filters.index');
        }catch (Exception $e){
            //
        }
    }
}
