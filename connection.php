<?php
function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

$conn = "";

try {
	$servername = "localhost:3306";
	$dbname = "project";
	$username = "root";
	$password = "root";

	$conn = new PDO(
		"mysql:host=$servername; dbname=project",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
