<?php
 include '../modules/session.php';

 $conn = $pdo->open();

//................................................................................................................................
//............................iiii.............ttt................................................................ttt.............
//............................iiii............tttt...............................................................tttt.............
//............................................tttt...............................................................tttt.............
//.mmmmmmmmmmmmmm....aaaaaa...iiii.nnnnnnnn.nntttttt.eeeeee..............eeeeee..evvv..vvvv..eeeeee...nnnnnnnn.nnttttttsssssss....
//.mmmmmmmmmmmmmmm..aaaaaaaa..iiii.nnnnnnnnnnntttttteeeeeeee............eeeeeeee.evvv..vvvv.eeeeeeee..nnnnnnnnnnnttttttssssssss...
//.mmmmm.mmmmmmmmm.maaa.aaaaa.iiii.nnnn.nnnnn.tttt.teee.eeee..........._eee.eeee.evvv.vvvv.veee.eeee..nnnn.nnnnn.tttt.tsss.ssss...
//.mmmm..mmmm..mmmm....aaaaaa.iiii.nnnn..nnnn.tttt.teee..eeee.........._eee..eeee.vvvvvvvv.veee..eeee.nnnn..nnnn.tttt.tssss.......
//.mmmm..mmmm..mmmm.aaaaaaaaa.iiii.nnnn..nnnn.tttt.teeeeeeeee.........._eeeeeeeee.vvvvvvvv.veeeeeeeee.nnnn..nnnn.tttt..ssssss.....
//.mmmm..mmmm..mmmmmaaaaaaaaa.iiii.nnnn..nnnn.tttt.teeeeeeeee.........._eeeeeeeee.vvvvvvv..veeeeeeeee.nnnn..nnnn.tttt...sssssss...
//.mmmm..mmmm..mmmmmaaa.aaaaa.iiii.nnnn..nnnn.tttt.teee................_eee........vvvvvv..veee.......nnnn..nnnn.tttt.......ssss..
//.mmmm..mmmm..mmmmmaaa.aaaaa.iiii.nnnn..nnnn.tttt.teee..eeee.........._eee..eeee..vvvvvv..veee..eeee.nnnn..nnnn.tttt.tsss..ssss..
//.mmmm..mmmm..mmmmmaaaaaaaaa.iiii.nnnn..nnnn.tttttteeeeeeee............eeeeeeee...vvvvv....eeeeeeee..nnnn..nnnn.ttttttssssssss...
//.mmmm..mmmm..mmmm.aaaaaaaaa.iiii.nnnn..nnnn.tttttt.eeeeee..............eeeeee.....vvvv.....eeeeee...nnnn..nnnn.tttttt.ssssss....
//................................................................................................................................
//................................................................................................................................
//..........................................................ee__________..........................................................
//..........................................................ee__________..........................................................
//................................................................................................................................

    if ( isset($_POST['input_mainteevents'])) {

        try{
        
            if ($pdo->is_connected()) {
            
            $action             = $_POST['action'];
            $id                 = $_POST['id'];
            $st_ed_event        = ($action =='delete') ? $st_ed_event ="" : $_POST['text_6'];
            $st_ed_eventexplode = explode(" - ", $st_ed_event);


            $event_name         = ($action =='delete') ? $event_name="" : $_POST['text_1'];
            $event_classi       = ($action =='delete') ? $event_classi ="" : $_POST['text_5'];
            $event_startdate    = ($action =='delete') ? $event_startdate ="" : $st_ed_eventexplode[0];
            $event_starttime    = ($action =='delete') ? $event_starttime ="" : $_POST['text_2'];
            $event_enddate      = ($action =='delete') ? $event_enddate ="" : ($st_ed_event != "") ? $st_ed_eventexplode[1] : NULL;
            $event_endtime      = ($action =='delete') ? $event_endtime ="" : $_POST['text_3'];
            $event_desc         = ($action =='delete') ? $event_desc ="" : $_POST['text_4']; 
            $event_campus       = ($action =='delete') ? $event_campus ="" : $_POST['text_9'];
            
            $stmt = $conn->prepare("exec sp_mainte_event
                                    @in_action      = :in_action,
                                    @in_id          = :in_id,
                                    @in_eventclassification = :in_eventclassification,
                                    @in_eventname   = :in_eventname,
                                    @in_startdate   = :in_startdate,
                                    @in_starttime   = :in_starttime,
                                    @in_enddate     = :in_enddate,
                                    @in_endtime     = :in_endtime,
                                    @in_schoolid    = :in_schoolid,
                                    @in_description = :in_description,
                                    @in_added_by    = :in_added_by");

            $stmt->execute(['in_action'=>$action, 'in_id'=>$id,
            'in_eventclassification'=>$event_classi, 'in_eventname'=>$event_name, 
            'in_startdate'=>$event_startdate, 'in_starttime'=>$event_starttime,
            'in_enddate'=>$event_enddate, 'in_endtime'=>$event_endtime,
            'in_schoolid'=>$event_campus, 'in_description'=>$event_desc,
            'in_added_by'=>$userid ]);

            $result = $stmt->fetch();
            $output = array($result['message_success'], $result['message_title'], $result['message_body']);

            }else{
                $output = array("error", "Error Found", "Please Check Your Connection.");

            }
        }catch(PDOException $e) {

            $output = array("error", "Error Found", $e->getMessage());

        }

        echo json_encode($output);
        $pdo->close();

    }
   


//.......................................................................
//...cccccc....aaaaaa..ammmmmmmmmmmmm..mpppppppp..puuu..uuuuu.sssssss....
//..cccccccc..aaaaaaaa.ammmmmmmmmmmmmm.mppppppppp.puuu..uuuuuussssssss...
//.ccccc.cccccaaa.aaaaaammmm.mmmmmmmmm.mpppp.ppppppuuu..uuuuuusss.ssss...
//.cccc..ccc.....aaaaaaammm..mmmm..mmmmmppp...pppppuuu..uuuuuussss.......
//.cccc.......aaaaaaaaaammm..mmmm..mmmmmppp...pppppuuu..uuuuu.ssssss.....
//.cccc......caaaaaaaaaammm..mmmm..mmmmmppp...pppppuuu..uuuuu..sssssss...
//.cccc..ccc.caaa.aaaaaammm..mmmm..mmmmmppp...pppppuuu..uuuuu......ssss..
//.ccccc.cccccaaa.aaaaaammm..mmmm..mmmmmpppp.ppppppuuuu.uuuuuusss..ssss..
//..ccccccccccaaaaaaaaaammm..mmmm..mmmmmppppppppp..uuuuuuuuuuussssssss...
//...cccccc...aaaaaaaaaammm..mmmm..mmmmmpppppppp....uuuuuuuuu..ssssss....
//.....................................mppp..............................
//.....................................mppp..............................
//.....................................mppp..............................
//.....................................mppp..............................
//.......................................................................




    if(isset($_POST['input_maintecampus'])) {

        try{
        
            if ($pdo->is_connected()) {


            $action                 = $_POST['action'];
            $id                     = $_POST['id'];
            $campus_name            = ($action =='delete') ? $campus_name='' : $_POST['text_1'];
            $campus_address         = ($action =='delete') ? $campus_address='' : $_POST['text_2'];


            $stmt = $conn->prepare("exec sp_mainte_campus
                                    @in_action      = :in_action,
                                    @in_id          = :in_id,
                                    @in_campus_name = :in_campus_name,
                                    @in_campus_address   = :in_campus_address,
                                    @in_added_by    = :in_added_by");

            $stmt->execute(['in_action'=>$action, 'in_id'=>$id,
            'in_campus_name'=>$campus_name, 'in_campus_address'=>$campus_address, 
            'in_added_by'=>$userid ]);

            $result = $stmt->fetch();
            $output = array($result['message_success'], $result['message_title'], $result['message_body']);

            }else{
                $output = array("error", "Error Found", "Please Check Your Connection.");

            }
        }catch(PDOException $e) {

            $output = array("error", "Error Found", $e->getMessage());

        }

        echo json_encode($output);
        $pdo->close();
    }

    if(isset($_POST['input_maintedevice'])) {

        try{
        
            if ($pdo->is_connected()) {


            $action             = $_POST['action'];
            $id                 = $_POST['id'];
            $device_id          = ($action == 'delete') ?  $device_id ='' : $_POST['text_1'];
            $device_name        = ($action == 'delete') ?  $device_name ='' : $_POST['text_2'];
            $campus_id          = ($action == 'delete') ?  $campus_id ='' : $_POST['text_3'];


            $stmt = $conn->prepare("exec sp_mainte_device
                                    @in_action      = :in_action,
                                    @in_id          = :in_id,
                                    @in_deviceid    = :in_deviceid,
                                    @in_device_name = :in_device_name,
                                    @in_campus      = :in_campus,
                                    @in_added_by    = :in_added_by");

            $stmt->execute(['in_action'=>$action, 'in_id'=>$id,
            'in_deviceid'=>$device_id, 'in_device_name'=>$device_name, 
            'in_campus'=>$campus_id, 'in_added_by'=>$userid ]);

            $result = $stmt->fetch();
            $output = array($result['message_success'], $result['message_title'], $result['message_body']);

            }else{
                $output = array("error", "Error Found", "Please Check Your Connection.");

            }
        }catch(PDOException $e) {

            $output = array("error", "Error Found", $e->getMessage());

        }

        echo json_encode($output);
        $pdo->close();
    }
    
        //.............................................
//...ttt...........abbb........llll............
//..tttt...........abbb........llll............
//..tttt...........abbb........llll............
//.tttttta.aaaaaa..abbbbbbbb...llll..eeeeee....
//.ttttttaaaaaaaaa.abbbbbbbbb..llll.eeeeeeee...
//..tttt.aaaa.aaaaaabbbb.bbbbb.llllleee.eeee...
//..tttt.....aaaaaaabbb...bbbb.llllleee..eeee..
//..tttt..aaaaaaaaaabbb...bbbb.llllleeeeeeeee..
//..tttt.aaaaaaaaaaabbb...bbbb.llllleeeeeeeee..
//..tttt.aaaa.aaaaaabbb...bbbb.llllleee........
//..tttt.aaaa.aaaaaabbbb.bbbbb.llllleee..eeee..
//..tttttaaaaaaaaaaabbbbbbbbb..llll.eeeeeeee...
//..tttttaaaaaaaaaaabbbbbbbb...llll..eeeeee....
//.............................................




    if(isset($_POST['tbl_campus'])) {

        $draw        = intval(0);
        $data        = array();


            $stmt = $conn->prepare("SELECT * FROM vw_tbl_mainte_campus");
            $stmt->execute();
            $records = $stmt->fetchAll();
            $data = array();
            foreach($records as $row){
                $row1           = $row['row1'];
                $row2           = $row['row2'];
                $row3           = $row['row3'];

                $data[] = array(
                   "row1"=>$row1,
                   "row2"=>$row2,
                   "row3"=>$row3
                );
            }

            $response = array(
                "aaData" => $data
            );

        echo json_encode($response);
        $pdo->close();
    }

    if(isset($_POST['tbl_events'])) {

        $draw        = intval(0);
        $data        = array();


            $stmt = $conn->prepare("SELECT * FROM vw_tbl_mainte_events");
            $stmt->execute();
            $records = $stmt->fetchAll();
            $data = array();
            foreach($records as $row){
                $row1           = $row['row1'];
                $row2           = $row['row2'];
                $row3           = $row['row3'];
                $row4           = $row['row4'];
                $row5           = $row['row5'];
                $row6           = $row['row6'];
                ($row['row7'] != "") ? $row7 = $row['row7'] : $row7 = "No Description";
                $row8           = $row['row8'];
                $row9           = $row['row9'];
                $row10          = $row['row10'];
                $row11          = $row['row11'];
                $row12          = $row['row12'];
                $row13          = $row['row13'];
                $row14          = $row['row14'];
                $row15          = $row['row15'];
                $row16          = $row['row16'];

                $data[] = array(
                   "row1"=>$row1,
                   "row2"=>$row2,
                   "row3"=>$row9 ." ".$row3,
                   "row4"=>$row10 ." ".$row4,
                   "row5"=>$row5,
                   "row6"=>$row6,
                   "row7"=>$row7,
                   "row8"=>$row8,
                   "row11"=>$row11,
                   "row12"=>$row12,
                   "row13"=>$row13,
                   "row14"=>$row14,
                   "row15"=>$row15,
                   "row16"=>$row16
                );
            }

            $response = array(
                "aaData" => $data
            );

        echo json_encode($response);
        $pdo->close();
    }

    if(isset($_POST['tbl_device'])) {

        $draw        = intval(0);
        $data        = array();


            $stmt = $conn->prepare("SELECT * FROM vw_tbl_mainte_device");
            $stmt->execute();
            $records = $stmt->fetchAll();
            $data = array();
            foreach($records as $row){
                $row1           = $row['row1'];
                $row2           = $row['row2'];
                $row3           = $row['row3'];
                $row4           = $row['row4'];
                $row5           = $row['row5'];

              
                $data[] = array(
                   "row1"=>$row1,
                   "row2"=>$row2,
                   "row3"=>$row3,
                   "row4"=>$row4,
                   "row5"=>$row5
                );
            }

            $response = array(
                "aaData" => $data
            );

        echo json_encode($response);
        $pdo->close();
    }

?>