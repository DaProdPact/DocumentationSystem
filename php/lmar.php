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

date_default_timezone_set('Asia/Manila'); 
  
$date1ss = new DateTime("now");
$day = date('j');
$month = date('F');
$year = date('Y');


$session_col = $_SESSION['col'];
$sessionelement_id = $_SESSION['elementid'];
$sessionelement_competencies = $_SESSION['competencies_name'];
$sessionelement_unit = $_SESSION['lmar_unit_name'];
$sessionelement_name = $_SESSION['elementname'];





$qualiquery = "SELECT * FROM trainer_qualification WHERE qualification_id = '$sessionqualification' ";
$qualisql = mysqli_query($connection,$qualiquery);  
while($qrow = mysqli_fetch_array($qualisql)){
  $_SESSION['qualiname'] = $qrow['qualification_title'];
  $_SESSION['qualicode'] = $qrow['qualification_code'];

}




// $declarationcount = 25;


require('../link/header.html');
?>

<link rel="stylesheet" href="../css/tipattendance.css">

    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
 

    <style>


      ::-webkit-scrollbar {
    display: none;
    }
    
    @page { 
        size: A4 landscape;
      
     }
     

     #navbar{
      position: absolute;
      top: 0;
      width: 100%;


      
    }


       
    @media print {
        body * {
          visibility: hidden;

        }
        #printlmar, #printlmar * {
          visibility: visible;



        }
        #lmarprintbtn, #lmarprintbtn * {
          visibility: hidden;



        }
        



      } 

    #btns{
      position: absolute;

      top: 0;
      right: 20px;
      margin-top: 2rem;
      width: 30rem;

      
    }

    tr{
        height: 9px;
    }



    </style>



    </head>
<body>

<div class="row" class="" id="printlmar" height="100vh">

<div class="" style="background-image: url('../img/LMAR_Templateorig.png'); background-repeat: no-repeat; background-size: 1260px 890px; height:900px; margin-right: 5rem;">

<div class="row" style="height: 137px; width:1250px;">
<div class="col-9"> </div>
<div class="col-3">
</div>


</div>

<div class="row ms-4" style="height: 73px; width:1250px;">
<div class="col-12"> 
  <p class="fw-bold mt-1 p-0" style="font-size:12px;">Name of TVI &nbsp&nbsp : &nbsp; RTCCL GUIGUINTO BULACAN</p>
  <p class="fw-bold" style="font-size:12px; margin-top:-20px;">Program Title &nbsp:  &nbsp;<?= $_SESSION['qualiname']; ?></p>
  <p class="fw-bold" style="font-size:12px; margin-top:-20px;">Batch / Section : 1</p>
  <p class="fw-bold" style="font-size:12px; margin-top:-20px;">Module Title &nbsp&nbsp: <?= $sessionelement_competencies?> - <?=$sessionelement_unit ?>&nbsp <?="(". $_SESSION['lmar_element_hours'].")"?></p>



</div>
<!-- <div class="col-3">
</div> -->


</div>


<?php 

 $trix = 1;
 $cols = $session_col;

 ?>

<div class="row" style="padding:0rem 2.5rem; height:530px;">
        
<table class="table mt-2 border-dark table-bordered ms-1" id="table">
            <thead class="border-dark">
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 text-center" rowspan="3" colspan="1" style="font-size:13px; width:3%;">#</th>
                <th class="p-0 text-center" rowspan="2" colspan="4" style="width:40%; font-size:13px;">Name of Learners</th>
                <th class="p-0 text-center fw-bold" rowspan="1" colspan="<?= $cols ?>" style="width:55%; font-size:13px;"><?= $sessionelement_name ?></th>
                <th class="p-0 text-center" rowspan="3" colspan="1" style="width:10%; font-size:13px;">Remarks</th>

              </tr>

              <tr class="border-dark" style="height: 13px; font-size:9px" >

           

              
             
