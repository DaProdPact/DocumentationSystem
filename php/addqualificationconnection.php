<?php

require('./database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $session_id = $_SESSION['id'];

// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 


if(isset($_GET['expired'])){
    $batch = array();

    $readquery = "SELECT * FROM `trainer_list_qualification` LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id WHERE trainer_qualification_list = '$session_id' AND verification = '2' "; 
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

$readquery = "SELECT * FROM `trainer_list_qualification` LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id WHERE trainer_qualification_list = '$session_id' AND verification != '2' LIMIT $start,10"; 
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