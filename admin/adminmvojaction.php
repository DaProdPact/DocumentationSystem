<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $global;

    if(isset($_GET['gettrainer'])) {
    $getquali = array();
    $start = $_GET['page'];
    $qualiunit = $_GET['qualiunit'];
    $mvogunit = $_GET['mvogunit'];


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '$mvogunit' AND mvog_qualifiation = '$qualiunit' LIMIT $start,10"; 
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
    $qualiunit = $_GET['qualiunit'];
    $mvogunit = $_GET['mvogunit'];
    $stmt = " SELECT COUNT(mvog_id) as total FROM `missionvisionobjectivesgoal` WHERE mvog_type = '$mvogunit' AND mvog_qualifiation = '$qualiunit'";
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
        $editquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $details = $_POST['details'];

 
        $editquery = "UPDATE `missionvisionobjectivesgoal` SET mvog_name='$details' WHERE mvog_id = '$updid' ";
        $editsql = mysqli_query($connection,$editquery);
    

        echo 1;

        
    }

    else if(isset($_POST['add'])) {

        $mvogunit = $_POST['mvogunit'];
        $qualiunit = $_POST['qualiunit'];
        $details = $_POST['details'];

        $detailsadd = array();        
        $addquery = "INSERT INTO `missionvisionobjectivesgoal`( `mvog_name`, `mvog_type`, `mvog_qualifiation`) VALUES ('$details','$mvogunit','$qualiunit')";
        $addsql = mysqli_query($connection,$addquery);
        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];
        $deletequery = "DELETE FROM `missionvisionobjectivesgoal` WHERE mvog_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;

        
    }
}






?>
