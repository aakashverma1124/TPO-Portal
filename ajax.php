<?php
	$name = $_POST['action'];
	if($name == 'home')
	 include_once('home.php');
	else if($name == 'profile'){
		include_once('student_details.php');
	}else if($name == 'companies'){
		include_once('current_openings.php');
	}else if($name == 'registered_companies'){
		include_once('registered_companies.php');
	}else if($name == 'current_openings'){
		include_once('current_openings.php');
	}else if($name == 'contact'){	
		include_once('contact.php');
	}else if($name == 'view_profile'){
		include_once('view_profile.php');
	}else if($name == 'add_company'){
		include_once('add_company.php');
	}else if($name == 'admin_home'){
		include_once('admin_home.php');
	}else if($name == 'view_registered_students'){
		include_once('view_registered_students.php');
	}

?>
