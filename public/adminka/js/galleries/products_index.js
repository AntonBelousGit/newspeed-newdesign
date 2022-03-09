let move_to_block = function() {
    let block_value = this.value;
    let block_name = this.name;
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');//Select input values with the data you want to send
    let url;
    if (this.checked) {
        url = '/admin/products/move_product_to_block';//Define redirect if needed
        url = '/admin/blocks/move_product_to_block';//Define redirect if needed
    }else{
        url = '/admin/products/delete_product_from_block';
        url = '/admin/blocks/delete_product_from_block';
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
            id: block_value,
            block: block_name,
            _token: token
        })
    }).then(function (response) {
        return response.text();
    }).then(function (text) {
        //console.log(text);
        const product_value = JSON.parse(text);
        console.log("result = " + product_value.result);
    }).then((data) => {
    }).catch(function (error) {
        console.log(error);
    });
};
document.addEventListener('DOMContentLoaded', function(){
    //let promotions = document.getElementById('promotions');
       // promotions.addEventListener('change', move_to_block);
    //let discounts = document.getElementById('discounts');
   // discounts.addEventListener('change', move_to_block);

    let input_block = document.getElementsByClassName('input_block');
    Array.from(input_block).forEach(function(input_block) {
        input_block.addEventListener('click', move_to_block);
    });
});