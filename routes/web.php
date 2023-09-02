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
Route::group(['prefix' => 'api'], function () {
    Route::post('login', 'AuthController@login');
    Route::group(['middleware' => 'auth:sanctum','cors'], function () {
        Route::get('/clients', 'ClientController@index');
        Route::get('/certificates', 'CertificateController@index');
        Route::get('/requests', 'RequestController@index');
    });
});
