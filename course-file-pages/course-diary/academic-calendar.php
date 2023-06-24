<?php
// Establish database connection
$servername = "localhost:3306";
$username = "root";
$password = "root";
$database = "project";

// Retrieving the subject code from the URL parameter
if (isset($_GET['subject'])) {
    $subjectCode = $_GET['subject'];
} else {
    $subjectCode = 'No Subject Code Available';
}

// Variables for id and category
$id = 15;
$category = 'acc-calendar';

session_start();
$current_user = $_SESSION['$current_user'];
$_SESSION['subjectCode'] = $subjectCode;

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $targetDirectory = "../uploads/files/";
    $originalFileName = $_FILES["file"]["name"];
    $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
    $filename = basename($originalFileName, '.' . $fileExtension);
    $timestamp = time(); // Get current timestamp
    $newFileName = $filename . '_' . $timestamp . '.' . $fileExtension;
    $targetFile = $targetDirectory . $newFileName;
    $uploadOk = 1;

    // Check file size (optional)
    if ($_FILES["file"]["size"] > 5000000) {
        echo '<div class="message error">Sorry, your file is too large.</div>';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<div class="message error">Sorry, your file was not uploaded.</div>';
    } else {
        // Move the uploaded file to the desired directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            // Insert file details into the database
            $fileSize = $_FILES["file"]["size"];
            $uploadTime = date("Y-m-d H:i:s");

            $filepath = "uploads/files/" . $newFileName; // Relative path of the uploaded file

            // Prepare the SQL statement
            $sql = "INSERT INTO subjects_files (id, category, subject_code, file_name, file_path, uploaded_at) 
                    VALUES (?, ?, ?, ?, ?, ?)";

            // Prepare the statement
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                // Bind the parameters
                mysqli_stmt_bind_param($stmt, 'isssss', $id, $category, $subjectCode, $newFileName, $filepath, $uploadTime);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo '<div class="message success">The file ' . $originalFileName . ' has been uploaded and details saved to the database.</div>';
                } else {
                    echo '<div class="message error">Sorry, there was an error uploading your file and saving details to the database.</div>';
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo '<div class="message error">Sorry, there was an error preparing the SQL statement.</div>';
            }
        } else {
            echo '<div class="message error">Sorry, there was an error uploading your file.</div>';
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/upload.css" type="text/css" />
    <link rel="stylesheet" href="../../css/facu_prof.css" type="text/css">
    <title>KTU Academic Calendar</title>
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
</head>
<body>

    <div class="demo">
        <ol class="breadcrumb">
            <li><a href="../../course-file.php?subject=<?php echo urlencode($subjectCode); ?>" style="text-decoration: none;">Course File</a></li>
            <li><a href="../course-diary.php?subject=<?php echo urlencode($subjectCode); ?>" style="text-decoration: none;">Course Diary</a></li>
            <li class="active">KTU Academic Calendar</li>
        </ol>
    </div>

    <div class="fac_name">
        <h1>Department Course File</h1>
        Faculty Name: <?php echo $current_user; ?>
        <br>
        Subject Code: <?php echo $subjectCode; ?>
        <br>
        <h4>KTU Academic Calendar</h4>
    </div>

    <div class="upload-form">
        <h2>File Upload Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?subject=' . $subjectCode; ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" required /><br><br>
            <input type="submit" name="submit" value="Upload" />
        </form>
    </div>
</body>
</html>
