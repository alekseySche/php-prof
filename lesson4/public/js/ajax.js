
(function ($) {

    $('#next_button').on('click', function (event) {
        event.preventDefault();
        $('#goods').empty();
        $.ajax({
            url: 'http://localhost:5555/shop/category.php?action=view&id=13&page=1&limit=25&max=25',
        dataType: 'json',
            method: 'POST',
            success: function (goods) {
                let $addToCart = $('<div >').attr('class', 'add_to_cart');
                goods.forEach(function (item) {
                    $addToCart.attr("data-id", item.id);
                    $addToCart.attr("data-name", item.name);
                    $addToCart.attr("data-price", item.price);
                    $addToCart.attr("data-imgurl", item.imgurl);
                });
                $('#goods').append($addToCart);
            }
        });
    })
})(jQuery);