<!DOCTYPE html>
<html>
<head>
    <title>File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .upload-form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .upload-form input[type="file"] {
            margin-bottom: 10px;
            width: 100%;
        }

        .upload-form input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
        $targetDirectory = "uploads/";
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

        // Limit allowed file types (optional)
        $allowedTypes = array("jpg", "jpeg", "png", "gif");
        if (!in_array($fileType, $allowedTypes)) {
            echo '<div class="message error">Sorry, only JPG, JPEG, PNG, and GIF files are allowed.</div>';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo '<div class="message error">Sorry, your file was not uploaded.</div>';
        } else {
            // Move the uploaded file to the desired directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                echo '<div class="message success">The file ' . basename($_FILES["file"]["name"]) . ' has been uploaded.</div>';
            } else {
                echo '<div class="message error">Sorry, there was an error uploading your file.</div>';
            }
        }
    }
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
