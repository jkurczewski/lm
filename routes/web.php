<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\ViewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::view('/ulubione', 'ulubione')->name('ulubione');
Route::view('/zapisane-filtry', 'filtry')->name('filtry');
Route::view('/ustawienia', 'ustawienia')->name('ustawienia');

Auth::routes();
