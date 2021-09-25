<?php
    include 'includes/session.php';
    $conn = $pdo->open();
    if(isset($_SESSION['admin_5fe2562907c4eafe29b438c1c7ddb59c8'])){
        header('location: modules/dashboard');
    }
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<!-- //....................................................................
//....................................iiii............................
//....................................iiii............................
//....................................................................
//.mmmmmmmmmmmmmm.....oooooo..rrrrrrrriiiiivvv..vvvvvmmmmmmmmmmmmm....
//.mmmmmmmmmmmmmmm..ooooooooo.rrrrrrrriiiiivvv..vvvvvmmmmmmmmmmmmmm...
//.mmmmm.mmmmmmmmm..oooo.ooooorrrrr...iiiiivvv.vvvv.vmmmm.mmmmmmmmm...
//.mmmm..mmmm..mmmmmooo...oooorrrr....iiii.vvvvvvvv.vmmm..mmmm..mmmm..
//.mmmm..mmmm..mmmmmooo...oooorrrr....iiii.vvvvvvvv.vmmm..mmmm..mmmm..
//.mmmm..mmmm..mmmmmooo...oooorrrr....iiii.vvvvvvv..vmmm..mmmm..mmmm..
//.mmmm..mmmm..mmmmmooo...oooorrrr....iiii..vvvvvv..vmmm..mmmm..mmmm..
//.mmmm..mmmm..mmmm.oooo.ooooorrrr....iiii..vvvvvv..vmmm..mmmm..mmmm..
//.mmmm..mmmm..mmmm.ooooooooo.rrrr....iiii..vvvvv...vmmm..mmmm..mmmm..
//.mmmm..mmmm..mmmm...oooooo..rrrr....iiii...vvvv...vmmm..mmmm..mmmm..
//.................................................................... -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login Page </title>
    <link rel="shortcut icon" class="shortcutico" type="image/x-icon" href="">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/icheck/custom.css">`
    <!-- END: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/select2/css/select2.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<style>
    .resizedTextbox {
        width: 100%;
        height: 200%
    }
    
