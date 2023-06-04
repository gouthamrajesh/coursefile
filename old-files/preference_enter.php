
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
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==1){
            array_push($subjects,((int)($x/$faculty_count)));
        }
        
    }
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==2){
            array_push($subjects,((int)($x/$faculty_count)));
        }
    }
    for($x=$current_user_num-1;$x<sizeof($ans);$x+=$faculty_count){
        if($ans[$x]==3){
            array_push($subjects,((int)($x/$faculty_count)));
        }
    }
    $sub1 = $subjects[0];
    $sub2 = $subjects[1];
    $sub3 = $subjects[2];
    
    $qry = "UPDATE faculty_preference set sub1 = '$sub_name[$sub1]',sub2 = '$sub_name[$sub2]',sub3 = '$sub_name[$sub3]' where id = '$current_user_num+1'";
    $conn->query($qry);
        header("location: preference_add.php");
        die();
}
?>