<?php
	include_once('./../connection.php');

	//truncate all tables

	function truncate_all_tables(){
		global $conn;
		$tables = array("login_table","student_table","personalinfo_table","academic10th_table","academic12th_table","academicbtech_table","project_table","intern_table","photoresume_table","company_table","company_registration_table");
		foreach($tables as $table){
			$stmt = $conn->prepare("DELETE FROM $table");
        	$status = $stmt->execute();
        	if($status){
        		echo "Table ".$table." deleted\n";
        	}
		}
	}


	function get_all_students(){
		global $conn;
		$stmt = $conn->prepare("SELECT * FROM student_table WHERE 1");
		$stmt->execute([]); 
		$result = $stmt->fetchAll();
		var_dump($result);
		return $result;
	}

	

	function create_table_entries($result){
		global $conn; 
		foreach($result as $res){

			//login table
			$stmt = $conn->prepare("INSERT INTO login_table (admission_number, password, user_type) VALUES (?,?,?)");
			$status = $stmt->execute([$res["admission_number"], $res["admission_number"], "user"]);
			if($status){
				echo "Login table entry done";
			}else{
				echo "login table entry failed";
			}


			$stmt = $conn->prepare("INSERT INTO academic10th_table (admission_number) VALUES (?)");
			$status = $stmt->execute([$res["admission_number"]]);
			if($status){
				echo "Academic 10th table entry done";
			}else{
				echo "Academic 10th table entry failed";
			}

			$stmt = $conn->prepare("INSERT INTO academic12th_table (admission_number) VALUES (?)");
			$status = $stmt->execute([$res["admission_number"]]);
			if($status){
				echo "Academic 12th table entry done";
			}else{
				echo "Academic 12th table entry failed";
			}

			
			for($i=1; $i<=8; $i++){
				$stmt = $conn->prepare("INSERT INTO academicbtech_table (admission_number,semester) VALUES (?,?)");
				$status = $stmt->execute([$res["admission_number"],$i]);
				if($status){
					echo "Academic BTECH table entry done";
				}else{
					echo "Academic BTECH table entry failed";
				}
			}

			$stmt = $conn->prepare("INSERT INTO intern_table (admission_number) VALUES (?)");
			$status = $stmt->execute([$res["admission_number"]]);
			if($status){
				echo "Intern table entry done";
			}else{
				echo "Intern table entry failed";
			}

			$stmt = $conn->prepare("INSERT INTO project_table (admission_number) VALUES (?)");
			$status = $stmt->execute([$res["admission_number"]]);
			if($status){
				echo "Project table entry done";
			}else{
				echo "Project table entry failed";
			}

			$stmt = $conn->prepare("INSERT INTO personalinfo_table (admission_number) VALUES (?)");
			$status = $stmt->execute([$res["admission_number"]]);
			if($status){
				echo "Personal Info table entry done";
			}else{
				echo "Personal Info table entry failed";
			}

		}
	}	


	//truncate_all_tables();
	$result = get_all_students();
	create_table_entries($result);

?>