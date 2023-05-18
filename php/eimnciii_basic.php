
<div class="row" id="printcerteimciii_basic">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/eimnciiiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="39" style="width:18%; font-size:8px;">BASIC COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="4" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
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
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic_nciii ON  attendance.attendance_id = lmar_basic_nciii.lmar_basicnciii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_basic_nciii1_1'] == '/' && $row['lmar_basic_nciii1_2'] == '/' && $row['lmar_basic_nciii1_3'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_basic_nciii2_1'] == '/' && $row['lmar_basic_nciii2_2'] == '/' && $row['lmar_basic_nciii2_3'] == '/' && $row['lmar_basic_nciii2_4'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_basic_nciii3_1'] == '/' && $row['lmar_basic_nciii3_2'] == '/' && $row['lmar_basic_nciii3_3'] == '/' && $row['lmar_basic_nciii3_4'] == '/'){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_basic_nciii4_1'] == '/' && $row['lmar_basic_nciii4_2'] == '/' && $row['lmar_basic_nciii4_3'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_basic_nciii5_1'] == '/' && $row['lmar_basic_nciii5_2'] == '/' && $row['lmar_basic_nciii5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }
              if($row['lmar_basic_nciii6_1'] == '/' && $row['lmar_basic_nciii6_2'] == '/' && $row['lmar_basic_nciii6_3'] == '/' ){
                $rowc6 = '/';
              }
              else{
                $rowc6 = '';
              }
              if($row['lmar_basic_nciii7_1'] == '/' && $row['lmar_basic_nciii7_2'] == '/' && $row['lmar_basic_nciii7_3'] == '/' ){
                $rowc7 = '/';
              }
              else{
                $rowc7 = '';
              }
              if($row['lmar_basic_nciii8_1'] == '/' && $row['lmar_basic_nciii8_2'] == '/' && $row['lmar_basic_nciii8_3'] == '/' ){
                $rowc8 = '/';
              }
              else{
                $rowc8 = '';
              }
              if($row['lmar_basic_nciii9_1'] == '/' && $row['lmar_basic_nciii9_2'] == '/' && $row['lmar_basic_nciii9_3'] == '/' ){
                $rowc9 = '/';
              }
              else{
                $rowc9 = '';
              }
                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii1_3'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_4'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_4'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii6_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii6_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii6_3'].'</td>';  
                echo '<td class="p-0">'.$rowc6.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii7_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii7_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii7_3'].'</td>';
                echo '<td class="p-0">'.$rowc7.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii8_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii8_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii8_3'].'</td>';
                echo '<td class="p-0">'.$rowc8.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii9_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii9_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii9_3'].'</td>';  
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
    <p class="m-0 fw-bold" style="font-size:7px;">I. LEAD WORKPLACE COMMUNICATION</p>
    <p class="m-0" style="font-size:7px;">1. Communicate
information
about
workplace
processes</p>
    <p class="m-0" style="font-size:7px;">2. Lead workplace
discussions</p>
    <p class="m-0" style="font-size:7px;">3. Identify and
communicate
issues arising in
the workplace</p>

    </div>

  </div>
  <div class="" style="width: 18%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">II LEAD SMALL TEAMS</p>
    <p class="m-0" style="font-size:7px;">1. Provide team
leadership</p>

    <p class="m-0" style="font-size:7px;">2. Assign
responsibilities</p>

    <p class="m-0" style="font-size:7px;">3. Set
performance
expectations for
team members
</p>

<p class="m-0" style="font-size:7px;">4. Supervise team
performance
</p>

    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">III. APPLY CRITICAL THINKING AND PROBLEM-SOLVING TECHNIQUES</p>
    
    <p class="m-0" style="font-size:7px;">1. Examine
specific
workplace
challenges</p>

    <p class="m-0" style="font-size:7px;">2. Analyze the
causes of
specific
workplace
challenges</p>
  
    <p class="m-0" style="font-size:7px;">3. Formulate
resolutions
to specific
workplace
challenges
</p>

    <p class="m-0" style="font-size:7px;">4. Implement
