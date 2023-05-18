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
  $_SESSION['qualicode'] = $qrow['qualification_code'];

}




// $declarationcount = 25;


require('../link/header.html');
?>

<link rel="stylesheet" href="../css/tipattendance.css">

    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
 
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" media="print" href="print.css" />

    <style>

  


      ::-webkit-scrollbar {
    display: none;
    }
    

    
    @page { 
      size : landscape A4;

    }


    


     
       
    @media print {
        body * {
          display: none;

        }
        
        
        #printcertbasic, #printcertbasic * {
          display: inline-block;
          padding: 1rem;

        }
        #printcertcommon, #printcertcommon * {
          display: inline-block;
          padding: 1rem;

        }

        #printcertcore1, #printcertcore1 * {
          display: inline-block;
          padding: 1rem;

        }
        #printcertcore2, #printcertcore2 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertcore3, #printcertcore3 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertcore4, #printcertcore4 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertcore5, #printcertcore5 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertcore6, #printcertcore6 * {
          display: inline-block;
          padding: 1rem;
        }

        #printcertelective1, #printcertelective1 * {
          display: inline-block;
          padding: 1rem;
        }
        #printcertelective2, #printcertelective2 * {
          display: inline-block;
          padding: 1rem;
        }



      } 





    tr{
        height: 10px;
    }



    </style>



    </head>
<body>

<?php 



  require('./qualification_certification.php');






