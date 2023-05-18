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

            <!-- Avatar -->
            <div class="dropdown d-flex">

            <p class="me-4 mt-3 text-white myf-custome6-font">ADMIN</p>



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
      <div class="row me-1">
 
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
           
           >Verification Batch List</p
         >

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
           <form class="d-flex input-group w-auto" method="post">
             <div class="input-group">
               <div class="form-outline">
                 <input id="search-input" type="search" id="form1" name="searching" class="form-control" />
                 <label class="form-label" for="form1">Search</label>
               </div>
               <button id="search-button" type="button" name="searchenter" class="btn btn-primary" id="search1">
                 <i class="fas fa-search"></i>
               </button>
             </div>
           </form>
         </div>
       </div>
     </caption>

     <thead class="rounded-1 table-responsive" style="background-color: #334a8bd0;">
       <tr>
       <th class="text-white">Trainer</th>
       <th class="text-white">Batch</th>
       <th class="text-white">Batch Year</th>
       <th class="text-white">Qualification</th>
       <th class="text-white">Validity Date</th>
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
              <div class="col-12">

                   <div class="mb-3">
                    <input type="text" class="form-control" id="addqualificationname" placeholder="Qualification Name">
                  </div>
                  
               </div>

               <div class="col-12">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="addqualificationcode" placeholder="Qualification Code">
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

          
          <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="approve_details">
           
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
   
    <script src="../javascript/adminverificationbatchlist.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>