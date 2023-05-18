<?php
require('./database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    session_start();

    if(isset($_POST['passwords'])){
        
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $retypepassword = $_POST['retypepassword'];
    $trainerspassword = $_POST['trainerspassword'];
    $passwordchange = trim(md5($currentpassword));
    $newpass = trim(md5($newpassword));
    $correctpassquery = "SELECT * FROM trainer_account WHERE trainer_id = '$trainerspassword' ";
    $correctsql = mysqli_query($connection,$correctpassquery);
    while($row = mysqli_fetch_array($correctsql)){
        $_SESSION['pass'] = $row['trainer_password'];
    }

   
    if($passwordchange == $_SESSION['pass']){

        $changequery = "UPDATE `trainer_account` SET `trainer_password`='$newpass' WHERE trainer_id = '$trainerspassword' "; 
        $changesql = mysqli_query($connection,$changequery);
        echo 1;
    }
    else{
        echo 0;
    }

    }


    else if(isset($_POST['uploadfilesub'])){
        $trainer_id = $_POST['trainer_id'];
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        $folder = 'profilepicture/';
        move_uploaded_file($filetmpname,$folder.$filename);
      
      
      $query = "UPDATE `trainer_account` SET trainer_profile = '$filename' WHERE trainer_id = '$trainer_id' ";
      $sql = mysqli_query($connection,$query);
      
      echo '<script type="text/javascript">';
      echo 'window.location.href="trainersprofile.php";';
      echo '</script>';
      
      
      }


    else{

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $sfxname = $_POST['sfxname'];
    $cnumber = $_POST['cnumber'];
    $email = $_POST['email'];
    $trainersid = $_POST['trainersid'];



$readquery = "UPDATE `trainer_account` SET `trainer_firstname`='$fname',`trainer_middlename`='$mname',`trainer_lastname`='$lname',`trainer_extensionname`='$sfxname',`trainer_email_address`='$email',`trainer_contact_number`='$cnumber' WHERE trainer_id = '39' "; 
$readsql = mysqli_query($connection,$readquery);

echo 1;
}

}
?>