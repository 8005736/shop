var shop = {
    message(text) {
        $.jGrowl(text);
    }
}
$(document).ready(function() {
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