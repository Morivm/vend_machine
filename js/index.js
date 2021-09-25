$(function(){

    $('.div_logtype').click(function(){
        var c = $(this).data('id');
        $('.div_logtype').addClass('hidden');
        if(c == 1) {     
            $('#frm_login_stud').trigger("reset");
            $('.div_log_student').removeClass('d-none');
            $('.txt_visonly').removeClass('d-none')
        }else if(c == 2) {
            $('.div_log_student').removeClass('d-none');
            $('.txt_visonly').addClass('d-none')
            $('#mdl_add').modal("show");
            $('#modaltxt').html("Is This a Paper?");
        }
    });

    $('#ans_yes').click(function(){
        $('#modaltxt').html("Please Use Entrance 2");
        $('#yno').addClass("d-none");
        $('#yclose').removeClass('d-none');
        checkif_exsitGbg();
    });

    $('#ans_no').click(function(){
        $('#modaltxt').html("Please Use Entrance 1");
        $('#yno').addClass("d-none");
        $('#yclose').removeClass('d-none');
        checkif_exsitGbg();
    });

    $('.backlogtype').click(function(){
        $('.div_log_student').addClass('d-none');
        $('.div_logtype').removeClass('hidden');
        $('.customalert').addClass('d-none alert-danger');
    });

        
    $('form#frm_login_stud').validate({
        rules: {
            text_1: {
                required: true,
            },

        },
        messages: {
            text_1: {
                required    : "Please Enter Your Student ID",
            },
        },
        errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.col-md-12').append(error);
        },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }, 
        submitHandler: function(form) {

            $.ajax({
                url     : form.action,
				type    : form.method,
				data    : $(form).serialize(),
                dataType: "json",    
                beforeSend : function() {
                    $(".login-box *").prop('disabled',true);
                    webBlock("Just A Moment ...");
                },
                success: function(response) {
                    $(".login-box *").prop('disabled',false);
                    if(response[0] =="error") {
                        $('.customalert').removeClass('d-none alert-success').addClass('alert-danger');
                        $('#al_message').text(`${response[2]}`);
                         $.unblockUI();
                    }else{  
                        window.location.href = "modules/main_dashboard.php";
                    }

                }
            });
        
        }
    });






    let checkWebsetup= "";
    $.ajax({
        type    : 'POST',
        url     : 'index_act.php',
        dataType:   "JSON",
        data    : {
            checkWebsetup
        },
        success: function(response){

            $.unblockUI();
            $.each(response, function (key, value) {
                let image_name     =  `img/web/${value[0]}`;
                let image_name_m     =  `img/web/${value[2]}`;
                let web_name       =  value[1];
                $('.prev_image, .brand-logo').attr('src', `${image_name}`);   
                $('.brand-text').text(web_name);
                $('#webloginwith').text(`${web_name}`);
                $('.shortcutico').attr('href', `${image_name_m}`);   
                
            });	
        }
    });



})
function get_tbl_logintype() {
    var get_logintype = "";
    $(".sel_logintype").select2({
        placeholder: "Select Type",
        allowClear: true,
        width: '100%'
    });
    $.ajax({
        type    : 'POST',
        url     : `index_act.php`,
        dataType: 'json',
        data    : {
                get_logintype
        },
        success:function(data){
            $.each(data, function (key, value) {
                var id = value[0];
                var name = value[1];
                $('.sel_logintype').append('<option value=' + id + '>' + name + '</option>');
            });
        }
    });
}

function checkif_exsitGbg(){
    setTimeout(function(){ 
    $('#modaltxt').html("Please Wait ...");

        setTimeout(function(){ 
            $('#modaltxt').html("Please Wait For Your Receipt.");

                setTimeout(function(){ 
                    $('#modaltxt').html("Thanks for saving the Environment.");

                    setTimeout(function(){ 
                        window.location.href = "index.php";
                            
                    }, 2000);
                        
                }, 5000);
                
        }, 5000);

     }, 3000);
}