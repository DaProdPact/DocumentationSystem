<?php

require('../php/database.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['basic'])) {

        $basiccomp = $_POST['basiccomp'];
        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['basiccomp'] = $basiccomp;
        $_SESSION['qualificationver'] = $qualificationver;
        echo 1;
        
    }
    if(isset($_POST['common'])) {

        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['qualificationver'] = $qualificationver;
        $_SESSION['competencies'] = 2;

        echo 1;
        
    }

    if(isset($_POST['core'])) {

        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['qualificationver'] = $qualificationver;
        $_SESSION['competencies'] = 3;

        echo 1;
        
    }


    if(isset($_POST['mission'])) {

        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['qualificationver'] = $qualificationver;
        $_SESSION['mvoj'] = 1;

        echo 1;
        
    }
    
    if(isset($_POST['vision'])) {

        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['qualificationver'] = $qualificationver;
        $_SESSION['mvoj'] = 2;

        echo 1;
        
    }
    
    if(isset($_POST['obj'])) {

        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['qualificationver'] = $qualificationver;
        $_SESSION['mvoj'] = 3;

        echo 1;
        
    }

    if(isset($_POST['goal'])) {

        $qualificationver = $_POST['qualificationver'];

        session_start();
        $_SESSION['qualificationver'] = $qualificationver;
        $_SESSION['mvoj'] = 4;

        echo 1;
        
    }

    

}
