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
});

//
Route::get('/landing', function () {
    return view('landing');
});
Route::get('/catagoriesMatched', 'catagoriesController@catagoriesMatched');

Route::resource('profile', 'ProfileController');
Route::resource('section', 'sectionsController');
Route::resource('catagory', 'catagoriesController');
Route::resource('product', 'ProductsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('findSection', 'sectionsController@search');
Route::get('findCatagory', 'catagoriesController@search');
Route::get('returning', 'catagoriesController@returning');