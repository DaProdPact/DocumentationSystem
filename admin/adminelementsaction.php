<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $global;

    if(isset($_GET['gettrainer'])) {
    $getquali = array();
    $start = $_GET['page'];
    $elementview = $_GET['elementview'];
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_element` LEFT JOIN lmar_unit_competencies  ON lmar_element.lmar_element_unit = lmar_unit_competencies.lmar_unit_id  LEFT JOIN lmar_competencies  ON lmar_element.lmar_element_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_element.lmar_element_quali = trainer_qualification.qualification_id WHERE lmar_element_unit = '$elementview' LIMIT $start,10"; 
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
    $elementview = $_GET['elementview'];
    $stmt = " SELECT COUNT(lmar_element_id) as total FROM `lmar_element` WHERE lmar_element_unit = '$elementview'";
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
        $editquery = "SELECT * FROM `lmar_element` LEFT JOIN lmar_unit_competencies  ON lmar_element.lmar_element_unit = lmar_unit_competencies.lmar_unit_id  LEFT JOIN lmar_competencies  ON lmar_element.lmar_element_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_element.lmar_element_quali = trainer_qualification.qualification_id WHERE lmar_element_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $qualiname = $_POST['qualiname'];
        $elename = $_POST['elename'];
        $element_count = $_POST['element_count'];
        $element_hours = $_POST['element_hours'];
        $details = $_POST['details'];
        $compename = $_POST['compename'];



        $editdetails = array();

        $editquery = "UPDATE `lmar_element` SET `lmar_element_name`='$details',`lmar_element_hours`='$element_hours',`lmar_element_percount`='$element_count',`lmar_element_unit`='$elename',`lmar_element_comp`='$compename',`lmar_element_quali`='$qualiname' WHERE lmar_element_id = '$updid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }

    else if(isset($_POST['add'])) {

        $qualiname = $_POST['qualiname'];
        $elename = $_POST['elename'];
        $element_count = $_POST['element_count'];
        $element_hours = $_POST['element_hours'];
        $details = $_POST['details'];
        $compename = $_POST['compename'];



        $detailsadd = array();

        
        $addquery = "INSERT INTO `lmar_element`(`lmar_element_id`, `lmar_element_name`, `lmar_element_hours`, `lmar_element_percount`, `lmar_element_unit`, `lmar_element_comp`, `lmar_element_quali`) VALUES ('[value-1]','$details','$element_hours','$element_count','$elename','$compename','$qualiname')";
        $addsql = mysqli_query($connection,$addquery);
        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];
        $deletequery = "DELETE FROM `lmar_element` WHERE lmar_element_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);


        echo 1;

        
    }
}






?>
