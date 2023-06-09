<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f1f1f1;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .upload-form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .upload-form input[type="file"] {
            margin-bottom: 10px;
        }

        .upload-form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
        }

        .success {
            background-color: #4CAF50;
        }

        .error {
            background-color: #f44336;
        }
    </style>
</head>
<body>
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
            // Get the file name and file path
            $fileName = $_FILES["file"]["name"];
            $filePath = $targetFile;

            // Add file details to the database
            $sql = "INSERT INTO subjects_files (subject_code, file_name, file_path) VALUES ('$subjectCode', '$fileName', '$filePath')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="message success">The file ' . basename($_FILES["file"]["name"]) . ' has been uploaded and added to the database.</div>';
            } else {
                echo '<div class="message error">Sorry, there was an error uploading your file and adding to the database.</div>';
            }
        } else {
            echo '<div class="message error">Sorry, there was an error uploading your file.</div>';
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>


    <div class="upload-form">
        <h2>File Upload Form</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit" name="submit" value="Upload" />
        </form>
    </div>
</body>
</html>
