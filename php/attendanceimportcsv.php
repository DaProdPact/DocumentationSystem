<?php

require('./database.php');
session_start();
$session_id = $_SESSION['id'];
$qualification = $_SESSION['choosecourse'];
$batch = $_SESSION['batch'];

if(isset($_POST['import'])){
  $filename = $_FILES["file"]["tmp_name"];

  if($_FILES["file"]["size"] > 0){
    $file = fopen($filename, "r");

    while(($column = fgetcsv($file, 10000,",")) !== FALSE){


      if($column[1] != 'Province' && $column[1] != ''){
          // $sqlInsert = "INSERT INTO `attendance`( `Region`, `Province`, `Congressional_District`, `Municipality_City`, `Name_of_Provider`, `Complete_Address_of_Provider_Training_Venue`, `Type_of_Provider`, `Classification_of_Provider`, `Industry_Sector_of_Qualification`, `TVET_Program_Registration_Status`, `Qualification_Program_Title`,`cluster`,`CoPR_Number`, `Training_Calendar_Code`, `Delivery_Mode`, `LastName`, `FirstName`, `MiddleName`, `Extension_Name`, `Contact_Number`, `Email_Address`, `Street_No.`, `Barangay`, `Municipality`, `District`, `Permanent_Province`, `Sex`, `Date_of_Birth`, `Age`, `Civil_Status`, `Higher_Educational_Attaintment`, `Nationality`, `Classification_of_Clients`, `Training_Status`, `Type_of_Scholarships`, `Vouchers_Number`, `Date_Started`, `Date_Finished`, `Training_Result`, `Date_Assessed`, `Assessment_Results`, `Employment_Status_Before_Training`, `Date_Employed`, `Occupation`, `Name_of_Employer`, `Complete_Address_of_Employer`, `Classification_of_Worker`,`import_trainer_id` ,`import_qualification_id`,`import_batch`,`sil_certificate_id`) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."' ,'".$column[4]."' ,'".$column[5]."' ,'".$column[6]."' ,'".$column[7]."' ,'".$column[8]."' ,'".$column[9]."','".$column[10]."','".$column[11]."','".$column[12]."' ,'".$column[13]."','".$column[14]."','".$column[15]."' ,'".$column[16]."' ,'".$column[17]."' ,'".$column[18]."' ,'".$column[19]."' ,'".$column[20]."' ,'".$column[21]."' ,'".$column[22]."' ,'".$column[23]."' ,'".$column[24]."' ,'".$column[25]."' ,'".$column[26]."' ,'".$column[27]."' ,'".$column[28]."' ,'".$column[29]."' ,'".$column[30]."' ,'".$column[31]."' ,'".$column[32]."' ,'".$column[33]."' ,'".$column[34]."' ,'".$column[35]."' ,'".$column[36]."' ,'".$column[37]."' ,'".$column[38]."' ,'".$column[39]."' ,'".$column[40]."' ,'".$column[41]."' ,'".$column[42]."' ,'".$column[43]."' ,'".$column[44]."' ,'".$column[45]."' ,'".$column[46]."' ,'$session_id' , '$qualification', '$batch','0')";
          $sqlInsert = "INSERT INTO `attendance`(`Region`,`Province`,`Municipality_City`,`Congressional_District`, `Name_of_Provider`, `Complete_Address_of_Provider_Training_Venue`, `Type_of_Provider`, `Classification_of_Provider`, `Industry_Sector_of_Qualification`, `TVET_Program_Registration_Status`, `Qualification_Program_Title`,`cluster`,`CoPR_Number`, `Training_Calendar_Code`,`Delivery_Mode`,`LastName`, `FirstName`, `MiddleName`, `Extension_Name`,`ULI`,`Contact_Number`, `Email_Address`, `Street_No`, `Barangay`, `Municipality`, `District`, `Permanent_Province`, `Sex`, `Date_of_Birth`, `Age`, `Civil_Status`, `Higher_Educational_Attaintment`, `Nationality`, `Classification_of_Clients`, `Training_Status`, `Type_of_Scholarships`, `Vouchers_Number`, `Date_Started`, `Date_Finished`, `Date_Assessed`, `Assessment_Results`, `Employment_Status_Before_Training`, `Date_Employed`, `Occupation`, `Name_of_Employer`,`Complete_Address_of_Employer`,`Classification_of_Worker`,`Monthly_Income`,`import_trainer_id`,`import_qualification_id`,`import_batch`,`sil_certificate_id`) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','".$column[4]."' ,'".$column[5]."' ,'".$column[6]."' ,'".$column[7]."' ,'".$column[8]."' ,'".$column[9]."','".$column[10]."','".$column[11]."','".$column[12]."','".$column[13]."','".$column[14]."', '".$column[15]."', '".$column[16]."', '".$column[17]."', '".$column[18]."','".$column[19]."' ,'".$column[20]."' ,'".$column[21]."' ,'".$column[22]."' ,'".$column[23]."' ,'".$column[24]."' ,'".$column[25]."' ,'".$column[26]."' ,'".$column[27]."' ,'".$column[28]."' ,'".$column[29]."' ,'".$column[30]."','".$column[31]."' ,'".$column[32]."' ,'".$column[33]."' ,'".$column[34]."' ,'".$column[35]."' ,'".$column[36]."' ,'".$column[37]."' ,'".$column[38]."' ,'".$column[39]."' ,'".$column[40]."' ,'".$column[41]."' ,'".$column[42]."' ,'".$column[43]."' ,'".$column[44]."' ,'".$column[45]."','".$column[46]."','".$column[47]."','$session_id' , '$qualification', '$batch','0')";

          $result = mysqli_query($connection,$sqlInsert);

          

      }
      else{

      }

     

      // $sqlInsert = "INSERT INTO `attendance`(`Region`, `Province`, `Congressional_District`) VALUES (''".$column[0]."','".$column[1]."','".$column[2]."' ')";
      // $sqlInsert = "INSERT INTO `attendance`(Region, Province,Congressional_District,Municipality_City,Name_of_Provider,Complete_Address_of_Provider_Training_Venue,Type_of_Provider,Classification_of_Provider,Industry_Sector_of_Qualification,Qualification_Program_Title) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."' )";

    

    }


    $datequery = "SELECT * FROM attendance WHERE import_batch = '$batch' LIMIT 1";
    $datesql = mysqli_query($connection,$datequery);

    while($drow = mysqli_fetch_array($datesql)){ 


      $dates = $drow['Date_Started'];
      $date_end = $drow['Date_Finished'];
      $scholar = $drow['Type_of_Scholarships'];



      $updatequery = "UPDATE `batch_list` SET `date_start` = '$dates' , `date_end` = '$date_end', `scholarship_program`= '$scholar' WHERE batch_id = '$batch' ";
      $updatesql = mysqli_query($connection,$updatequery);

    }





    
    $selectquery = "SELECT * FROM attendance WHERE import_batch = '$batch' ";
    $selectsql = mysqli_query($connection,$selectquery);

    

  
    while($row = mysqli_fetch_array($selectsql)){ 

      $id = $row['attendance_id'];

      // if($qualification == '9'){

        $insertbasic = "INSERT INTO `lmar_basic`(`lmar_basic_attendance_id`) VALUES ('$id')";
        $insertbasicsql = mysqli_query($connection,$insertbasic);

        $insertbasicex  = "INSERT INTO `lmar_basic_extend`(`lmar_basic_ex_attendance_id`) VALUES ('$id')";
        $insertbasicexsql = mysqli_query($connection,$insertbasicex);

        $insert = "INSERT INTO `lmar_common`(`lmar_common_attendance_id`) VALUES ('$id')";
        $insertsql = mysqli_query($connection,$insert);

        $insertcomex  = "INSERT INTO `lmar_common_extend`(`lmar_common_ex_attendance_id`) VALUES ('$id')";
        $insercomextsql = mysqli_query($connection,$insertcomex);

        $insert = "INSERT INTO `lmar_core`(`lmar_core_attendance_id`) VALUES ('$id')";
        $insertsql = mysqli_query($connection,$insert);

        $insertcorex  = "INSERT INTO `lmar_core_extend`(`lmar_core_ex_attendance_id`) VALUES ('$id')";
        $insercorextsql = mysqli_query($connection,$insertcorex);
   
        
       

             echo '<script type="text/javascript">';
             echo 'window.location.href="trainees.php";';
             echo '</script>';
      // }

      
      // else if($qualification == '12'){

      //   $insertbasic = "INSERT INTO `lmar_basic_ncii`(`lmar_basic_ncii_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);

      //   $insert = "INSERT INTO `lmar_gtawncii`(`lmar_gtawncii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //        echo '<script type="text/javascript">';
      //        echo 'window.location.href="trainees.php";';
      //        echo '</script>';
      // }

      // else if($qualification == '10'){

      //   $insert = "INSERT INTO `lmar_basic_nciii`(`lmar_basicnciii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);

        
      //   $insert = "INSERT INTO `lmar_eimnciii`(`lmar_eimnciii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //        echo '<script type="text/javascript">';
      //        echo 'window.location.href="trainees.php";';
      //        echo '</script>';
      // }

      // else if($qualification == '14'){
      //   $insertbasic = "INSERT INTO `lmar_basic_ncii`(`lmar_basic_ncii_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_oapncii`(`lmar_oapncii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }

      // else if($qualification == '1'){
      //   $insertbasic = "INSERT INTO `lmar_basic_nci`(`lmar_basic_nci_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_atsnci`(`lmar_atsnci_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }

      // else if($qualification == '7'){
      //   $insertbasic = "INSERT INTO `lmar_basic_ncii`(`lmar_basic_ncii_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_drmncii`(`lmar_drmncii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }
      // else if($qualification == '17'){
      //   $insertbasic = "INSERT INTO `lmar_basic_ncii`(`lmar_basic_ncii_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_racncii`(`lmar_racncii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }
      // else if($qualification == '19'){
      //   $insertbasic = "INSERT INTO `lmar_basic_ncii`(`lmar_basic_ncii_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_smawncii`(`lmar_smawncii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }

      // else if($qualification == '18'){
      //   $insertbasic = "INSERT INTO `lmar_basic_nci`(`lmar_basic_nci_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_smawnci`(`lmar_smawnci_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }
      // else if($qualification == '2'){
      //   $insertbasic = "INSERT INTO `lmar_basic_ncii`(`lmar_basic_ncii_attendance_id`) VALUES ('$id')";
      //   $insertbasicsql = mysqli_query($connection,$insertbasic);
        

      //   $insert = "INSERT INTO `lmar_atserncii`(`lmar_atserncii_attendance_id`) VALUES ('$id')";
      //   $insertsql = mysqli_query($connection,$insert);
   

      //   echo '<script type="text/javascript">';
      //   echo 'window.location.href="trainees.php";';
      //   echo '</script>';
      // }

      // else{
      //   echo 0;
      // }

  
        

    }
  }
}
?>  