
<div class="row" id="printcertdrmncii_basic">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/drmnciiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">BASIC COMPONENTS</th>
   

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

                    </tr>

                      <tr class="border-dark text-center" style="height: 11px; font-size:8px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>  
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
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
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic_ncii ON  attendance.attendance_id = lmar_basic_ncii.lmar_basic_ncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_basic_ncii1_1'] == '/' && $row['lmar_basic_ncii1_2'] == '/' && $row['lmar_basic_ncii1_3'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_basic_ncii2_1'] == '/' && $row['lmar_basic_ncii2_2'] == '/' && $row['lmar_basic_ncii2_3'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_basic_ncii3_1'] == '/' && $row['lmar_basic_ncii3_2'] == '/' && $row['lmar_basic_ncii3_3'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_basic_ncii4_1'] == '/' && $row['lmar_basic_ncii4_2'] == '/' && $row['lmar_basic_ncii4_3'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_basic_ncii5_1'] == '/' && $row['lmar_basic_ncii5_2'] == '/' && $row['lmar_basic_ncii5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }
              if($row['lmar_basic_ncii6_1'] == '/' && $row['lmar_basic_ncii6_2'] == '/' && $row['lmar_basic_ncii6_3'] == '/' ){
                $rowc6 = '/';
              }
              else{
                $rowc6 = '';
              }
              if($row['lmar_basic_ncii7_1'] == '/' && $row['lmar_basic_ncii7_2'] == '/' && $row['lmar_basic_ncii7_3'] == '/' ){
                $rowc7 = '/';
              }
              else{
                $rowc7 = '';
              }
              if($row['lmar_basic_ncii8_1'] == '/' && $row['lmar_basic_ncii8_2'] == '/' && $row['lmar_basic_ncii8_3'] == '/' ){
                $rowc8 = '/';
              }
              else{
                $rowc8 = '';
              }
              if($row['lmar_basic_ncii9_1'] == '/' && $row['lmar_basic_ncii9_2'] == '/' && $row['lmar_basic_ncii9_3'] == '/' ){
                $rowc9 = '/';
              }
              else{
                $rowc9 = '';
              }
                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii1_3'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii3_3'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii6_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii6_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii6_3'].'</td>';  
                echo '<td class="p-0">'.$rowc6.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii7_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii7_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii7_3'].'</td>';
                echo '<td class="p-0">'.$rowc7.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii8_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii8_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii8_3'].'</td>';
                echo '<td class="p-0">'.$rowc8.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii9_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii9_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii9_3'].'</td>';  
                echo '<td class="p-0">'.$rowc9.'</td>'; 
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



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>


<!-- COMMON -->



<div class="row" id="printcertdrmncii_common">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/drmnciiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
 
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="43" style="width:18%; font-size:8px;">COMMON COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="4" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="6" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="6" style="width:3%;">IV</th>
                


                    </tr>

                      <tr class="border-dark text-center" style="height: 11px; font-size:8px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
                      <th class="p-0 fw-bold">C</th> 
                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_drmncii ON  attendance.attendance_id = lmar_drmncii.lmar_drmncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_drmncii_common1_1'] == '/' && $row['lmar_drmncii_common1_2'] == '/' && $row['lmar_drmncii_common1_3'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_drmncii_common2_1'] == '/' && $row['lmar_drmncii_common2_2'] == '/' && $row['lmar_drmncii_common2_3'] == '/' && $row['lmar_drmncii_common2_4'] == '/' && $row['lmar_drmncii_common2_5'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_drmncii_common3_1'] == '/' && $row['lmar_drmncii_common3_2'] == '/' && $row['lmar_drmncii_common3_3'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_drmncii_common4_1'] == '/' && $row['lmar_drmncii_common4_2'] == '/' && $row['lmar_drmncii_common4_3'] && $row['lmar_drmncii_common4_4'] == '/' && $row['lmar_drmncii_common4_5'] == '/'){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common1_3'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_4'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_5'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common3_3'].'</td>';
                echo '<td class="p-0">'.$rowc3.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_4'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_5'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';

                
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
    <p class="m-0 fw-bold" style="font-size:8px;">I. CARRY OUT MEASUREMENTS & CALCULATIONS</p>
    <p class="m-0" style="font-size:7px;">1. Obtain measurements </p>
    <p class="m-0" style="font-size:7px;">2. Perform simple calculations
