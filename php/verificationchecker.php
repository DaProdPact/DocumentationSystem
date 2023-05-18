<?php

require('./database.php');
session_start();
$session_id = $_SESSION['id'];

if(isset($_POST['get'])){

$qualification_nttcno = $_POST['get'];

$trainer_select_query = "SELECT * FROM `trainer_list_qualification` WHERE trainer_qualification_list = '$session_id' AND verification = '1' ";
$trainer_select_sql = mysqli_query($connection,$trainer_select_query);


  
if($trainer_select_sql->num_rows > 0){
    echo 1;
}
else{

    echo 2;
}





}
else{

 echo 3;
}


?>