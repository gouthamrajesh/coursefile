<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course File</title>
    <link rel="stylesheet" href="./css/course-file.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
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
        <h1>Course File</h1>
    Faculty Name: <?php echo $current_user; ?>
    </div>

    <br><br>

<!--   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6">
            <a href="co.php">
            <div class="serviceBox" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">Course Outcome</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>


        <div class="col-md-3 col-sm-6">
        <a href="./po.php">
            <div class="serviceBox blue" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-rocket"></i></span>
                </div>
                <h3 class="title">Program Outcome</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>


        <div class="col-md-3 col-sm-6">
            <a href="time_table.php">
            <div class="serviceBox" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">CO-PO Mapping</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>


        <div class="col-md-3 col-sm-6">
            <a href="./course-diary.php">
            <div class="serviceBox" style="margin-top: 50px;">
                <div class="service-icon">
                    <span><i class="fa fa-globe"></i></span>
                </div>
                <h3 class="title">Course File</h3></a>
                <p class="description">Lorem ipsum dolor sit amet conse ctetur adipisicing elit. Qui quaerat fugit quas veniam perferendis repudiandae sequi, dolore quisquam illum.</p>
            </div>
        </div>


    </div>
</div> -->

<div class="col-md-10 ">
    <div class="row ">
        <!--*****-->
        <!--Course Outcome Card-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Course Outcome</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
        <!--*****-->
        <!--Course Outcome Card End-->
        
        <!--*****-->
        <!--Course Outcome Card-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Course Outcome</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
        <!--*****-->
        <!--Course Outcome Card End-->

        <!--*****-->
        <!--Course Outcome Card-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Course Outcome</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
        <!--*****-->
        <!--Course Outcome Card End-->

        <!--*****-->
        <!--Course Outcome Card-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Course Outcome</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
        <!--*****-->
        <!--Course Outcome Card End-->
    </div>
</div>

<h3>Course Diary</h3>
    
    
</body>
</html>