
<div class="row number mb-3 mt-1" style="height:100vh">
    <?php

        $id = $_SESSION['id']; 
        $qualification = $_SESSION['choosecourse'];
        $batch = $_SESSION['batch'];

        $datestartquery = "SELECT * FROM batch_list WHERE batch_id = '$batch' ";
        $datestartsql = mysqli_query($connection,$datestartquery);

        while($dsrow = mysqli_fetch_array($datestartsql)){
            $ds=date_create($dsrow['date_start']);
            $_SESSION['datestart'] =  date_format($ds,"F d Y");
            $scholar = $dsrow['scholarship_program'];

            if($scholar == ''){
                $_SESSION['scholarship_program'] = '(TESDA Scholarship Program)';
            }
            else{
                $_SESSION['scholarship_program'] = $scholar;
            }
            

        }

   
        $trainer_details_query = "SELECT * FROM trainer_account WHERE trainer_id = '$id'  ";
        $trainer_details_sql = mysqli_query($connection,$trainer_details_query);  
        while($trainer_details_row = mysqli_fetch_array($trainer_details_sql)){ ?>
            <div class="row ms-2 m-0">
                        
        <div class="col-1 offset-2 me-3">
            <img src="../img/tesdamainlogo.png" width="80px" alt="">
        </div>
        <div class="col-5 mt-2 text-center">
        <div class="row">
                <span style="font-size:12px;">Republic of the Philippines</span>
            </div>
  
            <div class="row" style="margin-top:-5px;">
                <span style="font-weight:bold; font-size:12px;">Technical Education and Skills Development Authority</span>
            </div>
            <div class="row" style="margin-top:-5px;">
                <span style="font-size:12px; font-weight:bold; padding-left:-20px;">Regional Training Center Central Luzon- Guiguinto</span>
            </div>
            <div class="row mt-1" style="font-weight: bold;">
                <span style="font-size:12px; padding-left:-20px;">
            TRAINEES'/LEARNERS'ATTENDANCE SHEET</span>
            </div>
            <!-- <div class="row" style="margin-top:-3px; font-weight: bold;">
                <span style="font-size:12px; padding-left:-20px;">TRAINING FOR WORK SCHOLARSHIP PROGRAM</span>
            </div> -->
            <div class="row" style="margin-top:-3px; font-weight: bold;">
                <span style="font-size:12px; padding-left:-20px;">_____________________________________________________</span>
            </div>


            <div class="row" style="margin-top:-8px; font-weight: bold;">
            <em><span style="font-size:11px; padding-left:-20px;"><?= $_SESSION['scholarship_program']; ?></span></em>

            </div>
        </div>
        <div class="col-1 me-3 mt-1">
            <img src="../img/rttcl_logo.png" width="70px" alt="">
        </div>


        <div class="col-3"></div>
            </div>
              
            
    
            <div class="row d-flex">
                
                <div class="col-6">
               
                <span style="font-size:11px; padding-left:-20px;">Name of TVI:<u><span style="font-size:11px; padding-left:-20px; font-weight: bold;"> Regional Training Center Central Luzon-Guiguinto </span></u></span>

                </div>
                <div class="col-6 d-flex ps-5">

                <?php 
                        $trainer_qualification_query = "SELECT * FROM trainer_list_qualification 
                        LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification  = trainer_qualification.qualification_id WHERE trainer_qualification_list = '$id' AND selected_qualification = '$qualification'  " ;

                        $trainer_qualification_sql = mysqli_query($connection,$trainer_qualification_query);  
                        while($trainer_qualification_row = mysqli_fetch_array($trainer_qualification_sql)){
                        $_SESSION['nttcno'] = $trainer_qualification_row['trainer_list_nttcno'];
                        $_SESSION['qualification_hours'] = $trainer_qualification_row['qualification_hours'];
                        $vdate=date_create($trainer_qualification_row['validity_date']);
                        $_SESSION['validity_date'] =  date_format($vdate,"F d Y");
                        
                        
                        ?>

                <span style="font-size:11px; padding-left:-20px;">Qualification/Program:<u><span style="font-size:11px; padding-left:-20px; font-weight: bold;"> <?php echo $trainer_qualification_row['qualification_title']; ?></span></u></span>


                <?php } ?>
                </div>
                
            </div>

            <div class="row">

            <div class="col-3">


            <span style="font-size:11px; padding-left:-20px;">Date Start: &nbsp;<u style="font-weight: bold;"> &nbsp;&nbsp;&nbsp; <?= $_SESSION['datestart']; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </u></span>
          
          




            </div>
            <div class="col-3 text-end">
                <span style="font-size:11px; margin-left:25px;">Date End: __________________</span>
            </div>
            <div class="col-6 d-flex ps-5">
                <span style="font-size:11px; padding-left:-20px;">Duration (based on the approved CTPR) (No. of Training Hours): <u><span style="font-size:11px; padding-left:-20px; font-weight: bold;"><?= $_SESSION['qualification_hours']; ?></span></u></span>
            </div>
            </div>

            <div class="row d-flex">
                <div class="col-6">
                <span style="font-size:11px; padding-left:-20px;">Name of Trainer:<u><span style="font-size:11px ms-2; padding-left:-20px; font-weight: bold;"> <?php echo $trainer_details_row['trainer_firstname']." ".$trainer_details_row['trainer_middlename'][0]." ".$trainer_details_row['trainer_lastname']." ".$trainer_details_row['trainer_extensionname']; ?> &nbsp&nbsp</span></u></span>

                </div>
                <div class="col-6 d-flex ps-5">
                <span style="font-size:11px; padding-left:-20px;">NTTC No. : <u><span style="font-size:11px; padding-left:-20px; font-weight: bold;"> <?= $_SESSION['nttcno']; ?></span></u></span>
                <span style="font-size:11px; padding-left:20px;">Validity Date : <u><span style="font-size:11px; padding-left:-20px; font-weight: bold;"><?= $_SESSION['validity_date']?></span></u></span>

                </div>
                
            </div>

            <div class="row d-flex">
                <div class="col-6">
                <span style="font-size:11px; padding-left:-20px;">Date: _______________________________</span>
               
                </div>

                <div class="col-6 d-flex ps-5">
                <span style="font-size:11px; padding-left:-20px;">Location of Training:  <u><span style="font-size:11px; padding-left:-20px; font-weight: bold;"> RTCCL Compound, Mac Arthur Hi-way, Tabang, Guiguinto</span></u></span>

                </div>
                
            </div>


            <div class="row">
            
            <table class="table mt-1 border-dark table-bordered ms-1">
                <thead style="background-color:#D9D9D9;" class="border-dark">
                <tr class="border-dark" style="height: 13px; font-size:9px" >
                    <th class="p-0 text-center py-1" rowspan="2" style="font-size:9px;">#</th>
                    <th class="p-0 text-center py-1" rowspan="2" style="width:20%; font-size:9px;"><strong>NAME</strong></th>
                    <th class="p-0 text-center py-1" rowspan="2" style="width:12%; font-size:9px;">CONTACT NUMBER</th>
                    <th class="p-0 text-center py-1" rowspan="2" style="width:12%; font-size:9px;">EMAIL ADDRESS</th>
                    <th class="p-0 text-center py-1" colspan="4">Daily Log</th>


                    </tr>
                    <tr class="border-dark" style="height: 13px; font-size:9px" >

                    <th class="p-0 text-center">Time in</th>
                    <th class="p-0 text-center">Signature</th>
                    <th class="p-0 text-center">Time out</th>
                    <th class="p-0 text-center">Signature</th>


                    </tr>

                </thead>
                <tbody>

         <?php
    
            $printdetails_query = "SELECT * FROM attendance WHERE import_trainer_id = '$id' && import_qualification_id = '$qualification' && import_batch = '$batch' ";
            $printdetails_sql = mysqli_query($connection,$printdetails_query);                    
            

            $loop = 1;
            while($row = mysqli_fetch_array($printdetails_sql)){
                echo '<tr class="border-dark text-center" style="height: 13px; font-size:9px">';
                echo '<td class="p-0">'.$loop.'</td>';
                echo '<td class="p-0"></td>';
                echo '<td class="p-0"></td>';
                echo '<td class="p-0"></td>';
                echo '<td class="p-0"></td>';
                echo '<td class="p-0"></td>';
                echo '<td class="p-0"></td>';
                echo '<td class="p-0"></td>';

                echo '</tr>';
                $loop++;
            }

 
     
          ?>



                
                </tbody>
            </table>
            </div>
            <div class="row m-0">
                <div class="col-3">
                    <div class="row">
                        <span style="font-size:11px;">Prepared by:</span>
                    </div>
                    <div class="row mt-1">
                    <u><span style="font-size:11px; font-weight:bold;">&nbsp&nbsp&nbsp&nbsp <?php echo strtoupper($trainer_details_row['trainer_firstname']." ".$trainer_details_row['trainer_middlename']." ".$trainer_details_row['trainer_lastname']." ".$trainer_details_row['trainer_extensionname']);?> &nbsp&nbsp&nbsp&nbsp   </span></u>
                        
                    </div>
                    <div class="row mb-5" style="margin-left:40px;">
                        <span style="font-size:11px;">Trainer</span>
                        
                    </div>



                </div>
                <div class="col-3 offset-6">
                <div class="row">
                <span style="font-size:11px;">Noted by:</span>
                </div>
                <div class="row mt-2">
                <?php
$selectcc = "SELECT * FROM signatory WHERE sign_id = '1'";
$sqlcc = mysqli_query($connection,$selectcc);
while($cc = mysqli_fetch_array($sqlcc)){ ?>
                        <u><span style="font-size:11px; font-weight:bold;">&nbsp&nbsp&nbsp&nbsp  <?=$cc['sign_name']?>  &nbsp&nbsp&nbsp&nbsp</span></u>
                        <?php } ?>
                    </div>
                    <div class="row" style="margin-left:40px;">
                        <span style="font-size:11px;">Center Chief</span>
                        
                    </div>


                </div>
            </div>
            <?php } ?>
            </div>
