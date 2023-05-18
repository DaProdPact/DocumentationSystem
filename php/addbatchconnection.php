<?php

require('./database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $session_id = $_SESSION['id'];
    $qualification = $_SESSION['choosecourse'];

// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
if(isset($_GET['expired'])){

    $batch = array();

    $readquery = "SELECT * FROM `batch_list` LEFT JOIN trainer_qualification ON batch_list.batch_qualification = trainer_qualification.qualification_id WHERE batch_trainer = '$session_id' AND batch_qualification = '$qualification' AND batch_validation = '2' "; 
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
$start =( $start * 10) - 10;

$readquery = "SELECT * FROM `batch_list` LEFT JOIN trainer_qualification ON batch_list.batch_qualification = trainer_qualification.qualification_id WHERE batch_trainer = '$session_id' AND batch_qualification = '$qualification' AND batch_validation != '2' LIMIT $start,10"; 
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






?>