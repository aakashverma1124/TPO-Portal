


<?php
	include_once('./includes/connection.php');

	$name;
	function test_input($data) {
 	 	$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  $admission_number = test_input($_POST["name"]);
	  $password = test_input($_POST["rollno"]);
	  //echo "Adm No: " .$admission_number. " Pass: " .$password;
	}else{
		echo "failed";
	}

    $stmt = $conn->query("SELECT * FROM login_table");
	$users = $stmt->fetchAll();
	//var_dump($users);
	foreach ($users as $user){
		if($user["admission_number"]==$admission_number && $user["password"]==$password){
			// echo "mil gya";
			// echo "HELLO AAKASH YOU ARE SUCCESSFULLY LOGGED IN";
			$stmt = $conn->prepare("SELECT * FROM student_table WHERE admission_number=?");
			$stmt->execute([$admission_number]); 
			$result = $stmt->fetch();
			session_start();
			$_SESSION["name"] = $result["name"];
			$_SESSION["user_type"] = $user["user_type"];
			if($user["user_type"]=="user"){
				$_SESSION["admission_number"] = $admission_number;
				header("Location: profile.php");
			}
			else if($user["user_type"]=="admin"){
				header("Location: adminProfile.php");
			}
			die();
		}
	}
	//if login has failed
	header("Location: index.php?status=failed");
	die();


?>
?>