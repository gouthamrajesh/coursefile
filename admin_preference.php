<!DOCTYPE html>
<html>
<head>
  <title>Subject Registration</title>
  <style>
    /* Add your CSS styles here */
    /* For example: */
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }
    .form-container {
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
      color: #333;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      color: #333;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    .form-submit {
      text-align: center;
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
  <div class="form-container">
    <h2>Subject Registration</h2>
    <form action="process.php" method="POST">
      <div class="form-group">
        <label for="faculty">Faculty Name:</label>
        <select name="faculty" id="faculty">
          <!-- Fetch and populate the faculty names and ktu_ids dynamically from the database here -->
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

          // Fetch faculty names and ktu_ids from the database
          $sql = "SELECT name, ktu_id FROM faculty";
          $result = $conn->query($sql);

          // Populate the select options
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
            }
          }

          // Close the database connection
          $conn->close();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="subject_code">Subject Code:</label>
        <input type="text" name="subject_code" id="subject_code" required>
      </div>
      <div class="form-group">
        <label for="semester">Semester Number:</label>
        <input type="number" name="semester" id="semester" required>
      </div>
      <div class="form-group">
        <label for="teaching_hours">Teaching Hours:</label>
        <input type="number" name="teaching_hours" id="teaching_hours" required>
      </div>
      <div class="form-group">
        <label for="subject_credit">Subject Credit:</label>
        <input type="number" name="subject_credit" id="subject_credit" required>
      </div>
      <div class="form-submit">
        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
