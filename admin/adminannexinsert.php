<?php

require('../php/database.php');




if(isset($_POST['uploadfilesub'])){
  $selected = $_POST['annexname'];
  $filename = $_FILES['uploadfile']['name'];
  $filetmpname = $_FILES['uploadfile']['tmp_name'];
  $folder = '../pdf/';
  move_uploaded_file($filetmpname,$folder.$filename);


$query = "UPDATE `annex` SET `annex_fname`='$filename',`annex_fname`='$filename' WHERE annex_id='1'";
$sql = mysqli_query($connection,$query);

echo '<script type="text/javascript">';
echo 'window.location.href="admindeclarationform.php";';
echo '</script>';


}


?>
