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
                                <li class="breadcrumb-item active">Create Events
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
                                    <h4 class="card-title"><button class="btn btn-primary h_mt_add hidefromuser semainteanadd" id="btn_add_asset" name="btn_add_asset"> Add Event</button> </h4>
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
                                            <table id="tbl_events" class="table table-hover display table-bordered table-striped tbl_events" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>#</th>
                                                        <th>Event Name</th>
                                                        <th>Campus</th>
                                                        <th>Type</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        <th>Event Description</th>
                                                        <th>Campus</th>
                                                        <th>classification</th>
                                                        <th>starttime</th>
                                                        <th>endtime</th>
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

    <!-- #################################################ADD######################################## -->
    <div class="modal fade text-left mdl_add" id="mdl_add">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Event Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_mainte_addevent" class="form form-horizontal frm_mainte_addevent" method="post" action="action_maintenance.php" autocomplete="off">
                            <div class="form-body">
                                <input type="hidden" name="input_mainteevents" id="input_mainteevents">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="text_1">Event Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="text_1" name="text_1" class="form-control capitalizefletter" placeholder="Event Name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="text_9">Campus</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control sel_eventcampus select2" name="text_9" id="text_9">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="text_5">Event Type</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control sel_eventclass select2" name="text_5" id="text_5">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                    <div id="hidediv">
                                        <div class="form-group row d-none" id="div_startdate">
                                            <label class="col-md-3 label-control" for="text_6">Start - End Date</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" style="background-color:white" class="form-control" id="text_6" name="text_6" readonly="readonly" >
                                            </div>
                                        </div>
                                        <div class="form-group row d-none" id="div_startime">
                                            <label class="col-md-3 label-control" for="text_2">Start Time</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="time"  class="form-control" id="text_2" name="text_2" value="">
                                            </div>
                                        </div>
                
                                            <!-- <label class="col-md-3 label-control" for="text_8">End Date</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="text" class="form-control" id="text_8" name="text_8">
                                            </div> -->
                                    
                                        <div class="form-group row d-none" id="div_endtime">
                                            <label class="col-md-3 label-control" for="text_3">End Time</label>
                                            <div class="col-md-9 mx-auto">
                                                <input type="time" class="form-control" id="text_3" name="text_3" value="" placeholder="Ex">
                                            </div>
                                        </div>
                                    </div>
                         
                                <div class="form-group row d-none" id="div_desc">
                                    <label class="col-md-3 label-control" for="text_4">Description</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea class="form-control" name="text_4" id="text_4" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit"  class="btn btn-outline-primary" value="Submit">
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- #################################################EDIT######################################## -->
    <!-- <div class="modal fade text-left mdl_edit" id="mdl_edit">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="frm_mainte_editevent" class="form form-horizontal frm_mainte_editevent" method="post" action="action_maintenance.php" autocomplete="off">
                            <input type="hidden" name="input_editmainteevents" id="input_editmainteevents">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="edittext_1">Event Name</label>
                                    <div class="col-md-9 mx-auto">
                                        <input type="text" id="edittext_1" name="edittext_1" class="form-control capitalizefletter" placeholder="Event Name" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="edittext_9">Campus</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control sel_eventcampus select2" name="edittext_9" id="edittext_9">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="edittext_5">Event Type</label>
                                    <div class="col-md-9 mx-auto">
                                        <select class="form-control sel_eventclass select2" name="edittext_5" id="edittext_5">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row d-none" id="div_startdate">
                                        <label class="col-md-3 label-control" for="edittext_6">Start Date</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" id="edittext_6" name="edittext_6">
                                        </div>
                                    </div>
                                    <div class="form-group row d-none" id="div_startime">
                                        <label class="col-md-3 label-control" for="edittext_2">Start Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="time" class="form-control" id="edittext_2" name="edittext_2">
                                        </div>
                                    </div>
                                    <div class="form-group row d-none" id="div_enddate">
                                        <label class="col-md-3 label-control" for="edittext_8">End Date</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="text" class="form-control" id="edittext_8" name="edittext_8">
                                        </div>
                                    </div>
                                    <div class="form-group row d-none" id="div_endtime">
                                        <label class="col-md-3 label-control" for="edittext_3">End Time</label>
                                        <div class="col-md-9 mx-auto">
                                            <input type="time" class="form-control" id="edittext_3" name="edittext_3">
                                        </div>
                                    </div>
                            
                                <div class="form-group row d-none" id="div_desc">
                                    <label class="col-md-3 label-control" for="edittext_4">Description</label>
                                    <div class="col-md-9 mx-auto">
                                        <textarea class="form-control" name="edittext_4" id="edittext_4" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-outline-primary" value="Update Event">
                </div>
                </form>
            </div>
        </div>
    </div> -->






            </div>
        </div>
    </div>
    <!-- END: Content-->

        <?php include '../includes/footer.php' ?>
        <script src="../js/select2.js"></script>
        <script src="../js/maintenance_events.js"></script>
<!-- END: Body-->

</body>
</html>
