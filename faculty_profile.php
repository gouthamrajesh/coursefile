<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./fac_prof.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6">
            <a href="preference_add.php">
            <div class="serviceBox" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">Enter preference</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>

        <?php 
        if($designation=="HOD"){
        ?>
        <div class="col-md-3 col-sm-6">
        <a href="admin_preference.php">
            <div class="serviceBox blue" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-rocket"></i></span>
                </div>
                <h3 class="title">Approve Preference</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>

        <?php 
        }
        if($spcl_desig == "ttcordinat"){
        ?>
        <div class="col-md-3 col-sm-6">
            <a href="time_table.php">
            <div class="serviceBox" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">Time Table Generate</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>


    </div>
</div>

    
    <?php 
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>