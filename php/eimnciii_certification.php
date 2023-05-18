<div class="row" class="" id="printcertemnciiicore1" height="100vh">
<?php

$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core1 = '1'" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Unit of Competency </span> No.1 Perform roughing-in and wiring activities for three-phase distribution system for power, lighting and motor control panel. <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php 
    if($day == 1 || $day == 21 || $day == 31){?>
    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>st day of October 2022 at TESDA RTCCL-Guiguinto, Bulacan</span>
    <?php } else if ($day == 2 || $day == 22) { ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>nd day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>


    <?php } else if($day == 3 || $day == 23){ ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>rd day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>


    <?php } else { ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>th day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>

    <?php } ?>
  
 
    
   
    
    </div> 

</div>

<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
<div class="row mt-3 fw-bold ms-5" style="font-size: 25px; padding-left:4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'] ." ". $namerow['trainer_lastname'] ) ?></div>
<?php } ?>
</div>

<?php } ?>


</div>



<div class="row" class="" id="printcertemnciiicore2" height="100vh">
<?php

$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core2 = '1'" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Unit of Competency </span> No.2 Perform installation of data measurement and control system on electrical and auxiliary equipment <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php 
    if($day == 1 || $day == 21 || $day == 31){?>
    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>st day of October 2022 at TESDA RTCCL-Guiguinto, Bulacan</span>
    <?php } else if ($day == 2 || $day == 22) { ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>nd day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>


    <?php } else if($day == 3 || $day == 23){ ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>rd day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>


    <?php } else { ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>th day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>

    <?php } ?>
  
 
    
   
    
    </div> 

</div>

<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
<div class="row mt-3 fw-bold ms-5" style="font-size: 25px; padding-left:4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'] ." ". $namerow['trainer_lastname'] ) ?></div>
<?php } ?>
</div>

<?php } ?>


</div>



<div class="row" class="" id="printcertemnciiicore3" height="100vh">
<?php

$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core3 = '1'" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Unit of Competency </span> No.3 Install wiring devices of floor and wall mounted outlets, lighting fixtures/switches, and auxiliary outlets<br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php 
    if($day == 1 || $day == 21 || $day == 31){?>
    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>st day of October 2022 at TESDA RTCCL-Guiguinto, Bulacan</span>
    <?php } else if ($day == 2 || $day == 22) { ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>nd day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>


    <?php } else if($day == 3 || $day == 23){ ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>rd day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>


    <?php } else { ?>

    <span class="p-1" style="font-weight:100;">Given this <?php echo $day?>th day of <?php echo $month." ".$year ?> at TESDA RTCCL-Guiguinto, Bulacan</span>

    <?php } ?>
  
 
    
   
    
    </div> 

</div>

<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
<div class="row mt-3 fw-bold ms-5" style="font-size: 25px; padding-left:4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'] ." ". $namerow['trainer_lastname'] ) ?></div>
<?php } ?>
</div>

<?php } ?>


</div>
