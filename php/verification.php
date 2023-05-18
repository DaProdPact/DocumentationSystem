<?php 
require('./database.php');

session_start();
if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href="http://localhost/DocumentationSystem/index.php";';
  echo '</script>';
}


$session_id = $_SESSION['id'];

require('../link/header.html');
?>

    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>


      ::-webkit-scrollbar {
    display: none;
    }
    
    
    
  



    /* transform: rotate(-0.25turn); */


    </style>



    </head>
<body class="bg-secondary bg-opacity-50" >
  <div class="row" id="eto">

<div class="col-12">
      <div class="row">
                          <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #251d77ad;">
        <!-- Container wrapper -->
        <div class="container-fluid mx-4">
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
          <div class="collapse navbar-collapse d-flex align-text-center">
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
            <input type="hidden" id="<?=$session_id?>" class="requestid">
            <input type="hidden" id="<?=$session_name?>" class="requestname">
            <input type="hidden" id="<?=$row['trainer_profile']?>" class="requestprofile">.
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


      
        <div class="row">
   
        <div class="col-4 offset-4 mt-3 text-center p-2 text-white myf-custome6-font py-3" style="background-color: #251d77ad; border-radius:1rem; ">
        <h1>Verify Qualification</h1>
        </div>

      </div>

      <div class="row mt-5 mx-5" style="background-color: #79797963; border-radius:1rem;">

      <?php 
      
     
      $verification_query = "SELECT * FROM `trainer_list_qualification`  LEFT JOIN trainer_qualification ON trainer_qualification.qualification_id = trainer_list_qualification.selected_qualification WHERE trainer_qualification_list = '$session_id' ";
      $verification_sql = mysqli_query($connection,$verification_query);       

      if($verification_sql->num_rows > 0){
        echo "<div id='registerfillupfields' class='alert alert-success text-center'>
        Please wait the admin approval
        <i class='fas fa-error'></i>
      </div>" ;
    }
      ?>


<?php
    $qualification_query = "SELECT * FROM trainer_qualification";
    $qualification_sql = mysqli_query($connection,$qualification_query);                    
    ?>
  <div class="row ps-3 py-3">
    <?php 
  while($verow = mysqli_fetch_array($verification_sql)){ ?>

<div class="col-4 offset-2 ps-5 mt-3">
    <input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?=$verow['qualification_code'];?>" disabled>
</div>

<div class="col-2 mt-3">
<input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?= $verow['trainer_list_nttcno']; ?>" disabled>
</div>
<div class="col-2 mt-3">
<input class="w-100 border border-secondary ps-2 py-2 border-2" style="background-color: #d1d9e1; border-radius:.5rem;" type="text" value="<?= $verow['validity_date']; ?>" disabled>
</div>

<?php } ?>


<div id="qualificationform" class="row">

<div class="col-4 offset-2 ps-5 mt-3">
        
        <?php
            $qualification_query = "SELECT * FROM trainer_qualification";
            $qualification_sql = mysqli_query($connection,$qualification_query);                    
            ?>
            <select class="form-select form-select-sm py-2 border-2 border-secondary my-3" id="qualification_register" name="qualification_register">

            <option value="0">Choose Qualification</option>
            <?php
            
            while($row = mysqli_fetch_array($qualification_sql)){
                $qid = $row['qualification_id'];
                $qname = $row['qualification_code'];

                echo"<option value="."$qid".">$qname<br></option>";
            }

        ?>
        
          
          </select>
        </div>
        
        <div class="col-2 mt-4"   style="outline-color: red;">
        <div class="form-outline">
          <input type="text"  id="qualification_nttcno" name="qualification_nttcno" class="form-control my-2" />
          <label class="form-label" for="email_login">NTTC NO.</label>
        </div>
        
        </div>
        <div class="col-2 mt-4"   style="outline-color: red;">
        <div class="form-outline my-2">
          <input type="date" id="vdate" class="form-control" />
          <label class="form-label" for="year">Validity Date</label>
          </div>
        
        </div>

        <div class="col-1 mt-4">
        <div class="btn btn-primary mt-2" id="send"> <i class="fas fa-paper-plane"> </i> Send</div>
  
        </div>

        
      </div>




        <div class="col-5 offset-5 d-flex justify-content-end mt-2 mb-2 ">
        
      
        <div class="btn ps-3 me-3 mt-5 text-white fw-bold mb-4" id="verification_con" style="background-color: rgb(45 148 56);">
         <i class="fas fa-angle-double-right"></i>&nbsp&nbspContinue</div>
        
        
        </div>















</div>
<?php
      




  ?>




        </div>


   

      </div>

      


    </div>

      



      <div class="mb-2 position-absolute position-fixed end-0 bottom-0 me-1" id="qdetails">
        <div class="toast qdetails">
          <div class="toast-header bg-danger">
          <strong class="me-auto text-white text-primary-75" style="letter-spacing: .1em;"><i class="fas fa-key"></i> Qualification Details</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body bg-danger bg-opacity-75">
          <p class="text-white">Please Add the Qualification Details</p>
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







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="../javascript/verification.js"></script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>