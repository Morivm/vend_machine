$(function(){
    // $('.webTitle').text("Web Setup");
    pageLocation("", "web_setup", "Web Setup");
    $('#web_icon').on("change", function(e){
        var myarray = [];
        var fileName = e.target.files[0].name;
        myarray.push("jpg","png","jfif");
        var ext = $(this).val().split('.').pop().toLowerCase();
        // if(ext != 'jpg') {
        if(jQuery.inArray(ext, myarray) == -1){
                toastrConfirmation("Please Upload jpg, png, jfif file types only", "Error On Image", "error");
                $(this).val('');
                $('#prev_image').attr('src', '../img/web/no_image.png');
                return false;
        }else{
            readImageselected(this);
            $('.custom-file-w').html(fileName);
        }
    });
    $('#m_web_icon').on("change", function(e){
        var myarray = [];
        var fileName = e.target.files[0].name;
        myarray.push("jpg","png","jfif");
        var ext = $(this).val().split('.').pop().toLowerCase();
        // if(ext != 'jpg') {
        if(jQuery.inArray(ext, myarray) == -1){
                toastrConfirmation("Please Upload jpg, png, jfif file types only", "Error On Image", "error");
                $(this).val('');
                $('#prev_image_m').attr('src', '../img/web/no_image.png');
                return false;
        }else{
            readImageselected2(this);
            $('.custom-file-m').html(fileName);
        }
    });

    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param) 
    }, 'File size must be less than 1mb');    

    $("form#frm_websetup").validate({
        rules: {
            web_icon: {
                accept: "image/png, image/jpeg",
                filesize : 1048576,
                required : true,
                // required :true
            },
            m_web_icon: {
                accept: "image/png, image/jpeg",
                filesize : 1048576,
                required : true,
                // required :true
            },
            web_name: { 
                required : true,
            }
        },
        messages: {
            web_icon :{
                accept: "Allowed File Types Are .jpg, png. jpeg",
                required : "Please Choose Your Web Icon"
            },
            m_web_icon :{
                accept: "Allowed File Types Are .jpg, png. jpeg",
                required : "Please Choose Your Mobile Web Icon"
            },
            web_name :{
                required : "Please Enter Your Web page name",
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
                url     : form.action,
                type    : form.method,
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function(){ 
                    webBlock2("Applying Changes ...");
                },
                success: function(response) {
        
                    $.unblockUI();
                    if(response[0] == "success") {
                        responseTosubmit(response[0], response[1], response[2], "frm_websetup", "no table", "no modal");
                        $(".custom-file-label").html('');
                        setTimeout(function(){ location.reload(); }, 3000);
                    }else{
                        responseTosubmit(response[0], response[1], response[2], "no form", "no table", "no modal");
                    }

                }            
            });
        }
    });

});