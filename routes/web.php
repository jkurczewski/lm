<?php

use App\Http\Controllers\FavsController;
use Illuminate\Support\Facades\Route;
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

- dodać komentarze
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'query']);

Route::post('/zapisane-filtry', [FilterController::class, 'saved'])->name('filters.index')->middleware('auth');
Route::get('/zapisane-filtry', [FilterController::class, 'saved'])->name('filters.index')->middleware('auth');
Route::get('/zapisane-filtry/store', [FilterController::class, 'store'])->name('filters.store')->middleware('auth');
Route::post('/zapisane-filtry/store', [FilterController::class, 'store'])->name('filters.store')->middleware('auth');
Route::post('/zapisane-filtry/destroy/{id}', [FilterController::class, 'destroy'])->name('filters.destroy')->middleware('auth');

Route::post('/ulubione', [FavsController::class, 'saved'])->name('favs.index')->middleware('auth');
Route::get('/ulubione', [FavsController::class, 'saved'])->name('favs.index')->middleware('auth');
Route::get('/ulubione/store', [FavsController::class, 'store'])->name('favs.store')->middleware('auth');
Route::post('/ulubione/store', [FavsController::class, 'store'])->name('favs.store')->middleware('auth');
Route::post('/ulubione/destroy/{id}', [FavsController::class, 'destroy'])->name('favs.destroy')->middleware('auth');
Route::post('/ulubione/destroyAll', [FavsController::class, 'destroyAll'])->name('favs.destroyAll')->middleware('auth');

Route::view('/ustawienia', 'ustawienia')->name('ustawienia');
Route::post('/ustawienia/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');

Route::get('/szukaj', [SearchController::class, 'index'])->name('search.index');

Auth::routes();
