<?php
session_start();
$count = $_POST['declaration_count'];
$_SESSION['decount'] = $count;


echo $count;
?>