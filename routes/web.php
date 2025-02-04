<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',"DashboardController@index")->name("Dashboard");

// Route::prefix('Dashboard')->group(function (){
//     Route::get('/',"DashboardController@index");
// });

Route::resource('about', "AboutController");
Route::prefix('about')->group(function () {
    Route::post('search', "AboutController@search")->name("about.search");
});

Route::resource('participantes', "ParticipantesController");
Route::prefix('participantes')->group(function () {
    Route::post('search', "ParticipantesController@search")->name("participantes.search");
});
