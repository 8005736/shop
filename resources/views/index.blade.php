@extends("layout")

@section("main")
    @each('product/template', $products, 'product')
@stop