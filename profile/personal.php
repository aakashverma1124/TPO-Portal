<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
?>
<html>
<head>
	<style>
	.verify-button{
		margin-top: 5%;
		margin-left: 1%;
	}
	</style>
</head>
</html>

<div class="row">
	<div class="col-md-6">	
		<h1> Personal Details </h1>
	</div>
	<div class="col-md-6">
		<?php 
			error_reporting(E_ALL & ~E_NOTICE);
      		session_start();
      		$user_type = $_SESSION["user_type"];
      		$admission_number = $_SESSION["admission_number"];
      	if(!is_personal_verified($admission_number)){	
			echo '<button type="button" onclick="onEditButtonClicked()" class="btn btn-info edit-button">
	      		<span class="glyphicon glyphicon-pencil"></span> Edit
	    	</button>
	    	<button type="button" id="update-button" onclick="onUpdateButtonClicked()" class="btn btn-info update-button">
	      		<span class="glyphicon glyphicon-envelope"></span> Update
	    	</button>';
    	}
    	
    	if($user_type == "admin"){ 
	    	echo '<button type="button" id="verify-button" onclick="onVerifyPersonalButtonClicked()" class="btn btn-info verify-button">
	      		<span class="glyphicon glyphicon-envelope"></span> Verify
	    	</button>';
    	}
    	?>
	</div>	
</div>
<hr>
<?php
	error_reporting(E_ALL & ~E_NOTICE); 
	session_start();
	$admission_number = $_SESSION['admission_number'];
	//echo $admission_number;
	$personal_info = get_personal_info($admission_number);
	

echo '
	<form id="personalInfoForm" method="post" action="./updateProfile.php">
	<div class="row">
	<!-- Left side pane -->
	<div class="col-md-6 left-pane">
		<div class="field">
			<div class="row field_name">Admission Number</div>
			<div class="row field_value"><input type="text" name="admission_number" value="'.$personal_info["admission_number"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Name</div>
			<div class="row field_value"><input type="text" name="name" value="'.$personal_info["name"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Course</div>
			<div class="row field_value"><input type="text" name="course" value="'.$personal_info["course"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Branch</div>
			<div class="row field_value"><input type="text" name="branch" value="'.$personal_info["branch"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Date Of Birth</div>
			<div class="row field_value"><input type="text" placeholder = "yyyy-mm-dd" name="dob" value="'.$personal_info["dob"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Email</div>
			<div class="row field_value"><input type="text" name="email" value="'.$personal_info["email"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Linkedin ID</div>
			<div class="row field_value"><input type="text" name="linkedin" value="'.$personal_info["linkedin"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Gender</div>
			<div class="row field_value"><input type="text" name="gender" value="'.$personal_info["gender"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Category</div>
			<div class="row field_value"><input type="text" name="category" value="'.$personal_info["category"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Physically Challanged</div>
			<div class="row field_value"><input type="text" name="pwd" value="'.$personal_info["pwd"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Residential Status</div>
			<div class="row field_value"><input type="text" name="residential_status" value="'.$personal_info["residential_status"].'" readonly></div>
		</div>
	</div>
<!-- 	Right side pane -->
	<div class="col-md-6 right-pane">		
		<div class="field">
			<div class="row field_name">Guardian</div>
			<div class="row field_value"><input type="text" name="guardian" value="'.$personal_info["guardian"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Present Address</div>
			<div class="row field_value"><textarea rows="2" name="present_address" readonly>'.$personal_info["present_address"].'</textarea></div>
		</div>
		<div class="field">
			<div class="row field_name">Permanent Address</div>
			<div class="row field_value"><textarea rows="2" name="permanent_address" readonly>'.$personal_info["permanent_address"].'</textarea></div>
		</div>
		<div class="field">
			<div class="row field_name">Marital Status</div>
			<div class="row field_value"><input type="text" name="marital_status" value="'.$personal_info["marital_status"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">State</div>
			<div class="row field_value"><input type="text" name="state" value="'.$personal_info["state"].'" readonly></div>
		</div>
		<div class="field">
			<div class="row field_name">Country</div>
			<div class="row field_value"><input type="text" name="country" value="'.$personal_info["country"].'" readonly></div>
		</div>
	</div>
</div>
</form>';
?>