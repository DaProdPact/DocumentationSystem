<?php

require('../php/database.php');




if(isset($_POST['uploadfilesub'])){
  $selected = $_POST['qualification_added'];
  $filename = $_FILES['uploadfile']['name'];
  $filetmpname = $_FILES['uploadfile']['tmp_name'];
  $folder = '../pdf/';
  move_uploaded_file($filetmpname,$folder.$filename);


$query = "UPDATE `trb` SET `trb_name`='$filename' WHERE trb_qualification='$selected'";
$sql = mysqli_query($connection,$query);

echo '<script type="text/javascript">';
echo 'window.location.href="adminrecordbook.php";';
echo '</script>';


}


?>
