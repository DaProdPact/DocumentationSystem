<?php

require('../php/database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){
  session_start();

$user = array();
$start = $_GET['page'];
$start =( $start * 10) - 10;

$readquery = "SELECT * FROM `add_features_six` LIMIT $start,10"; 
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
else{
if(isset($_POST['uploadfilesub'])){
  $selected = $_POST['qualification_added'];
  $filename = $_FILES['uploadfile']['name'];
  $filetmpname = $_FILES['uploadfile']['tmp_name'];
  $folder = '../pdf/';
  move_uploaded_file($filetmpname,$folder.$filename);


$query = "UPDATE `add_features_six` SET `afsix_fname`='$filename' WHERE afsix_qualification='$selected'";
$sql = mysqli_query($connection,$query);

echo '<script type="text/javascript">';
echo 'window.location.href="features6.php"';
echo '</script>';


}
}

?>

