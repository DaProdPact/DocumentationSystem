
<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();

$user = array();
$start = $_GET['page'];
$start =( $start * 10) - 10;

$readquery = "SELECT * FROM `annex` LIMIT $start,10"; 
$readsql = mysqli_query($connection,$readquery);

if(mysqli_num_rows($readsql) > 0){
    while($row = mysqli_fetch_assoc($readsql)){
        $user[] = $row;
    }
    echo json_encode($user);
}
else{
    echo 2;
}


}






?>