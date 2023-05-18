<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['gettrainer'])) {
    $getquali = array();
    $start = $_GET['page'];
    $trainers = $_GET['trainers'];  
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `trainer_list_qualification` LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id WHERE trainer_qualification_list = '$trainers' LIMIT $start,10"; 
    $getsqualisql = mysqli_query($connection,$getqualiquery);
    
    if(mysqli_num_rows($getsqualisql) > 0){
        while($row = mysqli_fetch_assoc($getsqualisql)){
            $getquali[] = $row;
        }
        echo json_encode($getquali);
    }
    else{
        echo 2;
    }
}
else{
    $stmt = " SELECT COUNT(tl_id) as total FROM `trainer_list_qualification`";
    $result = mysqli_query($connection, $stmt);
   
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       echo $row["total"];
    }
}

    
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit'])) {

        $editid = $_POST['editid'];
        $editdetails = array();
        $editquery = "SELECT * FROM `trainer_list_qualification` LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id  LEFT JOIN trainer_account ON trainer_list_qualification.trainer_qualification_list = trainer_account.trainer_id WHERE tl_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
            $rowsvdate = $row['validity_date'];
            $rowsvdate = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $nttcno = $_POST['nttcno'];
        $validity = $_POST['validity'];
        $verify = $_POST['verify'];

        
        $editdetails = array();

        
        
        $editquery = "UPDATE `trainer_list_qualification` SET `trainer_list_nttcno`='$nttcno',`validity_date`='$validity',`verification`='$verify' WHERE tl_id = '$updid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){

            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }

    else if(isset($_POST['add'])) {



        $addqualificationname = $_POST['addqualificationname'];
        $addqualificationcode = $_POST['addqualificationcode'];


        $detailsadd = array();
        
        $addquery = "INSERT INTO `trainer_qualification`(`qualification_id`, `qualification_code`, `qualification_title`) VALUES ('','$addqualificationname','$addqualificationcode')";
        $addsql = mysqli_query($connection,$addquery);
    

        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];
        $deletequery = "DELETE FROM `trainer_list_qualification` WHERE tl_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;

        
    }
    else if(isset($_POST['view_com'])) {
        session_start();
        $views = $_POST['views'];
        $_SESSION['trainers_qualification_id'] = $views;
        echo $views;
    }
}






?>
