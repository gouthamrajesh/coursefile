<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course File</title>
    <link rel="stylesheet" href="../../css/course-file.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <?php 

// Retrieving the subject code from the URL parameter
if (isset($_GET['subject'])) 
{
    $subjectCode = $_GET['subject'];
} 
else 
{
    $subjectCode = 'No Subject Code Available';
}

session_start();
$current_user = $_SESSION['$current_user'];
$_SESSION['subjectCode'] = $subjectCode;


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
        <h1>Course Diary</h1>
    Faculty Name: <?php echo $current_user; ?>
    <br>
    Subject Code: <?php echo $subjectCode; ?>
    </div>

    <br><br>

<div class="container">
    <div class="row justify-content-center">


        <!--*****-->
        <!--Timetable-->
        <div class="col-xl-3 col-lg-6">
        <a href="./series-calcu.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Series Examination Mark Calculator</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>
        


        <!--*****-->
        <!--KTU/Academic Calendar-->
        <div class="col-xl-3 col-lg-6">
        <a href="./assignment-calcu.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Assignment Mark Calculator</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Attendance-->
        <div class="col-xl-3 col-lg-6">
        <a href="./attendance-calcu.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Attendance Percentile Calculator</h5>                                
                        
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                    </div>
                </div>
            </a>
            </div>
        </div>

        <!--*****-->
        <!--Internal Marks Assessment-->
        <div class="col-xl-3 col-lg-6">
        <a href="./cumulative-calcu.php?subject=<?php echo urlencode($subjectCode); ?>" class="card-contents">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                            <h5 class="card-title">Cumulative Internal Assessment</h5>
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