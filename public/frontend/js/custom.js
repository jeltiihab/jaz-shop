$(document).ready(function () {
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();
        const product_id = $(this).closest('.product_data').find('.prod_id').val();
        const product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'POST',
            url: '/add-to-cart',
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success: function (response) {
                swal(response.status);
            }
        });
    });

    $('.addToWishList').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const product_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url: '/add-to-wishlist',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                swal(response.status);
            }
        });
    })

    $('.remove-wishlist-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const product_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url: '/delete-wishlist-item',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                swal(response.status);
            }
        });
    })

    $('.increment-btn').click(function (e) {
        e.preventDefault();

        //const inc_value = $('.qty-input').val();
        const inc_value = $(this).closest('.product_data').find('.qty-input').val();
        let value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;

        if (value < 10) {
            value++;
            //$('.qty-input').val(value);
            const inc_value = $(this).closest('.product_data').find('.qty-input').val(value);
        }
    })

    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        const dec_value = $('.qty-input').val();
        let value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;

        if (value > 1) {
            value--;
            //$('.qty-input').val(value);
            const inc_value = $(this).closest('.product_data').find('.qty-input').val(value);
        }

    });

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajax({
            method: 'POST',
            url: '/delete-cart-item',
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                swal("", response.status, "success");
            }
        });
    })

    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        const prod_id = $(this).closest('.product_data').find('.prod_id').val();
        const qty = $(this).closest('.product_data').find('.qty-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: 'update-cart',
            data: data,
            success: function (response) {
                window.location.reload();
            }
        });
    })

});
