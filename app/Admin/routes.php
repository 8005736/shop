<?php

Route::get('', ['as' => 'admin.dashboard', function () {
	$content = 'Просто текстовая';
	return AdminSection::view($content, 'Дашборд');
}]);