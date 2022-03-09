let move_to_gallery = function() {
    let input_item_id_value = this.value;
    let input_gallery_name = this.name;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');//Select input values with the data you want to send
    let url;
    if (this.checked) {
        url = '/admin/blocks/move_banner_to_gallery';//Define redirect if needed
    }else{
        url = '/admin/blocks/delete_banner_from_gallery';
    }
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({
            id: input_item_id_value,
            gallery: input_gallery_name,
            _token: token
        })
    }).then(function (response) {
        return response.text();
    }).then(function (text) {
        //console.log(text);
        const banner_value = JSON.parse(text);
        console.log("value = " + banner_value.value);
    }).then((data) => {
    }).catch(function (error) {
        console.log(error);
    });
};
document.addEventListener('DOMContentLoaded', function(){
    // let mainslider = document.getElementById('mainslider');
    //     mainslider.addEventListener('change', move_to_mainslider);

    let input_move_to_gallery = document.getElementsByClassName('input_move_to_gallery');
    Array.from(input_move_to_gallery).forEach(function(input_move_to_gallery) {
        input_move_to_gallery.addEventListener('click', move_to_gallery);
    });
});