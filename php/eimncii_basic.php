

<style>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@600&family=Passion+One&family=Paytone+One&family=Secular+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Nunito&family=Oswald:wght@600&family=Passion+One&family=Paytone+One&family=Secular+One&display=swap');

h1 {

  letter-spacing:0.2rem;
  font-size: 25px;
  line-height: 0.8em;
  margin-bottom: 20px;
  color: #0d1892;
}
h1 span {
  padding: 0 20px;
  font-family: 'Secular One', sans-serif;
}
</style>

<div class="row" id="printcertemncii_basic">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/header_circle.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
<div class="text-center" style="width:45%; margin-left:3rem; margin-top:4rem;">
<h1 class="fw-bold"><span><?=$_SESSION['qualiname']; ?></span></h1>
</div>
  </div>
  
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 15px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="37" style="width:18%; font-size:8px;">BASIC COMPONENTS</th>
   

                    </tr>

                    <tr class="border-dark" style="height: 11px; font-size:8px">
                    <?php
                    function numberToRomanbasic(int $number) {
                    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
                    $returnValue = '';
                    while ($number > 0) {
                        foreach ($map as $roman => $int) {
                            if($number >= $int) {
                                $number -= $int;
                                $returnValue .= $roman;
                                break;
                            }
                        }
                    }
                    return $returnValue;
                }


                   
                $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $selectsql = mysqli_query($connection,$selectquery);
                $mainloops = 1;
                while($row = mysqli_fetch_array($selectsql)){ 

                  $unitid = $row['lmar_unit_id'];
                  $counts = $row['lmar_unit_count'] + 1;
                  ?>
                    <th class="p-0 text-center" colspan="<?=$counts?>" style="width:3%;"><?=numberToRomanbasic($mainloops)?></th>
                    <?php 
                    $mainloops++;
                  } ?>
              </tr>
        



               <tr class="border-dark text-center" style="height: 11px; font-size:8px">
              <?php 
             
                $loopelement = 1;
                $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $countsql = mysqli_query($connection,$countquery);
                while($crow = mysqli_fetch_array($countsql)){ 
                  $unitcount = $crow['lmar_unit_count'];
                  $loopcheck = 1;
                  while($loopcheck <= $unitcount){
                  ?>
      
                  <th class="p-0 fw-bold" style="background-color:#2f9cf0;"><?=$loopcheck?></th>

                  <?php 
                  $loopcheck++;
                 } ?>
                 <th class="p-0 fw-bold">C</th>
                 <?php
                 $loopcheck = 1;
                 } ?>
          

              </tr>

                </thead>
                <tbody>

         <?php
         
         $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic ON  attendance.attendance_id = lmar_basic.lmar_basic_attendance_id LEFT JOIN lmar_basic_extend ON attendance.attendance_id =  lmar_basic_extend.lmar_basic_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC"; 
         $readsql = mysqli_query($connection,$readquery);

            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.".) ".$row['LastName'].", ".$row['FirstName'].'</td>';

                $loopelement = 1;
                $loopunit = 1;

                $getquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $getsql = mysqli_query($connection,$getquery);
                while($grow = mysqli_fetch_array($getsql)){ 
                  $getunitcount = $grow['lmar_unit_count'];
                  $getloopcheck = 1;
                  $finals = '';

                  while($getloopcheck <= $getunitcount){ ?>
       
                    <td class="p-0" style="background-color:#2f9cf0;"><?= $row["lmar_basic$loopunit".'_'."$getloopcheck"]; ?></td>  
               
               <?php         
                if($row["lmar_basic$loopunit".'_'."$getloopcheck"] != '/'){
                 
                }
                else{
                  $finals = '/';
                }  
               $getloopcheck++;
               } 
               echo '<td class="p-0">'.$finals.'</td>';
               $getloopcheck = 1;
               $loopunit++;
               
               }
               $loop++;
                }?>


              




                
                </tbody>
            </table>
  </div>

  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">

  <?php 
          function basicnumber(int $number) {
            $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies`  WHERE lmar_unit_comp = '$basiccompentencies' ";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>

<div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:5px;"><?=basicnumber($loopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:5px;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $loopelement++;
         } ?>
        
        
        <?php $loopcheck++;  ?>
         </div>

         </div> 
        <?php }

         
          ?>
  
  </div>



  <div class="row bg-white" style="height: 19vh; background-image:url(../img/footerprogresschart.jpg); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  <div class="col-6">
    <div class="row " style="height:6vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '1' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
            <span class="text-white ps-5 fw-bold pt-4" style="font-size:9px; font-family: 'Nunito', sans-serif; line-height:0.6rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>
    </div>
    <div class="row" style="height:6vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '2' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
          <span class="text-white ps-5 fw-bold pt-3" style="font-size:9px; font-family: 'Nunito', sans-serif; line-height:0.6rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>

    </div>

      <div class="row height:6vh;">
      <span class="text-white pt-1 ps-4 fw-bold" style="font-size:9px; line-height:0.8rem; font-family: 'Nunito', sans-serif;">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '3' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
      </div>
  </div>
  <div class="col-6 mt-4 ps-5 pt-2">
  <span class="text-white mt-3 fw-bold" style="font-size:13px; font-family: 'Nunito', sans-serif; line-height:1rem; ">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '4' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
  </div>
  </div>
</div>


<!-- COMMON -->



<div class="row" id="printcertemncii_common">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/header_circle.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
<div class="text-center" style="width:45%; margin-left:3rem; margin-top:4rem;">
<h1 class="fw-bold"><span><?=$_SESSION['qualiname']; ?></span></h1>
</div>
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">COMMON COMPONENTS</th>
   

                    </tr>

                    <tr class="border-dark" style="height: 11px; font-size:8px">
                    <?php
                    function numberToRoman(int $number) {
                    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
                    $returnValue = '';
                    while ($number > 0) {
                        foreach ($map as $roman => $int) {
                            if($number >= $int) {
                                $number -= $int;
                                $returnValue .= $roman;
                                break;
                            }
                        }
                    }
                    return $returnValue;
                }


                   
                $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
                $selectsql = mysqli_query($connection,$selectquery);
                $mainloops = 1;
                while($row = mysqli_fetch_array($selectsql)){ 

                  $unitid = $row['lmar_unit_id'];
                  $counts = $row['lmar_unit_count'] + 1;
                  ?>
                    <th class="p-0 text-center" colspan="<?=$counts?>" style="width:3%;"><?=numberToRoman($mainloops)?></th>
                    <?php 
                    $mainloops++;
                  } ?>
              </tr>
        



               <tr class="border-dark text-center" style="height: 11px; font-size:8px">
              <?php 
             
                $loopelement = 1;
                $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
                $countsql = mysqli_query($connection,$countquery);
                while($crow = mysqli_fetch_array($countsql)){ 
                  $unitcount = $crow['lmar_unit_count'];
                  $loopcheck = 1;
                  while($loopcheck <= $unitcount){
                  ?>
      
                  <th class="p-0 fw-bold" style="background-color:#2f9cf0;"><?=$loopcheck?></th>

                  <?php 
                  $loopcheck++;
                 } ?>
                 <th class="p-0 fw-bold">C</th>
                 <?php
                 $loopcheck = 1;
                 } ?>
          

              </tr>

                </thead>
                <tbody>

         <?php
         
         $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_common ON  attendance.attendance_id = lmar_common.lmar_common_attendance_id LEFT JOIN lmar_common_extend ON attendance.attendance_id =  lmar_common_extend.lmar_common_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC"; 
         $readsql = mysqli_query($connection,$readquery);

            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){


                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';

                $loopelement = 1;
                $loopunit = 1;

                $getquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
                $getsql = mysqli_query($connection,$getquery);
                while($grow = mysqli_fetch_array($getsql)){ 
                  $getunitcount = $grow['lmar_unit_count'];
                  $getloopcheck = 1;
                  $finals = '';

                  while($getloopcheck <= $getunitcount){ ?>
       
                    <td class="p-0" style="background-color:#2f9cf0;"><?= $row["lmar_common$loopunit".'_'."$getloopcheck"]; ?></td>  
               
               <?php         
                if($row["lmar_common$loopunit".'_'."$getloopcheck"] != '/'){
                 
                }
                else{
                  $finals = '/';
                }  
               $getloopcheck++;
               } 
               echo '<td class="p-0">'.$finals.'</td>';
               $getloopcheck = 1;
               $loopunit++;
        
               } 
               $loop++;
               }?>


              




                
                </tbody>
            </table>

  </div>

  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">

  <?php 
          function commonnumber(int $number) {
            $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>

<div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:6px;"><?=basicnumber($loopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:6px;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $loopelement++;
         } ?>
        
        
        <?php $loopcheck++;  ?>
         </div>

         </div> 
        <?php }

         
          ?>
  
  </div>
  <div class="row bg-white" style="height: 19vh; background-image:url(../img/footerprogresschart.jpg); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  <div class="col-6">
    <div class="row " style="height:6vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '1' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
            <span class="text-white ps-5 fw-bold pt-4" style="font-size:9px; font-family: 'Nunito', sans-serif; line-height:0.6rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>
    </div>
    <div class="row" style="height:6vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '2' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
          <span class="text-white ps-5 fw-bold pt-3" style="font-size:9px; font-family: 'Nunito', sans-serif; line-height:0.6rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>

    </div>

      <div class="row height:6vh;">
      <span class="text-white pt-1 ps-4 fw-bold" style="font-size:9px; line-height:0.8rem; font-family: 'Nunito', sans-serif;">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '3' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
      </div>
  </div>
  <div class="col-6 mt-4 ps-5 pt-2">
  <span class="text-white mt-3 fw-bold" style="font-size:13px; font-family: 'Nunito', sans-serif; line-height:1rem; ">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '4' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
  </div>
  </div>
</div>



<!-- core -->


<div class="row" id="printcertemncii_core">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/header_circle.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
<div class="text-center" style="width:45%; margin-left:3rem; margin-top:4rem;">
<h1 class="fw-bold"><span><?=$_SESSION['qualiname']; ?></span></h1>
</div>
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
  <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">COMMON COMPONENTS</th>
   

                    </tr>

                    <tr class="border-dark" style="height: 11px; font-size:8px">
                    <?php
                    function numberToRomancore(int $number) {
                    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
                    $returnValue = '';
                    while ($number > 0) {
                        foreach ($map as $roman => $int) {
                            if($number >= $int) {
                                $number -= $int;
                                $returnValue .= $roman;
                                break;
                            }
                        }
                    }
                    return $returnValue;
                }


                   
                $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
                $selectsql = mysqli_query($connection,$selectquery);
                $mainloops = 1;
                while($row = mysqli_fetch_array($selectsql)){ 

                  $unitid = $row['lmar_unit_id'];
                  $counts = $row['lmar_unit_count'] + 1;
                  ?>
                    <th class="p-0 text-center" colspan="<?=$counts?>" style="width:3%;"><?=numberToRomancore($mainloops)?></th>
                    <?php 
                    $mainloops++;
                  } ?>
              </tr>
        



               <tr class="border-dark text-center" style="height: 11px; font-size:8px">
              <?php 
             
                $loopelement = 1;
                $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
                $countsql = mysqli_query($connection,$countquery);
                while($crow = mysqli_fetch_array($countsql)){ 
                  $unitcount = $crow['lmar_unit_count'];
                  $loopcheck = 1;
                  while($loopcheck <= $unitcount){
                  ?>
      
                  <th class="p-0 fw-bold" style="background-color:#2f9cf0;"><?=$loopcheck?></th>

                  <?php 
                  $loopcheck++;
                 } ?>
                 <th class="p-0 fw-bold">C</th>
                 <?php
                 $loopcheck = 1;
                 } ?>
          

              </tr>

                </thead>
                <tbody>

         <?php
         
         $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_core ON  attendance.attendance_id = lmar_core.lmar_core_attendance_id LEFT JOIN lmar_core_extend ON attendance.attendance_id =  lmar_core_extend.lmar_core_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC"; 
         $readsql = mysqli_query($connection,$readquery);

            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){


                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';

                $loopelement = 1;
                $loopunit = 1;

                $getquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
                $getsql = mysqli_query($connection,$getquery);
                while($grow = mysqli_fetch_array($getsql)){ 
                  $getunitcount = $grow['lmar_unit_count'];
                  $getloopcheck = 1;
                  $finals = '';

                  while($getloopcheck <= $getunitcount){ ?>
       
                    <td class="p-0" style="background-color:#2f9cf0;"><?= $row["lmar_core$loopunit".'_'."$getloopcheck"]; ?></td>  
               
               <?php         
                if($row["lmar_core$loopunit".'_'."$getloopcheck"] != '/'){
                 
                }
                else{
                  $finals = '/';
                }  
               $getloopcheck++;
               } 
               echo '<td class="p-0">'.$finals.'</td>';
               $getloopcheck = 1;
               $loopunit++;
          
               }
               $loop++;
                }?>


              




                
                </tbody>
            </table>

  </div>

  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">

  <?php 
          function corenumber(int $number) {
            $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>

<div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:6px;"><?=basicnumber($loopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:6px;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $loopelement++;
         } ?>
        
        
        <?php $loopcheck++;  ?>
         </div>

         </div> 
        <?php }

         
          ?>
  
  </div>
  <div class="row bg-white" style="height: 19vh; background-image:url(../img/footerprogresschart.jpg); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  <div class="col-6">
    <div class="row " style="height:6vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '1' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
            <span class="text-white ps-5 fw-bold pt-4" style="font-size:9px; font-family: 'Nunito', sans-serif; line-height:0.6rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>
    </div>
    <div class="row" style="height:6vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '2' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
          <span class="text-white ps-5 fw-bold pt-3" style="font-size:9px; font-family: 'Nunito', sans-serif; line-height:0.6rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>

    </div>

      <div class="row height:6vh;">
      <span class="text-white pt-1 ps-4 fw-bold" style="font-size:9px; line-height:0.8rem; font-family: 'Nunito', sans-serif;">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '3' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
      </div>
  </div>
  <div class="col-6 mt-4 ps-5 pt-2">
  <span class="text-white mt-3 fw-bold" style="font-size:13px; font-family: 'Nunito', sans-serif; line-height:1rem; ">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '4' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
  </div>
  </div>
</div>






<!-- fullsize -->


<div class="row" id="printcertemncii_progresschart">

<div class="row bg-white" style="height: 20vh; background-image:url(../img/header_circle.png); background-repeat:no-repeat; background-size: 3200px 20vh; height:20vh;">
  <div class="text-center" style="width:45%; margin-left:3rem; margin-top:12rem;">
  <h1 class="fw-bold" style="font-size:5rem;"><span><?=$_SESSION['qualiname']; ?></span></h1>
  </div>
    </div>

    <div class="row bg-white" style="height: 48vh;">

 
<table class="table border-dark table-bordered" style="width:100%;">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 15px; font-size:15px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:15px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="<?=$basicelementcount + $basicunitcount?>" style="width:18%; font-size:15px;">BASIC COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="<?=$commonelementcount + $commonunitcount?>" style="width:18%; font-size:15px;">COMMON COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="<?=$coreelementcount + $coreunitcount?>" style="width:18%; font-size:15px;">CORE COMPONENTS</th>

   

                    </tr>
                    <tr class="border-dark" style="height: 15px; font-size:15px" >

                    <?php
                    function numberToRomanbasicprogress(int $number) {
                    $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
                    $returnValue = '';
                    while ($number > 0) {
                        foreach ($map as $roman => $int) {
                            if($number >= $int) {
                                $number -= $int;
                                $returnValue .= $roman;
                                break;
                            }
                        }
                    }
                    return $returnValue;
                }


                   
                $selectbasicquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $basicsql = mysqli_query($connection,$selectbasicquery);
                $mainloops = 1;
                while($row = mysqli_fetch_array($basicsql)){ 

                  $unitid = $row['lmar_unit_id'];
                  $counts = $row['lmar_unit_count'] + 1;
                  ?>
                    <th class="p-0 text-center" colspan="<?=$counts?>" style="width:3%;"><?=numberToRomanbasicprogress($mainloops)?></th>
                    <?php 
                    $mainloops++;
                  } 
        
                $commonselectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
                $commonselectsql = mysqli_query($connection,$commonselectquery);
                $mainloops = 1;
                while($commonrow = mysqli_fetch_array($commonselectsql)){ 

                  $unitid = $commonrow['lmar_unit_id'];
                  $counts = $commonrow['lmar_unit_count'] + 1;
                  ?>
                    <th class="p-0 text-center" colspan="<?=$counts?>" style="width:3%;"><?=numberToRomanbasicprogress($mainloops)?></th>
                    <?php 
                    $mainloops++;
                  }

                $coreselectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
                $coreselectsql = mysqli_query($connection,$coreselectquery);
                $mainloops = 1;
                while($row = mysqli_fetch_array($coreselectsql)){ 

                  $unitid = $row['lmar_unit_id'];
                  $counts = $row['lmar_unit_count'] + 1;
                  ?>
                    <th class="p-0 text-center" colspan="<?=$counts?>" style="width:3%;"><?=numberToRomanbasicprogress($mainloops)?></th>
                    <?php 
                    $mainloops++;
                  } ?>

                    </tr>

                      <tr class="border-dark text-center" style="height: 15px; font-size:15px">
    

              <?php 
             
                $loopelement = 1;
                $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $countsql = mysqli_query($connection,$countquery);
                while($crow = mysqli_fetch_array($countsql)){ 
                  $unitcount = $crow['lmar_unit_count'];
                  $loopcheck = 1;
                  while($loopcheck <= $unitcount){
                  ?>
      
                  <th class="p-0 fw-bold" style="background-color:#2f9cf0;"><?=$loopcheck?></th>

                  <?php 
                  $loopcheck++;
                 } ?>
                 <th class="p-0 fw-bold">C</th>
                 <?php
                 $loopcheck = 1;
                 } ?>
          


          <?php 
             
             $loopelement = 1;
             $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
             $countsql = mysqli_query($connection,$countquery);
             while($crow = mysqli_fetch_array($countsql)){ 
               $unitcount = $crow['lmar_unit_count'];
               $loopcheck = 1;
               while($loopcheck <= $unitcount){
               ?>
   
               <th class="p-0 fw-bold" style="background-color:#2f9cf0;"><?=$loopcheck?></th>

               <?php 
               $loopcheck++;
              } ?>
              <th class="p-0 fw-bold">C</th>
              <?php
              $loopcheck = 1;
              } ?>


<?php 
             
             $loopelement = 1;
             $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
             $countsql = mysqli_query($connection,$countquery);
             while($crow = mysqli_fetch_array($countsql)){ 
               $unitcount = $crow['lmar_unit_count'];
               $loopcheck = 1;
               while($loopcheck <= $unitcount){
               ?>
   
               <th class="p-0 fw-bold" style="background-color:#2f9cf0;"><?=$loopcheck?></th>

               <?php 
               $loopcheck++;
              } ?>
              <th class="p-0 fw-bold">C</th>
              <?php
              $loopcheck = 1;
              } ?>
       

           </tr>



                </thead>
                <tbody>

                <?php
         
         $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic ON  attendance.attendance_id = lmar_basic.lmar_basic_attendance_id LEFT JOIN lmar_basic_extend ON attendance.attendance_id =  lmar_basic_extend.lmar_basic_ex_attendance_id LEFT JOIN lmar_common ON  attendance.attendance_id = lmar_common.lmar_common_attendance_id LEFT JOIN lmar_common_extend ON attendance.attendance_id =  lmar_common_extend.lmar_common_ex_attendance_id LEFT JOIN lmar_core ON  attendance.attendance_id = lmar_core.lmar_core_attendance_id LEFT JOIN lmar_core_extend ON attendance.attendance_id =  lmar_core_extend.lmar_core_ex_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC"; 
         $readsql = mysqli_query($connection,$readquery);

            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){


                echo '<tr class="border-dark text-center" style="height: 14px; font-size:14px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';

                $loopelement = 1;
                $loopunit = 1;

                $getquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $getsql = mysqli_query($connection,$getquery);
                while($grow = mysqli_fetch_array($getsql)){ 
                  $getunitcount = $grow['lmar_unit_count'];
                  $getloopcheck = 1;
                  $finals = '';

                  while($getloopcheck <= $getunitcount){ ?>
       
                    <td class="p-0" style="background-color:#2f9cf0;"><?= $row["lmar_basic$loopunit".'_'."$getloopcheck"]; ?></td>  
               
               <?php         
                if($row["lmar_basic$loopunit".'_'."$getloopcheck"] != '/'){
                 
                }
                else{
                  $finals = '/';
                }  
               $getloopcheck++;
               } 
               echo '<td class="p-0">'.$finals.'</td>';
               $getloopcheck = 1;
  
        
               }
               $comgetquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
               $comgetsql = mysqli_query($connection,$comgetquery);
               while($grow = mysqli_fetch_array($comgetsql)){ 
                 $comgetunitcount = $grow['lmar_unit_count'];
                 $comgetloopcheck = 1;
                 $finals = '';

                 while($comgetloopcheck <= $comgetunitcount){ ?>
      
                   <td class="p-0" style="background-color:#2f9cf0;"><?= $row["lmar_common$loopunit".'_'."$comgetloopcheck"]; ?></td>  
              
              <?php         
               if($row["lmar_common$loopunit".'_'."$comgetloopcheck"] != '/'){
                
               }
               else{
                 $finals = '/';
               }  
              $comgetloopcheck++;
              } 
              echo '<td class="p-0">'.$finals.'</td>';
              $comgetloopcheck = 1;
              }

              $comgetquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '3' ";
              $comgetsql = mysqli_query($connection,$comgetquery);
              while($grow = mysqli_fetch_array($comgetsql)){ 
                $comgetunitcount = $grow['lmar_unit_count'];
                $comgetloopcheck = 1;
                $finals = '';

                while($comgetloopcheck <= $comgetunitcount){ ?>
     
                  <td class="p-0" style="background-color:#2f9cf0;"><?= $row["lmar_core$loopunit".'_'."$comgetloopcheck"]; ?></td>  
             
             <?php         
              if($row["lmar_core$loopunit".'_'."$comgetloopcheck"] != '/'){
               
              }
              else{
                $finals = '/';
              }  
             $comgetloopcheck++;
             } 
             echo '<td class="p-0">'.$finals.'</td>';
             $comgetloopcheck = 1;
             $loopunit++;
      
             }
               }?>





                
                </tbody>
            </table>
    </div>

    <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">

    <div class="col-4 border-end border-secondary">
      <div class="row border-bottom border-secondary">
        <span class="text-center fw-bold" style="font-size:10px;">BASIC COMPETENCIES</span>
      </div>

      <div class="row">

        <?php 


          function basicnumbers(int $number) {
            $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' LIMIT 0,3";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
<div class="col-4">
<div class="row">

    <p class="m-0 fw-bold" style="font-size:.6rem;"><?=basicnumbers($loopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $loopelement++;
         } ?>
        
        
        <?php $loopcheck++;  ?>
         </div>

         </div> 
         
        <?php }

          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' LIMIT 3,3";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
<div class="col-4">
<div class="row">
    <p class="m-0 fw-bold" style="font-size:.6rem;"><?=basicnumbers($loopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $loopelement++;
         } ?>
        
        
        <?php $loopcheck++;  ?>
         </div>

         </div> 
         
        <?php }

        $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' LIMIT 6,3";
        $selectsql = mysqli_query($connection,$selectquery);
        while($row = mysqli_fetch_array($selectsql)){ 
          $unitid = $row['lmar_unit_id']
          ?>
        <div class="col-4">
        <div class="row">
        <p class="m-0 fw-bold" style="font-size:.6rem;"><?=basicnumbers($loopcheck)?> <?= $row['lmar_unit_name']; ?></p>
          <?php 
        $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
        $elementsql = mysqli_query($connection,$elementquery);
        while($crow = mysqli_fetch_array($elementsql)){ ?>
        <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
          
        <?php
        $loopelement++;
        } ?>


        <?php $loopcheck++;  ?>
        </div>

        </div> 

        <?php }


        ?>

    </div>
  
        
    </div>

<!-- common -->

    <div class="col-4 border-end border-secondary">
      <div class="row border-bottom border-secondary">
        <span class="text-center fw-bold" style="font-size:10px;">COMMON COMPETENCIES</span>
      </div>
      <div class="row">

        <?php 


          function commonnumbers(int $number) {
            $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
          $commonloopcheck = '1';
          $commonloopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '2' AND lmar_unit_qualification = '$sessionqualification' LIMIT 0,3";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
<div class="col-4">
<div class="row">

    <p class="m-0 fw-bold" style="font-size:.6rem;"><?=commonnumbers($commonloopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $commonloopelement++;
         } ?>
        
        
        <?php $commonloopcheck++;  ?>
         </div>

         </div> 
         
        <?php }

          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '2' AND lmar_unit_qualification = '$sessionqualification' LIMIT 3,3";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
<div class="col-4">
<div class="row">
    <p class="m-0 fw-bold" style="font-size:.6rem;"><?=commonnumbers($commonloopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $commonloopelement++;
         } ?>
        
        
        <?php $commonloopcheck++;  ?>
         </div>

         </div> 
         
        <?php }

        $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '2' AND lmar_unit_qualification = '$sessionqualification' LIMIT 6,3";
        $selectsql = mysqli_query($connection,$selectquery);
        while($row = mysqli_fetch_array($selectsql)){ 
          $unitid = $row['lmar_unit_id']
          ?>
        <div class="col-4">
        <div class="row">
        <p class="m-0 fw-bold" style="font-size:.6rem;"><?=commonnumbers($commonloopcheck)?> <?= $row['lmar_unit_name']; ?></p>
          <?php 
        $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
        $elementsql = mysqli_query($connection,$elementquery);
        while($crow = mysqli_fetch_array($elementsql)){ ?>
        <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
          
        <?php
        $commonloopelement++;
        } ?>


        <?php $commonloopcheck++;  ?>
        </div>

        </div> 

        <?php }


        ?>

    </div>
  
        
    </div>

    <!-- core -->
  
    <div class="col-4">
      <div class="row border-bottom border-secondary">
        <span class="text-center fw-bold" style="font-size:10px;">CORE COMPETENCIES</span>
      </div>
      <div class="row">

        <?php 


          function corenumbers(int $number) {
            $map = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];
            $returnValue = '';
            while ($number > 0) {
                foreach ($map as $roman => $int) {
                    if($number >= $int) {
                        $number -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }
            return $returnValue;
        }
          $commonloopcheck = '1';
          $commonloopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '3' AND lmar_unit_qualification = '$sessionqualification' LIMIT 0,3";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
<div class="col-4">
<div class="row">

    <p class="m-0 fw-bold" style="font-size:.6rem;"><?=corenumbers($commonloopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $commonloopelement++;
         } ?>
        
        
        <?php $commonloopcheck++;  ?>
         </div>

         </div> 
         
        <?php }

          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '3' AND lmar_unit_qualification = '$sessionqualification' LIMIT 3,3";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
<div class="col-4">
<div class="row">
    <p class="m-0 fw-bold" style="font-size:.6rem;"><?=corenumbers($commonloopcheck)?> <?= $row['lmar_unit_name']; ?></p>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
            
          <?php
          $commonloopelement++;
         } ?>
        
        
        <?php $commonloopcheck++;  ?>
         </div>

         </div> 
         
        <?php }

        $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '3' AND lmar_unit_qualification = '$sessionqualification' LIMIT 6,3";
        $selectsql = mysqli_query($connection,$selectquery);
        while($row = mysqli_fetch_array($selectsql)){ 
          $unitid = $row['lmar_unit_id']
          ?>
        <div class="col-4">
        <div class="row">
        <p class="m-0 fw-bold" style="font-size:.6rem;"><?=corenumbers($commonloopcheck)?> <?= $row['lmar_unit_name']; ?></p>
          <?php 
        $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
        $elementsql = mysqli_query($connection,$elementquery);
        while($crow = mysqli_fetch_array($elementsql)){ ?>
        <p class="m-0" style="font-size:.6rem;"><?= $crow['lmar_element_name']; ?></p>
          
        <?php
        $commonloopelement++;
        } ?>


        <?php $commonloopcheck++;  ?>
        </div>

        </div> 

        <?php }


        ?>

    </div>
  
        
    </div>

  </div>



  <div class="row bg-white" style="height: 22vh; background-image:url(../img/footerprogresschart.jpg); background-repeat:no-repeat; background-size: 3200px 18vh; height:18vh;">
  <div class="col-6">
    <div class="row " style="height:5vh;">
        <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '1' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
      <span class="text-white fw-bold" style="font-size:1.6rem; font-family: 'Nunito', sans-serif; padding-top:3.5rem; padding-left:7rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>
    </div>
    <div class="row" style="height:5vh;">
    <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '2' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
      <span class="text-white fw-bold" style="font-size:1.6rem; font-family: 'Nunito', sans-serif; padding-top:3.5rem; padding-left:7rem;"><?=$mrow['mvog_name']?></span>
      <?php } ?>
    </div>

      <div class="row height:8vh;">
      <span class="text-white fw-bold" style="font-size:1.6rem; font-family: 'Nunito', sans-serif;  padding-top:3rem; padding-left:7rem;">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '3' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
      </div>
  </div>
  <div class="col-6 mt-4 pt-2" style="padding-left:10rem;">
  <span class="text-white fw-bold" style="font-size:2rem; font-family: 'Nunito', sans-serif; padding-top:4.2rem; padding-left:4rem; line-height:1.2em;">
      <ul>
      <?php
        $missionquery = "SELECT * FROM `missionvisionobjectivesgoal` WHERE mvog_type = '4' AND mvog_qualifiation = '$sessionqualification' ";
        $missionsql = mysqli_query($connection,$missionquery);
        while($mrow = mysqli_fetch_array($missionsql)){ ?>
        <li><?=$mrow['mvog_name']?></li>

      <?php } ?>
      </ul>
      </span>
  </div>
  </div>



  </div>

