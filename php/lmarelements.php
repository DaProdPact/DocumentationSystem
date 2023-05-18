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
$sessionelement_id = $_SESSION['elementid'];
$sessionelement_competencies = $_SESSION['competencies_name'];
$sessionelement_unit = $_SESSION['lmar_unit_name'];






$namequery = "SELECT * FROM `trainer_account` WHERE trainer_id = '$session_id' ";
$namesql = mysqli_query($connection,$namequery);  
while($nrow = mysqli_fetch_array($namesql)){
 
    $_SESSION['session_name'] = $nrow['trainer_firstname']." ".$nrow['trainer_middlename'][0].". ".$nrow['trainer_lastname']." ".$nrow['trainer_extensionname'];

}



date_default_timezone_set('Asia/Manila'); 
  
$date1ss = new DateTime("now");
$day = date('j');
$month = date('F');
$year = date('Y');

$date = date('F '.$day.'-j ,Y', strtotime('+1 day'));



$session_col = $_SESSION['col'];

// $col1 = '1';
// $col2 = '0';
// $col3 = '0';
// $col4 = '0';
// $col5 = '1';
// $col6 = '1';









$qualiquery = "SELECT * FROM trainer_qualification WHERE qualification_id = '$sessionqualification' ";
$qualisql = mysqli_query($connection,$qualiquery);  
while($qrow = mysqli_fetch_array($qualisql)){
  $_SESSION['qualiname'] = $qrow['qualification_title'];
  $_SESSION['qualicode'] = $qrow['qualification_code'];

}




// $declarationcount = 25;


require('../link/header.html');
?>

<link rel="stylesheet" href="../css/tipattendance.css">

    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
 

    <style>

    #LO1{
        background-color:#ffcfcf;
    }
    #LO2{
        background-color:#cfffe0; 
    }
    #LO3{
        background-color:#ecfd9e;
    }
    #LO4{
        background-color:#e3ffcf;
    }
    #LO5{
        background-color:#fcffcf;
    }
    #LO6{
        background-color:#fea9ff;
    }
    #LO7{
        background-color:#d4a9ff;
    }
    #LO8{
        background-color:#a9ffd5;
    }



      ::-webkit-scrollbar {
    display: none;
    }
    
    @page { 
        size: A4 landscape;
      
     }
     

     #navbar{
      position: absolute;
      top: 0;
      width: 100%;


      
    }


       
    @media print {
        body * {
          visibility: hidden;

        }
        #printlmar, #printlmar * {
          visibility: visible;



        }
        #lmarprintbtn, #lmarprintbtn * {
          visibility: hidden;



        }
        



      } 

    #btns{
      position: absolute;

      top: 0;
      right: 20px;
      margin-top: 2rem;
      width: 30rem;

      
    }

    tr{
        height: 9px;
    }





    </style>



    </head>
<body>


<div class="row" class="" id="printlmar" height="100vh">
<div class="row mt-2">
<div class="col-10"> </div>
<div class="col-2 text-end text-muted">
    <p class="fw-bold" style="font-size:13px;">Annex-T</p>
    <p style="margin-top:-20px; font-size:13px;">Rev. 00 s. 2023</p>
</div>
</div>
<div class="row" style="margin-top:-22px;">
    <p class="text-center fw-bold">LEARNER'S ACHIEVMENT MONITORING REPORT</p>
</div>
<div class="row" style="padding:0rem 2.2rem; padding-left:2.8rem; margin-top:-15px;">
        
