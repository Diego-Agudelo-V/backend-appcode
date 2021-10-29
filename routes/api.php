<?php

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

Route::get('/registros','App\Http\Controllers\registroController@index');

Route::get('/registros/{id}','App\Http\Controllers\registroController@show');

Route::get('/registros/search/{id}','App\Http\Controllers\registroController@search');

Route::post('/registros','App\Http\Controllers\registroController@store');

Route::put('/registros/{id}','App\Http\Controllers\registroController@update');

Route::delete('/registros/{id}','App\Http\Controllers\registroController@destroy');