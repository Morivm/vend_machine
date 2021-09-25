<?php
    include '../modules/session.php';

    $conn = $pdo->open();

    function getLastwebimg($conn) {
        try{
            $stmt = $conn->prepare("SELECT top(1) image_name, image_ext FROM tbl_web_setup ORDER BY id DESC");
            $stmt->execute();
            $result = $stmt ->fetch();
            $count = $stmt->rowCount();
            if($count == 0) {
                return "no_image.png";
            }else{
                return $result['image_name'];
            }
        }  
        catch(PDOException $e){
            $output = array(0,$e->getMessage());
        }

    }


    if(isset($_POST['chg_web_pht'])){
        $form_photo             = $_FILES['web_icon']['name'];
        $form_photo_m           = $_FILES['m_web_icon']['name'];

        $photo                  = time().$_FILES['web_icon']['name'];
        $photo_m                = time().$_FILES['m_web_icon']['name'];

        $phot_extension         = pathinfo($form_photo, PATHINFO_EXTENSION);
        $phot_extension_m       = pathinfo($form_photo_m, PATHINFO_EXTENSION);

        $noimage                = NULL;
        $noimage_m              = NULL;

        $web_name               = $_POST['web_name'];
    
        $putimage = getLastwebimg($conn);

        try{
          
            $stmt =$conn->prepare("exec sp_websetup
                @image_name     = :image_name,
                @image_name_m   = :image_name_m,
                @image_ext      = :image_ext,
                @image_extm     = :image_extm,
                @web_name       = :web_name,
                @in_added_by    = :in_added_by");

            $stmt->execute(['image_name'=>$photo,
                'image_name_m'=>$photo_m,
                'image_ext'=>$phot_extension,
                'image_extm'=>$phot_extension_m, 
                'web_name'=>$web_name,
                'in_added_by'=>$userid]);
            
            $row = $stmt->fetch();
            $output = array($row['message_success'], $row['message_title'], $row['message_body']);

            if($row['message_success']) {

                if(empty($form_photo)) {
                    $photo  = getLastwebimg($conn);
                    $phot_extension_m     = pathinfo($photo, PATHINFO_EXTENSION);
               }else{
                   move_uploaded_file($_FILES['web_icon']['tmp_name'], '../img/web/'.$photo);
               }
   
               if(empty($form_photo_m)) {
                   $photo_m  = getLastwebimg($conn);
                   $phot_extension_m     = pathinfo($photo_m, PATHINFO_EXTENSION);
               }else{
                   move_uploaded_file($_FILES['m_web_icon']['tmp_name'], '../img/web/'.$photo_m);
               }

            }


        }catch(PDOException $e){
            $output = array("error","Error Found",$e->getMessage());
        }
    
        echo json_encode($output);
        $pdo->close();
    }

?>