<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthTokenControoler;
use App\Http\Controllers\GEtTables;
use App\Http\Controllers\hock2;
use App\Http\Controllers\pointOfSaleController;

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

Route::get('/webhock' , [AuthTokenControoler::class , 'getTokenWithCode']);
Route::get('/webhock2' , [hock2::class , 'hock2']);
Route::get('point-of-sale' , [pointOfSaleController::class , 'index']);
Route::get('get-products' , [pointOfSaleController::class , 'Products']);
Route::get('get-products-tables' , [GEtTables::class , 'products']);
Route::get('get-pos-products-tables' , [GEtTables::class , 'PosProducts']);
