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
//    Route::group(['middleware' => 'auth:sanctum','cors'], function () {
        Route::get('/clients', [\App\Http\Controllers\ClientController::class, 'index']);
        Route::get('/certificates', [\App\Http\Controllers\CertificateController::class, 'index']);
        Route::get('/requests', [\App\Http\Controllers\RequestController::class, 'index']);

        Route::post('/client/create', [\App\Http\Controllers\ClientController::class, 'store']);
        Route::post('/certificates/create', [\App\Http\Controllers\CertificateController::class, 'store']);
        Route::post('/requests/create', [\App\Http\Controllers\RequestController::class, 'store']);

        Route::put('/client/update/{id}', [\App\Http\Controllers\ClientController::class, 'update']);
        Route::put('/certificates/update/{id}', [\App\Http\Controllers\CertificateController::class, 'update']);
        Route::put('/requests/update/{id}', [\App\Http\Controllers\RequestController::class, 'update']);

        Route::delete('/client/delete/{id}', [\App\Http\Controllers\ClientController::class, 'destroy']);
        Route::delete('/certificates/delete/{id}', [\App\Http\Controllers\CertificateController::class, 'destroy']);
        Route::delete('/requests/delete/{id}', [\App\Http\Controllers\RequestController::class, 'destroy']);

        Route::put('/requests/update/status/{id}', [\App\Http\Controllers\RequestController::class, 'statusUpdate']);
//    });
});
