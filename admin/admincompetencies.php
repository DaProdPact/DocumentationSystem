<?php 
require('../php/database.php');

require('../link/header.html');

session_start();
$qualicompe = $_SESSION['quali_competencies'];


?>

    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>

      ::-webkit-scrollbar {
    display: none;
    }

    tr{
        height: 10px;
    }


    span:hover{
      color:#000;
    }
    


    </style>



    </head>
<body class="bg-secondary bg-opacity-25">
  <div class="row bg-secondary bg-opacity-25">
    <div class="col-2 pe-0">
      <?php require('../link/adminnavbar.php'); ?>
    </div>
<div class="col-10">
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

            <div class="dropdown">
                  <a
                    class="text-reset me-3 dropdown-toggle hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                  >


                    <i class="fas fa-bell fa-lg text-white text-opacity-75" style="font-size:1.5rem;"></i>
                  <?php
                  $countquery = "SELECT request_id,COUNT(request_id) FROM `sent_request` WHERE request_approve = '0' ";
                  $countsql = mysqli_query($connection,$countquery);
                  while($count= mysqli_fetch_assoc($countsql)){ ?>
                    <span
                      class="badge rounded-pill badge-notification bg-danger" style="font-size:.6rem;"
                      ><?=$count['COUNT(request_id)']?></span
                    >
                    
                    <?php } ?>



                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-end border border-0"
                    style="width:300px; background-color:#a8a1a1;"

                    aria-labelledby="navbarDropdownMenuLink"
                  >
                  <p class="ms-2 _responsive-description-detail myf-custome6-font fw-bold mt-1 text-white">Notification</p>
                  <hr>
<div class="row text-info border-0 convers rounded-1 position-relative" >
<?php

$selectrequestquery = "SELECT * FROM `sent_request` WHERE request_approve = '0'";
$selectrequestsql = mysqli_query($connection,$selectrequestquery);
if($selectrequestsql->num_rows > 0){
while($srrow = mysqli_fetch_array($selectrequestsql)){ ?>


  <div class="trainer_request col-1 mb-2">
  <a href="adminverificationrequest.php">
<img
  src="../php/profilepicture/<?=$srrow['request_profile']?>"
    class="rounded-5 border border-2 border-primary border-opacity-25 ms-2 imagenotification me-5"
    width="40"
    height="40"
    style="background-color:rgba(0, 162, 255, 0.671);"
  />
  </a>
</div>


<div class="trainer_request col-11 mb-2" id="<?=$srrow['request_trainer_id']?>">
<a href="adminverificationrequest.php">
<span class=" text-secondary h6 ms-4 mt-4 text-dark mb-0" style="padding-left:.6rem; font-size:1rem;"><?=$srrow['request_name']?>
    </span>
    <br>
   <span class="_responsive-description-detail myf-custome6-font text-secondary h6 ms-4 text-dark mb-0" style=" padding-left:.6rem; font-size:.8rem;">Sent Request 
    </span>
    </a>
</div>

<?php } } 
else { ?>





<div class="offset-2 col-8">
  <img
  src="../img/no-notifivation.jpg"
    class="rounded-5 imagechat opacity-50"
    width="180"
    height="180"
  />
</div>
<span class="_responsive-description-detail myf-custome6-font text-start h6 text-dark mb-3 text-center" style="font-size:12px;">No notification
    </span>


<?php } ?>
       


       </div>

       


           



                  </div>
                </div>



            <!-- Avatar -->
            <div class="dropdown d-flex">
              <?php 
                  $session_query = "SELECT * FROM admin_account WHERE admin_id = 1 " ;
    
                  $session_sql = mysqli_query($connection,$session_query);   
                  while($row = mysqli_fetch_array($session_sql)){


                  ?>
       
              
 

              <a  
                class="dropdown-toggle d-flex align-items-center hidden-arrow"
                href="#"
                id="navbarDropdownMenuAvatar"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
              >
              <img
              src="adminprofile/admin-removebg-preview.png"
              class="rounded-circle"
              height="30"
              loading="lazy"
              style="background-color: #fff;"
            />

           <p class=" mt-3 ms-3 text-white myf-custome6-font"> <?=$row['admin_name']?> </p>
            
      <!-- Notifications -->

           <?php } ?>
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
              <li>
                  <a class="dropdown-item" href="./adminprofile.php">Admin profile</a>
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
         <p
           class="myf-custome6-font text-primary h4 pt-1"
           
           >Competencies Type</p
         >
         <div class="d-flex w-auto gap-3">

            <a href="http://localhost/DocumentationSystem/admin/adminqualificationlist.php">
              <button class="btn text-white" style="background-color: #334a8bd0;">
              <i class="fas fa-circle-arrow-left"></i> &nbsp&nbsp Back</button>
            </a>
            
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
                 <input id="search-input" type="search" id="form1" name="searching" class="form-control" />
                 <input type="hidden" class="qualificationver" id="<?=$qualicompe?>">
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
         <th class="text-white">Competencies Type</th>
       </tr>
     </thead>
     <tbody id="table_body" class="bg-white">
    <?php
    if($qualicompe == '14'){ 
        $qualicompequery = "SELECT * FROM `baisc_competencies` WHERE bc_qualification = '$qualicompe' ";
        $qualicompsql = mysqli_query($connection,$qualicompequery);
        while($qualirow = mysqli_fetch_array($qualicompsql)){ 
        
        $_SESSION['basicunitcom'] = $qualirow['bc_nc'];
        ?>
        
        
        <tr>
            <td class="text-dark basic_comp" id="<?=$qualirow['bc_nc']?>">Basic Competencies</td>
        </tr>

       <?php } ?>
    

    <tr>
        <td class="text-dark common_comp">Common Competencies</td>
    </tr>
    <tr>
    <td class="text-dark core_comp">Core Competencies</td>
    </tr>
    <tr>
        <td class="text-dark">Elective Competencies</td>
    </tr>
    <tr>
    <td class="text-dark mission_comp">Mission</td>
    </tr>
    <tr>
    <td class="text-dark vision_comp">Vision</td>
    </tr>
    <tr>
    <td class="text-dark obj_comp">Objective</td>
    </tr>
    <tr>
    <td class="text-dark goal_comp">Goal</td>
    </tr>
    <?php
    }
    else{ 
            $qualicompequery = "SELECT * FROM `baisc_competencies` WHERE bc_qualification = '$qualicompe' ";
            $qualicompsql = mysqli_query($connection,$qualicompequery);
            while($qualirow = mysqli_fetch_array($qualicompsql)){ 
            
            $_SESSION['basicunitcom'] = $qualirow['bc_nc'];
            ?>
            
            
            <tr>
            <td class="text-dark basic_comp" id="<?=$qualirow['bc_nc']?>">Basic Competencies</td>
            </tr>
    
           <?php } ?>
           <tr>
    <td class="text-dark common_comp">Common Competencies</td>
    </tr>
    <tr>
    <td class="text-dark core_comp">Core Competencies</td>
    </tr>
    <tr>
    <td class="text-dark mission_comp">Mission</td>
    </tr>
    <tr>
    <td class="text-dark vision_comp">Vision</td>
    </tr>
    <tr>
    <td class="text-dark obj_comp">Objective</td>
    </tr>
    <tr>
    <td class="text-dark goal_comp">Goal</td>
    </tr>


    <?php } ?>


     </tbody>


  
   </table>