action plans
and
communicate
results
</p>

   

    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">IV. WORK IN A DIVERSE ENVIRONMENT </p>
    <p class="m-0" style="font-size:7px;">1. Develop an
individual’s
cultural
awareness and
sensitivity </p>

    <p class="m-0" style="font-size:7px;">2. Work
effectively in an
environment
that
acknowledges
and values
cultural
diversity</p>

    <p class="m-0" style="font-size:7px;">3. Identify
common issues
in a
multicultural
and diverse
environment</p>

    </div>

  </div>
  <div class="" style="width: 23%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">V. PROPOSE METHODS OF APPLYING LEARNING AND INNOVATION</p>
    <p class="m-0" style="font-size:6px;">1. Assess work
procedures,
processes and
systems in
terms of
innovative
practices</p>
    <p class="m-0" style="font-size:6px;">2. . Generate
practical action
plans for
improving work
procedures,
processes</p>
    <p class="m-0" style="font-size:6px;">3. Evaluate the
effectiveness of
the proposed
action plans
</p>

    </div>

  </div>
  <div class="" style="width: 15%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">VI. USE INFORMATION SYSTEMATICALLY</p>
    <p class="m-0" style="font-size:6px;">1. Use technical
information </p>

    <p class="m-0" style="font-size:6px;">2. Apply information
technology (IT)
</p>

    <p class="m-0" style="font-size:6px;">3. Edit, format and
check
information
</p>

    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">VII. EVALUATE OCCUPATIONAL SAFETY AND HEALTH WORK PRACTICES
</p>
    <p class="m-0" style="font-size:7px;">1. Interpret
Occupational
Safety and
Health
practices</p>

    <p class="m-0" style="font-size:7px;">2. Set OSH
work targets</p>

    <p class="m-0" style="font-size:7px;">3. Evaluate
effectiveness
of
Occupational
Safety and
Health work
instructions
</p>

    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:7px;">VIII. EVALUATE ENVIRONMENTAL WORK PRACTICES</p>
    <p class="m-0" style="font-size:7px;">1. Interpret
environmental
practices,
policies and
procedures</p>

    <p class="m-0" style="font-size:7px;">2. Establish
targets to
evaluate
environmental
practices
</p>

    <p class="m-0" style="font-size:7px;">3. Evaluate
effectiveness of
environmental
practices
</p>

    </div>

  </div>
  <div class="" style="width: 17%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:6px;">IX FACILITATE ENTREPRENEURIAL SKILLS FOR (MSMEs)</p>
    <p class="m-0" style="font-size:6px;">1. Develop and
maintain
(MSMEs)
skills in the
organization</p>
    <p class="m-0" style="font-size:6px;">2. Establish and
maintain
client-base/
market</p>
    <p class="m-0" style="font-size:6px;">3. Apply budgeting
and financial
management
skills</p>

    </div>

  </div>
  
  </div>


  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>


<!-- COMMON -->



<div class="row" id="printcerteimciii_common">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/eimnciiiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
  </div>
  
  
  <div class="row bg-white" style="height: 50vh;">
  
 
  <table class="table border-dark table-bordered">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:8px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="43" style="width:18%; font-size:8px;">COMMON COMPONENTS</th>
   

                    </tr>
                    <tr class="border-dark" style="height: 11px; font-size:8px" >
                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">IV</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">V</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VI</th>


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
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">1</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">2</th>
                      <th class="p-0 fw-bold" style="background-color:#2f9cf0;">3</th>
                      <th class="p-0 fw-bold">C</th>

                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimnciii ON  attendance.attendance_id = lmar_eimnciii.lmar_eimnciii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_eimnciii_common1_1'] == '/' && $row['lmar_eimnciii_common1_2'] == '/' && $row['lmar_eimnciii_common1_3'] == '/' && $row['lmar_eimnciii_common1_4'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_eimnciii_common2_1'] == '/' && $row['lmar_eimnciii_common2_2'] == '/' && $row['lmar_eimnciii_common2_3'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_eimnciii_common3_1'] == '/' && $row['lmar_eimnciii_common3_2'] == '/' && $row['lmar_eimnciii_common3_3'] == '/' && $row['lmar_eimnciii_common3_4'] == '/'){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_eimnciii_common4_1'] == '/' && $row['lmar_eimnciii_common4_2'] == '/' && $row['lmar_eimnciii_common4_3'] == '/'){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_eimnciii_common5_1'] == '/' && $row['lmar_eimnciii_common5_2'] == '/' && $row['lmar_eimnciii_common5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }
              if($row['lmar_eimnciii_common6_1'] == '/' && $row['lmar_eimnciii_common6_2'] == '/' && $row['lmar_eimnciii_common6_3'] == '/' ){
                $rowc6 = '/';
              }
              else{
                $rowc6 = '';
              }
              

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_4'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_4'].'</td>';
                echo '<td class="p-0">'.$rowc3.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common6_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common6_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common6_3'].'</td>';
                echo '<td class="p-0">'.$rowc6.'</td>';

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
    <p class="m-0 fw-bold" style="font-size:8px;">I. USE HAND TOOLS</p>
    <div class="col-6">
    <p class="m-0" style="font-size:7px;">1. Plan and
