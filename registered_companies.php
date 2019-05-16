<?php
 include_once('./includes/connection.php');
 include_once('./includes/utility.php');
?>

<h1> Registered Companies Details</h1>
<hr>
<br><br>
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
</style> 
</head>
<body>
<table class="table table-hover">
	<tr bgcolor="#215173"><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Company&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Package&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>
	<?php
		session_start();
		$admission_number = $_SESSION['admission_number'];
		$registered_companies = get_registered_companies($admission_number);
		// var_dump($current_openings);
		foreach($registered_companies as $registeredCompanies){		
					//var_dump($values["semester"]);
					echo '<tr><td>'.$registeredCompanies["company_name"].'</td><td>'.$registeredCompanies["company_profile"].'</td><td>'.$registeredCompanies["package"].' lacs</td></tr>';
		} 
	?>
</table>
</body>
</html>