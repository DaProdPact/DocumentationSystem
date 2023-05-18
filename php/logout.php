<?php


require('./database.php');
session_start();

unset($_SESSION['id']); 

$_SESSION['status'] = 'invalid';
echo 1;
?>