$(function() {
    DEFAULT_AMOUNT_PRODUCTS_IMAGES = 5
    let count = 0;
    console.log(count);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $('#addPhotoInput').on('change', function() {
        if(count++ < DEFAULT_AMOUNT_PRODUCTS_IMAGES) {
            let data = new FormData();
            let id = $('.gallery').attr('data-id');

            data.append('photo', this.files[0]);
            data.append('product_id',id);

            $('.gallery .row>div:first-of-type').before(`<div class="col-md-3">
            <img src="/img/ajax-loader.gif" id="add-photo-loader" class="ajax-loader">
        </div>`);
            console.log(id);
            $('#add-photo-loader').css('display', 'block');
            $.ajax({
                url: '/admin/products/add-photo',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: data,


                success: function (response) {
                    console.log(response);
                    $('.gallery .row>div:first-of-type').html();
                    $('.gallery .row>div:first-of-type').html(`
                    <a href="/assets/uploads/products/${response.filename}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/assets/uploads/products/${response.filename}); background-repeat: no-repeat">
                        <div class="trash-block" data-url="${response.filename}" onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                    </a>
                    <input type="hidden" name="photos[]" value="${response.filename}">`);
                },

                error: function (response) {
                    console.log(response)
                    let errorMessage = '';
                    $('.gallery .row>div:first-of-type').remove();
                    if (response.status === 422) {
                        errorMessage = response.responseJSON.errors.photo[0];
                    } else if (response.status === 500) {
                        errorMessage = 'Внутренняя ошибка сервера';
                    }
                    $('#photo-error-message').text(errorMessage);
                }
            })
        }
    });
    $('#addSinglePhotoInput').on('change', function() {
        if(count++ <= DEFAULT_AMOUNT_PRODUCTS_IMAGES) {
            let data = new FormData();
            let id = $('.gallery').attr('data-id');

            data.append('photo', this.files[0]);
            data.append('product_id',id);


            $('.gallery-single .row>div:first-of-type').before(`<div class="col-md-3">
            <img src="/img/ajax-loader.gif" id="add-photo-loader" class="ajax-loader">
        </div>`);
            $('#add-photo-loader').css('display', 'block');
            $.ajax({
                url: '/admin/products/add-photo',
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: data,

                success: function (response) {
                    console.log(response);
                    // $('.gallery-single .row>div:first-of-type').remove();
                    $('.gallery-single .row>div:first-of-type').html();
                    $('.gallery-single .row>div:first-of-type').html(`
                    <a href="/assets/uploads/products/${response.filename}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/assets/uploads/products/${response.filename}); background-repeat: no-repeat">
                        <div class="trash-block" data-url="${response.filename}" onclick="removePhotoSingle(this,this.getAttribute('data-url'));return false;"></div>
                    </a>
                    <input type="hidden" name="image" value="${response.filename}">`);
                },

                error: function (response) {
                    console.log(response)
                    let errorMessage = '';
                    $('.gallery .row>div:first-of-type').remove();
                    if (response.status === 422) {
                        errorMessage = response.responseJSON.errors.photo[0];
                    } else if (response.status === 500) {
                        errorMessage = 'Внутренняя ошибка сервера';
                    }
                    $('#photo-error-message').text(errorMessage);
                }
            })
        }
    });
});
