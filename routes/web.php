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


Route::get('/', function () {
    return view('welcome');
});

Route::resource('residents', 'App\Http\Controllers\ResidentController');
Route::resource('apartments', 'App\Http\Controllers\ApartmentController');
Route::resource('payments', 'App\Http\Controllers\PaymentController');
