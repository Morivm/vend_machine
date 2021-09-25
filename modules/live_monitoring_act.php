<?php
     include '../modules/session.php';

     $conn = $pdo->open();




     if(isset($_POST['tbl_events2'])) {

        $draw        = intval(0);
        $data        = array();

        $dayofweek = date('w', strtotime(date('Y-m-d')));
        
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




            $stmt = $conn->prepare("SELECT * FROM vw_live_monitoring_events WHERE row3 = :row3");
            $stmt->execute(['row3'=>$weekday]);
            $records = $stmt->fetchAll();
            $data = array();
            foreach($records as $row){
                $row1           = $row['row1'];
                $row2           = $row['row2'];
                $row3           = $row['row3'];

                $data[] = array(
                   "row1"=>$row1,
                   "row2"=>$row2,
                   "row3"=>$row3,
                );
            }

            $response = array(
                "aaData" => $data
            );

        echo json_encode($response);
        $pdo->close();
    }

?>