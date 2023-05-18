<?php 
require('./database.php');
session_start();
$session_id = $_SESSION['id'];
$qualification = $_SESSION['choosecourse'];
$batch = $_SESSION['batch'];

function filterData(&$str){

  $str = preg_replace("/\t/", "\\t", $str);
  $str= preg_replace("/\r?\n/", "\\n", $str);

  if(strstr($str,' " ')) $str = ' " ' . str_replace(' "" ', ' "" ',$str). ' " ';

}




$filename = "CourseRegistration.xls";
$fields = array('LastName', 'FirstName', 'MiddleName', 'Age', 'Address', 'Highest Educational Attaintment','CP Number/s','Email Address', 'Messenger Account', 'Guardian' , 'Contact Number of Guardian');

// $excelData = implode("\t", array_values($fieldss))."\n";

$excelData = implode("\t", array_values($fields))."\n";
$query= $connection->query("SELECT * FROM attendance  WHERE import_trainer_id = '$session_id' AND import_qualification_id = '$qualification' AND  import_batch = '$batch' ORDER BY LastName ASC ");

if($query->num_rows > 0){
  while($row = $query -> fetch_assoc()){
    
    $lineData = array($row['LastName'],$row['FirstName'],$row['MiddleName'], $row['Age'], $row['Barangay']." ".$row['Municipality']. " ".$row['Permanent_Province'], $row['Higher_Educational_Attaintment'], $row['Contact_Number'], $row['Email_Address'], $row['MessengerAccount'], $row['Guardian'] , $row['ContactGuardian']);
    array_walk($lineData,'filterData');
    $excelData .= implode("\t", array_values($lineData)). "\n";
  }
}
else{
  $excelData .= 'No recors found...'. "\n";
}	


header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

echo $excelData;

exit;

?>
