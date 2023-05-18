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
    


    


     






    tr{
        height: 10px;
    }



    </style>

<style>
@import url('https://fonts.googleapis.com/css2?family=Sigmar&display=swap');
</style>



    </head>
<body>



 

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
              class="rounded-circle "
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
          <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->
      </div>

      <div class="row mx-2 mt-3">
      <?php 
                  $traineraccount_query = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' " ;
                  $trainer_sql = mysqli_query($connection,$traineraccount_query);   
                  while($trow = mysqli_fetch_array($trainer_sql)){

            

              ?>

         
        <div
          class="modal fade"
          id="updateprofilepicture"
          tabindex="-1"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary bg-opacity-75">
                
                <h5 class="modal-title text-white">
                  Update Profile Picture
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

                <img
                src="profilepicture/<?=$trow['trainer_profile']?>"
                  class="border border-5 border-light py-1 pb-3"
                  width="100"
                  height="200"
                />

                <form method="post" action="trainersprofileconnection.php" enctype="multipart/form-data">




                  <div class="col-12">

                  <span class="ms-2 text-primary fw-bold me-3">Insert Image</span>
                  <input type="hidden" name="trainer_id" value="<?=$trow['trainer_id']?>" />

                    <input type="file" name="uploadfile" />
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

                <button type="submit" class="btn btn-primary"  name="uploadfilesub" value="upload">
                  Update Profile Picture
                </button>
              </div>

              </form>
            </div>
          </div>
        </div>

        <div
          class="modal fade"
          id="updatemodal"
          tabindex="-1"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary bg-opacity-75">
                
                <h5 class="modal-title text-white">
                  Update Information
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

                <div class="col-6">
                  <div class="form-outline my-2">
                    <input type="text" id="fname" class="form-control" value="<?=$trow['trainer_firstname']?>" />
                    <label class="form-label" for="nttcno">FirstName</label>
                    </div>
                  </div>
                  <div class="col-6">
                  <div class="form-outline my-2">
                    <input type="text" id="mname" class="form-control" value="<?=$trow['trainer_middlename']?>"/>
                    <label class="form-label" for="nttcno">MiddleName</label>
                    </div>
                  </div>
                  <div class="col-8">
                  <div class="form-outline my-2">
                    <input type="text" id="lname" class="form-control" value="<?=$trow['trainer_lastname']?>"/>
                    <label class="form-label" for="nttcno">Lastname</label>
                    </div>
                  </div>
                  <div class="col-4">
                  <div class="form-outline my-2">
                    <input type="text" id="sfxname" class="form-control" value="<?=$trow['trainer_extensionname']?>"/>
                    <label class="form-label" for="nttcno">Suffix Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="text" id="cnumber" class="form-control" value="<?=$trow['trainer_contact_number']?>"/>
                    <label class="form-label" for="nttcno">Contact Number</label>
                    </div>
                  </div>
                  <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="text" id="email" class="form-control" value="<?=$trow['trainer_email_address']?>"/>
                    <label class="form-label" for="nttcno">Email Address</label>
                    </div>
                  </div>
                  <input type="hidden" id="trainersid" value="<?=$trow['trainer_id']?>">
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

                <button type="button" class="btn btn-primary" id="updateinfo">
                  Update Information
                </button>
              </div>
            </div>
          </div>
        </div>


        <div
          class="modal fade"
          id="passmodal"
          tabindex="-1"
        >


          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-primary bg-opacity-75">
                <h5 class="modal-title text-white">
                  Password Update
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
                <div class="login-message">
            <div
            id="incorrectpass"
            class="alert alert-danger"
            style="display: none"
            role="alert"
            >
            Incorrect Password
            <i class="fas fa-error"></i>
            </div>

            <div
            id="doesntmatch"
            class="alert alert-danger"
            style="display: none"
            role="alert"
            >
            Password Doesn't Match
            <i class="fas fa-error"></i>
            </div>

        </div>
                <div class="col-12 my-1">
                        <div class="form-outline mt-2 d-flex">
                          <input
                            type="password"
                            id="currentpassword"
                            class="form-control"
                          />
                          <label class="form-label" for="password_login">Password</label>
                          <span
                            class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                            id="currentpasstoggle"
                          ></span>
                       </div>

                        </div>

                        <div class="col-12 my-1">
                        <div class="form-outline mt-2 d-flex">
                          <input
                            type="password"
                            id="newpassword"
                            class="form-control"
                          />
                          <label class="form-label" for="password_login">New Password</label>
                          <span
                            class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                            id="newpasstoggle"
                          ></span>
                       </div>

                        </div>

                        <div class="col-12 my-1">
                        <div class="form-outline mt-2 d-flex">
                          <input
                            type="password"
                            id="retypepassword"
                            class="form-control"
                          />
                          <label class="form-label" for="password_login">Retype Password</label>
                          <span
                            class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                            id="retypepasstoggle"
                          ></span>
                       </div>

                        </div>

                        <input type="hidden" id="trainerspassword" value="<?=$trow['trainer_id']?>">
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

                <button type="button" class="btn btn-primary" id="updatepassword">
                  Update Password
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-3 border-end border-secondary border-3 ">
        <div class="bg-image hover-overlay ripple px-5" id="editpicture">
                <img
                  src="profilepicture/<?=$trow['trainer_profile']?>"
                  class="rounded-circle border border-5 border-light bg-primary p-0"
                  width="200"
                  height="200"
                />
                <div class="mask rounded-circle"></div> 
        </div>
        <div class="mt-3">

  <button id="accsettings" class="btn text-white w-100 my-2" style="background-color: #334a8bd0;">
  <i class="fas fa-user-gear"></i> &nbsp&nbsp Account Settings</button>

  <button id="passsettings" class="btn text-white w-100 my-2" style="background-color: #334a8bd0;">
  <i class="fas fa-unlock-keyhole"></i> &nbsp&nbsp Password Settings</button>


</div>



        </div>
        
        <div class="col-9" style="height:100vh;">
            <div class="row">
                <p style="font-size:1.5rem; font-family: 'Sigmar', cursive;"><i class="fas fa-gear"></i> Account Settings</p>
            </div>
            <div class="row">
                <div class="col-4">
                <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">LastName</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['trainer_lastname']?>" disabled>
                </div>
                
                <div class="col-3">
                <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Firstname</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['trainer_firstname']?>" disabled>
                </div>

                <div class="col-3">
                <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">MiddleName</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['trainer_middlename']?>" disabled>
                </div>

                <div class="col-2">
                <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Extension Name</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['trainer_extensionname']?>" disabled>
                </div>

   
            </div>
            <div class="row my-3">
                <div class="col-4">
                    <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Contact Number</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['trainer_contact_number']?>" disabled>
                </div>

                <div class="col-4">
                    <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Email Address</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['trainer_email_address']?>" disabled>
                </div>


                <div class="col-4">
                    <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Password</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="password" value="<?=$trow['trainer_password']?>" disabled>
                </div>

   
            </div>
            <div class="row mt-3">
            <p style="font-size:1.5rem; font-family: 'Sigmar', cursive;"><i class="fas fa-list-check"></i> Qualification</p>

            <?php 
            $qualiquery = "SELECT * FROM trainer_list_qualification LEFT JOIN trainer_qualification ON trainer_list_qualification.selected_qualification = trainer_qualification.qualification_id WHERE trainer_qualification_list = '".$trow['trainer_id']."' ";
            $qualisql = mysqli_query($connection,$qualiquery);

            while($qrow = mysqli_fetch_array($qualisql)){ ?>

            <p style="font-size:1rem; color:#4778a8; font-family: 'Sigmar', cursive;"><i class="fas fa-stamp"></i> <?=$qrow['qualification_title']?></p>


           <?php } ?>
          
            </div>


            <div class="row mt-3">
            <p style="font-size:1.5rem; font-family: 'Sigmar', cursive;"><i class="fas fa-list-check"></i> Batch</p>
            <?php 
            $batchquery = "SELECT * FROM batch_list WHERE batch_trainer = '".$trow['trainer_id']."' ";
            $batchsql = mysqli_query($connection,$batchquery);

            while($brow = mysqli_fetch_array($batchsql)){ ?>

            <p style="font-size:1rem; color:#4778a8; font-family: 'Sigmar', cursive;"><i class="fas fa-stamp"></i> <?=$brow['batch_name']?> YEAR <?=$brow['batch_year']?></p>


           <?php } ?>
            </div>


            
        </div>


      </div>
    <?php } ?>

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
              <button type="button" class="btn btn-primary" id="insertdatebtn">Print</button>
              </div>

            </div>
          </div>
          </div>

          <div class="modal fade" id="successUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body" style="background-color: #4285f4;">
            <div class="row">

              <p class="text-white myf-custom4-font h4" style="font-size:20px;"> Update Successfully</p>

          </div>


      </div>

    </div>
  </div>
