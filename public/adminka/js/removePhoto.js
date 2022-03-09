function removePhoto(el, name) {
    console.log(name);
    let id = $('.gallery').attr('data-id');
    $.ajax({
        url: '/admin/products/remove-photo',
        type: "POST",
        data: {
            name: name,
            product_id: id
        },
        success: function(response){
            console.log(response);
            $(el).parent().parent().remove();
        },
        error: function(response) {
            let errorMessage = '';
            if (response.status === 422) {
                errorMessage = response.responseJSON.errors.photo[0];
            } else if (response.status === 500) {
                errorMessage = 'Внутренняя ошибка сервера';
            }
            $('#photo-error-message').text(errorMessage);
        }
    })

    // $.ajax({
    //     url: '/uploads/remove-file',
    //     type: "POST",
    //     data: { name: name },
    //     success: function(response) {
    //         console.log(response);
    //         $(el).parent().parent().remove();
    //     },
    //     error: function(response) {
    //         let errorMessage = '';
    //         if (response.status === 422) {
    //             errorMessage = response.responseJSON.errors.photo[0];
    //         } else if (response.status === 500) {
    //             errorMessage = 'Внутренняя ошибка сервера';
    //         }
    //         $('#photo-error-message').text(errorMessage);
    //     }
    // });
}
