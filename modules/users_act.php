<?php
    include '../modules/session.php';



    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Builder\Builder;
    use Endroid\QrCode\Encoding\Encoding;
    use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
    use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
    use Endroid\QrCode\Label\Font\NotoSans;
    use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
    use Endroid\QrCode\Writer\PngWriter;
    
    // include "../app-assets/phpqrcode/qrlib.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;





    require '../vendor/autoload.php';


    $conn = $pdo->open();

    if (isset($_POST['removeuser'])) {
        sleep(4);
        $id                 =   $_POST['id'];
        $action             =   $_POST['acction'];

        try{ 

                // if ($action == 'remove') {
                    $stmt = $conn->prepare("exec sp_manageuser
                        @in_id = :in_id,
                        @in_action = :in_action");
                // }else{
                //     $stmt = $conn->prepare("UPDATE tbl_usersinfo SET users_id = NULL WHERE id = :id");
                // }

                $stmt->execute(['in_id'=>$id, 'in_action'=>$action]);
                $row = $stmt->fetch();
                $output = array($row['message_success'],$row['message_title'],$row['message_body']);              
  
        
        } catch(PDOException $e) {
            $output = array('error',"Error Found", die($e->getMessage()));
        }
        echo json_encode($output);
        exit();
    }
    

    function getlpas($userids,$conn) {
        try {
            $stmt = $conn->prepare("SELECT password FROM tbl_users WHERE id = :id");
            $stmt->execute(['id'=>$userids]);
            $row = $stmt->fetch();
            return $row['password'];
              
        }catch (PDOException $e) {
            $output = die($e->getMessage());
        }
            exit();
            $pdo->close();
    }
    // if (isset($_POST['disacct'])) {

    //     $user       = $_POST['user_id'];
    //     $statusid   = $_POST['stats'];
    //     if ($statusid == 1) {
    //         $statusid = 2;
    //     }else{
    //         $statusid = 1;
    //     }

    //     try{ 
    //         $stmt = $conn->prepare("CALL sp_aed_users(:in_user_id, :in_action_id, :in_status_id, :in_update_by,
    //                                                     :in_lastname, :in_firstname, :in_middlename, :in_suffix, :in_type,
    //                                                     :in_username,  :in_password, :in_modules, :in_role
    //                                                     )");
    //         $stmt->execute(['in_user_id'=>$user, 'in_action_id'=>1, 'in_status_id'=>  $statusid, 'in_update_by'=> $userid,
    //                          'in_lastname'=>NULL, 'in_firstname'=>NULL, 'in_middlename'=> NULL, 'in_suffix'=>NULL, 'in_type'=>NULL,
    //                          'in_username'=>NULL, 'in_password'=>NULL, 'in_modules'=>NULL, 'in_role'=>NULL ]);
    //         $row = $stmt->fetch();
    //         $output = array($row['success_message'],$row['success_title'],$row['success_body']);

    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     echo json_encode($output);
    //     exit();
    //     $pdo->close();
    // }
    if (isset($_POST['update_acct'])) {
        $id                 =   $_POST['id'];
        $usertype           =   $_POST['acct_usertype'];
        $username           =   $_POST['acct_username'];
        $pass               =   $_POST['acct_password'];
        $newpassword        =   password_hash($pass, PASSWORD_DEFAULT);
        $yourpass           =   $_POST['acct_yourpassword'];
        $yourpassworddb     =   getlpas($userid,$conn);
        $modules            =   " ";
        try{ 

            if(password_verify($yourpass ,$yourpassworddb)){

                $stmt = $conn->prepare("exec sp_addtouser
                    @in_id          = :in_id,
                    @in_usertype    = :in_usertype,
                    @in_username    = :in_username,
                    @in_password    = :in_password,
                    @in_modules     = :in_modules,
                    @in_added_by    = :in_added_by");

                $stmt->execute(['in_id' =>$id,
                    'in_usertype'=>$usertype,
                    'in_username'=>$username,
                    'in_password'=>$newpassword,
                    'in_modules'=>$modules,
                    'in_added_by'=>$userid
                ]);
                $row = $stmt->fetch();
                $output = array($row['message_success'],$row['message_title'],$row['message_body']);
                // $stmt = $conn->prepare("CALL sp_aed_users(:in_user_id, :in_action_id, :in_status_id, :in_update_by,
                //                         :in_lastname, :in_firstname, :in_middlename, :in_suffix, :in_type,
                //                         :in_username,  :in_password, :in_modules, :in_role)");
                // $stmt->execute(['in_user_id'=>$id, 'in_action_id'=>4, 'in_status_id'=>NULL, 'in_update_by'=> $userid,
                //                     'in_lastname'=>NULL, 'in_firstname'=>NULL, 'in_middlename'=>NULL, 'in_suffix'=>NULL, 'in_type'=>$usertype,
                //                     'in_username'=>$username, 'in_password'=>$newpassword , 'in_modules'=>$modules, 'in_role'=>NULL]);
                // $row = $stmt->fetch();
                // $output = array($row['success_message'],$row['success_title'],$row['success_body']);              
            }else{
                $output = array("error","Error Found", "Your Password is Incorrect");
            }
                
        } catch(PDOException $e) {
            $output = array("error","Error Found", die($e->getMessage()));
        }
        echo json_encode($output);
        exit();
   
    }
    // if (isset($_POST['update_security'])) {
    //     $id                 =   $_POST['sec_id'];
    //     $pass               =   $_POST['sec_password'];
    //     $newpassword        =   password_hash($pass, PASSWORD_DEFAULT);
    //     $yourpass           =   $_POST['sec_yourpassword'];
    //     $yourpassworddb     =   getlpas($userid,$conn);
        
    //     try{ 

    //         if(password_verify($yourpass ,$yourpassworddb)){
    //             $stmt = $conn->prepare("CALL sp_aed_users(:in_user_id, :in_action_id, :in_status_id, :in_update_by,
    //                                     :in_lastname, :in_firstname, :in_middlename, :in_suffix, :in_type,
    //                                     :in_username,  :in_password, :in_modules, :in_role )");
    //             $stmt->execute(['in_user_id'=>$id, 'in_action_id'=>3, 'in_status_id'=>NULL, 'in_update_by'=> $userid,
    //                                 'in_lastname'=>NULL, 'in_firstname'=>NULL, 'in_middlename'=>NULL, 'in_suffix'=>NULL, 'in_type'=>NULL,
    //                                 'in_username'=>NULL, 'in_password'=>$newpassword , 'in_modules'=>NULL, 'in_role'=>NULL]);
    //             $row = $stmt->fetch();
    //             $output = array($row['success_message'],$row['success_title'],$row['success_body']);              
    //         }else{
    //             $output = array(0,"Error Found", "Your Password is Incorrect");
    //         }
                
    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     sleep(1);
    //     echo json_encode($output);
    //     exit();
   
    // }
    // if (isset($_POST['input_adduser'])) {

    //     $lname      = ucwords($_POST['reg_lname']);
    //     $fname      = ucwords($_POST['reg_fname']);
    //     $mname      = ucwords($_POST['reg_mname']);
    //     $suffix     = ucwords($_POST['reg_suffix']);
    //     $modules    = " ".$_POST['reg_modules'];
    //     $usertype   = $_POST['reg_usertype'];
    //     $username   = $_POST['reg_username'];
    //     $pass       = $_POST['reg_password'];
    //     $password   = password_hash($pass, PASSWORD_DEFAULT);

    //     try{ 

    //         if( $pdo->is_connected()) {

    //             $stmt = $conn->prepare("exec sp_aed_users
    //                                     @in_user_id     =   :in_user_id,
    //                                     @in_action_id   =   :in_action_id,
    //                                     @in_status_id   =   :in_status_id,
    //                                     @in_update_by   =   :in_update_by,
    //                                     @in_lastname    =   :in_lastname,
    //                                     @in_firstname   =   :in_firstname,
    //                                     @in_middlename  =   :in_middlename,
    //                                     @in_suffix      =   :in_suffix,
    //                                     @in_type        =   :in_type,
    //                                     @in_username    =   :in_username, 
    //                                     @in_password    =   :in_password,
    //                                     @in_modules     =   :in_modules,
    //                                     @in_role        =   :in_role");
    //         $stmt->execute(['in_user_id'=>NULL, 'in_action_id'=>2, 'in_status_id'=>NULL, 'in_update_by'=> $userid,
    //                                                     'in_lastname'=>$lname, 'in_firstname'=>$fname, 'in_middlename'=> $mname, 'in_suffix'=>$suffix, 'in_type'=>$usertype,
    //                                                     'in_username'=>$username, 'in_password'=>$password, 'in_modules'=>$modules, 'in_role'=>NULL]);
    //         $row = $stmt->fetch();
    //         $output = array($row['success_message'],$row['success_title'],$row['success_body']);

    //         }else{

    //             $output = array(0,"Error Found",'Check Your Connection First');
    //         }

    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     echo json_encode($output);
    //     exit();
   
    // }
    if (isset($_POST['uploadCsv'])) {
        
        $mail = new PHPMailer(true);
        try{  
            
            if( $pdo->is_connected()) {

                $webimagepath       = $pdo->getWebsetup($conn);
     


                    $i=0;
                        $file = $_FILES["inputGroupFile02"]["tmp_name"];
                        $file_open = fopen($file,"r");
                        while(($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                        $barcode_id         = $csv[0];
                        $lastname           = $csv[1];
                        $firstname          = $csv[2];
                        $middlename         = $csv[3];
                        $suffix             = $csv[4];
                        $gender             = ($csv[5] == 'M') ? 1 : 0 ;
                        $cpno               = $csv[6];
                        $emailadd           = $csv[7];

                        if($i>0) {
                            $stmt = $conn->prepare("exec sp_uploadattendee
                                @barcodeid = :barcodeid,
                                @in_lastname = :in_lastname,
                                @in_firstname = :in_firstname,
                                @in_middlename = :in_middlename,
                                @in_suffix = :in_suffix,
                                @in_gender = :in_gender,
                                @in_cpno = :in_cpno,
                                @in_emailadd = :in_emailadd,
                                @in_addby = :in_addby
                            ");
                            $stmt->execute(['barcodeid'=>$barcode_id,
                                            'in_lastname'=>$lastname,
                                            'in_firstname'=>$firstname,
                                            'in_middlename'=>$middlename,
                                            'in_suffix'=>$suffix,
                                            'in_gender'=>$gender,
                                            'in_cpno'=>$cpno,
                                            'in_emailadd'=>$emailadd,
                                            'in_addby'=>$userid]);
                            $row = $stmt->fetch();


                            $barcodeid =  $barcode_id;
                            $qrCode = Builder::create()
                            ->writer(new PngWriter())
                            ->writerOptions([])
                            ->data($barcodeid)
                            ->encoding(new Encoding('UTF-8'))
                            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
                            ->size(300)
                            ->margin(10)
                            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
                            ->labelText( $lastname . ', ' . $firstname . ' ' . $middlename . ' ' .$suffix)
                            ->labelFont(new NotoSans(14))
                            ->labelAlignment(new LabelAlignmentCenter())
                            ->build();
                            $qrCode->saveToFile("../img/qr/$barcodeid.jpg");
            





                            $mail->isSMTP(); 
                            $mail->Mailer = "smtp";
                            // $mail->SMTPDebug = 1;                    
                            $mail->SMTPAuth   = TRUE;  
                            $mail->SMTPSecure = 'tls';
                         
                            $mail->Charset ='UTF-8';
                            $mail->Port       = 587;
                            $mail->Host       = 'smtp.gmail.com';                 
                            $mail->Username   = 'carlitracktest@gmail.com';      
                            $mail->Password   = 'carlitrack123';                             
                            $mail->setFrom('carlitracktest@gmail.com', $webimagepath[0]);
                            $mail->addAddress($emailadd, $lastname);     //Add a recipient
                            // $email_template = '../registration/mail_template.html';
                            $mail->Subject = 'ACCOUNT REGISTRATION';
                            $mail->isHTML(true); 
                            // $message = file_get_contents($email_template);
                            $mail->AddEmbeddedImage("../img/web/".$webimagepath[1],'testImage',"../img/web/".$webimagepath[1]);
                            $mail->AddEmbeddedImage("../img/qr/$barcode_id.jpg", "testImageQR$barcode_id");
                            $egender  = ($gender == 1) ? "MALE" : "FEMALE";
                            $body = "
                                <img src='cid:testImage' width='50%'><br />
                                <h3>HELLO $lastname $firstname</h3>
                                <p>Thank you for registering on our site, your account details are as follows:</p>
                                <br /> 

                                    <p>NAME: $lastname $firstname $middlename $suffix</p>
                                    <p>GENDER: $egender</p>
                                    <p>CONTACT #: $cpno</p>
                                    <p>EMAIL ADDRESS #: $emailadd</p>
                                    <br />
                                <center><b>YOUR QRCODE </b><br/>
                                <img src='cid:testImageQR$barcode_id' width='20%'>
                                </center>
                            ";
    
                            // $mail->clearAttachments();
                   
                            // $message = str_replace('%lastnamefirstname%',$lastname.', '. $firstname, $message);
                            // $message = str_replace('%fullname%', $lastname.','.$firstname.' '.$middlename.' '.$suffix, $message);
                            // $message = str_replace('%gender%', ($gender == 1) ? "MALE" : "FEMALE", $message);
                            // $message = str_replace('%cntact%', $cpno, $message);
                            // $message = str_replace('%eemaiadd%', $emailadd, $message);
                            // $message = str_replace('%imgpth%', "../img/web/".$webimagepath[1], $message);
                            
                            // $mail->MsgHTML($message);
    
    
                        
                            $mail->Body    = $body;
                            $mail->AltBody = strip_tags($body);
    
                            $mail->send();



                            $output = array($row['message_success'],$row['message_title'],$row['message_body']);
                        } $i++;
                    
        
                    }
            }else{
            $output = array("error","Error Found","Check Your Connection");
        }
        } catch(PDOException $e) {
            $output = array(0,"Error Found", die($e->getMessage()));
        }
        echo json_encode($output);
        exit();
        $pdo->close();
    }
    // if (isset($_POST['tablelogs'])) {

    //     $draw        = intval(0);
    //     $data        = array();
        
    //     $stmt = $conn->prepare("SELECT id, actions_id, `func_fullname`(updated_by) AS fullname, `func_month_d_yy`(log_date) AS action_date,
    //                     detailed_action AS action_details FROM tbl_logs_user_update ORDER BY id DESC");
    //     $stmt->execute();
    //     $records = $stmt->fetchAll();
    //     $data = array();
    
    //     foreach($records as $row){
    //         $array0        = $row['id'];
    //         $array1        = $row['actions_id'];
    //         $array2        = $row['fullname'];
    //         $array3        = $row['action_date'];
    //         $array4        = $row['action_details'];

    //         $data[] = array(
    //             "array0"=>$array0,
    //             "array1"=>$array1,
    //             "array2"=>$array2,
    //             "array3"=>$array3,
    //             "array4"=>$array4,
    //         );
    //     }
    //         $response = array(
    //         "aaData" => $data
    //     );
    //     echo json_encode($response);
    //     $pdo->close();
    
    // }
    // if (isset($_POST['update_usertype'])) {
    //     $id         = $_POST['update_utypeid'];
    //     $type       = $_POST['type_usertype'];

    //     try{ 
    //         $stmt = $conn->prepare("CALL sp_aed_users(:in_user_id, :in_action_id, :in_status_id, :in_update_by,
    //                                                     :in_lastname, :in_firstname, :in_middlename, :in_suffix, :in_type,
    //                                                     :in_username,  :in_password, :in_modules, :in_role )");
    //         $stmt->execute(['in_user_id'=>$id , 'in_action_id'=>5, 'in_status_id'=>NULL, 'in_update_by'=> $userid,
    //                                                     'in_lastname'=>NULL, 'in_firstname'=>NULL, 'in_middlename'=>NULL, 'in_suffix'=>NULL, 'in_type'=>$type,
    //                                                     'in_username'=>NULL, 'in_password'=>NULL, 'in_modules'=>NULL, 'in_role'=>NULL]);
    //         $row = $stmt->fetch();
    //         $output = array($row['success_message'],$row['success_title'],$row['success_body']);

    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     sleep(1);
    //     echo json_encode($output);
    //     exit();
   
    // }
    // if (isset($_POST['update_userrole'])) {
    //     $id         = $_POST['update_userroleid'];
    //     $role       = $_POST['type_userrole'];
    //     $countrole  = count($role);
        
    //     if($countrole > 1) {
    //         $role   = implode(',',$role);
    //     }else{
    //         $role   = implode(',',$role).",";
    //     }
   


    //     try{ 
    //         $stmt = $conn->prepare("CALL sp_aed_users(:in_user_id, :in_action_id, :in_status_id, :in_update_by,
    //                                                     :in_lastname, :in_firstname, :in_middlename, :in_suffix, :in_type,
    //                                                     :in_username,  :in_password, :in_modules, :in_role )");
    //         $stmt->execute(['in_user_id'=>$id , 'in_action_id'=>6, 'in_status_id'=>NULL, 'in_update_by'=> $userid,
    //                                                     'in_lastname'=>NULL, 'in_firstname'=>NULL, 'in_middlename'=>NULL, 'in_suffix'=>NULL, 'in_type'=>NULL,
    //                                                     'in_username'=>NULL, 'in_password'=>NULL, 'in_modules'=>NULL, 'in_role'=>$role]);
    //         $row = $stmt->fetch();
    //         $output = array($row['success_message'],$row['success_title'],$row['success_body']);

    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     sleep(1);
    //     echo json_encode($output);
    //     exit();
   
    // }

    // if (isset($_POST['updateUserprev'])) {
    //     $id         = $_POST['userid'];
    //     $prev       = " ".$_POST['previlage'];

    //     try{ 
    //         $stmt = $conn->prepare("UPDATE tbl_users SET modules = :modules WHERE id = :id");
    //         $stmt->execute(['modules'=>$prev, 'id'=>$id]);
    //         $output = array(1,"Success","Updated Succesfully");

    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     echo json_encode($output);
    //     exit();
   
    // }
    // if (isset($_POST['viewmod'])) {
    //     $id         = $_POST['id'];
    //     try{ 
    //         $stmt = $conn->prepare("SELECT modules FROM tbl_users WHERE id = :id");
    //         $stmt->execute(['id'=>$id]);
    //         $row = $stmt->fetch();
    //         $output = $row['modules'];

    //     } catch(PDOException $e) {
    //         $output = array(2,"Error Found", die($e->getMessage()));
    //     }
    //     echo json_encode($output);
    //     exit();
   
    // }
    


?>