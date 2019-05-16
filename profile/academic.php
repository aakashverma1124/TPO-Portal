<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
?>
<html>
<head>
	<style>
	.verify-academic-button{
		margin-top: 5%;
		margin-left: 1%;
	}
	</style>
</head>
</html>

<div class="row">
	<div class="col-md-6">	
		<h1> Academic Details </h1>
	</div>
	<div class="col-md-6">
		<?php 
			error_reporting(E_ALL & ~E_NOTICE);
      		session_start();
      		$user_type = $_SESSION["user_type"];
      		$admission_number = $_SESSION["admission_number"];
      	if(!is_academic_verified($admission_number)){	
			echo '<button type="button" onclick="onEditAcademicButtonClicked()" class="btn btn-info edit-academic-button">
	      		<span class="glyphicon glyphicon-pencil"></span> Edit
	    	</button>
	    	<button type="button" id="update-academic-button" onclick="onUpdateAcademicButtonClicked()" class="btn btn-info update-academic-button">
	      		<span class="glyphicon glyphicon-envelope"></span> Update
	    	</button>';
    	}
    	
    	if($user_type == "admin"){ 
	    	echo '<button type="button" id="verify-button" onclick="onVerifyAcademicButtonClicked()" class="btn btn-info verify-academic-button">
	      		<span class="glyphicon glyphicon-envelope"></span> Verify
	    	</button>';
    	}
    	?>
	</div>	
</div>
<hr>



<?php 
	//session_start();
	$admission_number = $_SESSION['admission_number'];
	//echo $admission_number;
	$academic_info_10th = get_academic10th_info($admission_number);
	$academic_info_12th = get_academic12th_info($admission_number);
	$academic_info_btech = get_academicbtech_info($admission_number);
	
// echo' <form id="academicInfoForm" method="post" action="./updateAcademicInfo.php>'; 
echo
	
	
	'<div class="row" id="academic-form">
	<!-- Left side pane -->
		<div class="col-md-6 left-pane">
		
			<h4><b>10th</b></h4><hr>
			<div class="field">
				<div class="row academic-field-name">10th School</div>
				<div class="row academic-field-value"><input type="text" name="10th_school_name" value="'.$academic_info_10th["school_name"].'" readonly></div>
			</div>
			<div class="field">
				<div class="row academic-field-name">10th Board</div>
				<div class="row academic-field-value"><input type="text" name="10th_board" value="'.$academic_info_10th["board"].'" readonly></div>
			</div>
			<div class="field">
				<div class="row academic-field-name">10th Year</div>
				<div class="row academic-field-value"><input type="text" name="10th_year" value="'.$academic_info_10th["year"].'" readonly></div>
			</div>
			<div class="field">
				<div class="row academic-field-name">10th Percentage</div>
				<div class="row academic-field-value"><input type="text" name="10th_percentage" value="'.$academic_info_10th["percentage"].'" readonly></div>
			</div><hr>
			<h4><b>12th</b></h4><hr>
			<div class="field">
				<div class="row academic-field-name">12th School</div>
				<div class="row academic-field-value"><input type="text" name="12th_school_name" value="'.$academic_info_12th["school_name"].'" readonly></div>
			</div>
			<div class="field">
				<div class="row academic-field-name">12th Board</div>
				<div class="row academic-field-value"><input type="text" name="12th_board" value="'.$academic_info_12th["board"].'" readonly></div>
			</div>
			<div class="field">
				<div class="row academic-field-name">12th Year</div>
				<div class="row academic-field-value"><input type="text" name="12th_year" value="'.$academic_info_12th["year"].'" readonly></div>
			</div>
			<div class="field">
				<div class="row academic-field-name">12th Percentage</div>
				<div class="row academic-field-value"><input type="text" name="12th_percentage" value="'.$academic_info_12th["percentage"].'" readonly></div>
			</div><hr>
		</div>
		';
	?>
	<div class="col-md-6">
	<h4><b>B.Tech</b></h4><hr>
	<table>
		<tr><th>Semester&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>SGPA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>Percentile</th></tr>
		<?php
			$result = get_academicbtech_info($admission_number);
			$cnt = 1;
			$names = array("semester","sgpa","percentage");
			foreach($result as $value){
					//var_dump($values["semester"]);
					echo '<tr>';
					for($i = 1; $i <= 3; $i++){
						echo '<td><div class="academic-field-value"><input type="text" name="'.$names[$i-1].''.$cnt.'" value="'.$value[$i].'" readonly></td>';
					}
					$cnt = $cnt + 1;
					echo '</tr>';
			}	 
		?>
	</table>
	
	</div>
</div>



