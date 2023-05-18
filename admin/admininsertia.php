<?php

require('../php/database.php');




if(isset($_POST['uploadfilesub'])){
  $selected = $_POST['qualification_added'];
  $filename = $_FILES['uploadfile']['name'];
  $filetmpname = $_FILES['uploadfile']['tmp_name'];
  $folder = '../pdf/';
  move_uploaded_file($filetmpname,$folder.$filename);


$query = "UPDATE `institutionalassessment` SET `ia_fname`='$filename' WHERE ia_quali='$selected'";
$sql = mysqli_query($connection,$query);

echo '<script type="text/javascript">';
echo 'window.location.href="admininstitutionalassessment.php";';
echo '</script>';


}


?>
