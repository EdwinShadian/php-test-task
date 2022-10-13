<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Tender',
], function () {
    Route::get('/tender', 'TenderController@index');
    Route::get('/tender/{id}', 'TenderController@show');
    Route::post('/tender', 'TenderController@store');
    Route::put('/tender/{id}', 'TenderController@update');
    Route::delete('/tender/{id}', 'TenderController@destroy');
});
