<?php
        require('./database.php');
        date_default_timezone_set('Asia/Manila');   
        $today = date('m/d/Y');
        $batch_query = "SELECT * FROM `batch_list` ";
        $batchsql = mysqli_query($connection,$batch_query);       
  
        while($batrow = mysqli_fetch_array($batchsql)){
            $batid = $batrow['batch_id']."<br>";
            $bat = $batrow['date_end']."<br>";
            if($bat <  $today){
                $batchquery = "UPDATE `batch_list` SET `batch_validation`='2' WHERE batch_id='$batid'";
                $sql = mysqli_query($connection,$batchquery);
                echo 1;
            }
         }?>


