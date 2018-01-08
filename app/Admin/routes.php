<?php
use App\Products;

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Define your dashboard here.';
	return AdminSection::view($content, 'Dashboard');
}]);

Route::get('products', ['as' => 'admin.products', function () {
    return AdminSection::view(Products::all(), 'Товары');

}]);
