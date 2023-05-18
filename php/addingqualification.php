<?php

require('./database.php');

    session_start();
    $session_id = $_SESSION['id'];

 


     if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $qualification_added = $_POST['qualification_added'];
        $nttcno = $_POST['nttcno'];
        $validity = $_POST['validity'];
        $requestname = $_POST['requestname'];
        $requestprofile = $_POST['requestprofile'];
        $requestid = $_POST['requestid'];
        
        $valid=date_create($validity);
        $valid_date = date_format($valid,"m/d/Y");


        $query = "INSERT INTO `trainer_list_qualification`(`tl_id`, `trainer_qualification_list`, `selected_qualification`, `trainer_list_nttcno`,`validity_date`,`verification`) VALUES (' ','$session_id','$qualification_added','$nttcno','$valid_date','0')";          
        $sql = mysqli_query($connection,$query);

        $requestquery = "INSERT INTO `sent_request`(`request_trainer_id`,`request_trainer_qualification`,`request_name`, `request_profile`, `request_approve`) VALUES ('$requestid','$qualification_register','$requestname','$requestprofile','0')";
        $requestsql = mysqli_query($connection,$requestquery);
    
        echo 1;
    
        }
    

    






?>
