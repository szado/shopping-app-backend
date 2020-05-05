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

Route::get('/offers/{categoryId?}', 'OffersController@index')->name('offersIndex');

Route::prefix('offer')->group(function() {
    Route::get('search', 'OffersController@search')->name('offerSearch');
    Route::get('{offerId}', 'OffersController@show')->name('offerShow');
    Route::get('create', 'OffersController@create')->name('offerCreate');
    Route::get('edit', 'OffersController@edit')->name('offerEdit');
    Route::post('store', 'OffersController@store')->name('offerStore');
    Route::put('update/{offerId}', 'OffersController@update')->name('offerUpdate');
    Route::delete('destroy/{offerId}', 'OffersController@destroy')->name('offerDestroy');
});

Route::get('categories', 'CategoriesController@index')->name('categoriesIndex');
