<?php
    include 'session.php';
    // if(getUsrtpe($userid,$conn) == 3) {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"seusallset",$conn) =="have" ) {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"semaintemod",$conn) =="have") {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"semainteanmod",$conn) =="have") {
    //     header("Location: error404.php");
    // }

    include '../includes/header.php';
?>

<body class="vertical-layout vertical-menu 2-columns  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">


<?php
    include '../includes/topbar.php';
    include '../includes/sidebar.php'
?>

    <!-- BEGIN: Main Menu-->

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Maintenance
                                </li>
                                <li class="breadcrumb-item active">Campus
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <!-- <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round box-shadow-2 px-2 mb-1" id="link_log" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="las la-history"></i> Logs
                        </button>
                    </div> -->
                </div>
            </div>
            <div class="content-body">
            <section id="ordering">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><button class="btn btn-primary h_mt_add hidefromuser semainteanadd" id="btn_add_asset" name="btn_add_asset"> Add Campus</button> </h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content ">
                                    <div class="card-body card-dashboard">
                                        <div class="table-responsive">
                                            <table id="tbl_campus" class="table table-hover table-bordered table-striped tbl_campus" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>#</th>
                                                        <th>Campus Name</th>
                                                        <th>Campus Address</th>
                                                        <th>Actions</th>
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

    
    <div class="modal fade text-left mdl_add" id="mdl_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Campus</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_mainte_addcampus" class="form form-horizontal frm_mainte_addcampus" method="post" action="action_maintenance.php" autocomplete="off">
                            <input type="hidden" name="input_maintecampus" id="input_maintecampus">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="text_1">Campus Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="text_1" name="text_1" class="form-control capitalizefletter" placeholder="Campus Name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="text_2">Campus Address</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea class="form-control capitalizefletter" name="text_2" id="text_2" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary" value="Save Campus">
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade text-left" id="mdl_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Asset Name</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                    
                        <form id="frm_mainte_asset_name_edit" class="form form-horizontal" method="post" action="action_maintenance.php" autocomplete="off">
                            <input type="hidden" name="input_mainteassetname_edit" id="input_mainteassetname_edit">
                            <input type="hidden" name="input_mainteassetname_id" id="input_mainteassetname_id">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="text_1_edit">Asset Name Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="text_1_edit" name="text_1_edit" class="form-control capitalizefletter" placeholder="Asset Name" >
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary btn_status" value="Update Asset Name">
                </div>
                </form>
            </div>
        </div>
    </div> -->
<!-- 
    <div class="modal fade text-left" id="mdl_log" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Logs</h4>

                </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table id="tbl_logs" class="table table-hover table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Action</th>
                                        <th>Action By</th>
                                        <th>Date</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div> -->
    
            </div>
        </div>
    </div>
    <!-- END: Content-->

        <?php include '../includes/footer.php' ?>
        <script src="../js/select2.js"></script>
        <script src="../js/maintenance_campus.js"></script>
<!-- END: Body-->

</body>
</html>
