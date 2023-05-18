<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['getbatch'])) {
    $getquali = array();
    $start = $_GET['page'];
    $sessiontrainees = $_GET['sessiontrainees'];
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `attendance` WHERE import_batch = '$sessiontrainees' ORDER BY LastName ASC LIMIT $start,10"; 
    $getsqualisql = mysqli_query($connection,$getqualiquery);
    
    if(mysqli_num_rows($getsqualisql) > 0){
        while($row = mysqli_fetch_assoc($getsqualisql)){
            $getquali[] = $row;
        }
        echo json_encode($getquali);
    }
    else{
        echo 2;
    }
}
else{
    $sessiontrainees = $_GET['sessiontrainees'];
    $stmt = " SELECT COUNT(attendance_id) as total FROM `attendance` WHERE import_batch = '$sessiontrainees'";
    $result = mysqli_query($connection, $stmt);
   
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       echo $row["total"];
    }
}

    
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit'])) {

        $editid = $_POST['editid'];
        $editdetails = array();
        $editquery = "SELECT * FROM `batch_list` WHERE batch_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $batchname = $_POST['batchname'];
        $batchyear = $_POST['batchyear'];
        $datestart = $_POST['datestart'];
        $scholar = $_POST['scholar'];
        $dateend - $_POST['dateend'];

        
        $editdetails = array();
        
        $editquery = "UPDATE `batch_list` SET `batch_name`='$batchname',`batch_year`='$batchyear',`date_start`='$datestart', `date_end`='$dateend', `scholarship_program`='$scholar' WHERE `batch_id` = '$updid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }

    else if(isset($_POST['add'])) {



        $addqualificationname = $_POST['addqualificationname'];
        $addqualificationcode = $_POST['addqualificationcode'];


        $detailsadd = array();
        
        $addquery = "INSERT INTO `trainer_qualification`(`qualification_id`, `qualification_code`, `qualification_title`) VALUES ('','$addqualificationname','$addqualificationcode')";
        $addsql = mysqli_query($connection,$addquery);
    

        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];


        $deletequery = "DELETE FROM `batch_list` WHERE batch_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;

        
    }

    else if(isset($_POST['accept'])) {

        $remove = $_POST['remove'];


        $deletequery = "DELETE FROM `batch_list` WHERE batch_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;

        
    }

    
}






?>
