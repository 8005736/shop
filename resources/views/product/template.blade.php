<div class="product-item">
	<div class="product-item-image">

	</div>
	<div class="product-item-title">
		{{ $product->name }}
	</div>
	<div class="product-item-price">
		{{ $product->price }} руб.
	</div>
	<form action="/cart" method="POST">
		{{ csrf_field() }}
		<input type="hidden" name="product_id" value="{{ $product->id }}">
		<input type="submit" class="product-item-buy">
	</form>
</div>