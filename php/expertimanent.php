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
$sessionqualiname = $_SESSION['tqualiname'];
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
    <div class="col-2 pe-0 sticky-top position-fixed">
    <?php 
    require('../link/navbar.php');
  ?>
</div>
  





<div class="offset-2 col-10 bg-secondary bg-opacity-50">
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

        <div class="row mt-1">
      <div class="col-6 offset-3">
          <h4 class="text-center p-2 text-white rounded-5" style="background-color:#1b4a9f;"><?= $sessionqualiname?></h4>
      </div>


        </div>



        <div class="row">
          <?php 
          $loopcheck = '1';
          $loopelement = '1';
          $selectquery = "SELECT * FROM `lmar_unit_competencies` WHERE lmar_unit_qualification = '$sessionqualification' AND lmar_unit_comp = '2' ";
          $selectsql = mysqli_query($connection,$selectquery);
          while($row = mysqli_fetch_array($selectsql)){ 
            $unitid = $row['lmar_unit_id']
            ?>

            <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
            <div class="col-11 pt-1">
            <p class="text-primary fw-bold bg-secondary" style="font-size:20px;"><?= $row['lmar_unit_name']; ?></p>	
            </div>
            <div class="col-1 ps-3 pt-1 justify-content-end">
            <input class="form-check-input p-2 checkall<?=$loopcheck?>" type="checkbox" style="height:30px; width:30px;"/>
            </div>

          

            </div>
            <?php 
          $elementquery = "SELECT * FROM `lmar_element` WHERE lmar_element_unit = '$unitid' ";
          $elementsql = mysqli_query($connection,$elementquery);
          while($crow = mysqli_fetch_array($elementsql)){ ?>
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_basic_nciii<?=$loopcheck?>_<?=$loopelement?>" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1"> <?= $crow['lmar_element_name']; ?></label>
          </div>
  
          <br>
            
          <?php
          $loopelement++;
         } 
        $loopcheck++;  
        }
          ?>
        </div>


   

        
     


        

 

        </div>
      </div>
    </div>

      




  







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script>
    
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>