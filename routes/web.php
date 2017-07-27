<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth.checkrole'], function (){
    Route::group(['prefix'=>'categories'], function (){
        Route::get('', ['as'=>'categories.index','uses'=>'CategoriesController@index']);
        Route::get('create', ['as'=>'categories.create','uses'=>'CategoriesController@create']);
        Route::post('create', ['as'=>'categories.store','uses'=>'CategoriesController@store']);
        Route::get('edit/{id}', ['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
        Route::put('update/{id}', ['as'=>'categories.update','uses'=>'CategoriesController@update']);
    });

    Route::group(['prefix'=>'products'], function (){
        Route::get('', ['as'=>'products.index','uses'=>'ProductsController@index']);
        Route::get('create', ['as'=>'products.create','uses'=>'ProductsController@create']);
        Route::post('create', ['as'=>'products.store','uses'=>'ProductsController@store']);
        Route::get('edit/{id}', ['as'=>'products.edit','uses'=>'ProductsController@edit']);
        Route::put('update/{id}', ['as'=>'products.update','uses'=>'ProductsController@update']);
        Route::get('destroy/{id}', ['as'=>'products.destroy','uses'=>'ProductsController@Destroy']);

    });
});







