$(function(){
    pageLocation("", "users", "Users");
    sel_usertype();
    // sel_userroles();
    var frm_attteneeid_id = "";
    

    // var tablelogs = "";
    // var hideactions ="";



    // $(document).on('click', '.userDisabled', function(e){
    //     e.preventDefault();

    //     let user_id =   $(this).data('id');
    //     let stats   =   $(this).data('stats');
    //     let fname   =   $(this).data('fullnme');
    //     let disacct =   "";
    //     Swal.fire({
    //         title: `Are you sure you want to ${ (stats == 1) ? "Disabled" : "Enable" } This Account?`,
    //         text: fname,
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: `${ (stats == 1) ? "Yes Disable It" : "Yes Enable It" } `,
    //         confirmButtonClass: 'btn btn-primary',
    //         cancelButtonClass: 'btn btn-danger ml-1',
    //         buttonsStyling: false,
    //     }).then(function (result) {
    //         if (result.value) {
    //             $.ajax({
    //                 method  : "POST",
    //                 url     : "users_act.php",
    //                 dataType: "JSON",
    //                 data    : {
    //                             disacct,user_id,stats
    //                 },
    //                 beforeSend: function(){ 
    //                     $.blockUI({ message: '<h1> Please Wait... !!!</h1>' });
    //                 },
    //                 success :function (response){
    //                     $.unblockUI();
    //                     if (response[0] == 1) {
    //                         toastrConfirmation(response[2], response[1], "success");
    //                         $('#tbl_manageusers').DataTable().ajax.reload();
    //                         $(`#tbl_logs`).DataTable().ajax.reload(null,false);
    //                     }else{
    //                         toastrConfirmation(response[2], response[1], "error");
    //                         $('#tbl_manageusers').DataTable().ajax.reload();
    //                     }
                
    //                 }
    //             });
    //         }
    //     })

    // });
    
    // $(document).on('click', '.userAddacc', function(e){
    //     e.preventDefault();
    //     let id              = $(this).data('id');
    //     let mdl_addaccount  = id;
    //     $('#acct_id').val(id)
    //     // getUandP(id);
    //     let fullname    = $(this).data('fullnme');
    //     $('#mdltitle2').text('Add Account For ' + fullname);
    //     $('#update_acctid').val(id);
    //     $('#mdl_add_account').modal('show');
    //     $("form#frm_add_account").validate({
    //         rules: {
                
    //             acct_usertype: {
    //                 required : true,
    //             },
    //             acct_username: {
    //                 required : true,
    //                 minlength: 6,
    //                 remote: {
    //                     url : "select2_remote.php",
    //                     type: "post"
    //                 }
    //             },
    //             acct_password: {
    //                 required : true,
    //                 minlength: 5
    //             },
    //             acct_repassword: {
    //                 required : true,
    //                 equalTo : "#acct_password"
    //             },
    //             acct_yourpassword: {
    //                 required : true,
    //             },
    //         },
    //         messages: {
                
    //             acct_usertype: {
    //                 required    : "Usertype Is Required",
    //             },
    //             acct_username: {
    //                 required    : "Please Input Username",
    //                 minlength   : "Please Input atleast 6 characters",
    //                 remote : "Username Is Not Available"
    //             },
    //             acct_password: {
    //                 required    : "Please Input Password",
    //                 minlength   : "Please Input atleast 5 characters"
    //             },
    //             acct_repassword: {
    //                 required   : "Please Retype the Password",
    //                 equalTo    : "Please Retype password Correctly"
    //             },
    //             acct_yourpassword: {
    //                 required    : "Please Enter Your Password"
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
    //                 if(mdl_addaccount != id) {
    //                     ExceptionErroMsg("Error Found Loading Page Now");
    //                 }else{
    //                     var formData = new FormData(form);
    //                     $.ajax({
    //                         url         :   form.action,
    //                         type        :   form.method,
    //                         data        :   formData,
    //                         cache       :   false,
    //                         contentType :   false,
    //                         processData :   false,
    //                         dataType    :   "json",
    //                         beforeSend: function(){ 
    //                             $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Adding Account ...</h1>' });
    //                     },
    //                     success: function(response) {
               
    //                         $.unblockUI();
    //                         if(response[0] == 1) {
    //                             toastrConfirmation(response[2], response[1], "success");
    //                             formSubmitResponse("tbl_manageusers", "frm_add_account","mdl_add_account");
    //                             $(`#tbl_logs`).DataTable().ajax.reload(null,false);
    //                         }else{
    //                             toastrConfirmation(response[2], response[1], "error");
    //                         }
    //                     }            
    //                 });
    //                 }
    //             }
    //         });
    
    // });
       $("form#frm_add_account").validate({
            rules: {
                
                acct_usertype: {
                    required : true,
                },
                acct_username: {
                    required : true,
                    minlength: 6,
                },
                acct_password: {
                    required : true,
                    minlength: 5
                },
                acct_repassword: {
                    required : true,
                    equalTo : "#acct_password"
                },
                acct_yourpassword: {
                    required : true,
                },
            },
            messages: {
                
                acct_usertype: {
                    required    : "Usertype Is Required",
                },
                acct_username: {
                    required    : "Please Input Username",
                    minlength   : "Please Input atleast 6 characters",
                    remote : "Username Is Not Available"
                },
                acct_password: {
                    required    : "Please Input Password",
                    minlength   : "Please Input atleast 5 characters"
                },
                acct_repassword: {
                    required   : "Please Retype the Password",
                    equalTo    : "Please Retype password Correctly"
                },
                acct_yourpassword: {
                    required    : "Please Enter Your Password"
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
                    // if(mdl_addaccount != id) {
                    //     ExceptionErroMsg("Error Found Loading Page Now");
                    // }else{
                        var formData = new FormData(form);
                        formData.append("id", frm_attteneeid_id);
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
                            $.unblockUI();
                            responseTosubmit(response[0], response[1], response[2], "frm_add_account", "tbl_manageusers", "mdl_add_account");
                          
                            // $.unblockUI();
                            // if(response[0] == 1) {
                            //     toastrConfirmation(response[2], response[1], "success");
                            //     formSubmitResponse("tbl_manageusers", "frm_add_account","mdl_add_account");
                            //     $(`#tbl_logs`).DataTable().ajax.reload(null,false);
                            // }else{
                            //     toastrConfirmation(response[2], response[1], "error");
                            // }
                        }            
                    });
                    // }
                }
            });
    // $(document).on('click', '.userAddsec', function(e){
    //     e.preventDefault();
    
        
    //     let id              = $(this).data('id');
    //     let mdl_security    = id;
    //     $('#sec_id').val(id)
    //     // getUandP(id);
    //     let fullname    = $(this).data('fullnme');
    //     $('#mdltitle1').text('Update Password For ' + fullname);
    //     $('#mdl_add_security').modal('show');
    //     $("form#frm_add_security").validate({
    //         rules: {
    //             sec_password: {
    //                 required : true,
    //                 minlength: 5
    //             },

    //             sec_repassword: {
    //                 required : true,
    //                 minlength: 5,
    //                 equalTo : "#sec_password"
    //             },
    //             sec_yourpassword: {
    //                 required : true,
    //                 minlength: 5
    //             },
    //         },
    //         messages: {

    //             sec_password: {
    //                 required    : "Please Input Password",
    //                 minlength   : "Please Input atleast 5 characters"
    //             },
    //             sec_repassword: {
    //                 required    : "Please Retype The Password",
    //                 equalTo     : "Please Retype password Correctly"
    //             },
    //             sec_yourpassword: {
    //                 required    : "Please Input Your Password",
    //                 minlength   : "Please Input atleast 5 characters"
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
    //                 if(mdl_security != id) {
    //                     ExceptionErroMsg("Error Found Loading Page Now");
    //                 }else{
    //                     var formData = new FormData(form);
    //                     $.ajax({
    //                         url         :   form.action,
    //                         type        :   form.method,
    //                         data        :   formData,
    //                         cache       :   false,
    //                         contentType :   false,
    //                         processData :   false,
    //                         dataType    :   "json",
    //                         beforeSend: function(){ 
    //                             $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Updating Password ...</h1>' });
    //                     },
    //                     success: function(response) {
               
    //                         $.unblockUI();
    //                         if(response[0] == 1) {
    //                             toastrConfirmation(response[2], response[1], "success");
    //                             formSubmitResponse("", "frm_add_security","mdl_add_security");
    //                             $(`#tbl_logs`).DataTable().ajax.reload(null,false);
    //                         }else{
    //                             toastrConfirmation(response[2], response[1], "error");
    //                         }
    //                     }            
    //                 });
    //                 }
    //             }
    //         });
    
    // });