prepare for
tasks to be
undertaken
 </p>
    <p class="m-0" style="font-size:7px;">2. . Prepare
hand tools</p>
    </div>
    <div class="col-6">
    <p class="m-0" style="font-size:7px;">3. Use
appropriate
hand tools
and test
equipment
</p>
<p class="m-0" style="font-size:7px;">4. Maintain
hand tools
        </p>

    </div>

    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">II. PERFORM MENSURATION AND CALCULATION</p>
    <p class="m-0" style="font-size:7px;">1. Select
measuring
instruments
</p>
    <p class="m-0" style="font-size:7px;">2. Carry out
measurements
and calculation</p>
    <p class="m-0" style="font-size:7px;">3. Maintain
measuring
instruments
</p>

    </div>

  </div>
  <div class="" style="width: 40%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px; margin-left:30px;">III. PREPARE AND INTERPRET TECHNICAL DRAWING</p>
    <div class="col-6">
    <p class="m-0" style="font-size:7px;">1. . Identify
different
kinds of
technical
drawings  </p>
    <p class="m-0" style="font-size:7px;">2. . Identify
different
kinds of
technical
drawings 
</p>
    </div>
    <div class="col-6">
        
<p class="m-0" style="font-size:7px;">3. Prepare/
make
changes to
electrical/
electronic
schematics
and
drawings
</p>
    <p class="m-0" style="font-size:7px;">4. Store
technical
drawings
and
equipment/
instruments

</p>

    </div>



    </div>

  </div>
  <div class="" style="width: 20%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">IV APPLY QUALITY STANDARDS</p>
    <p class="m-0" style="font-size:7px;">1. Assess
quality of
received
materials or
components
</p>
    <p class="m-0" style="font-size:7px;">2. Assess own
work
</p>
    <p class="m-0" style="font-size:7px;">3. Engage in
quality
improvement
</p>



    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">V. TERMINATE AND CONNECT ELECTRICAL WIRING AND ELECTRONICS CIRCUIT</p>
    <p class="m-0" style="font-size:7px;">1. Plan and
prepare for
termination/
connection of
electrical
wiring/electronic
s circuits</p>
    <p class="m-0" style="font-size:7px;">2. Terminate/
connect
electrical wiring/
electronic
circuits
</p>
    <p class="m-0" style="font-size:7px;">3. Test
termination/
connections of
electrical wiring/
electronics
circuits
</p>

    </div>

  </div>
  <div class="" style="width: 30%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">VI. MAINTAIN TOOLS AND EQUIPMENT </p>
    <p class="m-0" style="font-size:7px;">1. Check condition
of tools and
equipment</p>
    <p class="m-0" style="font-size:7px;">2. Perform basic
preventive
maintenance

</p>
    <p class="m-0" style="font-size:7px;">3. Store tools and
equipment
</p>

    </div>

    
  </div>
  </div>


  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>

<!-- core -->

