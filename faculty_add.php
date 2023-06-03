<?php 

include_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = test_input($_POST["name"]);
    $ktu_id = test_input($_POST["ktu_id"]);
	$password = test_input($_POST["pswrd"]);
    $designation = test_input($_POST["desig"]);
    $spcl_desig = test_input($_POST["spcl_desig"]);
    if($spcl_desig==""){
        $adminq = "INSERT INTO login (ktu_id,username,password,designation) values ('$ktu_id','$username','$password','$designation')";
    }
    else{
        $adminq = "INSERT INTO login (ktu_id,username,password,designation,special_designation) values ('$ktu_id','$username','$password','$designation','$spcl_desig')";
    }
    $facultyq =  "INSERT INTO faculty (ktu_id,name,designation,special_designation) values ('$ktu_id','$username','$designation','$spcl_desig')";
    $facultyp = "INSERT INTO faculty_preference (ktu_id,name) values ('$ktu_id','$username')";
    $conn->query($adminq);
    $conn->query($facultyq);
    $conn->query($facultyp);

    header("location: index.php");
}
?>