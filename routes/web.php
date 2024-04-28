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
    // $payments = App\Models\Payment::where('reference', '!=', '0000')->where('created_at', '>', '2021-12-25')->get();
    // return $payments;


    $apartments = App\Models\Apartment::with('payments')->get();
    return view('post', ['apartments'=>$apartments]);

    return view('welcome');
});

Route::resource('residents', 'App\Http\Controllers\ResidentController');
Route::resource('apartments', 'App\Http\Controllers\ApartmentController');
Route::resource('payments', 'App\Http\Controllers\PaymentController');
