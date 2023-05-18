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
$basic = "SELECT * FROM `baisc_competencies` WHERE bc_qualification = '$sessionqualification'";
$basicsql = mysqli_query($connection,$basic);
while($basicrow = mysqli_fetch_array($basicsql)){ 
  $_SESSION['basic'] = $basicrow['bc_nc'];

}

$basiccompentencies = $_SESSION['basic'];




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
        size: A4 landscape;
      
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
  



      } 



    tr{
        height: 10px;
    }



    </style>



    </head>
<body>

<?php 

   require_once('./eimncii_basic.php'); 

?>


 </div>   

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

            <thead class="" style="background-color: #334a8bd0;">


              <tr>
                
                <th rowspan="2"  colspan="3" class="text-white text-center" style="font-size: 13px; width:80px;">Trainees</th>


                <?php 




                $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $selectsql = mysqli_query($connection,$selectquery);
                while($row = mysqli_fetch_array($selectsql)){ 
                  $unitid = $row['lmar_unit_id']
                  ?>
                      <th  colspan="<?=$row['lmar_unit_count'] ?>" class="text-white text-center p-0" style="font-size: 11px; width:50px"><?= $row['lmar_unit_name']; ?></th>
                <?php } ?>
              </tr>
              <tr>

              <?php 
             
                $loopelement = 1;
                $countquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
                $countsql = mysqli_query($connection,$countquery);
                while($crow = mysqli_fetch_array($countsql)){ 
                  $unitcount = $crow['lmar_unit_count'];
                  $loopcheck = 1;
                  while($loopcheck <= $unitcount){
                  ?>
                  
                  <th  colspan="1" class="text-white p-0 text-center fw-bold" style="font-size: 10px;  width:60px;"><?=$loopcheck?></th>      
                  <?php 
                  $loopcheck++;
                 } 
                 $loopcheck = 1;
                 } ?>
          

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
   
    <!-- <script src="../javascript/common_eimncii_progresschart.js"></script> -->
    <script>
 
 $(document).ready(function(){
  
  $('#printcertemncii_basic').hide();
  $('#printcertemncii_common').hide();
  $('#printcertemncii_core').hide();
  $('#printcertemncii_progresschart').hide();

  
$('body').click(function(){
  $('#printcertemncii_basic').hide();
    $('#printcertemncii_common').hide();
  $('#printcertemncii_core').hide();
  $('#printcertemncii_progresschart').hide();

})


// printcertemncii_basic
$('#print_basic').on('click',function(){
  $('#printcertemncii_basic').show();
  $('#printcertemncii_common').hide();
  $('#printcertemncii_core').hide();
  $('#printcertemncii_progresschart').hide();

  window.print();

  console.log('wow')

})


    qualification
    
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
let getbasic = 'getbasic'
$.ajax({ 
 url: "connection_progresschart_eimncii.php?page=" + page,
 method: "GET",
 data:{
  getbasic:getbasic,
 },
 success: function (res) {
   console.log(res);
 

   if(res == 2){
         
   $("#table_body").html(`<tr class="table-active">
   <td colspan="6" class="text-center"> No Record Found </td>
   </tr>`);

   }
   else{
   let certs = JSON.parse(res);


   let rows = "";
   for (cert of certs) {


    console.log(cert.attendance_id);

    rows += `<tr class="table-active p-0 update_data" style="height: 9px; width:90px; font-size:11px; "id="${cert.attendance_id}">
     <td colspan="3 fw-bold">${cert.FirstName} ${cert.MiddleName[0]}. ${cert.LastName} </td>`;
     <?php
     $loopelement = 1;
     $loopunit = 1;

      $getquery = "SELECT * FROM `lmar_unit_competencies` WHERE  lmar_unit_comp = '$basiccompentencies' ";
      $getsql = mysqli_query($connection,$getquery);
      while($grow = mysqli_fetch_array($getsql)){ 
        $getunitcount = $grow['lmar_unit_count'];
        $getloopcheck = 1;
        while($getloopcheck <= $getunitcount){
        ?>
         rows += `
        <td  colspan="1" class="text-black p-0 text-center fw-bold" style="font-size: 10px; width:60px;">${cert.lmar_basic<?php echo $loopunit?>_<?php echo $getloopcheck?>}</td>`;
        <?php 
        $getloopcheck++;
        } 
        $getloopcheck = 1;
        $loopunit++;
        }?>
           


    rows += `</tr>`;

    }

   $("#table_body").html(rows);


   $('#searchtrainees').on('keyup',function(){
      var search = $('#searchtrainees').val()
      console.log(search)
      let basicsearch = 'basicsearch'
      $.ajax({
        url: "connection_progresschart_eimncii.php",
        method: "post",
        data: {
          search: search,
          basicsearch:basicsearch
        },
        success: function (res) {
          console.log(res)
   if(res == 2){
         
   $("#table_body").html(`<tr class="table-active">
   <td colspan="6" class="text-center"> No Record Found </td>
   </tr>`);

   }
   else if (search == ''){
    window.location.href ='basic_eimncii_progresschart.php'
    console.log('s')
   }
   else{
   let certs = JSON.parse(res);


   let rows = "";
   for (cert of certs) {


    console.log(cert.attendance_id);

    rows += `<tr class="table-active p-0 update_data" style="height: 9px; width:90px; font-size:11px; "id="${cert.attendance_id}">
     <td colspan="3 fw-bold">${cert.FirstName} ${cert.MiddleName[0]}. ${cert.LastName} </td>`;
     <?php
     $loopelement = 1;
     $loopunit = 1;

      $getquery = "SELECT * FROM `lmar_unit_competencies` WHERE  lmar_unit_comp = '$basiccompentencies' ";
      $getsql = mysqli_query($connection,$getquery);
      while($grow = mysqli_fetch_array($getsql)){ 
        $getunitcount = $grow['lmar_unit_count'];
        $getloopcheck = 1;
        while($getloopcheck <= $getunitcount){
        ?>
         rows += `
        <td  colspan="1" class="text-black p-0 text-center fw-bold" style="font-size: 10px; width:60px;">${cert.lmar_basic<?php echo $loopunit?>_<?php echo $getloopcheck?>}</td>`;
        <?php 
        $getloopcheck++;
        } 
        $getloopcheck = 1;
        $loopunit++;
        }?>
           


    rows += `</tr>`;

    }

   $("#table_body").html(rows);







   $('.update_data').on('click',function(){
    var trainessid = $(this).attr('id');
    console.log(trainessid)


    let basicupdate = 'basicupdate';
    $.ajax({
      url: 'connection_progresschart_eimncii.php',
      method :'post',
      data : {
        basicupdate:basicupdate,
        trainessid:trainessid,
      },success:function(response){
        console.log(response)
        let data = "";

        let trainess = JSON.parse(response);
        for (trainee of trainess){
          
        
        $('#updateModal').modal('show')
    
   

  
        data += `<div class="modal-header p-2 px-3">

        <h5 class="modal-title text-primary" id="exampleModalLabel">  Basic Competencies</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


  
      <div class="form-check form-check-inline d-flex row bg-primary rounded-1 ms-2 sticky-top ps-3 py-2 rounded-3">
      <div class="col-11 pt-1">
      <p class="text-white fw-bold" style="font-size:25px;">${trainee.FirstName} ${trainee.MiddleName[0]} ${trainee.LastName}</p>
      </div>
      <div class="col-1 ps-3 pt-1 justify-content-end">
      <input class="form-check-input p-2 checkall" type="checkbox" style="height:30px; width:30px;"/>
      </div>
      </div>


    `
          <?php 
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
            data += `
            <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
            <div class="col-11 pt-1">
            <p class="text-primary fw-bold bg-secondary" style="font-size:20px;"><?= $row['lmar_unit_name']; ?></p>	
            </div>
            <div class="col-1 ps-3 pt-1 justify-content-end">
            <input class="form-check-input p-2 checkall<?=$loopcheck?>" type="checkbox" style="height:30px; width:30px;"/>
            </div>

          

            </div>`;
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          data += `
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_basic<?=$loopcheck?>_<?=$loopelement?>" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1"> <?= $crow['lmar_element_name']; ?></label>
          </div>
  
          <br>
          `
            
          <?php
          $loopelement++;
         } 
         $loopelement = 1;
        $loopcheck++;  
        }
          ?>
          data += `
       



      </div>

      



  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
  </div>`
  



      }

  $("#update_detail").html(data);

  var checkall = $('.checkall'); 

  checkall.on('change',function(){

    if (this.checked) {
      $('.checkall1').prop("checked", true);
      $(".lmar_basic1_1").prop("checked", true);
      $(".lmar_basic1_2").prop("checked", true);
      $(".lmar_basic1_3").prop("checked", true);
      $(".lmar_basic1_4").prop("checked", true);
      $(".lmar_basic1_5").prop("checked", true);
      $(".lmar_basic1_6").prop("checked", true);
      $(".lmar_basic1_7").prop("checked", true);
      $(".lmar_basic1_8").prop("checked", true);



      $('.checkall2').prop("checked", true);
      $(".lmar_basic2_1").prop("checked", true);
      $(".lmar_basic2_2").prop("checked", true);
      $(".lmar_basic2_3").prop("checked", true);
      $(".lmar_basic2_4").prop("checked", true);
      $(".lmar_basic2_5").prop("checked", true);
      $(".lmar_basic2_6").prop("checked", true);
      $(".lmar_basic2_7").prop("checked", true);
      $(".lmar_basic2_8").prop("checked", true);

      $('.checkall3').prop("checked", true);
      $(".lmar_basic3_1").prop("checked", true);
      $(".lmar_basic3_2").prop("checked", true);
      $(".lmar_basic3_3").prop("checked", true);
      $(".lmar_basic3_4").prop("checked", true);
      $(".lmar_basic3_5").prop("checked", true);
      $(".lmar_basic3_6").prop("checked", true);
      $(".lmar_basic3_7").prop("checked", true);
      $(".lmar_basic3_8").prop("checked", true);


      $('.checkall4').prop("checked", true);
      $(".lmar_basic4_1").prop("checked", true);
      $(".lmar_basic4_2").prop("checked", true);
      $(".lmar_basic4_3").prop("checked", true);
      $(".lmar_basic4_4").prop("checked", true);
      $(".lmar_basic4_5").prop("checked", true);
      $(".lmar_basic4_6").prop("checked", true);
      $(".lmar_basic4_7").prop("checked", true);
      $(".lmar_basic4_8").prop("checked", true);

      $('.checkall5').prop("checked", true);
      $(".lmar_basic5_1").prop("checked", true);
      $(".lmar_basic5_2").prop("checked", true);
      $(".lmar_basic5_3").prop("checked", true);
      $(".lmar_basic5_4").prop("checked", true);
      $(".lmar_basic5_5").prop("checked", true);
      $(".lmar_basic5_6").prop("checked", true);
      $(".lmar_basic5_7").prop("checked", true);
      $(".lmar_basic5_8").prop("checked", true);

      $('.checkall6').prop("checked", true);
      $(".lmar_basic6_1").prop("checked", true);
      $(".lmar_basic6_2").prop("checked", true);
      $(".lmar_basic6_3").prop("checked", true);
      $(".lmar_basic6_4").prop("checked", true);
      $(".lmar_basic6_5").prop("checked", true);
      $(".lmar_basic6_6").prop("checked", true);
      $(".lmar_basic6_7").prop("checked", true);
      $(".lmar_basic6_8").prop("checked", true);


      $('.checkall7').prop("checked", true);
      $(".lmar_basic7_1").prop("checked", true);
      $(".lmar_basic7_2").prop("checked", true);
      $(".lmar_basic7_3").prop("checked", true);
      $(".lmar_basic7_4").prop("checked", true);
      $(".lmar_basic7_5").prop("checked", true);
      $(".lmar_basic7_6").prop("checked", true);
      $(".lmar_basic7_7").prop("checked", true);
      $(".lmar_basic7_8").prop("checked", true);

      
      $('.checkall8').prop("checked", true);
      $(".lmar_basic8_1").prop("checked", true);
      $(".lmar_basic8_2").prop("checked", true);
      $(".lmar_basic8_3").prop("checked", true);
      $(".lmar_basic8_4").prop("checked", true);
      $(".lmar_basic8_5").prop("checked", true);
      $(".lmar_basic8_6").prop("checked", true);
      $(".lmar_basic8_7").prop("checked", true);
      $(".lmar_basic8_8").prop("checked", true);

            
      $('.checkall9').prop("checked", true);
      $(".lmar_basic9_1").prop("checked", true);
      $(".lmar_basic9_2").prop("checked", true);
      $(".lmar_basic9_3").prop("checked", true);
      $(".lmar_basic9_4").prop("checked", true);
      $(".lmar_basic9_5").prop("checked", true);
      $(".lmar_basic9_6").prop("checked", true);
      $(".lmar_basic9_7").prop("checked", true);
      $(".lmar_basic9_8").prop("checked", true);




    } 
    else{

      $('.checkall1').prop("checked", false);
      $(".lmar_basic1_1").prop("checked", false);
      $(".lmar_basic1_2").prop("checked", false);
      $(".lmar_basic1_3").prop("checked", false);
      $(".lmar_basic1_4").prop("checked", false);
      $(".lmar_basic1_5").prop("checked", false);
      $(".lmar_basic1_6").prop("checked", false);
      $(".lmar_basic1_7").prop("checked", false);
      $(".lmar_basic1_8").prop("checked", false);



      $('.checkall2').prop("checked", false);
      $(".lmar_basic2_1").prop("checked", false);
      $(".lmar_basic2_2").prop("checked", false);
      $(".lmar_basic2_3").prop("checked", false);
      $(".lmar_basic2_4").prop("checked", false);
      $(".lmar_basic2_5").prop("checked", false);
      $(".lmar_basic2_6").prop("checked", false);
      $(".lmar_basic2_7").prop("checked", false);
      $(".lmar_basic2_8").prop("checked", false);

      $('.checkall3').prop("checked", false);
      $(".lmar_basic3_1").prop("checked", false);
      $(".lmar_basic3_2").prop("checked", false);
      $(".lmar_basic3_3").prop("checked", false);
      $(".lmar_basic3_4").prop("checked", false);
      $(".lmar_basic3_5").prop("checked", false);
      $(".lmar_basic3_6").prop("checked", false);
      $(".lmar_basic3_7").prop("checked", false);
      $(".lmar_basic3_8").prop("checked", false);


      $('.checkall4').prop("checked", false);
      $(".lmar_basic4_1").prop("checked", false);
      $(".lmar_basic4_2").prop("checked", false);
      $(".lmar_basic4_3").prop("checked", false);
      $(".lmar_basic4_4").prop("checked", false);
      $(".lmar_basic4_5").prop("checked", false);
      $(".lmar_basic4_6").prop("checked", false);
      $(".lmar_basic4_7").prop("checked", false);
      $(".lmar_basic4_8").prop("checked", false);

      $('.checkall5').prop("checked", false);
      $(".lmar_basic5_1").prop("checked", false);
      $(".lmar_basic5_2").prop("checked", false);
      $(".lmar_basic5_3").prop("checked", false);
      $(".lmar_basic5_4").prop("checked", false);
      $(".lmar_basic5_5").prop("checked", false);
      $(".lmar_basic5_6").prop("checked", false);
      $(".lmar_basic5_7").prop("checked", false);
      $(".lmar_basic5_8").prop("checked", false);

      $('.checkall6').prop("checked", false);
      $(".lmar_basic6_1").prop("checked", false);
      $(".lmar_basic6_2").prop("checked", false);
      $(".lmar_basic6_3").prop("checked", false);
      $(".lmar_basic6_4").prop("checked", false);
      $(".lmar_basic6_5").prop("checked", false);
      $(".lmar_basic6_6").prop("checked", false);
      $(".lmar_basic6_7").prop("checked", false);
      $(".lmar_basic6_8").prop("checked", false);


      $('.checkall7').prop("checked", false);
      $(".lmar_basic7_1").prop("checked", false);
      $(".lmar_basic7_2").prop("checked", false);
      $(".lmar_basic7_3").prop("checked", false);
      $(".lmar_basic7_4").prop("checked", false);
      $(".lmar_basic7_5").prop("checked", false);
      $(".lmar_basic7_6").prop("checked", false);
      $(".lmar_basic7_7").prop("checked", false);
      $(".lmar_basic7_8").prop("checked", false);

      
      $('.checkall8').prop("checked", false);
      $(".lmar_basic8_1").prop("checked", false);
      $(".lmar_basic8_2").prop("checked", false);
      $(".lmar_basic8_3").prop("checked", false);
      $(".lmar_basic8_4").prop("checked", false);
      $(".lmar_basic8_5").prop("checked", false);
      $(".lmar_basic8_6").prop("checked", false);
      $(".lmar_basic8_7").prop("checked", false);
      $(".lmar_basic8_8").prop("checked", false);

            
      $('.checkall9').prop("checked", false);
      $(".lmar_basic9_1").prop("checked", false);
      $(".lmar_basic9_2").prop("checked", false);
      $(".lmar_basic9_3").prop("checked", false);
      $(".lmar_basic9_4").prop("checked", false);
      $(".lmar_basic9_5").prop("checked", false);
      $(".lmar_basic9_6").prop("checked", false);
      $(".lmar_basic9_7").prop("checked", false);
      $(".lmar_basic9_8").prop("checked", false);

    
    }   
    
    
  });

  
  var checkall1 = $('.checkall1'); 

  checkall1.on('change',function(){
      if (this.checked) {
      $(".lmar_basic1_1").prop("checked", true);
      $(".lmar_basic1_2").prop("checked", true);
      $(".lmar_basic1_3").prop("checked", true);
      $(".lmar_basic1_4").prop("checked", true);
      $(".lmar_basic1_5").prop("checked", true);
      $(".lmar_basic1_6").prop("checked", true);
      $(".lmar_basic1_7").prop("checked", true);
      $(".lmar_basic1_8").prop("checked", true);




    } 
    else{
      $(".lmar_basic1_1").prop("checked", false);
      $(".lmar_basic1_2").prop("checked", false);
      $(".lmar_basic1_3").prop("checked", false);
      $(".lmar_basic1_4").prop("checked", false);
      $(".lmar_basic1_5").prop("checked", false);
      $(".lmar_basic1_6").prop("checked", false);
      $(".lmar_basic1_7").prop("checked", false);
      $(".lmar_basic1_8").prop("checked", false);


      console.log('wow')
    }   
    
    
  });


      
  var checkall2 = $('.checkall2'); 

  checkall2.on('change',function(){
      if (this.checked) {
      $(".lmar_basic2_1").prop("checked", true);
      $(".lmar_basic2_2").prop("checked", true);
      $(".lmar_basic2_3").prop("checked", true);
      $(".lmar_basic2_4").prop("checked", true);
      $(".lmar_basic2_5").prop("checked", true);
      $(".lmar_basic2_6").prop("checked", true);
      $(".lmar_basic2_7").prop("checked", true);
      $(".lmar_basic2_8").prop("checked", true);
      



    } 
    else{
      $(".lmar_basic2_1").prop("checked", false);
      $(".lmar_basic2_2").prop("checked", false);
      $(".lmar_basic2_3").prop("checked", false);
      $(".lmar_basic2_4").prop("checked", false);
      $(".lmar_basic2_5").prop("checked", false);
      $(".lmar_basic2_6").prop("checked", false);
      $(".lmar_basic2_7").prop("checked", false);
      $(".lmar_basic2_8").prop("checked", false);
      


      console.log('wow')
    }   
    
    
  });

          
  var checkall3 = $('.checkall3'); 

  checkall3.on('change',function(){
    if (this.checked) {
      $(".lmar_basic3_1").prop("checked", true);
      $(".lmar_basic3_2").prop("checked", true);
      $(".lmar_basic3_3").prop("checked", true);
      $(".lmar_basic3_4").prop("checked", true);
      $(".lmar_basic3_5").prop("checked", true);
      $(".lmar_basic3_6").prop("checked", true);
      $(".lmar_basic3_7").prop("checked", true);
      $(".lmar_basic3_8").prop("checked", true);


    } 
    else{
      $(".lmar_basic3_1").prop("checked", false);
      $(".lmar_basic3_2").prop("checked", false);
      $(".lmar_basic3_3").prop("checked", false);
      $(".lmar_basic3_4").prop("checked", false);
      $(".lmar_basic3_5").prop("checked", false);
      $(".lmar_basic3_6").prop("checked", false);
      $(".lmar_basic3_7").prop("checked", false);
      $(".lmar_basic3_8").prop("checked", false);

      console.log('wow')
    }   
    
    
  });


  var checkall4 = $('.checkall4'); 

  checkall4.on('change',function(){
      if (this.checked) {
      $(".lmar_basic4_1").prop("checked", true);
      $(".lmar_basic4_2").prop("checked", true);
      $(".lmar_basic4_3").prop("checked", true);
      $(".lmar_basic4_4").prop("checked", true);
      $(".lmar_basic4_5").prop("checked", true);
      $(".lmar_basic4_6").prop("checked", true);
      $(".lmar_basic4_7").prop("checked", true);
      $(".lmar_basic4_8").prop("checked", true);
    } 
    else{
      $(".lmar_basic4_1").prop("checked", false);
      $(".lmar_basic4_2").prop("checked", false);
      $(".lmar_basic4_3").prop("checked", false);
      $(".lmar_basic4_4").prop("checked", false);
      $(".lmar_basic4_5").prop("checked", false);
      $(".lmar_basic4_6").prop("checked", false);
      $(".lmar_basic4_7").prop("checked", false);
      $(".lmar_basic4_8").prop("checked", false);
      console.log('wow')
    }   
    
    
  });

  
  var checkall5 = $('.checkall5'); 

  checkall5.on('change',function(){
      if (this.checked) {
      $(".lmar_basic5_1").prop("checked", true);
      $(".lmar_basic5_2").prop("checked", true);
      $(".lmar_basic5_3").prop("checked", true);
      $(".lmar_basic5_4").prop("checked", true);
      $(".lmar_basic5_5").prop("checked", true);
      $(".lmar_basic5_6").prop("checked", true);
      $(".lmar_basic5_7").prop("checked", true);
      $(".lmar_basic5_8").prop("checked", true);
    } 
    else{
      $(".lmar_basic5_1").prop("checked", false);
      $(".lmar_basic5_2").prop("checked", false);
      $(".lmar_basic5_3").prop("checked", false);
      $(".lmar_basic5_4").prop("checked", false);
      $(".lmar_basic5_5").prop("checked", false);
      $(".lmar_basic5_6").prop("checked", false);
      $(".lmar_basic5_7").prop("checked", false);
      $(".lmar_basic5_8").prop("checked", false);

      console.log('wow')
    }   
    
    
  });

  var checkall6 = $('.checkall6'); 

checkall6.on('change',function(){
    if (this.checked) {
    $(".lmar_basic6_1").prop("checked", true);
    $(".lmar_basic6_2").prop("checked", true);
    $(".lmar_basic6_3").prop("checked", true);
    $(".lmar_basic6_4").prop("checked", true);
    $(".lmar_basic6_5").prop("checked", true);
    $(".lmar_basic6_6").prop("checked", true);
    $(".lmar_basic6_7").prop("checked", true);
    $(".lmar_basic6_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic6_1").prop("checked", false);
    $(".lmar_basic6_2").prop("checked", false);
    $(".lmar_basic6_3").prop("checked", false);
    $(".lmar_basic6_4").prop("checked", false);
    $(".lmar_basic6_5").prop("checked", false);
    $(".lmar_basic6_6").prop("checked", false);
    $(".lmar_basic6_7").prop("checked", false);
    $(".lmar_basic6_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});

var checkall7 = $('.checkall7'); 

checkall7.on('change',function(){
    if (this.checked) {
    $(".lmar_basic7_1").prop("checked", true);
    $(".lmar_basic7_2").prop("checked", true);
    $(".lmar_basic7_3").prop("checked", true);
    $(".lmar_basic7_4").prop("checked", true);
    $(".lmar_basic7_5").prop("checked", true);
    $(".lmar_basic7_6").prop("checked", true);
    $(".lmar_basic7_7").prop("checked", true);
    $(".lmar_basic7_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic7_1").prop("checked", false);
    $(".lmar_basic7_2").prop("checked", false);
    $(".lmar_basic7_3").prop("checked", false);
    $(".lmar_basic7_4").prop("checked", false);
    $(".lmar_basic7_5").prop("checked", false);
    $(".lmar_basic7_6").prop("checked", false);
    $(".lmar_basic7_7").prop("checked", false);
    $(".lmar_basic7_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});

var checkall8 = $('.checkall8'); 

checkall8.on('change',function(){
    if (this.checked) {
    $(".lmar_basic8_1").prop("checked", true);
    $(".lmar_basic8_2").prop("checked", true);
    $(".lmar_basic8_3").prop("checked", true);
    $(".lmar_basic8_4").prop("checked", true);
    $(".lmar_basic8_5").prop("checked", true);
    $(".lmar_basic8_6").prop("checked", true);
    $(".lmar_basic8_7").prop("checked", true);
    $(".lmar_basic8_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic8_1").prop("checked", false);
    $(".lmar_basic8_2").prop("checked", false);
    $(".lmar_basic8_3").prop("checked", false);
    $(".lmar_basic8_4").prop("checked", false);
    $(".lmar_basic8_5").prop("checked", false);
    $(".lmar_basic8_6").prop("checked", false);
    $(".lmar_basic8_7").prop("checked", false);
    $(".lmar_basic8_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});

var checkall9 = $('.checkall9'); 

checkall9.on('change',function(){
    if (this.checked) {
    $(".lmar_basic9_1").prop("checked", true);
    $(".lmar_basic9_2").prop("checked", true);
    $(".lmar_basic9_3").prop("checked", true);
    $(".lmar_basic9_4").prop("checked", true);
    $(".lmar_basic9_5").prop("checked", true);
    $(".lmar_basic9_6").prop("checked", true);
    $(".lmar_basic9_7").prop("checked", true);
    $(".lmar_basic9_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic9_1").prop("checked", false);
    $(".lmar_basic9_2").prop("checked", false);
    $(".lmar_basic9_3").prop("checked", false);
    $(".lmar_basic9_4").prop("checked", false);
    $(".lmar_basic9_5").prop("checked", false);
    $(".lmar_basic9_6").prop("checked", false);
    $(".lmar_basic9_7").prop("checked", false);
    $(".lmar_basic9_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});



  
  // if(trainee.lmar_eimncii_basic1_1 == '/' && trainee.lmar_eimncii_basic1_2 == '/' && trainee.lmar_eimncii_basic1_3 == '/' && trainee.lmar_eimncii_basic1_4 == '/' && trainee.lmar_eimncii_basic2_1 == '/' && trainee.lmar_eimncii_common2_2== '/' && trainee.lmar_eimncii_common2_3 == '/' && trainee.lmar_eimncii_common3_1 == '/' && trainee.lmar_eimncii_common3_2 == '/' && trainee.lmar_eimncii_common3_3 == '/' && trainee.lmar_eimncii_common3_4 == '/' && trainee.lmar_eimncii_common4_1 == '/' && trainee.lmar_eimncii_common4_2 == '/' && trainee.lmar_eimncii_common4_3 == '/' && trainee.lmar_eimncii_common5_1 == '/' && trainee.lmar_eimncii_common5_2 == '/' && trainee.lmar_eimncii_common5_3 == '/'){


  //   $(".checkall").prop("checked", true);
  //   console.log('now')
  // }
  // else{
  //   $(".checkall").prop("checked", false);
  //   console.log('nows')
  // }
  var finalelemcom1
  var finalelemcom2
  var finalelemcom3
  var finalelemcom4
  var finalelemcom5
  var finalelemcom6
  var finalelemcom7
  var finalelemcom8
  var finalelemcom9


  <?php
$countperquery = "SELECT lmar_element_unit,COUNT(lmar_element_unit) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '$basiccompentencies' GROUP BY (lmar_element_unit)";
$countpersql = mysqli_query($connection, $countperquery);
$elementsloopings = 1;
while($countss = mysqli_fetch_array($countpersql)){ 
    $counting = $countss["totalelem"];
    $countloop = 1;
    while($countloop <= $counting){ ?>
      if(trainee.lmar_basic<?=$elementsloopings?>_<?=$countloop?> == '/'){

      }
      else{
        finalelemcom<?=$elementsloopings?> = 'uncheking'
      }


     <?php
    $countloop++;
    }
    $countloop = 1;

    $elementsloopings++;
}

 ?>


console.log(finalelemcom1)
if(finalelemcom1 == 'uncheking'){
    $(".checkall1").prop("checked", false);
    }
    else{
      $(".checkall1").prop("checked", true);
    }

if(finalelemcom2 == 'uncheking'){
$(".checkall2").prop("checked", false);
}
else{
  $(".checkall2").prop("checked", true);
}

if(finalelemcom3 == 'uncheking'){
    $(".checkall3").prop("checked", false);
    }
    else{
      $(".checkall3").prop("checked", true);
    }

    if(finalelemcom4 == 'uncheking'){
    $(".checkall4").prop("checked", false);
    }
    else{
      $(".checkall4").prop("checked", true);
    }

    if(finalelemcom5 == 'uncheking'){
    $(".checkall5").prop("checked", false);
    }
    else{
      $(".checkall5").prop("checked", true);
    }

    if(finalelemcom6 == 'uncheking'){
    $(".checkall6").prop("checked", false);
    }
    else{
      $(".checkall6").prop("checked", true);
    }

    if(finalelemcom7 == 'uncheking'){
    $(".checkall7").prop("checked", false);
    }
    else{
      $(".checkall7").prop("checked", true);
    }


    if(finalelemcom8 == 'uncheking'){
    $(".checkall8").prop("checked", false);
    }
    else{
      $(".checkall8").prop("checked", true);
    }


    if(finalelemcom9 == 'uncheking'){
    $(".checkall9").prop("checked", false);
    }
    else{
      $(".checkall9").prop("checked", true);
    }

    if(finalelemcom1 == 'uncheking' || finalelemcom2 == 'uncheking' || finalelemcom3 == 'uncheking' || finalelemcom4 == 'uncheking' || finalelemcom5 == 'uncheking' || finalelemcom6 == 'uncheking' || finalelemcom7 == 'uncheking' || finalelemcom8 == 'uncheking' || finalelemcom9 == 'uncheking'){
      $(".checkall").prop("checked", false);
      console.log('uncheckall')
    }
    else{
      $(".checkall").prop("checked", true);
      console.log('checkall')

    }
  // if(trainee.lmar_basic1_1 == '/' && trainee.lmar_basic1_2 == '/' && trainee.lmar_basic1_3 == '/'){

  //   $(".checkall1").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall1").prop("checked", false);


  //   console.log('nows')
  // }


  // if(trainee.lmar_eimncii_common2_1 == '/' && trainee.lmar_eimncii_common2_2 == '/' && trainee.lmar_eimncii_common2_3 == '/' ){

  //   $(".checkall2").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall2").prop("checked", false);


  //   console.log('nows')
  // }


  // if(trainee.lmar_eimncii_common3_1 == '/' && trainee.lmar_eimncii_common3_2 == '/' && trainee.lmar_eimncii_common3_3 == '/' && trainee.lmar_eimncii_common3_4 == '/' ){

  //   $(".checkall3").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall3").prop("checked", false);


  //   console.log('nows')
  // }


  // if(trainee.lmar_eimncii_common4_1 == '/' && trainee.lmar_eimncii_common4_2 == '/' && trainee.lmar_eimncii_common4_3 == '/' ){

  //   $(".checkall4").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall4").prop("checked", false);


  //   console.log('nows')
  // }

  // if(trainee.lmar_eimncii_common5_1 == '/' && trainee.lmar_eimncii_common5_2 == '/' && trainee.lmar_eimncii_common5_3 == '/' ){

  //   $(".checkall5").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall5").prop("checked", false);


  //   console.log('nows')
  // }




  
  if(trainee.lmar_basic1_1 == '/'){
    $(".lmar_basic1_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_1").prop("checked", false);
    console.log('grrnows')
  }

  if(trainee.lmar_basic1_2 == '/'){
    $(".lmar_basic1_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic1_3 == '/'){
    $(".lmar_basic1_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic1_4 == '/'){
    $(".lmar_basic1_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic1_5 == '/'){
    $(".lmar_basic1_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic1_6 == '/'){
    $(".lmar_basic1_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic1_7 == '/'){
    $(".lmar_basic1_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic1_8 == '/'){
    $(".lmar_basic1_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_8").prop("checked", false);
    console.log('nows')
  }
 




  if(trainee.lmar_basic2_1 == '/'){
    $(".lmar_basic2_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_2 == '/'){
    $(".lmar_basic2_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_3 == '/'){
    $(".lmar_basic2_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_4 == '/'){
    $(".lmar_basic2_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic2_5 == '/'){
    $(".lmar_basic2_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic2_6 == '/'){
    $(".lmar_basic2_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic2_7 == '/'){
    $(".lmar_basic2_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_8 == '/'){
    $(".lmar_basic2_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_8").prop("checked", false);
    console.log('nows')
  }






  if(trainee.lmar_basic3_1 == '/'){
    $(".lmar_basic3_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_2 == '/'){
    $(".lmar_basic3_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_3 == '/'){
    $(".lmar_basic3_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_4 == '/'){
    $(".lmar_basic3_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic3_5 == '/'){
    $(".lmar_basic3_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic3_6 == '/'){
    $(".lmar_basic3_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic3_7 == '/'){
    $(".lmar_basic3_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_8 == '/'){
    $(".lmar_basic3_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_8").prop("checked", false);
    console.log('nows')
  }





  
  if(trainee.lmar_basic4_1 == '/'){
    $(".lmar_basic4_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_2 == '/'){
    $(".lmar_basic4_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_3 == '/'){
    $(".lmar_basic4_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_4 == '/'){
    $(".lmar_basic4_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic4_5 == '/'){
    $(".lmar_basic4_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic4_6 == '/'){
    $(".lmar_basic4_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic4_7 == '/'){
    $(".lmar_basic4_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_8 == '/'){
    $(".lmar_basic4_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_8").prop("checked", false);
    console.log('nows')
  }


  if(trainee.lmar_basic5_1 == '/'){
    $(".lmar_basic5_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_2 == '/'){
    $(".lmar_basic5_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_3 == '/'){
    $(".lmar_basic5_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_4 == '/'){
    $(".lmar_basic5_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic5_5 == '/'){
    $(".lmar_basic5_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic5_6 == '/'){
    $(".lmar_basic5_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic5_7 == '/'){
    $(".lmar_basic5_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_8 == '/'){
    $(".lmar_basic5_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_8").prop("checked", false);
    console.log('nows')
  }


  if(trainee.lmar_basic6_1 == '/'){
    $(".lmar_basic6_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_2 == '/'){
    $(".lmar_basic6_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_3 == '/'){
    $(".lmar_basic6_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_4 == '/'){
    $(".lmar_basic6_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic6_5 == '/'){
    $(".lmar_basic6_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic6_6 == '/'){
    $(".lmar_basic6_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic6_7 == '/'){
    $(".lmar_basic6_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_8 == '/'){
    $(".lmar_basic6_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_8").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_1 == '/'){
    $(".lmar_basic7_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_2 == '/'){
    $(".lmar_basic7_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_3 == '/'){
    $(".lmar_basic7_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_4 == '/'){
    $(".lmar_basic7_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic7_5 == '/'){
    $(".lmar_basic7_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic7_6 == '/'){
    $(".lmar_basic7_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic7_7 == '/'){
    $(".lmar_basic7_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_8 == '/'){
    $(".lmar_basic7_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_8").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_1 == '/'){
    $(".lmar_basic8_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_2 == '/'){
    $(".lmar_basic8_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_3 == '/'){
    $(".lmar_basic8_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_4 == '/'){
    $(".lmar_basic8_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_5 == '/'){
    $(".lmar_basic8_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_6 == '/'){
    $(".lmar_basic8_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_7 == '/'){
    $(".lmar_basic8_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_8 == '/'){
    $(".lmar_basic8_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_8").prop("checked", false);
    console.log('nows')
  }


  if(trainee.lmar_basic9_1 == '/'){
    $(".lmar_basic9_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_2 == '/'){
    $(".lmar_basic9_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_3 == '/'){
    $(".lmar_basic9_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_4 == '/'){
    $(".lmar_basic9_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic9_5 == '/'){
    $(".lmar_basic9_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic9_6 == '/'){
    $(".lmar_basic9_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic9_7 == '/'){
    $(".lmar_basic9_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_8 == '/'){
    $(".lmar_basic9_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_8").prop("checked", false);
    console.log('nows')
  }
  console.log(trainessid)

  let edit_basic = 'edit_basic';
  $('#updatecom').on('click',function(){


    var isChecked1_1 = $('.lmar_basic1_1').is(':checked'); 
    var isChecked1_2 = $('.lmar_basic1_2').is(':checked'); 
    var isChecked1_3 = $('.lmar_basic1_3').is(':checked'); 
    var isChecked1_4 = $('.lmar_basic1_4').is(':checked');
    var isChecked1_5 = $('.lmar_basic1_5').is(':checked');
    var isChecked1_6 = $('.lmar_basic1_6').is(':checked');
    var isChecked1_7 = $('.lmar_basic1_7').is(':checked');
    var isChecked1_8 = $('.lmar_basic1_8').is(':checked');

    var isChecked2_1 = $('.lmar_basic2_1').is(':checked'); 
    var isChecked2_2 = $('.lmar_basic2_2').is(':checked'); 
    var isChecked2_3 = $('.lmar_basic2_3').is(':checked'); 
    var isChecked2_4 = $('.lmar_basic2_4').is(':checked');
    var isChecked2_5 = $('.lmar_basic2_5').is(':checked');
    var isChecked2_6 = $('.lmar_basic2_6').is(':checked');
    var isChecked2_7 = $('.lmar_basic2_7').is(':checked');
    var isChecked2_8 = $('.lmar_basic2_8').is(':checked');

    var isChecked3_1 = $('.lmar_basic3_1').is(':checked'); 
    var isChecked3_2 = $('.lmar_basic3_2').is(':checked'); 
    var isChecked3_3 = $('.lmar_basic3_3').is(':checked'); 
    var isChecked3_4 = $('.lmar_basic3_4').is(':checked');
    var isChecked3_5 = $('.lmar_basic3_5').is(':checked');
    var isChecked3_6 = $('.lmar_basic3_6').is(':checked');
    var isChecked3_7 = $('.lmar_basic3_7').is(':checked');
    var isChecked3_8 = $('.lmar_basic3_8').is(':checked');

    var isChecked4_1 = $('.lmar_basic4_1').is(':checked'); 
    var isChecked4_2 = $('.lmar_basic4_2').is(':checked'); 
    var isChecked4_3 = $('.lmar_basic4_3').is(':checked'); 
    var isChecked4_4 = $('.lmar_basic4_4').is(':checked');
    var isChecked4_5 = $('.lmar_basic4_5').is(':checked');
    var isChecked4_6 = $('.lmar_basic4_6').is(':checked');
    var isChecked4_7 = $('.lmar_basic4_7').is(':checked');
    var isChecked4_8 = $('.lmar_basic4_8').is(':checked');

    var isChecked5_1 = $('.lmar_basic5_1').is(':checked'); 
    var isChecked5_2 = $('.lmar_basic5_2').is(':checked'); 
    var isChecked5_3 = $('.lmar_basic5_3').is(':checked'); 
    var isChecked5_4 = $('.lmar_basic5_4').is(':checked');
    var isChecked5_5 = $('.lmar_basic5_5').is(':checked');
    var isChecked5_6 = $('.lmar_basic5_6').is(':checked');
    var isChecked5_7 = $('.lmar_basic5_7').is(':checked');
    var isChecked5_8 = $('.lmar_basic5_8').is(':checked');

    var isChecked6_1 = $('.lmar_basic6_1').is(':checked'); 
    var isChecked6_2 = $('.lmar_basic6_2').is(':checked'); 
    var isChecked6_3 = $('.lmar_basic6_3').is(':checked'); 
    var isChecked6_4 = $('.lmar_basic6_4').is(':checked');
    var isChecked6_5 = $('.lmar_basic6_5').is(':checked');
    var isChecked6_6 = $('.lmar_basic6_6').is(':checked');
    var isChecked6_7 = $('.lmar_basic6_7').is(':checked');
    var isChecked6_8 = $('.lmar_basic6_8').is(':checked');


    var isChecked7_1 = $('.lmar_basic7_1').is(':checked'); 
    var isChecked7_2 = $('.lmar_basic7_2').is(':checked'); 
    var isChecked7_3 = $('.lmar_basic7_3').is(':checked'); 
    var isChecked7_4 = $('.lmar_basic7_4').is(':checked');
    var isChecked7_5 = $('.lmar_basic7_5').is(':checked');
    var isChecked7_6 = $('.lmar_basic7_6').is(':checked');
    var isChecked7_7 = $('.lmar_basic7_7').is(':checked');
    var isChecked7_8 = $('.lmar_basic7_8').is(':checked');


    var isChecked8_1 = $('.lmar_basic8_1').is(':checked'); 
    var isChecked8_2 = $('.lmar_basic8_2').is(':checked'); 
    var isChecked8_3 = $('.lmar_basic8_3').is(':checked'); 
    var isChecked8_4 = $('.lmar_basic8_4').is(':checked');
    var isChecked8_5 = $('.lmar_basic8_5').is(':checked');
    var isChecked8_6 = $('.lmar_basic8_6').is(':checked');
    var isChecked8_7 = $('.lmar_basic8_7').is(':checked');
    var isChecked8_8 = $('.lmar_basic8_8').is(':checked');

    var isChecked9_1 = $('.lmar_basic9_1').is(':checked'); 
    var isChecked9_2 = $('.lmar_basic9_2').is(':checked'); 
    var isChecked9_3 = $('.lmar_basic9_3').is(':checked'); 
    var isChecked9_4 = $('.lmar_basic9_4').is(':checked');
    var isChecked9_5 = $('.lmar_basic9_5').is(':checked');
    var isChecked9_6 = $('.lmar_basic9_6').is(':checked');
    var isChecked9_7 = $('.lmar_basic9_7').is(':checked');
    var isChecked9_8 = $('.lmar_basic9_8').is(':checked');


    if(isChecked1_1 == true){
      com1_1 = '/'
    }
    else{
      com1_1 = ''
    }
    if(isChecked1_2 == true){
      com1_2 = '/'
    }
    else{
      com1_2 = ''
    }
    if(isChecked1_3 == true){
      com1_3 = '/'
    }
    else{
      com1_3 = ''
    }
    if(isChecked1_4 == true){
      com1_4 = '/'
    }
    else{
      com1_4 = ''
    }
    if(isChecked1_5 == true){
      com1_5 = '/'
    }
    else{
      com1_5 = ''
    }
    if(isChecked1_6 == true){
      com1_6 = '/'
    }
    else{
      com1_6 = ''
    }
    if(isChecked1_7 == true){
      com1_7 = '/'
    }
    else{
      com1_7 = ''
    }

    if(isChecked1_8 == true){
      com1_8 = '/'
    }
    else{
      com1_8 = ''
    }

    if(isChecked2_1 == true){
      com2_1 = '/'
    }
    else{
      com2_1 = ''
    }
    if(isChecked2_2 == true){
      com2_2 = '/'
    }
    else{
      com2_2 = ''
    }
    if(isChecked2_3 == true){
      com2_3 = '/'
    }
    else{
      com2_3 = ''
    }
    if(isChecked2_4 == true){
      com2_4 = '/'
    }
    else{
      com2_4 = ''
    }
    if(isChecked2_5 == true){
      com2_5 = '/'
    }
    else{
      com2_5 = ''
    }
    if(isChecked2_6 == true){
      com2_6 = '/'
    }
    else{
      com2_6 = ''
    }
    if(isChecked2_7 == true){
      com2_7 = '/'
    }
    else{
      com2_7 = ''
    }

    if(isChecked2_8 == true){
      com2_8 = '/'
    }
    else{
      com2_8 = ''
    }


    if(isChecked3_1 == true){
      com3_1 = '/'
    }
    else{
      com3_1 = ''
    }
    if(isChecked3_2 == true){
      com3_2 = '/'
    }
    else{
      com3_2 = ''
    }
    if(isChecked3_3 == true){
      com3_3 = '/'
    }
    else{
      com3_3 = ''
    }
    if(isChecked3_4 == true){
      com3_4 = '/'
    }
    else{
      com3_4 = ''
    }
    if(isChecked3_5 == true){
      com3_5 = '/'
    }
    else{
      com3_5 = ''
    }
    if(isChecked3_6 == true){
      com3_6 = '/'
    }
    else{
      com3_6 = ''
    }
    if(isChecked3_7 == true){
      com3_7 = '/'
    }
    else{
      com3_7 = ''
    }

    if(isChecked3_8 == true){
      com3_8 = '/'
    }
    else{
      com3_8 = ''
    }


    if(isChecked4_1 == true){
      com4_1 = '/'
    }
    else{
      com4_1 = ''
    }
    if(isChecked4_2 == true){
      com4_2 = '/'
    }
    else{
      com4_2 = ''
    }
    if(isChecked4_3 == true){
      com4_3 = '/'
    }
    else{
      com4_3 = ''
    }
    if(isChecked4_4 == true){
      com4_4 = '/'
    }
    else{
      com4_4 = ''
    }
    if(isChecked4_5 == true){
      com4_5 = '/'
    }
    else{
      com4_5 = ''
    }
    if(isChecked4_6 == true){
      com4_6 = '/'
    }
    else{
      com4_6 = ''
    }
    if(isChecked4_7 == true){
      com4_7 = '/'
    }
    else{
      com4_7 = ''
    }

    if(isChecked4_8 == true){
      com4_8 = '/'
    }
    else{
      com4_8 = ''
    }


    if(isChecked5_1 == true){
      com5_1 = '/'
    }
    else{
      com5_1 = ''
    }
    if(isChecked5_2 == true){
      com5_2 = '/'
    }
    else{
      com5_2 = ''
    }
    if(isChecked5_3 == true){
      com5_3 = '/'
    }
    else{
      com5_3 = ''
    }
    if(isChecked5_4 == true){
      com5_4 = '/'
    }
    else{
      com5_4 = ''
    }
    if(isChecked5_5 == true){
      com5_5 = '/'
    }
    else{
      com5_5 = ''
    }
    if(isChecked5_6 == true){
      com5_6 = '/'
    }
    else{
      com5_6 = ''
    }
    if(isChecked5_7 == true){
      com5_7 = '/'
    }
    else{
      com5_7 = ''
    }

    if(isChecked5_8 == true){
      com5_8 = '/'
    }
    else{
      com5_8 = ''
    }



    if(isChecked6_1 == true){
      com6_1 = '/'
    }
    else{
      com6_1 = ''
    }
    if(isChecked6_2 == true){
      com6_2 = '/'
    }
    else{
      com6_2 = ''
    }
    if(isChecked6_3 == true){
      com6_3 = '/'
    }
    else{
      com6_3 = ''
    }
    if(isChecked6_4 == true){
      com6_4 = '/'
    }
    else{
      com6_4 = ''
    }
    if(isChecked6_5 == true){
      com6_5 = '/'
    }
    else{
      com6_5 = ''
    }
    if(isChecked6_6 == true){
      com6_6 = '/'
    }
    else{
      com6_6 = ''
    }
    if(isChecked6_7 == true){
      com6_7 = '/'
    }
    else{
      com6_7 = ''
    }

    if(isChecked6_8 == true){
      com6_8 = '/'
    }
    else{
      com6_8 = ''
    }

    if(isChecked7_1 == true){
      com7_1 = '/'
    }
    else{
      com7_1 = ''
    }
    if(isChecked7_2 == true){
      com7_2 = '/'
    }
    else{
      com7_2 = ''
    }
    if(isChecked7_3 == true){
      com7_3 = '/'
    }
    else{
      com7_3 = ''
    }
    if(isChecked7_4 == true){
      com7_4 = '/'
    }
    else{
      com7_4 = ''
    }
    if(isChecked7_5 == true){
      com7_5 = '/'
    }
    else{
      com7_5 = ''
    }
    if(isChecked7_6 == true){
      com7_6 = '/'
    }
    else{
      com7_6 = ''
    }
    if(isChecked7_7 == true){
      com7_7 = '/'
    }
    else{
      com7_7 = ''
    }

    if(isChecked7_8 == true){
      com7_8 = '/'
    }
    else{
      com7_8 = ''
    }

    if(isChecked8_1 == true){
      com8_1 = '/'
    }
    else{
      com8_1 = ''
    }
    if(isChecked8_2 == true){
      com8_2 = '/'
    }
    else{
      com8_2 = ''
    }
    if(isChecked8_3 == true){
      com8_3 = '/'
    }
    else{
      com8_3 = ''
    }
    if(isChecked8_4 == true){
      com8_4 = '/'
    }
    else{
      com8_4 = ''
    }
    if(isChecked8_5 == true){
      com8_5 = '/'
    }
    else{
      com8_5 = ''
    }
    if(isChecked8_6 == true){
      com8_6 = '/'
    }
    else{
      com8_6 = ''
    }
    if(isChecked8_7 == true){
      com8_7 = '/'
    }
    else{
      com8_7 = ''
    }

    if(isChecked8_8 == true){
      com8_8 = '/'
    }
    else{
      com8_8 = ''
    }

    if(isChecked9_1 == true){
      com9_1 = '/'
    }
    else{
      com9_1 = ''
    }
    if(isChecked9_2 == true){
      com9_2 = '/'
    }
    else{
      com9_2 = ''
    }
    if(isChecked9_3 == true){
      com9_3 = '/'
    }
    else{
      com9_3 = ''
    }
    if(isChecked9_4 == true){
      com9_4 = '/'
    }
    else{
      com9_4 = ''
    }
    if(isChecked9_5 == true){
      com9_5 = '/'
    }
    else{
      com9_5 = ''
    }
    if(isChecked9_6 == true){
      com9_6 = '/'
    }
    else{
      com9_6 = ''
    }
    if(isChecked9_7 == true){
      com9_7 = '/'
    }
    else{
      com9_7 = ''
    }

    if(isChecked9_8 == true){
      com9_8 = '/'
    }
    else{
      com9_8 = ''
    }

    var finalcom;

      // if(trainee.lmar_eimncii_common1_1 == '/' && trainee.lmar_eimncii_common1_2 == '/' && trainee.lmar_eimncii_common1_3 == '/' && trainee.lmar_eimncii_common1_4 == '/' && trainee.lmar_eimncii_common2_1 == '/' && trainee.lmar_eimncii_common2_2== '/' && trainee.lmar_eimncii_common2_3 == '/' && trainee.lmar_eimncii_common3_1 == '/' && trainee.lmar_eimncii_common3_2 == '/' && trainee.lmar_eimncii_common3_3 == '/' && trainee.lmar_eimncii_common3_4 == '/' && trainee.lmar_eimncii_common4_1 == '/' && trainee.lmar_eimncii_common4_2 == '/' && trainee.lmar_eimncii_common4_3 == '/' && trainee.lmar_eimncii_common5_1 == '/' && trainee.lmar_eimncii_common5_2 == '/' && trainee.lmar_eimncii_common5_3 == '/'){


  //   $(".checkall").prop("checked", true);
  //   console.log('now')
  // }
  // else{
  //   $(".checkall").prop("checked", false);
  //   console.log('nows')
  // }

    <?php 
        $stmt = "SELECT COUNT(lmar_element_id) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '$basiccompentencies'  ";
        $result = mysqli_query($connection, $stmt);
        
        if(mysqli_num_rows($result) > 0){
            $trow = mysqli_fetch_assoc($result);
            $_SESSION['totalelem'] = $trow["totalelem"];
              ?>
                <?php } 

          $loopchecking = '1';
          $loopelementing = '1';
          $selectingquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
          $selectingsql = mysqli_query($connection,$selectingquery);
          while($srow = mysqli_fetch_array($selectingsql)){ 
            $sunitid = $srow['lmar_unit_id']; ?>
            
        
      
          <?php    
          $elementingquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$sunitid' ";
          $elementingsql = mysqli_query($connection,$elementingquery);
          while($crowing = mysqli_fetch_array($elementingsql)){ ?>

          

       
          console.log(<?=$_SESSION['totalelem'] ?>)
          if(com<?=$loopchecking?>_<?=$loopelementing?> == '/'){
            console.log('yes'+<?=$loopchecking?>_<?=$loopelementing?>)
          }
          else{
            console.log('no'+<?=$loopchecking?>_<?=$loopelementing?>)
            finalcom = 'uncheck'
          }

          <?php
          $loopelementing++;
         } 
         
         $loopelementing = 1;
        $loopchecking++;  
        }
          ?>

    console.log(com1_3)
    console.log(com6_3)
    console.log(com5_3)

    console.log(com9_3)

    console.log(finalcom)
    var finalsend;
    if(finalcom == 'uncheck'){
      finalsend = ''
    }
    else{
      finalsend = '/'
    }
    console.log(finalsend)
    let edit_basic = 'edit_basic';
    $.ajax({
      url: 'connection_progresschart_eimncii.php',
      method :'post',
      data : {
      edit_basic:edit_basic,
        trainessid:trainessid,
        finalsend:finalsend,
        com1_1:com1_1,
        com1_2:com1_2,
        com1_3:com1_3,
        com1_4:com1_4,
        com1_5:com1_5,
        com1_6:com1_6,
        com1_7:com1_7,
        com1_8:com1_8,

        com2_1:com2_1,
        com2_2:com2_2,
        com2_3:com2_3,
        com2_4:com2_4,
        com2_5:com2_5,
        com2_6:com2_6,
        com2_7:com2_7,
        com2_8:com2_8,

        com3_1:com3_1,
        com3_2:com3_2,
        com3_3:com3_3,
        com3_4:com3_4,
        com3_5:com3_5,
        com3_6:com3_6,
        com3_7:com3_7,
        com3_8:com3_8,

        com4_1:com4_1,
        com4_2:com4_2,
        com4_3:com4_3,
        com4_4:com4_4,
        com4_5:com4_5,
        com4_6:com4_6,
        com4_7:com4_7,
        com4_8:com4_8,

        com5_1:com5_1,
        com5_2:com5_2,
        com5_3:com5_3,
        com5_4:com5_4,
        com5_5:com5_5,
        com5_6:com5_6,
        com5_7:com5_7,
        com5_8:com5_8,

        com6_1:com6_1,
        com6_2:com6_2,
        com6_3:com6_3,
        com6_4:com6_4,
        com6_5:com6_5,
        com6_6:com6_6,
        com6_7:com6_7,
        com6_8:com6_8,

        com7_1:com7_1,
        com7_2:com7_2,
        com7_3:com7_3,
        com7_4:com7_4,
        com7_5:com7_5,
        com7_6:com7_6,
        com7_7:com7_7,
        com7_8:com7_8,
        
        com8_1:com8_1,
        com8_2:com8_2,
        com8_3:com8_3,
        com8_4:com8_4,
        com8_5:com8_5,
        com8_6:com8_6,
        com8_7:com8_7,
        com8_8:com8_8,

        com9_1:com9_1,
        com9_2:com9_2,
        com9_3:com9_3,
        com9_4:com9_4,
        com9_5:com9_5,
        com9_6:com9_6,
        com9_7:com9_7,
        com9_8:com9_8,


      },success:function(response){
        console.log(response)
        if(response == '1'){
                        
        
        $('#updateModal').modal('hide')
    
          $('#successdeleteModal').modal('show');
          setTimeout(
            function() 
            {
              window.location.href ='basic_eimncii_progresschart.php'

            }, 1000);
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
    console.log(trainessid)


    let basicupdate = 'basicupdate';
    $.ajax({
      url: 'connection_progresschart_eimncii.php',
      method :'post',
      data : {
        basicupdate:basicupdate,
        trainessid:trainessid,
      },success:function(response){
        console.log(response)
        let data = "";

        let trainess = JSON.parse(response);
        for (trainee of trainess){
          
        
        $('#updateModal').modal('show')
    
   

  
        data += `<div class="modal-header p-2 px-3">

        <h5 class="modal-title text-primary" id="exampleModalLabel">  Basic Competencies</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


  
      <div class="form-check form-check-inline d-flex row bg-primary rounded-1 ms-2 sticky-top ps-3 py-2 rounded-3">
      <div class="col-11 pt-1">
      <p class="text-white fw-bold" style="font-size:25px;">${trainee.FirstName} ${trainee.MiddleName[0]} ${trainee.LastName}</p>
      </div>
      <div class="col-1 ps-3 pt-1 justify-content-end">
      <input class="form-check-input p-2 checkall" type="checkbox" style="height:30px; width:30px;"/>
      </div>
      </div>


    `
          <?php 
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>
            data += `
            <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
            <div class="col-11 pt-1">
            <p class="text-primary fw-bold bg-secondary" style="font-size:20px;"><?= $row['lmar_unit_name']; ?></p>	
            </div>
            <div class="col-1 ps-3 pt-1 justify-content-end">
            <input class="form-check-input p-2 checkall<?=$loopcheck?>" type="checkbox" style="height:30px; width:30px;"/>
            </div>

          

            </div>`;
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          data += `
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_basic<?=$loopcheck?>_<?=$loopelement?>" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1"> <?= $crow['lmar_element_name']; ?></label>
          </div>
  
          <br>
          `
            
          <?php
          $loopelement++;
         } 
         $loopelement = 1;
        $loopcheck++;  
        }
          ?>
          data += `
       



      </div>

      



  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
  </div>`
  



      }


  $("#update_detail").html(data);

  var checkall = $('.checkall'); 

  checkall.on('change',function(){

    if (this.checked) {
      $('.checkall1').prop("checked", true);
      $(".lmar_basic1_1").prop("checked", true);
      $(".lmar_basic1_2").prop("checked", true);
      $(".lmar_basic1_3").prop("checked", true);
      $(".lmar_basic1_4").prop("checked", true);
      $(".lmar_basic1_5").prop("checked", true);
      $(".lmar_basic1_6").prop("checked", true);
      $(".lmar_basic1_7").prop("checked", true);
      $(".lmar_basic1_8").prop("checked", true);



      $('.checkall2').prop("checked", true);
      $(".lmar_basic2_1").prop("checked", true);
      $(".lmar_basic2_2").prop("checked", true);
      $(".lmar_basic2_3").prop("checked", true);
      $(".lmar_basic2_4").prop("checked", true);
      $(".lmar_basic2_5").prop("checked", true);
      $(".lmar_basic2_6").prop("checked", true);
      $(".lmar_basic2_7").prop("checked", true);
      $(".lmar_basic2_8").prop("checked", true);

      $('.checkall3').prop("checked", true);
      $(".lmar_basic3_1").prop("checked", true);
      $(".lmar_basic3_2").prop("checked", true);
      $(".lmar_basic3_3").prop("checked", true);
      $(".lmar_basic3_4").prop("checked", true);
      $(".lmar_basic3_5").prop("checked", true);
      $(".lmar_basic3_6").prop("checked", true);
      $(".lmar_basic3_7").prop("checked", true);
      $(".lmar_basic3_8").prop("checked", true);


      $('.checkall4').prop("checked", true);
      $(".lmar_basic4_1").prop("checked", true);
      $(".lmar_basic4_2").prop("checked", true);
      $(".lmar_basic4_3").prop("checked", true);
      $(".lmar_basic4_4").prop("checked", true);
      $(".lmar_basic4_5").prop("checked", true);
      $(".lmar_basic4_6").prop("checked", true);
      $(".lmar_basic4_7").prop("checked", true);
      $(".lmar_basic4_8").prop("checked", true);

      $('.checkall5').prop("checked", true);
      $(".lmar_basic5_1").prop("checked", true);
      $(".lmar_basic5_2").prop("checked", true);
      $(".lmar_basic5_3").prop("checked", true);
      $(".lmar_basic5_4").prop("checked", true);
      $(".lmar_basic5_5").prop("checked", true);
      $(".lmar_basic5_6").prop("checked", true);
      $(".lmar_basic5_7").prop("checked", true);
      $(".lmar_basic5_8").prop("checked", true);

      $('.checkall6').prop("checked", true);
      $(".lmar_basic6_1").prop("checked", true);
      $(".lmar_basic6_2").prop("checked", true);
      $(".lmar_basic6_3").prop("checked", true);
      $(".lmar_basic6_4").prop("checked", true);
      $(".lmar_basic6_5").prop("checked", true);
      $(".lmar_basic6_6").prop("checked", true);
      $(".lmar_basic6_7").prop("checked", true);
      $(".lmar_basic6_8").prop("checked", true);


      $('.checkall7').prop("checked", true);
      $(".lmar_basic7_1").prop("checked", true);
      $(".lmar_basic7_2").prop("checked", true);
      $(".lmar_basic7_3").prop("checked", true);
      $(".lmar_basic7_4").prop("checked", true);
      $(".lmar_basic7_5").prop("checked", true);
      $(".lmar_basic7_6").prop("checked", true);
      $(".lmar_basic7_7").prop("checked", true);
      $(".lmar_basic7_8").prop("checked", true);

      
      $('.checkall8').prop("checked", true);
      $(".lmar_basic8_1").prop("checked", true);
      $(".lmar_basic8_2").prop("checked", true);
      $(".lmar_basic8_3").prop("checked", true);
      $(".lmar_basic8_4").prop("checked", true);
      $(".lmar_basic8_5").prop("checked", true);
      $(".lmar_basic8_6").prop("checked", true);
      $(".lmar_basic8_7").prop("checked", true);
      $(".lmar_basic8_8").prop("checked", true);

            
      $('.checkall9').prop("checked", true);
      $(".lmar_basic9_1").prop("checked", true);
      $(".lmar_basic9_2").prop("checked", true);
      $(".lmar_basic9_3").prop("checked", true);
      $(".lmar_basic9_4").prop("checked", true);
      $(".lmar_basic9_5").prop("checked", true);
      $(".lmar_basic9_6").prop("checked", true);
      $(".lmar_basic9_7").prop("checked", true);
      $(".lmar_basic9_8").prop("checked", true);




    } 
    else{

      $('.checkall1').prop("checked", false);
      $(".lmar_basic1_1").prop("checked", false);
      $(".lmar_basic1_2").prop("checked", false);
      $(".lmar_basic1_3").prop("checked", false);
      $(".lmar_basic1_4").prop("checked", false);
      $(".lmar_basic1_5").prop("checked", false);
      $(".lmar_basic1_6").prop("checked", false);
      $(".lmar_basic1_7").prop("checked", false);
      $(".lmar_basic1_8").prop("checked", false);



      $('.checkall2').prop("checked", false);
      $(".lmar_basic2_1").prop("checked", false);
      $(".lmar_basic2_2").prop("checked", false);
      $(".lmar_basic2_3").prop("checked", false);
      $(".lmar_basic2_4").prop("checked", false);
      $(".lmar_basic2_5").prop("checked", false);
      $(".lmar_basic2_6").prop("checked", false);
      $(".lmar_basic2_7").prop("checked", false);
      $(".lmar_basic2_8").prop("checked", false);

      $('.checkall3').prop("checked", false);
      $(".lmar_basic3_1").prop("checked", false);
      $(".lmar_basic3_2").prop("checked", false);
      $(".lmar_basic3_3").prop("checked", false);
      $(".lmar_basic3_4").prop("checked", false);
      $(".lmar_basic3_5").prop("checked", false);
      $(".lmar_basic3_6").prop("checked", false);
      $(".lmar_basic3_7").prop("checked", false);
      $(".lmar_basic3_8").prop("checked", false);


      $('.checkall4').prop("checked", false);
      $(".lmar_basic4_1").prop("checked", false);
      $(".lmar_basic4_2").prop("checked", false);
      $(".lmar_basic4_3").prop("checked", false);
      $(".lmar_basic4_4").prop("checked", false);
      $(".lmar_basic4_5").prop("checked", false);
      $(".lmar_basic4_6").prop("checked", false);
      $(".lmar_basic4_7").prop("checked", false);
      $(".lmar_basic4_8").prop("checked", false);

      $('.checkall5').prop("checked", false);
      $(".lmar_basic5_1").prop("checked", false);
      $(".lmar_basic5_2").prop("checked", false);
      $(".lmar_basic5_3").prop("checked", false);
      $(".lmar_basic5_4").prop("checked", false);
      $(".lmar_basic5_5").prop("checked", false);
      $(".lmar_basic5_6").prop("checked", false);
      $(".lmar_basic5_7").prop("checked", false);
      $(".lmar_basic5_8").prop("checked", false);

      $('.checkall6').prop("checked", false);
      $(".lmar_basic6_1").prop("checked", false);
      $(".lmar_basic6_2").prop("checked", false);
      $(".lmar_basic6_3").prop("checked", false);
      $(".lmar_basic6_4").prop("checked", false);
      $(".lmar_basic6_5").prop("checked", false);
      $(".lmar_basic6_6").prop("checked", false);
      $(".lmar_basic6_7").prop("checked", false);
      $(".lmar_basic6_8").prop("checked", false);


      $('.checkall7').prop("checked", false);
      $(".lmar_basic7_1").prop("checked", false);
      $(".lmar_basic7_2").prop("checked", false);
      $(".lmar_basic7_3").prop("checked", false);
      $(".lmar_basic7_4").prop("checked", false);
      $(".lmar_basic7_5").prop("checked", false);
      $(".lmar_basic7_6").prop("checked", false);
      $(".lmar_basic7_7").prop("checked", false);
      $(".lmar_basic7_8").prop("checked", false);

      
      $('.checkall8').prop("checked", false);
      $(".lmar_basic8_1").prop("checked", false);
      $(".lmar_basic8_2").prop("checked", false);
      $(".lmar_basic8_3").prop("checked", false);
      $(".lmar_basic8_4").prop("checked", false);
      $(".lmar_basic8_5").prop("checked", false);
      $(".lmar_basic8_6").prop("checked", false);
      $(".lmar_basic8_7").prop("checked", false);
      $(".lmar_basic8_8").prop("checked", false);

            
      $('.checkall9').prop("checked", false);
      $(".lmar_basic9_1").prop("checked", false);
      $(".lmar_basic9_2").prop("checked", false);
      $(".lmar_basic9_3").prop("checked", false);
      $(".lmar_basic9_4").prop("checked", false);
      $(".lmar_basic9_5").prop("checked", false);
      $(".lmar_basic9_6").prop("checked", false);
      $(".lmar_basic9_7").prop("checked", false);
      $(".lmar_basic9_8").prop("checked", false);

    
    }   
    
    
  });

  
  var checkall1 = $('.checkall1'); 

  checkall1.on('change',function(){
      if (this.checked) {
      $(".lmar_basic1_1").prop("checked", true);
      $(".lmar_basic1_2").prop("checked", true);
      $(".lmar_basic1_3").prop("checked", true);
      $(".lmar_basic1_4").prop("checked", true);
      $(".lmar_basic1_5").prop("checked", true);
      $(".lmar_basic1_6").prop("checked", true);
      $(".lmar_basic1_7").prop("checked", true);
      $(".lmar_basic1_8").prop("checked", true);




    } 
    else{
      $(".lmar_basic1_1").prop("checked", false);
      $(".lmar_basic1_2").prop("checked", false);
      $(".lmar_basic1_3").prop("checked", false);
      $(".lmar_basic1_4").prop("checked", false);
      $(".lmar_basic1_5").prop("checked", false);
      $(".lmar_basic1_6").prop("checked", false);
      $(".lmar_basic1_7").prop("checked", false);
      $(".lmar_basic1_8").prop("checked", false);


      console.log('wow')
    }   
    
    
  });


      
  var checkall2 = $('.checkall2'); 

  checkall2.on('change',function(){
      if (this.checked) {
      $(".lmar_basic2_1").prop("checked", true);
      $(".lmar_basic2_2").prop("checked", true);
      $(".lmar_basic2_3").prop("checked", true);
      $(".lmar_basic2_4").prop("checked", true);
      $(".lmar_basic2_5").prop("checked", true);
      $(".lmar_basic2_6").prop("checked", true);
      $(".lmar_basic2_7").prop("checked", true);
      $(".lmar_basic2_8").prop("checked", true);
      



    } 
    else{
      $(".lmar_basic2_1").prop("checked", false);
      $(".lmar_basic2_2").prop("checked", false);
      $(".lmar_basic2_3").prop("checked", false);
      $(".lmar_basic2_4").prop("checked", false);
      $(".lmar_basic2_5").prop("checked", false);
      $(".lmar_basic2_6").prop("checked", false);
      $(".lmar_basic2_7").prop("checked", false);
      $(".lmar_basic2_8").prop("checked", false);
      


      console.log('wow')
    }   
    
    
  });

          
  var checkall3 = $('.checkall3'); 

  checkall3.on('change',function(){
    if (this.checked) {
      $(".lmar_basic3_1").prop("checked", true);
      $(".lmar_basic3_2").prop("checked", true);
      $(".lmar_basic3_3").prop("checked", true);
      $(".lmar_basic3_4").prop("checked", true);
      $(".lmar_basic3_5").prop("checked", true);
      $(".lmar_basic3_6").prop("checked", true);
      $(".lmar_basic3_7").prop("checked", true);
      $(".lmar_basic3_8").prop("checked", true);


    } 
    else{
      $(".lmar_basic3_1").prop("checked", false);
      $(".lmar_basic3_2").prop("checked", false);
      $(".lmar_basic3_3").prop("checked", false);
      $(".lmar_basic3_4").prop("checked", false);
      $(".lmar_basic3_5").prop("checked", false);
      $(".lmar_basic3_6").prop("checked", false);
      $(".lmar_basic3_7").prop("checked", false);
      $(".lmar_basic3_8").prop("checked", false);

      console.log('wow')
    }   
    
    
  });


  var checkall4 = $('.checkall4'); 

  checkall4.on('change',function(){
      if (this.checked) {
      $(".lmar_basic4_1").prop("checked", true);
      $(".lmar_basic4_2").prop("checked", true);
      $(".lmar_basic4_3").prop("checked", true);
      $(".lmar_basic4_4").prop("checked", true);
      $(".lmar_basic4_5").prop("checked", true);
      $(".lmar_basic4_6").prop("checked", true);
      $(".lmar_basic4_7").prop("checked", true);
      $(".lmar_basic4_8").prop("checked", true);
    } 
    else{
      $(".lmar_basic4_1").prop("checked", false);
      $(".lmar_basic4_2").prop("checked", false);
      $(".lmar_basic4_3").prop("checked", false);
      $(".lmar_basic4_4").prop("checked", false);
      $(".lmar_basic4_5").prop("checked", false);
      $(".lmar_basic4_6").prop("checked", false);
      $(".lmar_basic4_7").prop("checked", false);
      $(".lmar_basic4_8").prop("checked", false);
      console.log('wow')
    }   
    
    
  });

  
  var checkall5 = $('.checkall5'); 

  checkall5.on('change',function(){
      if (this.checked) {
      $(".lmar_basic5_1").prop("checked", true);
      $(".lmar_basic5_2").prop("checked", true);
      $(".lmar_basic5_3").prop("checked", true);
      $(".lmar_basic5_4").prop("checked", true);
      $(".lmar_basic5_5").prop("checked", true);
      $(".lmar_basic5_6").prop("checked", true);
      $(".lmar_basic5_7").prop("checked", true);
      $(".lmar_basic5_8").prop("checked", true);
    } 
    else{
      $(".lmar_basic5_1").prop("checked", false);
      $(".lmar_basic5_2").prop("checked", false);
      $(".lmar_basic5_3").prop("checked", false);
      $(".lmar_basic5_4").prop("checked", false);
      $(".lmar_basic5_5").prop("checked", false);
      $(".lmar_basic5_6").prop("checked", false);
      $(".lmar_basic5_7").prop("checked", false);
      $(".lmar_basic5_8").prop("checked", false);

      console.log('wow')
    }   
    
    
  });

  var checkall6 = $('.checkall6'); 

checkall6.on('change',function(){
    if (this.checked) {
    $(".lmar_basic6_1").prop("checked", true);
    $(".lmar_basic6_2").prop("checked", true);
    $(".lmar_basic6_3").prop("checked", true);
    $(".lmar_basic6_4").prop("checked", true);
    $(".lmar_basic6_5").prop("checked", true);
    $(".lmar_basic6_6").prop("checked", true);
    $(".lmar_basic6_7").prop("checked", true);
    $(".lmar_basic6_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic6_1").prop("checked", false);
    $(".lmar_basic6_2").prop("checked", false);
    $(".lmar_basic6_3").prop("checked", false);
    $(".lmar_basic6_4").prop("checked", false);
    $(".lmar_basic6_5").prop("checked", false);
    $(".lmar_basic6_6").prop("checked", false);
    $(".lmar_basic6_7").prop("checked", false);
    $(".lmar_basic6_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});

var checkall7 = $('.checkall7'); 

checkall7.on('change',function(){
    if (this.checked) {
    $(".lmar_basic7_1").prop("checked", true);
    $(".lmar_basic7_2").prop("checked", true);
    $(".lmar_basic7_3").prop("checked", true);
    $(".lmar_basic7_4").prop("checked", true);
    $(".lmar_basic7_5").prop("checked", true);
    $(".lmar_basic7_6").prop("checked", true);
    $(".lmar_basic7_7").prop("checked", true);
    $(".lmar_basic7_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic7_1").prop("checked", false);
    $(".lmar_basic7_2").prop("checked", false);
    $(".lmar_basic7_3").prop("checked", false);
    $(".lmar_basic7_4").prop("checked", false);
    $(".lmar_basic7_5").prop("checked", false);
    $(".lmar_basic7_6").prop("checked", false);
    $(".lmar_basic7_7").prop("checked", false);
    $(".lmar_basic7_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});

var checkall8 = $('.checkall8'); 

checkall8.on('change',function(){
    if (this.checked) {
    $(".lmar_basic8_1").prop("checked", true);
    $(".lmar_basic8_2").prop("checked", true);
    $(".lmar_basic8_3").prop("checked", true);
    $(".lmar_basic8_4").prop("checked", true);
    $(".lmar_basic8_5").prop("checked", true);
    $(".lmar_basic8_6").prop("checked", true);
    $(".lmar_basic8_7").prop("checked", true);
    $(".lmar_basic8_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic8_1").prop("checked", false);
    $(".lmar_basic8_2").prop("checked", false);
    $(".lmar_basic8_3").prop("checked", false);
    $(".lmar_basic8_4").prop("checked", false);
    $(".lmar_basic8_5").prop("checked", false);
    $(".lmar_basic8_6").prop("checked", false);
    $(".lmar_basic8_7").prop("checked", false);
    $(".lmar_basic8_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});

var checkall9 = $('.checkall9'); 

checkall9.on('change',function(){
    if (this.checked) {
    $(".lmar_basic9_1").prop("checked", true);
    $(".lmar_basic9_2").prop("checked", true);
    $(".lmar_basic9_3").prop("checked", true);
    $(".lmar_basic9_4").prop("checked", true);
    $(".lmar_basic9_5").prop("checked", true);
    $(".lmar_basic9_6").prop("checked", true);
    $(".lmar_basic9_7").prop("checked", true);
    $(".lmar_basic9_8").prop("checked", true);
  } 
  else{
    $(".lmar_basic9_1").prop("checked", false);
    $(".lmar_basic9_2").prop("checked", false);
    $(".lmar_basic9_3").prop("checked", false);
    $(".lmar_basic9_4").prop("checked", false);
    $(".lmar_basic9_5").prop("checked", false);
    $(".lmar_basic9_6").prop("checked", false);
    $(".lmar_basic9_7").prop("checked", false);
    $(".lmar_basic9_8").prop("checked", false);

    console.log('wow')
  }   
  
  
});



  
  // if(trainee.lmar_eimncii_basic1_1 == '/' && trainee.lmar_eimncii_basic1_2 == '/' && trainee.lmar_eimncii_basic1_3 == '/' && trainee.lmar_eimncii_basic1_4 == '/' && trainee.lmar_eimncii_basic2_1 == '/' && trainee.lmar_eimncii_common2_2== '/' && trainee.lmar_eimncii_common2_3 == '/' && trainee.lmar_eimncii_common3_1 == '/' && trainee.lmar_eimncii_common3_2 == '/' && trainee.lmar_eimncii_common3_3 == '/' && trainee.lmar_eimncii_common3_4 == '/' && trainee.lmar_eimncii_common4_1 == '/' && trainee.lmar_eimncii_common4_2 == '/' && trainee.lmar_eimncii_common4_3 == '/' && trainee.lmar_eimncii_common5_1 == '/' && trainee.lmar_eimncii_common5_2 == '/' && trainee.lmar_eimncii_common5_3 == '/'){


  //   $(".checkall").prop("checked", true);
  //   console.log('now')
  // }
  // else{
  //   $(".checkall").prop("checked", false);
  //   console.log('nows')
  // }
  var finalelemcom1
  var finalelemcom2
  var finalelemcom3
  var finalelemcom4
  var finalelemcom5
  var finalelemcom6
  var finalelemcom7
  var finalelemcom8
  var finalelemcom9


  <?php
$countperquery = "SELECT lmar_element_unit,COUNT(lmar_element_unit) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '$basiccompentencies' GROUP BY (lmar_element_unit)";
$countpersql = mysqli_query($connection, $countperquery);
$elementsloopings = 1;
while($countss = mysqli_fetch_array($countpersql)){ 
    $counting = $countss["totalelem"];
    $countloop = 1;
    while($countloop <= $counting){ ?>
      if(trainee.lmar_basic<?=$elementsloopings?>_<?=$countloop?> == '/'){

      }
      else{
        finalelemcom<?=$elementsloopings?> = 'uncheking'
      }


     <?php
    $countloop++;
    }
    $countloop = 1;

    $elementsloopings++;
}

 ?>


console.log(finalelemcom1)
if(finalelemcom1 == 'uncheking'){
    $(".checkall1").prop("checked", false);
    }
    else{
      $(".checkall1").prop("checked", true);
    }

if(finalelemcom2 == 'uncheking'){
$(".checkall2").prop("checked", false);
}
else{
  $(".checkall2").prop("checked", true);
}

if(finalelemcom3 == 'uncheking'){
    $(".checkall3").prop("checked", false);
    }
    else{
      $(".checkall3").prop("checked", true);
    }

    if(finalelemcom4 == 'uncheking'){
    $(".checkall4").prop("checked", false);
    }
    else{
      $(".checkall4").prop("checked", true);
    }

    if(finalelemcom5 == 'uncheking'){
    $(".checkall5").prop("checked", false);
    }
    else{
      $(".checkall5").prop("checked", true);
    }

    if(finalelemcom6 == 'uncheking'){
    $(".checkall6").prop("checked", false);
    }
    else{
      $(".checkall6").prop("checked", true);
    }

    if(finalelemcom7 == 'uncheking'){
    $(".checkall7").prop("checked", false);
    }
    else{
      $(".checkall7").prop("checked", true);
    }


    if(finalelemcom8 == 'uncheking'){
    $(".checkall8").prop("checked", false);
    }
    else{
      $(".checkall8").prop("checked", true);
    }


    if(finalelemcom9 == 'uncheking'){
    $(".checkall9").prop("checked", false);
    }
    else{
      $(".checkall9").prop("checked", true);
    }

    if(finalelemcom1 == 'uncheking' || finalelemcom2 == 'uncheking' || finalelemcom3 == 'uncheking' || finalelemcom4 == 'uncheking' || finalelemcom5 == 'uncheking' || finalelemcom6 == 'uncheking' || finalelemcom7 == 'uncheking' || finalelemcom8 == 'uncheking' || finalelemcom9 == 'uncheking'){
      $(".checkall").prop("checked", false);
      console.log('uncheckall')
    }
    else{
      $(".checkall").prop("checked", true);
      console.log('checkall')

    }
  // if(trainee.lmar_basic1_1 == '/' && trainee.lmar_basic1_2 == '/' && trainee.lmar_basic1_3 == '/'){

  //   $(".checkall1").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall1").prop("checked", false);


  //   console.log('nows')
  // }


  // if(trainee.lmar_eimncii_common2_1 == '/' && trainee.lmar_eimncii_common2_2 == '/' && trainee.lmar_eimncii_common2_3 == '/' ){

  //   $(".checkall2").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall2").prop("checked", false);


  //   console.log('nows')
  // }


  // if(trainee.lmar_eimncii_common3_1 == '/' && trainee.lmar_eimncii_common3_2 == '/' && trainee.lmar_eimncii_common3_3 == '/' && trainee.lmar_eimncii_common3_4 == '/' ){

  //   $(".checkall3").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall3").prop("checked", false);


  //   console.log('nows')
  // }


  // if(trainee.lmar_eimncii_common4_1 == '/' && trainee.lmar_eimncii_common4_2 == '/' && trainee.lmar_eimncii_common4_3 == '/' ){

  //   $(".checkall4").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall4").prop("checked", false);


  //   console.log('nows')
  // }

  // if(trainee.lmar_eimncii_common5_1 == '/' && trainee.lmar_eimncii_common5_2 == '/' && trainee.lmar_eimncii_common5_3 == '/' ){

  //   $(".checkall5").prop("checked", true);



  //   console.log('now')
  // }
  // else{
  //   $(".checkall5").prop("checked", false);


  //   console.log('nows')
  // }




  
  if(trainee.lmar_basic1_1 == '/'){
    $(".lmar_basic1_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_1").prop("checked", false);
    console.log('grrnows')
  }

  if(trainee.lmar_basic1_2 == '/'){
    $(".lmar_basic1_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic1_3 == '/'){
    $(".lmar_basic1_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic1_4 == '/'){
    $(".lmar_basic1_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic1_5 == '/'){
    $(".lmar_basic1_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic1_6 == '/'){
    $(".lmar_basic1_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic1_7 == '/'){
    $(".lmar_basic1_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic1_8 == '/'){
    $(".lmar_basic1_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic1_8").prop("checked", false);
    console.log('nows')
  }
 




  if(trainee.lmar_basic2_1 == '/'){
    $(".lmar_basic2_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_2 == '/'){
    $(".lmar_basic2_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_3 == '/'){
    $(".lmar_basic2_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_4 == '/'){
    $(".lmar_basic2_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic2_5 == '/'){
    $(".lmar_basic2_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic2_6 == '/'){
    $(".lmar_basic2_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic2_7 == '/'){
    $(".lmar_basic2_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic2_8 == '/'){
    $(".lmar_basic2_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic2_8").prop("checked", false);
    console.log('nows')
  }






  if(trainee.lmar_basic3_1 == '/'){
    $(".lmar_basic3_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_2 == '/'){
    $(".lmar_basic3_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_3 == '/'){
    $(".lmar_basic3_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_4 == '/'){
    $(".lmar_basic3_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic3_5 == '/'){
    $(".lmar_basic3_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic3_6 == '/'){
    $(".lmar_basic3_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic3_7 == '/'){
    $(".lmar_basic3_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic3_8 == '/'){
    $(".lmar_basic3_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic3_8").prop("checked", false);
    console.log('nows')
  }





  
  if(trainee.lmar_basic4_1 == '/'){
    $(".lmar_basic4_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_2 == '/'){
    $(".lmar_basic4_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_3 == '/'){
    $(".lmar_basic4_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_4 == '/'){
    $(".lmar_basic4_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic4_5 == '/'){
    $(".lmar_basic4_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic4_6 == '/'){
    $(".lmar_basic4_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic4_7 == '/'){
    $(".lmar_basic4_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic4_8 == '/'){
    $(".lmar_basic4_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic4_8").prop("checked", false);
    console.log('nows')
  }


  if(trainee.lmar_basic5_1 == '/'){
    $(".lmar_basic5_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_2 == '/'){
    $(".lmar_basic5_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_3 == '/'){
    $(".lmar_basic5_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_4 == '/'){
    $(".lmar_basic5_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic5_5 == '/'){
    $(".lmar_basic5_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic5_6 == '/'){
    $(".lmar_basic5_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic5_7 == '/'){
    $(".lmar_basic5_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic5_8 == '/'){
    $(".lmar_basic5_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic5_8").prop("checked", false);
    console.log('nows')
  }


  if(trainee.lmar_basic6_1 == '/'){
    $(".lmar_basic6_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_2 == '/'){
    $(".lmar_basic6_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_3 == '/'){
    $(".lmar_basic6_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_4 == '/'){
    $(".lmar_basic6_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic6_5 == '/'){
    $(".lmar_basic6_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic6_6 == '/'){
    $(".lmar_basic6_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic6_7 == '/'){
    $(".lmar_basic6_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic6_8 == '/'){
    $(".lmar_basic6_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic6_8").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_1 == '/'){
    $(".lmar_basic7_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_2 == '/'){
    $(".lmar_basic7_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_3 == '/'){
    $(".lmar_basic7_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_4 == '/'){
    $(".lmar_basic7_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic7_5 == '/'){
    $(".lmar_basic7_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic7_6 == '/'){
    $(".lmar_basic7_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic7_7 == '/'){
    $(".lmar_basic7_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic7_8 == '/'){
    $(".lmar_basic7_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic7_8").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_1 == '/'){
    $(".lmar_basic8_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_2 == '/'){
    $(".lmar_basic8_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_3 == '/'){
    $(".lmar_basic8_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_4 == '/'){
    $(".lmar_basic8_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_5 == '/'){
    $(".lmar_basic8_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_6 == '/'){
    $(".lmar_basic8_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic8_7 == '/'){
    $(".lmar_basic8_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic8_8 == '/'){
    $(".lmar_basic8_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic8_8").prop("checked", false);
    console.log('nows')
  }


  if(trainee.lmar_basic9_1 == '/'){
    $(".lmar_basic9_1").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_1").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_2 == '/'){
    $(".lmar_basic9_2").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_2").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_3 == '/'){
    $(".lmar_basic9_3").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_3").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_4 == '/'){
    $(".lmar_basic9_4").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_4").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic9_5 == '/'){
    $(".lmar_basic9_5").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_5").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic9_6 == '/'){
    $(".lmar_basic9_6").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_6").prop("checked", false);
    console.log('nows')
  }
  if(trainee.lmar_basic9_7 == '/'){
    $(".lmar_basic9_7").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_7").prop("checked", false);
    console.log('nows')
  }

  if(trainee.lmar_basic9_8 == '/'){
    $(".lmar_basic9_8").prop("checked", true);
    console.log('now')
  }
  else{
    $(".lmar_basic9_8").prop("checked", false);
    console.log('nows')
  }
  console.log(trainessid)

  let edit_basic = 'edit_basic';
  $('#updatecom').on('click',function(){


    var isChecked1_1 = $('.lmar_basic1_1').is(':checked'); 
    var isChecked1_2 = $('.lmar_basic1_2').is(':checked'); 
    var isChecked1_3 = $('.lmar_basic1_3').is(':checked'); 
    var isChecked1_4 = $('.lmar_basic1_4').is(':checked');
    var isChecked1_5 = $('.lmar_basic1_5').is(':checked');
    var isChecked1_6 = $('.lmar_basic1_6').is(':checked');
    var isChecked1_7 = $('.lmar_basic1_7').is(':checked');
    var isChecked1_8 = $('.lmar_basic1_8').is(':checked');

    var isChecked2_1 = $('.lmar_basic2_1').is(':checked'); 
    var isChecked2_2 = $('.lmar_basic2_2').is(':checked'); 
    var isChecked2_3 = $('.lmar_basic2_3').is(':checked'); 
    var isChecked2_4 = $('.lmar_basic2_4').is(':checked');
    var isChecked2_5 = $('.lmar_basic2_5').is(':checked');
    var isChecked2_6 = $('.lmar_basic2_6').is(':checked');
    var isChecked2_7 = $('.lmar_basic2_7').is(':checked');
    var isChecked2_8 = $('.lmar_basic2_8').is(':checked');

    var isChecked3_1 = $('.lmar_basic3_1').is(':checked'); 
    var isChecked3_2 = $('.lmar_basic3_2').is(':checked'); 
    var isChecked3_3 = $('.lmar_basic3_3').is(':checked'); 
    var isChecked3_4 = $('.lmar_basic3_4').is(':checked');
    var isChecked3_5 = $('.lmar_basic3_5').is(':checked');
    var isChecked3_6 = $('.lmar_basic3_6').is(':checked');
    var isChecked3_7 = $('.lmar_basic3_7').is(':checked');
    var isChecked3_8 = $('.lmar_basic3_8').is(':checked');

    var isChecked4_1 = $('.lmar_basic4_1').is(':checked'); 
    var isChecked4_2 = $('.lmar_basic4_2').is(':checked'); 
    var isChecked4_3 = $('.lmar_basic4_3').is(':checked'); 
    var isChecked4_4 = $('.lmar_basic4_4').is(':checked');
    var isChecked4_5 = $('.lmar_basic4_5').is(':checked');
    var isChecked4_6 = $('.lmar_basic4_6').is(':checked');
    var isChecked4_7 = $('.lmar_basic4_7').is(':checked');
    var isChecked4_8 = $('.lmar_basic4_8').is(':checked');

    var isChecked5_1 = $('.lmar_basic5_1').is(':checked'); 
    var isChecked5_2 = $('.lmar_basic5_2').is(':checked'); 
    var isChecked5_3 = $('.lmar_basic5_3').is(':checked'); 
    var isChecked5_4 = $('.lmar_basic5_4').is(':checked');
    var isChecked5_5 = $('.lmar_basic5_5').is(':checked');
    var isChecked5_6 = $('.lmar_basic5_6').is(':checked');
    var isChecked5_7 = $('.lmar_basic5_7').is(':checked');
    var isChecked5_8 = $('.lmar_basic5_8').is(':checked');

    var isChecked6_1 = $('.lmar_basic6_1').is(':checked'); 
    var isChecked6_2 = $('.lmar_basic6_2').is(':checked'); 
    var isChecked6_3 = $('.lmar_basic6_3').is(':checked'); 
    var isChecked6_4 = $('.lmar_basic6_4').is(':checked');
    var isChecked6_5 = $('.lmar_basic6_5').is(':checked');
    var isChecked6_6 = $('.lmar_basic6_6').is(':checked');
    var isChecked6_7 = $('.lmar_basic6_7').is(':checked');
    var isChecked6_8 = $('.lmar_basic6_8').is(':checked');


    var isChecked7_1 = $('.lmar_basic7_1').is(':checked'); 
    var isChecked7_2 = $('.lmar_basic7_2').is(':checked'); 
    var isChecked7_3 = $('.lmar_basic7_3').is(':checked'); 
    var isChecked7_4 = $('.lmar_basic7_4').is(':checked');
    var isChecked7_5 = $('.lmar_basic7_5').is(':checked');
    var isChecked7_6 = $('.lmar_basic7_6').is(':checked');
    var isChecked7_7 = $('.lmar_basic7_7').is(':checked');
    var isChecked7_8 = $('.lmar_basic7_8').is(':checked');


    var isChecked8_1 = $('.lmar_basic8_1').is(':checked'); 
    var isChecked8_2 = $('.lmar_basic8_2').is(':checked'); 
    var isChecked8_3 = $('.lmar_basic8_3').is(':checked'); 
    var isChecked8_4 = $('.lmar_basic8_4').is(':checked');
    var isChecked8_5 = $('.lmar_basic8_5').is(':checked');
    var isChecked8_6 = $('.lmar_basic8_6').is(':checked');
    var isChecked8_7 = $('.lmar_basic8_7').is(':checked');
    var isChecked8_8 = $('.lmar_basic8_8').is(':checked');

    var isChecked9_1 = $('.lmar_basic9_1').is(':checked'); 
    var isChecked9_2 = $('.lmar_basic9_2').is(':checked'); 
    var isChecked9_3 = $('.lmar_basic9_3').is(':checked'); 
    var isChecked9_4 = $('.lmar_basic9_4').is(':checked');
    var isChecked9_5 = $('.lmar_basic9_5').is(':checked');
    var isChecked9_6 = $('.lmar_basic9_6').is(':checked');
    var isChecked9_7 = $('.lmar_basic9_7').is(':checked');
    var isChecked9_8 = $('.lmar_basic9_8').is(':checked');


    if(isChecked1_1 == true){
      com1_1 = '/'
    }
    else{
      com1_1 = ''
    }
    if(isChecked1_2 == true){
      com1_2 = '/'
    }
    else{
      com1_2 = ''
    }
    if(isChecked1_3 == true){
      com1_3 = '/'
    }
    else{
      com1_3 = ''
    }
    if(isChecked1_4 == true){
      com1_4 = '/'
    }
    else{
      com1_4 = ''
    }
    if(isChecked1_5 == true){
      com1_5 = '/'
    }
    else{
      com1_5 = ''
    }
    if(isChecked1_6 == true){
      com1_6 = '/'
    }
    else{
      com1_6 = ''
    }
    if(isChecked1_7 == true){
      com1_7 = '/'
    }
    else{
      com1_7 = ''
    }

    if(isChecked1_8 == true){
      com1_8 = '/'
    }
    else{
      com1_8 = ''
    }

    if(isChecked2_1 == true){
      com2_1 = '/'
    }
    else{
      com2_1 = ''
    }
    if(isChecked2_2 == true){
      com2_2 = '/'
    }
    else{
      com2_2 = ''
    }
    if(isChecked2_3 == true){
      com2_3 = '/'
    }
    else{
      com2_3 = ''
    }
    if(isChecked2_4 == true){
      com2_4 = '/'
    }
    else{
      com2_4 = ''
    }
    if(isChecked2_5 == true){
      com2_5 = '/'
    }
    else{
      com2_5 = ''
    }
    if(isChecked2_6 == true){
      com2_6 = '/'
    }
    else{
      com2_6 = ''
    }
    if(isChecked2_7 == true){
      com2_7 = '/'
    }
    else{
      com2_7 = ''
    }

    if(isChecked2_8 == true){
      com2_8 = '/'
    }
    else{
      com2_8 = ''
    }


    if(isChecked3_1 == true){
      com3_1 = '/'
    }
    else{
      com3_1 = ''
    }
    if(isChecked3_2 == true){
      com3_2 = '/'
    }
    else{
      com3_2 = ''
    }
    if(isChecked3_3 == true){
      com3_3 = '/'
    }
    else{
      com3_3 = ''
    }
    if(isChecked3_4 == true){
      com3_4 = '/'
    }
    else{
      com3_4 = ''
    }
    if(isChecked3_5 == true){
      com3_5 = '/'
    }
    else{
      com3_5 = ''
    }
    if(isChecked3_6 == true){
      com3_6 = '/'
    }
    else{
      com3_6 = ''
    }
    if(isChecked3_7 == true){
      com3_7 = '/'
    }
    else{
      com3_7 = ''
    }

    if(isChecked3_8 == true){
      com3_8 = '/'
    }
    else{
      com3_8 = ''
    }


    if(isChecked4_1 == true){
      com4_1 = '/'
    }
    else{
      com4_1 = ''
    }
    if(isChecked4_2 == true){
      com4_2 = '/'
    }
    else{
      com4_2 = ''
    }
    if(isChecked4_3 == true){
      com4_3 = '/'
    }
    else{
      com4_3 = ''
    }
    if(isChecked4_4 == true){
      com4_4 = '/'
    }
    else{
      com4_4 = ''
    }
    if(isChecked4_5 == true){
      com4_5 = '/'
    }
    else{
      com4_5 = ''
    }
    if(isChecked4_6 == true){
      com4_6 = '/'
    }
    else{
      com4_6 = ''
    }
    if(isChecked4_7 == true){
      com4_7 = '/'
    }
    else{
      com4_7 = ''
    }

    if(isChecked4_8 == true){
      com4_8 = '/'
    }
    else{
      com4_8 = ''
    }


    if(isChecked5_1 == true){
      com5_1 = '/'
    }
    else{
      com5_1 = ''
    }
    if(isChecked5_2 == true){
      com5_2 = '/'
    }
    else{
      com5_2 = ''
    }
    if(isChecked5_3 == true){
      com5_3 = '/'
    }
    else{
      com5_3 = ''
    }
    if(isChecked5_4 == true){
      com5_4 = '/'
    }
    else{
      com5_4 = ''
    }
    if(isChecked5_5 == true){
      com5_5 = '/'
    }
    else{
      com5_5 = ''
    }
    if(isChecked5_6 == true){
      com5_6 = '/'
    }
    else{
      com5_6 = ''
    }
    if(isChecked5_7 == true){
      com5_7 = '/'
    }
    else{
      com5_7 = ''
    }

    if(isChecked5_8 == true){
      com5_8 = '/'
    }
    else{
      com5_8 = ''
    }



    if(isChecked6_1 == true){
      com6_1 = '/'
    }
    else{
      com6_1 = ''
    }
    if(isChecked6_2 == true){
      com6_2 = '/'
    }
    else{
      com6_2 = ''
    }
    if(isChecked6_3 == true){
      com6_3 = '/'
    }
    else{
      com6_3 = ''
    }
    if(isChecked6_4 == true){
      com6_4 = '/'
    }
    else{
      com6_4 = ''
    }
    if(isChecked6_5 == true){
      com6_5 = '/'
    }
    else{
      com6_5 = ''
    }
    if(isChecked6_6 == true){
      com6_6 = '/'
    }
    else{
      com6_6 = ''
    }
    if(isChecked6_7 == true){
      com6_7 = '/'
    }
    else{
      com6_7 = ''
    }

    if(isChecked6_8 == true){
      com6_8 = '/'
    }
    else{
      com6_8 = ''
    }

    if(isChecked7_1 == true){
      com7_1 = '/'
    }
    else{
      com7_1 = ''
    }
    if(isChecked7_2 == true){
      com7_2 = '/'
    }
    else{
      com7_2 = ''
    }
    if(isChecked7_3 == true){
      com7_3 = '/'
    }
    else{
      com7_3 = ''
    }
    if(isChecked7_4 == true){
      com7_4 = '/'
    }
    else{
      com7_4 = ''
    }
    if(isChecked7_5 == true){
      com7_5 = '/'
    }
    else{
      com7_5 = ''
    }
    if(isChecked7_6 == true){
      com7_6 = '/'
    }
    else{
      com7_6 = ''
    }
    if(isChecked7_7 == true){
      com7_7 = '/'
    }
    else{
      com7_7 = ''
    }

    if(isChecked7_8 == true){
      com7_8 = '/'
    }
    else{
      com7_8 = ''
    }

    if(isChecked8_1 == true){
      com8_1 = '/'
    }
    else{
      com8_1 = ''
    }
    if(isChecked8_2 == true){
      com8_2 = '/'
    }
    else{
      com8_2 = ''
    }
    if(isChecked8_3 == true){
      com8_3 = '/'
    }
    else{
      com8_3 = ''
    }
    if(isChecked8_4 == true){
      com8_4 = '/'
    }
    else{
      com8_4 = ''
    }
    if(isChecked8_5 == true){
      com8_5 = '/'
    }
    else{
      com8_5 = ''
    }
    if(isChecked8_6 == true){
      com8_6 = '/'
    }
    else{
      com8_6 = ''
    }
    if(isChecked8_7 == true){
      com8_7 = '/'
    }
    else{
      com8_7 = ''
    }

    if(isChecked8_8 == true){
      com8_8 = '/'
    }
    else{
      com8_8 = ''
    }

    if(isChecked9_1 == true){
      com9_1 = '/'
    }
    else{
      com9_1 = ''
    }
    if(isChecked9_2 == true){
      com9_2 = '/'
    }
    else{
      com9_2 = ''
    }
    if(isChecked9_3 == true){
      com9_3 = '/'
    }
    else{
      com9_3 = ''
    }
    if(isChecked9_4 == true){
      com9_4 = '/'
    }
    else{
      com9_4 = ''
    }
    if(isChecked9_5 == true){
      com9_5 = '/'
    }
    else{
      com9_5 = ''
    }
    if(isChecked9_6 == true){
      com9_6 = '/'
    }
    else{
      com9_6 = ''
    }
    if(isChecked9_7 == true){
      com9_7 = '/'
    }
    else{
      com9_7 = ''
    }

    if(isChecked9_8 == true){
      com9_8 = '/'
    }
    else{
      com9_8 = ''
    }

    var finalcom;

      // if(trainee.lmar_eimncii_common1_1 == '/' && trainee.lmar_eimncii_common1_2 == '/' && trainee.lmar_eimncii_common1_3 == '/' && trainee.lmar_eimncii_common1_4 == '/' && trainee.lmar_eimncii_common2_1 == '/' && trainee.lmar_eimncii_common2_2== '/' && trainee.lmar_eimncii_common2_3 == '/' && trainee.lmar_eimncii_common3_1 == '/' && trainee.lmar_eimncii_common3_2 == '/' && trainee.lmar_eimncii_common3_3 == '/' && trainee.lmar_eimncii_common3_4 == '/' && trainee.lmar_eimncii_common4_1 == '/' && trainee.lmar_eimncii_common4_2 == '/' && trainee.lmar_eimncii_common4_3 == '/' && trainee.lmar_eimncii_common5_1 == '/' && trainee.lmar_eimncii_common5_2 == '/' && trainee.lmar_eimncii_common5_3 == '/'){


  //   $(".checkall").prop("checked", true);
  //   console.log('now')
  // }
  // else{
  //   $(".checkall").prop("checked", false);
  //   console.log('nows')
  // }

    <?php 
        $stmt = "SELECT COUNT(lmar_element_id) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '$basiccompentencies'  ";
        $result = mysqli_query($connection, $stmt);
        
        if(mysqli_num_rows($result) > 0){
            $trow = mysqli_fetch_assoc($result);
            $_SESSION['totalelem'] = $trow["totalelem"];
              ?>
                <?php } 

          $loopchecking = '1';
          $loopelementing = '1';
          $selectingquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies' ";
          $selectingsql = mysqli_query($connection,$selectingquery);
          while($srow = mysqli_fetch_array($selectingsql)){ 
            $sunitid = $srow['lmar_unit_id']; ?>
            
        
      
          <?php    
          $elementingquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$sunitid' ";
          $elementingsql = mysqli_query($connection,$elementingquery);
          while($crowing = mysqli_fetch_array($elementingsql)){ ?>

          

       
          console.log(<?=$_SESSION['totalelem'] ?>)
          if(com<?=$loopchecking?>_<?=$loopelementing?> == '/'){
            console.log('yes'+<?=$loopchecking?>_<?=$loopelementing?>)
          }
          else{
            console.log('no'+<?=$loopchecking?>_<?=$loopelementing?>)
            finalcom = 'uncheck'
          }

          <?php
          $loopelementing++;
         } 
         
         $loopelementing = 1;
        $loopchecking++;  
        }
          ?>

    console.log(com1_3)
    console.log(com6_3)
    console.log(com5_3)

    console.log(com9_3)

    console.log(finalcom)
    var finalsend;
    if(finalcom == 'uncheck'){
      finalsend = ''
    }
    else{
      finalsend = '/'
    }
    console.log(finalsend)
    let edit_basic = 'edit_basic';
    $.ajax({
      url: 'connection_progresschart_eimncii.php',
      method :'post',
      data : {
      edit_basic:edit_basic,
        trainessid:trainessid,
        finalsend:finalsend,
        com1_1:com1_1,
        com1_2:com1_2,
        com1_3:com1_3,
        com1_4:com1_4,
        com1_5:com1_5,
        com1_6:com1_6,
        com1_7:com1_7,
        com1_8:com1_8,

        com2_1:com2_1,
        com2_2:com2_2,
        com2_3:com2_3,
        com2_4:com2_4,
        com2_5:com2_5,
        com2_6:com2_6,
        com2_7:com2_7,
        com2_8:com2_8,

        com3_1:com3_1,
        com3_2:com3_2,
        com3_3:com3_3,
        com3_4:com3_4,
        com3_5:com3_5,
        com3_6:com3_6,
        com3_7:com3_7,
        com3_8:com3_8,

        com4_1:com4_1,
        com4_2:com4_2,
        com4_3:com4_3,
        com4_4:com4_4,
        com4_5:com4_5,
        com4_6:com4_6,
        com4_7:com4_7,
        com4_8:com4_8,

        com5_1:com5_1,
        com5_2:com5_2,
        com5_3:com5_3,
        com5_4:com5_4,
        com5_5:com5_5,
        com5_6:com5_6,
        com5_7:com5_7,
        com5_8:com5_8,

        com6_1:com6_1,
        com6_2:com6_2,
        com6_3:com6_3,
        com6_4:com6_4,
        com6_5:com6_5,
        com6_6:com6_6,
        com6_7:com6_7,
        com6_8:com6_8,

        com7_1:com7_1,
        com7_2:com7_2,
        com7_3:com7_3,
        com7_4:com7_4,
        com7_5:com7_5,
        com7_6:com7_6,
        com7_7:com7_7,
        com7_8:com7_8,
        
        com8_1:com8_1,
        com8_2:com8_2,
        com8_3:com8_3,
        com8_4:com8_4,
        com8_5:com8_5,
        com8_6:com8_6,
        com8_7:com8_7,
        com8_8:com8_8,

        com9_1:com9_1,
        com9_2:com9_2,
        com9_3:com9_3,
        com9_4:com9_4,
        com9_5:com9_5,
        com9_6:com9_6,
        com9_7:com9_7,
        com9_8:com9_8,


      },success:function(response){
        console.log(response)
        if(response == '1'){
                        
        
        $('#updateModal').modal('hide')
    
          $('#successdeleteModal').modal('show');
          setTimeout(
            function() 
            {
              window.location.href ='basic_eimncii_progresschart.php'

            }, 1000);
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
   



  //  $('.update_data').on('click',function(){
  //   var trainessid = $(this).attr('id');
  //   var ups = $(this);
  //   console.log(trainessid)
    


  //   let update = 'update';
  //   $.ajax({
  //     url: 'printaction.php',
  //     method :'post',
  //     data : {
  //       update:update,
  //       trainessid:trainessid,
  //     },

  //     success:function(res){
  //       $('#updateModal').modal('show')
  //       console.log(res)  
       


 
  //       let viewtrs = JSON.parse(res)
  //             let rows = "";     
  //             for(viewtr of viewtrs){
  //               var middle = viewtr.MiddleName[0];
             
  //                 rows += `  
  //                 <div class="modal-header p-2 px-3">
  //                   <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
  //                   <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
  //                 </div>
  //                 <div class="modal-body">

                  
  //                 <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
  //                 <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>

  //                   <div class="form-check form-check-inline m-2">
  //                   <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
  //                   <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
  //                   </div>
  //                   <br>
  //                   <div class="form-check form-check-inline m-2">
  //                   <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
  //                   <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
  //                   </div>
  //                   <br>
  //                   <div class="form-check form-check-inline m-2">
  //                   <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
  //                   <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
  //                   </div>
  //                 </div>
  //                 <div class="modal-footer">
  //                   <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
  //                   <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
  //             </div>`
                
                 
                  
  //               }
  //               $('#update_detail').html(rows)
  //               var com1 = ''; 
  //               var com2 = ''; 
  //               var com3 = ''; 

  //               $('#updatecom').on('click',function(){
  //                 var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false


  //                 if(isChecked == true){
  //                   com1 = '1'
  //                 }
  //                 else{
  //                   com1 = '0'
  //                 }
            
  //                 var isChecked = $('.myCheckbox2').is(':checked'); // returns true or false


  //                 if(isChecked == true){
  //                   com2 = '1'
  //                 }
  //                 else{
  //                   com2 = '0'
  //                 }
  //                 var isChecked = $('.myCheckbox3').is(':checked'); // returns true or false


  //                 if(isChecked == true){
  //                   com3 = '1'
  //                 }
  //                 else{
  //                   com3 = '0'
  //                 }
  //                 console.log(com1)
  //                 console.log(com2)
  //                 console.log(com3)
  //                 console.log(trainessid)

  //                 let edit = 'edit';
  //                 $.ajax({
  //                   url:'printaction.php',
  //                   method:'post',
  //                   data:{
  //                     edit:edit,
  //                     trainessid:trainessid,
  //                     com1:com1,
  //                     com2:com2,
  //                     com3:com3,
             
  //                   },
  //                   success:function(editres){
  //                     console.log(editres)
  //                     let editrs = JSON.parse(editres)
  //                     console.log(editrs[0])
  //                     editrs1 = editrs[0]
  //                     editrs2 = editrs[1]
  //                     editrs3 = editrs[2]
  //                     $('#updateModal').modal('hide')
  //                     $('.success').toast('show');

  //                     if (editrs1 == 1){
  //                       ups.parent().siblings().eq(3).html('<i class="fas fa-check text-primary"></i>')
  //                     }
  //                     else {
  //                       console.log('nyaw')
  //                       ups.parent().siblings().eq(3).html('<i class="fas fa-times text-danger fw-bold"></i>')

  //                     }

  //                     if (editrs2 == 1){
  //                       ups.parent().siblings().eq(4).html('<i class="fas fa-check text-primary"></i>')
  //                     }
  //                     else {
  //                       console.log('nyaw')
  //                       ups.parent().siblings().eq(4).html('<i class="fas fa-times text-danger fw-bold"></i>')

  //                     }

  //                     if (editrs3 == 1){
  //                       ups.parent().siblings().eq(5).html('<i class="fas fa-check text-primary"></i>')
  //                     }
  //                     else {
  //                       console.log('nyaw')
  //                       ups.parent().siblings().eq(5).html('<i class="fas fa-times text-danger fw-bold"></i>')

  //                     }

           
                 

  //                   }
  //                 })




  //               })
        
  //     }

  //   })







 
  // })


// }   



//  },
// });
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