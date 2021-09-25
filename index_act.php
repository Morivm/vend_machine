<?php
include "includes/session.php";


$conn = $pdo->open();



if(isset($_POST['get_logintype'])) {
    try {
        $stmt = $conn->prepare("SELECT * FROM vw_logintype");
        $stmt->execute();
            while ($row = $stmt->fetchObject()) {
                $output[] = array(
                    $row->row1,
                    $row->row2,
                );
            }
        }catch (PDOException $e) {
            $output = die($e->getMessage());
        }
    echo json_encode($output);
    exit();
    $pdo->close();
}

if(isset($_POST['btn_login'])) {

    $student_id = $_POST['text_1'];

    try{
        $stmt = $conn->prepare("SELECT * FROM vw_students WHERE row2 = :row2");
        $stmt->execute(['row2'=>$student_id]);
        $count =$stmt->rowCount();

        if($count == 0) {
            $output = array("error","Error Found", "Student No. Not Found");
        }else{
            $row = $stmt->fetch();
            $output = array("success","Login Success", "Redirecting...");
            $_SESSION['admin_5fe2562907c4eafe29b438c1c7ddb59c83211132932'] = $row['row2'];
            
        }

        // if($count != 0) {
        //     $row = $stmt->fetch();
        //     if($row['userstatus']) {
        //         if(password_verify($password ,$row['password'])){
        //             $_SESSION['admin_5fe2562907c4eafe29b438c1c7ddb59c843k3k23k29932'] = $row['id'];
        //             $_SESSION['admin_type5fe2562907c4eafe29b438c1c7ddb59c843k3k2343'] = $row['type'];
        //             $output = array("success","Login Success","Welcome Back");
        //         }
        //         else{
        //             $output = array("error",'Incorrect Username or Password.','Please Type your Credential Correctly');
        //         }
        //     }else{
        //         $output = array("error",'User Not Found','Please Type your Credential Correctly');
        //     }
        // }else{

        //     $output = array("error",'User Not Found','Please Type your Credential Correctly');
        // }
    }catch(PDOException $e){
        $output = array(0,"There is some problem in connection: ", $e->getMessage());
    }


    // $username               = $_POST['txt_username'];
    // $password               = $_POST['txt_password'];

    
    //     if( $pdo->is_connected()) {
    //             try{
    //                 $stmt = $conn->prepare("SELECT * FROM tbl_users WHERE username = :username");
    //                 $stmt->execute(['username'=>$username]);
    //                 $count =$stmt->rowCount();

    //                 if($count != 0) {
    //                     $row = $stmt->fetch();
    //                     if($row['userstatus']) {
    //                         if(password_verify($password ,$row['password'])){
    //                             $_SESSION['admin_5fe2562907c4eafe29b438c1c7ddb59c843k3k23k29932'] = $row['id'];
    //                             $_SESSION['admin_type5fe2562907c4eafe29b438c1c7ddb59c843k3k2343'] = $row['type'];
    //                             $output = array("success","Login Success","Welcome Back");
    //                         }
    //                         else{
    //                             $output = array("error",'Incorrect Username or Password.','Please Type your Credential Correctly');
    //                         }
    //                     }else{
    //                         $output = array("error",'User Not Found','Please Type your Credential Correctly');
    //                     }
    //                 }else{

    //                     $output = array("error",'User Not Found','Please Type your Credential Correctly');
    //                 }
    //             }
    //             catch(PDOException $e){
    //                 $output = array(0,"There is some problem in connection: ", $e->getMessage());
    //             }
            
    //     }else{
    //         $output = array("error",'Error Found','Check Your Connection First');
    //     }

        echo json_encode($output);
        $pdo->close();
}


if (isset($_POST['checkWebsetup'])) {
    try{ 
        $stmt = $conn->prepare("SELECT * FROM tbl_web_setup ORDER BY id DESC LIMIT 1 ");
        $stmt->execute();
        $countrow = $stmt->rowCount();
        if($countrow == 0){
            $output[] = array(
                "no_image.png",
                "Itrack"
            );
        }else{
            while($row = $stmt->fetchObject())
            {
                $output[] = array(
                    $row->image_name, 
                    $row->web_name,
                    $row->image_name_m
                );
            }
        }
    } catch(PDOException $e) {
        $output = die($e->getMessage());
    }   

        echo json_encode($output);
        $pdo->close();
}

?>