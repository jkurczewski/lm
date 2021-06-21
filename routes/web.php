<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\ViewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
TODO:
- pobieranie odległości do punktu docelowego
- można dodać mieszkanie do ulubionych
- można użyć zapisanego filtra
- poprawić filtrowanie pokoi
- dodać różnych użytkowników
- dodać opcję banowania
- poprawić dokumentację
- dodać komentarze
*/



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'query']);

Route::post('/zapisane-filtry', [FilterController::class, 'saved'])->name('filters.index')->middleware('auth');
Route::get('/zapisane-filtry', [FilterController::class, 'saved'])->name('filters.index')->middleware('auth');
Route::get('/zapisane-filtry/store', [FilterController::class, 'store'])->name('filters.store')->middleware('auth');
Route::post('/zapisane-filtry/store', [FilterController::class, 'store'])->name('filters.store')->middleware('auth');
Route::post('/zapisane-filtry/destroy/{id}', [FilterController::class, 'destroy'])->name('filters.destroy')->middleware('auth');

Route::view('/ulubione', 'ulubione')->name('ulubione');

Route::view('/ustawienia', 'ustawienia')->name('ustawienia');
Route::post('/ustawienia/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

Route::get('/szukaj', [SearchController::class, 'index'])->name('search.index');

Auth::routes();
