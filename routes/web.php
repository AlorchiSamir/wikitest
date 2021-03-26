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

Route::get('/', [\App\Http\Controllers\ProviderController::class, 'index']); 
Route::get('/ratecard/{provider}', [\App\Http\Controllers\RateCardController::class, 'index']); 
Route::post('/ratecard/ajax/list', [\App\Http\Controllers\RateCardController::class, 'Ajaxlist']);
Route::post('/ratecard/submit', [\App\Http\Controllers\RateCardController::class, 'submit']);  


