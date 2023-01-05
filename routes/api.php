<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('V1')->group(function (){
    Route::post('/user/register', [\App\Http\Controllers\RegistrationController::class, 'store'])->middleware('guest');
    Route::get('/user/login', [\App\Http\Controllers\LoginController::class, 'authenticate'])->middleware('guest');

    Route::middleware('auth:sanctum')->group(function (){
        Route::get('/user/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
        Route::get('/get-profile/{user}', [\App\Http\Controllers\UserController::class, 'show']);
        Route::resource('/user', \App\Http\Controllers\UserController::class);
        Route::resource('/pemasukan', \App\Http\Controllers\PemasukanController::class);
        Route::resource('/pengeluaran', \App\Http\Controllers\PengeluaranController::class);
        Route::get('/list-user', [\App\Http\Controllers\RecapController::class, 'all']);
        Route::get('/list-user/{user}', [\App\Http\Controllers\RecapController::class, 'show']);
    });
});
