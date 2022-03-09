
// function titleOpen(elem) {
//     var tab = $(elem);
//     $(tab).siblings(".tab-title").removeClass("open");
//     $(tab).addClass("open");
// }

// function removeTr(elem) {
//     $(elem).parent('td').parent('tr').remove();
// }

// function addAttribute() {

//     $('<tr><td style="width: 20%;">' +
//         '<select class="js-example-basic-single" name="state">' +
//             '<option value="AL">Alabama</option>'+
//             '<option value="WY">Wyoming</option>'+
//             '<option value="WY2">Wyoming2</option>'+
//             '<option value="WY3">Wyoming3</option>'+
//         '</select>'+
//         '</td>'+
//         '<td>'+
//         '</td>'+
//         '<td class="text-right" style="width: 20%;">'+
//         '<button type="button" onclick="removeTr(this);">'+
//         '<i class="fa fa-minus-circle"></i>'+
//         '</button>'+
//         '</td>'+
//         '</tr>').appendTo('table.table tbody')
//     $('.js-example-basic-single').select2();
// }

// function addSelect(elem) {
//     if($(elem).val() == 0) return false
//     if($(elem).val() == 'Add') {
//         $('<div class="wrap_add_input"><input type="text" name="addAtribut"></div>').appendTo($(elem).parent('td'))
//     }
//     if($(elem).val() != 'Add') {
//         $(elem).siblings('.wrap_add_input').remove()
//     }
// }

// $(function() {
//     $('.js-example-basic-single').select2();
// })

