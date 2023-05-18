
<?php

require('./database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();
    $session_id = $_SESSION['id'];
    $qualification = $_SESSION['choosecourse'];
    $batch = $_SESSION['batch'];
// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
$user = array();
$start = $_GET['page'];
$start =( $start * 10) - 10;

$readquery = "SELECT * FROM `attendance` LEFT JOIN sil ON attendance.sil_certificate_id = sil.sil_id  WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$qualification' AND  import_batch = '$batch' LIMIT $start,10"; 
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
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['updates'])){
        $sil_edit = $_POST['sil_edit'];
        $traineesId = $_POST['traineesId'];
        
        $readquery = "UPDATE `attendance` SET `sil_certificate_id`='$sil_edit'  WHERE attendance_id = '$traineesId' "; 
        $readsql = mysqli_query($connection,$readquery);

        echo 1;
        
    }
    else if(isset($_POST['datestart'])){
        session_start();
    
        $datestart = $_POST['datestart'];
        $dateend = $_POST['dateend'];

    
        $_SESSION['sildatestart'] = $datestart;
        $_SESSION['sildateend'] = $dateend;
        echo 1;
    
    
        }else{
        $traineesId = $_POST['traineesId'];
        $update = array();
        $readquery = "SELECT * FROM `attendance` LEFT JOIN sil ON  attendance.sil_certificate_id = sil.sil_id WHERE attendance_id = '$traineesId' "; 
        $readsql = mysqli_query($connection,$readquery);
          while($row = mysqli_fetch_assoc($readsql)){
              $update[] = $row;
          }
        echo json_encode($update);

    }


}






?>