<?php
$elemcol = "SELECT * FROM `lmar_performance_criteria` WHERE lmar_performance_element = '$sessionelement_id' LIMIT $cols";
$elemcolsql = mysqli_query($connection,$elemcol);  
while($erow = mysqli_fetch_array($elemcolsql)){ ?>
                  <th class="p-0 py-1 text-center" rowspan="1"  style="width:120px; font-size:9px;"> <?= $erow['lmar_performance_name'] ?> </th>

<?php } ?>
               
          


              </tr>
              <tr class="border-dark" style="height: 13px; font-size:9px" >
              <th class="p-0 text-center" rowspan="1" colspan="1" style="width:380px; font-size:9px;">Last Name</th>
                <th class="p-0 text-center" rowspan="1" colspan="1" style="width:380px; font-size:9px;">First Name</th>
                <th class="p-0 text-center" rowspan="1" colspan="1" style="width:380px; font-size:9px;">Middle Name</th>
                <th class="p-0 text-center" rowspan="1" colspan="1" style="width:380px; font-size:9px;">Extension Name</th>

              <?php 



              $i=0;
              while($i < $cols){ ?>
                     <th class="p-1 text-center" rowspan="1"  style="width:120px; font-size:11px;">task</th>
              <?php $i++;
            } ?>

              </tr>
      
      


              

              

                

            </thead>
            <tbody class="border-dark">
              <?php 
              $loops = 1;


              $printdetails_query = "SELECT * FROM attendance  WHERE import_trainer_id = '$session_id ' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch'" ;
              $printdetails_sql = mysqli_query($connection,$printdetails_query);  
              
             
              
  
              while($traineesrow = mysqli_fetch_array($printdetails_sql)){
         ?>
            <tr class="border-dark" style="height: 13px; font-size:10px">
                <td class="p-0 text-center sheesh" rowspan="1" colspan="1" style="font-size:10px; width:50px;"><?php echo $loops; ?></td>
                <td class="p-0 text-center" rowspan="1" style="width:10%; font-size:10px;"><?php echo $traineesrow['LastName']; ?></td>
                <td class="p-0 text-center" rowspan="1" style="width:10%; font-size:10px;"><?php echo $traineesrow['FirstName']; ?></td>
                <td class="p-0 text-center" rowspan="1" style="width:10%; font-size:10px;"><?php echo $traineesrow['MiddleName']; ?></td>
                <td class="p-0 text-center" rowspan="1" style="width:2%; font-size:10px;"><?php echo $traineesrow['Extension_Name']; ?></td>
                <?php 
                $j=0;
                while($j < $cols){ ?>
                        <td class="p-0 text-center" rowspan="1" style="width:120px; font-size:10px;">/</td>
                <?php 
                $j++;
              } ?>
     
                <td class="p-0 text-center" rowspan="1" colspan="1" style="width:120px; font-size:10px;">COMPETENT</td>

              </tr>
              <?php 
            $loops++;
            } ?>
             

            </tbody>
        </table>


        
</div>

<div class="row ms-4 mt-2" style="height: 73px; width:1250px;">
<div class="col-9"> 
  <p class="p-0 fw-bold" style="font-size:10px;">This is to certify that all entries in the above learner's achievement monotoring report are true and correct</p>

  



</div>
<div class="col-3">
</div>

<div class="row mt-4">
    <div class="col-4 ms-5">
    <?php 
                  $session_query = "SELECT * FROM trainer_account WHERE trainer_id = '$session_id' ";
                  $session_sql = mysqli_query($connection,$session_query);   
                  while($row = mysqli_fetch_array($session_sql)){

                    $session_name = $row['trainer_firstname'] ." ". $row['trainer_middlename'] ." ". $row['trainer_lastname'] ." ". $row['trainer_extensionname'] ;
                  ?>
               

       
                    <p class="p-0 fw-bold ms-3" style="font-size: 13px; font-family:Arial; margin-top:-6px;"><?= $session_name; ?></p>
                    <?php  } ?>

   
    <p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">TRAINOR <?= $_SESSION['qualicode']; ?></p>
  </div>
   
  </div>

  

</div>


</div>





</div>



