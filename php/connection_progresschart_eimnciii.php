<?php

require('./database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $session_id = $_SESSION['id'];
    $session_batch =  $_SESSION['batch'];
    $sessionqualification = $_SESSION['choosecourse'];

// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
if(isset($_GET['getcommon'])){

$batch = array();
$start = $_GET['page'];
$start = ( $start * 10) - 10;

$readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimnciii ON  attendance.attendance_id = lmar_eimnciii.lmar_eimnciii_attendance_id  WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC LIMIT $start,10"; 
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

    $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic_nciii ON  attendance.attendance_id = lmar_basic_nciii.lmar_basicnciii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC LIMIT $start,10"; 
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
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic_nciii ON  attendance.attendance_id = lmar_basic_nciii.lmar_basicnciii_attendance_id WHERE attendance_id = '$trainees_id' "; 
        $readsql = mysqli_query($connection,$readquery);
          while($row = mysqli_fetch_assoc($readsql)){
              $update[] = $row;
          }
          echo json_encode($update);
      }

      else if(isset($_POST['updatecommon'])){
        $trainees_id = $_POST['trainessid'];
        $update = array();
        $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimnciii ON  attendance.attendance_id = lmar_eimnciii.lmar_eimnciii_attendance_id  WHERE attendance_id = '$trainees_id' "; 
        $readsql = mysqli_query($connection,$readquery);
          while($row = mysqli_fetch_assoc($readsql)){
              $update[] = $row;
          }
          echo json_encode($update);
      }

      else if(isset($_POST['edit'])){
        $trainessid = $_POST['trainessid'];
        $com1_1 = $_POST['com1_1'];
        $com1_2 = $_POST['com1_2'];
        $com1_3 = $_POST['com1_3'];
        $com2_1 = $_POST['com2_1'];
        $com2_2 = $_POST['com2_2'];
        $com2_3 = $_POST['com2_3'];
        $com2_4 = $_POST['com2_4'];

        $com3_1 = $_POST['com3_1'];
        $com3_2 = $_POST['com3_2'];
        $com3_3 = $_POST['com3_3'];
        $com3_4 = $_POST['com3_4'];

        $com4_1 = $_POST['com4_1'];
        $com4_2 = $_POST['com4_2'];
        $com4_3 = $_POST['com4_3'];
        $com5_1 = $_POST['com5_1'];
        $com5_2 = $_POST['com5_2'];
        $com5_3 = $_POST['com5_3'];
        $com6_1 = $_POST['com6_1'];
        $com6_2 = $_POST['com6_2'];
        $com6_3 = $_POST['com6_3'];
        $com7_1 = $_POST['com7_1'];
        $com7_2 = $_POST['com7_2'];
        $com7_3 = $_POST['com7_3'];
        $com8_1 = $_POST['com8_1'];
        $com8_2 = $_POST['com8_2'];
        $com8_3 = $_POST['com8_3'];
        $com9_1 = $_POST['com9_1'];
        $com9_2 = $_POST['com9_2'];
        $com9_3 = $_POST['com9_3'];


        // $updatequery = "UPDATE `lmar_basic_ncii` SET `lmar_basic_ncii1_1`='$com1_1' WHERE lmar_basic_ncii_attendance_id = '$trainessid' "; 

        $updatequery = "UPDATE `lmar_basic_nciii` SET `lmar_basic_nciii1_1`='$com1_1',`lmar_basic_nciii1_2`='$com1_2',`lmar_basic_nciii1_3`='$com1_3',`lmar_basic_nciii2_1`='$com2_1',`lmar_basic_nciii2_2`='$com2_2',`lmar_basic_nciii2_3`='$com2_3',`lmar_basic_nciii2_4`='$com2_4',`lmar_basic_nciii3_1`='$com3_1',`lmar_basic_nciii3_2`='$com3_2',`lmar_basic_nciii3_3`='$com3_3',`lmar_basic_nciii3_4`='$com3_4',`lmar_basic_nciii4_1`='$com4_1',`lmar_basic_nciii4_2`='$com4_2',`lmar_basic_nciii4_3`='$com4_3',`lmar_basic_nciii5_1`='$com5_1',`lmar_basic_nciii5_2`='$com5_2',`lmar_basic_nciii5_3`='$com5_3',`lmar_basic_nciii6_1`='$com6_1',`lmar_basic_nciii6_2`='$com6_2',`lmar_basic_nciii6_3`='$com6_3',`lmar_basic_nciii7_1`='$com7_1',`lmar_basic_nciii7_2`='$com7_2',`lmar_basic_nciii7_3`='$com7_3',`lmar_basic_nciii8_1`='$com8_1',`lmar_basic_nciii8_2`='$com8_2',`lmar_basic_nciii8_3`='$com8_3',`lmar_basic_nciii9_1`='$com9_1',`lmar_basic_nciii9_2`='$com9_2',`lmar_basic_nciii9_3`='$com9_3' WHERE lmar_basicnciii_attendance_id = '$trainessid' "; 
        $updatesql = mysqli_query($connection,$updatequery);


        if($com1_1 == '/' && $com1_2 == '/' && $com1_3 == '/' && $com2_1 == '/' && $com2_2 == '/' && $com2_3 == '/' && $com2_4 == '/' && $com3_1 == '/' && $com3_2 == '/' && $com3_3 == '/' && $com3_4 == '/' && $com4_1 == '/' && $com4_2 == '/' && $com4_3 == '/' && $com5_1 == '/' && $com5_2 == '/' && $com5_3 == '/' && $com6_1 == '/' && $com6_2 == '/' && $com6_3 == '/' && $com7_1 == '/' && $com7_2 == '/' && $com7_3 == '/' && $com8_1 == '/' && $com8_2 == '/' && $com8_3 == '/' && $com9_1 == '/' && $com9_2 == '/' && $com9_3 == '/'){

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
        $com1_1 = $_POST['com1_1'];
        $com1_2 = $_POST['com1_2'];
        $com1_3 = $_POST['com1_3'];
        $com1_4 = $_POST['com1_4'];
   
        $com2_1 = $_POST['com2_1'];
        $com2_2 = $_POST['com2_2'];
        $com2_3 = $_POST['com2_3'];
   
        $com3_1 = $_POST['com3_1'];
        $com3_2 = $_POST['com3_2'];
        $com3_3 = $_POST['com3_3'];
        $com3_4 = $_POST['com3_4'];
   
   
        $com4_1 = $_POST['com4_1'];
        $com4_2 = $_POST['com4_2'];
        $com4_3 = $_POST['com4_3'];
   
   
        $com5_1 = $_POST['com5_1'];
        $com5_2 = $_POST['com5_2'];
        $com5_3 = $_POST['com5_3'];
   
        $com6_1 = $_POST['com6_1'];
        $com6_2 = $_POST['com6_2'];
        $com6_3 = $_POST['com6_3'];

        $updatequery = "UPDATE `lmar_eimnciii` SET `lmar_eimnciii_common1_1`='$com1_1',`lmar_eimnciii_common1_2`='$com1_2',`lmar_eimnciii_common1_3`='$com1_3',`lmar_eimnciii_common1_4`='$com1_4',`lmar_eimnciii_common2_1`='$com2_1',`lmar_eimnciii_common2_2`='$com2_2',`lmar_eimnciii_common2_3`='$com2_3',`lmar_eimnciii_common3_1`='$com3_1',`lmar_eimnciii_common3_2`='$com3_2',`lmar_eimnciii_common3_3`='$com3_3',`lmar_eimnciii_common3_4`='$com3_4',`lmar_eimnciii_common4_1`='$com4_1',`lmar_eimnciii_common4_2`='$com4_2',`lmar_eimnciii_common4_3`='$com4_3',`lmar_eimnciii_common5_1`='$com5_1',`lmar_eimnciii_common5_2`='$com5_2',`lmar_eimnciii_common5_3`='$com5_3',`lmar_eimnciii_common6_1`='$com6_1',`lmar_eimnciii_common6_2`='$com6_2',`lmar_eimnciii_common6_3`='$com6_3' WHERE lmar_eimnciii_attendance_id  = '$trainessid' "; 
        $updatesql = mysqli_query($connection,$updatequery);

        
        if($com1_1 == '/' && $com1_2 == '/' && $com1_3 == '/' && $com1_4 == '/' && $com2_1 == '/' && $com2_2 == '/' && $com2_3 == '/' && $com3_1 == '/' && $com3_2 == '/' && $com3_3 == '/' && $com3_4 == '/' && $com4_1 == '/' && $com4_2 == '/' && $com4_3 == '/' && $com5_1 == '/' && $com5_2 == '/' && $com5_3 == '/' && $com6_1 == '/' && $com6_2 == '/' && $com6_3 == '/' ){

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

        $com1_1 = $_POST['com1_1'];
        $com1_2 = $_POST['com1_2'];
        $com1_3 = $_POST['com1_3'];
        $com1_4 = $_POST['com1_4'];

        $com2_1 = $_POST['com2_1'];
        $com2_2 = $_POST['com2_2'];
        $com2_3 = $_POST['com2_3'];
    
        $com3_1 = $_POST['com3_1'];
        $com3_2 = $_POST['com3_2'];
        $com3_3 = $_POST['com3_3'];
        $com3_4 = $_POST['com3_4'];

        


  
        $updatequery = "UPDATE `lmar_eimnciii` SET `lmar_eimnciii_core1_1`='$com1_1',`lmar_eimnciii_core1_2`='$com1_2',`lmar_eimnciii_core1_3`='$com1_3',`lmar_eimnciii_core1_4`='$com1_4',`lmar_eimnciii_core2_1`='$com2_1',`lmar_eimnciii_core2_2`='$com2_2',`lmar_eimnciii_core2_3`='$com2_3',`lmar_eimnciii_core3_1`='$com3_1',`lmar_eimnciii_core3_2`='$com3_2',`lmar_eimnciii_core3_3`='$com3_3',`lmar_eimnciii_core3_4`='$com3_4'   WHERE lmar_eimnciii_attendance_id = '$trainessid' "; 
        $updatesql = mysqli_query($connection,$updatequery);

        if($com1_1 == '/' && $com1_2 == '/' && $com1_3 == '/' && $com1_4 == '/'){

            $editquery = "UPDATE `attendance` SET `core1`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core1`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        
        if($com2_1 == '/' && $com2_2 == '/' && $com2_3 == '/'){

            $editquery2 = "UPDATE `attendance` SET `core2`='1' WHERE attendance_id = '$trainessid' ";
            $editsql2 = mysqli_query($connection,$editquery2);


        }
        else{
            $editquery2 = "UPDATE `attendance` SET `core2`='0' WHERE attendance_id = '$trainessid' ";
            $editsql2 = mysqli_query($connection,$editquery2);


        }

        if($com3_1 == '/' && $com3_2 == '/' && $com3_3 == '/' && $com3_4 == '/'){

            $editquery = "UPDATE `attendance` SET `core3`='1' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);


        }
        else{
            $editquery = "UPDATE `attendance` SET `core3`='0' WHERE attendance_id = '$trainessid' ";
            $editsql = mysqli_query($connection,$editquery);
        }

        echo 1;
      }



      

}



?>