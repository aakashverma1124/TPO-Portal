<?php
$conn="";

try {
		$servername = "localhost:3406";
		$dbname = "TPO";
		$username = "root";
		$password = "";

	    $conn = new PDO("mysql:host=$servername;dbname=TPO", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }


?>    