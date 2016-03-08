/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    // add Button Edit
    btn_tpl = '<label><button class="btn btn-info cmd-edit"><i class="fa fa-pencil-square-o"></i> </button></label>';
    
    // add button Delete
    btn_tpl += '<label><button class="btn btn-danger cmd-delete"><i class="fa fa-times"></i> </button></label>';
    var table = $('#form_templates').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/templates/field_types/jsonGetList",
            "dataType": "jsonp"
        },
        "columnDefs": [{
            "targets": -1,
            "data": null,
            "defaultContent": btn_tpl
        },{
            "targets": 0,
            "data": 1
        },{
            "targets": 1,
            "data": 2
        },{
            "targets": 2,
            "data": 8
        },{
            "targets": 3,
            "data": 4
        },
        ]
    } );
    $('#form_templates tbody').on( 'click', 'button.cmd-edit', function () {
        var data = table.row( $(this).parents('tr') ).data();
        location = '/templates/field_types/edit/' + data[0];
    } );
    $('#form_templates tbody').on( 'click', 'button.cmd-delete', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
    } );
} );