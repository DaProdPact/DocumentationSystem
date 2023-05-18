<?php

require('../php/database.php');
if($_SERVER['REQUEST_METHOD'] == 'GET'){

  $getquali = array();

  
  $getqualiquery = "SELECT * FROM `add_features` WHERE add_features_show = '1'"; 
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
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['deletes'])) {

    $remove = $_POST['remove'];
    $editquery = "UPDATE `add_features` SET `add_features_show`='0' WHERE add_features_id = '$remove' ";
    $editsql = mysqli_query($connection,$editquery);
 
}
else if(isset($_POST['edit'])){

    $editid = $_POST['editid'];
    $editdetails = array();
    $editquery = "SELECT * FROM `add_features` WHERE add_features_id = '$editid' ";
    $editsql = mysqli_query($connection,$editquery);

    while($row = mysqli_fetch_array($editsql)){
        $editdetails[] = $row;
    }
    echo json_encode($editdetails);

    

}
else if(isset($_POST['update'])){

  $upd = $_POST['upd'];
  $addname = $_POST['addname'];   
  $editquery = "UPDATE `add_features` SET `add_features_name`='$addname' WHERE add_features_id = '$upd'";
  $editsql = mysqli_query($connection,$editquery);

  echo 1;

  

}

else{
  $featureid = $_POST['featureid'];
  $featurename = $_POST['featurename'];
  
  $editquery = "UPDATE `add_features` SET `add_features_name`='$featurename',`add_features_show`='1' WHERE add_features_id = '$featureid' ";
  $editsql = mysqli_query($connection,$editquery);

  // $_SESSION['adminqualification'] = $updid;
  echo 1;
}
}