</p>
    <p class="m-0" style="font-size:7px;">3. Estimate approximate quantities
</p>

    </div>

  </div>
  <div class="" style="width: 18%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">II. SET UP AND OPERATE MACHINE/S</p>
    <p class="m-0" style="font-size:7px;">1. Set machines </p>
    <p class="m-0" style="font-size:7px;">2. Conduct sample run</p>
    <p class="m-0" style="font-size:7px;">3. Test machine output </p>
    <p class="m-0" style="font-size:7px;">4. Re-adjust machine setting to meet requirements </p>
    <p class="m-0" style="font-size:7px;">5. Maintain records </p>
    </div>

  </div>
  <div class="" style="width: 22%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. PERFORM BASIC MAINTENANCE</p>
    <p class="m-0" style="font-size:7px;">1. Operate machine and
assess its performance </p>
    <p class="m-0" style="font-size:7px;">2. Clean and lubricate
machine
</p>
 <p class="m-0" style="font-size:7px;">3. Check machine
operation
</p>


    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IV. APPLY QUALITY STANDARDS</p>
    <p class="m-0" style="font-size:7px;">1. Assess own work </p>
    <p class="m-0" style="font-size:7px;">2. Assess quality of
received component
parts
</p>
  <p class="m-0" style="font-size:7px;">3. Measure parts
</p>
<p class="m-0" style="font-size:7px;">4. Record information 
</p>
<p class="m-0" style="font-size:7px;">5. Study causes of quality
deviations

</p>


    </div>

  </div>
  
  
  </div>


  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>

<!-- core -->

<div class="row" id="printcertdrmncii_core">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/drmnciiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">CORE COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="6" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">IV</th>

  
         

                    </tr>

                      <tr class="border-dark text-center" style="height: 11px; font-size:8px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
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
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold">C</th>

                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_drmncii ON  attendance.attendance_id = lmar_drmncii.lmar_drmncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_drmncii_core1_1'] == '/' && $row['lmar_drmncii_core1_2'] == '/' && $row['lmar_drmncii_core1_3'] == '/' && $row['lmar_drmncii_core1_4'] == '/' && $row['lmar_drmncii_core1_5'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_drmncii_core2_1'] == '/' && $row['lmar_drmncii_core2_2'] == '/' && $row['lmar_drmncii_core2_3'] == '/'){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_drmncii_core3_1'] == '/' && $row['lmar_drmncii_core3_2'] == '/'  && $row['lmar_drmncii_core3_3'] == '/' && $row['lmar_drmncii_core3_4'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_drmncii_core4_1'] == '/' && $row['lmar_drmncii_core4_2'] == '/' && $row['lmar_drmncii_core4_3'] == '/' && $row['lmar_drmncii_core4_4'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_4'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_5'].'</td>';

                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_4'].'</td>';
                echo '<td class="p-0">'.$rowc3.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_4'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';



                echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>
  </div>
  <div class="row pt-1" style="height: 13vh; background-color:#bfc1c3;">
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">I. DRAFT AND CUT PATTERN FOR CASUAL
APPAREL </p>
    <p class="m-0" style="font-size:7px;">1. Plan garment design</p>
    <p class="m-0" style="font-size:7px;">2. Take client’s body
measurements</p>
    <p class="m-0" style="font-size:7px;">3. . Draft basic/block
pattern
</p>
    <p class="m-0" style="font-size:7px;">4. Manipulate pattern </p>
    <p class="m-0" style="font-size:7px;">5. Cut final pattern  </p>


    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">II. PREPARE AND CUT MATERIALS FOR CASUAL
 APPAREL</p>
    <p class="m-0" style="font-size:7px;">1. Prepare materials
(fabric)
</p>
    <p class="m-0" style="font-size:7px;">2. Lay-out and mark
pattern on material
</p>
    <p class="m-0" style="font-size:7px;">3. Cut materials </p>

    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. SEW CASUAL APPAREL
</p>
    <p class="m-0" style="font-size:7px;">1. Prepare cut parts</p>
    <p class="m-0" style="font-size:7px;">2. Prepare sewing
machine for operation
 </p>
    <p class="m-0" style="font-size:7px;">3. Sew and assemble
