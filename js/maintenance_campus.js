$(function(){
    var tbl_campus = "";
    pageLocation("li_mainte", "li_mainte_campus", "Campus");
    // sel_eventclass();
    // sel_eventcampus();
    // $('.d-nones').remove();
    var frm_event_action = "";
    var frm_event_id = "";


    $( "#btn_add_asset" ).click(function() {
        frm_event_action = "add";
        frm_event_id = "";
        $('#mdl_add').modal('show');
    });

    $('#mdl_add').on('hidden.bs.modal', function () {
        $('#frm_mainte_addcampus').trigger('reset');
    })

    // $(".sel_exceptdate").select2({
    //     placeholder: "Select Classification",
    //     allowClear: true,
    //     width: '100%'
    // });


    // $("#text_5").on("change", function () {
    //     var id = $(this).val();
      
    //     if(id == 8) {

    //         $('#div_startdate').removeClass('d-none');
    //         $('#div_startime').removeClass('d-none');
    //         $('#div_enddate').removeClass('d-none');
    //         $('#div_endtime').removeClass('d-none');

    //     }else {

    //         $('#div_startdate').addClass('d-none');
    //         $('#div_startime').removeClass('d-none');
    //         $('#div_enddate').addClass('d-none');
    //         $('#div_endtime').removeClass('d-none');


    //     }
   
    // });


    // $('#tbl_logs').DataTable( {
    //     // "scrollY":        "200px",
    //     // "scrollCollapse": true,
    //     // "paging":         false,
    //     'ajax': {
    //         'method' : 'POST',
    //         'url'    :'../actions/datatables_logs.php',
    //         'data'   : {
    //                         form: 'logs_mainte_asset_name'
    //                     },
    //         'deferRender': true,
    //     },
    //     'columnDefs': [
    //         { "visible": false,  "searchable": false, "targets": 0 },
    //     ],
    //     'columns': [
    //         { data: 'array0' },
    //         // {   
    //         //     "className":      'details-control',
    //         //     "orderable":      false,
    //         //     "data":           null,
    //         //     "defaultContent": '',
    //         // },
    //         { data: 'array1' },
    //         { data: 'array2' },
    //         { data: 'array3' },
    //         { data: 'array4' },
            
    //     ],
    //     'order'  :   [[ 0, 'desc']],
    // });


    // $( "#link_log" ).click(function() {
    //     $('#mdl_log').modal('show');
    //     $('#tbl_logs').DataTable().ajax.reload();
    // });
    // $( "#btn_reload_log" ).click(function() {
    //     $('#tbl_logs').DataTable().ajax.reload();
    // });
    
    
 
    function format ( d ) {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                // '<td><b>Description</b></td>'+
                // '<td>'+d.row7+'</td>'+
            '</tr>'+

        '</table>';
    }
    var table = $('#tbl_campus').DataTable( {
        
        'ajax': {
            'method' : 'POST',
            'url'    :'action_maintenance.php',
            'data'   : {
                            tbl_campus
                        },
            // 'deferRender': true,
        },
        'columnDefs': [
            { "targets": 4,  "data": null, "defaultContent": "<button class='btn btn-primary edit_btn'>Edit</button> <button class='btn btn-danger delete_btn'>Delete</button>  " },
        ],
        'columns': [
            { data: 'row1' },
            {   
                "className":      'details-control text-center',
                "orderable":      false,
                "data":           null,
                "defaultContent": '',
                "visible" : false
            },
            { data: 'row2' },
            { data: 'row3' },
        ],
        'order'  :   [[ 0, 'desc']],
    });
        
    $('#tbl_campus tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            if ( table.row( '.shown' ).length ) {
                $('.details-control', table.row( '.shown' ).node()).click();
            }
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });
    $('#tbl_campus tbody').on( 'click', '.edit_btn', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $('#text_1').val(data['row2']);
        $('#text_2').val(data['row3']);
        frm_event_id = data['row1'];
        frm_event_action = "edit";
        $('#mdl_add').modal('show');
    } );
    $('#tbl_campus tbody').on( 'click', '.delete_btn', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var input_maintecampus = "";
        frm_event_id = data['row1'];
        frm_event_action = "delete";


        var action  =  frm_event_action;
        var id      =  frm_event_id;

        Swal.fire({
            title: `Are you sure you want to Delete This Campus? `,
            html:
            `<h1 class="text-danger font-weight-bold"> ${data['row2']}</h1>`,
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: `Yes Delete It! `,
            confirmButtonClass: 'btn btn-primary',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    method  : "POST",
                    url     : "action_maintenance.php",
                    dataType: "JSON",
                    data    : {
                        input_maintecampus,  action,id
                    },
                    beforeSend: function(){ 
                        webBlock2("Just a Moment...");
                    },
                    success :function (response){
                        $.unblockUI();
                        responseTosubmit(response[0], response[1], response[2], "frm_mainte_addcampus", "tbl_campus", "mdl_add");
                    
                    }
                });
            }
        })



    } );

    /* ADD */
    $("form#frm_mainte_addcampus").validate({
        rules: {
            text_1: {
                required : true
            },
        },
        messages: {
            text_1: {
                required    : "Campus Name Is Required"
            },
        },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.col-md-9').append(error);
            },
                highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
                unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
        
                var formData = new FormData(form);
                formData.append("id", frm_event_id);
                formData.append("action", frm_event_action);
                $.ajax({
                    url         :   form.action,
                    type        :   form.method,
                    data        :   formData,
                    cache       :   false,
                    contentType :   false,
                    processData :   false,
                    dataType    :   "json",
                beforeSend: function(){ 
                    webBlock2("Adding Campus ...");
                },
                success: function(response) {
                
                    responseTosubmit(response[0], response[1], response[2], "frm_mainte_addcampus", "tbl_campus", "mdl_add");
               
                }            
            });
        }
    });
    /* EDIT */
    // $(document).on('click', '.updateDetails', function(e){
    //     e.preventDefault();

    //     let id          =   $(this).data('id');
    //     let name        =   $(this).data('name');
    //     let status      =   $(this).data('status');
    //     removEonStatus("btn_status","mdl_edit",status);

    //     $('#mdl_edit').modal('show');
    //     $('#text_1_edit').val(name);
    //     $('#input_mainteassetname_id').val(id);
        

    //     $("form#frm_mainte_asset_name_edit").validate({
    //         rules: {
    //             text_1_edit: {
    //                 required : true
    //             },
    //         },
    //         messages: { 
    //             text_1_edit: {
    //                 required    : "Attribute Is Required"
    //             },
    //         },
    //             errorElement: 'span',
    //             errorPlacement: function (error, element) {
    //             error.addClass('invalid-feedback');
    //             element.closest('.col-md-9').append(error);
    //             },
    //                 highlight: function (element, errorClass, validClass) {
    //                 $(element).addClass('is-invalid');
    //             },
    //                 unhighlight: function (element, errorClass, validClass) {
    //                 $(element).removeClass('is-invalid');
    //             },
    //             submitHandler: function(form) {

    //                 var formData = new FormData(form);
    //                 $.ajax({
    //                     url         :   form.action,
    //                     type        :   form.method,
    //                     data        :   formData,
    //                     cache       :   false,
    //                     contentType :   false,
    //                     processData :   false,
    //                     dataType    :   "json",
    //                 beforeSend: function(){ 
    //                     $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Updating ...</h1>' });
    //                 }, 
    //                 success: function(response) {
    //                     $.unblockUI();
    //                     if(response[0] == 1) {
    //                         toastrConfirmation(response[2], response[1], "success");
    //                         $('#frm_mainte_asset_name_edit').trigger("reset");
    //                         $('#tbl_asset,#tbl_logs').DataTable().ajax.reload(null,false);
    //                         $('#mdl_edit').modal('hide');
    //                     }else{
    //                         toastrConfirmation(response[2], response[1], "error");
    //                     }
    //                 }            
    //             });
    //         }
    //     });
    // });
    /* DELETE */
    // $(document).on('click', '.deleteDetails', function(e){
    //     e.preventDefault();

    //     let id      =   $(this).data('id');
    //     let name    =   $(this).data('name');
    //     let status    =   $(this).data('status');
    //     removEonStatus("btn_status","mdl_edit",status);
    //     let input_mainteassetname_deLete = "";


    //     Swal.fire({
    //         title: `Are you sure you want to Delete This Asset Name? `,
    //         html:
    //         `<h1 class="text-danger font-weight-bold"> ${name}</h1>`,
    //         text: "You won't be able to revert this!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: `Yes Delete It! `,
    //         confirmButtonClass: 'btn btn-primary',
    //         cancelButtonClass: 'btn btn-danger ml-1',
    //         buttonsStyling: false,
    //     }).then(function (result) {
    //         if (result.value) {
    //             $.ajax({
    //                 method  : "POST",
    //                 url     : "action_maintenance.php",
    //                 dataType: "JSON",
    //                 data    : {
    //                     input_mainteassetname_deLete,id
    //                 },
    //                 beforeSend: function(){ 
    //                     $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Deleting Please Wait ...</h1>' });
    //                 },
    //                 success :function (response){
    //                     $.unblockUI();
    //                     if (response[0] == 1) {
    //                         toastrConfirmation(response[2], response[1], "success");
    //                         $('#tbl_asset,#tbl_logs').DataTable().ajax.reload(null, false);
    //                     }else{
    //                         toastrConfirmation(response[2], response[1], "error");
    //                         $('#tbl_asset,#tbl_logs').DataTable().ajax.reload(null, false);
    //                     }
    //                 }
    //             });
    //         }
    //     })

    // });
});

