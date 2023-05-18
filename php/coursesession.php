<?php 

require ('./database.php');
session_start();


if(isset($_POST['course'])){

    $course = $_POST['course'];
    $_SESSION['choosecourse'] = $course;

    echo 1;

    $qualquery = "SELECT * FROM `trainer_qualification` WHERE qualification_id = '$course' ";
    $qualsql = mysqli_query($connection,$qualquery);

    while($row = mysqli_fetch_array($qualsql)){
        $_SESSION['tqualiname'] = $row['qualification_title'];
        $_SESSION['tqualicode'] = $row['qualification_code'];

    }
    
    
    }
    else{
    
    echo 0;

    }








?>