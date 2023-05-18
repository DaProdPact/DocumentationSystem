<?php

require('./database.php');

$errorEmpty = false;
$errorEmail = false;

if(isset($_POST['fname_register']) || isset($_POST['mname_register']) || isset($_POST['lname_register']) || isset($_POST['exname_register']) || isset($_POST['email_register']) || isset($_POST['contact_number_register']) || isset($_POST['password_register'])||  isset($_POST['retype_password_register']) ){
     $fname_register = $_POST['fname_register'];
     $mname_register = $_POST['mname_register'];
     $lname_register = $_POST['lname_register'];
     $exname_register = $_POST['exname_register'];
     $email_register = $_POST['email_register'];
     $contact_number_register = $_POST['contact_number_register'];
     $password_register = $_POST['password_register'];
     $retype_password_register = $_POST['retype_password_register'];


  

     if(!empty($fname_register && !empty($mname_register) && !empty($lname_register) && !empty($email_register) && !empty($contact_number_register) && !empty($password_register) && !empty($retype_password_register) )){
        if(!filter_var($email_register,FILTER_VALIDATE_EMAIL)){
        echo 1;
        $errorEmail = true;
        }
        else{
            if($errorEmpty == false && $errorEmail == false){
                            
                $check = "SELECT * FROM `trainer_account` WHERE trainer_email_address = '$email_register'";
                $user_register = mysqli_query($connection,$check);
                if(mysqli_num_rows($user_register) == 1){
                    echo 2;
                }
                else{

                    $contactlen = strlen($contact_number_register);
                    if($contactlen != 11){
                    echo 3;

                   }
                   else{

                    if ($password_register != $retype_password_register){
                        echo 4;
                    }
                    else{
                        // if ($checksend != 1){
                        //     echo 5;

                        // }
                        // else{

                    $query = "INSERT INTO `trainer_account`(`trainer_firstname`, `trainer_middlename`, `trainer_lastname`, `trainer_extensionname`, `trainer_email_address`, `trainer_contact_number` , `trainer_password`,`trainer_profile`,`trainer_verification`) VALUES ('$fname_register','$mname_register','$lname_register','$exname_register','$email_register','$contact_number_register',md5('$password_register'),'default_profile.png','0')";          
                    if(mysqli_query($connection,$query)){
                    echo 7;
                    }
                    // }
                }
    
                }

                }


            
            }
            }

            
            

        }

        
     
     else{
        echo 0;




     }

}
else{
    echo 9;
}



    






?>

