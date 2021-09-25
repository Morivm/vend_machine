// function oknow() {
//     alert("rr");
// }
function responseTosubmit(str_successmsg, str_title, str_body, frm_class, dtclass, modalclass) {
    $.unblockUI();
    if(str_successmsg == "success") {
        toastr.success(str_title, str_body, { "closeButton": true });
        $(`.${frm_class}`).trigger('reset');
        $(`.select2`).val('').trigger('change');
        $(`.${modalclass}`).modal('hide');
        $(`.${dtclass}`).DataTable().ajax.reload(null,false);
    }else if(str_successmsg == "error") {
        toastr.error(str_title, str_body, { "closeButton": true });
    }else {
        toastr.warning(str_title, str_body, { "closeButton": true });
    }

}
function webBlock(message) {
    $.blockUI({ 
        baseZ: 2000,
        message: `<h2><img src="img/web/busy.gif" width="70" />${message} </h2>`,
        // message: message,
        css: { 
        border: 'none', 
        padding: '25px', 
        backgroundColor: '#000', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', 
        opacity: .5, 
        color: '#fff' 
    } }); 
}
function webBlock2(message) {
    $.blockUI({ 
        baseZ: 2000,
        message: `<h2><img src="../img/web/busy.gif" width="70" />${message} </h2>`,
        css: { 
        border: 'none', 
        padding: '10px', 
        backgroundColor: '#000', 
        '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', 
        opacity: .5, 
        color: '#fff' 
    } }); 
}

// function noimageAvailable(path,classname,noimagepath,height,width){

//     // alert(path)
//     $.ajax({
//         url:    path,
//         type:'HEAD',
//         error: function()
//         {
//            $(`.${classname}`).attr('src',noimagepath).css({ 'height': height, 'width': width });
//         },
//         success: function()
//         {
//             $(`.${classname}`).attr('src',path).css({ 'height': height, 'width': width });
//         }
//     });
// }
// function swal_alert(str_type,messagestitle,messages,time,showconfbtn) {
//     Swal.fire({
//         type: str_type,
//         title: messagestitle,
//         text: messages,
//         confirmButtonClass: 'btn btn-primary',
//         buttonsStyling: false,
//         timer: time,
//         showConfirmButton: showconfbtn,
//       })
// }
// function swalType(str_title, str_text,str_type,str_btncolor) {
//     Swal.fire({
//         title: str_title,
//         text: str_text,
//         type: str_type,
//         confirmButtonClass: `btn btn-${str_btncolor}`,
//         buttonsStyling: false,
//     });
// }
function getUserphoto(userphoto,photo_ext){ 
    if (userphoto == "") {
        return "../img/users/noimage.png"
    }else{
        return `../img/users/${userphoto}.${photo_ext}`;
    }
}
function getWebphoto(webphoto){
    if (webphoto == "") {
        return "../img/web/no_image.png"
    }else{
        return `../img/web/${webphoto}`;
    }
}
function toastrConfirmation(Str_txt_title, Str_Txt_msg, Str_type) {

    if(Str_type == "success") {
        toastr.success(Str_txt_title, Str_Txt_msg, { "closeButton": true });
    }else if(Str_type == "info") {
        toastr.info(Str_txt_title, Str_Txt_msg, { "closeButton": true });
    }else if(Str_type == "warning") {
        toastr.warning(Str_txt_title, Str_Txt_msg, { "closeButton": true });
    }else  if(Str_type == "error") {
        toastr.error(Str_txt_title, Str_Txt_msg, { "closeButton": true });
    }
}
// function newSuccesMessage(Str_type, Str_txt_title, Str_Txt_msg ) {