<div class="row gap-0" id="btns">
      <div class="col-6">     
        <div class="input-group">
              <div class="form-outline">
                <input type="search" id="colvalue" name="searching" class="form-control" />
                <label class="form-label" for="form1">Column Count</label>
              </div>
              <button type="button" name="searchenter" class="btn btn-primary" id="colbtn">
              <i class="fas fa-border-all"></i>

              </button>
            </div> 
         </div>
                    <div class="col-4 d-flex justify-content-center px-4">  
                      <button class="btn text-white" style="background-color: #334a8bd0;" id="lmarprintbtn"><i class="fa fa-print" aria-hidden="true"></i> &nbsp&nbspPrint &nbsp&nbsp</button></div>
                    <div class="col-2">
                       <button class="btn text-white" style="background-color: #334a8bd0;" id="lmarnavbtn"><i class="fas fa-bars" aria-hidden="true"></i> </button></div>
  


    </div>





  <div class="row d-none" id="navbar" style="height:100vh;">
    <div class="col-2 pe-0">
    <?php 
    require('../link/navbar.php');
  ?>
</div>
 

   
    













          </div>
        </div>





        </div>

      </div>

    </div>

    



    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
    <div class="modal-content" id="update_detail">
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

        
      <div class="mb-2 position-absolute position-fixed end-0 bottom-0 me-1">
        <div class="toast success">
          <div class="toast-header bg-primary bg-opacity-75">
          <strong class="me-auto text-primary text-primary-75"><i class="fas fa-key"></i>Update Details</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body bg-primary bg-opacity-50">
          <p class="text-white">Update Successfully</p>
        </div>
      </div>
    </div>






<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    <script src="../javascript/lmar.js"></script>
    <script>
    
    </script>


    <script>
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
      new mdb.Input(formOutline).init();
    });


    // var table = document.getElementById('table');
    // var cells = table.getElementsByTagName('td');
    // var thcelss = table.getElementsByTagName('th');
    // var sheesh = table.getElementsByTagClass('sheesh');

    

    // console.log(cells)

    // for (var i = 0; i < cells.length; i++){
    //   cells[i].onclick = function () {
    //     console.log('click')
    //     var input = document.createElement('input');
    //     input.setAttribute('type', 'text');
    //     input.value = this.innerHTML;
    //     // input.style.width = this.offsetWidth - (this.clientLeft * 2) +  "px";
    //     // input.style.height = this.offsetHeight - (this.clientTop * 2) +  "px";
    //     input.style.border = "0px";
    //     input.style.fontFamily = "inherit";
    //     input.style.fontSize = "inherit";
    //     input.style.textAlign = "inherit";
    //     // input.style.backgroundColor = "LightGoldenRodYellow";


    //     this.innerHTML = '';
    //     this.style.cssText = 'padding:0px 0px';
    //     this.append(input);
    //     this.firstElementChild.select();


        
    //   }
    // }
    // for (var i = 0; i < thcelss.length; i++){
    //   thcelss[i].onclick = function () {
    //     console.log('click')
    //     var input = document.createElement('input');
    //     input.setAttribute('type', 'text');
    //     input.value = this.innerHTML;
    //     // input.style.width = this.offsetWidth  - (this.clientLeft * 1) +  "px";
    //     // input.style.height = this.offsetHeight - (this.clientTop * 1) +  "px";
    //     input.style.border = "0px";
    //     input.style.fontFamily = "inherit";
    //     input.style.fontSize = "inherit";
    //     input.style.textAlign = "left";
    //     // input.style.backgroundColor = "LightGoldenRodYellow";
    //     input.style.width = '100px';

    //     this.innerHTML = '';
    //     this.style.cssText = 'padding:0px 0px';
    //     this.append(input);
    //     this.firstElementChild.select();


        
    //   }
    // }

    // for (var i = 0; i < sheesh.length; i++){
    //   sheesh[i].onclick = function () {
    //     console.log('click')
    //     var input = document.createElement('input');
    //     input.setAttribute('type', 'text');
    //     input.value = this.innerHTML;
    //     // input.style.width = this.offsetWidth  - (this.clientLeft * 1) +  "px";
    //     // input.style.height = this.offsetHeight - (this.clientTop * 1) +  "px";
    //     input.style.border = "0px";
    //     input.style.fontFamily = "inherit";
    //     input.style.fontSize = "inherit";
    //     input.style.textAlign = "left";
    //     // input.style.backgroundColor = "LightGoldenRodYellow";
    //     input.style.width = '100px';

    //     this.innerHTML = '';
    //     this.style.cssText = 'padding:0px 0px';
    //     this.append(input);
    //     this.firstElementChild.select();


        
    //   }
    // }
    




    console.log('sheesh')
    </script>

    
    </body>
</html>