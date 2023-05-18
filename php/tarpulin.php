<?php 
require('./database.php');

session_start();
if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href="http://localhost/DocumentationSystem/index.php";';
  echo '</script>';
}
  
$session_id = $_SESSION['id'];
$session_batch =  $_SESSION['batch'];

$sessionqualification = $_SESSION['choosecourse'];
date_default_timezone_set('Asia/Manila');   
$date1ss = new DateTime("now");
$day = date('j');
$month = date('F');
$year = date('Y');


$qualiquery = "SELECT * FROM trainer_qualification WHERE qualification_id = '$sessionqualification' ";
$qualisql = mysqli_query($connection,$qualiquery);  
while($qrow = mysqli_fetch_array($qualisql)){
  $_SESSION['qualiname'] = $qrow['qualification_title'];
}




// $declarationcount = 25;


require('../link/header.html');
?>

<link rel="stylesheet" href="../css/tipattendance.css">

    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
 

    <style>


      ::-webkit-scrollbar {
    display: none;
    }
    
    @page { 
        /* size: A4 landscape; */
      
     }
     
    
    
    
 

    /* img:hover{
  
      border:#000 5px solid;
    } */
    /* @media print {
        body *:not(#printdeclaration):not(#printdeclaration *) {
          visibility: hidden;
        }
        #printdeclaration{
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
        }
      }
       */
       
    @media print {
      
  


        body *:not(#printcertemncii_basic):not(#printcertemncii_basic *) {
          display:none;
        }
  
        #printcertemncii_basic{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height: 100vh;
        }
  
        /* #printcertemnciicore2, #printcertemnciicore2 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertemnciicore3, #printcertemnciicore3 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertemnciiicore1, #printcertemnciiicore1 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertemnciiicore2, #printcertemnciiicore2 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertemnciiicore3, #printcertemnciiicore3 * {
          display: inline-block;
          padding: 1rem;
        } */

        
        

    
        


      } 

      /* @media print {
        body *:not(#printdeclaration):not(#printdeclaration *) :not(#printsalaysay):not(#printsalaysay *) {
          visibility: hidden;
        }
        #printdeclaration{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height:100vh;
        }
        #printsalaysay{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height:100vh;

        } 

       } */

    tr{
        height: 10px;
    }



    </style>



    </head>
<body>


