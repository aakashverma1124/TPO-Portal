<?php
include_once('./includes/connection.php');
include_once('./includes/utility.php');
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$admission_number = $_SESSION["admission_number"];
if(!is_personal_verified($admission_number)){
	$stmt = $conn->prepare("UPDATE student_table SET `personal_info_verified` = ? WHERE admission_number=?");
	$status = $stmt->execute(["YES", $admission_number]);
	if($status){
		echo "Verified";
	}else{
		echo "Error";
	}
}else{
	echo "Already Verified";
}

?>