<?php
    include 'session.php';
    // if(getUsrtpe($userid,$conn) == 3) {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"seusallset",$conn) =="have" ) {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"seusmod",$conn) =="have") {
    //     header("Location: error404.php");
    // }

    include '../includes/header.php';
?>
<style>
    .table-header-rotated {
  border-collapse: collapse;
}
.table-header-rotated td {
  width: 30px;
}
 .table-header-rotated th {
  padding: 5px 10px;
}
.table-header-rotated td {
  text-align: center;
  padding: 10px 5px;
  border: 1px solid #ccc;
}
 .table-header-rotated th.rotate {
  height: 140px;
  white-space: nowrap;
}
 .table-header-rotated th.rotate > div {
  -webkit-transform: translate(25px, 51px) rotate(315deg);
      -ms-transform: translate(25px, 51px) rotate(315deg);
          transform: translate(25px, 51px) rotate(315deg);
  width: 30px;
}
 .table-header-rotated th.rotate > div > span {
  border-bottom: 1px solid #ccc;
  padding: 5px 10px;
}
.table-header-rotated th.row-header {
  padding: 0 10px;
  border-bottom: 1px solid #ccc;
}
.row-centered {
                text-align:center;
            }
.col-centered {
    display:inline-block;
    float:none;
    text-align:center;
    margin-right:-4px;
}
.pos{
    position: relative;
    top: 240px;
}
</style>
<body class="vertical-layout vertical-menu 2-columns  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">


    <!-- BEGIN: Header-->


<?php
    include '../includes/topbar.php';
    include '../includes/sidebar.php';
    // include '../modal/mdl_advance_sec.php';
    
?>



    <div class="app-content content">
        <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2">
                        <h3 class="content-header-title">Users</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Settings
                                    </li>
                                    <li class="breadcrumb-item active">Users
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right col-md-6 col-12">
                        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <!-- <h6 class="dropdown-item btn_logs" style="cursor:pointer">View Logs</h6> -->
                                <h6 class="dropdown-item btn_addemployee" style="cursor:pointer"> Add Attendee</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">
                    <!-- CODE HERE -->
                <section id="ordering">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><button class="btn btn-primary hidefromuser hidefromuser seusadd" id="btn_adduser" name="btn_adduser"> Add User</button> </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table id="tbl_manageusers" class="table table-hover table-bordered table-striped tbl_manageusers" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>#</th>
                                                        <th>UserID</th>
                                                        <th>Barcode ID</th>
                                                        <th>Employee No.</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Contact</th>
                                                        <th>Email</th>
                                                        <th>Registered Dates</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
 

  
                <!-- /. CODE HERE -->

            </div>
            </div>
        </div>
    </div>


