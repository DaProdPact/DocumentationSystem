<?php 
require('./database.php');
require('../link/header.html');
?>
    <link rel="stylesheet" href="../css/tipattendance.css">
    <link rel="icon" href="../img/tesdalogo.png" type="image/x-icon">
    <style>

 

        @media print {
        body *:not(#attendanceprint):not(#attendanceprint *) {
          visibility: hidden;
        }
        #attendanceprint{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
        }
      }
      @media print {
        body *:not(#attendancedetails):not(#attendancedetails *) {
          visibility: hidden;
        }
        #attendancedetails{
          
          position: absolute;
          top: 0;
          right: 0;
          width: 100%;
        }
      }



      ::-webkit-scrollbar {
    display: none;
    }
    
    
    
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    input[type="number"] {
      -moz-appearance: textfield;
    }
    
    tr{
        height: 10px;
    }

    </style>



    </head>
<body class="bg-secondary bg-opacity-50">

<!-- <div class="btn btn-primary" id="print">Print</div> -->
      <div class="row pt-1 bg-white mt-1" id="attendanceprint">

          <?php
          $loop = 0;

          while($loop < 1){
            require('./attendanceform.php');
            $loop++;
            
          }
          ?>
    </div>


    </body>
</html>