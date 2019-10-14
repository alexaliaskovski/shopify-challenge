<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::post('/photo', 'ImageController@addImage');
Route::post('/product', 'ProductController@addProduct');

Route::delete('/photo/id/{image_id}', 'ImageController@deleteImage');
Route::delete('/product/id/{product_id}', 'ProductController@deleteProduct');


