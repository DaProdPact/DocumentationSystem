<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $getquali = array();
    $start = $_GET['page'];
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `rtccl` LIMIT $start,10"; 
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
else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit'])) {
        $editid = $_POST['editid'];
        $editdetails = array();
        $editquery = "SELECT * FROM `rtccl` WHERE rtccl_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $details = $_POST['details'];



        $editdetails = array();

        $editquery = "UPDATE `rtccl` SET `rtccl_name`='$details' WHERE rtccl_id = '$updid' ";
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
