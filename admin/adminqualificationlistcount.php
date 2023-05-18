<?php


require('../php/database.php');
session_start();


if($_SERVER['REQUEST_METHOD'] == 'GET'){
// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
 $stmt = " SELECT COUNT(qualification_id) as total FROM `trainer_qualification` ";
 $result = mysqli_query($connection, $stmt);

 if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    echo $row["total"];


 }

}
?>
