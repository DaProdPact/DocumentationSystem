<style>

::-webkit-scrollbar {
    display: none;
    }
    .sidebar ::-webkit-scrollbar {
    width: 2px;
    height: 3px;

    }

    *{
      margin: 0;
      padding: 0;
    }
    body{
      min-height: 100vh;
    }
    .sidebar{
      position: relative;
      position: fixed;
      top: 0;
      left: 0;
      width: 274px;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .scrollbox{
      overflow: auto;
      z-index: 1;
      width: 280px;
      margin-left: -7px;
      margin-top: -20px;

    }


    .scrollbox-inner{
      font-size: 18px;
      color:#fff;
    }
      .color-overlay{
        width: 350px;
        height: 100%;
        background-color: #334a8bd0;
        position: absolute;
      }

      span:hover{
        color: black;
      }
</style>
<?php 


require_once ('../php/database.php');
$session_id = $_SESSION['id'];
$qualification = $_SESSION['choosecourse'];
$batch = $_SESSION['batch'];
 ?>

<div class="col-2 sidebar shadow bg-opacity-25 border-0 bg-image"
style="background-image: url(../img/bg3.jpg);"
id="seenav"

>



  <div class="mt-3 p-2 radius d-flex" style="z-index: 1;">
  <img src="../img/tesdalogoo.png" width="45px" class="bg-white p-1 ms-2" style="height:5vh; border-radius: 50%;" />
  <header class="text-white myf-custome6-font h2 pt-1 ps-2">TESDA</header>
  
  </div>
  
  <hr class="border-3 text-white w-auto" />

  <div class="scrollbox">
    <div class="scrollbox-inner">
      <div class="accordion accordion-flush" id="accordionFlushExample">


        <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingqualification">
            <button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapsequali"
            aria-expanded="false"
            aria-controls="flush-collapsequali"
            >
            <i class="fas fa-chalkboard-teacher"></i><span class="ms-2 mt-1">Qualification</span>
    
            </button>
            </h2>
            
            <div
            id="flush-collapsequali"
            class="accordion-collapse collapse bg-transparent"
            aria-labelledby="flush-collapsequali"
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
            <i class="fas fa-users"></i><span class="ms-2 mt-1">Batch</span>
            </button>
            </h2>
            
            <div
            id="flush-collapsebatch"
            class="accordion-collapse collapse bg-transparent"
            aria-labelledby="flush-collapsebatch"
            data-mdb-parent="#accordionFlushExample"
            >
            <div class="accordion-body text-white ms-3"> 
            <a href="choosebatch.php" class="icon-block text-white text-decoration-none">
            <i class="far fa-hand-point-right text-white mb-3"></i>
            <span>Choose Batch</span>
            </a>
            <br>
            <a href="addbatch.php" class="icon-block text-white text-decoration-none">
            <i class="far fa-hand-point-right text-white mb-3"></i>
            <span>Add Batch</span>
            </a>
            <br>
            </div>
            
            </div>
            
            
            </div>


        
      <div class="accordion-item bg-transparent border-0">
          <h2 class="accordion-header" id="flush-headingOne">
          <a href="trainees.php" class="text-decoration-none"><button
          class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#flush-collapseOne"
          aria-expanded="false"
          aria-controls="flush-collapseOne"
          >
          <i class="fas fa-address-book pe-2 pb-1"></i><span class="ms-2 mt-1">Trainees</span>
          </button>
          </a>
         
          </h2>
          <div
          id="flush-collapseOne"
          class="accordion-collapse collapse"
          aria-labelledby="flush-headingOne"
          data-mdb-parent="#accordionFlushExample"
          >
          
          </div>
      </div>

      <div class="accordion-item bg-transparent border-0">
          <h2 class="accordion-header" id="flush-headingOne">
          <a href="courseregistration.php" class="text-decoration-none"><button
          class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#flush-collapseOne"
          aria-expanded="false"
          aria-controls="flush-collapseOne"
          >
          <i class="fas fa-receipt"></i><span class="ms-2 mt-1"> Course Registration</span>
          </button>
          </a>
         
          </h2>
          <div
          id="flush-collapseOne"
          class="accordion-collapse collapse"
          aria-labelledby="flush-headingOne"
          data-mdb-parent="#accordionFlushExample"
          >
          
          </div>
      </div>



    <div class="accordion-item bg-transparent border-0">
    <h2 class="accordion-header" id="flush-headingThree">
    <button
    class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
    type="button"
    data-mdb-toggle="collapse"
    data-mdb-target="#flush-collapseThree"
    aria-expanded="false"
    aria-controls="flush-collapseThree"
    >
    <i class="far fa-calendar-check pe-2 pb-1"></i> <span class="ms-2 mt-1">Attendance</span>
    </button>
    </h2>
    <div
    id="flush-collapseThree"
    class="accordion-collapse collapse bg-transparent"
    aria-labelledby="flush-headingThree"
    data-mdb-parent="#accordionFlushExample"
    >
    <div class="accordion-body text-white ms-3"> 
    <a href="tipattendance.php" class="icon-block text-white text-decoration-none">
    <i class="far fa-hand-point-right text-white mb-3"></i>
    <span>Tip Attendance</span>
    </a>
    <br>
    <a href="attendance.php" class="icon-block text-white text-decoration-none">
    <i class="far fa-hand-point-right text-white mb-3"></i>
    <span>Attendance</span>
    </a>
    <br>
    
    
    
    
    </div>
    
    </div>
    </div>
    
    <div class="accordion-item bg-transparent border-0">
    <h2 class="accordion-header" id="flush-headingFour">
    <button
    class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
    type="button"
    data-mdb-toggle="collapse"
    data-mdb-target="#flush-collapseFour"
    aria-expanded="false"
    aria-controls="flush-collapseFour"
    >
    <i class="fab fa-wpforms pe-2 pb-1"></i> <span class="ms-2 mt-1">Declaration Form</span>
    </button>
    </h2>
    <div
    id="flush-collapseFour"
    class="accordion-collapse collapse bg-transparent"
    aria-labelledby="flush-headingFour"
    data-mdb-parent="#accordionFlushExample"
    >
    <div class="accordion-body text-white ms-3"> 
    <a href="annex_o.php" class="icon-block text-white text-decoration-none">
      <i class="far fa-hand-point-right text-white mb-3"></i>
      <span>Annex O.</span>
      </a>
      <br>
    </div>
    </div>
    </div>
    <div class="accordion-item bg-transparent border-0">
        <h2 class="accordion-header" id="flush-headingOne">
        <a href="printcertification.php" class="text-decoration-none"><button
        class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#flush-collapseOne"
        aria-expanded="false"
        aria-controls="flush-collapseOne"
        >
        <i class="fas fa-trophy pe-2 pb-1"></i><span class="ms-2 mt-1">Certification</span>
        </button>
        </a>
        </h2>
        <div
        id="flush-collapseOne"
        class="accordion-collapse collapse"
        aria-labelledby="flush-headingOne"
        data-mdb-parent="#accordionFlushExample"
        >
        
        </div>
        </div>
        <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingOne">
            <a href="chooselmar.php" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fas fa-desktop pe-2 pb-1"></i><span class="ms-2 mt-1">LAMR</span>
            </button>
            </a>
            </h2>
            <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
            >
            
            </div>
        </div>
     
        
        <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingOne">
            <a href="institutionalassessment.php" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fas fa-book-open pe-2 pb-1"></i><span class="ms-2 mt-1">Institutional Assessment</span>
            </button>
            </a>
            </h2>
            <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
            >
            
            </div>
        </div>
    
        <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingOne">
            <a href="traineesrecordbook.php" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fas fa-book pe-2 pb-1"></i><span class="ms-2 mt-1">Record Book</span>
            </button>
            </a>
           
            </h2>
            <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
            >
            
            </div>
        </div>




      <div class="accordion-item bg-transparent border-0">
        <h2 class="accordion-header" id="flush-headingThree">
        <button
        class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#flush-collapsePC"
        aria-expanded="false"
        aria-controls="flush-collapsePC"
        >
        <i class="fas fa-chart-area pe-2 pb-1"></i> <span class="ms-2 mt-1">Progress Chart</span>
        </button>
        </h2>
        <div
        id="flush-collapsePC"
        class="accordion-collapse collapse bg-transparent"
        aria-labelledby="flush-headingThree"
        data-mdb-parent="#accordionFlushExample"
        >

                        <div class="accordion-body text-white ms-3"> 
                        <a href="basic_eimncii_progresschart.php" class="icon-block text-white text-decoration-none">
                        <i class="far fa-hand-point-right text-white mb-3"></i>
                        <span>Basic Components</span>
                        </a>
                        <br>
                        <a href="common_eimncii_progresschart.php" class="icon-block text-white text-decoration-none">
                        <i class="far fa-hand-point-right text-white mb-3"></i>
                        <span>Common Components</span>
                        </a>
                        <br>
                        <a href="core_eimncii_progresschart.php" class="icon-block text-white text-decoration-none">
                          <i class="far fa-hand-point-right text-white mb-3"></i>
                          <span>Core Components</span>
                          </a>
                          <br>

                          <a href="progresschart_eimncii_print.php" class="icon-block text-white text-decoration-none">
                          <i class="far fa-hand-point-right text-white mb-3"></i>
                          <span>Progress Chart Print</span>
                          </a>
                          <br>
            
                        </div>
            
                 

        
        </div>
        </div>

        <div class="accordion-item bg-transparent border-0">
        <h2 class="accordion-header" id="flush-headingSIL">
        <button
        class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#flush-collapseSIL"
        aria-expanded="false"
        aria-controls="flush-collapseSIL"
        >
        <i class="fas fa-certificate pe-2 pb-1"></i> <span class="ms-2 mt-1">Superviser Industry Learning</span>
        </button>
        </h2>
        <div
        id="flush-collapseSIL"
        class="accordion-collapse collapse bg-transparent"
        aria-labelledby="flush-headingSIL"
        data-mdb-parent="#accordionFlushExample"
        >
        <div class="accordion-body text-white ms-3"> 
        <a href="sil_certification.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Print Sil Certificate</span>
        </a>
        <br>
        <a href="manage_sil.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Manage SIL</span>
        </a>
        <br>

          <br>
        </div>
        </div>
        </div>
        
        <!-- <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingOne">
            <a href="sil_certification.php" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fas fa-certificate"></i><span class="ms-2 mt-1">Supervised Industry Learning</span>
            </button>
            </a>
           
            </h2>
            <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
            >
            
            </div>
        </div> -->


        <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingOne">

            <?php 

            $house = "SELECT * FROM house_keeping WHERE hk_qualification = '$qualification' ";
            $housesql = mysqli_query($connection,$house);

            while($hrow = mysqli_fetch_array($housesql)){ ?>

            <a href="http://localhost/DocumentationSystem/pdf/<?=$hrow['hk_fname'] ?>" target="_blank" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fas fa-broom"></i><span class="ms-2 mt-1">House Keeping</span>
            </button>
            </a>

            <?php } ?>
            
           
            </h2>
            <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
            >
            
            </div>
        </div>


        <div class="accordion-item bg-transparent border-0">
            <h2 class="accordion-header" id="flush-headingOne">
            <?php 

           $borrow = "SELECT * FROM borrower_slip WHERE bs_qualification = '$qualification' ";
           $borrowsql = mysqli_query($connection,$borrow);

           while($row = mysqli_fetch_array($borrowsql)){ ?>

            <a href="http://localhost/DocumentationSystem/pdf/<?=$row['bs_fname'] ?>" target="_blank" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fas fa-broom"></i><span class="ms-2 mt-1">Borrowers Slip</span>
            </button>
            </a>

           <?php } ?>
           
            </h2>
            <div
            id="flush-collapseOne"
            class="accordion-collapse collapse"
            aria-labelledby="flush-headingOne"
            data-mdb-parent="#accordionFlushExample"
            >
            
            </div>
        </div>

        <?php 

            $addfeature = "SELECT * FROM add_features WHERE add_features_show = 1";
            $addfeaturesql = mysqli_query($connection,$addfeature);

            while($row = mysqli_fetch_array($addfeaturesql)){

            ?>
            <div class="accordion-item bg-transparent border-0">
              <h2 class="accordion-header" id="flush-headingOne">
              <a href="<?=$row['trainer_features_link']?>.php" class="text-decoration-none"><button
              class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
              >
              <i class="fas fa-folder-plus"></i>
              <span class="ms-2 mt-1"> <?=$row['add_features_name']?></span>
              </button>
              </a>
             
              </h2>
              <div
              id="flush-collapseOne"
              class="accordion-collapse collapse"
              aria-labelledby="flush-headingOne"
              data-mdb-parent="#accordionFlushExample"
              >
              
              </div>
          </div>
          <?php 

        
        } ?>



    <div class="accordion-item bg-transparent border-0">
    <h2 class="accordion-header" id="flush-headingFive">
    <button
    class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
    type="button"
    data-mdb-toggle="collapse"
    data-mdb-target="#flush-collapseFive"
    aria-expanded="false"
    aria-controls="flush-collapseFive"
    >
    <i class="fas fa-user-cog"></i><span class="ms-2 mt-1">Profile</span>
    </button>
    </h2>
    <div
    id="flush-collapseFive"
    class="accordion-collapse collapse bg-transparent"
    aria-labelledby="flush-headingFive"
    data-mdb-parent="#accordionFlushExample"
    >
    <div class="accordion-body text-white ms-3">
    
    <a href="trainersprofile.php" class="icon-block text-white text-decoration-none">
    <i class="far fa-hand-point-right text-white mb-3"></i>
    <span>Account Settings</span>
    </a>
    <br>
    
    
    
    
    
    
    
    </div>
    </div>
    </div>
    
    
    </div>







</div>


     
    </div>

    <div class="color-overlay" style="margin-left: -60px;">

    </div>
  </div>


