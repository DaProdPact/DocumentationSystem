<?php 

session_start();



// if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
//   $_SESSION['status'] = 'invalid';
// }

// if($_SESSION['status'] == 'valid'){
//     header("location: php/tipattendance.php");
    
// }


require('php/database.php');
require('link/header.html');

?>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" href="./img/tesdalogo.png" type="image/x-icon">
    <style>
      ::-webkit-scrollbar {
    display: none;
    }
    
    
    
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    input[type="number"] {
      -moz-appearance: textfield;
    }
    

    </style>



    </head>
    <body>
        <div class="row header-details bg-secondary bg-opacity-50">
        <div class="row">
        <div class="col-1 ">
          <img
            src="./img/location.png"
            class="float-end me-0"
            data-mdb-toggle="tooltip"
            data-mdb-placement="bottom"
            style="padding-top:2px;"
          />
  
        </div>
        <div class="col-2 d-none d-md-none d-lg-block d-xl-block" style="margin-left: -18px; padding-top:2px; color:#606060">
          <span class="float-start mt-0 me-5" style="font-weight: bold;">Tabangs Guiguinto Bulacan</span>
        </div>
        <div class="col-1 pe--1 pe-lg-2">
          <img
            src="./img/email.png"
            class="float-end mt-1 me-0"
            data-mdb-toggle="tooltip"
            data-mdb-placement="bottom"
            alt=""
          />
        </div>
        <div class="col-1 d-none d-md-none d-lg-block d-xl-block" style="margin-left: -18px; padding-top:2px; color:#606060">
          <span class="float-start mt-0 me-5" style="font-weight: bold;">rtcguiguinto@tesda.gov.ph</span>

        </div>

        <div class="col-3 offset-3">
          <img
            src="./img/pinterest.png"
            class="mt-1 pe-2 float-end"
            style="width:19px;"
            data-mdb-toggle="tooltip"
            data-mdb-placement="bottom"
            title="Pinterest"
            alt=""
          />
          <img
            src="./img/google.png"
            class="ch-13px mt-1 float-end pe-2"
            style="width:19px;"
            data-mdb-toggle="tooltip"
            data-mdb-placement="bottom"
            title="Gmail"
            alt=""
          />
          <img
            src="./img/twitter.png"
            class="ch-13px mt-1 float-end pe-2"
            style="width:19px;"
            data-mdb-toggle="tooltip"
            data-mdb-placement="bottom"
            title="Twitter"
            alt=""
          />
          <img
            src="./img/facebook.png"
            style="width:19px;" 
            class="ch-13px mt-1 float-end pe-2"
            data-mdb-toggle="tooltip"
            data-mdb-placement="bottom"
            title="Facebook"
            alt=""
          />
        </div>
      </div>

        </div>
        <div class="row navbar">
          
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
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
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand navbar-logo ms-3" href="#">
                    <img
                    src="./img/tesdalogoo.png"
                    width="35px"
                    alt="Tesda Logo"
                    loading="lazy"
                    class="m-2 mb-4 ms-4 me-3"
                    />
              
                <p><span  class="text-primary">T</span>raining <span  class="text-primary">E</span>ducation  And <span  class="text-primary">S</span>kills <span  class="text-primary">D</span>velopement <span  class="text-primary">A</span>uthority</p>
                </a>
                <!-- Left links -->
                <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
          
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->

        </div>

        <div
      class="bg-image"
      style="background-image: url(./img/background.jpg); height: 70vh"
    >
      <div class="mask">
        <div class="d-flex justify-content-center align-items-center mb-5 h-100">
          <div class="row">
            
            <div class="row justify-content-center">

              <p
                class="text-center text-white h1 mb-3" style="font-family:Nunito; font-size:3.4rem;">
                The Regional Training Center Central Luzon-Guiguinto(TESDA)
              </p>
            </div>

            <div class="row justify-content-center">
              <p
                class="text-center h5 mx-5 px-5 text-light mt-2" style="font-family:Nunito; font-size:1.2rem;"
              >
             The Regional Training Center Central Luzon-Guiguinto, is one of the 12 TESDA Technology (TTIs) operating int the Central Luzon Region, is situated on Mc arthus Highway, Tabang Guiguinto Bulacan. It lies just 500meters away from the Tabang Exit 32, gateway to the North Luzon Expreesway, and only six kilometers from Bulacan's capital, the City of Malolos
              </p>
            </div>
            <div class="d-inline-flex justify-content-center mt-3">
              <button
                class="btn btn-info text-capitalize text-white fw-semibold justify-content-center px-5 me-2"
                id="start"
              >
                Get Started
              </button>

              <button
                class="btn btn-outline-info text-capitalize myf-custom4-font fw-semibold justify-content-center px-5 ms-2"
                id="contactus"

              >
                Contact Us
              </button>
            </div>
          </div>
        </div>
      </div>

    </div>
  

    <div class="container mt-5 cbg-cprimary" id="FeaturesSection">
      <div class="row mt-5 ms-2 ms-md-0">
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-4">
          <hr class="hr border border-2 border-secondary" />
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-3 bg-secondary">
          <p class="text-center my-2 fw-semibold h5 _responsive-description">
    Mission and Vision
          </p>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-4">
          <hr class="hr border border-2 border-secondary" />
        </div>
      </div>

      <div class="row ms-3 mt-xl-3 ms-md-0 justify-content-between">
        <div class="col-xl-4">
    
        <div class="row">
          <div class="col-xl-12 col-9 ms-md-0 ms-6">
          <img
              src="./img/vision-removebg-preview.jpg"
              class="card-img-top w-100"
              alt="" style="height:300px;">

          </div>
          <div class="col-xl-12 pt--5">
          <p class="myf-custom2-font fw-bolder text-xl-center h5">
           Vision
                </p>
              
          <?php
          $rtcclvision = "SELECT * FROM rtccl WHERE rtccl_type = 'Vision'";
          $rtcclsql = mysqli_query($connection,$rtcclvision);
          while($vision = mysqli_fetch_array($rtcclsql)){ ?>
          <p class="myf-custom2-font myfs-s3">
          <?=$vision['rtccl_name'];?>  
        </p>
        <?php } ?>
          </div>
        </div>

  
                
        </div>
        <div class="col-xl-4">
    
    <div class="row">
      <div class="col-xl-12 col-9 ms-md-0 ms-6">
      <img
          src="./img/mission-removebg-preview.jpg"
          class="card-img-top w-100 "
          alt="" style="height:300px;">

      </div>
      <div class="col-xl-12">
      <p class="myf-custom2-font fw-bolder text-xl-center h5">
      Mission 
            </p>
          <?php
          $rtcclmission = "SELECT * FROM rtccl WHERE rtccl_type = 'Mission'";
          $rtcclsql = mysqli_query($connection,$rtcclmission);
          while($mission = mysqli_fetch_array($rtcclsql)){ ?>
          <p class="myf-custom2-font myfs-s3">
          <?=$mission['rtccl_name'];?>  
        </p>
        <?php } ?>
        
            </div>
    </div>


            
    </div>

    <div class="col-xl-4">
    
    <div class="row">
      <div class="col-xl-12 col-9 ms-md-0 ms-6">
      <img
          src="./img/values-removebg-preview.png"
          class="card-img-top w-100 "
          alt="" style="height:300px;">

      </div>
      <div class="col-xl-12">
      <p class="myf-custom2-font fw-bolder text-xl-center h5">
      Goal 
            </p>

            <?php
          $rtcclvalues = "SELECT * FROM rtccl WHERE rtccl_type = 'Values'";
          $rtcclsql = mysqli_query($connection,$rtcclvalues);
          while($values = mysqli_fetch_array($rtcclsql)){ ?>
          <p class="myf-custom2-font myfs-s3">
          <?=$values['rtccl_name'];?>  
        </p>
        <?php } ?>
        
            </div>
    </div>


            
    </div>

        </div>



      </div>
 


    <div
      class="bg-image mt-5"
      style="background-image: url(./img/img1.jpg); height:7vh;"
    >

      <div class="mask cbg-cmain-bg">
       
      <div class="row justify-content-center mb-5 mt-md-0">
          <p
            class=" text-light ms-2 mt-1 pt-2 text-center"
            style="font-family:'Times New Roman';"
          >
            Copyright ©2022 All rights reserved | This website made by Students
            of BULSU Meneses Campus
          </p>
        </div>

       
      </div>
    </div>
      

      <div id="loginModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <img
              src="./img/tesdalogo.png "
              width="50px"
              class="bg-light btn-floating p-1 m-2"
              loading="lazy"
              />
              <h5 class="modal-title  ms-2 text-primary" style="font-family: 'Fredoka One', cursive; font-size:1.5rem; letter-spacing: .1rem;">
                Trainer Login / Sign Up
              </h5>

              <button
                type="button"
                class="btn-close"
                data-mdb-dismiss="modal"
              ></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <ul
                  class="nav nav-pills nav-fill d-flex justify-content-center py-6"
                >
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      id="Login-tab"
                      data-bs-toggle="pill"
                      href="#login-pills"
                      >LOGIN</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="Register-tab"
                      data-bs-toggle="pill"
                      href="#register-pills"
                      >REGISTER</a
                    >
                  </li>
                </ul>
  
                <div class="tab-content" id="ex1-content">
                <div class="login-message">
                  <div
                    id="loginfillupfields"
                    class="alert alert-danger"
                    style="display: none"
                    role="alert"
                  >
                    Please Fill up all fields
                    <i class="fas fa-error"></i>
                  </div>
                  <div
                    id="invalidcredentials"
                    class="alert alert-danger"
                    style="display: none"
                    role="alert"
                  >
                    Invalid Credentials
                    <i class="fas fa-error"></i>
                  </div>
                </div>
                  <div class="tab-pane fade show active" id="login-pills">
                    <div class="container">
                      <form id="login-forms" method="post">
                        
                        <div class="col-12">
                          <div class="form-outline">
                            <input type="text"  id="email_login" name="email_login"  class="form-control my-2" />
                            <label class="form-label" for="email_login">Email Address</label>
                          </div>
                        </div>

                        <div class="col-12">
                        <div class="form-outline mt-2 d-flex">
                          <input
                            type="password"
                            id="password_login"
                            name="password_login"
                            class="form-control"
                          />
                          <label class="form-label" for="password_login">Password</label>
                          <span
                            class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                            id="loginpasstoggle"
                          ></span>
                       </div>

                        </div>

  
                        <div class="row my-3">
                          <div class="col-7 col-md-6">
                            <div class="form-check ms-md-2">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                id="CheckRememberMe"
                              />
                              <label class="form-check-label" for="CheckRemberMe"
                                >Remember Me</label
                              >
                            </div>
                          </div>
                          <div class="col-12 col-md-6 d-flex justify-content-end">
                            <div>
                              <span
                                id="forgetpass"
                                class="text-primary text-decoration-none"
                                data-mdb-dismiss="modal"
                                >Forget Password?</span
                              >
                            </div>
                          </div>
                        </div>
  
                        <button
                          class="btn btn-primary text-white w-100 my-2"
                          id="login-btn"
                        >
                          LOGIN
                        </button>
                      </form>
  
                      <div class="text-center my-2">
                        <p class="">
                          Don't have an acoount yet?
  
                          <a
                            href="#link"
                            class="text-primary text-decoration-none"
                            >Register</a
                          >
                        </p>
                      </div>
                    </div>
                  </div>
  
                  <div class="tab-pane fade" id="register-pills">

                    <form id="register-forms" autocomplete="off" method="post">
                      <div class="row">
                      <div class="register-message">
                    <div
                      id="registerfillupfields"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Please Fill up all fields
                      <i class="fas fa-error"></i>
                    </div>
                    <div
                      id="registerinvalidemail"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Invalid Email
                    </div>
                    <div
                      id="emailexist"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Sorry email already exists!
                    </div>
                    <div
                      id="invalidcontact"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      The mobile number can have 11 digits 
                    </div>
                    <div
                      id="istolength"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                    Password is to length.
                    </div>
                    <div
                      id="istoshort"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Password is to short, Please input 8 letters.
                    </div>
                    <div
                      id="doesnotmatchpassword"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Password Doesn't Match !
                    </div>
                    <div
                      id="checkterms"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Please check the terms and condition
                    </div>
                    <div
                      id="registersuccess"
                      class="alert alert-primary"
                      style="display: none"
                      role="alert"
                    >
                      Register Successfully
                    </div>
                  </div>

                        <div class="col-12">
                          <!-- <input type="text" name="fname_register" id="fname_register" 
                          placeholder="Firstname" class="form-control my-3 border-2 border-secondary" /> -->

                          <div class="form-outline">
                            <input type="text"  name="fname_register" id="fname_register" class="form-control my-2" />
                            <label class="form-label" for="fname_register">Firstname</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-outline">
                            <input type="text"  id="mname_register" name="mname_register"  class="form-control my-2" />
                            <label class="form-label" for="mname_register">Middlename</label>
                          </div>
                        </div>

                    
                        
                        <div class="col-9">
                        <div class="form-outline">
                            <input type="text"  name="lname_register" id="lname_register" class="form-control my-2" />
                            <label class="form-label" for="lname_register">Lastname</label>
                          </div>

                        </div>


                        <div class="col-3">

                        <div class="form-outline">
                            <input type="text"  name="exname_register" id="exname_register" class="form-control my-2" />
                            <label class="form-label" for="exname_register">Extension</label>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-7">
                          <div class="form-outline">
                            <input type="text"  name="email_register" id="email_register" class="form-control my-3" />
                            <label class="form-label" for="email_register">Email Address</label>
                          </div>
                       
                        </div>



                        <div class="col-5">
                          <div class="form-outline">
                            <input type="number"  name="contact_number_register" id="contact_number_register" class="form-control my-3" />
                            <label class="form-label" for="contact_number_register">Contact Number</label>
                          </div>
                       
                        </div>
                       
                      </div>

  
                      <div class="row">
                        <div class="col-6">                      
                      <div class="form-outline mt-2 d-flex">
                        <input
                          type="password"
                          id="password_register"
                          name="password_register"
                          class="form-control"
                        />
                        <label class="form-label" for="password_register">Password</label>
                        <span
                          class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                          id="passtoggle"
                        ></span>
                       </div>
                      </div>


                      <div class="col-6">
                        <div class="form-outline mt-2 d-flex">
                          <input
                            type="password"
                            id="retype_password_register"
                            name="retype_password_register"
                            class="form-control"
                          />
                          <label class="form-label" for="retype_password_register">Re-type Password</label>
                          <span
                            class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                            id="cpasstoggle"
                          ></span>
                        </div>

                        </div>


                        <div class="form-check ms-1 my-3" id="wows">
                          <input type="hidden" name="allow_access" value="0" />
                          <input
                            class="checks"
                            type="checkbox"
                            name="allow_access"
                            value="1"
                            id="conditioncheck"
                          />
                          <span for="CheckRemberMe"
                            >I accept the
                            <a class="text-primary text-decoration-none"
                              >Terms of Use</a
                            >
                            &<a class="text-primary text-decoration-none">
                              Privacy Policy</a
                            ></span
                          >
                        </div>
  
                        <button type="submit" class="btn btn-primary">
                          REGISTER
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="mb-2 position-absolute position-fixed end-0 bottom-0 me-1">
        <div class="toast success">
          <div class="toast-header bg-primary bg-opacity-75">
          <strong class="me-auto text-primary text-primary-75"><i class="fas fa-key"></i>&nbsp Register Details</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body bg-primary bg-opacity-50">
          <p class="text-white">Register Successfully</p>
        </div>
      </div>
    </div>


      <!-- //dagdag -->
      <div id="enteremailtoforget" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <img src="img/rttcl_logo.png" width="25px" class="me-2" />
            <p class="text-center text-info mt-2 h5 fw-bold">Forget Password</p>
            <button
              type="button"
              class="btn-close"
              data-mdb-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body ">
                  <div
                      id="forgetemailalert"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      This email address does not registered
                    </div>
     
            <div class="form-outline">
              <input type="text" id="sending_gmail" class="form-control" />
              <label class="form-label" for="sending_gmail">Enter Email Address</label>
            </div>
            <button class="btn btn-primary mt-2 float-end" id="send_email">send</button>
          </div>
        </div>
      </div>
    </div>

    <div id="codesending" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
                        <img src="img/rttcl_logo.png" width="25px" class="me-2" />
            <p class="text-center text-info mt-1 h5 fw-bold myf-custome6-font">Verification Code</p>
            <button
              type="button"
              class="btn-close"
              data-mdb-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body ">
              <div
                id="wrong_code"
                class="alert alert-danger"
                style="display: none"
                role="alert"
              >
                Please Type the correct code
              </div>

     
            <div class="form-outline">
              <input type="text" id="send_gmailcode" class="form-control" />
              <label class="form-label" for="send_gmailcode">Enter 6 Digits Code</label>
            </div>
            <button class="btn btn-primary mt-2 float-end" id="btn_gmailcode">send</button>
          </div>
        </div>
      </div>
    </div>

    <div id="modalresetpassword" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
                        <img src="img/rttcl_logo.png" width="25px" class="me-2" />
            <p class="text-center text-info mt-1 h5 fw-bold myf-custome6-font">Reset Password</p>
            <button
              type="button"
              class="btn-close"
              data-mdb-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body ">
              <div
                id="passwordnotmatch"
                class="alert alert-danger"
                style="display: none"
                role="alert"
              >
                Password Doesn't Match
              </div>

              <div
                id="successchange"
                class="alert alert-primary"
                style="display: none"
                role="alert"
              >
                Changes Successfully
              </div>
     
            <div class="form-outline d-flex">
              <input type="text" id="send_newpass" class="form-control" />
              <label class="form-label" for="send_newpass">Enter New Password</label>
              <span
                class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                id="newpasstoggle"
                ></span>
            </div>

            <div class="form-outline d-flex mt-3">
              <input type="text" id="send_cnewpass" class="form-control" />
              <label class="form-label" for="send_cnewpass">Enter Confirm Password</label>
              <span
                class="far fa-eye text-secondary bg-transparent border-0 mt-2 me-2"
                id="cnewpasstoggle"
                ></span>
            </div>
            
            <button class="btn btn-primary mt-2 float-end" id="btn_resetpassword">Reset Password</button>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-2 position-absolute position-fixed end-0 bottom-0">
 <div class="toast resetsuccess">
    <div class="toast-header bg-primary bg-opacity-50">
      <strong class="me-auto text-primary text-primary-75"><i class="fas fa-key"></i> Reset Password</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
    <div class="toast-body bg-primary bg-opacity-50">
      <p class="text-white">Reset Password Successfully</p>
    </div>
  </div>
