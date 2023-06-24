<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Course File</title>
    <link rel="stylesheet" href="../css/course-file.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
    .breadcrumb{
        display: inline-block;
        padding: 0;
        margin: 0;
        border-radius: 5px 25px 25px 5px;
        overflow: hidden;
    }
    .breadcrumb li{
        float: left;
        list-style-type: none;
        margin-right: 3px;
        position: relative;
        z-index: 1;
    }
    .breadcrumb li:before{ display: none; }
    .breadcrumb li:after{
        content: "";
        width: 40px;
        height: 100%;
        background: #428dff;
        position: absolute;
        top: 0;
        right: -20px;
        z-index: -1;
    }
    .breadcrumb li:nth-last-child(2):after,
    .breadcrumb li:last-child:after{ display: none; }
    .breadcrumb li a,
    .breadcrumb li:last-child{
        display: block;
        padding: 8px 15px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border-radius: 0 25px 25px 0;
        box-shadow: 5px 0 5px -5px #333;
    }
    .breadcrumb li a{ background: #428dff; }
    .breadcrumb li:last-child{
        background: #ebf3fe;
        color: #428dff;
        margin-right: 0;
    }
    @media only screen and (max-width: 479px){
        .breadcrumb li a,
        .breadcrumb li:last-child{ padding: 8px 10px; }
    }
    @media only screen and (max-width: 359px){
        .breadcrumb li a,
        .breadcrumb li:last-child{ padding: 8px 7px; }
    }
    </style>

<?php 
    session_start();
    $current_user = $_SESSION['$current_user'];
    $conn = mysqli_connect("localhost:3306","root","root","project");
    $sql1 = " SELECT * FROM faculty_preference";
    $sql2 = "SELECT * FROM subjects";
    $faculty= mysqli_query($conn,$sql1);
    $designation = $_SESSION['$designation'];
    $spcl_desig = $_SESSION['$spcl_desig'];

    // Retrieving the subject code from the URL parameter
    if (isset($_GET['subject'])) {
        $subjectCode = $_GET['subject'];
    } else {
        $subjectCode = 'No Subject Code Available';
    }

    $current_user = $_SESSION['$current_user'];
    $_SESSION['subjectCode'] = $subjectCode;

?>


</head>
<body>

    <div class="demo">
        <ol class="breadcrumb">
            <li><a href="../course-file.php?subject=<?php echo urlencode($subjectCode); ?>" style="text-decoration: none;">Course File</a></li>
            <li class="active">Pick Your Option</li>
        </ol>
    </div>

    <div class="fac_name">
        <h1>Department Course File</h1>
        Faculty Name: <?php echo $current_user; ?>
        <br>
        Subject Code: <?php echo $subjectCode; ?>
    </div>

    <br><br>

<div class="container">
    <div class="row justify-content-center">


        <!--*****-->
        <!--Vision of the College-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/viclg.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Vision of the College</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
        
        <!--*****-->
        <!--Mission of the College-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/miclg.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Mission of the College</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Vision of the Department-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/vidpt.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Vision of the Department</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Mission of the Department-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/midpt.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Mission of the Department</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Program Outcome-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/po.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Program Outcome</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--PEO-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/peo.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">PEO</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Mission of the Department-->
        <div class="col-xl-3 col-lg-6">
        <a href="./stable-files/pso.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">PSO</h5>
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>


    </div>
</div>

    
    
</body>
</html>