<div class="row" id="printcertemncii_basic">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/header.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:8%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:20%; font-size:8px;">BASIC COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="22" style="width:20%; font-size:8px;">COMMON COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="17" style="width:20%; font-size:8px;">CORE COMPONENTS</th>

                    
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="4" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VI</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VII</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VIII</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IX</th>

                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>

                    <th class="p-0 text-center" colspan="7" style="width:5%;">I</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
  



                    





                    </tr>

                      <tr class="border-dark text-center" style="height: 11px; font-size:8px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>  
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>

                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">4</th>

                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>  
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">4</th>  

                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold">C</th>

                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">5</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">6</th>
                      <th class="p-0 fw-bold">C</th>

                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">4</th>  
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">3</th>  
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0; width:9px;">4</th>  
                      <th class="p-0 fw-bold">C</th>
                 
                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimncii ON  attendance.attendance_id = lmar_eimncii.lmar_eimncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_eimncii_basic1_1'] == '/' && $row['lmar_eimncii_basic1_2'] == '/' && $row['lmar_eimncii_basic1_3'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_eimncii_basic2_1'] == '/' && $row['lmar_eimncii_basic2_2'] == '/' && $row['lmar_eimncii_basic2_3'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_eimncii_basic3_1'] == '/' && $row['lmar_eimncii_basic3_2'] == '/' && $row['lmar_eimncii_basic3_3'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_eimncii_basic4_1'] == '/' && $row['lmar_eimncii_basic4_2'] == '/' && $row['lmar_eimncii_basic4_3'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_eimncii_basic5_1'] == '/' && $row['lmar_eimncii_basic5_2'] == '/' && $row['lmar_eimncii_basic5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }
              if($row['lmar_eimncii_basic6_1'] == '/' && $row['lmar_eimncii_basic6_2'] == '/' && $row['lmar_eimncii_basic6_3'] == '/' ){
                $rowc6 = '/';
              }
              else{
                $rowc6 = '';
              }
              if($row['lmar_eimncii_basic7_1'] == '/' && $row['lmar_eimncii_basic7_2'] == '/' && $row['lmar_eimncii_basic7_3'] == '/' ){
                $rowc7 = '/';
              }
              else{
                $rowc7 = '';
              }
              if($row['lmar_eimncii_basic8_1'] == '/' && $row['lmar_eimncii_basic8_2'] == '/' && $row['lmar_eimncii_basic8_3'] == '/' ){
                $rowc8 = '/';
              }
              else{
                $rowc8 = '';
              }
              if($row['lmar_eimncii_basic9_1'] == '/' && $row['lmar_eimncii_basic9_2'] == '/' && $row['lmar_eimncii_basic9_3'] == '/' ){
                $rowc9 = '/';
              }
              else{
                $rowc9 = '';
              }
                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic1_3'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic3_3'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic6_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic6_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic6_3'].'</td>';  
                echo '<td class="p-0">'.$rowc6.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic7_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic7_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic7_3'].'</td>';
                echo '<td class="p-0">'.$rowc7.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic8_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic8_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic8_3'].'</td>';
                echo '<td class="p-0">'.$rowc8.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic9_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic9_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_basic9_3'].'</td>';  
                echo '<td class="p-0">'.$rowc9.'</td>'; 
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_4'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_3'].'</td>';  
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_4'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_4'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_5'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_6'].'</td>';


                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_3'].'</td>';

                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_3'].'</td>';  
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_4'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';



                echo '</tr>';
                
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>

  </div>

  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">I. PARTICIPATE IN WORKPLACE COMMUNICATION</p>
    <p class="m-0" style="font-size:7px;">1. Obtain and convey workplace communication</p>
    <p class="m-0" style="font-size:7px;">2. Participate in workplace meetings and discussions</p>
    <p class="m-0" style="font-size:7px;">3. Complete relevant work related documensts</p>

    </div>

  </div>
  <div class="" style="width: 18%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">II WORK IN TEAM ENVIRONMENT</p>
    <p class="m-0" style="font-size:7px;">1. Describe team role and scope</p>
    <p class="m-0" style="font-size:7px;">2. Identify own role and responsibility within team</p>
    <p class="m-0" style="font-size:7px;">3. Work as a team member</p>

    </div>

  </div>
  <div class="" style="width: 22%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. SOLVE/ADDRESS GENERAL WORKPLACE PROBLEMS</p>
    <p class="m-0" style="font-size:7px;">1. Identify routine problems</p>
    <p class="m-0" style="font-size:7px;">2. Look for solutions to routine problems</p>
    <p class="m-0" style="font-size:7px;">3. Recommend solutions to problems</p>

    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IV. DEVELOP CAREER AND LIFE DECISIONS</p>
    <p class="m-0" style="font-size:7px;">1. Manage one's emotion</p>
    <p class="m-0" style="font-size:7px;">2. Develop reflective practice</p>
    <p class="m-0" style="font-size:7px;">3. Boost self-confidence and develop self-regulation</p>

    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">V. CONTRIBUTE TO WORKPLACE INNOVATION</p>
    <p class="m-0" style="font-size:7px;">1. Identify oppurtunities to od things better</p>
    <p class="m-0" style="font-size:7px;">2. Discuss and develop ideas with others</p>
    <p class="m-0" style="font-size:7px;">3. Integrate ideas for change in the workplace</p>

    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">VI. PRESENT RELEVANT INFORMATION</p>
    <p class="m-0" style="font-size:7px;">1. Gather data/infromation</p>
    <p class="m-0" style="font-size:7px;">2. Assess gathered data/information</p>
    <p class="m-0" style="font-size:7px;">3. Record and present information</p>

    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">VII. PRACTICE OCCUPATIONAL SAFETY AND