<table class="table border-dark table-bordered ms-1" id="table">
            <thead class="border-dark">
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Name of TVI: </th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">REGIONAL TRAINING CENTER CENTRAL LUZON-GUIGUINTO</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Program Title:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;"><?= $_SESSION['qualiname']?></th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Batch/Section:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">1</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Module Title:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;"><?=$sessionelement_unit?></th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Schedule:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;"></th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1 text-center fw-bold" rowspan="1" colspan="2" style="font-size:11px; width:5%;"><?=$sessionelement_competencies?></th>

            </tr>
                

            <table class="table border-dark table-bordered ms-1" style="margin-top: -16px;" id="table">
            <thead class="border-dark">
            <tr class="border-dark" style="height: 14px; font-size:10px; border-top:1px solid black;" >
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:10px; width:2%; background-color:#cfe7ff;">No.</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:10px; width:15%; background-color:#cfe7ff;">Name of Learners<br>(Last Name, First Name, Extension Name, Middle Name)</th>

                <!-- <?php 
                if($col1 == '1'){ ?>
               <th class="p-0 text-center" rowspan="1" colspan="3" style="width:10%; font-size:10px; background-color:#ffcfcf;">LO.1 Obtain and convey workplace information (1.hr.)</th>
                <?php }else{ }
                if($col2 == '1'){ ?>
                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:10%; font-size:10px; background-color:#cfffe0;">LO.1 Obtain and convey workplace information (1.hr.)</th>
                <?php }else{ }   
                if($col3 == '1'){ ?>
                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:10%; font-size:10px; background-color:#ecfd9e;">LO.1 Obtain and convey workplace information (1.hr.)</th> 
                <?php }else{ } 
                if($col4 == '1'){ ?>
                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:10%; font-size:10px; background-color:#df9efd;">LO.1 Obtain and convey workplace information (1.hr.)</th> 
                <?php }else{ } 
                if($col5 == '1'){ ?>
                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:10%; font-size:10px; background-color:#b3ff8c;">LO.1 Obtain and convey workplace information (1.hr.)</th> 
                <?php }else{ } 
                if($col6 == '1'){ ?>
                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:10%; font-size:10px; background-color:#fd9ed5;">LO.1 Obtain and convey workplace information (1.hr.)</th> 
                <?php }else{ } 
    
                ?> -->
                <?php 
                $cols = 1;
                $query = "SELECT * FROM `lmar_element` WHERE lmar_element_unit='$sessionelement_id' ";
                $sql = mysqli_query($connection,$query);


                while($qrow = mysqli_fetch_array($sql)){
                $_SESSION['percount'."".$cols] = $qrow['lmar_element_percount'];
                ?>

                <th class="p-0 text-center d-none" id="LO<?=$cols?>" rowspan="1" colspan="<?=$_SESSION['percounts'."".$cols];?>" style="width:10%; font-size:10px;"><?=$qrow['lmar_element_name']?></th>

                <?php $cols++; } 
               ?>

                
