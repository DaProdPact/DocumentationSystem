<?php

require('./database.php');



if(isset($_POST['uploadfilesub'])){
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
echo 'window.location.href="sil_certification.php";';
echo '</script>';


}


?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <img src="imageshop/images5.jpg" alt="" width="50px">

  <form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="uploadfile" />
    <input type="shopname" name="shopname" />

    <input type="submit" name="uploadfilesub" value="upload">
    
  </form>
</body>
</html> -->