<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\RateCardController;

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


//Route::apiResource('ratecards', RateCardController::class);
Route::apiResource('ratecard/{ratecard}/{day}/{night}/', RateCardController::class, ['parameters'
    => ['{ratecard}' => 'id', '{day}' => 'day', '{night}' => 'night']]);

