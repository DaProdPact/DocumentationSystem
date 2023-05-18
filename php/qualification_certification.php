
<div class="row" class="" id="printcertbasic" height="100vh">
<?php
$datenow = new DateTime("now");
$datenow = date('y');

date_default_timezone_set('Asia/Manila');   

$ds=date_create($_SESSION['datecertval']);
$_SESSION['datecertval'] =  date_format($ds,"F d Y");

$originalDate = $_SESSION['datecertval'];
$day= date("j", strtotime($originalDate));
$month= date("F", strtotime($originalDate));
$year= date("Y", strtotime($originalDate));



// $day = date('j');
// $month = date('F');
// $year = date('Y');

$loopings = 1;



$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND basic = '1' ORDER BY LastName ASC" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){

    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>

        <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the </span> Basic Competencies with 21st Century Skills <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
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
<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
   <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>BASIC-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>

</div>

<?php $loopings++; } ?>


</div>
<div class="row" class="" id="printcertcommon" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND common = '1' ORDER BY LastName ASC" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the</span> Common Competencies <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
   <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>COMMON-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>
</div>

<?php $loopings++; } ?>


</div>


<div class="row" class="" id="printcertcore1" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core1 = '1' ORDER BY LastName ASC " ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = '1' ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Core Competency </span> No.1 <?= $rowcert['certification_details']?><br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
   <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>CORE1-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>


</div>

<?php $loopings++; } ?>


</div>



<div class="row" class="" id="printcertcore2" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core2 = '1' ORDER BY LastName ASC" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = '2' ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Core Competency </span> No.2 <?=$rowcert['certification_details']?><br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
       <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>CORE2-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>


</div>

<?php $loopings++; } ?>


</div>



<div class="row" class="" id="printcertcore3" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core3 = '1' ORDER BY LastName ASC " ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = '3' ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Core Competency </span> No.3 <?=$rowcert['certification_details']?>
 <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
         <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>CORE3-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>


</div>

<?php $loopings++; } ?>


</div>

<div class="row" class="" id="printcertcore4" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core4 = '1' ORDER BY LastName ASC " ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = 4 ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Core Competency </span> No.4 <?=$rowcert['certification_details']?> <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
        <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>CORE4-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>



</div>

<?php $loopings++; } ?>


</div>

<div class="row" class="" id="printcertcore5" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core5 = '1' ORDER BY LastName ASC" ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = 5 ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Core Competency </span> No.5 <?=$rowcert['certification_details']?> <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
         <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>CORE5-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>


</div>

<?php $loopings++; } ?>


</div>

<div class="row" class="" id="printcertcore6" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND core6 = '1' ORDER BY LastName ASC " ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = 6 ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Core Competency </span> No.6 <?=$rowcert['certification_details']?> <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
     <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>CORE6-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>



</div>

<?php $loopings++; } ?>


</div>



<div class="row" class="" id="printcertelective1" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND elective1 = '1' ORDER BY LastName ASC " ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = '7' ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Elective Competency </span> No.1 <?=$rowcert['certification_details']?> <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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

<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
        <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>ELECTIVE1-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>



</div>

<?php $loopings++; } ?>


</div>
<div class="row" class="" id="printcertelective2" height="100vh">
<?php
$loopings = 1;
$printcertificatequery = "SELECT * FROM attendance WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch' AND elective2 = '1' ORDER BY LastName ASC " ;
$printcertificatesql = mysqli_query($connection,$printcertificatequery);  
while($row = mysqli_fetch_array($printcertificatesql)){
    ?>

    <div style="background-image: url('../img/certificate.png'); background-repeat: no-repeat;  background-size: 1125px 790px; height:800px;">
    <div class="row" style="height:220px;"></div>
    <div class="mt-5 ms-4 d-block" style="height:320px;"> 
    <div class="pt-5" style="font-family: Arial, Helvetica, sans-serif; font-size:45px; font-weight:bold; padding-left:6rem;"><?php echo $row['FirstName']." ".$row['LastName']  ?></div>
    <?php 
        $getdetails= "SELECT * FROM `certification` WHERE certification_qualification = '$sessionqualification' AND certification_competencies = '8' ";
        $getsql = mysqli_query($connection,$getdetails);  
        while($rowcert = mysqli_fetch_array($getsql)){ ?>
    <div class="pt-3" style="font-size:22px; font-family: Arial; padding-left:6rem; margin-top:-3rem; font-weight:bold;"><span class="p-0" style="font-weight:100;">for having demonstrated the Elective Competency </span> No.2 <?=$rowcert['certification_details']?> <br> <span class="p-0">(Leading to <?php echo $_SESSION['qualiname']; ?>)</span><br>
    
    <?php }
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
<div class="row w-100" style="height:3rem;">
<?php
$namequery = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
$namesql = mysqli_query($connection,$namequery);  
while($namerow = mysqli_fetch_array($namesql)){
    ?>
    <p class="fw-bold ms-5 text-decoration-underline" style="font-size: 25px; padding-left: 4.5rem;"><?php echo strtoupper($namerow['trainer_firstname'] ." ". $namerow['trainer_middlename'][0] .". ". $namerow['trainer_lastname']) ?></p>  
    <?php } ?>
</div>

<div class="row w-100">
<div class="col-5 offset-7" style="padding-left:4rem;">
<p class="text-dark fw-bold h4 myf-custome6-font" style="font-size:1rem;"><?php
$code = $_SESSION['qualicode'];
$codes = str_replace(' ', '', $code);
echo trim($codes)."".$datenow?>ELECTIVE2-<?=sprintf('%03d',$loopings);

?></p>

</div>

</div>

</div>
<?php $loopings++; } ?>
</div>