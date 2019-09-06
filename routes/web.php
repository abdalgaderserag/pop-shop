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
    return view('marketplace');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/payment', 'HomeController@payment')->name('payment');
Route::get('/items', 'HomeController@items')->name('items');

Route::resource('profile', 'User\UserController')->except(['store', 'create']);


Route::get('/redirect', 'Walte\WalteController@redirect');

Route::get('/callback', 'Walte\WalteController@callback');