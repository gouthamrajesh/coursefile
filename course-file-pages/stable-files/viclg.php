<?php
// Establish database connection
$servername = "localhost:3306";
$username = "root";
$password = "root";
$database = "project";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $targetDirectory = "../uploads/";
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

            $sql = "INSERT INTO subject_files (filename, filepath, filesize, upload_time) VALUES ('$filename', '$targetFile', '$fileSize', '$uploadTime')";
            if (mysqli_query($conn, $sql)) {
                echo '<div class="message success">The file ' . basename($_FILES["file"]["name"]) . ' has been uploaded and details saved to the database.</div>';
            } else {
                echo '<div class="message error">Sorry, there was an error uploading your file and saving details to the database.</div>';
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
    <title>File Upload</title>
</head>
<body>
    <div class="upload-form">
        <h2>File Upload Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="subject_code" placeholder="Subject Code" required /><br><br>
            <input type="file" name="file" required /><br><br>
            <input type="submit" name="submit" value="Upload" />
        </form>
    </div>
</body>
</html>
