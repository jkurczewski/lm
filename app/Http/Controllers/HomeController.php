<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cities = json_decode(DB::table('cities')->get(['slug']), true);

        return view('home')->with(['cities' => $cities, 'data' => session('flats_count')]);
    }

    /**
     * Validate inputs to search for flats and chose between search and save as filter.
     */

    public function query(Request $request)
    {
        switch ($request->input('action')) {
            case "szukaj":
                $request->validate([
                    "localization" => 'required|max:64|min:3',
                    "direction" => 'required|max:64|min:3',
                    "direction_time" => 'required|integer|max:120|min:1',
                    "min_budget" => 'required|lt:max_budget|integer|max:25000|min:100',
                    "max_budget" => 'required|gt:min_budget|integer|max:25000|min:100',
                    "min_space" => 'required|lt:max_budget|integer|max:10000|min:10',
                    "max_space" => 'required|gt:min_space|integer|max:10000|min:10',
                    "rooms" => 'required|integer|max:10|min:1',
                ]);

                $data = [
                    "localization" => $request->input('localization'),
                    "direction" => $request->input('direction'),
                    "direction_time" => $request->input('direction_time'),
                    "min_budget" => $request->input('min_budget'),
                    "max_budget" => $request->input('max_budget'),
                    "min_space" => $request->input('min_space'),
                    "max_space" => $request->input('max_space'),
                    "rooms" => $request->input('rooms'),
                ];

                return redirect()->route('search.index', $data);

            case "zapisz":
                $request->validate([
                    "localization" => 'required|max:64|min:3',
                    "direction" => 'required|max:64|min:3',
                    "direction_time" => 'required|integer|max:120|min:1',
                    "min_budget" => 'required|lt:max_budget|integer|max:25000|min:100',
                    "max_budget" => 'required|gt:min_budget|integer|max:25000|min:100',
                    "min_space" => 'required|lt:max_budget|integer|max:10000|min:10',
                    "max_space" => 'required|gt:min_space|integer|max:10000|min:10',
                    "rooms" => 'required|integer|max:10|min:1',
                    "name" => 'unique:filters|required|max:64|min:3',
                ]);
                return redirect()->route('filters.store', $request->all());
        }
    }
}
