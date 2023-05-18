

<?php


require('./database.php');
session_start();
$session_id = $_SESSION['id'];
$qualification = $_SESSION['choosecourse'];
$batch = $_SESSION['batch'];





if($_SERVER['REQUEST_METHOD'] == 'GET'){
// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
 $stmt = " SELECT COUNT(attendance_id) as total FROM `attendance`  WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$qualification' AND  import_batch = '$batch' ";
 $result = mysqli_query($connection, $stmt);

 if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    echo $row["total"];


 }

}
?>
