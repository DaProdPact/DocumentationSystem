<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['gettrainer'])) {
    $getquali = array();
    $start = $_GET['page'];
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `certification` LEFT JOIN comp ON certification.certification_competencies = comp.comp_id LEFT JOIN trainer_qualification ON certification.certification_qualification = trainer_qualification.qualification_id LIMIT $start,10"; 
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
    $stmt = " SELECT COUNT(certification_id) as total FROM `certification`";
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
        $editquery = "SELECT * FROM `certification` LEFT JOIN comp ON certification.certification_competencies = comp.comp_id LEFT JOIN trainer_qualification ON certification.certification_qualification = trainer_qualification.qualification_id WHERE certification_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $qualification_register = $_POST['qualification_register'];
        $details = $_POST['details'];
        $comps = $_POST['comps'];
        
        $editdetails = array();

        $editquery = "UPDATE `certification` SET `certification_details`='$details',`certification_competencies`='$comps',`certification_qualification`='$qualification_register' WHERE certification_id = '$updid'";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }

    else if(isset($_POST['add'])) {


        $qualiname = $_POST['qualiname'];
        $compname = $_POST['compname'];
        $details = $_POST['details'];



        $detailsadd = array();

        
        
        $addquery = "INSERT INTO `certification`(`certification_id`, `certification_details`, `certification_competencies`, `certification_qualification`) VALUES ('','$details','$compname','$qualiname')";
        $addsql = mysqli_query($connection,$addquery);
    

        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];
        $deletequery = "DELETE FROM `certification` WHERE certification_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;

        
    }
}






?>
