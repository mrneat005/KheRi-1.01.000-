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
Route::get('/catagoriesMatched', 'catagoriesController@catagoriesMatched')->middleware('auth');

Route::resource('profile', 'ProfileController')->middleware('auth');
Route::resource('section', 'sectionsController')->middleware('auth');
Route::resource('catagory', 'catagoriesController')->middleware('auth');
Route::resource('product', 'ProductsController')->middleware('auth');
Route::resource('cart', 'cartController')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('findSection', 'sectionsController@search');
Route::get('findCatagory', 'catagoriesController@search');
Route::get('returning', 'catagoriesController@returning');