?>


 

  <div class="row" style="height:100vh;">
    <div class="col-2 pe-0">
    <?php 
    require('../link/navbar.php');
  ?>
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
                class="p-1"
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

                    echo '<p class="me-4 mt-3 text-white myf-custome6-font">'.$session_name.'</p>'; ?>
       
              


              <a
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
              <img
              src="profilepicture/<?=$row['trainer_profile']?>"
              class="rounded-circle"
              height="30"
              loading="lazy"
              style="background-color: #fff;"
            />

           <?php } ?>
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
              <li>
                  <a class="dropdown-item" href="./trainersprofile.php">My profile</a>
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
            class="table table-responsive align-middle bg-transparent table-striped table-hover rounded"
          >
            <caption
              class="caption-top border border-2 border-bottom-0 rounded-top bg-light opacity-100 py-2 ps-2"
            >
            <div class="navbar navbar-primary shadow-0 py-0">
              <div class="container-fluid">
                <div class="row">
                <p
                  class="myf-custome6-font text-primary h4 pt-1"
                  
                  >Print Certificate</p
                >
                </div>
                <div class="ms-5 my-2 d-flex w-auto gap-3">
        
                <button class="btn text-white" style="background-color: #334a8bd0;" id="printcertbasicbtn"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Basic </button>
                <button class="btn text-white" style="background-color: #334a8bd0;" id="printcertcommonbtn"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Common </button>

                <?php 
                
                $certificatequery = "SELECT * FROM certification WHERE certification_qualification = '$sessionqualification' ";
                $certificationsql = mysqli_query($connection,$certificatequery);
                $coreloop = '1';
                while($crow = mysqli_fetch_array($certificationsql)){
                  if($crow['certification_competencies'] != 7 && $crow['certification_competencies'] != 8){
                  ?>  
                  
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="printcertcore<?=$coreloop?>btn"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Core <?=$coreloop?></button>
               <?php $coreloop ++;

               }
               else {

               }} 


               
               
               $electivequery = "SELECT * FROM certification WHERE certification_qualification = '$sessionqualification' ";
               $electivensql = mysqli_query($connection,$electivequery);
               $electiveloop = '1';
               while($erow = mysqli_fetch_array($electivensql)){
                 if($erow['certification_competencies'] == '7' || $erow['certification_competencies'] == '8'){
     
               
               ?>
              <button class="btn text-white" style="background-color: #334a8bd0;" id="printcertelective<?=$electiveloop?>btn"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Elective <?=$electiveloop?></button>
               <?php $electiveloop ++;

               }
               else {

               }}?>

                 
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
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="setnewdatebtn"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Insert New Date </button>
                  </div>
                  <form class="d-flex input-group w-auto" method="post">
                    <div class="input-group">
                      <div class="form-outline">
                      <input type="search" id="searchtrainees" name="searching" class="form-control" />
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

            <thead class="rounded-1 table-responsive" style="background-color: #334a8bd0;">
              <tr>
                <th class="text-white">Fullname</th>
                <th class="text-white">Qualification</th>
                <th class="text-white" style="width:10%;">Basic</th>
                <th class="text-white" style="width:10%;">Common</th>
                
               <?php 
                
                $tablequery = "SELECT * FROM certification WHERE certification_qualification = '$sessionqualification' ";
                $tablesql = mysqli_query($connection,$tablequery);
                $tbcoreloop = '1';
                while($tcrow = mysqli_fetch_array($tablesql)){
                  if($tcrow['certification_competencies'] != 7 && $tcrow['certification_competencies'] != 8){
                  ?>  
                  <th class="text-white text-center">Core <?= $tbcoreloop ?></th>
               <?php $tbcoreloop ++;

               }
               else {

               }} 


        
               
               $tbelectivequery = "SELECT * FROM certification WHERE certification_qualification = '$sessionqualification' ";
               $tbelectivensql = mysqli_query($connection,$tbelectivequery);
               $tbelectiveloop = '1';
               while($tbrow = mysqli_fetch_array($tbelectivensql)){
                 if($tbrow['certification_competencies'] == '7' || $tbrow['certification_competencies'] == '8'){

               ?>
               <th class="text-white text-center">Elective <?= $tbelectiveloop ?></th>
               <?php $tbelectiveloop ++;

               }
               else {

               }}?>

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

    
    <input type="hidden" id="qualification" value="<?=$sessionqualification ?>">
 


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


    <div class="modal fade" id="dateinsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">

            

          <div
                class="modal-header py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <span
              class="text-white float-start fw-bold"
              style="font-size: 15px"
              ><img src="../img/TESDA-Logo.png" width="30px" alt="" />
              Regional Training Center Central Luzon</span
            >
    
 
              </div>
              <div class="modal-body" id="data_detail" style="background-color: rgb(217 217 217 / 75%);">
              <div class="col-12">

                   <div class="mb-3">
                    <input type="date" class="form-control" id="datecert" placeholder="Insert the Date">
                  </div>
                  
               </div>



               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="insertdatebtn">Update Date</button>
              </div>

            </div>
          </div>
          </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <!-- <script src="../javascript/printcertification.js"></script> -->
    <script>
    $(document).ready(function(){


  var qualificationcert = $('#qualification').val();
      
      $('#printcertbasic').hide();
      $('#printcertcommon').hide();
      $('#printcertcore1').hide();
      $('#printcertcore2').hide();
      $('#printcertcore3').hide();
      $('#printcertcore4').hide();
      $('#printcertcore5').hide();
      $('#printcertcore6').hide();
      $('#printcertelective1').hide();
      $('#printcertelective2').hide();






    $('body').click(function(){

      $('#printcertbasic').hide();
      $('#printcertcommon').hide();
      $('#printcertcore1').hide();
      $('#printcertcore2').hide();
      $('#printcertcore3').hide();
      $('#printcertcore4').hide();
      $('#printcertcore5').hide();
      $('#printcertcore6').hide();
      $('#printcertelective1').hide();
      $('#printcertelective2').hide();

      
    })

    $('#setnewdatebtn').on('click',function(){
      $('#dateinsert').modal('show');
      

    })

    $('#insertdatebtn').on('click',function(){
      var datecert=$('#datecert').val();
      $.ajax({
        url:'printcertificationconnection.php',
          method:'post',
          data:{
            datecert:datecert,
          },
          success:function(res){
            window.location.href ='http://localhost/DocumentationSystem/php/printcertification.php'
          }

      })
    })


    
    

    
    $('#printcertbasicbtn').on('click',function(){
      $('#printcertbasic').show();
      
      window.print();

    })

    $('#printcertcommonbtn').on('click',function(){
      $('#printcertcommon').show();
      window.print();

    })
    



    
    $('#printcertcore1btn').on('click',function(){
      $('#printcertcore1').show();
      window.print();

    })
    $('#printcertcore2btn').on('click',function(){
      $('#printcertcore2').show();
      window.print();

    })
    $('#printcertcore3btn').on('click',function(){
      $('#printcertcore3').show();
      window.print();

    })
    $('#printcertcore4btn').on('click',function(){
      $('#printcertcore4').show();
      window.print();

    })
    $('#printcertcore5btn').on('click',function(){
      $('#printcertcore5').show();
      window.print();

    })
    $('#printcertcore6btn').on('click',function(){
      $('#printcertcore6').show();
      
      window.print();

    })

    $('#printcertelective1btn').on('click',function(){
      $('#printcertelective1').show();
      window.print();

    })
    $('#printcertelective2btn').on('click',function(){
      $('#printcertelective2').show();
      window.print();

    })

        qualification(1);
        pagination();
        
        let lastPage = 1;
        let pageNum;
        let student_count;
    
    
        let pagehigh;
        let pagelow;
          
    
        let pagedivlast = 5;
        let pagedivfirst = 1;
    
        var firstname = '';
    
    var my_date_format = function(input){
    var d = new Date(Date.parse(input.replace(/-/g, "/")));
    var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
    var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
    return (date + " " + time);  
               }
    
    function qualification(page) {
    $.ajax({ 
     url: "printcertificationconnection.php?page=" + page,
     method: "GET",
     success: function (res) {
      console.log(res)
  
       if(res == 2){
             
       $("#table_body").html(`<tr class="table-active">
       <td colspan="6" class="text-center"> No Record Found </td>
       </tr>`);
    
       }
       else{
       let certs = JSON.parse(res);
    
    
       let rows = "";
       for (cert of certs) {

        var basic = '';
        var common = '';
        var core1 = '';
        var core2 = '';
        var core3 = '';
        var core4 = '';
        var core5 = '';
        var core6 = '';




        if(cert.basic == '1'){
          basic = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          basic = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.common == '1'){
          common = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          common = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core1 == '1'){
          core1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core2 == '1'){
          core2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core3 == '1'){
          core3 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core3 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core4 == '1'){
          core4 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core4 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core5 == '1'){
          core5 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core5 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core6 == '1'){
          core6 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core6 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.elective1 == '1'){
          elective1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }

        if(cert.elective2 == '1'){
          elective2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }


   
          rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
       
          <td>${cert.LastName}, ${cert.FirstName} ${cert.MiddleName[0]}.  </td>
          <td>${cert.Qualification_Program_Title}</td>
          <td class="ps-4" style="width:10%;">${basic}</td>
          <td class="ps-4" style="width:10%;">${common}</td>


          `;
      <?php
          $tablequery = "SELECT COUNT(certification_id) as total FROM certification WHERE certification_qualification = '$sessionqualification' AND  certification_competencies != '7' AND  certification_competencies != '8' ";
        $tablesql = mysqli_query($connection,$tablequery);
        if(mysqli_num_rows($tablesql) > 0){
            $crow = mysqli_fetch_assoc($tablesql); 
            $_SESSION['corecount'] = $crow["total"];
            
            
          $loops = 1;
        } 

        $eltablequery = "SELECT COUNT(certification_id) as eltotal FROM certification WHERE certification_qualification = '$sessionqualification' AND certification_competencies = 7 OR certification_competencies = 8  ";
        $etablesql = mysqli_query($connection,$eltablequery);
        if(mysqli_num_rows($etablesql) > 0){
            $elrow = mysqli_fetch_assoc($etablesql); 
            $_SESSION['electivecount'] = $elrow["eltotal"];

            
            
          $elloops = 1;
        } 
          while($loops <= $_SESSION['corecount']){ ?>
  

            rows += `
          <td class="text-center">${core<?=$loops?>}</td>`


          
        <?php $loops++; } ?>

        console.log('roar' + <?= $_SESSION['electivecount'] ?>)


        if(<?= $_SESSION['electivecount'] ?> == '2'){
          console.log('rrrrrrr')

        <?php

        while($elloops <= $_SESSION['electivecount']){ ?>
          

          rows += `
        <td class="text-center">${elective<?=$elloops?>}</td>`



        <?php $elloops++; } 



?>
        }
        else{
          
        }
        rows += ` </tr>`
        

        }

        $("#table_body").html(rows);

        $('#searchtrainees').on('keyup',function(){
          var search = $('#searchtrainees').val()
          console.log(search)
          $.ajax({
            url: "printcertificationconnection.php",
            method: "post",
            data: {
              search: search,
            },
            success: function (res) {
              console.log(res)



       if(res == 2){
             
       $("#table_body").html(`<tr class="table-active">
       <td colspan="6" class="text-center"> No Record Found </td>
       </tr>`);
    
       }
       else if (search == ''){
    window.location.href ='printcertification.php'
    console.log('s')
   }
       else{
       let certs = JSON.parse(res);
    
    
       let rows = "";
       for (cert of certs) {

        var basic = '';
        var common = '';
        var core1 = '';
        var core2 = '';
        var core3 = '';
        var core4 = '';
        var core5 = '';
        var core6 = '';




        if(cert.basic == '1'){
          basic = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          basic = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.common == '1'){
          common = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          common = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core1 == '1'){
          core1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core2 == '1'){
          core2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core3 == '1'){
          core3 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core3 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core4 == '1'){
          core4 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core4 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core5 == '1'){
          core5 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core5 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core6 == '1'){
          core6 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core6 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.elective1 == '1'){
          elective1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }

        if(cert.elective2 == '1'){
          elective2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }


   
          rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
       
          <td>${cert.LastName}, ${cert.FirstName} ${cert.MiddleName[0]}.  </td>
          <td>${cert.Qualification_Program_Title}</td>
          <td class="ps-4" style="width:10%;">${basic}</td>
          <td class="ps-4" style="width:10%;">${common}</td>


          `;
      <?php
          $tablequery = "SELECT COUNT(certification_id) as total FROM certification WHERE certification_qualification = '$sessionqualification' AND  certification_competencies != '7' AND  certification_competencies != '8' ";
        $tablesql = mysqli_query($connection,$tablequery);
        if(mysqli_num_rows($tablesql) > 0){
            $crow = mysqli_fetch_assoc($tablesql); 
            $_SESSION['corecount'] = $crow["total"];
            
            
          $loops = 1;
        } 

        $eltablequery = "SELECT COUNT(certification_id) as eltotal FROM certification WHERE certification_qualification = '$sessionqualification' AND certification_competencies = 7 OR certification_competencies = 8  ";
        $etablesql = mysqli_query($connection,$eltablequery);
        if(mysqli_num_rows($etablesql) > 0){
            $elrow = mysqli_fetch_assoc($etablesql); 
            $_SESSION['electivecount'] = $elrow["eltotal"];

            
            
          $elloops = 1;
        } 
          while($loops <= $_SESSION['corecount']){ ?>
  

            rows += `
          <td class="text-center">${core<?=$loops?>}</td>`


          
        <?php $loops++; } ?>

        console.log('roar' + <?= $_SESSION['electivecount'] ?>)


        if(<?= $_SESSION['electivecount'] ?> == '2'){
          console.log('rrrrrrr')

        <?php

        while($elloops <= $_SESSION['electivecount']){ ?>
          

          rows += `
        <td class="text-center">${elective<?=$elloops?>}</td>`



        <?php $elloops++; } 



?>
        }
        else{
          
        }
        rows += ` </tr>`
        

        }

        $("#table_body").html(rows);


       

       $('.update_data').on('click',function(){
        var trainessid = $(this).attr('id');
        var ups = $(this);
        console.log(trainessid)
        


        let update = 'update';
        $.ajax({
          url: 'printaction.php',
          method :'post',
          data : {
            update:update,
            trainessid:trainessid,
          },

          success:function(res){
            $('#updateModal').modal('show')
            console.log(res)  
           


     
            let viewtrs = JSON.parse(res)
                  let rows = "";     
                  for(viewtr of viewtrs){
                    var middle = viewtr.MiddleName[0];
                    if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                    
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>


                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom">Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else{
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                     
                      
                    }
                    $('#update_detail').html(rows)
                    var com1 = ''; 
                    var com2 = ''; 
                    var com3 = ''; 

                    $('#updatecom').on('click',function(){
                      var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com1 = '1'
                      }
                      else{
                        com1 = '0'
                      }
                
                      var isChecked = $('.myCheckbox2').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com2 = '1'
                      }
                      else{
                        com2 = '0'
                      }
                      var isChecked = $('.myCheckbox3').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com3 = '1'
                      }
                      else{
                        com3 = '0'
                      }
                      console.log(com1)
                      console.log(com2)
                      console.log(com3)
                      console.log(trainessid)

                      let edit = 'edit';
                      $.ajax({
                        url:'printaction.php',
                        method:'post',
                        data:{
                          edit:edit,
                          trainessid:trainessid,
                          com1:com1,
                          com2:com2,
                          com3:com3,
                 
                        },
                        success:function(editres){
                          console.log(editres)
                          let editrs = JSON.parse(editres)
                          console.log(editrs[0])
                          editrs1 = editrs[0]
                          editrs2 = editrs[1]
                          editrs3 = editrs[2]
                          $('#updateModal').modal('hide')
                          $('.success').toast('show');

                          if (editrs1 == 1){
                            ups.parent().siblings().eq(3).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(3).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs2 == 1){
                            ups.parent().siblings().eq(4).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(4).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs3 == 1){
                            ups.parent().siblings().eq(5).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(5).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

               
                     

                        }
                      })




                    })
            
          }

        })







     
      })
    
    
    }   

















              }
              })
              })

       

       $('.update_data').on('click',function(){
        var trainessid = $(this).attr('id');
        var ups = $(this);
        console.log(trainessid)
        


        let update = 'update';
        $.ajax({
          url: 'printaction.php',
          method :'post',
          data : {
            update:update,
            trainessid:trainessid,
          },

          success:function(res){
            $('#updateModal').modal('show')
            console.log(res)  
           


     
            let viewtrs = JSON.parse(res)
                  let rows = "";     
                  for(viewtr of viewtrs){
                    var middle = viewtr.MiddleName[0];
                    if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                    
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>


                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom">Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else{
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                     
                      
                    }
                    $('#update_detail').html(rows)
                    var com1 = ''; 
                    var com2 = ''; 
                    var com3 = ''; 

                    $('#updatecom').on('click',function(){
                      var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com1 = '1'
                      }
                      else{
                        com1 = '0'
                      }
                
                      var isChecked = $('.myCheckbox2').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com2 = '1'
                      }
                      else{
                        com2 = '0'
                      }
                      var isChecked = $('.myCheckbox3').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com3 = '1'
                      }
                      else{
                        com3 = '0'
                      }
                      console.log(com1)
                      console.log(com2)
                      console.log(com3)
                      console.log(trainessid)

                      let edit = 'edit';
                      $.ajax({
                        url:'printaction.php',
                        method:'post',
                        data:{
                          edit:edit,
                          trainessid:trainessid,
                          com1:com1,
                          com2:com2,
                          com3:com3,
                 
                        },
                        success:function(editres){
                          console.log(editres)
                          let editrs = JSON.parse(editres)
                          console.log(editrs[0])
                          editrs1 = editrs[0]
                          editrs2 = editrs[1]
                          editrs3 = editrs[2]
                          $('#updateModal').modal('hide')
                          $('.success').toast('show');

                          if (editrs1 == 1){
                            ups.parent().siblings().eq(3).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(3).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs2 == 1){
                            ups.parent().siblings().eq(4).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(4).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs3 == 1){
                            ups.parent().siblings().eq(5).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(5).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

               
                     

                        }
                      })




                    })
            
          }

        })







     
      })
    
    
    }   
    
    
    
     },
    });
    }


    function pagination() {
      $.ajax({
          url: 'trainesscount.php',
          method: 'GET',
          success: function (result) {
              pageNum = result / 10;
              pageNum = Math.ceil(pageNum);
              student_count = result;
   
              pagelow = Math.min(pageNum,pagedivfirst);
              pagehigh = Math.min(pageNum,pagedivlast);
   
   
              let pages = "";
   
              for (let i = pagelow; i <= pagehigh; i++) {
                  pages += `<li class="page-item " id="page-${i}"> <a class="page-link" href="#">${i}</a></li>`;
                  console.log(pagehigh);
                  console.log(pagelow);
                  
              }
              
              
              if(pagehigh == pageNum) {
                  $('#nextPage').hide()
   
              }
               if (pagehigh != pageNum){
                  $('#nextPage').show()
                 
              }
               if (pagelow == 1){
                  $('#prevPage').hide()
                  
               }
               if (pagelow != 1){
                  $('#prevPage').show()
                  
                  
              }
              $('.page-list').first().next().after(pages);
          }
   
      
      })
   
   }
   
   
   
   $('ul').on('click', 'li', function (e) {
      let page = $(this).text().trim();
   
      if (page == 'Previous'){
          lastPage--;
   
          if (lastPage >= 1){
            qualification(lastPage);
   
              if (pagelow > lastPage) {
                  pagedivlast-=5;
                  pagedivfirst-=5;
   
   
                for (let p = pagelow; p <= pagehigh; p++) {
                  $("#page-"+p).hide();
                }
   
                pagination(pagedivfirst,pagedivlast);
   
              }
          }
   
          else {
              lastPage++;
          }
   
          $('.page-item').removeClass('active');
          $('#page-'+lastPage).addClass('active');
      }
   
      else if (page == 'Next'){
   
          lastPage++;
          
          if (lastPage <= pageNum){
           
            qualification(lastPage);
              $('.page-item').removeClass('active');
   
              if (pagehigh < lastPage) {
                pagedivlast+=5;
                pagedivfirst+=5;
   
                for (let n = pagelow; n <= pagehigh; n++) {
                      $("#page-"+n).hide();
                    }
                 pagination(pagedivfirst,pagedivlast);
                  }
          }
   
          else {
              lastPage--;
   
          }
   
          $('.page-item').removeClass('active');
          $('#page-'+lastPage).addClass('active');
      }
      else if (page == '>'){
        lastPage++;
        pagedivfirst += 5;
        pagedivlast += 5;
   
          for (let x = pagelow; x <= pagehigh; x++) {
            $("#page-"+x).hide();
          }
          if (lastPage <= pageNum){
            qualification(pagehigh+1);
              pagination(pagedivfirst,pagedivlast);
   
            }
          else {
            lastPage--;
          }
          $('.page-item').removeClass('active');
            $('#page-'+lastPage).addClass('active');
   
      }
      else if (page == '<'){
        lastPage--;
        pagedivfirst -= 5;
        pagedivlast -= 5;
   
          for (let y = pagelow; y <= pagehigh; y++) {
            $("#page-"+y).hide();
          }
          if (lastPage <= pageNum){
            qualification(pagelow-5);
              pagination(pagedivfirst,pagedivlast);
   
   
            }
          else {
            lastPage--;
          }
          $('.page-item').removeClass('active');
          $('#page-'+lastPage).addClass('active');
            //$('#page-'+lastPage).addClass('active').siblings().removeClass('active');
   
      }
   
      else {
          lastPage = page;
          qualification(page);
          $(this).addClass('active').siblings().removeClass('active');
      }
   });

   
   $('#import').on('click',function(){
    $('#csvselection').modal('show')
})





$('#importing').on('submit',function(){
  $.ajax({
    url: "./php/importcsv.php",
    method: "post",
    data:
    new FormData(this),
    dataType: "json",
    contentType: false,
    cache: false,
    processData: false,

    success: function (importsuccess) {
      console.log(importsuccess)
      // if (importsuccess == 1) {
      //   window.location.href = "php/tipattendance.php";

      // } 
      // else if(importsuccess == 2){

      //   console.log('probleminimporting')

      // }
      // else {
      //   console.log('probleminimporting')

      // }
    },
  });
})
    $('#dropdown_logout').on('click',function(){
      $('#logoutModal').modal('show');
    })

$('#logouts').on('click',function(){
  $.ajax({
      url: "logout.php",
      success: function(data){
        if(data == 1){
             window.location.href ='http://localhost/DocumentationSystem/index.php'
        }
      }
    })
})

   
   
   

        
    
    
  })
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>