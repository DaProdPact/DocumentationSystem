
<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();

$user = array();
$start = $_GET['page'];
$start =( $start * 10) - 10;

$readquery = "SELECT * FROM `trb` LIMIT $start,10"; 
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