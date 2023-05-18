<?php 
require('../php/database.php');


require('../link/header.html');
session_start();
$elementsview = $_SESSION['view'];
$basicunit = $_SESSION['basiccomp'];
$qualiunit = $_SESSION['qualificationver'];
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
           
           >Manage Learning Outcome</p
         >
         <div class="d-flex w-auto gap-3">

<button class="btn text-white" style="background-color: #334a8bd0;" id="addqualification"><i class="fas fa-plus-circle"></i> &nbsp&nbsp Add Learning Outcome</button>
<button class="btn text-white" style="background-color: #334a8bd0;" id="backunit"><i class="fas fa-circle-arrow-left"></i> &nbsp&nbsp Back</button>


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


           <form class="d-flex input-group w-auto" method="post">
             <div class="input-group">
               <div class="form-outline">
                 <input id="search-input" type="search" id="form1" name="searching" class="form-control" />
                 <input type="hidden" id="<?=$elementsview?>" class="elementview">
                 <input type="hidden" id="<?=$basicunit?>" class="basicunit">
                 <input type="hidden" id="<?=$qualiunit?>" class="qualiunit">

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
       <th class="text-white">Learning Outcome</th>
       <th class="text-white">Duration</th>
       <th class="text-white">Performance Criteria Count</th>
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
  <div class="col-12 mb-4">

  <div class="">
   <textarea class="form-control" rows="4" id="details" placeholder="Learning Outcome"></textarea>
 </div>
 
</div>
</div>
<div class="row">
<div class="col-6 my-1">

<div class="mb-3">
<input type="text" class="form-control" id="element_hours" placeholder="Duration" value="">
</div>

</div>

<div class="col-6 my-1">

<div class="mb-3">

<input type="text" class="form-control" id="element_count" placeholder="Performance Criteria Count" value="">
</div>

</div>
</div>


   </div>
 
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="addqualificationbtn">Add Learning Outcome</button>
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
   
    <!-- <script src="../javascript/adminelements.js"></script> -->

 <script>