HEALTH POLICIES AND PROCEDURES
</p>
    <p class="m-0" style="font-size:7px;">1. Identify OSH compliance requirements</p>
    <p class="m-0" style="font-size:7px;">2. Prepare OSH requirements for compliance</p>
    <p class="m-0" style="font-size:7px;">3. Perform task in accordance with relevant OSH
policies and procedures</p>

    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">VIII. EXERCISE EFFICIENT AND
EFFECTIVE SUSTAINABLE PRACTICE</p>
    <p class="m-0" style="font-size:7px;">1. Identify the efficiency and effectiveness of resource
utilization</p>
    <p class="m-0" style="font-size:7px;">2. Determine causes of inefficiency and/or
ineffectiveness of resource utilization</p>
    <p class="m-0" style="font-size:7px;">3. Convey inefficient and ineffective environmental practice
</p>

    </div>

  </div>
  <div class="" style="width: 23%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IX PRACTICE ENTREPRENEURIAL
SKILLS IN THE WORKPLACE</p>
    <p class="m-0" style="font-size:7px;">1. Apply entrepreneurial workplace best practices</p>
    <p class="m-0" style="font-size:7px;">2. Communicate entrepreneurial workplace best practices</p>
    <p class="m-0" style="font-size:7px;">
3. Implement cost-effective operations</p>

    </div>

  </div>
  
  </div>



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/footer.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>


<!-- COMMON -->



<div class="row" id="printcertemncii_common">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/header.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">COMMON COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>
         

                    </tr>

                      <tr class="border-dark text-center" style="height: 11px; font-size:8px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>

                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>  
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>  

                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                 
                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimncii ON  attendance.attendance_id = lmar_eimncii.lmar_eimncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_eimncii_common1_1'] == '/' && $row['lmar_eimncii_common1_2'] == '/' && $row['lmar_eimncii_common1_3'] == '/' && $row['lmar_eimncii_common1_4'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_eimncii_common2_1'] == '/' && $row['lmar_eimncii_common2_2'] == '/' && $row['lmar_eimncii_common2_3'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_eimncii_common3_1'] == '/' && $row['lmar_eimncii_common3_2'] == '/' && $row['lmar_eimncii_common3_3'] == '/'  && $row['lmar_eimncii_common3_4'] == '/'){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_eimncii_common4_1'] == '/' && $row['lmar_eimncii_common4_2'] == '/' && $row['lmar_eimncii_common4_3'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_eimncii_common5_1'] == '/' && $row['lmar_eimncii_common5_2'] == '/' && $row['lmar_eimncii_common5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common1_4'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_3'].'</td>';  
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common3_4'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_common5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';
                echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>

  </div>

  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">I. USE HAND TOOLS</p>
    <p class="m-0" style="font-size:7px;">1. Plan and prepare for tasks to be undertaken</p>
    <p class="m-0" style="font-size:7px;">2. Prepare hand tools</p>
    <p class="m-0" style="font-size:7px;">3. Use appropriate hand tools and test equipment</p>
    <p class="m-0" style="font-size:7px;">4. Maintain hand tools.</p>


    </div>

  </div>
  <div class="" style="width: 18%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">PERFORM MENSURATION AND CALCULATION</p>
    <p class="m-0" style="font-size:7px;">1. Select measuring instruments</p>
    <p class="m-0" style="font-size:7px;">2. Carry out measurements and calculation</p>
    <p class="m-0" style="font-size:7px;">3. Maintain measuring instruments</p>

    </div>

  </div>
  <div class="" style="width: 22%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. PREPARE AND INTERPRET TECHNICAL
