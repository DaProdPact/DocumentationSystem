<?php

require('./database.php');

if(isset($_POST['direction']) || isset($_POST['inputnewpass'])){

$email = $_POST['direction'];
$newpass = trim(md5($_POST['inputnewpass']));


$changequery = "UPDATE `trainer_account` SET `trainer_password`='$newpass' WHERE trainer_email_address = '$email' ";
$changesql = mysqli_query($connection,$changequery);
echo 1;




}

// $connection->close();
?>