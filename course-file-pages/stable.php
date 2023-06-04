<?php
// Replace with your database connection details
$host = 'localhost:3306';
$username = 'root';
$password = 'root';
$database = 'project';

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $category = $_POST['category'];

    // Determine the column name based on the selected category
    $column = '';

    switch ($category) {
        case 'viclg':
            $column = 'viclg';
            break;
        case 'miclg':
            $column = 'miclg';
            break;
        case 'vidpt':
            $column = 'vidpt';
            break;
        case 'midpt':
            $column = 'midpt';
            break;
        case 'po':
            $column = 'po';
            break;
        case 'peo':
            $column = 'peo';
            break;
        case 'pso':
            $column = 'pso';
            break;
        default:
            // Handle invalid category if needed
            break;
    }

    // Prepare the SQL statement to insert data into the stable_data table
    $stmt = $conn->prepare("INSERT INTO stable_data (subject_code, $column) VALUES (?, ?)");

    if (isset($_FILES['fileInput'])) {
        $files = $_FILES['fileInput'];
        $count = count($files['name']);

        // Iterate over uploaded files
        for ($i = 0; $i < $count; $i++) {
            $tmp_name = $files['tmp_name'][$i];
            $file_name = $files['name'][$i];

            // Move uploaded file to desired location
            $upload_dir = 'uploads/';
            $file_path = $upload_dir . $file_name;
            move_uploaded_file($tmp_name, $file_path);

            // Get the subject code from the file name
            $subject_code = substr($file_name, 0, strpos($file_name, '.'));

            // Bind parameters and execute the SQL statement
            $stmt->bind_param("ss", $subject_code, $file_path);
            $stmt->execute();
        }

        echo "<h2>Files uploaded successfully!</h2>";
    } else {
        echo "<h2>Error!</h2>";
        echo "<div class='error-message'>Error uploading files.</div>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
  <title>File Upload</title>
  <style>
    /* Add your CSS styles here */
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }
    .container {
      max-width: 80%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    .file-upload {
      border: 2px dashed #ccc;
      padding: 20px;
      text-align: center;
      color: #777;
    }
    .file-upload:hover {
      background-color: #f9f9f9;
    }
    .file-upload input {
      display: none;
    }
    .file-upload-label {
      font-size: 18px;
      font-weight: bold;
    }
    .file-upload-drag {
      font-size: 14px;
      color: #999;
      margin-top: 10px;
    }
    .category-select {
      margin-top: 20px;
      text-align: center;
    }
    .category-select label {
      display: inline-block;
      font-weight: bold;
      margin-right: 10px;
    }
    .form-submit {
      text-align: center;
      margin-top: 20px;
    }
    .form-submit button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .form-submit button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>File Upload</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="file-upload">
        <label class="file-upload-label" for="fileInput">Drag and drop files here or click to upload</label>
        <input type="file" name="fileInput[]" id="fileInput">
        <div class="file-upload-drag">(Maximum file size: 10MB)</div>
      </div>

      <div class="category-select">
        <label for="category">Category:</label>
        <select name="category" id="category">
          <option value="viclg">Vision of the college</option>
          <option value="miclg">Mission of the college</option>
          <option value="vidpt">Vision of the department</option>
          <option value="midpt">Mission of the department</option>
          <option value="po">Program Outcome</option>
          <option value="peo">PEO</option>
          <option value="pso">PSO</option>
        </select>
      </div>

      <div class="form-submit">
        <button type="submit">Upload</button>
      </div>
    </form>
  </div>

  <script>
    // Drag and drop file functionality
    var fileInput = document.getElementById('fileInput');
    var fileUpload = document.querySelector('.file-upload');

    fileUpload.addEventListener('dragover', function(e) {
      e.preventDefault();
      fileUpload.classList.add('file-upload-dragover');
    });

    fileUpload.addEventListener('dragleave', function(e) {
      e.preventDefault();
      fileUpload.classList.remove('file-upload-dragover');
    });

    fileUpload.addEventListener('drop', function(e) {
      e.preventDefault();
      fileUpload.classList.remove('file-upload-dragover');
      fileInput.files = e.dataTransfer.files;
    });
  </script>
</body>
</html>
