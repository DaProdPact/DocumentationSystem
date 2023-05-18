<?php

require('../php/database.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){

    
    $getquali = array();
    $start = $_GET['page'];
    $start =( $start * 10) - 10;
    
    $getqualiquery = "SELECT * FROM `trainer_qualification` LIMIT $start,10"; 
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
        $editquery = "SELECT * FROM `trainer_qualification` WHERE qualification_id = '$editid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        echo json_encode($editdetails);

        
    }
    else if(isset($_POST['update'])) {

        $updid = $_POST['upd'];
        $updname = $_POST['qualificationname'];
        $updcode = $_POST['qualificationcode'];

        $editdetails = array();
        
        $editquery = "UPDATE `trainer_qualification` SET `qualification_code`='$updcode',`qualification_title`='$updname' WHERE qualification_id = '$updid' ";
        $editsql = mysqli_query($connection,$editquery);
    
        while($row = mysqli_fetch_array($editsql)){
            $editdetails[] = $row;
        }
        // $_SESSION['adminqualification'] = $updid;
        echo json_encode($editdetails);



        
    }

    

    else if(isset($_POST['add'])) {



        $qualinc = $_POST['qualinc'];
        $addqualificationcode = $_POST['addqualificationcode'];
        $qualification_registered = $_POST['qualification_registered'];

        $detailsadd = array();
        
        $addquery = "INSERT INTO `trainer_qualification`(`qualification_code`, `qualification_title`) VALUES ('$addqualificationcode','$qualinc')";
        $addsql = mysqli_query($connection,$addquery);


        $addselect = "SELECT * FROM `trainer_qualification` WHERE qualification_title = '$qualinc'";
        $addsql = mysqli_query($connection,$addselect);

        while($qualirow = mysqli_fetch_array($addsql)){
            $_SESSION['qual_id'] = $qualirow['qualification_id'];
            $_SESSION['qual_names'] = $qualirow['qualification_title'];

        }
        $qualid = $_SESSION['qual_id'];
        $qualname = $_SESSION['qual_names'];
        $insertquery = "INSERT INTO `baisc_competencies`(`bc_qualification`, `bc_nc`) VALUES ('$qualid','$qualification_registered')";
        $insertsql = mysqli_query($connection,$insertquery);

        $trbquery = "INSERT INTO `trb`(`trb_qname`, `trb_qualification`) VALUES ('$qualname','$qualid')";
        $trbsql = mysqli_query($connection,$trbquery); 

        $iaquery = "INSERT INTO `institutionalassessment`(`ia_qname`, `ia_quali`) VALUES ('$qualname','$qualid')";
        $iasql = mysqli_query($connection,$iaquery);


        $borsquery = "INSERT INTO `borrower_slip`(`bs_qname`, `bs_qualification`) VALUES ('$qualname','$qualid')";
        $borssql = mysqli_query($connection,$borsquery); 

        $hkquery = "INSERT INTO `house_keeping`(`hk_qname`,`hk_qualification`) VALUES ('$qualname','$qualid')";
        $hksql = mysqli_query($connection,$hkquery); 

        $afonequery = "INSERT INTO `add_features_one`(`afone_qname`,`afone_qualification`) VALUES ('$qualname','$qualid')";
        $afonesql = mysqli_query($connection,$afonequery); 

        $aftwoquery = "INSERT INTO `add_features_two`(`aftwo_qname`,`aftwo_qualification`) VALUES ('$qualname','$qualid')";
        $aftwosql = mysqli_query($connection,$aftwoquery); 

        $afthreequery = "INSERT INTO `add_features_three`(`afthree_qname`,`afthree_qualification`) VALUES ('$qualname','$qualid')";
        $afthreesql = mysqli_query($connection,$afthreequery); 

        $affourquery = "INSERT INTO `add_features_four`(`affour_qname`,`affour_qualification`) VALUES ('$qualname','$qualid')";
        $affoursql = mysqli_query($connection,$affourquery); 

        $affivequery = "INSERT INTO `add_features_five`(`affive_qname`,`affive_qualification`) VALUES ('$qualname','$qualid')";
        $affivesql = mysqli_query($connection,$affivequery); 

        $afsixquery = "INSERT INTO `add_features_six`(`afsix_qname`,`afsix_qualification`) VALUES ('$qualname','$qualid')";
        $afsixsql = mysqli_query($connection,$afsixquery); 

        $afsevenquery = "INSERT INTO `add_features_seven`(`afseven_qname`,`afseven_qualification`) VALUES ('$qualname','$qualid')";
        $afsevensql = mysqli_query($connection,$afsevenquery); 

        $afeightquery = "INSERT INTO `add_features_eight`(`afeight_qname`,`afeight_qualification`) VALUES ('$qualname','$qualid')";
        $afeightsql = mysqli_query($connection,$afeightquery); 

        $afninequery = "INSERT INTO `add_features_nine`(`afnine_qname`,`afnine_qualification`) VALUES ('$qualname','$qualid')";
        $afninesql = mysqli_query($connection,$afninequery); 

        $aftenquery = "INSERT INTO `add_features_ten`(`aften_qname`,`aften_qualification`) VALUES ('$qualname','$qualid')";
        $aftensql = mysqli_query($connection,$aftenquery); 

        echo 1;

        
    }
    else if(isset($_POST['deletes'])) {

        $remove = $_POST['remove'];


        $deletequery = "DELETE FROM `trainer_qualification` WHERE qualification_id = '$remove' ";
        $deletesql = mysqli_query($connection,$deletequery);

        echo 1;

        
    }

    else if(isset($_POST['view_com'])) {
        session_start();
        $views = $_POST['views'];
        $_SESSION['quali_competencies'] = $views;
        echo $views;
    }
    else{
        $user = array();
        $search = $_POST['search'];
    
        $readquery = "SELECT * FROM `trainer_qualification` WHERE qualification_code LIKE '%$search%' OR qualification_title LIKE '%$search%' "; 
        $readsql = mysqli_query($connection,$readquery);
    
        if(mysqli_num_rows($readsql) > 0){
            while($row = mysqli_fetch_assoc($readsql)){
                $user[] = $row;
            }
            echo json_encode($user);
        }
        else{
            echo 2;
        }
    }
}






?>