//     if(Str_type == "success") {
//         toastr.success(Str_txt_title, Str_Txt_msg, { "closeButton": true });
//     }else if(Str_type == "info") {
//         toastr.info(Str_txt_title, Str_Txt_msg, { "closeButton": true });
//     }else if(Str_type == "warning") {
//         toastr.warning(Str_txt_title, Str_Txt_msg, { "closeButton": true });
//     }else  if(Str_type == "error") {
//         toastr.error(Str_txt_title, Str_Txt_msg, { "closeButton": true });
//     }
// }
function readImageselected(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.prev_image,.previewimg,#previewimg2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readImageselected2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.prev_image_m').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function pageLocation(li_parent, li_child, li_webtitle) {
    if (!li_parent == null || !li_parent=='') {
        $(`#${li_parent}`).addClass('has-sub menu-collapsed-open open');
    }
    if (!li_child == null || !li_child=='') {
        $(`#${li_child}`).addClass('active');
    }
    if (!li_webtitle == null || !li_webtitle=='') {
        $('.webTitle').text(`${li_webtitle}`);
    }
}
function removEonStatus(str_btn,str_modalid,status) {
    if (status == "Deleted") {
        swal.close();
        $.blockUI({ message: '<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> Error Found Reloading Page...</h1>' });
        $(`.${str_btn}`).remove();
        $(`#${str_modalid}`).remove();
        setTimeout(function(){ location.reload(); }, 2000);
     
    }
}
// function ExceptionErroMsg(StrMsg) {
//     $.blockUI({ message: `<br><div class="spinner-border text-secondary" role="status">  <span class="sr-only">Loading...</span> </div><h1> ${StrMsg}</h1>` });
//     setTimeout(function(){ location.reload(); }, 2000);
     
// }
function hidefromUser(typeid) {
    if(typeid == 3) {
        $('.hidefromuser').remove();
    }
}
// function hidesweetalrt(typeid) {
//     if(typeid == 2) {
//         toastrConfirmation("Error", "User Is not Allowed To Delete Data", "error"); 
//     }
// }
function hideComponents(modulesdb) {
    var val= modulesdb;
    var array = val.split(' ');
    
    if(modulesdb.length == 1) {
    }else {
        for (i=1;i<array.length;i++){
            $(`.${array[i]}`).remove();
            $(`.${array[i]}`).prop( "checked", false );
        }
    }
}
// function checkckinmodules(modulesdb) {
//     var val= modulesdb;
//     var array = val.split(' ');
//     if(modulesdb.length == 1) {
//     }else {
//         for (i=1;i<array.length;i++){
//             $(`.${array[i]}`).prop( "checked", false );
//             // $(`.${array[i]}`).prop( "checked", false );
//         }
//     }
// }

// function formSubmitResponse(str_table_id, str_formid,str_modalid){ 
//     // $('.select2').val('').trigger('change');
//     if (str_table_id) {
//         $(`#${str_table_id}`).DataTable().ajax.reload(null,false);
//     }else{
 
//     }
//     if (str_formid) {
//         $(`#${str_formid}`).trigger("reset");
//     }else{
    
//     }
//     if (str_modalid) {
//         $(`#${str_modalid}`).modal('hide');
//     }else{
        
//     }
// }
// function makeUngiquid(length) {
//     // var getlastInsertedid = "";
//     // $.ajax({
//     //     url : "../modules/transact_add_asset_act.php",
//     //     type : "POST",
//     //     dataType : "JSON",
//     //     data : {
//     //         getlastInsertedid
            
//     //     },
//     //     success : function(response){
//     //         return response[1];
//     //     }
//     // })


//     var result           = '';
//     var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789' + $.now();
//     var charactersLength = characters.length;
//     for ( var i = 0; i < length; i++ ) {
//        result += characters.charAt(Math.floor(Math.random() * charactersLength));
//     }
//     return result;
//  }
// function webBlocker(message){
//     $.blockUI({ 
//         // baseZ: 2000,
//         // message : message,
//         // css: { 
//         // border: 'none', 
//         // padding: '25px', 
//         // backgroundColor: '#000', 
//         // '-webkit-border-radius': '10px', 
//         // '-moz-border-radius': '10px', 
//         // opacity: .5, 
//         // color: '#fff' 


