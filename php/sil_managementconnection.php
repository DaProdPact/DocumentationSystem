
<?php

require('./database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['connection'])){
        session_start();
        $session_id = $_SESSION['id'];
        $qualification = $_SESSION['choosecourse'];
        $batch = $_SESSION['batch'];
    // date_default_timezone_set('Asia/Manila');
    // $today = date('Y/m/d h:i'); 
    $user = array();
    $start = $_GET['page'];
    $start =( $start * 10) - 10;
    
    $readquery = "SELECT * FROM `sil` LEFT JOIN trainer_qualification ON sil.sil_qualification = trainer_qualification.qualification_id WHERE sil_qualification = '$qualification' LIMIT $start,10"; 
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
    else if(isset($_GET['count'])){
    $stmt = " SELECT COUNT(sil_id) as total FROM `sil` WHERE sil_qualification = '$qualification' ";
    $result = mysqli_query($connection, $stmt);
    
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo $row["total"];
    
    
    }
    }



}
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['updates'])){
        $sil_edit = $_POST['sil_edit'];
        $traineesId = $_POST['traineesId'];
        
        $readquery = "UPDATE `attendance` SET `sil_certificate_id`='$sil_edit'  WHERE attendance_id = '$traineesId' "; 
        $readsql = mysqli_query($connection,$readquery);

        echo 1;
        
    }
    else if(isset($_POST['uploadfilesub'])){
        $name = $_POST['shopname'];
        $quali = $_POST['quali'];
        $shopaddress = $_POST['shopaddress'];
        $trainerenterprise = $_POST['trainerenterprise'];
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        $folder = 'imageshop/';
        move_uploaded_file($filetmpname,$folder.$filename);
      
      
      $query = "INSERT INTO `sil` (`sil_id`, `shop_name`, `shop_image`, `shop_address`, `name_of_enterprise`, `sil_qualification`) VALUES ('','$name','$filename','$shopaddress','$trainerenterprise','$quali')";
      $sql = mysqli_query($connection,$query);
      
      echo '<script type="text/javascript">';
      echo 'window.location.href="manage_sil.php";';
      echo '</script>';
      
      
      }
      
      else{
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