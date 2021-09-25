$(function(){


    $('form#frm_registration').validate({
        rules: {
            txt_lastname: {
                required: true,
            },
            txt_firstname: {
                required: true,
            },
            text_gender: {
                required: true,
            },
            txt_email: {
                required: true,
                email: true
            },
            txt_cpno: {
                required: true,
            },
            txt_gender: {
                required: true,
            },
        },
        messages: {
            txt_lastname: {
                required    : "Please Enter Lastname",
            },
            txt_firstname: {
                required    : "Please Enter Firstname",
            },
            text_gender: {
                required    : "Please Select Gender",
            },
            txt_email: {
                required    : "Email Address Is Required",
                email    : "Invalid Email",
            },
            txt_cpno: {
                required    : "Contact # is Required",
            },
            txt_gender: {
                required    : "Gender is Required",
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
            $.ajax({
                url     : form.action,
				type    : form.method,
				data    : $(form).serialize(),
                dataType: "json",
                beforeSend : function() {
                    $(".login-box *").prop('disabled',true);
                    webBlock2("Just A Moment...");
                },
                success: function(response) {
            
                    $(".login-box *").prop('disabled',false);
                    if(response[0] =="error") {
                        $('.customalert').removeClass('d-none alert-success').addClass('alert-danger');
                        $('#al_message').text(`${response[2]}`);
                         $.unblockUI();
                    }else{
                        window.location.href = `registration_success.php?qr=${response[3]}`;
                    }
                }
            });
        
        }
    });


    let checkWebsetup= "";
    $.ajax({
        type    : 'POST',
        url     : '../index_act.php',
        dataType:   "JSON",
        data    : {
            checkWebsetup
        },
        success: function(response){

            $.unblockUI();
            $.each(response, function (key, value) {
                let image_name     =  `../img/web/${value[0]}`;
                let image_name_m     =  `../img/web/${value[2]}`;
                let web_name       =  value[1];
                $('.prev_image, .brand-logo').attr('src', `${image_name}`);   
                $('.brand-text').text(web_name);
                $('#webloginwith').text(`Register With ${web_name}`);
                $('.shortcutico').attr('href', `${image_name_m}`);   
                
            });	
        }
    });

})