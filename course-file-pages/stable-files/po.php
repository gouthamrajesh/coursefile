<?php
      $host = 'localhost:3306';
      $username = 'root';
      $password = 'root';
      $database = 'project';

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $subjectCode = $_POST["subject_code"];
    $targetDirectory = ".../uploads/";
    $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

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
            $fileName = $_FILES["file"]["name"];
            $filePath = $targetFile;

            // Insert file details into the database
            $sql = "INSERT INTO subjects_files (subject_code, file_name, file_path) VALUES ('$subjectCode', '$fileName', '$filePath')";

            if ($conn->query($sql) === TRUE) {
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
$conn->close();
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
v