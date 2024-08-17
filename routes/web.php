<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RestaurantController;
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

Route::get('/login', [AuthController::class, 'index'])->middleware('guest');
Route::post('/auth', [AuthController::class, 'authentication']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::resource('/product', ProdukController::class);
Route::get('/', function () {
    return view('home.index');
});
Route::get('/properties', function(){
    return view('properties.index');
});

Route::get('/contact', function(){
    return view('contact.index');
});

Route::get('/restaurant', [RestaurantController::class, 'index']);
