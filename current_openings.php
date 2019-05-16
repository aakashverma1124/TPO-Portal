<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
		session_start();
		$admission_number = $_SESSION['admission_number'];

echo '<h1> Current Openings </h1>
<hr>
<br>';
if(!(is_personal_verified($admission_number) && is_academic_verified($admission_number))){
	echo '<h4>You are not verified user.</h4><br>';
}
echo '<br>';
?>
<html>
<head>
	<style>
	table,th,td{
		border: 0px solid black;
		text-align: center;
	}
	th{
		color: azure;
		border-top: 0px;
	}
	.btn-dark{
		background-color: #215173;
	}
</style>

</head>
<body>
<!-- <div class="table-responsive"> -->
<table class="table table-hover table">
	<tr bgcolor="#215173" class="info"><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;Branches_Allowed&nbsp;&nbsp;</th><th>&nbsp;&nbsp;Package&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;Registration_Deadline&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Register&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
	<?php
	error_reporting(E_ALL & ~E_NOTICE);
		session_start();
		$admission_number = $_SESSION['admission_number'];
		$current_openings = get_current_openings($admission_number);
		// var_dump($current_openings);
		foreach($current_openings as $opening){		
					//var_dump($values["semester"]);
					echo '<tr><td>'.$opening["company_name"].'</td><td>'.$opening["company_profile"].'</td><td>'.$opening["branches_allowed"].'</td><td>'.$opening["package"].' lacs</td><td>'.$opening["registration_deadline"].'</td><td>';
					if(is_personal_verified($admission_number) && is_academic_verified($admission_number)){
					echo '<button type="button" class="btn btn-dark" onclick="onRegisterButtonClicked(\''.$opening["opening_id"].'\',\''.$admission_number.'\');">Register ></button></td><tr>';
					}else{
						echo '<button type="button" class="btn btn-dark">Not Verified</button></td></tr>';
					}
		} 
	?>
</table>
<!-- </div> -->
</body>
</html>