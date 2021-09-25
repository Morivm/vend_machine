

$(function(){

    pageLocation("li_mainte", "li_mainte_asset_name", "Create Events");
    sel_eventclass();
    sel_eventcampus();


    var frm_event_action = "";
    var frm_event_id = "";
    var tbl_events = "";


    $("#text_6").daterangepicker({
        // "timePicker": true,
        // startDate: moment().startOf('hour'),
        // endDate: moment().startOf('hour').add(32, 'hour'),
        // "timePicker24Hour": true,
        showDropdowns: true,
        autoUpdateInput: false,
        cancelClass: "btn-danger",  
        opens: 'right',
            locale: {
                format: 'YYYY-MM-DD',
                cancelLabel: 'Clear'
            },
        },
    );
    $('#text_6').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });
    $('#text_6').on('cancel.daterangepicker', function(ev, picker) {
        $('#text_6').val('');
    });


    $( "#btn_add_asset" ).click(function() {
        frm_event_action = "add";
        frm_event_id = "";
        $('#mdl_add').modal('show');
    });
    $(".sel_exceptdate").select2({
        placeholder: "Select Classification",
        allowClear: true,
        width: '100%'
    });

    $("#text_5").on("change", function () {
        var id = $(this).val();
      
        if (id == "") {
            $('#hidediv').addClass('d-none');
        }
        else if(id == 8) {
            $('#hidediv').removeClass('d-none');
            $('#div_startdate').removeClass('d-none');
            $('#div_startime').removeClass('d-none');
  
            $('#div_endtime').removeClass('d-none');
        }else {
            $('#hidediv').removeClass('d-none');
            $('#div_startdate').addClass('d-none');
            $('#div_startime').removeClass('d-none');
  
            $('#div_endtime').removeClass('d-none');
            $('#text_6').val("");
        }
   
    });

    $('#mdl_add').on('hidden.bs.modal', function () {
        $('#frm_mainte_addevent').trigger('reset');
        $('.select2').val("").trigger('change');
    })

    function format ( d ) {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td><b>Description</b></td>'+
                '<td>'+d.row7+'</td>'+
            '</tr>'+

        '</table>';
    }
    var table = $('#tbl_events').DataTable( {

        'ajax': {
            'method' : 'POST',
            'url'    :'action_maintenance.php',
            'data'   : {
                            tbl_events
                        },
        },
        'columnDefs': [
            { "targets": 12,  "data": null, "defaultContent": "<button class='btn btn-primary edit_btn'>Edit</button> <button class='btn btn-danger delete_btn'>Delete</button>  " },

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
            { data: 'row15' },
            { data: 'row8' },
            { data: 'row3' },
            { data: 'row4' },
            { data: 'row7', visible: false},
            { data: 'row11', visible: false},
            { data: 'row12', visible: false},
            { data: 'row13', visible: false},
            { data: 'row14', visible: false},
        ],
        'order'  :   [[ 0, 'desc']],
    });
    $('#tbl_events tbody').on('click', 'td.details-control', function () {
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
    $('#tbl_events tbody').on( 'click', '.edit_btn', function () {
        var data = table.row( $(this).parents('tr') ).data();
        $('#text_1').val(data['row2']);
        $('#text_9').val(data['row11']).trigger('change');
        $('#text_5').val(data['row12']).trigger('change');
        $('#text_2').val(data['row13']);
        $('#text_3').val(data['row14']);
        $('#text_6').val(data['row16']);
        
        frm_event_id = data['row1'];
        frm_event_action = "edit";
        $('#mdl_add').modal('show');
    } );
    $('#tbl_events tbody').on( 'click', '.delete_btn', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var input_mainteevents = "";
        frm_event_id = data['row1'];
        frm_event_action = "delete";

        var action  =  frm_event_action;
        var id      =  frm_event_id;

        Swal.fire({
            title: `Are you sure you want to Delete This Event? `,
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
                        input_mainteevents,  action, id
                    },
                    beforeSend: function(){ 
                        webBlock2("Just a Moment...");
                    },
                    success :function (response){
                        $.unblockUI();
                        responseTosubmit(response[0], response[1], response[2], "frm_mainte_addevent", "tbl_events", "mdl_add");
                    
                    }
                });
            }
        })



    } );
    $("#frm_mainte_addevent").validate({
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
            text_9: {
                required : true
            },
            text_5: {
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
            text_9: {
                required    : "Campus is Required"
            },
            text_5: {
                required    : "Event Type is Required"
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
                    webBlock2("Just a Moment...");
                },
                success: function(response) {
             
                    responseTosubmit(response[0], response[1], response[2], "frm_mainte_addevent", "tbl_events", "mdl_add");
                
                }            
            });
        }
    });
 
});

