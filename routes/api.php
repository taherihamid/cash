<?php

use App\Http\Controllers\Api\APIController;
use App\MajorUser;
use Illuminate\Http\Request;

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




//Route::prefix('v1.0')->name('v1.')->namespace('Api')->group(function () {
//
//
//
//
////Route::prefix()
//
//
//
//    Route::get('/test', function () {
//
//    });
//
//
//});

Route::prefix('v1')->namespace('Api')->middleware('checkToken')->group(function() {
    Route::post('/getMerchantInvoice', 'APIController@getMerchantInvoice');
});


