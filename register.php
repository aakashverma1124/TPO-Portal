<?php
	include_once('./includes/connection.php');

	$opening_id = $_POST["opening_id"];
	session_start();
	$admission_number = $_SESSION["admission_number"];
	//echo $opening_id.''.$admission_number;
	$stmt = $conn->prepare("INSERT INTO company_registration_table (`opening_id`, `admission_number`) VALUES(?,?)");
	$status = $stmt->execute([$opening_id, $admission_number]); 
	if($status){
		echo "Registered Successfully";
	}else{
		"Error Occured";
	}
?>