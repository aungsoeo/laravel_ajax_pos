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

// Route::get('/product', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
  // category routes
Route::get('/category',['as'=>'admin.category.index' , 'uses'=>"CategoryController@index"]);

Route::get('/category/create',['as'=>'admin.category.create' , 'uses'=>"CategoryController@create"]);

Route::post('/category/store',['as'=>'admin.category.store' , 'uses'=>"CategoryController@store"]);

Route::get('/category/edit/{id}',['as'=>'admin.category.edit' , 'uses'=>"CategoryController@edit"]);

Route::post('/category/update/{id}',['as'=>'admin.category.update' , 'uses'=>"CategoryController@update"]);

Route::get('/category/delete/{id}',['as'=>'admin.category.delete' , 'uses'=>"CategoryController@destroy"]);

// Product routes

Route::get('/product',['as'=>'admin.product.index' , 'uses'=>"ProductController@index"]);

Route::get('/product/create',['as'=>'admin.product.create' , 'uses'=>"ProductController@create"]);

Route::post('/product/store',['as'=>'admin.product.store' , 'uses'=>"ProductController@store"]);

Route::get('/product/edit/{id}',['as'=>'admin.product.edit' , 'uses'=>"PoductController@edit"]);

Route::post('/product/update/{id}',['as'=>'admin.product.update' , 'uses'=>"ProductController@update"]);

Route::get('/product/delete/{id}',['as'=>'admin.product.delete' , 'uses'=>"ProductController@destroy"]);


// Product routes

Route::get('/receiving',['as'=>'admin.receiving.index' , 'uses'=>"ReceivingController@index"]);

Route::get('/receiving/create',['as'=>'admin.receiving.create' , 'uses'=>"receivingController@create"]);

Route::post('/receiving/store',['as'=>'admin.receiving.store' , 'uses'=>"ReceivingController@store"]);

Route::get('/receiving/edit/{id}',['as'=>'admin.receiving.edit' , 'uses'=>"ReceingingController@edit"]);

Route::post('/receiving/update/{id}',['as'=>'admin.receiving.update' , 'uses'=>"ReceivingController@update"]);

Route::get('/receiving/delete/{id}',['as'=>'admin.receiving.delete' , 'uses'=>"ReceivingController@destroy"]);

Route::post('/receiving/get_product',['as'=>'admin.receiving.get_product' , 'uses'=>"ReceivingController@get_product"]);