DRAWING</p>
    <p class="m-0" style="font-size:7px;">1. Identify different kinds of technical drawings</p>
    <p class="m-0" style="font-size:7px;">2. Interpret technical drawing</p>
    <p class="m-0" style="font-size:7px;">3. Prepare/make changes to electrical/electronic
schematics and drawings</p>
<p class="m-0" style="font-size:7px;">4. Store technical drawings and equipment/
instruments</p>


    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IV APPLY QUALITY STANDARDS</p>
    <p class="m-0" style="font-size:7px;">1. Asses quality of received materials or components</p>
    <p class="m-0" style="font-size:7px;">2. Asses own work</p>
    <p class="m-0" style="font-size:7px;">3. Engage in quality improvement</p>

    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">V. TERMITANTE AND CONNECT ELECTRICAL
WIRING AND ELECTRONICS CIRCUIT</p>
    <p class="m-0" style="font-size:7px;">1. Plan and prepare for termination/connection of electrical wiring/electronics circuit</p>
    <p class="m-0" style="font-size:7px;">2. Terminate/connect electrical wiring/electronic circuits</p>
    <p class="m-0" style="font-size:7px;">3. Test termination/connections of elcectrical
wiring/electronic circuits</p>

    </div>

  </div>
  
  </div>



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/footer.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>



<!-- core -->


