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

session_start();
$current_user = $_SESSION['$current_user'];
$_SESSION['subjectCode'] = $subjectCode;

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $targetDirectory = "../../uploads/";
    $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo '<div class="message error">Sorry, file already exists.</div>';
        $uploadOk = 0;
    }

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
            $filename = $_FILES["file"]["name"];
            $fileSize = $_FILES["file"]["size"];
            $uploadTime = date("Y-m-d H:i:s");

            $filepath = "uploads/" . $filename; // Relative path of the uploaded file

            // Prepare the SQL statement
            $sql = "INSERT INTO subjects_files (subject_code, file_name, file_path, uploaded_at) 
                    VALUES (?, ?, ?, ?)";

            // Prepare the statement
            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                // Bind the parameters
                mysqli_stmt_bind_param($stmt, 'ssss', $subjectCode, $filename, $filepath, $uploadTime);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo '<div class="message success">The file ' . basename($_FILES["file"]["name"]) . ' has been uploaded and details saved to the database.</div>';
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
    <title>File Upload</title>
</head>
<body>

    <div class="fac_name">
        <h1>Course File</h1>
        Faculty Name: <?php echo $current_user; ?>
        <br>
        Subject Code: <?php echo $subjectCode; ?>
        <br>
        <h4>Vision of the College</h4>
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
