<?php

use App\Http\Controllers\PingController;
use App\Http\Controllers\PingReq;
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

Route::get('/', function () {
    return view('home');
});

// Route::resource('/ping', PingController::class);

Route::post('/store', [PingController::class, 'store']);
Route::get('/ping', [PingController::class, 'index']);
Route::get('/list', [PingController::class, 'list']);
