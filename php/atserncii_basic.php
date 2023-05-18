
<div class="row" id="printcertatserncii_basic">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/atsnciiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
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



<div class="row" id="printcertatserncii_common">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/atsnciiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
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
        <th class="p-0 text-center" colspan="4" style="width:3%;">III</th>
        <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
        <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>
        <th class="p-0 text-center" colspan="4" style="width:3%;">VI</th>
        <th class="p-0 text-center" colspan="4" style="width:3%;">VII</th>




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
      
      $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_atserncii ON  attendance.attendance_id = lmar_atserncii.lmar_atserncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
      $readsql = mysqli_query($connection,$readquery);


        $loop = 1;
        while($row = mysqli_fetch_assoc($readsql)){
          if($row['lmar_atserncii_common1_1'] == '/' && $row['lmar_atserncii_common1_2'] == '/' && $row['lmar_atserncii_common1_3'] == '/' && $row['lmar_atserncii_common1_4'] == '/' ){
            $rowc1 = '/';
          }
          else{
            $rowc1 = '';
          }


          if($row['lmar_atserncii_common2_1'] == '/' && $row['lmar_atserncii_common2_2'] == '/' && $row['lmar_atserncii_common2_3'] == '/'){
            $rowc2 = '/';
          }
          else{
            $rowc2 = '';
          }
          if($row['lmar_atserncii_common3_1'] == '/' && $row['lmar_atserncii_common3_2'] == '/' && $row['lmar_atserncii_common3_3'] == '/'){
            $rowc3 = '/';
          }
          else{
            $rowc3 = '';
          }
          if($row['lmar_atserncii_common4_1'] == '/' && $row['lmar_atserncii_common4_2'] == '/' && $row['lmar_atserncii_common4_3'] == '/' ){
            $rowc4 = '/';
          }
          else{
            $rowc4 = '';
          }

          if($row['lmar_atserncii_common5_1'] == '/' && $row['lmar_atserncii_common5_2'] == '/' && $row['lmar_atserncii_common5_3'] == '/' ){
            $rowc5 = '/';
          }
          else{
            $rowc5 = '';
          }

          


          if($row['lmar_atserncii_common6_1'] == '/' && $row['lmar_atserncii_common6_2'] == '/' && $row['lmar_atserncii_common6_3'] == '/' ){
            $rowc6 = '/';
          }
          else{
            $rowc6 = '';
          }



          if($row['lmar_atserncii_common7_1'] == '/' && $row['lmar_atserncii_common7_2'] == '/' && $row['lmar_atserncii_common7_3'] == '/' ){
            $rowc7 = '/';
          }
          else{
            $rowc7 = '';
          }

            echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
            echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_4'].'</td>';
            echo '<td class="p-0">'.$rowc1.'</td>';
            
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common2_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common2_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common2_3'].'</td>';
            
            echo '<td class="p-0">'.$rowc2.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common3_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common3_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common3_3'].'</td>';
            echo '<td class="p-0">'.$rowc3.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common4_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common4_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common4_3'].'</td>';
            echo '<td class="p-0">'.$rowc4.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common5_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common5_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common5_3'].'</td>';
            echo '<td class="p-0">'.$rowc5.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common6_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common6_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common6_3'].'</td>';
            echo '<td class="p-0">'.$rowc6.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common7_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common7_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common7_3'].'</td>';
            echo '<td class="p-0">'.$rowc7.'</td>';



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
    <p class="m-0 fw-bold" style="font-size:8px;">I. VALIDATE VEHICLE SPECIFICATION</p>
    <div class="col-6">

      <p class="m-0" style="font-size:7px;">1. Check body type of the vehicle</p>
      <p class="m-0" style="font-size:7px;">2. Check vehicle engine type</p>
    </div>
    <div class="col-6">
    <p class="m-0" style="font-size:7px;">3. Check vehicle specifications</p>
    <p class="m-0" style="font-size:7px;">4. Complete validation of vehicle specification</p>
    </div>

  


    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;"> II. MOVE AND POSITION VEHICLE</p>
    <p class="m-0" style="font-size:7px;">1. Prepare vehicle for operation</p>
    <p class="m-0" style="font-size:7px;">2. Position vehicle</p>
    <p class="m-0" style="font-size:7px;">3. Park and stop the vehicle</p>
    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. UTILIZE AUTOMOTIVE TOOLS</p>
    <p class="m-0" style="font-size:7px;">1. Prepare automotive tools</p>
    <p class="m-0" style="font-size:7px;">2. Use automotive tools </p>
    <p class="m-0" style="font-size:7px;">3. Maintain automotive tools </p>

    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IV. PERFORM MENSURATION AND CALCULATION</p>
    <p class="m-0" style="font-size:7px;">1. Select measuring instruments</p>
    <p class="m-0" style="font-size:7px;">2. Carry out measurements and calculation</p>
    <p class="m-0" style="font-size:7px;">3. Maintain measuring instruments </p>

    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">V. UTILIZE WORKSHOP FACILITIES AND EQUIPMENT</p>
    <p class="m-0" style="font-size:7px;">1. Perform preoperation activities</p>
    <p class="m-0" style="font-size:7px;">2. Use facilities and equipment</p>
    <p class="m-0" style="font-size:7px;">3. Conduct postoperation activities </p>

    </div>

  </div>

  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">VI. PREPARE SERVICING PARTS AND CONSUMABLES</p>
    <p class="m-0" style="font-size:7px;">1. Identify parts and consumables</p>
    <p class="m-0" style="font-size:7px;">2. Retrieve and withdraw parts and consumables</p>
    <p class="m-0" style="font-size:7px;">3. Complete work process </p>

    </div>

  </div>

  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">VII. PREPARE VEHICLE FOR SERVICING AND RELEASING</p>
    <p class="m-0" style="font-size:7px;">1. Receive vehicle </p>
    <p class="m-0" style="font-size:7px;">2. Prepare vehicle for servicing</p>
    <p class="m-0" style="font-size:7px;">3. Prepare vehicle for releasing</p>

    </div>

  </div>


  </div>

  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>

<!-- core -->

<div class="row" id="printcertatserncii_core">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/atsnciiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:8px;">CORE COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>

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
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_atserncii ON  attendance.attendance_id = lmar_atserncii.lmar_atserncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_atserncii_core1_1'] == '/' && $row['lmar_atserncii_core1_2'] == '/' && $row['lmar_atserncii_core1_3'] == '/' && $row['lmar_atserncii_core1_4'] == '/'  ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_atserncii_core2_1'] == '/' && $row['lmar_atserncii_core2_2'] == '/' && $row['lmar_atserncii_core2_3'] == '/' && $row['lmar_atserncii_core2_4'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_atserncii_core3_1'] == '/' && $row['lmar_atserncii_core3_2'] == '/'  && $row['lmar_atserncii_core3_3'] == '/' && $row['lmar_atserncii_core3_4'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_4'].'</td>';
                

                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_4'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_4'].'</td>';
                echo '<td class="p-0">'.$rowc3.'</td>';

             



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
    <p class="m-0 fw-bold" style="font-size:8px;">I. DIAGNOSE AND REPAIR ENGINE COOLING AND
