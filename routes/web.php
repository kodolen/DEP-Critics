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


Route::get('/teams', 'TeamsController@showTeams');
Route::get('/teams/{id}', 'TeamsController@showTeam');
Route::get('/teams/{id}/{player_id}', 'PlayerController@showPlayer');

Route::get('/player/{id}', 'PostsController@show')->name('posts.show');

Route::resource('/critics', 'CriticController');
Route::resource('/ratings', 'RatingController');
Route::resource('/users', 'UserController');


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
