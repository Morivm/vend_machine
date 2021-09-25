<?php
    include 'session.php';
    // if(getUsrtpe($userid,$conn) == 3) {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"seusallset",$conn) =="have" ) {
    //     header("Location: error404.php");
    // }else if(getUsrmdodl($userid,"sewebmod",$conn) =="have") {
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
                    <h3 class="content-header-title">Web Setup</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Settings
                                </li>
                                <li class="breadcrumb-item active">Web Setup
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
                        <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2 mb-1" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons</a></div>
                    </div>
                </div> -->
            </div>
            <div class="content-body">
                <!-- card actions section start -->
                <section id="card-actions">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Choose Your Desired Setup</h4>
                                    <!-- <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-12 mb-2 text-center">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th>WEBSITE ICON<br />
                                                                    (Landscape)
                                                                </th>
                                                                <td>     
                                                                    <?php
                                                                        $stmt = $conn->prepare("SELECT top(1) image_name FROM tbl_web_setup ORDER BY id DESC");
                                                                        $stmt->execute();
                                                                        $count = $stmt->rowCount();

                                                                        if($count == 0) {
                                                                            echo "<img src='../img/web/no_image.png' alt='web_image_mobile' class='prev_image' width='210' height='80' id='prev_image'>";
                                                                        }else{
                                                                            $result = $stmt->fetch();
                                                                            $imgpath = $result['image_name'];
                                                                            echo "<img src='../img/web/$imgpath' alt='web_image_mobile' class='prev_image' width='210' height='80' id='prev_image'>";
                                                                        }

                                                                        $pdo->close();
                                                                
                                                                    ?>


<!-- 
                                                                    <img src="" alt="web_image" class="prev_image" width="210" height="80" id="prev_image">              
                                                                 -->
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>MOBILE ICON<br />
                                                                    (Portrait)
                                                                </th>
                                                                <td>

                                                                <?php
                                                                    $stmt = $conn->prepare("SELECT top(1) image_name_m FROM tbl_web_setup ORDER BY id DESC");
                                                                    $stmt->execute();
                                                                    $count = $stmt->rowCount();

                                                                    if($count == 0) {
                                                                        echo "<img src='../img/web/no_image.png' alt='web_image_mobile' class='prev_image_m' width='100' height='100' id='prev_image_m'>";
                                                                    }else{
                                                                        $result = $stmt->fetch();
                                                                        $imgpath = $result['image_name_m'];
                                                                        echo "<img src='../img/web/$imgpath' alt='web_image_mobile' class='prev_image_m' width='100' height='100' id='prev_image_m'>";
                                                                    }

                                                                    $pdo->close();
                                                            
                                                                ?>

                                                                    <!-- <img src="../img/web/no_image.png" alt="web_image_mobile" class="prev_image_m" width="100" height="100" id="prev_image" >              
                                                                 -->
                                                                
                                                                
                                                                
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                           </div>
                                            <!-- <div class="col-xl-1 col-lg-12 mb-2 text-center">
                                            Desktop Image
                                            </div>
                                            <div class="col-xl-5 col-lg-12 mb-2 text-center">
                                                <img src="../img/web/no_image.png" alt="web_image" class="prev_image" width="250" height="250" id="prev_image" >              
                                            </div> -->
                                            <div class="col-xl-6 col-lg-12">
                                                <!-- <h4 class="card-title">Web Icon</h4> -->
                                                <!-- <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFile02">Choose file</label>
                                                    </div>

                                                    <input type="submit" class="btn btn-outline-success" value="Save Setup">
                                                
                                                </form> -->
                                                <form id="frm_websetup" class="form form-horizontal frm_websetup"  method="POST" action="web_setup_act.php" enctype="multipart/form-data" autocomplete="off">
                                                
                                                <input type="text" class="hidden" name="chg_web_pht" id="chg_web_pht">
                                                <div class="form-body">
                                                  <div class="form-group row">
                                                        <label class="col-md-3 label-control mt-1">Desktop Web Icon</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="web_icon" name="web_icon">
                                                                <label class="custom-file-label custom-file-w" aria-describedby="web_icon">Choose file</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control mt-1">Mobile Web Icon</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="m_web_icon" name="m_web_icon">
                                                                <label class="custom-file-label custom-file-m" aria-describedby="m_web_icon">Choose file</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control mt-1" for="web_name">Web Name</label>
                                                        <div class="col-md-9 mx-auto">
                                                            <input type="text" id="web_name" name="web_name" class="form-control" placeholder="Web Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                    <input type="submit" class="btn  btn-primary pull-right hidefromuser sewebadd" value="Save Setup">
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- // card-actions section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

        <?php include '../includes/footer.php' ?>
        <script src="../js/web_setup.js"></script>
<!-- END: Body-->

</body>
</html>
