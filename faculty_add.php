<?php 

include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = test_input($_POST["name"]);
	$password = test_input($_POST["pswrd"]);
    $designation = test_input($_POST["desig"]);
    $spcl_desig = test_input($_POST["spcl_desig"]);
    if($spcl_desig==""){
        $adminq = "INSERT INTO login (username,password,designation) values ('$username','$password','$designation')";
    }
    else{
        $adminq = "INSERT INTO login (username,password,designation,special_designation) values ('$username','$password','$designation','$spcl_desig')";
    }
    $facultyq =  "INSERT INTO faculty (name,designation,special_designation) values ('$username','$designation','$spcl_desig')";
    $facultyp = "INSERT INTO faculty_preference (name) values ('$username')";
    $conn->query($adminq);
    $conn->query($facultyq);
    $conn->query($facultyp);

    header("location: index.php");
}
?>