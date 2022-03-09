/* Formatting function for row details - modify as you need */
function format ( d ) {
    // `d` is the original data object for the row
    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
        '<tr>'+
            '<td>Full name:</td>'+
            '<td>'+d.name+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extension number:</td>'+
            '<td>'+d.extn+'</td>'+
        '</tr>'+
        '<tr>'+
            '<td>Extra info:</td>'+
            '<td>And any further details here (images etc)...</td>'+
        '</tr>'+
    '</table>';
}
 
$(document).ready(function() {
    let url_table = document.getElementById('url_table_fetch');

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('#offers_table').DataTable( {
       // "ajax": "/admin_style/assets/data/objects.txt",
       //  processing: true,
       //  serverSide: true,
       //  "bLengthChange": false,
       //  "pageLength": 50,
       //  "bDeferRender": true,
       //  "bProcessing": true,
       //
       //  "processing": true,
       //  "serverSide": true,
        processing: true,
        serverSide: true,
        //"ajax": '/admin/offers/index_fetch/',
        "ajax" : {
            "url" : "/admin/offers/index_fetch/",
            //"type" : "GET",
            "dataSrc": "tableData"
        },
        // ajax: {
        //     url: '/admin/offers/index_fetch/',
        //     dataSrc: ''
        // },
        // "columns": [
        //     {
        //         "className":      'details-control',
        //         "orderable":      false,
        //         "data":           null,
        //         "defaultContent": ''
        //     },
        //     { "data": "name" },
        //     { "data": "position" },
        //     { "data": "office" },
        //     { "data": "salary" }
        // ],
        // "order": [[1, 'asc']],
        contentType: 'application/json',
        dataType: 'json'
    } );
     
    // Add event listener for opening and closing details
    $('#offers_table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
