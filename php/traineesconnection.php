
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

$readquery = "SELECT * FROM `attendance` WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$qualification' AND  import_batch = '$batch' ORDER BY LastName ASC LIMIT $start,10"; 
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

else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit'])) {
        $user = array();
    $traineesId = $_POST['traineesId'];

        


$readquery = "SELECT * FROM `attendance` WHERE attendance_id = '$traineesId' "; 
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
    else if(isset($_POST['upId'])){
        $updateId = $_POST['updateId'];
        $fname = $_POST['fname']; 
        $mname = $_POST['mname'];  
        $lname = $_POST['lname']; 
        $ename = $_POST['ename']; 
        $email = $_POST['email']; 
        $cnumber = $_POST['cnumber']; 
        $street = $_POST['street']; 
        $barangay = $_POST['barangay']; 
        $municipality = $_POST['municipality']; 
        $province = $_POST['province'];
        $birth = $_POST['birth'];
        $age = $_POST['age'];
        $hea = $_POST['hea'];
        $messenger = $_POST['messenger'];
        $fnguardian = $_POST['fnguardian'];
        $cnguardian = $_POST['cnguardian'];

        $updatequery = "UPDATE `attendance` SET `LastName`='$lname',`FirstName`='$fname',`MiddleName`='$mname',`Extension_Name`='$ename',`Contact_Number`='$cnumber',`Email_Address`='$email',`Street_No`='$street',`Barangay`='$barangay',`Municipality`='$municipality',`Permanent_Province`='$province',`Date_of_Birth`='$birth',`Age`='$age',`Higher_Educational_Attaintment`='$hea',`MessengerAccount`='$messenger',`Guardian`='$fnguardian',`ContactGuardian`='$cnguardian' WHERE attendance_id = '$updateId' ";
        $updatesql = mysqli_query($connection,$updatequery);
        echo 1;
    }
    else if(isset($_POST['deletes'])){

        $remove = $_POST['remove'];


        $deletequery = "DELETE FROM `attendance` WHERE attendance_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;
    }
    else{
        $user = array();
        $search = $_POST['search'];
    
        $readquery = "SELECT * FROM `attendance` WHERE FirstName LIKE '%$search%' OR LastName LIKE '%$search%' "; 
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

}






?>