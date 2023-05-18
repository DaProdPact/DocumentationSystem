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


      if($column[0] != 'TVET Providers Profile' && $column[0] != 'Region' && $column[0] != 'a' && $column[0] != ''){
          $sqlInsert = "INSERT INTO `attendance`(`Region`, `Province`, `Congressional_District`, `Municipality_City`, `Name_of_Provider`, `Complete_Address_of_Provider_Training_Venue`, `Type_of_Provider`, `Classification_of_Provider`, `Industry_Sector_of_Qualification`, `Qualification_Program_Title`, `CoPR_Number`, `Training_Calendar_Code`, `Delivery_Mode`, `LastName`, `FirstName`, `MiddleName`, `Extension_Name`, `Contact_Number`, `Email_Address`, `Street_No.`, `Barangay`, `Municipality`, `District`, `Permanent_Province`, `Sex`, `Date_of_Birth`, `Age`, `Civil_Status`, `Higher_Educational_Attaintment`, `Nationality`, `Classification_of_Clients`, `Training_Status`, `Type_of_Scholarships`, `Vouchers_Number`, `Date_Started`, `Date_Finished`, `Training_Result`, `Date_Assessed`, `Assessment_Results`, `Employment_Status_Before_Training`, `Date_Employed`, `Occupation`, `Name_of_Employer`, `Complete_Address_of_Employer`, `Classification_of_Worker`, `Monthly_Income`, `QM_Qualification_Code`, `Reasons_for_Drop_out`, `Remarks`, `ULI_No.`, `Name_of_Trainer`, `Specialization`, `NTTC_TMC_Number`,`import_trainer_id` ,`import_qualification_id`,`import_batch`) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."' ,'".$column[4]."' ,'".$column[5]."' ,'".$column[6]."' ,'".$column[7]."' ,'".$column[8]."' ,'".$column[9]."' ,'".$column[10]."' , '".$column[12]."' ,'".$column[13]."' ,'".$column[14]."' ,'".$column[15]."' ,'".$column[16]."' ,'".$column[17]."' ,'".$column[18]."' ,'".$column[19]."' ,'".$column[20]."' ,'".$column[21]."' ,'".$column[22]."' ,'".$column[23]."' ,'".$column[24]."' ,'".$column[25]."' ,'".$column[26]."' ,'".$column[27]."' ,'".$column[28]."' ,'".$column[29]."' ,'".$column[30]."' ,'".$column[31]."' ,'".$column[32]."' ,'".$column[33]."' ,'".$column[34]."' ,'".$column[35]."' ,'".$column[36]."' ,'".$column[37]."' ,'".$column[38]."' ,'".$column[39]."' ,'".$column[40]."' ,'".$column[41]."' ,'".$column[42]."' ,'".$column[43]."' ,'".$column[44]."' ,'".$column[45]."' ,'".$column[46]."' ,'".$column[47]."' ,'".$column[48]."' ,'".$column[49]."' ,'".$column[50]."' ,'".$column[51]."' ,'".$column[52]."' ,'".$column[53]."' , '$session_id' , '$qualification', '$batch'  )";
      
          $result = mysqli_query($connection,$sqlInsert);


          echo 'window.location.href="";'; 
          echo '<script type="text/javascript">';
          echo 'window.location.href="attendance.php";';
          echo '</script>';
        
  
      }
      else{

      }

     

      // $sqlInsert = "INSERT INTO `attendance`(`Region`, `Province`, `Congressional_District`) VALUES (''".$column[0]."','".$column[1]."','".$column[2]."' ')";
      // $sqlInsert = "INSERT INTO `attendance`(Region, Province,Congressional_District,Municipality_City,Name_of_Provider,Complete_Address_of_Provider_Training_Venue,Type_of_Provider,Classification_of_Provider,Industry_Sector_of_Qualification,Qualification_Program_Title) VALUES ('".$column[0]."','".$column[1]."','".$column[2]."' )";

    

    }
  }
}
?>  