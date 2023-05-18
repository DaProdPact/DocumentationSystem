<?php
require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if(isset($_POST['passwords'])){
        
    $currentpassword = $_POST['currentpassword'];
    $newpassword = $_POST['newpassword'];
    $retypepassword = $_POST['retypepassword'];

    $passwordchange = trim(md5($currentpassword));
    $newpass = trim(md5($newpassword));
    $correctpassquery = "SELECT * FROM admin_account WHERE admin_id = 1 ";
    $correctsql = mysqli_query($connection,$correctpassquery);
    while($row = mysqli_fetch_array($correctsql)){
        $_SESSION['adminpass'] = $row['admin_password'];
    }

   
    if($passwordchange == $_SESSION['adminpass']){

        $changequery = "UPDATE `admin_account` SET `admin_password`='$newpass' WHERE admin_id = 1 "; 
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
    $email = $_POST['email'];



$readquery = "UPDATE `admin_account` SET `admin_name`='$fname',`admin_email`='$email' WHERE admin_id = '1' "; 
$readsql = mysqli_query($connection,$readquery);

echo 1;
}

}
?>