<?php

Route::get('/',	'ProductController@index');
Route::get('/text', function(){
	return view('text')->with("pagetitle", "Текстовая");
});
Route::get('/cart',	'CartController@index');
Route::post('/cart', 'CartController@store');
Route::delete('/cart/{id}', 'CartController@destroy');
Route::resources([
    'products' => 'ProductController',
]);
