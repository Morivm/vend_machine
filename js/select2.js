

// function sel_usertype(){
//     $(".sel_usertype").select2({
//         placeholder: "Select User Type",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_getUsertype"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_usertype').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }

// function sel_eventclass(){
//     $(".sel_eventclass").select2({
//         placeholder: "Select Type",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_eventclass"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_eventclass').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }

// function sel_eventcampus(){
//     $(".sel_eventcampus").select2({
//         placeholder: "Select Campus",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_eventcampus"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_eventcampus').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }





// /* [[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]] */



// function sel_userroles(){
//     $(".sel_userroles").select2({
//         placeholder: "Select User Roles",
//         allowClear: true,
//         width: '100%',
//         multiple:true,
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_getUserRoles"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_userroles').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }

// function sel_get_category(){
//     $(".sel_sub_category").select2({
//         placeholder: "Select Category",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_getcategory"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_sub_category').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_get_categoryedit(id){
//     $('#tx_category').html('');
//     $("#tx_category").select2({
//         placeholder: "Select Category",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_categoryedit",id
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('#tx_category').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_get_subcategory(id){
//     $('#tx_subcat').html('');
//     $("#tx_subcat").select2({
//         placeholder: "Select Sub Category",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_subgetcategory",id
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('#tx_subcat').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_get_custom_attr(){
//     $(".sel_sub_custom_attr").select2({
//         placeholder: "Select Custom Attribute",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_getcustomattr"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_sub_custom_attr').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_get_custom_attrall(){
//     $(".sel_sub_custom_attrall").select2({
//         placeholder: "Select Custom Attribute",
//         allowClear: true,
//         width: '100%'
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_getcustomattrall"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_sub_custom_attrall').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// /* ASSET */
// function sel_assetname(){
//     $(".sel_asset_name").select2({
//         placeholder: "Select Asset Name",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_name"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_name').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetcategory(){
//     $(".sel_asset_category").select2({
//         placeholder: "Select Asset Category",
//         // allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_category"
//         },
//         success:function(data){

//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_category').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetsubcategory(){
//     $(".sel_asset_subcategory").select2({
//         placeholder: "Select Asset Sub Category",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_subcategory"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_subcategory').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetlocation(){
//     $(".sel_asset_location").select2({
//         placeholder: "Select Location",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_location"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_location').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetfloor(){
//     $(".sel_asset_floor").select2({
//         placeholder: "Select Floor",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_floor"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_floor').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetroom(){
//     $(".sel_asset_room").select2({
//         placeholder: "Select Room",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_room"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_room').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_attribute(){
//     $(".selcostumattr").select2({
//         placeholder: "Select Custom Attribute",
//         // allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_customattr"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.selcostumattr').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetsupplier(){
//     $(".sel_asset_supplier").select2({
//         placeholder: "Select Supplier",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_supplier"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_supplier').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_receiver(){
//     $(".sel_asset_receiver").select2({
//         placeholder: "Select Receiver",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_receiver"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_receiver').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetnumberdispose(){
//     $(".sel_asset_number_dispose").select2({
//         placeholder: "Select Asset Number To Dispose",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_num_dispose"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_number_dispose').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetnumberlost(){
//     $(".sel_asset_number_lost").select2({
//         placeholder: "Select Asset Number that lost",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_num_lost"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_number_lost').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetnumberForrepair(){
//     $(".sel_asset_number_forrepair").select2({
//         placeholder: "Select Asset No. For Repair",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_num_forrepair"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_number_forrepair').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetnumber(){
//     $(".sel_asset_number").select2({
//         placeholder: "Select Available Asset No.",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_num"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_number').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_assetnumber_issued(){
//     $(".sel_asset_number_issued").select2({
//         placeholder: "Select Issued Asset Number",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_asset_num_issued"
//         },
//         beforeSend : function() {
//             $(this).html('');
//         },  
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_asset_number_issued').append('<option value=""></option><option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_empfullname(){
//     $(".sel_employee").select2({
//         placeholder: "Select Employee",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_employee"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_employee').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_empissuer(){
//     $(".sel_issuer").select2({
//         placeholder: "Select Issuer",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_empissuer"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_issuer').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_empapprover(){
//     $(".sel_approver").select2({
//         placeholder: "Select Approver",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_empapprover"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_approver').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_custattr_type(){
//     $(".sel_attr_type").select2({
//         placeholder: "Select Attribute",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_cust_attr_type"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_attr_type').append('<option value=' + id + '>' + name + '</option>');
//             });
//         }
//     });
// }
// function sel_transaction_type(){
//     $(".sel_trans_type").select2({
//         placeholder: "Select Transaction",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_transaction_type"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_trans_type').append(`<option value="${id}" name="${name}">${name}</option>`);
//             });
//         }
//     });
// }
// function sel_transaction_reports(){
//     $(".sel_transreports").select2({
//         placeholder: "Select Transaction Report",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_transactionreport_type"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_transreports').append(`<option value="${id}" name="${name}">${name}</option>`);
//             });
//         }
//     });
// }
// function sel_movemntassetnum(){
//     $(".sel_mvmnttransid").select2({
//         placeholder: "Select Asset Number",
//         allowClear: true,
//         width: '100%',
//     });
//     $.ajax({
//         type    : 'POST',
//         url     : `../modules/select2.php`,
//         dataType: 'json',
//         data    : {
//                     form: "sel_movement_ass_num"
//         },
//         success:function(data){
//             $.each(data, function (key, value) {
//                 var id = value[0];
//                 var name = value[1];
//                 $('.sel_mvmnttransid').append(`<option value="${id}" name="${name}">${name}</option>`);
//             });
//         }
//     });
// }