<!--            
                <th class="p-0 text-center LO<?=$cols;?>" rowspan="1" colspan="3" style="width:10%; font-size:10px;">LO.1 Obtain and convey workplace information (1.hr.)</th>
                <th class="p-0 text-center LO<?=$cols;?>" rowspan="1" colspan="3" style="width:10%; font-size:10px;">LO.1 Obtain and convey workplace information (1.hr.)</th> -->

                <th class="p-0 text-center" rowspan="2" colspan="1" style="width:10%; font-size:10px; background-color:#cfe7ff;">Institutional Assessment</th>

              </tr>

              <tr class="border-dark" style="height: 9px; font-size:9px">
   

                <!-- <?php 
                if($col1 == '1'){ ?>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>
                <?php }else{ }
                if($col2 == '1'){ ?>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>
                <?php }else{ }   
                if($col3 == '1'){ ?>
                  <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                  <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                  <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>

                <?php }else{ } 

                 if($col4 == '1'){ ?>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>
  
                  <?php }else{ } 

                if($col5 == '1'){ ?>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>

                <?php }else{ } 

                if($col6 == '1'){ ?>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>
    
                <?php }else{ } 

                ?>  -->

                

            <?php
            $act1 = 1;
            $act2 = 1;
            $act3 = 1;
            $act4 = 1;
            $act5 = 1;
            $act6 = 1;
            $act7 = 1;
            $act8 = 1;


            if(empty($_SESSION['percounts1'])){
                $_SESSION['percounts1'] = 0;
                }
                $acts1 = $_SESSION['percounts1'];

                if(empty($_SESSION['percounts2'])){
                    $_SESSION['percounts2'] = 0;
                  }
                $acts2 = $_SESSION['percounts2'];

                if(empty($_SESSION['percounts3'])){
                    $_SESSION['percounts3'] = 0;
                  }
                $acts3 = $_SESSION['percounts3'];
                                
                if(empty($_SESSION['percounts4'])){
                    $_SESSION['percounts4'] = 0;
                  }
                $acts4 = $_SESSION['percounts4'];

                if(empty($_SESSION['percounts5'])){
                    $_SESSION['percounts5'] = 0;
                  }
                $acts5 = $_SESSION['percounts5'];

                if(empty($_SESSION['percounts6'])){
                  $_SESSION['percounts6'] = 0;
                }
              $acts6 = $_SESSION['percounts6'];

                if(empty($_SESSION['percounts7'])){
                  $_SESSION['percounts7'] = 0;
                }
                $acts7 = $_SESSION['percounts7'];
                
                if(empty($_SESSION['percounts8'])){
                  $_SESSION['percounts8'] = 0;
                }
               $acts8 = $_SESSION['percounts8'];

                

                

                while($acts1 >= $act1){ ?>
                    
                    <th class="p-0 text-center LO1_<?=$act1?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act1 ?></th>
                    
                  <?php  
                  $act1++; 
                  }
                
                  while($acts2 >= $act2){ ?>
                    
                    <th class="p-0 text-center LO2_<?=$act2?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act2 ?></th>
                  <?php  
                  $act2++; 
                  }
                  
                while($acts3 >= $act3){ ?>
                    
                    <th class="p-0 text-center LO3_<?=$act3?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act3 ?></th>
                  <?php  
                  $act3++; 
                  }
                  
                while($acts4 >= $act4){ ?>
                    
                    <th class="p-0 text-center LO4_<?=$act4?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act4 ?></th>
                  <?php  
                  $act4++; 
                  }
                  
                while($acts5 >= $act5){ ?>
                    
                    <th class="p-0 text-center LO5_<?=$act5?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act5 ?></th>
                  <?php  
                  $act5++; 
                  }
                  while($acts6 >= $act6){ ?>
                    
                    <th class="p-0 text-center LO6_<?=$act6?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act6 ?></th>
                  <?php  
                  $act6++; 
                  }
                  while($acts7 >= $act7){ ?>
                    
                    <th class="p-0 text-center LO7_<?=$act7?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act7 ?></th>
                  <?php  
                  $act7++; 
                  }
                  while($acts8 >= $act8){ ?>
                    
                    <th class="p-0 text-center LO8_<?=$act8?> d-none" rowspan="1" colspan="1" style="font-size:9px;">Act <?= $act8 ?></th>
                  <?php  
                  $act8++; 
                  }


                ?>                    
              </tr>

            </thead>
            <tbody class="border-dark">

            <?php 
              $loops = 1;


              $printdetails_query = "SELECT * FROM attendance  WHERE import_trainer_id = '$session_id ' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC" ;
              $printdetails_sql = mysqli_query($connection,$printdetails_query);  

              while($traineesrow = mysqli_fetch_array($printdetails_sql)){
                // $middle =  substr($traineesrow['MiddleName'], 0, 1);
               $traineesfullname =  $traineesrow['LastName']." ".$traineesrow['Extension_Name'].", ".$traineesrow['FirstName']." ".$traineesrow['MiddleName'].".";?>
    
                <tr class="border-dark" style="height: 10px; font-size:9px">

                <td class="p-0 text-center" rowspan="1" style="font-size:9px;"><?=$loops;?></td>
                <td class="p-0 ps-2 fw-bold" rowspan="1" style="font-size:10px;"><?=$traineesfullname;?></td>

                 
                
                  <?php
      
                    $acttd1 = 1;
                    if(empty($_SESSION['percounts1'])){
                      $_SESSION['percounts1'] = 0;
                      }
                      $actstd1 = $_SESSION['percounts1'];
                      while($actstd1 >= $acttd1){ ?>
                      <td class="p-0 text-center LO1_<?=$acttd1?> d-none LO1_<?=$acttd1?>LOE<?=$acttd1?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                      <?php  
                      $acttd1++; 
                      }



                    $acttd2 = 1;
                    if(empty($_SESSION['percounts2'])){
                      $_SESSION['percounts2'] = 0;
                      }
                      $actstd2 = $_SESSION['percounts2'];
                      while($actstd2 >= $acttd2){ ?>
                      <td class="p-0 text-center LO2_<?=$acttd2?> d-none LO2_<?=$acttd2?>LOE<?=$acttd2?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                      <?php  
                      $acttd2++; 
                      }


                  $acttd3 = 1;
                  if(empty($_SESSION['percounts3'])){
                    $_SESSION['percounts3'] = 0;
                    }
                    $actstd3 = $_SESSION['percounts3'];
                    while($actstd3 >= $acttd3){ ?>
                    <td class="p-0 text-center LO3_<?=$acttd3?> d-none LO3_<?=$acttd3?>LOE<?=$acttd3?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                    <?php  
                    $acttd3++; 
                    }

                  $acttd4 = 1;
                  if(empty($_SESSION['percounts4'])){
                  $_SESSION['percounts4'] = 0;
                  }
                  $actstd4 = $_SESSION['percounts4'];
                  while($actstd4 >= $acttd4){ ?>
                  <td class="p-0 text-center LO4_<?=$acttd4?> d-none LO4_<?=$acttd4?>LOE<?=$acttd4?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                  <?php  
                  $acttd4++; 
                  }

                  $acttd5 = 1;
                  if(empty($_SESSION['percounts5'])){
                  $_SESSION['percounts5'] = 0;
                  }
                  $actstd5 = $_SESSION['percounts5'];
                  while($actstd5 >= $acttd5){ ?>
                  <td class="p-0 text-center LO5_<?=$acttd5?> d-none LO5_<?=$acttd5?>LOE<?=$acttd5?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                  <?php  
                  $acttd5++; 
                  }

                  $acttd6 = 1;
                  if(empty($_SESSION['percounts6'])){
                  $_SESSION['percounts6'] = 0;
                  }
                  $actstd6 = $_SESSION['percounts6'];
                  while($actstd6 >= $acttd6){ ?>
                  <td class="p-0 text-center LO6_<?=$acttd6?> d-none LO6_<?=$acttd6?>LOE<?=$acttd6?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                  <?php  
                  $acttd6++; 
                  }
                  
                  $acttd7 = 1;
                  if(empty($_SESSION['percounts7'])){
                  $_SESSION['percounts7'] = 0;
                  }
                  $actstd7 = $_SESSION['percounts7'];
                  while($actstd7 >= $acttd7){ ?>
                  <td class="p-0 text-center LO7_<?=$acttd7?> d-none LO7_<?=$acttd7?>LOE<?=$acttd7?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                  <?php  
                  $acttd7++; 
                  }

                  $acttd8 = 1;
                  if(empty($_SESSION['percounts8'])){
                  $_SESSION['percounts8'] = 0;
                  }
                  $actstd8 = $_SESSION['percounts8'];
                  while($actstd8 >= $acttd8){ ?>
                  <td class="p-0 text-center LO8_<?=$acttd8?> d-none LO8_<?=$acttd8?>LOE<?=$acttd8?>_<?=$loops?>" rowspan="1" style="font-size:9px;">/</td>
                  <?php  
                  $acttd8++; 
                  }

                  ?> 

   

                    <td class="p-0 text-center fw-bold remarks_<?=$loops?>" rowspan="1" colspan="1" style="width:120px; font-size:10px;">

                <select class="text-center remarks_<?=$loops?> bg-transparent" style="width:200px; border:0px; -webkit-appearance: none;  font-size:10px;">
                <option class="fw-bold">COMPETENT</option>
                <option class="fw-bold">DROPPED</option>



              </select>

                  </td>


                    </tr>

                <?php $loops++; } ?>

    




 
             

            </tbody>
        </table>


        
