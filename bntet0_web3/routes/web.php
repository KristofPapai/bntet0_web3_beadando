<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => [GuestMiddleware::class]], function() {
    Route::get('/login', [MainController::class, 'login']);
    Route::post('/checklogin', [MainController::class, 'checklogin']);
    Route::get('/register', [RegisterController::class,'register']);
    Route::post('/checkregister', [RegisterController::class, 'checkregister']);
});
