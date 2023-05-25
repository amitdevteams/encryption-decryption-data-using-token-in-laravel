<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('token/{id}', [App\Http\Controllers\ApiKeyController::class, 'alltoken']);

Route::get('token', [App\Http\Controllers\ApiKeyController::class, 'index'])->name('tokenwithslug');
Route::post('webaccess/store/token', [App\Http\Controllers\ApiKeyController::class, 'api_store'])->name('store.apikeys');
Route::get('user_vi_token_id_new/{get_token_id}/{user_getting_id}', [App\Http\Controllers\ApiKeyController::class, 'getting_token_by_user_new']);
Route::get('webaccess/edittoken/{id}', [App\Http\Controllers\ApiKeyController::class, 'edit_token']);
Route::get('webaccess/encrypt_decrypt_new_token/{get_token_id}/{user_getting_id}', [App\Http\Controllers\ApiKeyController::class, 'getting_token_new_token']);