</div>

<div class="row ms-3" style="height: 73px; margin-top:-12px;">
<div class="col-9"> 
  <p class="p-0 fw-bold" style="font-size:10px;">This is to certify that all entries in the above learner's achievement monotoring report are true and correct</p>

  



</div>
<div class="col-3">
</div>
  
<div class="row mt-3">
    <div class="col-4">

    <p class="p-0 fw-bold ms-3" style="font-size: 11px; font-family:Arial; margin-top:-6px;">Prepared by:</p>
   
    <p class="p-0 ms-4 fw-bold" style="margin-top:-10px; font-family:Arial; font-size:11px"><u><?=strtoupper($_SESSION['session_name']);?></u></p>
    <p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">Trainer <?=$_SESSION['qualicode']?></p>

  </div>

  <div class="col-4">
<?php
$selecttis = "SELECT * FROM signatory WHERE sign_id = '3'";
$sqltis = mysqli_query($connection,$selecttis);
while($tis = mysqli_fetch_array($sqltis)){ ?>


<p class="p-0 fw-bold ms-3" style="font-size: 11px; font-family:Arial; margin-top:-6px;">Checked by:</p>

<p class="p-0 ms-4 fw-bold" style="margin-top:-10px; font-family:Arial; font-size:11px"><u><?=$tis['sign_name']?></u></p>
<?php } ?>
<p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">Training Instruction Supervisor</p>