//.....................................................................................
//..................dddd...............................................................
//..................dddd...............................................................
//..................dddd...............................................................
//...aaaaaa....ddddddddddvvv..vvvv..aaaaaa...nnnnnnnn...sssssss....eeeeee....cccccc....
//..aaaaaaaa..dddddddddddvvv..vvvv.aaaaaaaa..nnnnnnnnn.nssssssss..eeeeeeee..cccccccc...
//.aaaa.aaaaaadddd.ddddddvvv.vvvv.vaaa.aaaaa.nnnn.nnnnnnsss.ssss.seee.eeee.ecccc.cccc..
//.....aaaaaaaddd...dddd.vvvvvvvv.....aaaaaa.nnnn..nnnnnssss.....seee..eeeeeccc..ccc...
//..aaaaaaaaaaddd...dddd.vvvvvvvv..aaaaaaaaa.nnnn..nnnn.ssssss...seeeeeeeeeeccc........
//.aaaaaaaaaaaddd...dddd.vvvvvvv..vaaaaaaaaa.nnnn..nnnn..sssssss.seeeeeeeeeeccc........
//.aaaa.aaaaaaddd...dddd..vvvvvv..vaaa.aaaaa.nnnn..nnnn......ssssseee......eccc..ccc...
//.aaaa.aaaaaadddd.ddddd..vvvvvv..vaaa.aaaaa.nnnn..nnnnnsss..ssssseee..eeeeecccc.cccc..
//.aaaaaaaaaa.dddddddddd..vvvvv...vaaaaaaaaa.nnnn..nnnnnssssssss..eeeeeeee..ccccccccc..
//..aaaaaaaaa..ddddddddd...vvvv....aaaaaaaaa.nnnn..nnnn..ssssss....eeeeee....cccccc....
//.....................................................................................

    // $(document).on('click', '.uadvanceSec', function(e){
    //     e.preventDefault();
    
    //     let id          = $(this).data('id');
    //     let fullname    = $(this).data('fullnme');
    //     var viewmod     = "";
    //     var mod         = "";
    //     $.ajax({
    //         url : "users_act.php",
    //         method : "post",
    //         dataType : "json",
    //         data    :{
    //                   viewmod, id
    //         },
    //         success : function (data) {
    //             $('#text_prev').val(data);
    //             checkckinmodules(data);

    //             // var str = "seusupdate",
    //             // search = data,
    //             // splitArr = str.replace(/(\,\s+)/g, ',').split(','),
    //             // /* the replace method above is used to remove whitespace(s) after the comma. The str variable stays the same as the 'replace' method doesn't change the original strings, it returns the replaced one. */
    //             // l = splitArr.length,
    //             // i = 0;

    //             // for(; i < l; i++) {
    //             // if(search.indexOf(splitArr[i]) > -1 ) {
    //             //     console.log('Found a match: "' + splitArr[i] + '" at the ' + i + ' index.\n');
    //             //     }
    //             // }
    //         }
    
    //     });

    //     $('#mdl_ads_name').text(`Change Advance Security For : ${fullname}`);
    //     $('#text_prev_id').val(id);

    //     // alert(c);
      

  
    //     $('#mdl_advance_security').modal('show');

    // });
    // $(document).on('click', '.userchangeUtype', function(e){
    //     e.preventDefault();
    
    //     let id          = $(this).data('id');
    //     let fullname    = $(this).data('fullnme');
    //     let utype       = $(this).data('type');
    //     $('#type_usertype').val(utype).trigger('change');
    //     let mdl_usertype= id;
    //     $('#update_utypeid').val(id)
 
    //     $('#mdltitle3').text('Change UserType For ' + fullname);
    //     $('#mdl_changeusertype').modal('show');
    //     $("form#frm_changeutype").validate({
    //         rules: {
    //             type_usertype: {
    //                 required : true,
    //             },
    //         },
    //         messages: {
    //             type_usertype: {
    //                 required    : "Please Select Usertype",
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
    //                 if(mdl_usertype != id) {
    //                     ExceptionErroMsg("Error Found Loading Page Now");
    //                 }else{
    //                     var formData = new FormData(form);
    //                     $.ajax({
    //                         url         :   form.action,
    //                         type        :   form.method,
    //                         data        :   formData,
    //                         cache       :   false,
    //                         contentType :   false,
    //                         processData :   false,
    //                         dataType    :   "json",
    //                         beforeSend: function(){ 
    //                             $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Updating User Type ...</h1>' });
    //                     },
    //                     success: function(response) {
    //                         $.unblockUI();
    //                         if(response[0] == 1) {
    //                             toastrConfirmation(response[2], response[1], "success");
    //                             formSubmitResponse("tbl_manageusers", "frm_changeutype","mdl_changeusertype");
    //                             $(`#tbl_logs`).DataTable().ajax.reload(null,false);
    //                         }else{
    //                             toastrConfirmation(response[2], response[1], "error");
    //                         }
    //                     }            
    //                 });
    //                 }
    //             }
    //         });
    
    // });
    
    // $(document).on('click', '.useraddRoles', function(e){
    //     e.preventDefault();
    //     $("#type_userrole").prop('required',true);
    //     let id          = $(this).data('id');
    //     let fullname    = $(this).data('fullnme');
    //     let role        = $(this).data('roles');
    //     $('#type_userrole').val(role.split(',')).trigger("change");
     
    //     let mdl_userrole= id;
    //     $('#update_userroleid').val(id)
 
    //     $('#mdltitle4').text('Change Role For ' + fullname);
    //     $('#mdl_changeRole').modal('show');

    //     $("form#frm_changeRole").validate({
    //         rules: {
    //             type_userrole: {
    //                 required : true,
    //             },
    //         },
    //         messages: {
    //             type_userrole: {
    //                 required    : "Please Select User Role",
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
    //                 if(mdl_userrole != id) {
    //                     ExceptionErroMsg("Error Found Loading Page Now");
    //                 }else{
    //                     var formData = new FormData(form);
    //                     $.ajax({
    //                         url         :   form.action,
    //                         type        :   form.method,
    //                         data        :   formData,
    //                         cache       :   false,
    //                         contentType :   false,
    //                         processData :   false,
    //                         dataType    :   "json",
    //                         beforeSend: function(){ 
    //                             $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Updating User Role ...</h1>' });
    //                     },
    //                     success: function(response) {
    //                         $.unblockUI();
    //                         if(response[0] == 1) {
    //                             toastrConfirmation(response[2], response[1], "success");
    //                             formSubmitResponse("tbl_manageusers", "frm_changeRole","mdl_changeRole");
    //                             $(`#tbl_logs`).DataTable().ajax.reload(null,false);
    //                         }else{
    //                             toastrConfirmation(response[2], response[1], "error");
    //                         }
    //                     }            
    //                 });
    //                 }
    //             }
    //         });
    
    // });




    $( "#btn_adduser" ).click(function() {
        $('#mdl_add_user').modal('show');
    });
    $( ".btn_addemployee" ).click(function() {
        $('#mdl_excel').modal('show');
    });
    $( ".btn_logs" ).click(function() {
        $('#mdl_log').modal('show');
    });
    $( "#btn_reload_log" ).click(function() {
        $(`#tbl_logs`).DataTable().ajax.reload(null,false);
    });

    $( "#div_dl_template" ).click(function() {
        DownloadTemplate();
    });
    $('#inputGroupFile02').on("change", function(e){
        var myarray = [];
        myarray.push("csv");
        var ext = $(this).val().split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, myarray) == -1){
                toastrConfirmation("Please Upload csv, File Only", "Error Found", "error");
                $(this).val('');
                return false;
        }else{
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        }
    });
    $('#reg_usertype').on("change", function(e){
        let id = $(this).val();
        if(id == 2) {
            $('.accordionWrap1').show();
        }else{
            $('.accordionWrap1').hide();
        }
    });

    $("form#frm_uploadcsv").validate({
        rules: {
            inputGroupFile02: {
                required : true,
                minlength: 5
            },
        },
        messages: {

            inputGroupFile02: {
                required    : "Please Input Excel File",
            },
 
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
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
                url     : form.action,
                type    : form.method,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                // dataType: "json",
                // beforeSend: function(){ 
                //     webBlock2("Just a Moment...");
                // },
                success: function(response) {
                    alert(response)
                    // $.unblockUI();
                    // responseTosubmit(response[0], response[1], response[2], "frm_uploadcsv", "tbl_manageusers", "mdl_excel");
                }            
            });
        }
    });

    // var table2 = $('#tbl_logs').DataTable( {

    //     "scrollY"       :   "200px",
    //     "scrollCollapse":   true,
    //     "paging"        :   false,
    //     "fixedColumns"  :   true,
    //     'ajax': {
    //         'method' : 'POST',
    //         'url'    :'users_act.php',
    //         'data'   : {
    //                         tablelogs
    //                     },
    //         'deferRender': true,
    //     },
    //     'columnDefs': [
    //         { "visible": false,  "searchable": false, "targets": 0 },
    //         { "width": 200, "targets": 3 }
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


