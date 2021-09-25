$(function(){
    var tbl_events2 = "";
    
    pageLocation("", "li_livemonitoring", "Live Monitoring");
    setTime();
    // $('.d-nones').remove();
    $( "#btn_add_asset" ).click(function() {
        $('#mdl_add').modal('show');
    });

    

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
    

    var table = $('#tbl_events2').DataTable( {
        
        'ajax': {
            'method' : 'POST',
            'url'    :'live_monitoring_act.php',
            'data'   : {
                            tbl_events2
                        },
            // 'deferRender': true,
        },
        'columnDefs': [
            { "visible": false,  "searchable": false, "targets": 0 },
        ],
        'columns': [
            { data: 'row1' },
            { data: 'row2' },
            { data: 'row3' },
        ],
        'order'  :   [[ 0, 'desc']],
    });
        
  

    /* ADD */
    $("form#frm_mainte_addevent").validate({
        rules: {
            text_1: {
                required : true
            },
            text_2: {
                required : true
            },
            text_3: {
                required : true
            },
        },
        messages: {
            text_1: {
                required    : "Event Name Is Required"
            },
            text_2: {
                required    : "Start Time Is Required"
            },
            text_3: {
                required    : "End Time Is Required"
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
                $.ajax({
                    url         :   form.action,
                    type        :   form.method,
                    data        :   formData,
                    cache       :   false,
                    contentType :   false,
                    processData :   false,
                    dataType    :   "json",
                beforeSend: function(){ 
                    webBlock2("Adding Event ...");
                },
                success: function(response) {
                    responseTosubmit(response[0], response[1], response[2], "frm_mainte_addevent", "tbl_events", "mdl_add");
                }            
            });
        }
    });
    /* EDIT */
    $(document).on('click', '.updateDetails', function(e){
        e.preventDefault();

        let id          =   $(this).data('id');
        let name        =   $(this).data('name');
        let status      =   $(this).data('status');
        removEonStatus("btn_status","mdl_edit",status);

        $('#mdl_edit').modal('show');
        $('#text_1_edit').val(name);
        $('#input_mainteassetname_id').val(id);
        

        $("form#frm_mainte_asset_name_edit").validate({
            rules: {
                text_1_edit: {
                    required : true
                },
            },
            messages: { 
                text_1_edit: {
                    required    : "Attribute Is Required"
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
                    $.ajax({
                        url         :   form.action,
                        type        :   form.method,
                        data        :   formData,
                        cache       :   false,
                        contentType :   false,
                        processData :   false,
                        dataType    :   "json",
                    beforeSend: function(){ 
                        $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Updating ...</h1>' });
                    }, 
                    success: function(response) {
                        $.unblockUI();
                        if(response[0] == 1) {
                            toastrConfirmation(response[2], response[1], "success");
                            $('#frm_mainte_asset_name_edit').trigger("reset");
                            $('#tbl_asset,#tbl_logs').DataTable().ajax.reload(null,false);
                            $('#mdl_edit').modal('hide');
                        }else{
                            toastrConfirmation(response[2], response[1], "error");
                        }
                    }            
                });
            }
        });
    });
    /* DELETE */
    $(document).on('click', '.deleteDetails', function(e){
        e.preventDefault();

        let id      =   $(this).data('id');
        let name    =   $(this).data('name');
        let status    =   $(this).data('status');
        removEonStatus("btn_status","mdl_edit",status);
        let input_mainteassetname_deLete = "";


        Swal.fire({
            title: `Are you sure you want to Delete This Asset Name? `,
            html:
            `<h1 class="text-danger font-weight-bold"> ${name}</h1>`,
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
                        input_mainteassetname_deLete,id
                    },
                    beforeSend: function(){ 
                        $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Deleting Please Wait ...</h1>' });
                    },
                    success :function (response){
                        $.unblockUI();
                        if (response[0] == 1) {
                            toastrConfirmation(response[2], response[1], "success");
                            $('#tbl_asset,#tbl_logs').DataTable().ajax.reload(null, false);
                        }else{
                            toastrConfirmation(response[2], response[1], "error");
                            $('#tbl_asset,#tbl_logs').DataTable().ajax.reload(null, false);
                        }
                    }
                });
            }
        })

    });
});

function setTime() {
    var d = new Date(),
    el = document.getElementById("time");
    
    el.innerHTML = formatAMPM(d);
    
    setTimeout(setTime, 1000);
}
    
function formatAMPM(date) {
    var hours = date.getHours(),
    minutes = date.getMinutes(),
    seconds = date.getSeconds(),
    ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
    return strTime;
}
    