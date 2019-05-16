<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
?>

<div class="row">
	<div class="col-md-8">	
		<h1> Project/Intern Details </h1>
	</div>
	<div class="col-md-4">
		<button type="button" onclick="onEditProjectButtonClicked()" class="btn btn-info edit-project-button">
      		<span class="glyphicon glyphicon-pencil"></span> Edit
    	</button>
    	<button type="button" id="update-button" onclick="onUpdateProjectButtonClicked()" class="btn btn-info update-project-button">
      		<span class="glyphicon glyphicon-envelope"></span> Update
    	</button>
	</div>	
</div>
<hr>

<?php
	//session_start();
	$admission_number = $_SESSION['admission_number'];
	$project_info = get_project_info($admission_number);

	//$admission_number = $_SESSION['admission_number'];
	$intern_info = get_intern_info($admission_number);	

echo
 	'<form id="projectInfoForm" action="./updateProjectInfo.php" method="post">
 	<h4> Project Details </h4>
	<hr>
 	<div class="first-pane">
		<div class="project-field">
				<div class="row project-field-name"><b>Project Title</b></div>
				<div class="row project-field-value"><textarea rows="2" name="title" readonly>'.$project_info["title"].'</textarea></div>
		</div>
		<div class="field">
				<div class="row project-field-name"><b>Project Description</b></div>
				<div class="row project-field-value"><textarea rows="8" name="projectDescription" readonly>'.$project_info["description"].'</textarea></div>
		</div>
	</div><hr>

	<h4> Intern Details </h4>
	<hr>

	<div>
		<div class="field">
				<div class="row project-field-name"><b>Organization</b></div>
				<div class="row project-field-value"><textarea rows="2" name="organization" readonly>'.$intern_info["organization"].'</textarea></div>
		</div>
		<div class="field">
				<div class="row project-field-name"><b>Description</b></div>
				<div class="row project-field-value"><textarea rows="8" name="internDescription" readonly>'.$intern_info["description"].'</textarea></div>
		</div>
	</div>
	</form>';
?>
