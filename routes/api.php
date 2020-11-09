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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'Auth\Login\StoreAuthApiController@login');
Route::group(['middleware' => ['auth:api']], function () {
    // store
    Route::post('/store/view', 'API\StoreController@view');
    Route::post('/store/update', 'API\StoreController@update');

    // category
    Route::post('/store/category/add', 'API\CategoryController@create');
    Route::post('/store/category/view', 'API\CategoryController@fetch');
    Route::post('/store/category/update', 'API\CategoryController@update');

    // product


    Route::post('/store/product/create', 'API\ProductController@create');
    Route::post('store/product/view', 'API\ProductController@fetch');
    Route::post('store/product/update', 'API\ProductController@update');

});


 Route::post('/web/store/fetch', 'WEBAPI\StoreController@fetch');
Route::post('/web/store/create/order', 'WEBAPI\OrderController@create');
Route::post('web/store/account/orders', 'WEBAPI\OrderController@fetch');



