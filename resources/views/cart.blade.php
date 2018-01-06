@extends("layout")
@section("main")
	@each('cart/template', $products, 'product')
@stop