function removePhoto(el, name, removeClass) {
    console.log(name);
    let id = $('.removeClass').attr('data-id');
    $.ajax({
        url: '/admin/categories/remove-photo',
        type: "POST",
        data: {
            name: name,
            id: id
        },
        success: function(response){
            console.log(response);
            $(el).parent().parent().remove();
        },
        error: function(response) {
            // let errorMessage = '';
            // if (response.status === 422) {
            //     errorMessage = response.responseJSON.errors.photo[0];
            // } else if (response.status === 500) {
            //     errorMessage = 'Внутренняя ошибка сервера';
            // }
            // $('#photo-error-message').text(errorMessage);
            $(el).parent().parent().remove();
        }
    })
}

function removePhotoSingle(el) {
    $(el).parent().parent().remove();
}