</div>



<div id="registerverify" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <img src="img/rttcl_logo.png" width="25px" class="me-2" />
            <p class="text-center text-info mt-2 h5 fw-bold">Registration Verification</p>
            <button
              type="button"
              class="btn-close"
              data-mdb-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body ">
                  <div
                      id="incorrectotplalert"
                      class="alert alert-danger"
                      style="display: none"
                      role="alert"
                    >
                      Incorrect OTP
                    </div>
     
            <div class="form-outline">
              <input type="text" id="ver_reg" class="form-control" />
              <label class="form-label" for="ver_reg">Enter 6 Digit Code</label>
            </div>
            <button class="btn btn-primary mt-2 float-end" id="send_register_verification">send</button>
          </div>
        </div>
      </div>
    </div>

    <div
          class="modal fade"
          id="contactModal"
          tabindex="-1"
        >
          <div class="modal-dialog">
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
              <div class="modal-body">
                <div class="row">
                <p class="fw-bold" style="font-size:2rem; color:blue;">CONTACT US </p> 
                  <div class="col-10">
                    <p class="fw-bold">Tel : (044) 794-0024</p>
                    <p class="fw-bold">Mobile : 09438129557// 09054363369</p>
                    <p class="fw-bold">Email : rtcguiguinto@tesda.gov.ph</p>
                    <p class="fw-bold">Website : www.tesda3.com/rtcguiguinto</p>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script src="./javascript/index.js"></script>
     
    </script>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>
    </body>
</html>