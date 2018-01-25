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
Route::get('/', function (){ // стартовая стр
     return view('index');
 });
Route::get('/contact', 'FilmController@ShowReview');
Route::post('/contact-all-form', 'FilmController@addReview');//дописали
Route::get('/contact-all', 'FilmController@ShowReviewAll');
Route::get('/tv-films-all', 'FilmController@ShowTv');
Route::get('/cinema', 'FilmController@ShowCinema');
Route::get('/cinema/{id}', 'FilmController@ShowCinema_id');
Route::get('/{id}', 'FilmController@Show_films_on_channal');