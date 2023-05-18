<?php 

require ('./database.php');
session_start();


if(isset($_POST['colvalue'])){

    $colvalue = $_POST['colvalue'];
    $_SESSION['col'] = $colvalue;

    echo 1;
    
    
    }
    else{
    
    echo 0;

    }








?>