</div>

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


        <div
          class="modal fade"
          id="addbatchmodal"
          tabindex="-1"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary bg-opacity-75">
                
                <h5 class="modal-title text-white">
                  Add Qualification
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

                <div class="col-12">

  


</div>
                  <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="text" id="nttcno" class="form-control" />
                    <label class="form-label" for="nttcno">NTTC No.</label>
                    </div>
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

                <button type="button" class="btn btn-primary" id="added">
                  Add Batch
                </button>
              </div>
            </div>
          </div>
        </div>



        
          <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content" id="data_detail">
         

            </div>
          </div>
          </div>

            
          <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" class="form-control" id="addqualificationname" placeholder="Qualification Name">
                  </div>
                  
               </div>

               <div class="col-12">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="addqualificationcode" placeholder="Qualification Code">
                  </div>
               </div>

               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="addqualificationbtn">Add Qualification</button>
              </div>

            </div>
          </div>
          </div>


          <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="remove_details">
           
              </div>
            </div>
          </div>

          


          <div class="modal fade" id="successdeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="background-color: #ed3e3e;">
            <div class="row">

              <p class="text-white myf-custom4-font h4" style="font-size:20px;"> Delete Successfully</p>

          </div>


      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="successAddedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="background-color: #4285f4;">
            <div class="row">

              <p class="text-white myf-custom4-font h4" style="font-size:20px;"> Added Successfully</p>

          </div>


      </div>

    </div>
  </div>
</div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script>
    $(document).ready(function () {
      var basiccomp = $('.basic_comp').attr('id')
      var qualificationver = $('.qualificationver').attr('id')
      console.log(qualificationver)
      console.log(basiccomp)


      $('.basic_comp').on('click',function(){
      let basic = 'basic'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        basic:basic,
        basiccomp:basiccomp,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/adminbasiccompetencies.php'

          }

    })

      })

    $('.common_comp').on('click',function(){
      let common = 'common'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        common:common,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/admincommoncompetencies.php'

          }
    })

    })

    $('.core_comp').on('click',function(){
      let core = 'core'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        core:core,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/admincorecompetencies.php'

          }
    })

    })

    $('.mission_comp').on('click',function(){
      let mission = 'mission'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        mission:mission,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/adminmissionvisionobjgoal.php'

          }
    })

    })


    $('.vision_comp').on('click',function(){
      let vision = 'vision'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        vision:vision,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/adminmissionvisionobjgoal.php'

          }
    })

    })

    $('.obj_comp').on('click',function(){
      let obj = 'obj'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        obj:obj,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/adminmissionvisionobjgoal.php'

          }
    })

    })

    $('.goal_comp').on('click',function(){
      let goal = 'goal'
      $.ajax({
      url:'competenciesconnection.php',
      method:'post',
      data:{
        goal:goal,
        qualificationver:qualificationver,
      },
      success:function(res){
        if(res == '1')
            window.location.href ='http://localhost/DocumentationSystem/admin/adminmissionvisionobjgoal.php'

          }
    })

    })

    $('#dropdown_logout').on('click',function(){
        console.log('wiw')
        $('#logoutModal').modal('show');
      })
      
      $('#logouts').on('click',function(){
  
          window.location.href ='http://localhost/DocumentationSystem/index.php'

      })


      
    })
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>