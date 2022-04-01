<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::prefix('ticket')->group(function () {
    Route::get('/', 'App\Http\Controllers\Api\TicketAereoController@index');
    Route::post('/store', 'App\Http\Controllers\Api\TicketAereoController@store');
    Route::post('/{id}', 'App\Http\Controllers\Api\TicketAereoController@update');
    Route::get('/getTicker', 'App\Http\Controllers\Api\TicketAereoController@getTicker');
});

Route::prefix('person')->group(function () {
    Route::get('/', 'App\Http\Controllers\Api\ClientController@index');

    Route::post('/{id}', 'App\Http\Controllers\Api\ClientController@update');


});
