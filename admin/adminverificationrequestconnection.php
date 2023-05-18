<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
 
  

// date_default_timezone_set('Asia/Manila');
// $today = date('Y/m/d h:i'); 
$request = array();
$start = $_GET['page'];
$start =( $start * 10) - 10;

$readquery = "SELECT * FROM `trainer_list_qualification` LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id LEFT JOIN trainer_account ON trainer_list_qualification.trainer_qualification_list = trainer_account.trainer_id WHERE verification = '0' LIMIT $start,10"; 
$readsql = mysqli_query($connection,$readquery);

if(mysqli_num_rows($readsql) > 0){
    while($row = mysqli_fetch_assoc($readsql)){
        $request[] = $row;
    }
    echo json_encode($request);
}
else{
    echo 2;
}


}






?>