<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\LoggedInMiddleware;

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

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => [LoggedInMiddleware::class]], function() {
        Route::get('/', [MainController::class, 'main']);
        Route::get('/main', [MainController::class, 'main']);
        Route::post('/main', [MainController::class, 'main']);
        Route::get('/logout', [MainController::class, 'logout']);
        Route::get('/racecalendar', [MainController::class, 'racecalendar'])->name('racecalendar');
        Route::get('/fileupload', [MainController::class, 'fileupload'])->name('fileupload');
        Route::get('/filegeneration', [MainController::class, 'filegeneration'])->name('filegeneration');

        
        
    });

    Route::group(['middleware' => [GuestMiddleware::class]], function() {
        Route::get('/login', [MainController::class, 'login']);
        //Route::get('/racecalendar', [MainController::class, 'racecalendar'])->name('racecalendar');
        Route::get('/login', function () {

            $petani = DB::table('races')->get();
        
            return view('login', ['petani' => $petani]);
        });
        Route::post('/checklogin', [MainController::class, 'checklogin']);


    });
});