<div class="row" id="printcerteimciii_core">
<div class="row bg-white" style="height: 20vh; background-image:url(../img/eimnciiiheader.png); background-repeat:no-repeat; background-size: 1150px 20vh; height:20vh;">
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
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
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
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_eimnciii ON  attendance.attendance_id = lmar_eimnciii.lmar_eimnciii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_eimnciii_core1_1'] == '/' && $row['lmar_eimnciii_core1_2'] == '/' && $row['lmar_eimnciii_core1_3'] == '/' && $row['lmar_eimnciii_core1_4'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_eimnciii_core2_1'] == '/' && $row['lmar_eimnciii_core2_2'] == '/' && $row['lmar_eimnciii_core2_3'] == '/'){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_eimnciii_core3_1'] == '/' && $row['lmar_eimnciii_core3_2'] == '/'&& $row['lmar_eimnciii_core3_3'] == '/' && $row['lmar_eimnciii_core3_4'] == '/' ){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              

                echo '<tr class="border-dark text-center" style="height: 11px; font-size:8px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_4'].'</td>';

                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_4'].'</td>';
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
    <p class="m-0 fw-bold" style="font-size:8px;">I. PERFORM ROUGHING-IN AND WIRING ACTIVITIES FOR THREE-PHASE DISTRIBUTION SYSTEM FOR POWER, LIGHTING AND MOTOR CONTROL PANEL</p>
    <p class="m-0" style="font-size:7px;">1. Prepare for
rough-in
and wiring
works</p>
    <p class="m-0" style="font-size:7px;">2. Install
cable tray
and panel
</p>
    <p class="m-0" style="font-size:7px;">3. Perform
wiring
works</p>
    <p class="m-0" style="font-size:7px;">4. . Complete
work
activity.</p>


    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">II. PERFORM INSTALLATION OF DATA MEASUREMENT AND CONTROL SYSTEM ON ELECTRICAL AND AUXILLIARY EQUIPMENT</p>
    <p class="m-0" style="font-size:7px;">1. Plan and prepare
for installation
work
</p>
    <p class="m-0" style="font-size:7px;">2. Install electrical
system and
auxiliary
equipment</p>
    <p class="m-0" style="font-size:7px;">3. Notify
completion of
work
</p>
    
    </div>

  </div>
  <div class="" style="width: 25%;">
    <div class="row">
    <p class="m-0 fw-bold" style="font-size:8px;">III. INSTALL, ASSEMBLE, TEST AND MAINTAIN MOTOR CONTROL SYSTEM</p>
    <p class="m-0" style="font-size:7px;">1. Check/
Review type
and purpose
of motor
control
system.
g</p>
    <p class="m-0" style="font-size:7px;">2. Install and
assemble
motor control
system </p>
    <p class="m-0" style="font-size:7px;">3. Notify
completion of
work </p>
    <p class="m-0" style="font-size:7px;">4. CMaintain
electrical
motor control
system.  </p>

    </div>

  </div>

  </div>



  <div class="row bg-white" style="height: 20vh; background-image:url(../img/defaultfooter.png); background-repeat:no-repeat; background-size: 1150px 18vh; height:18vh;">
  </div>
</div>

<!-- fullsize -->






<div class="row" style="height: 100vh; background-image:url(../img/progresschartbg.png); background-repeat:no-repeat; background-size: 3200px 100vh; height:100vh;" id="printcertemnciii_progresschart">

