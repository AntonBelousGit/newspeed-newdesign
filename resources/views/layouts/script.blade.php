<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/rescript.min.js') }}"></script>
{{--Add to cart--}}

<script>
    $(document).on('click', '.add_to_cart', function (e) {
        e.preventDefault();
        let product_id = $(this).data('product-id');
        let token = '{{csrf_token()}}';
        let path = '{{route('cart.store')}}';

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                _token: token,
            },
            success: function (data) {

                if (data['status'] === true) {
                    render_cart(data)
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
{{--Delete product from cart--}}
<script>
    $(document).on('click', '.deleteItem', function (e) {
        e.preventDefault();
        let cart_id = $(this).data('id');
        let token = '{{csrf_token()}}';
        let path = '{{route('cart.delete')}}';

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                cart_id: cart_id,
                _token: token,
            },
            success: function (data) {
                if (data['status'] === true) {
                    render_cart(data)
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
{{-- Update cart --}}
<script>
    $(document).on('click', '.change-qty', function (e) {
        let id = $(this).data('id');
        let productQuantity = $('#qty-input-' + id).val();
        update_cart(id, productQuantity);

    });

    function update_cart(id, productQuantity) {
        let token = "{{csrf_token()}}";
        let path = "{{route('cart.update')}}";

        $.ajax({
            url: path,
            type: "POST",
            data: {
                _token: token,
                product_qty: productQuantity,
                rowId: id,
            },
            success: function (data) {
                if (data['status'] === true) {
                    render_cart(data)
                }
            },
            error: function (err) {
                console.log(err);
            }
        })
    }

    function render_cart(data) {
        $('body #header-ajax').html(data['header']);
        $('body #exampleModal0').html(data['cart_view']);
    }
</script>
<script>
    $(document).on('click', '.add_to_wishlist', function (e) {
        e.preventDefault();
        let product_id = $(this).data('id');

        let token = '{{csrf_token()}}';
        let path = '{{route('wishlist.store')}}';

        $.ajax({
            url: path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                _token: token,
            },
            beforeSend: function () {
                $('.add_to_wishlist' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            complete: function () {
                $('.add_to_wishlist' + product_id).html('<i class="fa fa-heart"></i>');

            },
            success: function (data) {

                // if (data['status'] === true) {
                //     // $('body #header-ajax').html(data['header']);
                //     // $('body #wishlist_counter').html(data['wishlist_count']);
                //     swal({
                //         title: "Good job!",
                //         text: data['message'],
                //         icon: "success",
                //         button: "OK!",
                //     });
                // } else if (data['present']) {
                //     // $('body #header-ajax').html(data['header']);
                //     // $('body #wishlist_counter').html(data['wishlist_count']);
                //     swal({
                //         title: "Opps!",
                //         text: data['message'],
                //         icon: "warning",
                //         button: "OK!",
                //     });
                // } else {
                //     swal({
                //         title: "Sorry!",
                //         text: "You can't add that product",
                //         icon: "error",
                //         button: "OK!",
                //     });
                // }
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
</script>
