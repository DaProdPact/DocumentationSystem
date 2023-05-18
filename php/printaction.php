<?php
require('./database.php');
    $trainessid = $_POST['trainessid'];

    if(isset($_POST['update'])){
      $update = array();
      $readquery = "SELECT * FROM `attendance` WHERE attendance_id = '$trainessid' "; 
      $readsql = mysqli_query($connection,$readquery);
        while($row = mysqli_fetch_assoc($readsql)){
            $update[] = $row;
        }
        echo json_encode($update);
    }
  
    
    else if (isset($_POST['edit'])){
   

    $com1 = $_POST['com1'];
    $com2 = $_POST['com2'];
    $com3 = $_POST['com3'];

      
    $editquery = "UPDATE `attendance` SET `core1`='$com1',`core2`='$com2',`core3`='$com3' WHERE attendance_id = '$trainessid' ";
    $editsql = mysqli_query($connection,$editquery);
    $edit = array();


          $edit[] = $com1;
          $edit[] = $com2;
          $edit[] = $com3;

      
      echo json_encode($edit);
  
      
    }
    else{
      echo 2;
  }

  

    ?>