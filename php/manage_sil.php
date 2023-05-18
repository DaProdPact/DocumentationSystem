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
$batch = $_SESSION['batch'];

require('../link/header.html');
?>
    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }


      ::-webkit-scrollbar {
    display: none;
    }
    
    @page { 
        size: A4 landscape;
      
     }


    @media print {
      
  


        body *:not(#printsil_certification):not(#printsil_certification *) {
          display:none;
        }
  
        #printsil_certification{
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
          height: 100vh;
        }


      } 
      span:hover{
      color:#000;
    }
    




    </style>



    </head>
<body>
<body class="">
  <div class="row bg-secondary bg-opacity-50">
    <div class="col-2 pe-0">
    <?php 
    require('../link/navbar.php');
  ?>
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
                  
                  >Manage Supervised Industry Learning</p
                >
                <div class="d-flex w-auto gap-3">

                  <button class="btn text-white" style="background-color: #334a8bd0;" id="addshopbtn"><i class="fas fa-folder-plus"></i>&nbsp&nbsp Add Company</button>
    
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
                <th class="text-white">Logo</th>
                <th class="text-white">Company Name</th>
                <th class="text-white">Company Address</th>
                <th class="text-white">Name of Enterprise</th>
                <th class="text-white">Qualification</th>
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
                  Add Company
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
                <form method="post" action="sil_managementconnection.php" enctype="multipart/form-data">
                  <div class="col-12 my-3">
                  <div class="form-outline my-2">
                    <input type="text" id="nttcno" name="shopname" class="form-control" />
                    <label class="form-label" for="nttcno">Company Name</label>
                    </div>

                  </div>

                  <div class="col-12 my-3">
                  <div class="form-outline my-2">
                    <input type="text" id="nttcno" name="shopaddress" class="form-control" />
                    <label class="form-label" for="nttcno">Company Address</label>
                    </div>

                  </div>

                  <div class="col-12 my-3">
                  <div class="form-outline my-2">
                    <input type="text" id="nttcno" name="trainerenterprise" class="form-control" />
                    <label class="form-label" for="nttcno">Name of Enterprise Trainer</label>
                    </div>

                  </div>


                  <div class="col-12">

                  <span class="ms-2 text-primary fw-bold me-3">Insert Image</span>
                    <input type="file" name="uploadfile" />
                    <input type="hidden" name="quali" value="<?= $qualification ?>">
                    <!-- <input type="shopname" name="shopname" /> -->

    <!-- <input type="submit" name="uploadfilesub" value="upload">
    
  </form> -->
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

                <button type="submit" class="btn btn-primary"  name="uploadfilesub" value="upload">
                  Add Company
                </button>
              </div>

              </form>
            </div>
          </div>
        </div>


        <div
          class="modal fade"
          id="editshop"
          tabindex="-1"
        >
          <div class="modal-dialog">
            <div class="modal-content" id="editsholdetails">
 

            </div>
          </div>
        </div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <!-- <script src="../javascript/sil_certification.js"></script> -->
    <script>
    $(document).ready(function () {

$('#printsil_certification').hide();



$('body').on('click',function(){
    $('#printsil_certification').hide();


})



$('#dropdown_logout').on('click',function(){
  $('#logoutModal').modal('show');
})

  $("#printdetails").on("click", function(){
    console.log('wow');
    $('#printsil_certification').show();
    window.print();


})


$('#addshopbtn').on('click',function(){
    $('#addbatchmodal').modal('show')
})





  trainees(1);
  pagination();

  let lastPage = 1;
  let pageNum;
  let student_count;


  let pagehigh;
  let pagelow;
    

  let pagedivlast = 5;
  let pagedivfirst = 1;


var my_date_format = function(input){
var d = new Date(Date.parse(input.replace(/-/g, "/")));
var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
return (date + " " + time);  
         }

function trainees(page) {

let connection = 'connection';

$.ajax({ 
url: "sil_managementconnection.php?page=" + page,
method: "GET",
data:{
    connection:connection,
},
success: function (res) {
 console.log(res);
 if(res == 2){
       
 $("#table_body").html(`<tr class="table-active">
 <td colspan="6" class="text-center"> No Record Found </td>
 </tr>`);

 }
 else{
 let users = JSON.parse(res);


 let rows = "";
 for (user of users) {

   rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
        <td><img
            src="imageshop/${user.shop_image}"
            class="rounded-circle"
            height="25"
            width="25"
            loading="lazy"
            /></td>
       <td>${user.shop_name}</td>
       <td>${user.shop_address}</td>
       <td>${user.name_of_enterprise}</td>
       <td>${user.qualification_code}</td>
       <td> <i value="view" class="fas fa-eye text-success p-0 view_data" style="font-size:16px;" name="view" id="${user.attendance_id} "></i>
        <i value="view" class="fas fa-edit text-primary p-0 update_data" style="font-size:16px;" name="view" id="${user.attendance_id} "></i>
        <i value="view" class="fas fa-trash text-danger p-0 delete_data" style="font-size:16px;" name="view" id="${user.attendance_id} "></i>
        </td>
       
   </tr>`;
 }
 $("#table_body").html(rows);

 $('.view_data').on('click',function(){
  console.log('wow')
 })

//  $('.update_data').on('click',function(){

//   var traineesId = $(this).attr('id')
//   console.log(traineesId)

//   $('#editshop').modal('show')
    
//      $.ajax({
//        url: "sil_connection.php",
//        method: "post",
//        data: {
//          traineesId: traineesId,
//        },
//        success: function (response) {
//         console.log(response)
             
//         let sils = JSON.parse(response)
//         let rows = "";
//         for (sil of sils){
//           rows += `<div class="modal-header bg-primary bg-opacity-75">
            
//           <h5 class="modal-title text-white">
//            Edit Company
//           </h5>
//           <button
//             type="button"
//             class="btn-close"
//             data-mdb-dismiss="modal"
//             aria-label="Close"
//           ></button>
//         </div>



//         <div class="modal-body">
//           <div class="row">

//           <div class="col-12">
//           <?php
//               $qualification_query = "SELECT * FROM sil WHERE sil_qualification = '$qualification'";
//               $qualification_sql = mysqli_query($connection,$qualification_query);                
//           ?>
//                   <select class="form-select form-select-sm py-2 border-2 border-secondary my-3" id="qualification_added" name="qualification_added">
          
          
//                   <option value="${sil.sil_certificate_id}">${sil.shop_name}</option>
//                   <?php
                  
//                   while($verow = mysqli_fetch_array($qualification_sql)){
//                       $qid = $verow['sil_id'];
//                       $qcode = $verow['shop_name'];
                      
          
//                       echo"<option id="."$qid"." value="."$qid".">$qcode<br></option>";
          
                     
          
//                   }
          
             
                
//                   ?>
                       
//                 </select>
          
//           </div>
//         </div>

//         <div class="modal-footer">
//           <button
//             type="button"
//             class="btn btn-secondary"
//             data-mdb-dismiss="modal"
//           >
//             Close
//           </button>

//           <button id="editcompany" class="btn btn-primary">
//             Add Company
//           </button>
//         </div>`;
          
//        } 
       
//        $("#editsholdetails").html(rows);
//        $('#editcompany').on('click',function(){
//         var sil_edit = $('#qualification_added').val();
//         console.log(sil_edit)
//         console.log(traineesId)
//         let updates = 'updates';
//         $.ajax({ 
//         url: "sil_managementconnection.php",
//         method: "POST",
//         data:{
//           updates:updates,
//           sil_edit:sil_edit,
//           traineesId:traineesId,
//         },
//         success: function (res) {
//         console.log(res);
//         window.location.href ='./manage_sil.php'
//         }
//         })
        
//        })
//       }
//       })
      

// })


//  $('.view_data').on('click',function(){
//    var traineesId = $(this).attr('id')
//    $.ajax({
//      url: "traineesview.php",
//      method: "post",
//      data: {
//        traineesId: traineesId,

//      },
//      success: function (response) {
//        $('#viewModal').modal('show')
//        console.log(response)

//        let trainees = JSON.parse(response)
//        let rows = "";     
//        for(beneficiary of trainees){
//            rows += `
//            <div
//        class="modal-header py-2"
//        style="background-color: rgba(72, 157, 253, 0.747)"
//      >
//      <span
//      class="text-white float-start fw-bold"
//      style="font-size: 15px"
//      ><img src="../img/logo.png" class="bg-white rounded-circle"  width="20px" alt="" />
//      trainees Details</span
//    >
//      </div>
     
//      <div class="modal-body" id="data_detail" style="background-color: rgba(225, 249, 255, 0.678)">
          
//        <div class="row">
//        <div class="col-12">

//          <div class="row mt-1">
//            <div class="col-2">
//              <img
//                src="../img/logo.png"
//                class="ms-4 rounded-circle"

//                width="50"
//                height="50"
//                style="background-color: rgba(0, 162, 255, 0.671)"
//              />
//            </div>
//            <div class="col mt-1">
//              <p
//                class="h5 text-secondary mb-0"
//                style="font-size: 20px"
//              >
//              ${beneficiary.firstname} ${beneficiary.lastname}
//              </p>
//              <p
//                class="_responsive-description-detail myf-custome6-font h5 text-secondary mb-0"
//                style="font-size: 12px"
//              >
//              ${beneficiary.barangay} ${beneficiary.municipality} 
//              </p>
             
//            </div>
//            <hr class="mt-2 ms-4 text-primary border-1" style="width: 80%" />
//          </div>

//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//            Fullname : ${beneficiary.firstname} ${beneficiary.middlename} ${beneficiary.lastname}
//          </p>


//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//            Birthdate : ${beneficiary.birthdate}
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//            Baranggay :  ${beneficiary.barangay}
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Municipality/City : ${beneficiary.municipality}
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Contact Number :  ${beneficiary.contact} 
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Occupation : ${beneficiary.occupation} 
//          </p>
        
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Gender : ${beneficiary.sex}
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Civil Status :  ${beneficiary.civil} 
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Age : ${beneficiary.age} 
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Dependent (Name of Beneficiary of the Micro insurance Holder) : ${beneficiary.dependent} 
//          </p>
//          <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
//          Remarks : ${beneficiary.Remarks} 
//          </p>
//        </div>
//        </div>
//        </div>
//        <div
//        class="modal-footer rounded-0 py-0"
//        style="background-color: rgba(49, 145, 224, 0.5)"
//      >
//    <span class="text-white float-end" style="font-size: 12px"
//      >

//    >
//      </div>
//          `

//        }

       
//  $('#view_detail').html(rows)

 

//      }
//    })
 

//    // $(this).parent().siblings().eq(1).text('Arjhen')
//    // console.log($(this).attr('id'))



//  })
//  $('.delete_data').on('click',function(){
//    var traineesId = $(this).attr('id')
//    $('#delModal').modal('show')
//      var remove = $(this).closest('tr');
    
//      $('#deletetrainees').on('click',function(){
//        $.ajax({
//      url: "traineesdelete.php",
//      method: "post",
//      data: {
//        traineesId: traineesId,

//      },
//      success: function(resdelete){
//        if(resdelete == 1){

//          $('#delModal').modal('hide')
//          remove.remove();
//        }
//      }
//    })
//      })

//  })

   
//          $('#updateModal').modal('show');
     

    //  $.ajax({
    //    url: "sil_connection.php",
    //    method: "post",
    //    data: {
    //      traineesId: traineesId,

    //    },
    //    success: function (response) {
    //     console.log(response)
    //    } 
    //   })






//            $('#updateModal').modal('show');
//            console.log(response)

//            let trainees = JSON.parse(response)
//            let ups = "";     
//            for(upbeneficiary of trainees){
//              ups += ` 
//              <div
//              class="modal-header py-2"
//              style="background-color: rgba(40,121,211)"
//            >
//            <span
//            class="text-white float-start fw-bold"
//            style="font-size: 15px"
//            ><img src="../img/logo.png" class="bg-white rounded-circle" width="20px" alt="" />
//            Update trainees</span
//          >
//            </div>
       
//            <div class="modal-body" style="background-color: #f8f9fa6b">
           
//              <div class="row">
//              <div class="col border border-5 border-primary border-opacity-50 ms-0 ">
//              <p class="text-center text-primary mt-1">Update Details</p>
           
//                  <div class="row mt-3">
          
//                  <div class="col-4">

//                  <div class="ms-1 form-helper" style="font-size: .8rem;">Firstname</div>
//                    <input type="text" id="fname" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.firstname}"/>
             
            
   
//                  </div>

                   
//                  <div class="col-4">

//                  <div class="ms-1 form-helper" style="font-size: .8rem;">Middlename</div>
//                    <input type="text" id="mname" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.middlename}"/>
             
            
   
//                  </div>


//                  <div class="col-4">

//                  <div class="ms-1 form-helper" style="font-size: .8rem;">Lastname</div>
//                    <input type="text" id="lname" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.lastname}"/>
             
            
   
//                  </div>
//                </div>

//                <div class="row mt-3 me-2">
//                <div class="col-3">

//                  <div class="ms-1 form-helper" style="font-size: .8rem;">Birthdate</div>
//                  <input type="text" id="bdate" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1" value=" ${upbeneficiary.birthdate}"/>



//                  </div>
      
//                  <div class="col-3">

//                  <div class="ms-1 form-helper" style="font-size: .8rem;">Age</div>
//                  <input type="text" id="age" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1" value=" ${upbeneficiary.age}"/>
   
//                  </div>

//                  <div class="col-3">

//                  <div class="ms-1 form-helper" style="font-size: .8rem;">Gender</div>
//                  <input type="text" id="sex" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1" value=" ${upbeneficiary.sex}"/>

//                </div>

//                <div class="col-3">

//                <div class="ms-1 form-helper" style="font-size: .8rem;">Civil Status</div>
//                  <input type="text" id="civil" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1"value=" ${upbeneficiary.civil}"/>

//                </div>
//                    </div>

//                    <div class="row mt-3">
          
//               <div class="col-4">

//               <div class="ms-1 form-helper" style="font-size: .8rem;">Barangay</div>
//                 <input type="text" id="barangay" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.barangay}"/>
          
         

//               </div>

                
//               <div class="col-4">

//               <div class="ms-1 form-helper" style="font-size: .8rem;">Municipality/City</div>
//                 <input type="text" id="city" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.municipality}"/>
          
         

//               </div>


//               <div class="col-4">

//               <div class="ms-1 form-helper" style="font-size: .8rem;">Contact Number</div>
//                 <input type="text" id="contact" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.contact}"/>
          
         

//               </div>
//             </div>

//      <div class="row mt-3">
//      <div class="col-4">

//    <div class="ms-1 form-helper" style="font-size: .8rem;">Occupation</div>
//      <input type="text" id="occ" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.occupation}"/>



//    </div>
//    <div class="col-4">

//    <div class="ms-1 form-helper" style="font-size: .8rem;">Dependent</div>
//      <input type="text" id="dep" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.dependent}"/>



//    </div>

//    <div class="col-4">

//    <div class="ms-1 form-helper" style="font-size: .8rem;">Remarks</div>
//    <div class="form-outline">

//    <select class="form-select form-select-sm start_time py-2" id="remarks">

//    <option value="${upbeneficiary.Remarks}">${upbeneficiary.Remarks}</option>
//    <option value="none">none</option>
//    <option value="OK">OK</option>
//    <option value="Not Answer">Not Answer</option>


//    </select>

//    </div>

//    </div>
             

//    </div>



//    <div class="row mt-3 mb-2 float-end">
//      <div class="col">
 
//      <button type="button" class="btn text-white p-2 text-capitalize" data-mdb-dismiss="modal" style="font-size:12px; background-color: rgb(98 98 98)">
//        Close
//      </button>
//      <button type="button" class="btn text-white p-2 text-capitalize" id="updatetrainees"
//      style="background-color: rgb(20 125 255);  font-size:12px;">
//        Update trainees
//      </button>



//      </div>

//    </div>

//    </div>



//              </div>
//              </div>
   
//              <div
//              class="modal-footer rounded-0 py-0"
//              style="background-color: rgba(40,121,211)"
//            >
//          <span class="text-white float-end" style="font-size: 12px"
//            >.</span
//          >
//            </div>

//   </div>
//   </div>
//              `

//            }

       
//      $('#update_detail').html(ups)



 
//   $('#updatetrainees').on('click',function(){

//   var remarks = $("#remarks  option:selected").text();
//   console.log(remarks)
//   console.log(traineesId)
//   var fname = $('#fname').val();
//   var mname = $('#mname').val();
//   var lname = $('#lname').val();
//   var bdate = $('#bdate').val();
//   var age = $('#age').val();
//   var sex = $('#sex').val();
//   var civil = $('#civil').val();
//   var barangay = $('#barangay').val();
//   var city = $('#city').val();
//   var contact = $('#contact').val();
//   var occ = $('#occ').val();
//   var dep = $('#dep').val();





//   console.log(fname)



//   $.ajax({
//   url: "updatedtrainees.php",
//   method: "post",
//   data: {
//   traineesId:traineesId,
//   fname: fname,
//   mname: mname,
//   lname: lname,
//   bdate: bdate,
//   age: age,
//   sex:sex,
//   civil: civil,
//   barangay: barangay,
//   city: city,
//   contact: contact,
//   occ: occ,
//   dep: dep,
//   remarks:remarks,
//   },
//   success: function (updates) {
//   console.log(updates)
//   if(updates == 1){



//   $('.success').toast('show');
//   $('#updateModal').modal('hide');


//        // console.log($(this).attr('id'))

//   console.log(fname)

//   update.parent().siblings().eq(0).text(fname)
//   update.parent().siblings().eq(1).text(lname)
//   update.parent().siblings().eq(2).text(bdate)
//   update.parent().siblings().eq(3).text(contact)
//   update.parent().siblings().eq(4).text(remarks)



//   }
//   if(updates == 2){

//   console.log('wow')
//   }


//   }
//   })


//   })



 

//          }
//        })
//  })

}   



},
});
}
function pagination() {
    let count = 'count';
 $.ajax({
     url: 'sil_managementconnection.php',
     method: 'GET',
     data:{
        count:count,
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
       trainees(lastPage);

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
      
       trainees(lastPage);
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
       trainees(pagehigh+1);
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
       trainees(pagelow-5);
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
     trainees(page);
     $(this).addClass('active').siblings().removeClass('active');
 }
});
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
