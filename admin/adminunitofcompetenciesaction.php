<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $global;

    if(isset($_GET['gettrainer'])) {
    $getquali = array();
    $start = $_GET['page'];
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id LIMIT $start,10"; 
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


else if(isset($_GET['filter1'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 1;

    $global = $wow;

    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter2'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 2;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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

else if(isset($_GET['filter7'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 7;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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


else if(isset($_GET['filter9'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 9;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter10'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 10;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter12'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 12;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter14'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 14;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter17'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 17;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter18'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 18;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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
else if(isset($_GET['filter19'])) {
    $getquali = array();
    $start = $_GET['page'];
    $wow = 19;


    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies  ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id  WHERE lmar_unit_qualification = '$wow'"; 
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


else if(isset($_GET['getfilter'])) {
    $stmt = " SELECT COUNT(lmar_unit_id) as total FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '1'";
    $result = mysqli_query($connection, $stmt);
   
    if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       echo $row["total"];
    }
}



else{
    $stmt = " SELECT COUNT(lmar_unit_id) as total FROM `lmar_unit_competencies`";
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
}






?>
