<?php
	
	function get_branch($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM student_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetch();
		return $result['branch'];
	}

	//get personal info
	function get_personal_info($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM student_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result1 = $stmt->fetch();
	
		//second query from personalifo_table
		$stmt = $conn->prepare("SELECT * FROM personalinfo_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result2 = $stmt->fetch();

		$result = array_merge($result1,$result2);
		//var_dump($result);
		return $result;
	}

	function get_academic10th_info($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM academic10th_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetch();
	
		return $result;
	}

	function get_academic12th_info($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM academic12th_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetch();
	
		return $result;
	}

	function get_academicbtech_info($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM academicbtech_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetchAll();
		//var_dump($result);
		return $result;
	}

	function get_project_info($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT title,description FROM project_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetch();
		//var_dump($result);
		return $result;
	}

	function get_intern_info($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT organization,description FROM intern_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetch();
		//var_dump($result);
		return $result;
	}

	function get_current_openings($admission_number){
		global $conn;
		$current_date = date('Y-m-d H:i:s', time());
		//echo $current_date;
		$stmt = $conn->prepare("SELECT * FROM company_table WHERE opening_id NOT IN (SELECT opening_id FROM company_registration_table WHERE admission_number = ?) AND registration_deadline > ?");
		$stmt->execute([$admission_number,$current_date]); 
		$result = $stmt->fetchAll();
		// var_dump($result);
		return $result;
	}

	function get_registered_companies($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT DISTINCT c.company_name, c.company_profile, c.package FROM company_table as c INNER JOIN company_registration_table as r ON c.opening_id = r.opening_id WHERE c.opening_id IN (SELECT opening_id FROM company_registration_table WHERE admission_number = ?)");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetchAll();
		//var_dump($result);
		return $result;
	}

	function user_exists($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM login_table WHERE admission_number=?");
		$stmt->execute([$admission_number]); 
		$result = $stmt->fetch();
		//var_dump($result);
		return $result;
	}

	function is_personal_verified($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT personal_info_verified FROM student_table WHERE admission_number = ?");
		$stmt->execute([$admission_number]);
		$result = $stmt->fetch();
		//var_dump($result["verified"]);
		if($result["personal_info_verified"]=="NO"){
			return 0;
		}else{
			return 1;
		}
	}

	function is_academic_verified($admission_number){
		global $conn;
		$stmt = $conn->prepare("SELECT academic_info_verified FROM student_table WHERE admission_number = ?");
		$stmt->execute([$admission_number]);
		$result = $stmt->fetch();
		//var_dump($result["verified"]);
		if($result["academic_info_verified"]=="NO"){
			return 0;
		}else{
			return 1;
		}
	}
?>