//         message: `<h2><img src="../img/web/busy.gif" width="80" />${message} </h2>`,css: { 
//         border: 'none', 
//         // padding: '25px', 
//         backgroundColor: '#000', 
//         '-webkit-border-radius': '10px', 
//         '-moz-border-radius': '10px', 
//         opacity: .5, 
//         color: '#fff' 
//     } }); 
// }
// function EmptyStr(value,str_textid) {
//     if (value) {
//         $(`#${str_textid}`).text(value).removeClass('text-danger');
//     }else{
//         $(`#${str_textid}`).text("No Details").addClass('text-danger');
//     }
// }
// function getAssetphoto(asset_loc,asset_photo){ 
//     if (asset_photo == "") {
//         return "../img/web/no_image.png"
//     }else{
//         return `${asset_loc}/${asset_photo}`;
//     }
// }
// function viewCustomAttributes(id) {

//     let view_customAttr = "";
//     $.ajax({
//         url         :   'transact_asset_issuance_act.php',
//         type        :   'POST',
//         data        :   {
//                             view_customAttr, id
//                         },
//         dataType    :   "json",
//         beforeSend  :function() {
//             $('#tBody').html("");
//         },
//         success: function(resp) {
//             var trHTML = '';
//             $.each(resp, function (i, aaData) {
//                 for (i = 0; i < resp.aaData.length; i++) {
//                     trHTML +=
//                         '<tr><td>'
//                         + resp.aaData[i].array0
//                         + '</td><td>'
//                         + resp.aaData[i].array1
//                         + '</td><td>';
//                 }
//             });
//             $('#tBody').append(trHTML);
//         }  
//     });       
// }
// function getDetails(id) {
//     if (id > 0) {
//         get_assetdetails = "";
//         $.ajax({
//             url         :   'transact_asset_issuance_act.php',
//             type        :   'POST',
//             data        :   {
//                                 get_assetdetails,id
//                             },
//             dataType    :   "json",
//             beforeSend: function(){ 
//                 webBlocker("Fetching Details...");
//             }, 
//             success: function(response) {
//                 $('.tablehide').show();
//                 $.unblockUI();
//                 $.each(response, function (key, value) {
//                     let asset_no        = value[0];     
//                     let category_name   = value[1];
//                     let subcat_name     = value[2];
//                     let photo           = value[3];
//                     let rfid            = value[4];
//                     let serial          = value[5];
//                     let customid        = value[6];
//                     let assetnum        = value[7];
//                     let location        = value[8];
//                     let floor           = value[9];
//                     let room            = value[10];
//                     let dr_no           = value[11];
//                     let dr_date         = value[12];
//                     let si_no           = value[13];
//                     let si_date         = value[14];
//                     let po_no           = value[15];
//                     let po_date         = value[16];
//                     let supplier        = value[17];
//                     let receivedby      = value[18];
//                     let receiveddate    = value[19];

//                     EmptyStr(category_name,"issue_category");
//                     EmptyStr(subcat_name,"issue_subcategory");
//                     $('#issue_photo').attr("src", getAssetphoto("../img/asset_img",photo));
//                     EmptyStr(rfid,"issue_rfid");
//                     EmptyStr(serial,"issue_serial");
//                     EmptyStr(location,"issue_location");
//                     EmptyStr(floor,"issue_floor");
//                     EmptyStr(room,"issue_room");
//                     EmptyStr(dr_no,"issue_drrefno");
//                     EmptyStr(dr_date,"issue_drdate");
//                     EmptyStr(si_no,"issue_sirefno");
//                     EmptyStr(si_date,"issue_sidate");
//                     EmptyStr(po_no,"issue_porefno");
//                     EmptyStr(po_date,"issue_podate");
//                     EmptyStr(supplier,"issue_supplier");
//                     EmptyStr(receivedby,"issue_receivedby");
//                     EmptyStr(receiveddate,"issue_receiveddate");

