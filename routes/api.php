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
Route::group(['prefix' => 'inventories','middleware' => 'check.key'], function () {
    Route::get('/', 'InventoriesController@index');
    Route::post('/', 'InventoriesController@store');
    Route::get('/{inventories}', 'InventoriesController@show');
    Route::put('/{inventories}', 'InventoriesController@update');
    Route::delete('/{inventories}', 'InventoriesController@destroy');
});

Route::group(['prefix' => 'products','middleware' => 'check.key'], function () {
    Route::get('/', 'ProductsController@index');
    Route::post('/', 'ProductsController@store');
    Route::get('/{products}', 'ProductsController@show');
    Route::put('/{products}', 'ProductsController@update');
    Route::delete('/{products}', 'ProductsController@destroy');
    Route::post('/add-variant', 'ProductsController@addVarints');
});

Route::group(['prefix' => 'variants','middleware' => 'check.key'], function () {
    Route::get('/', 'VariantsController@index');
    Route::post('/', 'VariantsController@store');
    Route::get('/{variants}', 'VariantsController@show');
    Route::put('/{variants}', 'VariantsController@update');
    Route::delete('/{variants}', 'VariantsController@destroy');
});

Route::group(['prefix' => 'orders','middleware' => 'check.key'], function () {
    Route::post('/', 'SalesController@store');
});

Route::group(['prefix' => 'sales','middleware' => 'check.key'], function () {
    Route::get('/{id}', 'SalesController@show');
});

