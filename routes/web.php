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
Route::post('/transaction/restaurant', [RestaurantController::class, 'store']);
Route::get('/request-pesanan', [RestaurantController::class, 'requestOrder']);
Route::put('/approved-order/{uid}', [RestaurantController::class, 'approvedOrder'])->middleware('auth');
Route::put('/reject-order/{uid}', [RestaurantController::class, 'approvedOrder'])->middleware('auth');
Route::get('/detail-order/{uid}', [RestaurantController::class, 'detailOrder'])->middleware('auth');
Route::post('/report-download', [RestaurantController::class, 'downloadReport'])->middleware('auth');
Route::get('/history', [RestaurantController::class, 'history'])->middleware('auth');

// Route::get('/notif-email', function(){
//     return view('mail.pesanan');
// });