<div class="row" id="printcertemncii_core">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/header.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">CORE COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="7" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
  
         

                    </tr>

                      <tr class="border-dark text-center" style="height: 11px; font-size:8px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">6</th>
                      <th class="p-0 fw-bold">C</th>

                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>  
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>  
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>  
                      <th class="p-0 fw-bold">C</th>

                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimncii ON  attendance.attendance_id = lmar_eimncii.lmar_eimncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_eimncii_core1_1'] == '/' && $row['lmar_eimncii_core1_2'] == '/' && $row['lmar_eimncii_core1_3'] == '/' && $row['lmar_eimncii_core1_4'] == '/' && $row['lmar_eimncii_core1_5'] == '/' && $row['lmar_eimncii_core1_6'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_eimncii_core2_1'] == '/' && $row['lmar_eimncii_core2_2'] == '/' && $row['lmar_eimncii_core2_3'] == '/' && $row['lmar_eimncii_core2_4'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_eimncii_core3_1'] == '/' && $row['lmar_eimncii_core3_2'] == '/' && $row['lmar_eimncii_core3_3'] == '/'  && $row['lmar_eimncii_core3_4'] == '/'){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
     

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_4'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_5'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core1_6'].'</td>';


                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core2_3'].'</td>';

                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_3'].'</td>';  
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimncii_core3_4'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';

                echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>

  </div>

  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">I. PERFORM ROUGHING-IN ACTIVITIES, WIRING AND
CABLING WORKS FOR SINGLE-PHASE DISTRIBUTION,
POWER, LIGHTING AND AUXILIARY SYSTEMS</p>
    <p class="m-0" style="font-size:7px;">1. Install electrical metallic /nonmetallic (PVC conduit)</p>
    <p class="m-0" style="font-size:7px;">2. Install wire
ways and
cable tray</p>
    <p class="m-0" style="font-size:7px;">3. Install
auxiliary
terminal
cabinet and
distribution
panel</p>
    <p class="m-0" style="font-size:7px;">4. Prepare for
cable pulling
and
installation.</p>
<p class="m-0" style="font-size:7px;">5. Perform wiring
and cabling
lay out</p>

<p class="m-0" style="font-size:7px;">6. Notify
completion of
work</p>



    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">INSTALL ELECTRICAL PROTECTIVE DEVICES FOR
DISTRIBUTION, POWER, LIGHTING, AUXILIARY,
LIGHTNING PROTECTION AND GROUNDING SYSTEMS</p>
    <p class="m-0" style="font-size:7px;">1. Plan and
prepare work</p>
    <p class="m-0" style="font-size:7px;">2. Install
electrical
protective
devices</p>
    <p class="m-0" style="font-size:7px;">3. Install
lighting
fixture and
auxiliary
outlet.</p>

<p class="m-0" style="font-size:7px;">4.Notify
completion of
work.</p>

    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. INSTALL WIRING DEVICES OF FLOOR AND WALL
MOUNTED OUTLETS, LIGHTING FIXTURE/SWITCHES
AND AUXILLIARY OUTLETS</p>
    <p class="m-0" style="font-size:7px;">1. Select
wiring
devices</p>
    <p class="m-0" style="font-size:7px;">2. Install wiring
devices </p>
    <p class="m-0" style="font-size:7px;">3. Install
lighting
fixture/
switches</p>
<p class="m-0" style="font-size:7px;">4. Notify
completion
of work</p>


    </div>

  </div>


  
  </div>



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/footer.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>

 </div>   

  <div class="row" style="height:100vh;">
    <div class="col-2 pe-0">
    <!-- <?php 
    require('../link/navbar.php');
  ?> -->
</div>
 

<div class="col-10 bg-secondary bg-opacity-50">
      <div class="row">
                          <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #251d77ad;">
        <!-- Container wrapper -->
        <div class="container">
          <!-- Toggle button -->
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>

          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse d-flex align-text-center" id="navbarSupportedContent">
            <!-- Navbar brand -->

            
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
              <img
                src="../img/tesdalogo.png"
                class="p-0"
                height="45"
                loading="lazy"
                style="background-color: #fff; border-radius:50%;"

              />
            </a>

            <p class="myf-custome6-font mt-3 text-white" style="font-size:20px;"><span  class="text-white">R</span>egional <span  class="text-white">T</span>raining <span  class="text-white">C</span>enter <span  class="text-white">C</span>entral <span  class="text-white">L</span>uzon</p>

            <!-- Left links -->

          </div>
          <!-- Collapsible wrapper -->

          <!-- Right elements -->
          <div class="d-flex align-items-center">
            <!-- Icon -->
          

            <!-- Notifications -->

            <!-- Avatar -->
            <div class="dropdown d-flex">
              <?php 
                  $session_query = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
                  $session_sql = mysqli_query($connection,$session_query);   
                  while($row = mysqli_fetch_array($session_sql)){

                    $session_name = $row['trainer_firstname'] ." ". $row['trainer_middlename'] ." ". $row['trainer_lastname'] ." ". $row['trainer_extensionname'] ;

                    echo '<p class="me-4 mt-3 text-white myf-custome6-font">'.$session_name.'</p>';
                
                  }
              ?>

              


              <a
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="../img/default_profile.png"
                  class="rounded-circle"
                  height="30"
                  loading="lazy"
                  style="background-color: #fff;"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
                <li>
                  <a class="dropdown-item" href="#">My profile</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Settings</a>
                </li>
                <li>
                  <a class="dropdown-item" id="dropdown_logout" href="#">Logout</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->
      </div>
      <div class="row me-1">
 
        <div class="table container mt-3 mb-0">
        

          <table
            id="myTable"
            class="table border-dark table-bordered p-0 table-responsive align-middle bg-transparent table-striped table-hover rounded"
          >
            <caption
              class="caption-top border border-2 border-bottom-0 rounded-top bg-light opacity-100 py-2 ps-2"
            >
            <div class="navbar navbar-primary shadow-0 py-0">
              <div class="container-fluid">
                <p
                  class="myf-custome6-font text-primary h4 pt-1"
                  
                  >Basic competencies</p
                >
                <div class="d-flex w-auto gap-3">
                  
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="print_basic"><i class="fas fa-print"></i> &nbsp&nbsp Print</button>

                 
                </div>
              </div>
            </div>

        
            </caption>

            <caption
              class="caption-top border border-2 border-bottom-0 ps-2"
            >
              <div class="navbar navbar-light shadow-0 py-0">
                <div class="container-fluid">
                  <div class="d-flex"style="height:5vh;">
                    <p
                    class="text-dark opacity-50 me-2"
                    >Show</p
                  >
                
                   <input type="number" name="" id="" value="10" class="mb-3" style="width:20%; padding-top: -10px;">
                    <p
                    class="myf-custome6-font ms-1 text-dark opacity-50 ms-2"
                    >entries</p
                  >
                  </div>
                  <form class="d-flex input-group w-auto" method="post">
                    <div class="input-group">
                      <div class="form-outline">
                        <input id="search-input" type="search" id="form1" name="searching" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                      </div>
                      <button id="search-button" type="button" name="searchenter" class="btn btn-primary" id="search1">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </caption>

            <thead class="" style="background-color: #334a8bd0;">
              <tr>
                <th rowspan="2"  colspan="3" class="text-white" style="font-size: 13px; width:80px;">Trainees</th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Participate in workplace communication</th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Work in team environment </th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Solve/address general workplace problems</th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Develop career and life decisions </th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Contribute to workplace innovation </th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Present relevant information </th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Practice occupational safety and health policies and procedures </th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Exercise efficient and effective sustainable practices in the workplace </th>
                <th  colspan="3" class="text-white p-0" style="font-size: 11px; width:50px">Practice entrepreneurial skills in the workplace</th>

       
                

             
              </tr>
              <tr>
              
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">1</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">2</th>
                <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:40px;">3</th>
      
              </tr>
            </thead>
            <tbody id="table_body" class="bg-white">
  
            

            </tbody>


         
          </table>


    </div>
    <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item page-list">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous </a>
                    </li>
                    
                    <li class="page-item page-list">
                        <a class="page-link" href="#" id="prevPage" tabindex="1" aria-disabled="true"> < </a>
                    </li>


                    <li class="page-item page-list">
                        <a class="page-link" href="#" id="nextPage" tabindex="1" aria-disabled="true"> > </a>
                    </li>

                    <li class="page-item page-list">
                        <a class="page-link" href="#" id="next">Next</a>
                    </li>
                </ul>
            </nav> 
    </div>

    </div>













          </div>
        </div>





        </div>

      </div>

    </div>

    
  <form class="form-horizontal" action="certificationimportcsv.php"  action="" method="post" name="upload" enctype="multipart/form-data">
  <div class="modal fade" id="csvselection" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                

                <div class="ms-2">
                  <label>Choose CSV file</label>
                  <input type="file" name="file"accept=".csv">
                </div>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" name="import" class="btn btn-primary">Import</button>
        </div>
      </div>
    </div>
  </div>

  </form>


    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content" id="update_detail">


            
    </div>
    </div>

</div>

<div
          class="modal fade"
          id="logoutModal"
          tabindex="-1"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary bg-opacity-75">
                
                <h5 class="modal-title text-white" id="exampleModalLabel">
                  Logout
                </h5>
                <button
                  type="button"
                  class="btn-close"
                  data-mdb-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-2 offset-1">
                  <i class="fas fa-sign-out-alt text-primary" style="font-size: 50px;"></i>
                  </div>
                  <div class="col-8">
                    <p>Are you sure want to logout?</p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-mdb-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary" id="logouts">
                  Logout
                </button>
              </div>
            </div>
          </div>
        </div>

        
      <div class="mb-2 position-absolute position-fixed end-0 bottom-0 me-1">
        <div class="toast success">
          <div class="toast-header bg-primary bg-opacity-75">
          <strong class="me-auto text-primary text-primary-75"><i class="fas fa-key"></i>Update Details</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body bg-primary bg-opacity-50">
          <p class="text-white">Update Successfully</p>
        </div>
      </div>
    </div>



    <div class="modal fade" id="successdeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="background-color: #7cb1f2;">
            <div class="row">

              <p class="text-white myf-custom4-font h4" style="font-size:20px;"> Update Successfully</p>

          </div>


      </div>

    </div>
  </div>
</div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <!-- <script src="../javascript/basic_eimncii_progresschart.js"></script> -->
    <script>
    
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>