<?php 
require('../php/database.php');

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
    require('../link/adminnavbar.php');
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
               <?php
               $features1 = "SELECT * FROM `add_features` WHERE add_features_id = '7'";
               $features1sql = mysqli_query($connection,$features1);
               while($frow = mysqli_fetch_array($features1sql)){
               ?>

                <p
                  class="myf-custome6-font text-primary h4 pt-1"
                  
                  ><?=$frow['add_features_name']?></p
                >
                <?php } ?>
                <div class="d-flex w-auto gap-3">
        
  
                  <button class="btn text-white" style="background-color: #334a8bd0;" id="addshopbtn"><i class="fas fa-cloud-download-alt"></i> &nbsp&nbsp INSERT New File</button>

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
                <th class="text-white">Qualification</th>
                <th class="text-white">Download</th>
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
                  Insert/Update New File
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
                <form method="post" action="featues7connection.php" enctype="multipart/form-data">
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
            $qcode = $verow['qualification_title'];
            

            echo"<option name='selected' id="."$qid"." value="."$qid".">$qcode<br></option>";

          

        }

      
        ?>
             
      </select>

</div>
</div>


                  <div class="col-12">

                  <span class="ms-2 text-primary fw-bold me-3">Insert File</span>
                    <input type="file" name="uploadfile" />
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
                  Insert File
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







$('#dropdown_logout').on('click',function(){
  $('#logoutModal').modal('show');
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
$.ajax({ 
url: "featues7connection.php?page=" + page,
method: "GET",
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
       <td style="width:90%;">${user.afseven_qname}</td>


       <td class="text-center"><a href="../pdf/${user.afseven_fname}" download><i class="fas fa-cloud-arrow-down text-primary p-0" style="font-size:20px;"></i><span class="m-1 text-primary" style="font-size:20px;"></span></a></td>
   </tr>`;
 }
 $("#table_body").html(rows);






}   



},
});
}
function pagination() {
 $.ajax({
     url: 'adminqualificationlistcount.php',
     method: 'GET',
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
  window.location.href ='http://localhost/DocumentationSystem/index.php'
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