$(document).ready(function () {
var elementview = $('.elementview').attr('id')
var basicunit = $('.basicunit').attr('id')
var qualiunit = $('.qualiunit').attr('id')


$('#backunit').on('click',function(){
  window.history.back();
  
})

console.log(elementview)
console.log(basicunit)
console.log(qualiunit)

var tr

let lastPage;
let pageNum;
let student_count;


let pagehigh;
let pagelow;


let pagedivlast = 5;
let pagedivfirst = 1;
    $('#addqualification').on('click',function(){
        console.log('whoops')
      $('#addModal').modal('show')
    })

     

    $('#addqualificationbtn').on('click',function(){
        console.log('whoopiues')
        var qualiname = qualiunit;
        var compename = basicunit;
        var elename = elementview;
        var element_count = $('#element_count').val();
        var element_hours = $('#element_hours').val();
        var details = $('#details').val();


        console.log(qualiname)
        console.log(compename)
        console.log(elename)
        console.log(element_count)
        console.log(element_hours)
        console.log(details)


        let add = 'add';
        $.ajax({
          url:'adminelementsaction.php',
          method:'post',
          data:{
            add:add,
            qualiname:qualiname,
            compename:compename,
            elename:elename,
            element_count:element_count,
            element_hours:element_hours,
            details:details,
          },
          success:function(res){
            $('#addModal').modal('hide')
            $('#successAddedModal').modal('show');
            setTimeout(
              function() 
              {
                window.location.href ='http://localhost/DocumentationSystem/admin/adminelements.php'
              }, 1000);
          }
        })
    
      })




        qualipage(1);
        pagination();
    
         lastPage = 1;
         pageNum;
         student_count;
    
    
         pagehigh;
         pagelow;
    
    
         pagedivlast = 5;
         pagedivfirst = 1;
    
        var firstname = '';
  
          
          function qualipage(page) {
          let gettrainer = 'gettrainer'
          $.ajax({ 
           url: "adminelementsaction.php?page=" + page,
           method: "GET",
           data:{
              gettrainer:gettrainer,
              elementview:elementview,
           },
           success: function (res) {
             console.log(res);
             if(res == 2){
                   
             $("#table_body").html(`<tr class="table-active">
             <td colspan="6" class="text-center"> No Record Found </td>
             </tr>`);
          
             }
             else{
             let requests = JSON.parse(res);
          
          
             let rows = "";
             for (request of requests){
  
                  rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
                  <td style="width:35%;">${request.lmar_element_name}</td>
                  <td>${request.lmar_element_hours}</td>
                  <td>${request.lmar_element_percount}</td>

                   <td> 
                   <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.lmar_element_id} "></i>
                   <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.lmar_element_id}"></i>
           
                     </td>
               </tr>`
            
          
       
  
             }
             $("#table_body").html(rows);
    
  
    
             $('.delete_data').on('click',function(){
              var remove = $(this).attr('id')
              console.log(remove)
    
              $('#removeModal').modal('show')
    
              var deletedarea = "";
              deletedarea += `
              <div class="modal-header bg-danger">
              <h5 class="modal-title text-white" id="exampleModalLabel">Delete Element</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure you want to delete this Element? </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-danger" data-mdb-dismiss="modal">Close</button>
              <button type="button" id="${remove}"class="btn btn-danger deletequali">Delete</button>
            </div>
          `;
        
            $("#remove_details").html(deletedarea); 
    
            $('.deletequali').on('click',function(){
              var remove = $(this).attr('id');
              console.log(remove)
              let deletes = 'deletes'  
              $('#removeModal').modal('hide');
    
              $.ajax({
                    url:'adminelementsaction.php',
                    method:'post',
                    data:{
                      remove:remove,
                      deletes:deletes,
                    },
                    success:function(response){
                    
                    $('#successdeleteModal').modal('show');
                    setTimeout(
                      function() 
                      {
                        window.location.href ='http://localhost/DocumentationSystem/admin/adminelements.php'
        
                      }, 1000);
                    }
                  })
    
             })
             })
    
            
             
    
    
             $('.edit_data').on('click',function(){
              var editid = $(this).attr('id')
              console.log(editid)
              $('#dataModal').modal('show')
    
              let edit = 'edit';
              $.ajax({
                url:'adminelementsaction.php',
                method:'post',
                data:{
                  edit:edit,
                  editid:editid,
                },
                success:function(response){
                  console.log(response)
    
                  let edits = JSON.parse(response);
  
                  let rows = "";
                  for (edit of edits){
             
                    rows += `
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
                  <div class="col-12 mb-4">
     
                  <div class="">
                   <textarea class="form-control" rows="4" id="details" placeholder="certification_details">${edit.lmar_element_name}</textarea>
                 </div>
                 
              </div>
              </div>
              <div class="row">
              <div class="col-6 my-1">
     
              <div class="mb-3">
                <label class="ms-2">Element Hours</label>
               <input type="text" class="form-control" id="element_hours" placeholder="Duration." value="${edit.lmar_element_hours}">
             </div>
             
          </div>

          <div class="col-6 my-1">
  
          <div class="mb-3">

          <label class="ms-2">Element Count</label>

           <input type="text" class="form-control" id="element_count" placeholder="Count " value="${edit.lmar_element_percount}">
         </div>
         
      </div>
      </div>
  
  
  
              
              <div class="row">
              
  
              <div class="col-12 my-2">
  

      
                    <input type="hidden" id="elename" value="${edit.lmar_unit_comp}">
                    <input type="hidden" id="compename" value="${edit.competencies_id}">
                    <input type="hidden" id="qualiname" value="${edit.qualification_id}">

                    


   

                  
               </div>
  
  
               </div>



  
  
               <div class="row">
              
  

  
  
               </div>
  
                   
  
  
  
  
    
                   </div>
                 
                    <div
                    class="modal-footer rounded-0 py-2"
                    style="background-color: rgb(112 108 251 / 75%);"
                  >
                  <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.lmar_element_id}">Update Unit Of Competencies</button>
                  </div>
                  
                  `
  
       
    
               
    
                  }
    
                  $('#data_detail').html(rows)
  
                  $('.update_detail').on('click',function(){
                    var upd = $(this).attr('id')
                    console.log(upd)
                    var qualification_register = $('#qualification_register').val()
                   
  
                    var qualiname = $('#qualiname').val()
                    var compename = $('#compename').val()
                    var elename = $('#elename').val()
                    var element_count = $('#element_count').val()
                    var element_hours = $('#element_hours').val()
                    var details = $('#details').val()

                    console.log(qualiname)
                    console.log(compename)
                    console.log(elename)
                    console.log(element_count)
                    console.log(element_hours)
                    console.log(details)

  
  
                    let update = 'update'
    
                    $.ajax({
                      url:'adminelementsaction.php',
                      method:'post',
                      data:{
                        update:update,
                        upd:upd,
                        qualiname:qualiname,
                        compename:compename,
                        elename:elename,
                        element_count:element_count,
                        element_hours:element_hours,
                        details:details,

                   
                      },
                      success:function(response){
                        console.log(response)
                          $('#dataModal').modal('hide')
                          $('#successUpdateModal').modal('show');
                          setTimeout(
                            function() 
                            {
                              window.location.href ='http://localhost/DocumentationSystem/admin/adminelements.php'
                            }, 1000);
    
                      }
                    })
                  })
    
                  
    
                }
              })
    
             })
          
        
        
          
          }   
          
          
          
           },
          });
          }



  

        function pagination() {
           $.ajax({
               url: 'adminelementsaction.php',
               method: 'GET',
               data:{
                elementview:elementview,
               },
               success: function (result) {
                   pageNum = result / 10;
                   pageNum = Math.ceil(pageNum);
                   student_count = result;
        
                   pagelow = Math.min(pageNum,pagedivfirst);
                   pagehigh = Math.min(pageNum,pagedivlast);
        
        
                   let pages = "";
        
                   for (let i = pagelow; i <= pagehigh; i++) {
                       pages += `<li class="page-item " id="page-${i}"> <a class="page-link" href="#">${i}</a></li>`;
                       console.log(pagehigh);
                       console.log(pagelow);
                       
                   }
                   
                   
                   if(pagehigh == pageNum) {
                       $('#nextPage').hide()
        
                   }
                    if (pagehigh != pageNum){
                       $('#nextPage').show()
                      
                   }
                    if (pagelow == 1){
                       $('#prevPage').hide()
                       
                    }
                    if (pagelow != 1){
                       $('#prevPage').show()
                       
                       
                   }
                   $('.page-list').first().next().after(pages);
               }
        
           
           })
        
        }
        
       
  $('ul').on('click', 'li', function (e) {
      let page = $(this).text().trim();
   
      if (page == 'Previous'){
          lastPage--;
   
          if (lastPage >= 1){
            qualipage(lastPage);
   
              if (pagelow > lastPage) {
                  pagedivlast-=5;
                  pagedivfirst-=5;
   
   
                for (let p = pagelow; p <= pagehigh; p++) {
                  $("#page-"+p).hide();
                }
   
                pagination(pagedivfirst,pagedivlast);
   
              }
          }
   
          else {
              lastPage++;
          }
   
          $('.page-item').removeClass('active');
          $('#page-'+lastPage).addClass('active');
      }
   
      else if (page == 'Next'){
   
          lastPage++;
          
          if (lastPage <= pageNum){
           
            qualipage(lastPage);
              $('.page-item').removeClass('active');
   
              if (pagehigh < lastPage) {
                pagedivlast+=5;
                pagedivfirst+=5;
   
                for (let n = pagelow; n <= pagehigh; n++) {
                      $("#page-"+n).hide();
                    }
                 pagination(pagedivfirst,pagedivlast);
                  }
          }
   
          else {
              lastPage--;
   
          }
   
          $('.page-item').removeClass('active');
          $('#page-'+lastPage).addClass('active');
      }
      else if (page == '>'){
        lastPage++;
        pagedivfirst += 5;
        pagedivlast += 5;
   
          for (let x = pagelow; x <= pagehigh; x++) {
            $("#page-"+x).hide();
          }
          if (lastPage <= pageNum){
            qualipage(pagehigh+1);
              pagination(pagedivfirst,pagedivlast);
   
            }
          else {
            lastPage--;
          }
          $('.page-item').removeClass('active');
            $('#page-'+lastPage).addClass('active');
   
      }
      else if (page == '<'){
        lastPage--;
        pagedivfirst -= 5;
        pagedivlast -= 5;
   
          for (let y = pagelow; y <= pagehigh; y++) {
            $("#page-"+y).hide();
          }
          if (lastPage <= pageNum){
            qualipage(pagelow-5);
              pagination(pagedivfirst,pagedivlast);
   
   
            }
          else {
            lastPage--;
          }
          $('.page-item').removeClass('active');
          $('#page-'+lastPage).addClass('active');
            //$('#page-'+lastPage).addClass('active').siblings().removeClass('active');
   
      }
   
      else {
          lastPage = page;
          qualipage(page);
          $(this).addClass('active').siblings().removeClass('active');
      }
   });
   $('#dropdown_logout').on('click',function(){
        console.log('wiw')
        $('#logoutModal').modal('show');
      })
      
      $('#logouts').on('click',function(){
  
          window.location.href ='http://localhost/DocumentationSystem/index.php'

      })


})
        
        
      
    </script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });
    </script>

    
    </body>
</html>