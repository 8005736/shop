<div class="cart-item clearfix">
	<div class="cart-item-title">
		{{ $product->name }}
	</div>
	<div class="cart-item-price">
		{{ $product->price }} руб.
	</div>
	<form action="/cart" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{ $product->cart_id }}">
		<input type="submit" class="cart-item-delete" value="X">
	</form>
</div>