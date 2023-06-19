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

    // Retrieving the subject code from the URL parameter
    if (isset($_GET['subject'])) 
    {
        $subject_code = $_GET['subject'];
    } 
    else 
    {
        $subject_code = 'No Subject Code Available';
    }

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
    <br>
    Subject Code: <?php echo $subject_code; ?>
    </div>

    <br><br>

<div class="container">
    <div class="row justify-content-center">

        <!--*****-->
        <!--Admin Only Access-->
        <?php 
        if($designation=="HOD" || $spcl_desig == "admin"){
        ?>
        <!--
            Here the admin/HoD can only view the following things. Since Mission and Vision, PEO and PSOs are stable content in a
            course file we have decided to give the admin the privilage of updating the stable contents in a course file.
        -->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/stable.php" class="card-contents">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Vision and Mission, PO, PEO and PSO</h5>                              
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
<!--
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-cherry">
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

        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">PEO and PSO</h5>                              
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
-->

        <?php 
        }
        ?>
        <!--*****-->
        <!--Admin Only Access End-->

        <!--*****-->
        <!--Course Outcome Card-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/test.php" class="card-contents">
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
        <!--CO-PO Mapping Page-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/test.php" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">CO - PO Mapping</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Course Diary-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/course-diary.php" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Course Diary</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Course Committee Meeting Minutes-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Course Committee Meeting Minutes</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Series Test Questions with Answer Key-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Series Test Questions with Answer Key</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Series Test Answer Booklets-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/test.php" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Series Test Answer Booklets</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Assignment Questions with Answer Key-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Assignment Questions with Answer Key</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Sample Assigments-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Sample Assignments</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Previous Year Question Paper-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/test.php" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Prvs Yr. Question Paper</h5>
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Tutorial Log Book-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Tutorial Log Book</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Result Analysis-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Result Analysis</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Attainment Report-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/test.php" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Attainment Report</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Concluding Report-->
        <div class="col-xl-3 col-lg-6">
        <a href="./course-file-pages/co.php" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Concluding Report</h5>                                
                        
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