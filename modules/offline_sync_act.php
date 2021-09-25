<?php
     include '../modules/session.php';

     $conn = $pdo->open();



     
     if(isset($_POST['offlinesync'])) {

        $draw        = intval(0);
        $data        = array();

            $stmt = $conn->prepare("SELECT * FROM vw_attendance_details");
            // $stmt = $conn->prepare("SELECT * FROM vw_attendance_details WHERE cast(row2 as date) = cast(GETDATE() as date)");
            $stmt->execute();
            $records = $stmt->fetchAll();
            $data = array();
            foreach($records as $row){
                $row0           = $row['row0'];
                $row1           = $row['row1'];
                $row2           = $row['row2'];
                $row3           = $row['row3'];
                $row4           = $row['row4'];
                $row5           = $row['row5'];
                $data[] = array(
                   "row0"=>$row0,
                   "row1"=>$row1,
                   "row2"=>$row2,
                   "row3"=>$row3,
                   "row4"=>$row4,
                   "row5"=>$row5,
                );
            }

            $response = array(
                "aaData" => $data
            );

        echo json_encode($response);
        $pdo->close();
    }
?>