</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script>
    $(document).ready(function(){

    $('#editpicture').on('click',function(){
      console.log('roar')
      $('#updateprofilepicture').modal('show')
    })





      $('#dropdown_logout').on('click',function(){
        console.log('wow')
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

  $('#currentpasstoggle').click(function(){
      var passl = $("#currentpassword");

      if (passl.prop("type") == "password") {
        passl.attr("type", "text");
        $(this).addClass("fa-eye-slash");
      } else {
        passl.attr("type", "password");
  
        $(this).removeClass("fa-eye-slash");
      }
    })

    $('#newpasstoggle').click(function(){
      var pass2 = $("#newpassword");

      if (pass2.prop("type") == "password") {
        pass2.attr("type", "text");
        $(this).addClass("fa-eye-slash");
      } else {
        pass2.attr("type", "password");
  
        $(this).removeClass("fa-eye-slash");
      }
    })

    $('#retypepasstoggle').click(function(){
      var pass3 = $("#retypepassword");

      if (pass3.prop("type") == "password") {
        pass3.attr("type", "text");
        $(this).addClass("fa-eye-slash");
      } else {
        pass3.attr("type", "password");
  
        $(this).removeClass("fa-eye-slash");
      }
    })
        $('#accsettings').on('click',function(){
            $('#updatemodal').modal('show')

        })

        $('#passsettings').on('click',function(){
            $('#passmodal').modal('show')

        })

        $('#updatepassword').on('click',function(){
            var currentpassword =  $('#currentpassword').val()
            var newpassword = $('#newpassword').val()
            var retypepassword = $('#retypepassword').val()
            var trainerspassword = $('#trainerspassword').val()


            console.log(currentpassword)
            console.log(newpassword)
            console.log(retypepassword)
            console.log(trainerspassword)

            if(newpassword != retypepassword){
       
                $('#doesntmatch').show();
            }
            else{
                let passwords = 'passwords'
                $.ajax({
                url:'trainersprofileconnection.php',
                method:'POST',
                data:{
                    passwords:passwords,
                    currentpassword:currentpassword,
                    newpassword:newpassword,
                    retypepassword:retypepassword,
                    trainerspassword:trainerspassword,
                },
                success:function(response){
                  console.log(response)
                  if(response == '1'){
                    $('#passmodal').modal('hide')
                        $('#successUpdateModal').modal('show');
                        setTimeout(
                          function() 
                          {
                            window.location.href ='http://localhost/DocumentationSystem/php/trainersprofile.php'
            
                          }, 1000);
                  }
                  else{
                    $('#incorrectpass').show();
                    console.log(response)
                  }

                }
            })

            }
        })


        $('input').on('click',function(){
            $('#doesntmatch').hide();
            $('#incorrectpass').hide();


        })

        $('#updateinfo').on('click',function(){
            var fname =  $('#fname').val()
            var mname = $('#mname').val()
            var lname = $('#lname').val()
            var sfxname = $('#sfxname').val()
            var cnumber = $('#cnumber').val()
            var email = $('#email').val()
            var trainersid = $('#trainersid').val()

            console.log(fname)
            console.log(mname)
            console.log(lname)
            console.log(sfxname)
            console.log(cnumber)
            console.log(email)
            console.log(trainersid)

            $.ajax({
                url:'trainersprofileconnection.php',
                method:'POST',
                data:{
                    fname:fname,
                    mname:mname,
                    lname:lname,
                    sfxname:sfxname,
                    cnumber:cnumber,
                    email:email,
                    trainersid:trainersid
                },
                success:function(response){
                    $('#updatemodal').modal('hide')
                        $('#successUpdateModal').modal('show');
                        setTimeout(
                          function() 
                          {
                            window.location.href ='http://localhost/DocumentationSystem/php/trainersprofile.php'
            
                          }, 1000);
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