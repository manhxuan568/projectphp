$(document).ready(function () {
    function filter_data() {
        var price = $(".filter.price:checked").val();
        var brand = $(".filter.brand:checked").val();
        var productCat = $(".filter.productCat:checked").val();
        var list = {};
        if (Boolean(price)) {
            list['price'] = price;
        }
        if (Boolean(brand)) {
            list['brand'] = brand;
        }
        if (Boolean(productCat)) {
            list['productCat'] = productCat;
        }
        var href = "?mod=product&action=category_product&";

        var num_keys = Object.keys(list)
        if (num_keys.length > 0) {
            for (var i = 0; i < num_keys.length; i++) {
                href += num_keys[i] + "=" + list[num_keys[i]] + "&";
            }
            href = href.slice(0, href.length - 1);
            console.log(href);
            window.location.href = href;
        }
    }

    $(".filter").click(function () {

        filter_data();
    })

})