<?php 
require('./database.php');

session_start();
if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href="http://localhost/DocumentationSystem/index.php";';
  echo '</script>';
}   
 $id = $_SESSION['id']; 
$session_batch =  $_SESSION['batch'];
$qualification = $_SESSION['choosecourse'];



 $datenow = new DateTime("now");
 $datenow = date('F j Y');
 $yearnow = date('Y');


require('../link/header.html');
?>
    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>


      ::-webkit-scrollbar {
    display: none;
    }
    

    
    @page { 
        size: portrait;
     }
  
    
    
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    input[type="number"] {
      -moz-appearance: textfield;
    }
    @media print {
        body *:not(#tipattendanceprint):not(#tipattendanceprint *) :not(#tipattendanceprintdetails):not(#tipattendanceprintdetails *)  {
          visibility: hidden;
        }
        #tipattendanceprint{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          padding-left:12px;
        }
        
      #tipattendanceprintdetails{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          padding-left:12px;
          height:100vh;
        }
      
      }





/* 
      @media print {
        body *:not(#attendancedetails):not(#attendancedetails *):not(#attendanceprint) :not(#attendanceprint *) {
          visibility: hidden;
        }
        #attendancedetails{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;

          height: 200vh;
          
        }
        #attendanceprint{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height: 100vh;
  

        }
      } */

    tr{
        height: 10px;
    }


    </style>



    </head>
<body class="bg-white">
<div class="row">
    <div class="col-2 pe-0"">
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
                  
                  >Tip Attendance</p
                >
                <div class="d-flex w-auto gap-3">
        
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="printdetails"> <i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Print TIP with Details</button>
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="templateprint"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbsp Print TIP Template</a>

                 
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
                <th class="text-white">Fullname</th>
                <th class="text-white">Address</th>
                <th class="text-white">Contact Number</th>
                <th class="text-white">Action</th>
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



      
  <form class="form-horizontal" action="tipattendanceimportcsv.php"  action="" method="post" name="upload" enctype="multipart/form-data">
  <div class="modal fade" id="csvselection" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Import CSV</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                

                <div class="ms-2">
                  <label>Choose CSV file</label>
                  <input type="file" name="file"accept=".csv">
                </div>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="submit" name="import" class="btn btn-primary">Import</button>
        </div>
      </div>
    </div>
  </div>

  </form>











  
<div class="row bg-white m-0 mt-2 mb-5" style="height:100vh" id="tipattendanceprintdetails">


<div class="row">
<span class="text-end mt-1" style="font-size:10px;">RTCCL-REG-<?= $yearnow?>-TIP</span>
  <table class="table border-dark table-bordered ms-1" style="margin-top: -2rem;">

  <tbody>



      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Name of TVI:  </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">RTCCL GUIGUINTO BULACAN</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Complete Address:</td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">RTC COMPOUND, BRGY. TABANG, GUIGUINTO, BULACAN</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Qualification/s:</td>

      <?php 
           $trainer_qualification_query = "SELECT * FROM batch_list 
           LEFT JOIN attendance ON batch_list.batch_id  = attendance.import_batch LEFT JOIN trainer_account ON batch_list.batch_trainer  = trainer_account.trainer_id LEFT JOIN trainer_qualification ON batch_list.batch_qualification  = trainer_qualification.qualification_id  WHERE import_trainer_id = '$id' AND import_qualification_id = '$qualification' AND  import_batch = '$session_batch' " ;

          $trainer_qualification_sql = mysqli_query($connection,$trainer_qualification_query);  
          while($trainer_qualification_row = mysqli_fetch_array($trainer_qualification_sql)){ 
          
             $_SESSION['qualificationtip'] = $trainer_qualification_row['qualification_title'];; 
          }
   
      
      
      ?>
         <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4"><?php echo $_SESSION['qualificationtip'] ?></td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Type of Scholarship:  </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">TULONG TRABAHO SCHOLARSHIP PROGRAM</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Contact No.: </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">(044) 761-8754 / (044) 792-6503</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Email Address:</td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">rtcguiguinto@tesda.gov.ph</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Date:  </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4"><?php echo $datenow ?></td>

      
      </tr>

      
    

      


        </tbody>
      </table>
    </div>
       
    
            

          

            <div class="row">

                
            <table class="table mt-2 border-dark table-bordered ms-1">
                <thead class="border-dark">
                <tr class="border-dark" style="height: 15px; font-size:11px" >
                    <th class="p-0 text-center py-1" style="font-size:11px; width:4%;">#</th>
                    <th class="p-0 text-center py-1" style="width:22%; font-size:11px;">NAME</th>
                    <th class="p-0 text-center py-1" style="width:34%; font-size:11px;">ADDRESS</th>
                    <th class="p-0 text-center py-1" style="width:15%; font-size:11px;">CONTACT NUMBER</th>
                    <th class="p-0 text-center py-1" style="width:15%; font-size:11px;">FB ACCOUNT</th>
                    <th class="p-0 text-center py-1" style="width:15%; font-size:11px;">SIGNATURE</th>

                    

                    </tr>

                </thead>
                <tbody>

                

                <?php 
                 $printdetails_query = "SELECT * FROM attendance WHERE import_trainer_id = '$id' AND import_qualification_id = '$qualification' AND  import_batch = '$session_batch' ORDER BY LastName ASC ";
                 $printdetails_sql = mysqli_query($connection,$printdetails_query);                    
                
                $count = 1;
                while($row = mysqli_fetch_array($printdetails_sql)){
                // while($count <= 30){
                  $middle =  substr($row['MiddleName'], 0, 1);
                  echo '<tr class="border-dark text-center" style="height: 15px; font-size:12px">
                  <td class="p-0">'.$count.'</td>
                  
                  <td class="p-0 text-start ps-1" style="font-size:10px;">'.$row['LastName']." ".$row['Extension_Name'].", ".$row['FirstName']." ".$middle.".".'</td>
                  <td class="p-0" style="font-size:10px;">'.$row['Street_No']." ".$row['Barangay']." ".$row['Municipality']. " ".$row['Permanent_Province'].'</td>
                  <td class="p-0">'.$row['Contact_Number'].'</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>' ;
                  $count++;

                // }
    

              }
                ?>
                 <tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">25</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>

                  <tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">26</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>
                  <tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">27</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>
                  <tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">28</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>
                  <tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">29</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>
                  <tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">30</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>

                
                </tbody>
            </table>
            </div>
   
            </div>



            <div class="row bg-white m-0 mt-1" style="height:100vh" id="tipattendanceprint">


