<!DOCTYPE html>
<html>
<head>
  <title>Subject Registration - Process</title>
  <style>
    /* Add your CSS styles here */
    /* For example: */
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      margin-top: 50px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .success-message {
      text-align: center;
      color: #009900;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .error-message {
      text-align: center;
      color: #ff0000;
      font-weight: bold;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Replace with your database connection code
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

    // Retrieve form data
    $faculty = $_POST['faculty'];
    $subject_code = $_POST['subject_code'];
    $semester = $_POST['semester'];
    $teaching_hours = $_POST['teaching_hours'];
    $subject_credit = $_POST['subject_credit'];

    // Prepare the SQL statement to insert data into the subjects table
    $stmt = $conn->prepare("INSERT INTO subjects (faculty, subject_code, semester, teaching_hours, subject_credit) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiii", $faculty, $subject_code, $semester, $teaching_hours, $subject_credit);

    if ($stmt->execute()) {
      echo "<h2>Subject added successfully!</h2>";
      echo "<div class='success-message'>Subject has been registered successfully.</div>";
    } else {
      echo "<h2>Error!</h2>";
      echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
    ?>
  </div>
</body>
</html>
