<?php
    $timezone = "Asia/Manila";
    date_default_timezone_set($timezone);
    $web_version = "V.0.0.1";
    $web_company = "MCU";
    // $web_company_site = "https://www.itracksolutions.net/";
    $web_company_site = "";
    $web_copyright_year = "2021";
    Class Database{


        /* MSSQL */

        /* OFFICE CONN */
        // private $server = 'sqlsrv:Server=DESKTOP-MT9BHIF;Database=cop_attendance;';
        // private $username = "sa";
        // private $password = "12345";


        /* BAHAY CONN */
        private $server = "mysql:host=localhost;dbname=mcu_project;SET SESSION sql_mode = ''";
        private $username = "root";
        private $password = "";


        // private $db = "cop_attendance";

        /* DATATABLE SERVERSIDE PROCESSING */
        // public  $hostname = "localhost";
        // public  $usrname = "root";
        // public  $pass = "";
        // public  $datab = "asset_cebu";

        private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
        protected $conn;
        protected $conn2;
        
        public function open(){
            try{
                $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
                return $this->conn;
                
            }
            catch (PDOException $e){
                echo "There is some problem in connection: " . $e->getMessage();
            }
    
        }
        
        public function openSqlserver(){
            try{
                $this->conn2 = new PDO($this->mssql_server, $this->mssql_username, $this->mssql_password, $this->options);
                return $this->conn2;
                
            }
            catch (PDOException $e){
                echo "There is some problem in connection: " . $e->getMessage();
            }
    
        }
        
    
    
        public function close(){
            $this->conn = null;
        }
        public function close2(){
            $this->conn2 = null;
        }


        public function is_connected() { 
            $connected = @fsockopen("www.example.com", 80);
            if ($connected){
                $is_conn = true; //action when connected
                fclose($connected);
            }else{
                $is_conn = false; //action in connection failure
            }
            // $is_conn = true;
            return $is_conn;
    
        }

        function getWebsetup($conn) {

            try {
                $stmt = $conn->prepare("SELECT top(1) image_name, web_name FROM tbl_web_setup ORDER BY id DESC");
                $stmt->execute();
                $count = $stmt->rowCount();
                if($count == 0) {
                    $out[0] = "ITRACK COP";
                    $out[1] = "no_image.png";
                    return $out;
                }else{
                    $row    = $stmt->fetch();
                    $imgname= $row['image_name'];
                    $out[0] = $row['web_name'];
                    $out[1] =  "$imgname";
                    return $out;
                }
            }catch (PDOException $e) {
                return $out[0] = die($e->getMessage());
            }
            $pdo->close();
        }
    }

$pdo = new Database();
 
?>