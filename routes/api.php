<?php

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

// Endpoints for productionLine CRUD
Route::resource('productline','ProductLineController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
	]]);

Route::resource('offices','OfficeController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
	]]);

Route::post('sale', 'SaleController@store',['names' => [
	'store' => 'sale.store'
	]]);