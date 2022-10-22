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

Route::prefix('v1')->namespace('App\Http\Controllers\Api')->group(function(){
    Route::name('imovel')->group(function(){

        Route::resource('imovel','ImovelController');
    });
});


Route::name('user')->group(function(){
    Route::resource('user','UserController'); #index
});

Route::name('categoria.')->group(function(){
    Route::get('categoria/{id}/imovel','CategoriaController@imovel');
    Route::resource('categoria','CategoriaController'); #index
});