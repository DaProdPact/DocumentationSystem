<?php 
require('./database.php');

session_start();
if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href="http://localhost/DocumentationSystem/index.php";';
  echo '</script>';
}
$session_id = $_SESSION['id'];
$qualification = $_SESSION['choosecourse'];


date_default_timezone_set('Asia/Manila');   
$today = date('m/d/Y');
$batchglobal_query = "SELECT * FROM `batch_list` WHERE batch_trainer = '$session_id' AND batch_qualification = '$qualification' ";
$batchglobalsql = mysqli_query($connection,$batchglobal_query);       

while($batrow = mysqli_fetch_array($batchglobalsql)){
    $batid = $batrow['batch_id']."<br>";
    $bat = $batrow['date_end']."<br>";
    if($bat <  $today){
        $batchqueryglobal = "UPDATE `batch_list` SET `batch_validation`='2' WHERE batch_id='$batid'";
        $globalsql = mysqli_query($connection,$batchqueryglobal);
    
    }
  }

require('../link/header.html');

?>


    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap');
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


      .chooses {
  --c: #918807;
  line-height: 1.2em;
  background:
    conic-gradient(from -135deg at 100%  50%,var(--c) 90deg,#0000 0) 0    var(--p,0%),
    conic-gradient(from -135deg at 1.2em 50%,#0000 90deg,var(--c) 0) 100% var(--p,0%);
  background-size: var(--s,0%) 200%;
  background-repeat: no-repeat;
  transition: .4s ease-in, background-position 0s;
}
.chooses:hover {
  --p: 100%;
  --s: calc(50% + .61em); /* it should be 0.6em(1.2em/2) but we use a litte bigger */
  color: #fff;
}


    
 

    tr{
        height: 10px;
    }



    </style>



    </head>
<body>
                                  
 
  <div class="row" id="remove" style="height:100vh;">
    <div class="col-2 pe-0">
    
<div
class="col-12 shadow bg-opacity-25 border-0 sticky-top bg-image"
style="background-image: url(../img/bg3.jpg); height: 105vh; width:100%;"
data-mdb-spy="scroll"
data-mdb-target="#scrollspy1"
data-mdb-offset="0"
id="seenav"
>


<div class="mask" style="background-color:  #334a8bd0;">
<div class="mt-3 p-2 radius d-flex">
<img src="../img/tesdalogoo.png" width="45px" class="bg-white p-1 ms-2" style="height:5vh; border-radius: 50%;" />
<p class="text-white myf-custome6-font h2 pt-1 ps-2">TESDA</p>

</div>

<hr class="border-3 text-white w-auto" />

<div class="accordion accordion-flush" id="accordionFlushExample">




<div class="accordion-item bg-transparent border-0">
<h2 class="accordion-header" id="flush-headingqualification">
<button
class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
type="button"
data-mdb-toggle="collapse"
data-mdb-target="#flush-collapsequali"
aria-expanded="false"
aria-controls="flush-collapsequali"
>
<i class="fas fa-user-cog"></i><span class="ms-2 mt-1">Qualification</span>
</button>
</h2>

<div
id="flush-collapsequali"
class="accordion-collapse collapse bg-transparent"
aria-labelledby="flush-collapsequali"
data-mdb-parent="#accordionFlushExample"
>
<div class="accordion-body text-white ms-3"> 
<a href="choosecourse.php" class="icon-block text-white text-decoration-none">
<i class="far fa-hand-point-right text-white mb-3"></i>
<span>Choose Qualification</span>
</a>
<br>
<a href="addqualification.php" class="icon-block text-white text-decoration-none">
<i class="far fa-hand-point-right text-white mb-3"></i>
<span>Add Qualification</span>
</a>
<br>
</div>

</div>


</div>


<div class="accordion-item bg-transparent border-0">
<h2 class="accordion-header" id="flush-headingbatch">
<button
class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
type="button"
data-mdb-toggle="collapse"
data-mdb-target="#flush-collapsebatch"
aria-expanded="false"
aria-controls="flush-collapsebatch"
>
<i class="fas fa-user-cog"></i><span class="ms-2 mt-1">Batch</span>
</button>
</h2>

<div
id="flush-collapsebatch"
class="accordion-collapse collapse bg-transparent"
aria-labelledby="flush-collapsebatch"
data-mdb-parent="#accordionFlushExample"
>
<div class="accordion-body text-white ms-3"> 
<a href="choosebatch.php" class="icon-block text-white text-decoration-none">
<i class="far fa-hand-point-right text-white mb-3"></i>
<span>Choose Batch</span>
</a>
<br>
<a href="addbatch.php" class="icon-block text-white text-decoration-none">
<i class="far fa-hand-point-right text-white mb-3"></i>
<span>Add Batch</span>
</a>
<br>
</div>

</div>


</div>








</div>

</div>
</div>


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
            <!-- <p class="myf-custome6-font mt-3 text-white" style="font-size:20px;"><span  class="text-white">R</span>egional <span  class="text-white">T</span>raining <span  class="text-white">C</span>enter <span  class="text-white">C</span>entral <span  class="text-white">L</span>uzon</p>
           -->
           <p class="myf-custome6-font mt-3 text-white" style="font-size:20px;"><span  class="text-white">R</span>egional <span  class="text-white">T</span>raining <span  class="text-white">C</span>enter <span  class="text-white">C</span>entral <span  class="text-white">L</span>uzon - <span class="text-white">Guiguinto</p>
            

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
      <div class="col-4 offset-4">
          <h4 class="text-center p-2 text-white rounded-5" style="background-color:#9f7e1b;">Choose Batch</h4>
      </div>


        </div>

                        
   

        <?php
        
      $batch_query = "SELECT * FROM `batch_list`  WHERE batch_trainer = '$session_id' AND batch_qualification = '$qualification' AND batch_validation != '2' ";
      $batchsql = mysqli_query($connection,$batch_query);       

      

      while($batrow = mysqli_fetch_array($batchsql)){ ?>
            <div class="row mt-3  d-flex justify-content-center">
      <div class="col-6 bg-warning bg-opacity-75 rounded-3">
        <div class="text-center p-2 rounded-5 text-white ps-5 choosebatch<?= $batrow['batch_id'];?> h1 my-3 chooses" id="<?= $batrow['batch_id']; ?>" style="font-family: 'Tilt Warp', cursive;"><?php echo $batrow['batch_name']; ?></div>

        </div>


</div>

        <?php
      }
          ?>




    


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







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="../javascript/choosebatch.js"></script>
    <script>
    
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>