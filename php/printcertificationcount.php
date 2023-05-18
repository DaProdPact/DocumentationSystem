<?php


require('./database.php');
session_start();
session_start();
$session_id = $_SESSION['id'];
$session_batch =  $_SESSION['batch'];
$sessionqualification = $_SESSION['choosecourse'];




if($_SERVER['REQUEST_METHOD'] == 'GET'){
// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
 $stmt = "SELECT COUNT(attendance_id) as total FROM `batch_list`  WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ";
 $result = mysqli_query($connection, $stmt);

 if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    echo $row["total"];


 }

}
?>
