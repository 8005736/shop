<?php

Route::get('/',	'ProductController@index');
Route::get('/text', function(){
	return view('text')->with("pagetitle", "Текстовая");
});
Route::get('/cart',	'CartController@index');
Route::post('/cart', 'CartController@store');
Route::post('/cart/change/{id}', 'CartController@change');
Route::delete('/cart/{id}', 'CartController@destroy');
Route::resources([
    'products' => 'ProductController',
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
