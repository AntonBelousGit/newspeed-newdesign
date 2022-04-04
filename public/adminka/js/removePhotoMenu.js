function removePhoto(el, name) {
    console.log(name);
    let id = $('.gallery-single').attr('data-id');
    $.ajax({
        url: '/admin/menu/remove-photo',
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
            $(el).parent().parent().remove();
        }
    })
}

function removePhotoSingle(el) {
    $(el).parent().parent().remove();
}
