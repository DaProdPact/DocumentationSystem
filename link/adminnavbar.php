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
  
    
    <div class="col-2 sidebar shadow bg-opacity-25 border-0 bg-image"
    style="background-image: url(../img/bg3.jpg);"
    id="seenav"
    
    >
    
    
    
      <div class="mt-3 p-2 radius d-flex" style="z-index: 1;">
      <img src="../img/tesdalogoo.png" width="45px" class="bg-white p-1 ms-2" style="height:5vh; border-radius: 50%;" />
      <header class="text-white myf-custome6-font h2 pt-1 ps-2">Tesda</header>
      
      </div>
      
      <hr class="border-3 text-white w-auto" />
    
      <div class="scrollbox">
        <div class="scrollbox-inner">
          <div class="accordion accordion-flush" id="accordionFlushExample">
    
    

    
            
          <div class="accordion-item bg-transparent border-0">
              <h2 class="accordion-header" id="flush-headingOne">
              <a href="admindashboard.php" class="text-decoration-none"><button
              class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
              >
              <i class="fas fas fa-industry"></i><span class="ms-2 mt-1">Dashboard</span>
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
        <i class="fas fa-chalkboard-teacher"></i><span class="ms-2 mt-1">Qualification</span>
        </button>
        </h2>
        <div
        id="flush-collapseThree"
        class="accordion-collapse collapse bg-transparent"
        aria-labelledby="flush-headingThree"
        data-mdb-parent="#accordionFlushExample"
        >
        <div class="accordion-body text-white ms-3"> 
        <a href="adminqualificationlist.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Manage Qualification</span>
        </a>
        <br>
        <a href="adminverificationrequest.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Verification</span>
        </a>
        <br>
        <!-- <a href="adminbatchlist.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Manage Batch</span>
        </a>
        <br> -->
        <!-- <a href="adminbatchverification.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Batch Verification</span>
        </a>
        <br> -->
        
        
        
        
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
        <i class="fas fa-user-cog"></i><span class="ms-2 mt-1"> Trainer</span>
        </button>
        </h2>
        <div
        id="flush-collapseFour"
        class="accordion-collapse collapse bg-transparent"
        aria-labelledby="flush-headingFour"
        data-mdb-parent="#accordionFlushExample"
        >
        <div class="accordion-body text-white ms-3"> 
        <a href="admintrainers.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Trainer Information</span>
        </a>
        <br>
        <!-- <a href="admintrainerlistqualification.php" class="icon-block text-white text-decoration-none">
        <i class="far fa-hand-point-right text-white mb-3"></i>
        <span>Trainer Qualification</span>
        </a>
        <br> -->
        </div>
        </div>
        </div>

        <?php 
            require_once ('../php/database.php');
            $addfeature = "SELECT * FROM add_features WHERE add_features_show = 1";
            $addfeaturesql = mysqli_query($connection,$addfeature);

            while($row = mysqli_fetch_array($addfeaturesql)){

            ?>
            <div class="accordion-item bg-transparent border-0">
              <h2 class="accordion-header" id="flush-headingOne">
              <a href="<?=$row['add_features_link']?>.php" class="text-decoration-none"><button
              class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
              >
              <i class="fas fa-folder-plus"></i>
              <span class="ms-2 mt-1"><?=$row['add_features_name']?></span>
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
            <h2 class="accordion-header" id="flush-headingcert">
            <button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-semibold text-white fs-6"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapsecert"
            aria-expanded="false"
            aria-controls="flush-collapsecert"
            >
            <i class="fas fa-trophy"></i><span class="ms-2 mt-1"> Achievement Certificate</span>
            </button>
            </h2>
            <div
            id="flush-collapsecert"
            class="accordion-collapse collapse bg-transparent"
            aria-labelledby="flush-headingcert"
            data-mdb-parent="#accordionFlushExample"
            >
            <div class="accordion-body text-white ms-3"> 
                <a href="admincertification.php" class="icon-block text-white text-decoration-none">
                    <i class="far fa-hand-point-right text-white mb-3"></i>
                    <span>Manage Certification</span>
                    </a>
                    <br>
            </div>
            </div>
            </div>

            <div class="accordion-item bg-transparent border-0">
              <h2 class="accordion-header" id="flush-headingOne">
              <a href="http://localhost/DocumentationSystem/admin/adminrecordbook.php" class="text-decoration-none"><button
              class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
              >
              <i class="fas fa-book-open-reader"></i><span class="ms-2 mt-1"> Trainer Record Book</span>
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
              <a href="http://localhost/DocumentationSystem/admin/admininstitutionalassessment.php" class="text-decoration-none"><button
              class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
              >
              <i class="fas fa-book pe-2 pb-1"></i><span class="ms-2 mt-1"> Institutional Assessment</span>
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
            <a href="http://localhost/DocumentationSystem/admin/admindeclarationform.php" class="text-decoration-none"><button
            class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#flush-collapseOne"
            aria-expanded="false"
            aria-controls="flush-collapseOne"
            >
            <i class="fab fa-wpforms pe-2 pb-1"></i><span class="ms-2 mt-1"> Declaration Form</span>
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
          <a href="adminborrowerslip.php" class="text-decoration-none"><button
          class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#flush-collapseOne"
          aria-expanded="false"
          aria-controls="flush-collapseOne"
          >
          <i class="fab fa-wpforms pe-2 pb-1"></i><span class="ms-2 mt-1"> Borrowers Slip</span>
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
        <a href="adminrtcclmissionvision.php" class="text-decoration-none"><button
        class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#flush-collapseOne"
        aria-expanded="false"
        aria-controls="flush-collapseOne"
        >
        <i class="fas fa-bullseye"></i>
        <span class="ms-2 mt-1"> Mission Vision</span>
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
                <a href="adminrtcclsignatory.php" class="text-decoration-none"><button
                class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseOne"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
                >
                <i class="fas fa-signature"></i><span class="ms-2 mt-1"> Signatory</span>
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
                <a href="adminhousekeeping.php" class="text-decoration-none"><button
                class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseOne"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
                >
                <i class="fas fa-home"></i><span class="ms-2 mt-1"> Housekeeping</span>
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
              <a href="adminaddfeatures.php" class="text-decoration-none"><button
              class="accordion-button bg-transparent collapsed myf-custome6-font fw-bold text-white"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#flush-collapseOne"
              aria-expanded="false"
              aria-controls="flush-collapseOne"
              >
              <i class="fas fa-folder-plus"></i>
              <span class="ms-2 mt-1">Add Features</span>
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
    
   
        
        </div>
    
    
    
    
    
    
    
    </div>
    
    
         
        </div>
    
        <div class="color-overlay" style="margin-left: -60px;">
    
        </div>
      </div>
    
    
    