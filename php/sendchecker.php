<?php

require('./database.php');
session_start();
$session_id = $_SESSION['id'];

if(isset($_POST['qualification_register']) || isset($_POST['nttcno'])){

$qualification_register = $_POST['qualification_register'];
$qualification_nttcno = $_POST['nttcno'];
$qualification_validity = $_POST['vdate'];
$requestname = $_POST['requestname'];
$requestprofile = $_POST['requestprofile'];
$requestid = $_POST['requestid'];


$valid=date_create($qualification_validity);
$valid_date = date_format($valid,"m/d/Y");



$trainer_select_query = "INSERT INTO `trainer_list_qualification`(`tl_id`, `trainer_qualification_list`, `selected_qualification`, `trainer_list_nttcno`,`validity_date`,`verification`) VALUES ('','$session_id','$qualification_register','$qualification_nttcno','$valid_date','0')";
$trainer_select_sql = mysqli_query($connection,$trainer_select_query);

$requestquery = "INSERT INTO `sent_request`(`request_trainer_id`,`request_trainer_qualification`,`request_name`, `request_profile`, `request_approve`) VALUES ('$requestid','$qualification_register','$requestname','$requestprofile','0')";
$requestsql = mysqli_query($connection,$requestquery);

    echo 1;

    

}
else{

    echo 0;
}


?>