</div>

<div class="col-4">
<?php
$selectcc = "SELECT * FROM signatory WHERE sign_id = '1'";
$sqlcc = mysqli_query($connection,$selectcc);
while($cc = mysqli_fetch_array($sqlcc)){ ?>

<p class="p-0 fw-bold ms-3" style="font-size: 11px; font-family:Arial; margin-top:-6px;">Approved by:</p>
<p class="p-0 ms-4 fw-bold" style="margin-top:-10px; font-family:Arial; font-size:11px"><u><?=$cc['sign_name']?></u></p>
<?php } ?>
<p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">Center Chief</p>


</div>

   
  </div>
  
  


</div>

</div>




<div class="row mt-5 p-3">
<div class="mt-5 col-8 my-5">
              <div class="col border border-5 border-primary border-opacity-50 ms-3 me-3 py-3">
              <p class="text-center myf-custome6-font text-primary mt-1 h3">INSERT ELEMENT</p>

              <?php 
    $counts = 1;
    // $count = $_SESSIO['COUNT'];
    $bquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit='$sessionelement_id' ";
    $bsql = mysqli_query($connection,$bquery);
    while($brow = mysqli_fetch_array($bsql)){ ?>
        <div class="row border m-2 mx-5 pt-2">
        <div class="col-6 offset-2">
        <p class="myf-custome6-font text-primary mt-1"><?=$brow['lmar_element_name']?></p>

        </div>
        <div class="col-2">
        <input
          type="number"
          id="counts<?=$counts?>"
          class="form-control"
          value="<?=$_SESSION['percounts'."".$counts]?>"
        />
        <input type="hidden" class="limit<?=$counts?>" id="<?=$_SESSION['percounts'."".$counts]?>">
        </div>
        <div class="col-2">
        <div class="btn btn-primary" id="try<?=$counts?>">Insert</div>
        </div>


        </div>
    <?php $counts++; } ?>

    
    <div class="row d-flex mt-3 me-3">
    <div class="col-2 offset-10 btn btn-primary" id="printts"><i class="fas fa-print"></i> Print</div>
    </div>
  
    </div>

    



              </div>



</div>














  <div class="row d-none" id="navbar" style="height:100vh;">
    <div class="col-2 pe-0">
    <?php 
    require('../link/navbar.php');
  ?>
</div>
 

   
    













          </div>
        </div>





        </div>

      </div>

    </div>

    



    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
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






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="../javascript/lmarelements.js"></script>
    <script>
    
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });





    console.log('sheesh')
    </script>

    
    </body>
</html>