<?php

require('../php/database.php');



if(isset($_POST['view'])) {
    $viewid = $_POST['viewid'];
    $viewdetails = array();
    $viewquery = "SELECT * FROM `trainer_list_qualification` 
    LEFT JOIN trainer_account ON trainer_list_qualification.trainer_qualification_list = trainer_account.trainer_id
    LEFT JOIN  trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id WHERE tl_id = '$viewid' ";
    $viewsql = mysqli_query($connection,$viewquery);

    while($row = mysqli_fetch_array($viewsql)){
        $viewdetails[] = $row;
    }
    echo json_encode($viewdetails);
}


else if(isset($_POST['gets'])) {
    $getid = $_POST['getd'];
    $qualid = $_POST['qualid'];
    $trid = $_POST['trid'];


    $getquery = "UPDATE `trainer_list_qualification` SET `verification`='1' WHERE tl_id = '$getid' ";
    $getsql = mysqli_query($connection,$getquery);

    $requestquery = "UPDATE `sent_request` SET `request_approve`='1' WHERE request_trainer_id = '$trid' AND request_trainer_qualification = '$qualid'";
    $requestsql = mysqli_query($connection,$requestquery);

    echo 1;

}






?>