LUBRICATION SYSTEM
APPAREL </p>
    <p class="m-0" style="font-size:7px;">1. Prepare to
diagnose and
repair engine
cooling and
lubrication
systems
</p>
    <p class="m-0" style="font-size:7px;">2. Diagnose engine
cooling and
lubrication system</p>
    <p class="m-0" style="font-size:7px;">3. . Repair engine
cooling and
lubrication system
</p>
    <p class="m-0" style="font-size:7px;">4. Complete work
processes</p>



    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">II. DIAGNOSE AND REPAIR INTAKE AND EXHAUST
SYSTEM

 APPAREL</p>
    <p class="m-0" style="font-size:7px;">1. Prepare to
diagnose and
repair intake and
exhaust system
</p>
    <p class="m-0" style="font-size:7px;">2. Diagnose intake
and exhaust
system

</p>
    <p class="m-0" style="font-size:7px;">3. Repair intake and
exhaust system </p>
     <p class="m-0" style="font-size:7px;">4. Complete work
processes
 </p>
    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. DIAGNOSE AND OVERHAUL ENGINE MECHANICAL
SYSTEM
</p>
    <p class="m-0" style="font-size:7px;">1. Prepare to
diagnose engine
mechanical
system</p>
    <p class="m-0" style="font-size:7px;">2. Diagnose engine
mechanical
system

 </p>
    <p class="m-0" style="font-size:7px;">3. Repair engine
mechanical
system
 </p>
    <p class="m-0" style="font-size:7px;">4.Complete work
processes
.</p>
    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    

    </div>

  </div>

  
  </div>



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>



<!-- fullsize -->


