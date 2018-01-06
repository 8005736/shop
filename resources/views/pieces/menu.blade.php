@php
Menu::macro('main', function () {
    return Menu::new()
        ->action('ProductController@index', 'Товары')
        ->link('/text', 'Текстовая')
        ->action('CartController@index', 'Корзина')
        ->setActiveFromRequest();
});
@endphp
<div class="page-menu">
	{!! Menu::main() !!}
</div>