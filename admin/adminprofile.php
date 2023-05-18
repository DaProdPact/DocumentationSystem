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
      <div class="row mx-2 mt-3">
      <?php 
                  $traineraccount_query = "SELECT * FROM admin_account WHERE admin_id = 1 " ;
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
                src="adminprofile/admin-removebg-preview.png"
                  class="border border-5 border-light py-1 pb-3"
                  width="100"
                  height="200"
                />

                <form method="post" action="trainersprofileconnection.php" enctype="multipart/form-data">




                  <div class="col-12">

                  <span class="ms-2 text-primary fw-bold me-3">Insert Image</span>
                  <input type="hidden" name="trainer_id" value="<?=$trow['admin_id']?>" />

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
                  Update Admin Profile
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

                <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="text" id="fname" class="form-control" value="<?=$trow['admin_name']?>" />
                    <label class="form-label" for="nttcno">Admin Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="text" id="email" class="form-control" value="<?=$trow['admin_email']?>"/>
                    <label class="form-label" for="nttcno">Admin Email</label>
                    </div>
                  </div>
                  <input type="hidden" id="trainersid" value="<?=$trow['admin_id']?>">
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

                        <input type="hidden" id="trainerspassword" value="<?=$trow['admin_id']?>">
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
                  src="adminprofile/admin-removebg-preview.png"
                  class="rounded-circle border border-5 border-light p-0"
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
                <p style="font-size:1.5rem; font-family: 'Sigmar', cursive;"><i class="fas fa-gear"></i> Admin Account Settings</p>
            </div>
            <div class="row">
                <div class="col-6">
                <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Admin Name</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['admin_name']?>" disabled>
                </div>
                
                <div class="col-6">
                <label class="ps-2"style="font-size:1rem; font-family: 'Sigmar', cursive; color:#526d88;">Email Address</label>

                    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$trow['admin_email']?>" disabled>
                </div>


   
            </div>





            
        </div>


      </div>
    <?php } ?>
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
              <div class="row">
              <div class="col-9">

                   <div class="mb-3">
                    <input type="text" class="form-control" id="addqualificationname" placeholder="Qualification Name">
                  </div>
                  
               </div>
               <div class="col-3">

              <div class="mb-3">
              <select class="form-select form-select-sm py-2 border-2 border-secondary" id="qualification_registered">
                <option value="1">NC I</option>
                <option value="4">NC II</option>
                <option value="5">NC III</option>
                <option value="6">NC IV</option>

              </select>
              </div>

              </div>
              </div>
              <div class="row">
               <div class="col-12">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="addqualificationcode" placeholder="Qualification Code">
                  </div>
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
   
    <script src="../javascript/adminqualificationlist.js"></script>
    <script>
    $(document).ready(function(){

    // $('#editpicture').on('click',function(){
    //   console.log('roar')
    //   $('#updateprofilepicture').modal('show')
    // })






      $('#dropdown_logout').on('click',function(){
        console.log('wow')
        $('#logoutModal').modal('show');
      })
      $('#logouts').on('click',function(){

               window.location.href ='http://localhost/DocumentationSystem/index.php'

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


            console.log(currentpassword)
            console.log(newpassword)
            console.log(retypepassword)


            if(newpassword != retypepassword){
       
                $('#doesntmatch').show();
            }
            else{
                let passwords = 'passwords'
                $.ajax({
                url:'adminprofileconnection.php',
                method:'POST',
                data:{
                    passwords:passwords,
                    currentpassword:currentpassword,
                    newpassword:newpassword,
                    retypepassword:retypepassword,
                },
                success:function(response){
                  console.log(response)
                  if(response == '1'){
                    $('#passmodal').modal('hide')
                        $('#successUpdateModal').modal('show');
                        setTimeout(
                          function() 
                          {
                            window.location.href ='http://localhost/DocumentationSystem/admin/adminprofile.php'
            
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
            var email = $('#email').val()

            console.log(fname)
            console.log(email)


            $.ajax({
                url:'adminprofileconnection.php',
                method:'POST',
                data:{
                    fname:fname,
                    email:email,
                },
                success:function(response){
                    console.log(response)
                    $('#updatemodal').modal('hide')
                        $('#successUpdateModal').modal('show');
                        setTimeout(
                          function() 
                          {
                            window.location.href ='http://localhost/DocumentationSystem/admin/adminprofile.php'
            
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