//                 });
//             }  
//         });       
//     }else{
//         $('.tablehide').hide();
//     }
// }
// function countDatatableColumn(str_datatableid) {
//     var tbl_tmp = $(`#${str_datatableid}`).DataTable();
//     if ( ! tbl_tmp.data().count() ) {
//         return false;
//     }else{
//         return true;
//     }
// }
// (function($) {
//     $.fn.inputFilter = function(inputFilter) {
//       return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
//         if (inputFilter(this.value)) {
//           this.oldValue = this.value;
//           this.oldSelectionStart = this.selectionStart;
//           this.oldSelectionEnd = this.selectionEnd;
//         } else if (this.hasOwnProperty("oldValue")) {
//           this.value = this.oldValue;
//           this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
//         } else {
//           this.value = "";
//         }
//       });
//     };
// }(jQuery));
// // function onReturnSubmit(response1,str_table_id,str_form_id,str_modal_id) {
// //     if (response1 == 2) {
// //         setTimeout(function(){ 
// //             location.reload();
// //             $(`#${str_table_id}`).DataTable().ajax.reload(null,false);
// //             $(`#${str_form_id}`).trigger("reset");
// //             $(`#${str_modal_id}`).modal('hide');
        
// //         }, 3000);
      
// //     }else if(response1 == 1){
// //         $(`#${str_table_id}`).DataTable().ajax.reload(null,false);
// //         $(`#${str_form_id}`).trigger("reset");
// //         $(`#${str_modal_id}`).modal('hide');
// //     }

// // }
// function commaSeparateNumber(val){
//     while (/(\d+)(\d{3})/.test(val.toString())){
//       val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
//     }
//     return val;
// }
// function blockCardfirst(str_card_id) {
//     $(`#${str_card_id}`).block({
//       message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
//         overlayCSS: {
//             backgroundColor: "#fff",
//             opacity: 0.8,
//             cursor: "wait"
//         },
//         css: {
//             border: 0,
//             padding: 0,
//             backgroundColor: "transparent"
//         }
//     });
// }
// function UnblockCard(str_card_id) {
//     $(`#${str_card_id}`).block({
//         timeout: 0001,
//         message: '',
//         overlayCSS: {
//             backgroundColor: "#fff",
//             opacity: 0.8,
//             cursor: "wait"
//         },
//     });
// }
// function queryCount(url,type,isset_name,view,view_id,w_card,card_id){

//     $.ajax({
//             url         :   url,
//             type        :   type,
//             data        :   isset_name,
//             dataType    :   "json",
//             beforeSend :function () {
//                 if(w_card) {
//                     blockCardfirst(card_id);
//                 }else{
//                 }
//             },
//         success: function(response) {
//             UnblockCard(card_id)
//             if(view == "input") {
//                 $(`#${view_id}`).val(response);
//             }else if(view == "text") {
//                 $(`#${view_id}`).text(response);
//             }
//         }            
//     });
//     return false
// }

// function getAlert(card){
//     // alert('Here\'s an alert!');
// }

// function viewInselect2(select2_id, str_placeholder,withclear ) {
//     $(`#${select2_id}`).select2({
//         placeholder: str_placeholder,
//         allowClear: withclear,
//         width: '100%',
//     });
// }
// function viewInselect2Class(select2_clsname, str_placeholder,withclear ) {
//     $(`.${select2_clsname}`).select2({
//         placeholder: str_placeholder,
//         allowClear: withclear,
//         width: '100%',
//     });
// }
// function PrintElem(elem)
// {

//     // var mywindow = window.open('', 'PRINT', 'height=400,width=600');
//     var mywindow = window.open('', 'PRINT');
//     // mywindow.document.write('<html><head><title>' + document.title  + '</title>');
//     // mywindow.document.write('</head><body >');
//     // mywindow.document.write('<h1>' + document.title  + '</h1>');
//     mywindow.document.write(document.getElementById(elem).innerHTML);
//     // mywindow.document.write('</body></html>');

//     mywindow.document.close(); // necessary for IE >= 10
//     mywindow.focus(); // necessary for IE >= 10*/

//     mywindow.print();
//     mywindow.close();

//     return true;
// }