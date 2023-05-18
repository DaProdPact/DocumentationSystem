<?php 
require('./database.php');

session_start();
if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href="http://localhost/DocumentationSystem/index.php";';
  echo '</script>';
}
$session_id = $_SESSION['id'];

// $declarationcount = 25;


require('../link/header.html');
?>
    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>


      ::-webkit-scrollbar {
    display: none;
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
        body * {
          display:none;

        }
        #printdeclaration, #printdeclaration * {
          display: block;
          /* position: absolute; */
          top: 0;
          right: 0;
          width: 100%;
      
        }

        #printsalaysay, #printsalaysay * {
          display: block;
          /* position: absolute; */
          top: 0;
          right: 0;
          width: 110%;
        }

        #printboth, #printboth * {
          display: block;
          /* position: absolute; */
          top: 0;
          right: 0;
          width: 110%;
        }

        


      } 

      /* @media print {
        body *:not(#printdeclaration):not(#printdeclaration *) :not(#printsalaysay):not(#printsalaysay *) {
          visibility: hidden;
        }
        #printdeclaration{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height:100vh;
        }
        #printsalaysay{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height:100vh;

        } 

       } */

    tr{
        height: 10px;
    }



    </style>



    </head>
<body>
  <div class="row" style="height:100vh;">
    <div class="col-2 pe-0">
    <?php 
    require('../link/navbar.php');
  ?>
</div>
   <div class="row bg-white ms-3" style="margin-right:10rem;" id="printdeclaration">
      <!-- <img src="../img/layout1.png" class="my-3" alt=""> <br>  -->

        <img src="../img/layout1.png" class="my-3" alt=""> <br>;
     
    </div>   

    <div class="row bg-white py-2 ms-3" id="printsalaysay">
      <img src="../img/layout2.png" alt="">
    </div>   

    <div class="row bg-white py-2 ms-3" id="printboth">
      <img src="../img/layout1.png" class="my-3" alt=""> <br>
      <img src="../img/layout2.png" alt="">
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

            <!-- <p class="myf-custome6-font mt-3 text-white" style="font-size:20px;"><span  class="text-white">R</span>egional <span  class="text-white">T</span>raining <span  class="text-white">C</span>enter <span  class="text-white">C</span>entral <span  class="text-white">L</span>uzon</p> -->
            <p class="myf-custome6-font mt-3 text-white" style="font-size:20px;">Annex-E Scholars_Declaration</p>
            

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

                    echo '<p class="me-4 mt-3 text-white myf-custome6-font">'.$session_name.'</p>';
                }

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
                  src="../img/default_profile.png"
                  class="rounded-circle"
                  height="30"
                  loading="lazy"
                  style="background-color: #fff;"
                />
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end"
                aria-labelledby="navbarDropdownMenuAvatar"
              >
                <li>
                  <a class="dropdown-item" href="#">My profile</a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">Settings</a>
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


                
   

        <div class="row mt-4">
        <!-- <div class="col-6 text-center">
          <div class="row">
            <div class="col-8"><h3>Scholar Declaration</h3></div>
            <div class="col-3 ms-4">
            <button class="btn text-white" style="background-color: #334a8bd0;" id="declarationbtn"> <i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Print</button>
            </div>
          </div>
          <img src="../img/scholardeclaration.png" width="90%" height="80%" alt="" id="scholarshow">


          
        </div>



        <div class="col-6 text-center">
          <div class="row">
            <div class="col-8"><h3>Sinumpaan Salaysay</h3></div>
            <div class="col-3 ms-4">
  

            <button class="btn text-white" style="background-color: #334a8bd0;" id="salaysaybtn"> <i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Print</button>

            </div>

              </div>

              <img src="../img/sinumpaangsalaysay.png" width="90%" height="80%" alt="" id="salaysayshow">

        </div> -->


        <div class="col-4 offset-4">
          <h4 class="text-center p-2 text-white rounded-5" style="background-color:#1f9da1;">Annex-E Scholars_Declaration</h4>
        </div>

        <div class="col-5 mt-5 d-flex me-5 pe-3 mb-3">
          <div class="col-2 text-center text-white mt-2">
            <p class="bg-primary px-1 myf-custome6-font rounded-1" style="transform: rotate(-0.25turn);">annex-e</p>
          </div>
          <div class="col-12 rounded-2" style="margin-left:-2.5rem; margin-top:-1.7rem; background-color:#888DCB;">
          <h5 class="ps-3 text-white myf-custome6-font  mt-2">Print Form</h5>
          <span class="ps-3 text-white myf-custome6-font">Scholars-Declaration</span><br>
          <span class="ps-3 text-white myf-custome6-font" style="font-size:13px;"><em>Annex-e Scholars-Declaration Form ( English Version ) </em></span> 
          <br>

          <div class="row d-flex ms-5 mt-3 mb-3">
            <div class="col-8 offset-1 d-flex gap-2 justify-content-end">
              <button class="btn btn-primary" id="viewdeclarationbtn"><i class="fas fa-eye"></i> View </button>
              <button class="btn btn-primary" id="declarationbtn"> <i class="fas fa-print"></i> Print </button></div>
            <div class="form-outline form-white col-2" style="width:18%;">
            <input type="number"  id="declaration_count"  class="form-control" value="25"/>
            <label class="form-label" for="declaration_count">Count</label>
          </div>
   
            


          </div>
          


          </div>
        </div>

        <div class="col-5 mt-5 d-flex mb-3">
          <div class="col-2 text-center text-white mt-2">
            <p class="bg-success px-1 myf-custome6-font rounded-1" style="transform: rotate(-0.25turn);">annex-e</p>
          </div>
          <div class="col-12 rounded-2" style="margin-left:-2.5rem; margin-top:-1.7rem; background-color:#3bb1a3;">
          <h5 class="ps-3 text-white myf-custome6-font  mt-2">Print Form</h5>
          <span class="ps-3 text-white myf-custome6-font">Sinumpaang Salaysay</span><br>
          <span class="ps-3 text-white myf-custome6-font" style="font-size:13px;"><em>Annex-e Scholars-Declaration Form ( Tagalog Version ) </em></span> 
          <br>

          <div class="row d-flex ms-5 mt-3 mb-3">
            <div class="col-8 offset-1 d-flex gap-2 justify-content-end ">
              <button class="btn btn-success bg-opacity-25" id="viewsalaysaybtn"><i class="fas fa-eye"></i> View </button> 
              <button  class="btn btn-success bg-opacity-25" id="salaysaybtn"> <i class="fas fa-print"></i> Print </button></div>
          <div class="form-outline form-white col-2" style="width:20%;">
            <input type="number"  id="salaysay_count" class="form-control" Value="25"/>
            <label class="form-label" for="salaysay_count">Count</label>
          </div>
   
            


          </div>
          


          </div>
        </div>
  
        <div class="col-5 mt-5 d-flex mb-3">
          <div class="col-2 text-center text-white mt-2">
            <p class="bg-danger px-1 myf-custome6-font rounded-1" style="transform: rotate(-0.25turn);">annex-e</p>
          </div>
          <div class="col-12 rounded-2" style="margin-left:-2.5rem; margin-top:-1.7rem; background-color:#E2A1A1;">
          <h5 class="ps-3 text-white myf-custome6-font  mt-2">Print Form</h5>
          <span class="ps-3 text-white myf-custome6-font">Scholars-Declaration</span><br>
          <span class="ps-3 text-white myf-custome6-font" style="font-size:13px;"><em>Annex-e Scholars-Declaration Form ( English Version ) </em></span> <br> 
          <span class="ps-3 text-white myf-custome6-font" style="font-size:13px;"><em>Annex-e Scholars-Declaration Form ( Tagalog Version ) </em></span> 

          <br>

          <div class="row d-flex ms-5 mt-3 mb-3">
            <div class="col-8 offset-1 d-flex gap-2 justify-content-end ">
              <button class="btn btn-danger" id="viewbothbtn"><i class="fas fa-eye"></i> View </button>
              <button class="btn btn-danger" id="printbothbtn"> <i class="fas fa-print"></i> Print </button>
            </div>

          <div class="form-outline form-white col-2" style="width:20%;">
            <input type="number"  id="printboth_count" name="email_login"  class="form-control" Value="25"/>
            <label class="form-label" for="printboth_count">Count</label>
          </div>
   
            


          </div>
          


          </div>
        </div>




        </div>

      </div>

    </div>

      


