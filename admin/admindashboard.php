<?php 
require('../php/database.php');


require('../link/header.html');
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
<body>
  <div class="row bg-secondary bg-opacity-50">
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
      <div class="row mt-3">
      <div class="col-6 offset-3">
          <h4 class="text-center p-2 text-white rounded-5" style="background-color:#1b4a9f;">Dashboard</h4>
      </div>


        </div>


      <div class="row me-1">
      <div class="row ms-1 mt-3">

      <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#81add9e0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-primary">Qualification</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-primary ms-2"> 20</p>

          </div>
        </div>

        <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#81d99ee0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-success">Trainer</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-success ms-2"> 2</p>

          </div>
        </div>


        <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#ff848be0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-danger">Request</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-danger ms-2"> 1</p>

          </div>
        </div>


        <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#ead665e0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-warning">Batch</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-warning ms-2"> 2</p>

          </div>
        </div>

        </div>
    </div>

    <div class="row me-1">
      <div class="row ms-1 mt-3">
      <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#c481d9e0; color:#601d60; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5">Trainees</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold ms-2" style="color:#601d60;"> 50</p>

          </div>
        </div>

        <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#8182d9e0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-primary">LMAR Unit of competencies</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-primary ms-2"> 26</p>

          </div>
        </div>

        <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#bfdd82e0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-warning">LMAR Element</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-warning ms-2"> 93</p>

          </div>
        </div>


        <div class="col-3">
          <div class="border-5 border-end-0 border-primary border-top-0 border-bottom-0 pt-3 ps-3 rounded-3" style="background-color:#a5a5a5e0; height:17vh;" role="alert">
            <p class="fw-bold myfs-s5 text-dark">LMAR Performance Criteria</p>
            <p class="myfs-s7 myf-custome6-font fw-semibold text-dark ms-2"> 376</p>

          </div>
        </div>

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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <!-- <script src="../javascript/addqualification.js"></script> -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

<script>
      $(document).ready(function(){
        $('#dropdown_logout').on('click',function(){
        console.log('wiw')
        $('#logoutModal').modal('show');
      })
      
      $('#logouts').on('click',function(){
  
          window.location.href ='http://localhost/DocumentationSystem/index.php'

      })
      })
    
    </script>
    </body>
</html>