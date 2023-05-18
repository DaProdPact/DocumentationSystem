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


$stmt = "SELECT COUNT(lmar_element_id) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '$basiccompentencies'  ";
$result = mysqli_query($connection, $stmt);

if(mysqli_num_rows($result) > 0){
    $trow = mysqli_fetch_assoc($result);
    $basicelementcount = $trow["totalelem"];

} 

$stmt = "SELECT COUNT(lmar_unit_id) as totalelem FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '$basiccompentencies'  ";
$result = mysqli_query($connection, $stmt);

if(mysqli_num_rows($result) > 0){
    $trow = mysqli_fetch_assoc($result);
    $basicunitcount = $trow["totalelem"];

} 

$stmt = "SELECT COUNT(lmar_element_id) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '2' AND lmar_element_quali = '$sessionqualification' ";
$result = mysqli_query($connection, $stmt);

if(mysqli_num_rows($result) > 0){
    $trow = mysqli_fetch_assoc($result);
    $commonelementcount = $trow["totalelem"];
      ?>
        <?php }
        

$stmt = "SELECT COUNT(lmar_unit_id) as totalelem FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '2' AND lmar_unit_qualification = '$sessionqualification'  ";
$result = mysqli_query($connection, $stmt);

if(mysqli_num_rows($result) > 0){
  $trow = mysqli_fetch_assoc($result);
  $commonunitcount = $trow["totalelem"];

} 

$stmt = "SELECT COUNT(lmar_element_id) as totalelem FROM `lmar_element` WHERE lmar_element_comp = '3' AND lmar_element_quali = '$sessionqualification' ";
$result = mysqli_query($connection, $stmt);

if(mysqli_num_rows($result) > 0){
    $trow = mysqli_fetch_assoc($result);
    $coreelementcount = $trow["totalelem"];
      ?>
<?php } 

$stmt = "SELECT COUNT(lmar_unit_id) as totalelem FROM `lmar_unit_competencies` WHERE lmar_unit_comp = '3' AND lmar_unit_qualification = '$sessionqualification'  ";
$result = mysqli_query($connection, $stmt);

if(mysqli_num_rows($result) > 0){
  $trow = mysqli_fetch_assoc($result);
  $coreunitcount = $trow["totalelem"];

}




require('../link/header.html');
?>
    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>


      ::-webkit-scrollbar {
    display: none;
    }
    
    
    #none{
      position: absolute;
      top: 145px;
      left: 0;
    }

    #none2{
      position: absolute;
      top: 80px;
     
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


       
    @page { 
      size : landscape A0;

    }

       
    @media print {


     

body *:not(#printcertemncii_progresschart):not(#printcertemncii_progresschart *){
  
  display:none;
}



#printcertemncii_progresschart{

position: absolute;
top: 0;
right: 0;
width: 100%;
height: 100vh;
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
<body class="bg-secondary">
<?php 

   require_once('./eimncii_basic.php'); 

?>
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

        <!-- <div class="row mt-1">
      <div class="col-6 offset-3">
          <h4 class="text-center p-2 text-white rounded-5" style="background-color:#1b4a9f;"><?= $sessionqualiname?></h4>
      </div>


        </div> -->

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



   
             
          <div class="col-5 mt-5 d-flex me-5 pe-3 mb-3">
          <div class="col-2 text-center text-white mt-2">
            <p class="bg-primary px-1 myf-custome6-font rounded-1" style="transform: rotate(-0.25turn);">PC</p>
          </div>
          <div class="col-12 rounded-2" style="margin-left:-2.5rem; margin-top:-1.7rem; background-color:#888DCB;">
          <h5 class="ps-3 text-white myf-custome6-font  mt-2 competencies">PROGRESS CHART WITH DETAILS</h5>
          <p class="ms-3 text-white myf-custome6-font unit" id="" style="font-size:13px;"><?=strtoupper($sessionqualiname)?></p>
      
          <br>

 
          <div class="row d-flex mt-3 mb-3 me-2">
            <div class="col-12 d-flex justify-content-end">
            <button class="btn text-white" style="background-color: #334a8bd0;" id="print_chart"><i class="fas fa-print"></i> &nbsp&nbsp Print Progress Chart</button>
        </div>    
          </div>

          </div>
        </div>




        <div class="col-5 mt-5 d-flex me-5 pe-3 mb-3">
          <div class="col-2 text-center text-white mt-2">
            <p class="bg-primary px-1 myf-custome6-font rounded-1" style="transform: rotate(-0.25turn);">PC</p>
          </div>
          <div class="col-12 rounded-2" style="margin-left:-2.5rem; margin-top:-1.7rem; background-color:#888DCB;">
          <h5 class="ps-3 text-white myf-custome6-font  mt-2 competencies" >PROGRESS CHART TEMPLATE</h5>
          <p class="ms-3 text-white myf-custome6-font unit" id="" style="font-size:13px;"><?=strtoupper($sessionqualiname)?></p>
      
          <br>

 
          <div class="row d-flex mt-3 mb-3 me-2">
            <div class="col-12 d-flex justify-content-end">
              <a href="http://localhost/DocumentationSystem/pdf/EIM-Progress-Chart.pdf" target="_blank">  <button class="btn btn-primary" style="background-color: #334a8bd0;"  id=""><i class="fas fa-print"></i>&nbsp&nbsp Print Progress Chart Template</button></a>

        </div>    
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





  







    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="../javascript/progresschart_eimncii.js"></script>
<script>
      $(document).ready(function(){
        $('#dropdown_logout').on('click',function(){
        console.log('wiw')
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