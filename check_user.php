<?php
	include_once('./includes/connection.php');
 	include_once('./includes/utility.php');
 	$values = (array)json_decode($_POST['action']);
	$admission_number = $values["admission_number"];
	if(user_exists($admission_number)){
		session_start();
		$_SESSION["admission_number"]=$admission_number;
		include_once('student_details.php');
	}else{
		echo "User does not exists";
	}	
?>