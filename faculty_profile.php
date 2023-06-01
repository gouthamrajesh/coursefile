<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fac_prof.css">

<?php 
    session_start();
    $current_user = $_SESSION['$current_user'];
    $conn = mysqli_connect("localhost:3306","root","root","project");
    $sql1 = " SELECT * FROM faculty_preference";
    $sql2 = "SELECT * FROM subjects";
    $faculty= mysqli_query($conn,$sql1);
    $designation = $_SESSION['$designation'];
    $spcl_desig = $_SESSION['$spcl_desig'];
?>
</head>
<body>
    <div class="fac_name">
    Faculty Name: <?php echo $current_user; ?>
    </div>
    
    <div class="card">
        <div class="card__content">
            
        </div>
    </div>
    <a href="preference_add.php">Enter preference</a>
    <?php 
    if($designation=="HOD"){
    ?>
    <a href="admin_preference.php">Aprove preference</a>
    <?php 
    }
    if($spcl_desig == "ttcordinat"){
    ?>
    <a href="time_table.php">Time Table Generate</a>
    <?php 
    }
    ?>
</body>
</html>