<!-- 
//........................................................
//...................................dddd...........llll..
//...................................dddd...........llll..
//...................................dddd...........llll..
//.mmmmmmmmmmmmmm.....oooooo....ddddddddd..aaaaaa...llll..
//.mmmmmmmmmmmmmmm..ooooooooo..dddddddddd.aaaaaaaa..llll..
//.mmmmm.mmmmmmmmm..oooo.oooooddddd.dddddaaaa.aaaaa.llll..
//.mmmm..mmmm..mmmmmooo...oooodddd...dddd....aaaaaa.llll..
//.mmmm..mmmm..mmmmmooo...oooodddd...dddd.aaaaaaaaa.llll..
//.mmmm..mmmm..mmmmmooo...oooodddd...ddddaaaaaaaaaa.llll..
//.mmmm..mmmm..mmmmmooo...oooodddd...ddddaaaa.aaaaa.llll..
//.mmmm..mmmm..mmmm.oooo.oooooddddd.dddddaaaa.aaaaa.llll..
//.mmmm..mmmm..mmmm.ooooooooo..ddddddddddaaaaaaaaaa.llll..
//.mmmm..mmmm..mmmm...oooooo....ddddddddd.aaaaaaaaa.llll..
//........................................................ 
-->

    <div class="modal fade text-left hidefromuser" id="mdl_add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog" id="d_id" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel3">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="form-body">
                    <form id="frm_add_user" class="form-horizontal" method="post" action="users_act.php" autocomplete="off">
                        <input type="hidden" name="input_adduser" id="input_adduser">
                        <h4 class="form-section"><i class="ft-user"></i> Personal Information</h4>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_lname">Last Name</label>
                            <div class="col-md-9 mx-auto">
                                <input type="text" id="reg_lname" class="form-control capitalizefletter" placeholder="Last Name" name="reg_lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_fname">First Name</label>
                            <div class="col-md-9 mx-auto">
                                <input type="text" id="reg_fname" class="form-control capitalizefletter" placeholder="First Name" name="reg_fname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_mname">Middle Name</label>
                            <div class="col-md-9 mx-auto">
                                <input type="text" id="reg_mname" class="form-control capitalizefletter" placeholder="Middle Name" name="reg_mname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_suffix">Suffix</label>
                                <div class="col-md-9 mx-auto">
                            <input type="text" id="reg_suffix" class="form-control capitalizefletter" placeholder="Suffix" name="reg_suffix">
                            </div>
                        </div>


                        <input type="hidden" id="reg_modules" class="form-control" placeholder="modules" name="reg_modules">
                        
                        
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_usertype">UserType</label>
                            <div class="col-md-9 mx-auto">
                                <select class="form-control select2 sel_usertype" id="reg_usertype" name="reg_usertype" required>
                                    <option value="" selected>- Select -</option>
                                </select>
                            </div>
                        </div>

                        <h4 class="form-section"><i class="ft-lock"></i> Security</h4>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_username">Username</label>
                            <div class="col-md-9 mx-auto">
                                <input type="text" id="reg_username" class="form-control" placeholder="Username" name="reg_username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_password">Passsword</label>
                            <div class="col-md-9 mx-auto">
                                <input type="password" id="reg_password" class="form-control" placeholder="Password" name="reg_password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control" for="reg_repassword">Retype Passsword</label>
                            <div class="col-md-9 mx-auto">
                                <input type="password" id="reg_repassword" class="form-control" placeholder="ReType Password" name="reg_repassword">
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-outline-primary" value="Save User">
            </div>
                    </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left mdl_excel" id="mdl_excel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Attendee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body">
                    <div class="form-body">
                        <div class="form-group row mx-auto">
                            <label class="col-md-3 label-control">
                                <center><img src="../img/resources/img_download.ico" width="100"></center>
                           </label>
                            <div class="col-md-9">
                                Download the Excel Template from here 
                                <br>
                                <h5 class="text-primary pull-right" id="div_dl_template" style="cursor: pointer;">Download Excel Template</h5>
                        
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mx-auto">
                            <label class="col-md-3 label-control">
                                <center><img src="../img/resources/img_upload_excel.png" class="pull-left" width="100"></center> 
                            </label>
                            <div class="col-md-9">
                                <p>AFTER SUPPLYING ALL THE DETAILS IN THE DOWNLOADED EXCEL YOU CAN UPLOAD IT IN HERE.<p>
                                <hr>
                                <p class="text-danger"><b>Note*</b><br>
                                PLEASE CONVERT THE FILE TO .CSV FORMAT BEFORE UPLOADING TO PREVENT ERROR
                                </p>
                                
                                <form id="frm_uploadcsv" class="form form-horizontal frm_uploadcsv"  method="POST" action="users_act.php" enctype="multipart/form-data" autocomplete="off">   
                                    <input type="hidden" name="uploadCsv" id="uploadCsv">
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="inputGroupFile02" required>
                                            <label class="custom-file-label" for="inputGroupFile02"></label>
                                        </div>
                                    </fieldset>
                                    <!-- <div class="col-md-9 mx-auto">
                                        <input type="text" id="textruin" name="textruin" class="form-control" placeholder="Web Name">
                                    </div> -->
                                    <input type="submit" class="btn  btn-primary pull-right" value="Upload Excel">
                                </form>
                            </div>
                        </div>
                    </div>
         
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade text-left" id="mdl_add_security" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitle1"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_add_security" class="form-horizontal" method="post" action="users_act.php" autocomplete="off">
                            <input type="hidden" name="update_security" id="update_security">
                            <input type="hidden" name="sec_id" id="sec_id">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-lock"></i> Security</h4>
                         
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="sec_password">Passsword</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="password" id="sec_password" class="form-control" placeholder="Password" name="sec_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="sec_repassword">Retype Passsword</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="password" id="sec_repassword" class="form-control" placeholder="ReType Password" name="sec_repassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-danger" for="sec_yourpassword">Enter Your Password</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="password" id="sec_yourpassword" class="form-control" placeholder="For Security Purpose" name="sec_yourpassword">
                                    </div>
                                </div>

                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary" value="Update User Security">
                </div>
                </form>
            </div>
        </div>
    </div> -->

    <div class="modal fade text-left mdl_add_account" id="mdl_add_account" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ADD ACCOUNT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_add_account" class="form-horizontal frm_add_account" method="post" action="users_act.php" autocomplete="off">
                            <input type="hidden" name="update_acct" id="update_acct">
                            <!-- <input type="hidden" name="update_acctid" id="update_acctid"> -->
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-lock"></i> Security</h4>

                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="acct_usertype">UserType</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control select2 sel_usertype" id="acct_usertype" name="acct_usertype" required>
                                            <option value="" selected>- Select -</option>
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="acct_username">Username</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="acct_username" class="form-control" placeholder="Username" name="acct_username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="acct_password">Passsword</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="password" id="acct_password" class="form-control" placeholder="Password" name="acct_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="acct_repassword">Retype Passsword</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="password" id="acct_repassword" class="form-control" placeholder="ReType Password" name="acct_repassword">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control text-danger" for="acct_yourpassword">Enter Your Password</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="password" id="acct_yourpassword" class="form-control" placeholder="For Security Purpose" name="acct_yourpassword">
                                    </div>
                                </div>

                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary" value="Add Account">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade text-left" id="mdl_log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-modal="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Logs</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                    <button class="btn btn-success btn-sm" id="btn_reload_log">RELOAD</button>
                        <div class="table-responsive">
                            <table id="tbl_logs" class="table table-hover table-bordered table-striped" style="width:100%">
                                <thead style="width:100%" >
                                    <tr>
                                        <th>id</th>
                                        <th>Action</th>
                                        <th>Action By</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
     -->
    <!-- <div class="modal fade text-left" id="mdl_changeusertype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitle3"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_changeutype" class="form-horizontal" method="post" action="users_act.php" autocomplete="off">
                            <input type="hidden" name="update_usertype" id="update_usertype">
                            <input type="hidden" name="update_utypeid" id="update_utypeid">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="type_usertype">UserType</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control select2 sel_usertype" id="type_usertype" name="type_usertype" required>
                                            <option value="" selected>- Select -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary" value="Update Usertype">
                </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- <div class="modal fade text-left" id="mdl_changeRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mdltitle4"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_changeRole" class="form-horizontal" method="post" action="users_act.php" autocomplete="off">
                            <input type="hidden" name="update_userrole" id="update_userrole">
                            <input type="hidden" name="update_userroleid" id="update_userroleid">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="type_userrole">Roles</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="select2 sel_userroles" multiple="multiple" style="width:100%;" id="type_userrole" name="type_userrole[]">
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary" value="Update Roles">
                </div>
                </form>
            </div>
        </div>
    </div> -->

    <table id="tblshellby" class="d-none" cellspacing="0" cellpadding="0">
        <tr>
            <th>BARCODE ID</th>
            <th>LAST NAME</th>
            <th>FIRST NAME</th>
            <th>MIDDLE NAME</th>
            <th>SUFFIX</th>
            <th>GENDER (M OR F ONLY)</th>
            <th>CP #</th>
            <th>EMAIL ADDRESS</th>
        </tr>
    </table>


    <?php include '../includes/footer.php' ?>
    <script src="../js/users.js"></script>
    <script src="../js/select2.js"></script>
    <script src="../js/table2excel.js"></script>
</body>
