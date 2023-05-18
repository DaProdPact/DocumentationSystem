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
    <div
class="col-12 shadow bg-opacity-25 border-0 sticky-top bg-image"
style="background-image: url(../img/bg1.jpg); height: 105vh; width:100%;"
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
<h2 class="accordion-header" id="flush-headingbatch">
<button
class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
type="button"
data-mdb-toggle="collapse"
data-mdb-target="#flush-collapsebatch"
aria-expanded="false"
aria-controls="flush-collapsebatch"
>
<i class="fas fa-user-cog"></i><span class="ms-2 mt-1">Qualification</span>
</button>
</h2>

<div
id="flush-collapsebatch"
class="accordion-collapse collapse bg-transparent"
aria-labelledby="flush-collapsebatch"
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
  




</div>

</div>
</div>

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
      <div
  class="row me-1">
 
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
                  
                  >Add Qualification</p
                >
                <div class="d-flex w-auto gap-3">
        
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="addqualibtn"><i class="fas fa-cloud-download-alt"></i> &nbsp&nbsp Add Qualification</button>
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="archieve"><i class="fas fa-box-open"></i></button>

                 
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
                </div>
              </div>
            </caption>

            <thead class="rounded-1 table-responsive" style="background-color: #334a8bd0;">
              <tr>

                <th class="text-white">Qualification Name</th>
                <th class="text-white">NTTC NO.</th>
                <th class="text-white">Validity Date</th>
                <th class="text-white">Status</th>
              </tr>
            </thead>
            <tbody id="table_body" class="bg-white">
  
            

            </tbody>


         
          </table>


    </div>
    <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item page-list">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous </a>
                    </li>
                    
                    <li class="page-item page-list">
                        <a class="page-link" href="#" id="prevPage" tabindex="1" aria-disabled="true"> < </a>
                    </li>


                    <li class="page-item page-list">
                        <a class="page-link" href="#" id="nextPage" tabindex="1" aria-disabled="true"> > </a>
                    </li>

                    <li class="page-item page-list">
                        <a class="page-link" href="#" id="next">Next</a>
                    </li>
                </ul>
            </nav> 
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

        <div id="expiredModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-xl">
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
            <div class="modal-body m-0">
            <table
            id="myTable"
            class="table table-responsive align-middle bg-transparent table-striped table-hover rounded"
          >
            <thead class="rounded-1 table-responsive" style="background-color: #334a8bd0;">
              <tr>
              <th class="text-white">Qualification Name</th>
                <th class="text-white">NTTC NO.</th>
                <th class="text-white">Validity Date</th>
                <th class="text-white">Status</th>
        
              </tr>
            </thead>
            <tbody id="table_modal_body" class="bg-white">
  
            

            </tbody>
            </table>
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

  


<?php
    $qualification_query = "SELECT * FROM trainer_qualification";
    $qualification_sql = mysqli_query($connection,$qualification_query);                
?>
        <select class="form-select form-select-sm py-2 border-2 border-secondary my-3" id="qualification_added" name="qualification_added">


        <option value="0">Choose Qualification</option>
        <?php
        
        while($verow = mysqli_fetch_array($qualification_sql)){
            $qid = $verow['qualification_id'];
            $qc= $verow['qualification_code'];
            $_SESSION['code'] = $qc;
            $qcode = $verow['qualification_title'];
            

            echo"<option id="."$qc"." value="."$qid".">$qcode<br></option>";

           

        }

   
      
        ?>
             
      </select>

</div>
                  <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="text" id="nttcno" class="form-control" />
                    <label class="form-label" for="nttcno">NTTC No.</label>
                    </div>
                  </div>


                  <div class="col-12">
                  <div class="form-outline my-2">
                    <input type="date" id="validity" class="form-control" />
                    <label class="form-label" for="validity">Validity Date</label>
                    </div>
                  </div>
                  <input type="hidden" id="qcode" value="<?php echo $_SESSION['code'];?>">
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
                  Add Qualification
                </button>
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
   
    <script src="../javascript/addqualification.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>