<div style="height: 30vh; margin-left:-.5rem; margin-top:560px;">

 
<table class="table border-dark table-bordered" style="width:100%;">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 15px; font-size:15px" >
                    <th class="p-0 text-center py-1" rowspan="3" style="width:5%; font-size:15px;">TRAINEES NAME</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:15px;">BASIC COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="22" style="width:18%; font-size:15px;">COMMON COMPONENTS</th>
                    <th class="p-0 text-center py-1" colspan="36" style="width:18%; font-size:15px;">CORE COMPONENTS</th>

   

                    </tr>
                    <tr class="border-dark" style="height: 15px; font-size:15px" >
                    <th class="p-0 text-center" colspan="4" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">II</th>
                    <th class="p-0 text-center" colspan="5" style="width:3%;">III</th>
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
                    <th class="p-0 text-center" colspan="4" style="width:3%;">VI</th>

                    <th class="p-0 text-center" colspan="5" style="width:3%;">I</th>
                    <th class="p-0 text-center" colspan="4" style="width:3%;">II</th>
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

                      </tr>

                </thead>
                <tbody>

         <?php
         
          $readquery = "SELECT * FROM `attendance` LEFT JOIN lmar_basic_nciii ON  attendance.attendance_id = lmar_basic_nciii.lmar_basicnciii_attendance_id LEFT JOIN lmar_eimnciii ON  attendance.attendance_id = lmar_eimnciii.lmar_eimnciii_attendance_id WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' "; 
          $readsql = mysqli_query($connection,$readquery);


            $loop = 1;
            while($row = mysqli_fetch_assoc($readsql)){
              if($row['lmar_basic_nciii1_1'] == '/' && $row['lmar_basic_nciii1_2'] == '/' && $row['lmar_basic_nciii1_3'] == '/' ){
                $rowc1 = '/';
              }
              else{
                $rowc1 = '';
              }
              if($row['lmar_basic_nciii2_1'] == '/' && $row['lmar_basic_nciii2_2'] == '/' && $row['lmar_basic_nciii2_3'] == '/' && $row['lmar_basic_nciii2_4'] == '/' ){
                $rowc2 = '/';
              }
              else{
                $rowc2 = '';
              }
              if($row['lmar_basic_nciii3_1'] == '/' && $row['lmar_basic_nciii3_2'] == '/' && $row['lmar_basic_nciii3_3'] == '/' && $row['lmar_basic_nciii3_4'] == '/'){
                $rowc3 = '/';
              }
              else{
                $rowc3 = '';
              }
              if($row['lmar_basic_nciii4_1'] == '/' && $row['lmar_basic_nciii4_2'] == '/' && $row['lmar_basic_nciii4_3'] == '/' ){
                $rowc4 = '/';
              }
              else{
                $rowc4 = '';
              }
              if($row['lmar_basic_nciii5_1'] == '/' && $row['lmar_basic_nciii5_2'] == '/' && $row['lmar_basic_nciii5_3'] == '/' ){
                $rowc5 = '/';
              }
              else{
                $rowc5 = '';
              }
              if($row['lmar_basic_nciii6_1'] == '/' && $row['lmar_basic_nciii6_2'] == '/' && $row['lmar_basic_nciii6_3'] == '/' ){
                $rowc6 = '/';
              }
              else{
                $rowc6 = '';
              }
              if($row['lmar_basic_nciii7_1'] == '/' && $row['lmar_basic_nciii7_2'] == '/' && $row['lmar_basic_nciii7_3'] == '/' ){
                $rowc7 = '/';
              }
              else{
                $rowc7 = '';
              }
              if($row['lmar_basic_nciii8_1'] == '/' && $row['lmar_basic_nciii8_2'] == '/' && $row['lmar_basic_nciii8_3'] == '/' ){
                $rowc8 = '/';
              }
              else{
                $rowc8 = '';
              }
              if($row['lmar_basic_nciii9_1'] == '/' && $row['lmar_basic_nciii9_2'] == '/' && $row['lmar_basic_nciii9_3'] == '/' ){
                $rowc9 = '/';
              }
              else{
                $rowc9 = '';
              }



              if($row['lmar_eimnciii_common1_1'] == '/' && $row['lmar_eimnciii_common1_2'] == '/' && $row['lmar_eimnciii_common1_3'] == '/' && $row['lmar_eimnciii_common1_4'] == '/' ){
                $rowc1_2 = '/';
              }
              else{
                $rowc1_2 = '';
              }
              if($row['lmar_eimnciii_common2_1'] == '/' && $row['lmar_eimnciii_common2_2'] == '/' && $row['lmar_eimnciii_common2_3'] == '/' ){
                $rowc2_2 = '/';
              }
              else{
                $rowc2_2 = '';
              }
              if($row['lmar_eimnciii_common3_1'] == '/' && $row['lmar_eimnciii_common3_2'] == '/' && $row['lmar_eimnciii_common3_3'] == '/' && $row['lmar_eimnciii_common3_4'] == '/'){
                $rowc3_2 = '/';
              }
              else{
                $rowc3_2 = '';
              }
              if($row['lmar_eimnciii_common4_1'] == '/' && $row['lmar_eimnciii_common4_2'] == '/' && $row['lmar_eimnciii_common4_3'] == '/'){
                $rowc4_2 = '/';
              }
              else{
                $rowc4_2 = '';
              }
              if($row['lmar_eimnciii_common5_1'] == '/' && $row['lmar_eimnciii_common5_2'] == '/' && $row['lmar_eimnciii_common5_3'] == '/' ){
                $rowc5_2 = '/';
              }
              else{
                $rowc5_2 = '';
              }
              if($row['lmar_eimnciii_common6_1'] == '/' && $row['lmar_eimnciii_common6_2'] == '/' && $row['lmar_eimnciii_common6_3'] == '/' ){
                $rowc6_2 = '/';
              }
              else{
                $rowc6_2 = '';
              }




              if($row['lmar_eimnciii_core1_1'] == '/' && $row['lmar_eimnciii_core1_2'] == '/' && $row['lmar_eimnciii_core1_3'] == '/' && $row['lmar_eimnciii_core1_4'] == '/' ){
                $rowc1_3 = '/';
              }
              else{
                $rowc1_3 = '';
              }
              if($row['lmar_eimnciii_core2_1'] == '/' && $row['lmar_eimnciii_core2_2'] == '/' && $row['lmar_eimnciii_core2_3'] == '/'){
                $rowc2_3 = '/';
              }
              else{
                $rowc2_3 = '';
              }
              if($row['lmar_eimnciii_core3_1'] == '/' && $row['lmar_eimnciii_core3_2'] == '/'&& $row['lmar_eimnciii_core3_3'] == '/' && $row['lmar_eimnciii_core3_4'] == '/' ){
                $rowc3_3 = '/';
              }
              else{
                $rowc3_3 = '';
              }


                echo '<tr class="border-dark text-center" style="height: 14px; font-size:14px">';
                echo '<td class="p-0 text-start ps-1">'.$loop.")".$row['FirstName']." ".$row['LastName'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii1_3'].'</td>';
                echo '<td class="p-0">'.$rowc1.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii2_4'].'</td>';
                echo '<td class="p-0">'.$rowc2.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii3_4'].'</td>';  
                echo '<td class="p-0">'.$rowc3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii6_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii6_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii6_3'].'</td>';  
                echo '<td class="p-0">'.$rowc6.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii7_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii7_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii7_3'].'</td>';
                echo '<td class="p-0">'.$rowc7.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii8_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii8_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii8_3'].'</td>';
                echo '<td class="p-0">'.$rowc8.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii9_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii9_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_basic_nciii9_3'].'</td>';  
                echo '<td class="p-0">'.$rowc9.'</td>'; 
                


                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common1_4'].'</td>';
                echo '<td class="p-0">'.$rowc1_2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2_2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common3_4'].'</td>';
                echo '<td class="p-0">'.$rowc3_2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common4_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common4_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common4_3'].'</td>';
                echo '<td class="p-0">'.$rowc4_2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common5_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common5_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common5_3'].'</td>';
                echo '<td class="p-0">'.$rowc5_2.'</td>';

                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common6_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common6_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_common6_3'].'</td>';
                echo '<td class="p-0">'.$rowc6_2.'</td>';


                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core1_4'].'</td>';

                echo '<td class="p-0">'.$rowc1_3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core2_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core2_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core2_3'].'</td>';
                echo '<td class="p-0">'.$rowc2_3.'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_1'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_2'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_3'].'</td>';
                echo '<td class="p-0" style="background-color:#2f9cf0;">'.$row['lmar_eimnciii_core3_4'].'</td>';
                echo '<td class="p-0">'.$rowc3_3.'</td>';



                echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>
    </div>

  </div>




