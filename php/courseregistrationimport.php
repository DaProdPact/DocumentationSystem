<?php

require('./database.php');
session_start();
$session_id = $_SESSION['id'];
$qualification = $_SESSION['choosecourse'];
$batch = $_SESSION['batch'];

if(isset($_POST['import'])){
  $filename = $_FILES["file"]["tmp_name"];

  if($_FILES["file"]["size"] > 0){
    $file = fopen($filename, "r");

    while(($column = fgetcsv($file, 10000,",")) !== FALSE){


      if($column[0] != 'LastName'){
        $column0 = $column[0];
        $column1 = $column[1];
        $column2 = $column[2];
        $column3 = $column[3];
        $column4 = $column[4];
        $column5 = $column[5];
        $column6 = $column[6];
        $column7 = $column[7];
        $column8 = $column[8];
        $column9 = $column[9];
        $column10 = $column[10];
      
  

          $sqlInsert = "UPDATE `attendance` SET `MessengerAccount`='$column8',`Guardian`='$column9',`ContactGuardian`='$column10' WHERE LastName = '$column0'";
          $result = mysqli_query($connection,$sqlInsert);

          

      }
      else{

      }


    }

      echo '<script type="text/javascript">';
      echo 'window.location.href="courseregistration.php";';
      echo '</script>';
    
  }
}
?>  