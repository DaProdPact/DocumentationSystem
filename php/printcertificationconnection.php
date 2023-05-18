<?php

require('./database.php');
session_start();
$session_id = $_SESSION['id'];
$session_batch =  $_SESSION['batch'];
$sessionqualification = $_SESSION['choosecourse'];

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['page'])){

// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
$batch = array();
$start = $_GET['page'];
$start = ( $start * 10) - 10;

$readquery = "SELECT * FROM `attendance` LEFT JOIN trainer_account ON attendance.import_trainer_id = trainer_account.trainer_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC LIMIT $start,10"; 
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
    if(isset($_POST['search'])){
        $user = array();
        $search = $_POST['search'];
    
        $readquery = "SELECT * FROM `attendance` LEFT JOIN trainer_account ON attendance.import_trainer_id = trainer_account.trainer_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND  FirstName LIKE '%$search%' OR LastName LIKE '%$search%' "; 
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
    else{
    session_start();

    $datecert = $_POST['datecert'];

    $_SESSION['datecertval'] = $datecert;
    echo 1;


    }

}



?>