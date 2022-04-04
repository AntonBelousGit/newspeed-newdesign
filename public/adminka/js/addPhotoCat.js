$(function() {
    DEFAULT_AMOUNT_PRODUCTS_IMAGES = 5
    let count = 0;
    console.log(count);
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    //
    // });

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
                url: '/admin/categories/add-photo',
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
                    <a href="/assets/uploads/category/${response.filename}" class="img-gallery-box" data-fancybox="images" data-width="1200" style="background-image: url(/assets/uploads/category/${response.filename}); background-repeat: no-repeat">
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
    // склик по input-image
    $('.imgInp').change(function(){
        var imgDiv=$(this).data('id');
        imgDiv=$('#' + imgDiv);
        ImageSetter(this,imgDiv);
    });

});
// функция подстановки картинки
function ImageSetter(input,target) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            target.attr('src', e.target.result);
            target.parent('picture').find('source').attr('srcset', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
