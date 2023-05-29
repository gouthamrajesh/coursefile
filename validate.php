<?php
$current_user = "";
include_once('connection.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = test_input($_POST["username"]);
	$_SESSION['$current_user'] = $username;
	$password = test_input($_POST["password"]);
	$stmt = $conn->prepare("SELECT * FROM login");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
		
		if(($user['username'] == $username) &&
			($user['password'] == $password)) {
				$_SESSION['$designation']=$user['designation'];
				$_SESSION['$spcl_desig']=$user['special_designation'];
				header("location: faculty_profile.php");
				die();
		}
	}
	header("location: index.php");
	die();
}

?>
