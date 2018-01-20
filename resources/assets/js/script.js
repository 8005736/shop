var shop = {
    message(text) {
        $.jGrowl(text);
    }
}
$(document).ready(function() {
	//Для изменения количества
	$("[name=product_count]").change(function(e) {
		var current = $(this);
		var count = +current.val();
		if (count <= 0) {
			var item = current.closest(".cart-item");
			var input = item.find(".cart-item-delete");
			var form = input.closest("form");
			form.submit();
		}
		
		var form = current.closest("form");
        var data = form.serialize();
		var id = form.find("input[name='product_id']").val();
        var url = form.attr("action");
        $.ajax({
            url: url + "/" + id,
            type: 'POST',
            data: data
        }).always(function(data) {
            var result = JSON.parse(data);
            shop.message(result.text);
        });
	});
	

    $(".product-item form").submit(function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr("action");
        $.ajax({
            url: url,
            type: 'POST',
            data: data
        }).always(function(data) {
            var result = JSON.parse(data);
            shop.message(result.text);
        });
    });
    $(".cart-item form").submit(function(event) {
        event.preventDefault();
        var self = $(this);
        var id = $(this).find("input[name='product_id']").val();
        var data = $(this).serialize();
        var url = $(this).attr("action");
        $.ajax({
            url: url + "/" + id,
            type: 'DELETE',
            data: data
        }).always(function(data) {
            var result = JSON.parse(data);
            shop.message(result.text);
            $(self).parent().remove();
        });
    });
});