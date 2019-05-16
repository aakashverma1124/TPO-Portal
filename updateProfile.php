<?php
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
	// update student table
	$stmt = $conn->prepare("UPDATE student_table SET `name` = ?, `course` = ?, `email` = ?, `branch` = ? WHERE admission_number=?");
	$status1 = $stmt->execute([$values['name'], $values['course'], $values['email'], $values['branch'], $values['admission_number']]); 
	
	// update personalinfo table
	$stmt = $conn->prepare("UPDATE personalinfo_table SET `dob` = ?, `linkedin` = ?, `gender` = ?, `category` = ?, `pwd` = ?, `residential_status` = ?, `guardian` = ?, `present_address` = ?, `permanent_address` = ?, `marital_status` = ?, `state` = ?, `country` = ? WHERE admission_number=?");
	$status2 = $stmt->execute([$values['dob'], $values['linkedin'], $values['gender'], $values['category'], $values['pwd'], $values['residential_status'], $values['guardian'], $values['present_address'], $values['permanent_address'], $values['marital_status'], $values['state'], $values['country'], $values['admission_number']]); 

	if($status1 && $status2){
		echo "Successfully Updated";
	}else{
		echo "Error occured";
	}
	
?>