<div class="row">
<span class="text-end mt-1" style="font-size:10px;">RTCCL-REG-<?= $yearnow?>-TIP</span>        
  <table class="table border-dark table-bordered ms-1" style="margin-top: -2rem;">

  <tbody>



      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Name of TVI:  </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">RTCCL GUIGUINTO BULACAN</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Complete Address:</td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">RTC COMPOUND, BRGY. TABANG, GUIGUINTO, BULACAN</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Qualification/s:</td>


      <?php 
           $trainer_qualification_query = "SELECT * FROM batch_list 
           LEFT JOIN attendance ON batch_list.batch_id  = attendance.import_batch LEFT JOIN trainer_account ON batch_list.batch_trainer  = trainer_account.trainer_id LEFT JOIN trainer_qualification ON batch_list.batch_qualification  = trainer_qualification.qualification_id  WHERE import_trainer_id = '$id' AND import_qualification_id = '$qualification' AND  import_batch = '$session_batch' " ;

          $trainer_qualification_sql = mysqli_query($connection,$trainer_qualification_query);  
          while($trainer_qualification_row = mysqli_fetch_array($trainer_qualification_sql)){ 
          
             $_SESSION['qualificationtip'] = $trainer_qualification_row['qualification_title'];; 
          }
   
      
      
      ?>
      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4"><?php echo $_SESSION['qualificationtip'] ?></td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Type of Scholarship:  </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">TULONG TRABAHO SCHOLARSHIP PROGRAM</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Contact No.: </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">(044) 761-8754 / (044) 792-6503</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Email Address:</td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4">rtcguiguinto@tesda.gov.ph</td>

      
      </tr>
      <tr class="border-dark text-center">
      <td class="py-0 text-center p-0" style="font-size:16x; height: 16px; font-weight:bold; width:26%; font-family:sans-serif;">Date:  </td>

      <td class="py-0" style="font-weight:bold; font-size:14px; height: 14px;" colspan="4"><?php echo $datenow ?></td>

      
      </tr>

      
    

      


        </tbody>
      </table>
    </div>
       
    
            

          

            <div class="row">

                
            <table class="table mt-2 border-dark table-bordered ms-1">
                <thead class="border-dark">
                <tr class="border-dark" style="height: 15px; font-size:11px" >
                    <th class="p-0 text-center py-1" style="font-size:11px; width:4%;">#</th>
                    <th class="p-0 text-center py-1" style="width:22%; font-size:11px;">NAME</th>
                    <th class="p-0 text-center py-1" style="width:20%; font-size:11px;">ADDRESS</th>
                    <th class="p-0 text-center py-1" style="width:20%; font-size:11px;">CONTACT NUMBER</th>
                    <th class="p-0 text-center py-1" style="width:20%; font-size:11px;">FB ACCOUNT</th>
                    <th class="p-0 text-center py-1" style="width:20%; font-size:11px;">SIGNATURE</th>

            

                    </tr>

                </thead>
                <tbody>



                <?php 
                
                $count = 1;
                while($count <= 30){
                  echo '<tr class="border-dark text-center" style="height: 15px; font-size:14px">
                  <td class="p-0">'.$count.'</td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  <td class="p-0"></td>
                  
                  </tr>' ;
                  $count++;

                }

                ?>

                
                </tbody>
            </table>
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
   
    <script src="../javascript/tipattendance.js"></script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>