//.............................................
//...ttt...........abbb........llll............
//..tttt...........abbb........llll............
//..tttt...........abbb........llll............
//.tttttta.aaaaaa..abbbbbbbb...llll..eeeeee....
//.ttttttaaaaaaaaa.abbbbbbbbb..llll.eeeeeeee...
//..tttt.aaaa.aaaaaabbbb.bbbbb.llllleee.eeee...
//..tttt.....aaaaaaabbb...bbbb.llllleee..eeee..
//..tttt..aaaaaaaaaabbb...bbbb.llllleeeeeeeee..
//..tttt.aaaaaaaaaaabbb...bbbb.llllleeeeeeeee..
//..tttt.aaaa.aaaaaabbb...bbbb.llllleee........
//..tttt.aaaa.aaaaaabbbb.bbbbb.llllleee..eeee..
//..tttttaaaaaaaaaaabbbbbbbbb..llll.eeeeeeee...
//..tttttaaaaaaaaaaabbbbbbbb...llll..eeeeee....
//.............................................




    function format ( d ) {
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Registered Date</td>'+
                '<td>'+d.row9+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Gender</td>'+
                '<td>'+d.row6+'</td>'+
            '</tr>'+


            
        '</table>';
    }
    var table = $('#tbl_manageusers').DataTable( {
        
        'ajax': {
            'type'      : 'POST',
            'url'       :'../actions/datatables.php',
            'dataType'  : 'json',
            'data'      : {
                            form: 'frm_manageusers'
            }

        },

        'columnDefs': [
            { 
                "targets": 10, 
                "data": 'row2',
                    "render" : function(data) {
                            if(data != 0){
                                return "<button class='btn btn-danger clsremoveuser' data-toggle='tooltip' title='Remove as User'><i class='las la-user-times'></i></button>";
                            }else{
                                return "<button class='btn btn-success clsadduser' data-toggle='tooltip' title='Add as User'><i class='las la-user-plus'></i></button>";
                            }
                    },
    
                // "defaultContent": `${ (   { data: 'row2'  }  != '')  ? '' : '' }`   },
            },
              
        ],
        'columns': [
            { data: 'row1' , "visible": false  },
            {   
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": '',
            },
            { data: 'row2' , "visible":false  },
            { data: 'row3'  },
            { data: 'row4' , "visible": false },
            { data: 'row5'  },
            { data: 'row6' , "visible": false  },
            { data: 'row7'  },
            { data: 'row8'  },
            { data: 'row9' , "visible": false },
        ],
        'order'  :   [[ 0, 'desc']],
    });
        
    $('#tbl_manageusers tbody').on('click', 'td.details-control', function () {
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

    $('#tbl_manageusers tbody').on( 'click', '.clsremoveuser', function () {
        var data = table.row( $(this).parents('tr') ).data();
        var id = data['row1'];
        var removeuser="";
        var acction="remove";
        $.ajax({

            url     : "users_act.php",
            type    : "POST",
            dataType: "JSON",
            data    : {
                removeuser, id, acction
            },
            beforeSend :function() {
                webBlock2("Updating...");
            },
            success : function(response){
                $.unblockUI();
                responseTosubmit(response[0], response[1], response[2], "noform", "tbl_manageusers", "nomodal");
            }

        });
    } );
    $('#tbl_manageusers tbody').on( 'click', '.clsadduser', function () {
        var data = table.row( $(this).parents('tr') ).data();
        frm_attteneeid_id = data['row1'];
        $('#mdl_add_account').modal('show');
        
    } );

    $("form#frm_add_user").validate({
        rules: {
            reg_lname: {
                required : true
            },
            reg_fname: {
                required : true,
            },
            reg_username: {
                required : true,
                minlength: 6,
                remote: {
                    url : "select2_remote.php",
                    type: "post"
                }
            },
            reg_password: {
                required : true,
                minlength: 5
            },
            reg_repassword: {
                equalTo : "#reg_password"
            },
        },
        messages: {
            reg_lname: {
                required    : "Last Name Is Required"
            },
            reg_fname: {
                required    : "First Name Is Required"
            },
            reg_username: {
                required    : "Please Input Username",
                minlength   : "Please Input atleast 6 characters",
                remote      : "Username is not available."
            },
            reg_password: {
                required    : "Please Input Password",
                minlength   : "Please Input atleast 5 characters"
            },
            reg_repassword: {
                equalTo   : "Please Retype password Correctly"
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
                    $.blockUI({ message: '<h1> Adding User...</h1>' });
                },
                success: function(response) {
                    $.unblockUI();
                    if(response[0] == 1) {
                        toastrConfirmation(response[2], response[1], "success");
                        $('#frm_add_user').trigger("reset");
                        $('#tbl_manageusers').DataTable().ajax.reload(null,false);
                        $('#mdl_add_user').modal('hide');
                        $('.select2').val('').trigger('change');
                    }else{
                        toastrConfirmation(response[2], response[1], "error");
                    }
                }            
            });
        }
    });
});


function DownloadTemplate() {
    $("#tblshellby").table2excel({
        filename: `shellby_template${Date.now()}.xls`
    });
}
// function getUandP(id) {
//     let getUandp = "";
//     $.ajax({
//         url         :   'users_act.php',
//         method      :   'POST',
//         data        :    {
//                         getUandp,id
//         },
//         dataType    :   "json",
//         beforeSend  :   function(){
//             $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Please Wait ...</h1>' });
//         },
//         success: function(data) {
        
//             $.unblockUI();
//             $('#mdl_add_security').modal('show');
//             $.each(data, function (key, value) {
//                 var uofeaw = value[0];
//                 if (uofeaw == null || uofeaw=='') {
//                     $('#sec_username').prop('readonly', false);
//                     $('#sec_username').val("");
//                 }else{
//                     $('#sec_username').val(uofeaw);
//                     $('#sec_username').prop('readonly', true);
//                 }
//             });
//         }            
//     });
// }
