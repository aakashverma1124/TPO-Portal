<?php
include_once('./includes/connection.php');
$values = (array)json_decode($_POST['action']);
// update student table
session_start();
$admission_number = $_SESSION['admission_number'];

$stmt = $conn->prepare("UPDATE academic10th_table SET `school_name` = ?, `board` = ?,  `year` = ?,  `percentage` = ? WHERE admission_number=?");
$status1 = $stmt->execute([$values['10th_school_name'], $values['10th_board'], $values['10th_year'], $values['10th_percentage'], $admission_number]); 

// update personalinfo table

$stmt = $conn->prepare("UPDATE academic12th_table SET `school_name` = ?, `board` = ?,  `year` = ?,  `percentage` = ? WHERE admission_number=?");
$status2 = $stmt->execute([$values['12th_school_name'], $values['12th_board'], $values['12th_year'], $values['12th_percentage'], $admission_number]); 


for($i=1;$i<=8;$i++){
	// $names = array("semester","sgpa","percentage");
	$stmt = $conn->prepare("UPDATE academicbtech_table SET  `sgpa` = ?,  `percentage` = ? WHERE admission_number=? AND semester = ?");
	$status3 = $stmt->execute([$values["sgpa".$i], $values["percentage".$i], $admission_number, $values["semester".$i]]); 
}

if($status1&&$status2&&$status3){
	echo "Successfully Updated";
}else{
	"Error";
}

?>