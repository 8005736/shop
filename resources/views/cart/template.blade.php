<div class="cart-item clearfix">
	<div class="cart-item-title">
		{{ $product->name }}
	</div>
	<div class="cart-item-price">
		{{ $product->price }} руб.
	</div>
	<div class="cart-item-count">
		<form action="/cart/change" method="POST">
			{{ csrf_field() }}
			<input type="hidden" name="product_id" value="{{ $product->cart_id }}">
			Кол: <input type="number" name="product_count" style="width: 50px;" value="{{ $product->count }}"/> 
		</form>
	</div>
	
	<form class="cart-item-remove" action="/cart" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{ $product->cart_id }}">
		<input type="submit" class="cart-item-delete" value="X">
	</form>
</div>