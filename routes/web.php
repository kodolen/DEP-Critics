<?php

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

//Route::get('', function () {
//    echo"oke";
//});

Route::get('/teams', 'TeamsController@showTeams');
Route::get('/teams/{id}', 'TeamsController@showTeam');
Route::get('/teams/{id}/{player_id}', 'PlayerController@showPlayer');
//Route::post('critics', 'CriticController@store');

Route::get('/player/{id}', 'PostsController@show')->name('posts.show');

Route::resource('/critics', 'CriticController');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