<div class="modal" id="viewdeclaration" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Scholar Declaration</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-primary bg-opacity-75">
      <img src="../img/layout1.png" class="mx-3" alt=""> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal" id="viewsalaysay" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sinumpaang Salaysay ng Scholar</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-success bg-opacity-75">
      <img src="../img/layout2.png" class="mx-3" alt=""> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
           


<div id="viewboth" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <img
              src="../img/tesdalogo.png "
              width="50px"
              class="bg-light btn-floating p-1 m-2"
              loading="lazy"
              />
              <h5 class="modal-title  ms-2 text-primary" style="font-family: 'Fredoka One', cursive; font-size:1.5rem; letter-spacing: .1rem;">
              Scholars-Declaration
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
                      > Scholars-Declaration</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="Register-tab"
                      data-bs-toggle="pill"
                      href="#register-pills"
                      >Sinumpaang Salaysay</a
                    >
                  </li>
                </ul>
  
                <div class="tab-content" id="ex1-content">

                  <div class="tab-pane fade show active bg-primary" id="login-pills">
                  <img src="../img/layout1.png" class="ms-2" alt=""> <br>
                  </div>
  
                  <div class="tab-pane fade" id="register-pills">
                  <img src="../img/layout2.png" class="mx-3" alt=""> <br>


                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
      </div>
          </div>
        </div>
      </div>

 

  







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="../javascript/annexe.js"></script>
    <script>
    
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>