
<?php 

require ('./database.php');
session_start();


// if(isset($_POST['try'])){
//     $_SESSION['percounts2'] = 3;
// }

$sessionelement_id = $_POST['id'];

    $select = "SELECT * FROM `lmar_unit_competencies` LEFT JOIN lmar_competencies ON lmar_unit_competencies.lmar_unit_comp = lmar_competencies.competencies_id  
    LEFT JOIN trainer_qualification ON lmar_unit_competencies.lmar_unit_qualification = trainer_qualification.qualification_id WHERE lmar_unit_id = '$sessionelement_id' "; 
    $sql = mysqli_query($connection,$select);
    while($elementrow = mysqli_fetch_array($sql)){
        $sessionelement_name = $elementrow['lmar_element_name'];
        $sessionelement_hours = $elementrow['lmar_element_hours'];
        $sessionelement_competencies_name = $elementrow['competencies_name'];
        $sessionelement_unit = $elementrow['lmar_unit_name'];


        $_SESSION['elementname'] =  $sessionelement_name;
        $_SESSION['competencies_name'] =  $sessionelement_competencies_name;
        $_SESSION['lmar_unit_name'] =  $sessionelement_unit;
        $_SESSION['lmar_element_hours'] = $sessionelement_hours;


   
    }

    $cols = 1;
    $query = "SELECT * FROM `lmar_element` WHERE lmar_element_unit='$sessionelement_id' ";
    $sql = mysqli_query($connection,$query);
    while($qrow = mysqli_fetch_array($sql)){
        $_SESSION['percounts'."".$cols] = $qrow['lmar_element_percount']; 
        $cols++;
    }


   
    $_SESSION['elementid'] =  $sessionelement_id;






    echo   $_SESSION['elementname'];
    
    








?>