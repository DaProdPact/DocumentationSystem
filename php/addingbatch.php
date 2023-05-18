<?php

require('./database.php');

    session_start();
    $session_id = $_SESSION['id'];
    $qualification = $_SESSION['choosecourse'];


 


     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $getname = $_POST['getname'];
        $batchname = $_POST['batchname'];
        $year = $_POST['year'];
  


         $query = "INSERT INTO `batch_list`(`batch_trainer`, `batch_qualification`, `batch_name`, `batch_year` , `batch_validation`) VALUES ('$session_id','$qualification','$batchname','$year','0')";          
        if(mysqli_query($connection,$query)){
            echo json_encode($_POST);
        }
    
         else{
            echo 0;
         }
        }
    

    






?>
