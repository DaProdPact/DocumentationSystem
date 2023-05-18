<?php 

require ('./database.php');
session_start();


if(isset($_POST['batch'])){

    $batch = $_POST['batch'];
    $_SESSION['batch'] = $batch;

    echo 1;
    
    
    }
    else{
    
    echo 0;

    }








?>