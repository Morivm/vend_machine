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
<style>
    .card{
    margin-bottom: 10px;
    }
</style>
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
                                <li class="breadcrumb-item active">Live Monitoring
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
<section id="event_with_classification">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="font-weight-bold"> <?php   echo  date("F j, Y"); ?> </h1>
                    <h3><span id='time'></span></h3>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <?php 
                            $conn = $pdo->open();
                            $dayofweek = date('w', strtotime(date('Y-m-d')));

                            function selectCampusid($conn,$weekday,$campusname) {
                                $output = "";

                                try{
                                    $stmt2 = $conn->prepare("SELECT 
                                                                c.event_name,
                                                                count(*) as totalcount
                                                            FROM
                                                                tbl_attendance a 
                                                            LEFT JOIN 
                                                                tbl_mainte_events c ON c.id = a.event_id
                                                            WHERE a.event_id = (SELECT b.id
                                                                                FROM 
                                                                                    tbl_mainte_events b
                                                                                WHERE
                                                                                    b.event_classification = :event_classification 
                                                                                AND b.id= a.event_id GROUP BY b.id)
                                                        
                                                            AND c.event_campus_id = (SELECT d.id FROM tbl_mainte_campus_id d WHERE d.campus_name=:campus_name )
                                                            AND cast(a.attendance_date_time AS DATE) = cast(getdate() AS DATE)
                                                            AND c.deleteby IS NULL
                                                            GROUP BY a.event_id, c.event_name, c.id
                                                            ORDER BY c.id DESC
                                                            
                                                            ");
                                    $stmt2->execute(['event_classification'=>$weekday, 'campus_name'=>$campusname]);
                                    $count = $stmt2 ->rowCount();
                                        if($count == 0) {
                                            $output .= 
                                                " 
                                                ";
                                        }else{
                                            $result = $stmt2->fetchAll();

                                            foreach ($result as $row) {
                                                $event_name = $row['event_name'];
                                                $totalcount = $row['totalcount'];

                                                $output .= 
                                                "   <tbody>
                                                        <tr style='border :0px'>
                                                            <td>$event_name</td>
                                                            <td>$totalcount</td>
                                                        </tr>
                                                    </tbody>
                                                ";
                                            }

                                        }
                                }catch(PDOException $e) {
                                    $output = $e->getMessage();
                                }
                                return $output;
                                $pdo->close();
                            }


                            function selectCampusidCustom($conn,$weekday,$campusname) {
                                $output = "";

                                try{
                                    $stmt2 = $conn->prepare("SELECT 
                                                                c.event_name,
                                                                count(*) as totalcount
                                                            FROM
                                                                tbl_attendance a 
                                                            LEFT JOIN 
                                                                tbl_mainte_events c ON c.id = a.event_id
                                                            WHERE CAST( GETDATE() AS Date )  BETWEEN c.event_date_start and c.event_date_end
                                                            AND c.event_campus_id = (SELECT d.id FROM tbl_mainte_campus_id d WHERE d.campus_name=:campus_name )
                                                            AND cast(a.attendance_date_time AS DATE) = cast(getdate() AS DATE)
                                                            AND c.deleteby IS NULL
                                                            GROUP BY a.event_id, c.event_name, c.id
                                                            ORDER BY c.id DESC
                                                            
                                                            ");
                                    $stmt2->execute(['campus_name'=>$campusname]);
                                    $count = $stmt2 ->rowCount();
                                        if($count == 0) {
                                            $output .= 
                                                "  
                                                ";
                                        }else{
                                            $result = $stmt2->fetchAll();

                                            foreach ($result as $row) {
                                                $event_name = $row['event_name'];
                                                $totalcount = $row['totalcount'];

                                                $output .= 
                                                "   <tbody>
                                                        <tr style='border :0px'>
                                                            <td>$event_name</td>
                                                            <td>$totalcount</td>
                                                        </tr>
                                                    </tbody>
                                                ";
                                            }

                                        }
                                }catch(PDOException $e) {
                                    $output = $e->getMessage();
                                }
                                return $output;
                                $pdo->close();
                            }

                            

                            if ( $dayofweek  == 1) {
                                $weekday = 1;
                            }else if ( $dayofweek  == 2) {
                                $weekday = 2;
                            }else if ( $dayofweek  == 3) {
                                $weekday = 3;
                            }else if ( $dayofweek  == 4) {
                                $weekday = 4;
                            }else if ( $dayofweek  == 5) {
                                $weekday = 5;
                            }else if ( $dayofweek  == 6) {
                                $weekday = 6;
                            }else if ( $dayofweek  == 7) {
                                $weekday = 7;
                            }


                            try {
                                $stmt = $conn->prepare("SELECT  b.campus_name FROM tbl_mainte_events a
                                                        LEFT JOIN tbl_mainte_campus_id b on b.id = a.event_campus_id
                                                        WHERE CAST( GETDATE() AS Date )  between a.event_date_start and a.event_date_end
                                                        OR  a.event_classification = :event_classification
                                                        AND a.deleteby IS NULL
                                                        AND b.deleteby is null
                                                        group by  b.campus_name");
                                $stmt->execute(['event_classification'=>$weekday]);
                                $countevent = $stmt->rowCount();

                                if($countevent == 0) {
                                    echo "<h1 class='text-danger font-weight-bold text-center'>No Events For Today</h1><br />";
                                }else{
                                    $result = $stmt->fetchAll();
                            ?>
                                <div class="row">
                                    <?php foreach($result as $row){ ?>
                                        <div class="col-6 col-md-6 col-lg-6">
                                            <div class="card">
                                                <div class="img-container"></div>
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Campus/Service <?php echo $row['campus_name'] ?></th>
                                                                    <th>HeadCount</th>
                                                                </tr>
                                                            </thead>
                                                                <?php echo selectCampusid($conn,$weekday, $row['campus_name'] ) ?>
                                                                <?php echo selectCampusidCustom($conn,$weekday, $row['campus_name'] ) ?>

                                                                
                                                        </table>
                                                    </div>
                                            </div>
                                        </div>
                            <?php
                                    }

                                    }
                                    }catch(PDOException $e) {
                                        echo $e->getMessage();
                                    }
                                    $pdo->close();
                            ?>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    


            </div>
        </div>
    </div>
    <!-- END: Content-->

        <?php include '../includes/footer.php' ?>

        <script src="../js/live_monitoring.js"></script>
<!-- END: Body-->

</body>
</html>