<div class="row" style="height: 100vh; background-image:url(../img/progresschartbg.png); background-repeat:no-repeat; background-size: 3200px 100vh; height:100vh;" id="printcertatserncii_progresschart">

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

                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VI</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VII</th>

                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
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
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_atserncii ON  attendance.attendance_id = lmar_atserncii.lmar_atserncii_attendance_id LEFT JOIN lmar_basic_ncii ON  attendance.attendance_id = lmar_basic_ncii.lmar_basic_ncii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
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


        if($row['lmar_atserncii_common1_1'] == '/' && $row['lmar_atserncii_common1_2'] == '/' && $row['lmar_atserncii_common1_3'] == '/' && $row['lmar_atserncii_common1_4'] == '/' ){
            $rowc1_2 = '/';
          }
          else{
            $rowc1_2 = '';
          }


          if($row['lmar_atserncii_common2_1'] == '/' && $row['lmar_atserncii_common2_2'] == '/' && $row['lmar_atserncii_common2_3'] == '/'){
            $rowc2_2 = '/';
          }
          else{
            $rowc2_2 = '';
          }
          if($row['lmar_atserncii_common3_1'] == '/' && $row['lmar_atserncii_common3_2'] == '/' && $row['lmar_atserncii_common3_3'] == '/'){
            $rowc3_2 = '/';
          }
          else{
            $rowc3_2 = '';
          }
          if($row['lmar_atserncii_common4_1'] == '/' && $row['lmar_atserncii_common4_2'] == '/' && $row['lmar_atserncii_common4_3'] == '/' ){
            $rowc4_2 = '/';
          }
          else{
            $rowc4_2 = '';
          }

          if($row['lmar_atserncii_common5_1'] == '/' && $row['lmar_atserncii_common5_2'] == '/' && $row['lmar_atserncii_common5_3'] == '/' ){
            $rowc5_2 = '/';
          }
          else{
            $rowc5_2 = '';
          }

          


          if($row['lmar_atserncii_common6_1'] == '/' && $row['lmar_atserncii_common6_2'] == '/' && $row['lmar_atserncii_common6_3'] == '/' ){
            $rowc6_2 = '/';
          }
          else{
            $rowc6_2 = '';
          }



          if($row['lmar_atserncii_common7_1'] == '/' && $row['lmar_atserncii_common7_2'] == '/' && $row['lmar_atserncii_common7_3'] == '/' ){
            $rowc7_2 = '/';
          }
          else{
            $rowc7_2 = '';
          }


        if($row['lmar_atserncii_core1_1'] == '/' && $row['lmar_atserncii_core1_2'] == '/' && $row['lmar_atserncii_core1_3'] == '/' && $row['lmar_atserncii_core1_4'] == '/'  ){
                $rowc1_3 = '/';
              }
              else{
                $rowc1_3 = '';
              }
              if($row['lmar_atserncii_core2_1'] == '/' && $row['lmar_atserncii_core2_2'] == '/' && $row['lmar_atserncii_core2_3'] == '/' && $row['lmar_atserncii_core2_4'] == '/' ){
                $rowc2_3 = '/';
              }
              else{
                $rowc2_3 = '';
              }
              if($row['lmar_atserncii_core3_1'] == '/' && $row['lmar_atserncii_core3_2'] == '/'  && $row['lmar_atserncii_core3_3'] == '/' && $row['lmar_atserncii_core3_4'] == '/' ){
                $rowc3_3 = '/';
              }
              else{
                $rowc3_3 = '';
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



            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_3'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common1_4'].'</td>';
            echo '<td class="p-0">'.$rowc1_2.'</td>';
            
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common2_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common2_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common2_3'].'</td>';
            
            echo '<td class="p-0">'.$rowc2_2.'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common3_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common3_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common3_3'].'</td>';
            echo '<td class="p-0">'.$rowc3_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common4_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common4_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common4_3'].'</td>';
            echo '<td class="p-0">'.$rowc4_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common5_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common5_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common5_3'].'</td>';
            echo '<td class="p-0">'.$rowc5_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common6_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common6_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common6_3'].'</td>';
            echo '<td class="p-0">'.$rowc6_2.'</td>';

            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common7_1'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common7_2'].'</td>';
            echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_common7_3'].'</td>';
            echo '<td class="p-0">'.$rowc7_2.'</td>';


             echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core1_4'].'</td>';
                

                echo '<td class="p-0">'.$rowc1_3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core2_4'].'</td>';
                echo '<td class="p-0">'.$rowc2_3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_atserncii_core3_4'].'</td>';
                echo '<td class="p-0">'.$rowc3_3.'</td>';
                echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>
    </div>

  </div>




