<?php


require('./database.php');
session_start();
$session_id = $_SESSION['id'];




if($_SERVER['REQUEST_METHOD'] == 'GET'){
// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
 $stmt = " SELECT COUNT(batch_id) as total FROM `batch_list` WHERE batch_trainer = '$session_id' AND batch_qualification = '$qualification' ";
 $result = mysqli_query($connection, $stmt);

 if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    echo $row["total"];


 }

}
?>
