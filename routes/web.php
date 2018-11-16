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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/goodboy', 'HomeController@goodboy')->name('goodboy')->middleware('role:formateur');
Route::get('/badboy', 'HomeController@badboy')->name('badboy');

Route::get('/contacts', 'ContactsController@index')->name('contacts');

//events routes
Route::get('/events', 'EventsController@index')->name('events');

Route::get('/events/create', 'EventsController@create')->name('events_create');
Route::post('/events/store', 'EventsController@store')->name('events_store');