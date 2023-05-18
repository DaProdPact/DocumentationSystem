<?php

require('./database.php');

session_start();
$session_id = $_SESSION['id'];
$session_batch =  $_SESSION['batch'];
$sessionqualification = $_SESSION['choosecourse'];

if($_SERVER['REQUEST_METHOD'] == 'GET'){


// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 



if(isset($_GET['getcore'])){
    $batch = array();
$start = $_GET['page'];
$start = ( $start * 10) - 10;

$readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_core ON  attendance.attendance_id = lmar_core.lmar_core_attendance_id LEFT JOIN lmar_core_extend ON attendance.attendance_id =  lmar_core_extend.lmar_core_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' LIMIT $start,10"; 
$readsql = mysqli_query($connection,$readquery);

if(mysqli_num_rows($readsql) > 0){
    while($row = mysqli_fetch_assoc($readsql)){
        $batch[] = $row;
    }
    echo json_encode($batch);
}
else{
    echo 2;
}

}
else if(isset($_GET['getbasic'])){
$batch = array();
$start = $_GET['page'];
$start = ( $start * 10) - 10;

$readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic ON  attendance.attendance_id = lmar_basic.lmar_basic_attendance_id LEFT JOIN lmar_basic_extend ON attendance.attendance_id =  lmar_basic_extend.lmar_basic_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' LIMIT $start,10"; 
$readsql = mysqli_query($connection,$readquery);

if(mysqli_num_rows($readsql) > 0){
    while($row = mysqli_fetch_assoc($readsql)){
        $batch[] = $row;
    }
    echo json_encode($batch);
}
else{
    echo 2;
}

}

else{
$batch = array();
$start = $_GET['page'];
$start = ( $start * 10) - 10;

$readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_common ON  attendance.attendance_id = lmar_common.lmar_common_attendance_id LEFT JOIN lmar_common_extend ON attendance.attendance_id =  lmar_common_extend.lmar_common_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' LIMIT $start,10"; 
$readsql = mysqli_query($connection,$readquery);

if(mysqli_num_rows($readsql) > 0){
    while($row = mysqli_fetch_assoc($readsql)){
        $batch[] = $row;
    }
    echo json_encode($batch);
}
else{
    echo 2;
}

}



}

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if(isset($_POST['update'])){
        $trainees_id = $_POST['trainessid'];
        $update = array();
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_common ON  attendance.attendance_id = lmar_common.lmar_common_attendance_id LEFT JOIN lmar_common_extend ON attendance.attendance_id =  lmar_common_extend.lmar_common_ex_attendance_id WHERE attendance_id = '$trainees_id' "; 
        $readsql = mysqli_query($connection,$readquery);
          while($row = mysqli_fetch_assoc($readsql)){
              $update[] = $row;
          }
          echo json_encode($update);
      }

      if(isset($_POST['basicsearch'])){
        $user = array();
        $search = $_POST['search'];
    
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic ON  attendance.attendance_id = lmar_basic.lmar_basic_attendance_id LEFT JOIN lmar_basic_extend ON attendance.attendance_id =  lmar_basic_extend.lmar_basic_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND import_batch = '$session_batch' AND FirstName LIKE '%$search%' OR LastName LIKE '%$search%' "; 
        $readsql = mysqli_query($connection,$readquery);
    
        if(mysqli_num_rows($readsql) > 0){
            while($row = mysqli_fetch_assoc($readsql)){
                $user[] = $row;
            }
            echo json_encode($user);
        }
        else{
            echo 2;
        }
    }

    if(isset($_POST['commonsearch'])){
        $user = array();
        $search = $_POST['search'];
    
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_common ON  attendance.attendance_id = lmar_common.lmar_common_attendance_id LEFT JOIN lmar_common_extend ON attendance.attendance_id =  lmar_common_extend.lmar_common_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND FirstName LIKE '%$search%' OR LastName LIKE '%$search%' "; 
        $readsql = mysqli_query($connection,$readquery);
    
        if(mysqli_num_rows($readsql) > 0){
            while($row = mysqli_fetch_assoc($readsql)){
                $user[] = $row;
            }
            echo json_encode($user);
        }
        else{
            echo 2;
        }
    }

    if(isset($_POST['coresearch'])){
        $user = array();
        $search = $_POST['search'];
    
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_core ON  attendance.attendance_id = lmar_core.lmar_core_attendance_id LEFT JOIN lmar_core_extend ON attendance.attendance_id =  lmar_core_extend.lmar_core_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND FirstName LIKE '%$search%' OR LastName LIKE '%$search%' "; 
        $readsql = mysqli_query($connection,$readquery);
    
        if(mysqli_num_rows($readsql) > 0){
            while($row = mysqli_fetch_assoc($readsql)){
                $user[] = $row;
            }
            echo json_encode($user);
        }
        else{
            echo 2;
        }
    }
    

    

      if(isset($_POST['coreupdate'])){
        $trainees_id = $_POST['trainessid'];
        $update = array();
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_core ON  attendance.attendance_id = lmar_core.lmar_core_attendance_id LEFT JOIN lmar_core_extend ON attendance.attendance_id =  lmar_core_extend.lmar_core_ex_attendance_id WHERE attendance_id = '$trainees_id' "; 
        $readsql = mysqli_query($connection,$readquery);
          while($row = mysqli_fetch_assoc($readsql)){
              $update[] = $row;
          }
          echo json_encode($update);
      }

      if(isset($_POST['basicupdate'])){
        $trainees_id = $_POST['trainessid'];
        $update = array();
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic ON  attendance.attendance_id = lmar_basic.lmar_basic_attendance_id LEFT JOIN lmar_basic_extend ON attendance.attendance_id =  lmar_basic_extend.lmar_basic_ex_attendance_id WHERE attendance_id = '$trainees_id' "; 
        $readsql = mysqli_query($connection,$readquery);
          while($row = mysqli_fetch_assoc($readsql)){
              $update[] = $row;
          }
          echo json_encode($update);
      }

      
      

      if(isset($_POST['edit_basic'])){
        $trainessid = $_POST['trainessid'];
        $finalsend = $_POST['finalsend'];
        $com1_1 = $_POST['com1_1'];
        $com1_2 = $_POST['com1_2'];
        $com1_3 = $_POST['com1_3'];
        $com1_4 = $_POST['com1_4'];
        $com1_5 = $_POST['com1_5'];
        $com1_6 = $_POST['com1_6'];
        $com1_7 = $_POST['com1_7'];
        $com1_8 = $_POST['com1_8'];

        $com2_1 = $_POST['com2_1'];
        $com2_2 = $_POST['com2_2'];
        $com2_3 = $_POST['com2_3'];
        $com2_4 = $_POST['com2_4'];
        $com2_5 = $_POST['com2_5'];
        $com2_6 = $_POST['com2_6'];
        $com2_7 = $_POST['com2_7'];
        $com2_8 = $_POST['com2_8'];

        $com3_1 = $_POST['com3_1'];
        $com3_2 = $_POST['com3_2'];
        $com3_3 = $_POST['com3_3'];
        $com3_4 = $_POST['com3_4'];
        $com3_5 = $_POST['com3_5'];
        $com3_6 = $_POST['com3_6'];
        $com3_7 = $_POST['com3_7'];
        $com3_8 = $_POST['com3_8'];

        $com4_1 = $_POST['com4_1'];
        $com4_2 = $_POST['com4_2'];
        $com4_3 = $_POST['com4_3'];
        $com4_4 = $_POST['com4_4'];
        $com4_5 = $_POST['com4_5'];
        $com4_6 = $_POST['com4_6'];
        $com4_7 = $_POST['com4_7'];
        $com4_8 = $_POST['com4_8'];

        $com5_1 = $_POST['com5_1'];
        $com5_2 = $_POST['com5_2'];
        $com5_3 = $_POST['com5_3'];
        $com5_4 = $_POST['com5_4'];
        $com5_5 = $_POST['com5_5'];
        $com5_6 = $_POST['com5_6'];
        $com5_7 = $_POST['com5_7'];
        $com5_8 = $_POST['com5_8'];

        $com6_1 = $_POST['com6_1'];
        $com6_2 = $_POST['com6_2'];
        $com6_3 = $_POST['com6_3'];
        $com6_4 = $_POST['com6_4'];
        $com6_5 = $_POST['com6_5'];
        $com6_6 = $_POST['com6_6'];
        $com6_7 = $_POST['com6_7'];
        $com6_8 = $_POST['com6_8'];

        $com7_1 = $_POST['com7_1'];
        $com7_2 = $_POST['com7_2'];
        $com7_3 = $_POST['com7_3'];
        $com7_4 = $_POST['com7_4'];
        $com7_5 = $_POST['com7_5'];
        $com7_6 = $_POST['com7_6'];
        $com7_7 = $_POST['com7_7'];
        $com7_8 = $_POST['com7_8'];
        
        $com8_1 = $_POST['com8_1'];
        $com8_2 = $_POST['com8_2'];
        $com8_3 = $_POST['com8_3'];
        $com8_4 = $_POST['com8_4'];
        $com8_5 = $_POST['com8_5'];
        $com8_6 = $_POST['com8_6'];
        $com8_7 = $_POST['com8_7'];
        $com8_8 = $_POST['com8_8'];

        $com9_1 = $_POST['com9_1'];
        $com9_2 = $_POST['com9_2'];
        $com9_3 = $_POST['com9_3'];
        $com9_4 = $_POST['com9_4'];
        $com9_5 = $_POST['com9_5'];
        $com9_6 = $_POST['com9_6'];
        $com9_7 = $_POST['com9_7'];
        $com9_8 = $_POST['com9_8'];

        $updatequery = "UPDATE `lmar_basic` SET `lmar_basic1_1`='$com1_1',`lmar_basic1_2`='$com1_2',`lmar_basic1_3`='$com1_3',`lmar_basic1_4`='$com1_4',`lmar_basic1_5`='$com1_5',`lmar_basic1_6`='$com1_6',`lmar_basic1_7`='$com1_7',`lmar_basic1_8`='$com1_8', `lmar_basic2_1`='$com2_1',`lmar_basic2_2`='$com2_2',`lmar_basic2_3`='$com2_3',`lmar_basic2_4`='$com2_4',`lmar_basic2_5`='$com2_5',`lmar_basic2_6`='$com2_6',`lmar_basic2_7`='$com2_7',`lmar_basic2_8`='$com2_8',`lmar_basic3_1`='$com3_1',`lmar_basic3_2`='$com3_2',`lmar_basic3_3`='$com3_3',`lmar_basic3_4`='$com3_4',`lmar_basic3_5`='$com3_5',`lmar_basic3_6`='$com3_6',`lmar_basic3_7`='$com3_7',`lmar_basic3_8`='$com3_8',`lmar_basic4_1`='$com4_1',`lmar_basic4_2`='$com4_2',`lmar_basic4_3`='$com4_3',`lmar_basic4_4`='$com4_4',`lmar_basic4_5`='$com4_5',`lmar_basic4_6`='$com4_6',`lmar_basic4_7`='$com4_7',`lmar_basic4_8`='$com4_8',`lmar_basic5_1`='$com5_1',`lmar_basic5_2`='$com5_2',`lmar_basic5_3`='$com5_3',`lmar_basic5_4`='$com5_4',`lmar_basic5_5`='$com5_5',`lmar_basic5_6`='$com5_6',`lmar_basic5_7`='$com5_7',`lmar_basic5_8`='$com5_8',`lmar_basic6_1`='$com6_1',`lmar_basic6_2`='$com6_2',`lmar_basic6_3`='$com6_3',`lmar_basic6_4`='$com6_4',`lmar_basic6_5`='$com6_5',`lmar_basic6_6`='$com6_6',`lmar_basic6_7`='$com6_7',`lmar_basic6_8`='$com6_8',`lmar_basic7_1`='$com7_1',`lmar_basic7_2`='$com7_2',`lmar_basic7_3`='$com7_3',`lmar_basic7_4`='$com7_4',`lmar_basic7_5`='$com7_5',`lmar_basic7_6`='$com7_6',`lmar_basic7_7`='$com7_7',`lmar_basic7_8`='$com7_8',`lmar_basic8_1`='$com8_1',`lmar_basic8_2`='$com8_2',`lmar_basic8_3`='$com8_3',`lmar_basic8_4`='$com8_4',`lmar_basic8_5`='$com8_5',`lmar_basic8_6`='$com8_6',`lmar_basic8_7`='$com8_7',`lmar_basic8_8`='$com8_8' WHERE lmar_basic_attendance_id = '$trainessid' ";
        $updatesql = mysqli_query($connection,$updatequery);

        $exupdatequery = "UPDATE `lmar_basic_extend` SET `lmar_basic9_1`='$com9_1',`lmar_basic9_2`='$com9_2',`lmar_basic9_3`='$com9_3',`lmar_basic9_4`='$com9_4',`lmar_basic9_5`='$com9_5',`lmar_basic9_6`='$com9_6',`lmar_basic9_7`='$com9_7',`lmar_basic9_8`='$com9_8' WHERE lmar_basic_ex_attendance_id = '$trainessid' ";
        $exupdatesql = mysqli_query($connection,$exupdatequery);



        if ($finalsend == '/'){

            $editquery = "UPDATE `attendance` SET `basic`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `basic`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        echo 1;
      }

      if(isset($_POST['edit_common'])){
        $trainessid = $_POST['trainessid'];
        $finalsend = $_POST['finalsend'];
        $com1_1 = $_POST['com1_1'];
        $com1_2 = $_POST['com1_2'];
        $com1_3 = $_POST['com1_3'];
        $com1_4 = $_POST['com1_4'];
        $com1_5 = $_POST['com1_5'];
        $com1_6 = $_POST['com1_6'];
        $com1_7 = $_POST['com1_7'];
        $com1_8 = $_POST['com1_8'];

        $com2_1 = $_POST['com2_1'];
        $com2_2 = $_POST['com2_2'];
        $com2_3 = $_POST['com2_3'];
        $com2_4 = $_POST['com2_4'];
        $com2_5 = $_POST['com2_5'];
        $com2_6 = $_POST['com2_6'];
        $com2_7 = $_POST['com2_7'];
        $com2_8 = $_POST['com2_8'];

        $com3_1 = $_POST['com3_1'];
        $com3_2 = $_POST['com3_2'];
        $com3_3 = $_POST['com3_3'];
        $com3_4 = $_POST['com3_4'];
        $com3_5 = $_POST['com3_5'];
        $com3_6 = $_POST['com3_6'];
        $com3_7 = $_POST['com3_7'];
        $com3_8 = $_POST['com3_8'];

        $com4_1 = $_POST['com4_1'];
        $com4_2 = $_POST['com4_2'];
        $com4_3 = $_POST['com4_3'];
        $com4_4 = $_POST['com4_4'];
        $com4_5 = $_POST['com4_5'];
        $com4_6 = $_POST['com4_6'];
        $com4_7 = $_POST['com4_7'];
        $com4_8 = $_POST['com4_8'];

        $com5_1 = $_POST['com5_1'];
        $com5_2 = $_POST['com5_2'];
        $com5_3 = $_POST['com5_3'];
        $com5_4 = $_POST['com5_4'];
        $com5_5 = $_POST['com5_5'];
        $com5_6 = $_POST['com5_6'];
        $com5_7 = $_POST['com5_7'];
        $com5_8 = $_POST['com5_8'];

        $com6_1 = $_POST['com6_1'];
        $com6_2 = $_POST['com6_2'];
        $com6_3 = $_POST['com6_3'];
        $com6_4 = $_POST['com6_4'];
        $com6_5 = $_POST['com6_5'];
        $com6_6 = $_POST['com6_6'];
        $com6_7 = $_POST['com6_7'];
        $com6_8 = $_POST['com6_8'];

        $com7_1 = $_POST['com7_1'];
        $com7_2 = $_POST['com7_2'];
        $com7_3 = $_POST['com7_3'];
        $com7_4 = $_POST['com7_4'];
        $com7_5 = $_POST['com7_5'];
        $com7_6 = $_POST['com7_6'];
        $com7_7 = $_POST['com7_7'];
        $com7_8 = $_POST['com7_8'];
        
        $com8_1 = $_POST['com8_1'];
        $com8_2 = $_POST['com8_2'];
        $com8_3 = $_POST['com8_3'];
        $com8_4 = $_POST['com8_4'];
        $com8_5 = $_POST['com8_5'];
        $com8_6 = $_POST['com8_6'];
        $com8_7 = $_POST['com8_7'];
        $com8_8 = $_POST['com8_8'];

        $com9_1 = $_POST['com9_1'];
        $com9_2 = $_POST['com9_2'];
        $com9_3 = $_POST['com9_3'];
        $com9_4 = $_POST['com9_4'];
        $com9_5 = $_POST['com9_5'];
        $com9_6 = $_POST['com9_6'];
        $com9_7 = $_POST['com9_7'];
        $com9_8 = $_POST['com9_8'];

        $updatequery = "UPDATE `lmar_common` SET `lmar_common1_1`='$com1_1',`lmar_common1_2`='$com1_2',`lmar_common1_3`='$com1_3',`lmar_common1_4`='$com1_4',`lmar_common1_5`='$com1_5',`lmar_common1_6`='$com1_6',`lmar_common1_7`='$com1_7',`lmar_common1_8`='$com1_8', `lmar_common2_1`='$com2_1',`lmar_common2_2`='$com2_2',`lmar_common2_3`='$com2_3',`lmar_common2_4`='$com2_4',`lmar_common2_5`='$com2_5',`lmar_common2_6`='$com2_6',`lmar_common2_7`='$com2_7',`lmar_common2_8`='$com2_8',`lmar_common3_1`='$com3_1',`lmar_common3_2`='$com3_2',`lmar_common3_3`='$com3_3',`lmar_common3_4`='$com3_4',`lmar_common3_5`='$com3_5',`lmar_common3_6`='$com3_6',`lmar_common3_7`='$com3_7',`lmar_common3_8`='$com3_8',`lmar_common4_1`='$com4_1',`lmar_common4_2`='$com4_2',`lmar_common4_3`='$com4_3',`lmar_common4_4`='$com4_4',`lmar_common4_5`='$com4_5',`lmar_common4_6`='$com4_6',`lmar_common4_7`='$com4_7',`lmar_common4_8`='$com4_8',`lmar_common5_1`='$com5_1',`lmar_common5_2`='$com5_2',`lmar_common5_3`='$com5_3',`lmar_common5_4`='$com5_4',`lmar_common5_5`='$com5_5',`lmar_common5_6`='$com5_6',`lmar_common5_7`='$com5_7',`lmar_common5_8`='$com5_8',`lmar_common6_1`='$com6_1',`lmar_common6_2`='$com6_2',`lmar_common6_3`='$com6_3',`lmar_common6_4`='$com6_4',`lmar_common6_5`='$com6_5',`lmar_common6_6`='$com6_6',`lmar_common6_7`='$com6_7',`lmar_common6_8`='$com6_8',`lmar_common7_1`='$com7_1',`lmar_common7_2`='$com7_2',`lmar_common7_3`='$com7_3',`lmar_common7_4`='$com7_4',`lmar_common7_5`='$com7_5',`lmar_common7_6`='$com7_6',`lmar_common7_7`='$com7_7',`lmar_common7_8`='$com7_8',`lmar_common8_1`='$com8_1',`lmar_common8_2`='$com8_2',`lmar_common8_3`='$com8_3',`lmar_common8_4`='$com8_4',`lmar_common8_5`='$com8_5',`lmar_common8_6`='$com8_6',`lmar_common8_7`='$com8_7',`lmar_common8_8`='$com8_8' WHERE lmar_common_attendance_id = '$trainessid' ";
        $updatesql = mysqli_query($connection,$updatequery);

        $exupdatequery = "UPDATE `lmar_common_extend` SET `lmar_common9_1`='$com9_1',`lmar_common9_2`='$com9_2',`lmar_common9_3`='$com9_3',`lmar_common9_4`='$com9_4',`lmar_common9_5`='$com9_5',`lmar_common9_6`='$com9_6',`lmar_common9_7`='$com9_7',`lmar_common9_8`='$com9_8' WHERE lmar_common_ex_attendance_id = '$trainessid' ";
        $exupdatesql = mysqli_query($connection,$exupdatequery);



        if ($finalsend == '/'){

            $editquery = "UPDATE `attendance` SET `common`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `common`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        echo 1;
      }

      if(isset($_POST['edit_core'])){
        $trainessid = $_POST['trainessid'];
        $finalsend1 = $_POST['finalsend1'];
        $finalsend2 = $_POST['finalsend2'];
        $finalsend3 = $_POST['finalsend3'];
        $finalsend4 = $_POST['finalsend4'];
        $finalsend5 = $_POST['finalsend5'];
        $finalsend6 = $_POST['finalsend6'];

        $com1_1 = $_POST['com1_1'];
        $com1_2 = $_POST['com1_2'];
        $com1_3 = $_POST['com1_3'];
        $com1_4 = $_POST['com1_4'];
        $com1_5 = $_POST['com1_5'];
        $com1_6 = $_POST['com1_6'];
        $com1_7 = $_POST['com1_7'];
        $com1_8 = $_POST['com1_8'];

        $com2_1 = $_POST['com2_1'];
        $com2_2 = $_POST['com2_2'];
        $com2_3 = $_POST['com2_3'];
        $com2_4 = $_POST['com2_4'];
        $com2_5 = $_POST['com2_5'];
        $com2_6 = $_POST['com2_6'];
        $com2_7 = $_POST['com2_7'];
        $com2_8 = $_POST['com2_8'];

        $com3_1 = $_POST['com3_1'];
        $com3_2 = $_POST['com3_2'];
        $com3_3 = $_POST['com3_3'];
        $com3_4 = $_POST['com3_4'];
        $com3_5 = $_POST['com3_5'];
        $com3_6 = $_POST['com3_6'];
        $com3_7 = $_POST['com3_7'];
        $com3_8 = $_POST['com3_8'];

        $com4_1 = $_POST['com4_1'];
        $com4_2 = $_POST['com4_2'];
        $com4_3 = $_POST['com4_3'];
        $com4_4 = $_POST['com4_4'];
        $com4_5 = $_POST['com4_5'];
        $com4_6 = $_POST['com4_6'];
        $com4_7 = $_POST['com4_7'];
        $com4_8 = $_POST['com4_8'];

        $com5_1 = $_POST['com5_1'];
        $com5_2 = $_POST['com5_2'];
        $com5_3 = $_POST['com5_3'];
        $com5_4 = $_POST['com5_4'];
        $com5_5 = $_POST['com5_5'];
        $com5_6 = $_POST['com5_6'];
        $com5_7 = $_POST['com5_7'];
        $com5_8 = $_POST['com5_8'];

        $com6_1 = $_POST['com6_1'];
        $com6_2 = $_POST['com6_2'];
        $com6_3 = $_POST['com6_3'];
        $com6_4 = $_POST['com6_4'];
        $com6_5 = $_POST['com6_5'];
        $com6_6 = $_POST['com6_6'];
        $com6_7 = $_POST['com6_7'];
        $com6_8 = $_POST['com6_8'];

        $com7_1 = $_POST['com7_1'];
        $com7_2 = $_POST['com7_2'];
        $com7_3 = $_POST['com7_3'];
        $com7_4 = $_POST['com7_4'];
        $com7_5 = $_POST['com7_5'];
        $com7_6 = $_POST['com7_6'];
        $com7_7 = $_POST['com7_7'];
        $com7_8 = $_POST['com7_8'];
        
        $com8_1 = $_POST['com8_1'];
        $com8_2 = $_POST['com8_2'];
        $com8_3 = $_POST['com8_3'];
        $com8_4 = $_POST['com8_4'];
        $com8_5 = $_POST['com8_5'];
        $com8_6 = $_POST['com8_6'];
        $com8_7 = $_POST['com8_7'];
        $com8_8 = $_POST['com8_8'];

        $com9_1 = $_POST['com9_1'];
        $com9_2 = $_POST['com9_2'];
        $com9_3 = $_POST['com9_3'];
        $com9_4 = $_POST['com9_4'];
        $com9_5 = $_POST['com9_5'];
        $com9_6 = $_POST['com9_6'];
        $com9_7 = $_POST['com9_7'];
        $com9_8 = $_POST['com9_8'];

        $updatequery = "UPDATE `lmar_core` SET `lmar_core1_1`='$com1_1',`lmar_core1_2`='$com1_2',`lmar_core1_3`='$com1_3',`lmar_core1_4`='$com1_4',`lmar_core1_5`='$com1_5',`lmar_core1_6`='$com1_6',`lmar_core1_7`='$com1_7',`lmar_core1_8`='$com1_8', `lmar_core2_1`='$com2_1',`lmar_core2_2`='$com2_2',`lmar_core2_3`='$com2_3',`lmar_core2_4`='$com2_4',`lmar_core2_5`='$com2_5',`lmar_core2_6`='$com2_6',`lmar_core2_7`='$com2_7',`lmar_core2_8`='$com2_8',`lmar_core3_1`='$com3_1',`lmar_core3_2`='$com3_2',`lmar_core3_3`='$com3_3',`lmar_core3_4`='$com3_4',`lmar_core3_5`='$com3_5',`lmar_core3_6`='$com3_6',`lmar_core3_7`='$com3_7',`lmar_core3_8`='$com3_8',`lmar_core4_1`='$com4_1',`lmar_core4_2`='$com4_2',`lmar_core4_3`='$com4_3',`lmar_core4_4`='$com4_4',`lmar_core4_5`='$com4_5',`lmar_core4_6`='$com4_6',`lmar_core4_7`='$com4_7',`lmar_core4_8`='$com4_8',`lmar_core5_1`='$com5_1',`lmar_core5_2`='$com5_2',`lmar_core5_3`='$com5_3',`lmar_core5_4`='$com5_4',`lmar_core5_5`='$com5_5',`lmar_core5_6`='$com5_6',`lmar_core5_7`='$com5_7',`lmar_core5_8`='$com5_8',`lmar_core6_1`='$com6_1',`lmar_core6_2`='$com6_2',`lmar_core6_3`='$com6_3',`lmar_core6_4`='$com6_4',`lmar_core6_5`='$com6_5',`lmar_core6_6`='$com6_6',`lmar_core6_7`='$com6_7',`lmar_core6_8`='$com6_8',`lmar_core7_1`='$com7_1',`lmar_core7_2`='$com7_2',`lmar_core7_3`='$com7_3',`lmar_core7_4`='$com7_4',`lmar_core7_5`='$com7_5',`lmar_core7_6`='$com7_6',`lmar_core7_7`='$com7_7',`lmar_core7_8`='$com7_8',`lmar_core8_1`='$com8_1',`lmar_core8_2`='$com8_2',`lmar_core8_3`='$com8_3',`lmar_core8_4`='$com8_4',`lmar_core8_5`='$com8_5',`lmar_core8_6`='$com8_6',`lmar_core8_7`='$com8_7',`lmar_core8_8`='$com8_8' WHERE lmar_core_attendance_id = '$trainessid' ";
        $updatesql = mysqli_query($connection,$updatequery);

        $exupdatequery = "UPDATE `lmar_core_extend` SET `lmar_core9_1`='$com9_1',`lmar_core9_2`='$com9_2',`lmar_core9_3`='$com9_3',`lmar_core9_4`='$com9_4',`lmar_core9_5`='$com9_5',`lmar_core9_6`='$com9_6',`lmar_core9_7`='$com9_7',`lmar_core9_8`='$com9_8' WHERE lmar_core_ex_attendance_id = '$trainessid' ";
        $exupdatesql = mysqli_query($connection,$exupdatequery);



        if ($finalsend1 == '/'){

            $editquery = "UPDATE `attendance` SET `core1`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core1`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        if ($finalsend2 == '/'){

            $editquery = "UPDATE `attendance` SET `core2`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core2`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        if ($finalsend3 == '/'){

            $editquery = "UPDATE `attendance` SET `core3`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core3`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        if ($finalsend4 == '/'){

            $editquery = "UPDATE `attendance` SET `core4`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core4`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        if ($finalsend5 == '/'){

            $editquery = "UPDATE `attendance` SET `core5`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core5`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        
        if ($finalsend6 == '/'){

            $editquery = "UPDATE `attendance` SET `core6`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core6`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

      
    
        echo 1;
      }

      

}



?>