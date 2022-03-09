function delete_main_blog_image() {
    let dropzone_image_id = document.getElementById('main_image');
    let dropzone_image = dropzone_image_id.getAttribute('data-default-file');
    dropzone_image_id.setAttribute("data-default-file", null);
    console.log('dropzone_image = ' + dropzone_image);
    let old_image_from_db_id = document.getElementById('old_image');
    let old_image_from_db = old_image_from_db_id.value;
    console.log('old_image_from_db = ' + old_image_from_db);
    let blog_id = document.getElementById('blog_id').value;

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');//Select input values with the data you want to send
    let url = '/admin/blogs/delete_main_blog_image';//Define redirect if needed
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
            id: blog_id,
            _token: token
        })
    }).then(function (response) {
        return response.text();
    }).then(function (text) {
        const event = JSON.parse(text);
        console.log("event = " + event.event);
        //console.log(text);
    }).then((data) => {
    }).catch(function (error) {
        console.log(error);
    });
};
document.addEventListener('DOMContentLoaded', function(){
    $('.dropify').dropify();
    $('.dropify-clear').click(function(e){
        e.preventDefault();
        delete_main_blog_image();
    });
});