<?php 
include_once('connection.php');
session_start();
$qry = "SELECT sub_name from subjects";
$query = "SELECT * FROM faculty_preference";
$sub = $conn->query($qry);
$sub_name = [];
$current_user_num = $_SESSION['$current_user_num'];
$faculty_count = $_SESSION['$faculty_count'];
$subjects = [];
while($rows = $sub->fetch(PDO::FETCH_ASSOC)){
    array_push($sub_name,$rows['sub_name']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ans = $_POST['sub'];
    $app = $_POST['cbadmin'];
    array_unshift($app,-1);
    for($x=1;$x<$faculty_count+1;$x++){
        $sub1=0;$sub2=0;$sub3=0;
        for($y=$x-1;$y<sizeof($ans);$y+=$faculty_count){
            if(array_search($y,$app)){
                if($ans[$y]==1){$sub1=1;}
                if($ans[$y]==2){$sub2=1;}
                if($ans[$y]==3){$sub3=1;}
            }
        }
        $update = "UPDATE faculty_preference set s1_app = '$sub1',s2_app = '$sub2',s3_app = '$sub3' where id = '$x-1'";
        $conn->query($update);
    }
}
header("location: admin_preference.php");
	die();
?>