</style>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column" >

    <!-- BEGIN: Header-->

    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content" id="myvideo">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="section">
                    <div class="container">
                        <?php
                            $stmt = $conn->prepare("SELECT * FROM vw_logintype");
                            $stmt->execute();
                            $count =$stmt->rowCount();
                            if($count == 0) {
                                echo "NO LOGIN TYPE FOUND";
                            }else{
                                $row = $stmt->fetchAll();

                                foreach($row as $rows) {

                                    $color = $rows['row1'];
                                    if($color == 1) {
                                        $clr = "background-color:#de0e27";
                                    }else{
                                        $clr = "background-color:#3f78de";
                                    }
                                    // echo "<button class='btn btn-primary'> ".$rows['row2']." </button></br></br>";
                                    echo"
                                        <div class='card mt-5 div_logtype' data-id=".$rows['row1']." style='$clr'>
                                            <div class='card-content text-center'>
                                                <div class='card-body'>
                                                    <div class='mt-5 mb-5 text-white' style='font-size: 500%'>
                                                       ".$rows['row2']."
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }
                            }
                        ?>
                    </div>
                    <div class="div_log_student container d-none">
                        <div class="card mt-5">
                            <div class="section">
                                <div class="container">
                                <center><img src="" class="brand-logo" alt="branding logo" width="400" height="200"></center>
                                    <form id="frm_login_stud" class="form-horizontal" action="index_act.php" method="post">
                                        <div class="form-body mt-5 mb-5">
                                            <div class="txt_visonly d-none">
                                                <div class="form-group row">
                                                    <div class="col-md-12 mx-auto">
                                                        <input type="text" id="text_1" name="text_1" class="form-control resizedTextbox" placeholder="Enter Your Student ID" style="text-align:center">
                                                    </div>
                                                </div>
                                                <br/><br/>
                                                <div class="alert customalert mb-2 d-none text-center" role="alert">
                                                    <p id="al_message"></p> 
                                                </div>
                                                <br/>
                                                <input class="btn btn-success btn-lg btn-block" type="submit" name="btn_login" id="btn_login" value="Submit" style="padding: 32px 16px;">
                                            </div>
                                            <br/>
                                            <input class="btn btn btn-danger btn-lg btn-block backlogtype" type="button" value="Back" style="padding: 32px 16px;">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                    <div class="p-1"><img src="" class="brand-logo" alt="branding logo" width="400" height="100"></div>
                                         <br> -->
                                        <!-- <img src="" class="brand-logo" alt="branding logo" width="200" height="200"> -->
                                    

                                            <!-- $stmt = $conn->prepare("SELECT image_name FROM tbl_web_setup ORDER BY id DESC LIMIT 1");
                                            $stmt->execute();
                                            $count = $stmt->rowCount();

                                            if($count == 0) {
                                                echo "<img src='img/web/no_image.png' class'brand-logo'  alt='Company Logo'width='200' height='100'>";
                                            }else{
                                                $result = $stmt->fetch();
                                                $imgpath = $result['image_name'];
                                                echo "<img src='img/web/$imgpath' class='brand-logo' alt='Company Logo' width='150' height='100'>";
                                            }

                                            $pdo->close();
                                     -->
                                  

                                    <!-- </div> -->
                                    <!-- <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span id="webloginwith"></span>
                                    </h6>
                                </div> 
                            
                                <div class="card-content">
                                    <div class="card-body">
                                        <form id="frm_login" class="form-horizontal" action="index_act.php" method="POST">

                                            <fieldset class="form-group position-relative">
                                                <select class="form-control sel_logintype" name="txt_logtype" id="txt_logtype">
                                                    <option val=""></option>
                                                </select>
                                            </fieldset> -->
        
                                            <!-- <fieldset class="form-group position-relative">
                                                <input type="text" name="txt_username" id="txt_username" class="form-control" placeholder="Username">
                                            </fieldset>
                                            <fieldset class="form-group position-relative">
                                                <input type="password" name="txt_password" id="txt_password" class="form-control" placeholder="Password">
                                            </fieldset>

                                            <div class="alert customalert mb-2 d-none" role="alert">
                                                <p id="al_message"></p>
                                            </div>
                                         

                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12">
                                                    <button type="submit" id="btn_login" name="btn_login" class="btn btn-info btn-lg btn-block">
                                                        LOGIN</button>
                                                </div>
                                            </div> -->
                                        <!-- </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <button onclick="register-advanced.html" name="btn_login" id="btn_login" class="btn btn-info btn-block btn-lg"><i class="la la-user"></i> Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->

            </div>
        </div>
    </div>

    <div class="modal fade text-left mdl_add" id="mdl_add" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alert !!!</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> -->
                </div>
                    <div class="modal-body">
                        <h1 class="text-center"><div id="modaltxt" style="font-size:450%"></h1>
                        <!-- <h1 class="text-center"><div id="modaltxt"></h1> -->
                    </div>
                <div class="modal-footer">
                    <div id="yno">
                        <button type="button" id="ans_yes" class="btn btn-outline-success">Yes</button>
                        <button type="button" id="ans_no" class="btn btn-outline-danger">No</button>
                    </div>
                    <div id="yclose" class="d-none">
                        <button type="button" id="ans_yes" class="btn btn-outline-danger"  data-dismiss="modal">Close</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <!-- <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo $web_copyright_year ?><a class="text-bold-800 grey darken-2" href="<?php echo $web_company_site ?>" target="_blank"> <?php echo $web_company ?></a></span><span class="float-md-right d-none d-lg-block"><?php echo $web_version  ?></span></p>
    </footer> -->
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="app-assets/select2/js/select2.min.js"></script>
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>


    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- <script src="app-assets/js/scripts/forms/form-login-register.js"></script> -->
    <script src="app-assets/jquery-validation/jquery.validate.js"></script>
    <script src="js/index.js"></script>
    <script src="js/functions.js"></script>
    <!-- <script src="js/select2.js"></script> -->
    <!-- <script src="includes/scripts.js"></script> -->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>