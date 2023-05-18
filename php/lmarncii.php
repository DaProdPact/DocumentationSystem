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

$col1 = '1';
$col2 = '1';
$col3 = '1';







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
<div class="row mt-2">
<div class="col-10"> </div>
<div class="col-2 text-end text-muted">
    <p class="fw-bold" style="font-size:13px;">Annex-T</p>
    <p style="margin-top:-20px; font-size:13px;">Rev. 00 s. 2023</p>
</div>
</div>
<div class="row" style="margin-top:-22px;">
    <p class="text-center fw-bold">LEARNER'S ACHIEVMENT MONITORING REPORT</p>
</div>
<div class="row" style="padding:0rem 2.2rem; padding-left:2.8rem; margin-top:-15px;">
        
<table class="table border-dark table-bordered ms-1" id="table">
            <thead class="border-dark">
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Name of TVI: </th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">REGIONAL TRAINING CENTER CENTRAL LUZON-GUIGUINTO</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Program Title:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">DRIVING NC II</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Batch/Section:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">3</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Module Title:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">PARTICIPATE IN WORKPLACE COMMUNICATION</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="font-size:11px; width:5%; background-color:#cfe7ff;">Schedule:</th>
                <th class="p-0 ps-1" rowspan="1" colspan="1" style="width:40%; font-size:11px;">March 20-21, 20223</th>
            </tr>
            <tr class="border-dark" style="height: 14px; font-size:10px" >
                <th class="p-0 ps-1 text-center fw-bold" rowspan="1" colspan="2" style="font-size:11px; width:5%;">BASIC COMPETENCY</th>

            </tr>
                

            <table class="table border-dark table-bordered ms-1" style="margin-top: -16px;" id="table">
            <thead class="border-dark">
            <tr class="border-dark" style="height: 14px; font-size:10px; border-top:1px solid black;" >
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:10px; width:2%; background-color:#cfe7ff;">No.</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:10px; width:15%; background-color:#cfe7ff;">Name of Learners<br>(Last Name, First Name, Extension Name, Middle Name)</th>
                <?php 
                if($col1 == '1'){ ?>
                    <!-- <th class="p-0 text-center" rowspan="1" colspan="<?=$col1_1;?>" style="width:380px; font-size:9px;">First Name</th> -->
                    <th class="p-0 text-center" rowspan="1" colspan="3" style="width:12%; font-size:10px; background-color:#ffcfcf;">LO.1 Obtain and convey workplace information (1.hr.)</th>
                <?php }else{

                }?>
               
                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:12%; font-size:10px; background-color:#cfffe0;">LO.1 Obtain and convey workplace information (1.hr.)</th>

                <th class="p-0 text-center" rowspan="1" colspan="3" style="width:12%; font-size:10px; background-color:#ecfd9e;">LO.1 Obtain and convey workplace information (1.hr.)</th>
                <th class="p-0 text-center" rowspan="2" colspan="1" style="width:10%; font-size:10px; background-color:#cfe7ff;">Institutional Assessment</th>

              </tr>

              <tr class="border-dark" style="height: 9px; font-size:9px">
              <?php 
                if($col1 == '1'){ ?>
                    <!-- <th class="p-0 text-center" rowspan="1" colspan="<?=$col1_1;?>" style="width:380px; font-size:9px;">First Name</th> -->
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
                    <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>
                <?php }else{

                }?>

              <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
              <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
              <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>
              <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 1</th>
              <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 2</th>
              <th class="p-0 text-center" rowspan="2" colspan="1" style="font-size:9px;">Act 3</th>



              </tr>

            </thead>
            <tbody class="border-dark">

            <?php 
              $loops = 1;


              $printdetails_query = "SELECT * FROM attendance  WHERE import_trainer_id = '$session_id ' AND import_qualification_id = '$sessionqualification' AND  import_batch = '$session_batch'" ;
              $printdetails_sql = mysqli_query($connection,$printdetails_query);  

              while($traineesrow = mysqli_fetch_array($printdetails_sql)){

               $traineesfullname =  $traineesrow['FirstName']." ".$traineesrow['MiddleName'][0]." ".$traineesrow['LastName']." ".$traineesrow['Extension_Name']; ?>

                <tr class="border-dark" style="height: 10px; font-size:9px">

                <td class="p-0 text-center" rowspan="1" style="font-size:9px;"><?=$loops;?></td>
                <td class="p-0 ps-2 fw-bold" rowspan="1" style="font-size:10px;"><?=$traineesfullname;?></td>
                <?php 
                if($col1 == '1'){ ?>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <?php }else{

                }?>

                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                <td class="p-0 text-center" rowspan="1" style="font-size:9px;">/</td>
                



                <td class="p-0 text-center fw-bold" rowspan="1" colspan="1" style="width:120px; font-size:10px;">COMPETENT</td>


                </tr>

            <?php $loops++; } ?>

    




 
             

            </tbody>
        </table>


        
</div>

<div class="row ms-3" style="height: 73px; margin-top:-12px;">
<div class="col-9"> 
  <p class="p-0 fw-bold" style="font-size:10px;">This is to certify that all entries in the above learner's achievement monotoring report are true and correct</p>

  



</div>
<div class="col-3">
</div>
  

<div class="row mt-3">
    <div class="col-4">

    <p class="p-0 fw-bold ms-3" style="font-size: 11px; font-family:Arial; margin-top:-6px;">Prepared by:</p>
   
    <p class="p-0 ms-4 fw-bold" style="margin-top:-10px; font-family:Arial; font-size:11px">TRAINOR ARJHNE</p>
    <p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">Trainer eimncii</p>

  </div>

  <div class="col-4">

<p class="p-0 fw-bold ms-3" style="font-size: 11px; font-family:Arial; margin-top:-6px;">Prepared by:</p>

<p class="p-0 ms-4 fw-bold" style="margin-top:-10px; font-family:Arial; font-size:11px">TRAINOR ARJHNE</p>
<p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">Trainer eimncii</p>

</div>

<div class="col-4">

<p class="p-0 fw-bold ms-3" style="font-size: 11px; font-family:Arial; margin-top:-6px;">Prepared by:</p>

<p class="p-0 ms-4 fw-bold" style="margin-top:-10px; font-family:Arial; font-size:11px">TRAINOR ARJHNE</p>
<p class="p-0 ms-4 fw-bold" style="margin-top:-21px; font-family:Arial; font-size:11px">Trainer eimncii</p>

</div>


   
  </div>
  


</div>

</div>

<div class="row mt-5">
<div class="btn btn-primary">gold</div>
</div>















  <div class="row d-none" id="navbar" style="height:100vh;">
    <div class="col-2 pe-0">
    <?php 
    require('../link/navbar.php
    ');
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