<h1>Registered Students</h1>
<hr>
<?php
include_once('./includes/connection.php');
include_once('./includes/utility.php');

$values = (array)json_decode($_POST['action']);
//echo $companyName;

// error_reporting(E_ALL & ~E_NOTICE);
// session_start();
// $admission_number = $_SESSION["admission_number"];
	$stmt1 = $conn->prepare("SELECT opening_id FROM company_table WHERE company_name=?");
	$status1 = $stmt1->execute([$values['company_name']]);
	$result1 = $stmt1->fetch();

	//echo $result['opening_id'];

	$stmt2 = $conn->prepare("SELECT admission_number FROM company_registration_table WHERE opening_id=?");
	$status2 = $stmt2->execute([$result1['opening_id']]);
	$result2 = $stmt2->fetchAll();
	if($result2){	
	echo '<table class="table table-hover">
		<tr bgcolor="#215173"><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admission Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th></tr>';
		foreach($result2 as $res){
					echo '<tr><td>'.$res['admission_number'].'</td></tr>
		</table>';
	}
}
	else{
		echo 'No student has registered for this Company.';
	}
?>