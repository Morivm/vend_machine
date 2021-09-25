<?php
    include '../modules/session.php';

    $conn = $pdo->open();
   

    if($_POST['form']=='sel_logintype') {
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
?>
<!-- 
    include '../modules/session.php';

    $conn = $pdo->open();

    if($_POST['form']=='sel_eventcampus') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_eventcampus");
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
    
    if($_POST['form']=='sel_eventclass') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_eventclassification");
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

    if($_POST['form']=='sel_getUsertype') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_usertypes");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->userstype,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }

 

    if($_POST['form']=='sel_getcategory') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_category");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->category_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_categoryedit') {
        $category_id = $_POST['id'];
        try {
            $stmt = $conn->prepare("SELECT id, category_name  FROM `tbl_mainte_category` WHERE id = :id");
            $stmt->execute(['id'=>$category_id]);
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->category_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_subgetcategory') {
        $category_id = $_POST['id'];
        try {
            $stmt = $conn->prepare("SELECT id, sub_category_name FROM tbl_mainte_sub_category WHERE id= :id");
            $stmt->execute(['id'=>$category_id]);
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->sub_category_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_getcustomattr') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_custom_attr");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->attribute_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_getcustomattrall') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_custom_attrall");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->attribute_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }

    

    
    if($_POST['form']=='sel_getUserRoles') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_user_roles");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->role_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_name') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_assetname");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_category') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_assetcategory");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->category_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_subcategory') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_assetsubcategory");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->sub_category_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_location') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_location");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->location_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_floor') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_floor");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->floor_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_room') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_room");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->room_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_customattr') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_custom_attr");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->attribute_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_supplier') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_supplier");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->supplier_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_receiver') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_emp_receiver");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->fname,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_num') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_asset_number_not_issued");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_number,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_num_issued') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_asset_number_issued");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_number,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_employee') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_empnumfname");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->fname,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_empissuer') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_emp_issuer");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->fname,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_empapprover') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_emp_approver");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->fname,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_num_dispose') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_asset_number_dispose");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_number,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_num_lost') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_asset_number_lost");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_number,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_asset_num_forrepair') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_asset_number_for_repair");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_number,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_cust_attr_type') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select_2_custom_attr_type");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->attribute_name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_transaction_type') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_trans_type");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_status,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_transactionreport_type') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_report_type");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->name,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }
    if($_POST['form']=='sel_movement_ass_num') {
        try {
            $stmt = $conn->prepare("SELECT * FROM vw_select2_assetnumber");
            $stmt->execute();
                while ($row = $stmt->fetchObject()) {
                    $output[] = array(
                        $row->id,
                        $row->asset_number,
                    );
                }
            }catch (PDOException $e) {
                $output = die($e->getMessage());
            }
            echo json_encode($output);
            exit();
            $pdo->close();
    }  -->
