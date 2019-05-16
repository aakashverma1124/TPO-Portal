<?php
	include_once('./includes/connection.php');
	$values = (array)json_decode($_POST['action']);
				$stmt = $conn->prepare("INSERT INTO company_table (company_name,company_profile,branches_allowed,package,registration_deadline) VALUES (?,?,?,?,?)");
				$status = $stmt->execute([$values['company_name'], $values['company_profile'], $values['branches_allowed'],$values['package'], $values['registration_deadline']]);
	if($status)			
		echo "Company Added";
	else{
		echo "Adding Company Failed";
	}				
?>