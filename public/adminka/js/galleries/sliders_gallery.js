let sliders_gallery = document.getElementById('sliders_gallery');
 function order(){
     // create sortable and save instance
     let sortable = Sortable.create(sliders_gallery, {
         animation: 150,
         ghostClass: 'blue-background-class',
         filter: "input,textarea,button,select,option,[contenteditable]",
         preventOnFilter: false,
     });
     // save initial order
     let initialOrder = sortable.toArray();
 }
      order();
let uniqueID = (function()
 {
     let id = 0; // This is the private persistent value
     // The outer function returns a nested function that has access
     // to the persistent value.  It is this nested function we're storing
     // in the variable uniqueID above.
     return function()
     {
         return id++;
     };  // Return and increment
 })(); // Invoke the outer function after defining it.

 function add_image() {
     let div = document.createElement('div');
     div.setAttribute('class', 'col-lg-2 col-md-4 col-sm-12 m-50 card border-secondary js_images_counter');
     let unique_id = uniqueID();
     div.setAttribute('data-id', unique_id);
     div.innerHTML = `
                <div class="card-header"><div>new img - ` + unique_id + `<i class="table-dragger-handle"></i></div><div class="close_image_block" onclick="close_image_block(this);"><i class="fa fas fa-times"></i></div></div>
                <div class="card-body text-secondary">
                    <input type="file" class="dropify" name="image[]"    >
                    <input type="hidden" name="old_image[]" value=""  >
                    <ul class="list-group list-group-flush">
                       <li class="list-group-item">
                            <label for="title1[]">Title 1:</label>
                            <textarea class="container-fluid" id="title1[]" name="title1[]"></textarea>
                       </li>
                       <li class="list-group-item">
                            <label for="title2[]">Title 2:</label>
                            <textarea class="container-fluid" id="title2[]" name="title2[]"></textarea>
                       </li>
                        <li class="list-group-item">
                            <label for="url[]">URL:</label>
                            <textarea class="container-fluid" id="url[]" name="url[]"></textarea>
                        </li>
                    </ul>
                </div>
            `;
    sliders_gallery.appendChild(div);
 }

 document.getElementById('addImg').addEventListener('click', function(e) {
     add_image();
     $('.dropify').dropify();
 });

let delete_sliders_gallery_image = function() {
     let dropzone_image_input_id = this.previousSibling.getAttribute("data-input-id");
     let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');//Select input values with the data you want to send
     let url = '/admin/galleries/delete_sliders_gallery_image';//Define redirect if needed
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
             image_id: dropzone_image_input_id,
             _token: token
         })
     }).then(function (response) {
         return response.text();
     }).then(function (text) {
         //console.log(text);
     }).then((data) => {
     }).catch(function (error) {
         console.log(error);
     });
 };

let close_image_block = function(e) {
    e.parentElement.parentElement.remove();
};
let delete_main_gallery_block = function(e) {
    let block_id =  e.getAttribute('data-block-id');
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');//Select input values with the data you want to send
    let url = '/admin/galleries/delete_sliders_gallery_block';//Define redirect if needed
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
            block_id: block_id,
            _token: token
        })
    }).then(function (response) {
        return response.text();
    }).then(function (text) {
        const event = JSON.parse(text);
        console.log("event = " + event.event);
        e.parentElement.parentElement.remove();
    }).then((data) => {
    }).catch(function (error) {
        console.log(error);
    });

};

document.addEventListener('DOMContentLoaded', function(){
   // let dropify = document.getElementsByClassName('dropify');
   // if(dropify) {
        $('.dropify').dropify();
        let dropify_clear_buttons = document.getElementsByClassName("dropify-clear");
        Array.from(dropify_clear_buttons).forEach(function (dropify_clear_button) {
            dropify_clear_button.addEventListener('click', delete_sliders_gallery_image);
        });
   // }
});