garment parts </p>
    <p class="m-0" style="font-size:7px;">4.Alter completed
garment.</p>
    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IV. APPLY FINISHING TOUCHES ON CASUAL
APPAREL
</p>
    <p class="m-0" style="font-size:7px;">1. Apply finishing touches</p>
    <p class="m-0" style="font-size:7px;">2.Trim excess threads</p>
    <p class="m-0" style="font-size:7px;">3.Press finished garment </p>
    <p class="m-0" style="font-size:7px;">4.Package finished
garment.</p>

    </div>

  </div>

  
  </div>



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>



<!-- fullsize -->


<div class="row" style="height: 100vh; background-image:url(../img/progresschartbg.png); background-repeat:no-repeat; background-size: 3200px 100vh; height:100vh;" id="printcertdrmncii_progresschart">

<div style="height: 30vh; margin-left:-.5rem; margin-top:560px;">

 
<table class="table border-dark table-bordered" style="width:100%;">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 15px; font-size:15px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:15px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:15px;">BASIC COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="29" style="width:18%; font-size:15px;">COMMON COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="25" style="width:18%; font-size:15px;">CORE COMPONENTS</th>
                    </tr>
                    <tr class="border-dark" style="height: 15px; font-size:15px" >
                    <th class="p-0 text-center" colspan="4" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VI</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VII</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VIII</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IX</th>

                    <th class="p-0 text-center" colspan="4" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="6" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="6" style="width:3%;">IV</th>

                    <th class="p-0 text-center" colspan="6" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">IV</th>

                    </tr>

                      <tr class="border-dark text-center" style="height: 15px; font-size:15px">
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>  
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>


                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
                      <th class="p-0 fw-bold">C</th> 

                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">5</th>
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
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">4</th>
                      <th class="p-0 fw-bold">C</th>
                    </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_drmncii ON  attendance.attendance_id = lmar_drmncii.lmar_drmncii_attendance_id LEFT JOIN lmar_basic_ncii ON  attendance.attendance_id = lmar_basic_ncii.lmar_basic_ncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_basic_ncii1_1'] == '/' && $row['lmar_basic_ncii1_2'] == '/' && $row['lmar_basic_ncii1_3'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_basic_ncii2_1'] == '/' && $row['lmar_basic_ncii2_2'] == '/' && $row['lmar_basic_ncii2_3'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_basic_ncii3_1'] == '/' && $row['lmar_basic_ncii3_2'] == '/' && $row['lmar_basic_ncii3_3'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_basic_ncii4_1'] == '/' && $row['lmar_basic_ncii4_2'] == '/' && $row['lmar_basic_ncii4_3'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_basic_ncii5_1'] == '/' && $row['lmar_basic_ncii5_2'] == '/' && $row['lmar_basic_ncii5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }
              if($row['lmar_basic_ncii6_1'] == '/' && $row['lmar_basic_ncii6_2'] == '/' && $row['lmar_basic_ncii6_3'] == '/' ){
                $rowc6 = '/';
              }
              else{
                $rowc6 = '';
              }
              if($row['lmar_basic_ncii7_1'] == '/' && $row['lmar_basic_ncii7_2'] == '/' && $row['lmar_basic_ncii7_3'] == '/' ){
                $rowc7 = '/';
              }
              else{
                $rowc7 = '';
              }
              if($row['lmar_basic_ncii8_1'] == '/' && $row['lmar_basic_ncii8_2'] == '/' && $row['lmar_basic_ncii8_3'] == '/' ){
                $rowc8 = '/';
              }
              else{
                $rowc8 = '';
              }
              if($row['lmar_basic_ncii9_1'] == '/' && $row['lmar_basic_ncii9_2'] == '/' && $row['lmar_basic_ncii9_3'] == '/' ){
                $rowc9 = '/';
              }
              else{
                $rowc9 = '';
              }


              if($row['lmar_drmncii_common1_1'] == '/' && $row['lmar_drmncii_common1_2'] == '/' && $row['lmar_drmncii_common1_3'] == '/' ){
                $rowc1_2 = '/';
              }
              else{
                $rowc1_2 = '';
              }
              if($row['lmar_drmncii_common2_1'] == '/' && $row['lmar_drmncii_common2_2'] == '/' && $row['lmar_drmncii_common2_3'] == '/' && $row['lmar_drmncii_common2_4'] == '/' && $row['lmar_drmncii_common2_5'] == '/' ){
                $rowc2_2 = '/';
              }
              else{
                $rowc2_2 = '';
              }
              if($row['lmar_drmncii_common3_1'] == '/' && $row['lmar_drmncii_common3_2'] == '/' && $row['lmar_drmncii_common3_3'] == '/' ){
                $rowc3_2 = '/';
              }
              else{
                $rowc3_2 = '';
              }
              if($row['lmar_drmncii_common4_1'] == '/' && $row['lmar_drmncii_common4_2'] == '/' && $row['lmar_drmncii_common4_3'] && $row['lmar_drmncii_common4_4'] == '/' && $row['lmar_drmncii_common4_5'] == '/'){
                $rowc4_2 = '/';
              }
              else{
                $rowc4_2 = '';
              }


              if($row['lmar_drmncii_core1_1'] == '/' && $row['lmar_drmncii_core1_2'] == '/' && $row['lmar_drmncii_core1_3'] == '/' && $row['lmar_drmncii_core1_4'] == '/' && $row['lmar_drmncii_core1_5'] == '/' ){
                $rowc1_3 = '/';
              }
              else{
                $rowc1_3 = '';
              }
              if($row['lmar_drmncii_core2_1'] == '/' && $row['lmar_drmncii_core2_2'] == '/' && $row['lmar_drmncii_core2_3'] == '/'){
                $rowc2_3 = '/';
              }
              else{
                $rowc2_3 = '';
              }
              if($row['lmar_drmncii_core3_1'] == '/' && $row['lmar_drmncii_core3_2'] == '/'  && $row['lmar_drmncii_core3_3'] == '/' && $row['lmar_drmncii_core3_4'] == '/' ){
                $rowc3_3 = '/';
              }
              else{
                $rowc3_3 = '';
              }
              if($row['lmar_drmncii_core4_1'] == '/' && $row['lmar_drmncii_core4_2'] == '/' && $row['lmar_drmncii_core4_3'] == '/' && $row['lmar_drmncii_core4_4'] == '/' ){
                $rowc4_3 = '/';
              }
              else{
                $rowc4_3 = '';
              }



















            echo '<tr class="border-dark text-center" style="height: 14px; font-size:14px">';

            echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii1_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii1_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii1_3'].'</td>';
            echo '<td class="p-0">'.$rowc1.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii2_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii2_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii2_3'].'</td>';
            echo '<td class="p-0">'.$rowc2.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii3_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii3_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii3_3'].'</td>';  
            echo '<td class="p-0">'.$rowc3.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii4_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii4_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii4_3'].'</td>';
            echo '<td class="p-0">'.$rowc4.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii5_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii5_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii5_3'].'</td>';
            echo '<td class="p-0">'.$rowc5.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii6_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii6_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii6_3'].'</td>';  
            echo '<td class="p-0">'.$rowc6.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii7_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii7_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii7_3'].'</td>';
            echo '<td class="p-0">'.$rowc7.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii8_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii8_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii8_3'].'</td>';
            echo '<td class="p-0">'.$rowc8.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii9_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii9_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_ncii9_3'].'</td>';  
            echo '<td class="p-0">'.$rowc9.'</td>'; 


            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common1_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common1_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common1_3'].'</td>';
            echo '<td class="p-0">'.$rowc1_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_4'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common2_5'].'</td>';
            echo '<td class="p-0">'.$rowc2_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common3_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common3_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common3_3'].'</td>';
            echo '<td class="p-0">'.$rowc3_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_4'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_common4_5'].'</td>';
            echo '<td class="p-0">'.$rowc4_2.'</td>';


            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_4'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core1_5'].'</td>';

            echo '<td class="p-0">'.$rowc1_3.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core2_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core2_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core2_3'].'</td>';
            echo '<td class="p-0">'.$rowc2_3.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core3_4'].'</td>';
            echo '<td class="p-0">'.$rowc3_3.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_drmncii_core4_4'].'</td>';
            echo '<td class="p-0">'.$rowc4_3.'</td>';
            echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>
    </div>

  </div>




