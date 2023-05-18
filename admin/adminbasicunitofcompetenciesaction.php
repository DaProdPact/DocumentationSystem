<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(isset($_GET['get_unit'])) {
    $getquali = array();
    $start = $_GET['page'];
    $start =( $start * 10) - 10;
    $basic = $_GET['basic'];
 
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id WHERE lmar_unit_comp = '$basic' LIMIT $start,10"; 
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
    $basic = $_GET['basic'];
    $stmt = "SELECT COUNT(lmar_unit_id) as total FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basic' ";
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
        $editquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id WHERE lmar_unit_id = '$editid' ";
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
        $unit_count = $_POST['unit_count'];
        $unit_code = $_POST['unit_code'];

        
        $editdetails = array();

        $editquery = "UPDATE `lmar_unit_competencies` SET `lmar_unit_name`='$details',`lmar_unit_code`='$unit_code',`lmar_unit_count`='$unit_count',`lmar_unit_comp`='$comps',`lmar_unit_qualification`='$qualification_register' WHERE lmar_unit_id = '$updid' ";
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
        $unit_count = $_POST['unit_count'];
        $unit_code = $_POST['unit_code'];

        $detailsadd = array();

        
        $addquery = "INSERT INTO `lmar_unit_competencies`(`lmar_unit_id`, `lmar_unit_name`, `lmar_unit_code`, `lmar_unit_count`, `lmar_unit_comp`, `lmar_unit_qualification`) VALUES ('','$details','$unit_code','$unit_count','$compname','$qualiname')";
        $addsql = mysqli_query($connection,$addquery);
        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];
        $deletequery = "DELETE FROM `lmar_unit_competencies` WHERE lmar_unit_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);


        echo 1;

        
    }

    else if(isset($_POST['getview'])) {

        $view = $_POST['view'];
        session_start();
        $_SESSION['view'] = $view;
        echo 1;

        
    }
}






?>
