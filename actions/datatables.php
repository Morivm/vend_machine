<?php
    include '../modules/session.php';
    // include '../classes/class_custom_function.php';

    // $cnffunction = new customFunctions;
  
    $draw        = intval(0);
    $data        = array();

    $conn = $pdo->open();

    // $currently_logined =  $cnffunction->getLoginedusertype($userid,$conn); 

    if ($_POST['form']=='frm_manageusers') {
       
        // $concat_query = ($currently_logined == 1) ? "" : "AND a.type != 1";
        // $concat_query = ($currently_logined == 1) ? "" : "where type != 1";
    //     if($currently_logined == 3) {
    //         $stmt = $conn->prepare("SELECT func_get_user_role(id) as userrole,modules, func_get_user_type (type) as userstype, employee_num, username, role, id, func_fullname(id) as fullname , photo, photo_ext, func_userstatus(status) as userstatus, status, type FROM tbl_users WHERE id != :id");
    //     }else{
    //         $stmt = $conn->prepare("SELECT func_get_user_role(id) as userrole,modules, func_get_user_type (type) as userstype, employee_num, username, role, id, func_fullname(id) as fullname , photo, photo_ext, func_userstatus(status) as userstatus, status, type FROM tbl_users WHERE id != :id AND type != 1");
    //    }
        $stmt = $conn->prepare("SELECT * FROM vw_registeredusers");
        // $stmt = $conn->prepare("SELECT func_get_user_role(id) as userrole,modules, func_get_user_type (type) as userstype, employee_num, username, role, id, func_fullname(id) as fullname , photo, photo_ext, func_userstatus(status) as userstatus, status, type FROM tbl_users WHERE id != :id $concat_query");
        
        // $stmt->execute(['id'=> $userid]);
        $stmt->execute();
        $records = $stmt->fetchAll();
        $data = array();
        foreach($records as $row){
            $row1 = $row['row1'];
            $row2 = ($row['row2'] == "") ? '0' : $row['row2'];  
            $row3 = $row['row3'];
            $row4 = $row['row4'];
            $row5 = $row['row5'];
            $row6 = ($row['row6']) ? 'Male' : 'Female';  
            $row7 = $row['row7'];
            $row8 = $row['row8'];
            $row9 = $row['row9'];

            $data[] = array(
               "row1"=>$row1,
               "row2"=>$row2,
               "row3"=>$row3,
               "row4"=>$row4,
               "row5"=>$row5,
               "row6"=>$row6,
               "row7"=>$row7,
               "row8"=>$row8,
               "row9"=>$row9,
            );
        }
            $response = array(
            "aaData" => $data
        );
  
        echo json_encode($response);
    
    }

   
?>