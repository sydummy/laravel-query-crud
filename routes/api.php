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

/**
 * Show All Items
*/
Route::get('items', 'ItemsController@showItems');

/**
 * Show Single Item
*/
Route::get('item/{id}', 'ItemsController@showItem');

/**
 * Show Single Item By Name
*/
Route::get('item/name/{name}', 'ItemsController@showItemByName');

/**
 * Insert Item
*/
Route::post('item', 'ItemsController@insertItem');

/**
 * Delete Item
*/
Route::delete('item/{id}', 'ItemsController@deleteItem');

/**
 * Update Item
*/
Route::put('item', 'ItemsController@updateItem');
