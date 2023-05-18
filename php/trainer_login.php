<?php

require('./database.php');

if(isset($_POST['username']) || isset($_POST['password'])){

$userName = $_POST['username'];
$password = trim(md5($_POST['password']));


$trainerloginquery = "SELECT * FROM `trainer_account` WHERE trainer_email_address='$userName' AND trainer_password = '$password'";
$trainerloginsql = mysqli_query($connection,$trainerloginquery);

$adminloginquery = "SELECT * FROM `admin_account` WHERE admin_email='$userName' AND admin_password = '$password' ";
$adminloginsql = mysqli_query($connection,$adminloginquery);

if($adminloginsql->num_rows > 0 ){
    echo 7;
}
else if($trainerloginsql->num_rows > 0 ){

    session_start();
    $data = $trainerloginsql->fetch_assoc();
    $_SESSION['id'] = $data['trainer_id'];
    $ver_id = $data['trainer_id'];
    $_SESSION['col'] = 3;



    $_SESSION['status'] = 'valid';


    $verificationquery = "SELECT * FROM `trainer_list_qualification` WHERE trainer_qualification_list = '$ver_id' AND verification = 1";
    $verificationsql = mysqli_query($connection,$verificationquery);

    while($vrow = mysqli_fetch_array($verificationsql)){
        date_default_timezone_set('Asia/Manila');   
        $today = date('m/d/Y');
        $vid = $vrow['tl_id']."<br>";
        $vend = $vrow['validity_date']."<br>";
        if($vend <  $today){
            $verquery = "UPDATE `trainer_list_qualification` SET `verification`='2' WHERE tl_id='$vid'";
            $sql = mysqli_query($connection,$verquery);
            

        
        }
    }

    if($verificationsql->num_rows > 0){
        
        echo 1;
    }
    else{

        echo 2;
    }




}
else{
    echo 0;
}
}

?>

