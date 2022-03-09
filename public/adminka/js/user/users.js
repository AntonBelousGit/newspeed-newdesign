
let update_user = document.getElementsByClassName('update_user');
// var button = document.getElementById("myButton");
// button.addEventListener("click",function(e){
//     button.disabled = "true";
// },false);

function alert_it(id){
    let user_id = document.getElementById('user_id');
    user_id.innerHTML = 'User Id = ' + id;
    //console.log(page_id);
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');//Select input values with the data you want to send
    let url_users_modal = '/admin/users/users_modal';//Define redirect if needed
    fetch(url_users_modal, {
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json, text-plain, */*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token
        },
        method: 'post',
        credentials: "same-origin",
        body: JSON.stringify({
            id: id,
            _token: token
        })
    }).then(function (response) {
        return response.text();
    }).then(function (text) {
        console.log(text);
         const user_db = JSON.parse(text);
         let user = user_db.user;
         let username = user_db.username;
         let profile = user.profile;
         let role_id = user_db.role_id;
        document.getElementById("user_id").value = id;
         document.getElementById("username").value = username;
        document.getElementById("email").value = user.email;
        document.getElementById('role').value=role_id;
        if(profile == 1){
            document.getElementById("profile").value = "Publisher";
        }else{
            document.getElementById("profile").value = "Advertiser";
        }
        // let product_id_db = obj_image.product_id;
        // let product_path_db = obj_image.path_image;
         console.log("user = " + user.id);
        console.log("username = " + username);
        // console.log("product_id_db = " + product_id_db);
        // console.log("path_db = " + product_path_db);
    }).then((data) => {
    }).catch(function (error) {
        console.log(error);
    });
}

Array.from(update_user).forEach(function(update_user) {
    update_user.addEventListener('click', function(){ alert_it( this.getAttribute('data-user-id')); });
});
document.addEventListener('DOMContentLoaded', function(){
let table = new DataTable('#users_table', {

});
});

