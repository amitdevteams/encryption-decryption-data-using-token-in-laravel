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

Route::get('transactions','TransactionController@index')->name('index');
Route::post('transactions/store','TransactionController@store')->name('transaction.store');
Route::get('transactions/token','TransactionController@matchtoken')->name('token');


Route::get('/transactions/{id}','TransactionController@get_by_id')->name('id_coming');

Route::get('name','TransactionController@setCvvAttribute');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
