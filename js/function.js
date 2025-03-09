function addToCart(product_id, quantity) {
    var ajax_url = "ajax.php";
    var formData = {
        action: 'add_to_cart',
        product_id: product_id,
        quantity: quantity,
    };
    $.ajax({
        type: 'POST',
        url: ajax_url,
        data: formData,
        success: function (data) {
            if (data != "") {
                if (data == "Not Login") {
                    alert("Please login to add product in cart");
                } else {
                    $('.header-cart-wrapitem').append(data);
                    alert("Product has been added to cart");
                }
            } else {
                alert("Product has not been added to cart");
            }
        }
    });
}