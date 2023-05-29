<?php 
    session_start();
    $conn = mysqli_connect("localhost:3306","root","root","project");
    $hr=[];
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $fixsub=$_POST['fixsub'];
        $count=0;
        for($y=0;$y<5;$y++){
            $id=$y+1;
            $x=$y+$count;
            $x1=$x+1;
            $x2=$x1+1;
            $x3=$x2+1;$x4=$x3+1;$x5=$x4+1;
            $qry ="UPDATE tt1 set hr1 = '$fixsub[$x]',hr2 = '$fixsub[$x1]',hr3 = '$fixsub[$x2]',hr4 = '$fixsub[$x3]',hr5 = '$fixsub[$x4]',hr6 = '$fixsub[$x5]' where id = '$id'";
            $conn->query($qry);
            $count+=5;
        }
    }
?>