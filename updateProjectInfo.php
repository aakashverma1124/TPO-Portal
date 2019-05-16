<?php
include_once('./includes/connection.php');
$values = (array)json_decode($_POST['action']);
// update student table
session_start();
$admission_number = $_SESSION['admission_number'];

$stmt = $conn->prepare("UPDATE project_table SET `title` = ?, `description` = ? WHERE admission_number=?");
$status1 = $stmt->execute([$values['title'], $values['projectDescription'], $admission_number]); 

// update personalinfo table
$stmt = $conn->prepare("UPDATE intern_table SET `organization` = ?, `description` = ? WHERE admission_number=?");
$status2 = $stmt->execute([$values['organization'], $values['internDescription'], $admission_number]); 

if($status1&&$status2){
	echo "Successfully Updated";
}else{
	"Error";
}

?>