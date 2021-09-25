<?php
    include '../modules/session.php';

    $conn = $pdo->open();


    if (isset($_REQUEST["reg_username"])) {
        $requestedUsername  = $_REQUEST['reg_username'];
        try {
            $stmt = $conn->prepare("SELECT username FROM tbl_users WHERE username = :username");
            $stmt->execute(['username'=>$requestedUsername]);
            $count = $stmt->rowCount();
            if($count > 0) {
                echo "false";
            }else{
                echo "true";
            }

            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            // echo json_encode($output);
            exit();
            $pdo->close();
    }

    if (isset($_REQUEST["acct_username"])) {
        $requestedUsername  = $_REQUEST['acct_username'];
        try {
            $stmt = $conn->prepare("SELECT username FROM tbl_users WHERE username = :username");
            $stmt->execute(['username'=>$requestedUsername]);
            $count = $stmt->rowCount();
            if($count > 0) {
                echo "false";
            }else{
                echo "true";
            }

            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            exit();
            $pdo->close();
    }

?>