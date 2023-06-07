<!DOCTYPE html>
<html>
<head>
  <title>Faculty Details</title>
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
    .form-group select,
    .form-group input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Faculty Details</h2>
    <form action="process.php" method="POST">
      <div class="form-group">
        <label for="faculty">Faculty Name:</label>
        <select name="faculty" id="faculty">
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

          // Fetch faculty names from the database
          $sql = "SELECT name FROM faculty";
          $result = $conn->query($sql);

          // Populate the select options
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row["name"] . "'>" . $row["name"] . "</option>";
            }
          }

          // Close the database connection
          $conn->close();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="subject">Subject:</label>
        <?php
        // Replace with your database connection code
        $conn = new mysqli($host, $username, $password, $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_POST['faculty'])) {
          $facultyName = $_POST['faculty'];

          // Fetch faculty details from the database
          $sql = "SELECT * FROM faculty WHERE name = '$facultyName'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $facultyId = $row['id'];

            // Fetch subjects associated with the faculty
            $sql = "SELECT * FROM subjects WHERE faculty_id = '$facultyId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // Display dropdown if there are more than two subjects
              if ($result->num_rows > 2) {
                echo "<select name='subject' id='subject'>";
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["subject_id"] . "'>" . $row["subject_name"] . "</option>";
                }
                echo "</select>";
              } else {
                // Display radio buttons if there are two or fewer subjects
                while ($row = $result->fetch_assoc()) {
                  echo "<input type='radio' name='subject' value='" . $row["subject_id"] . "'>" . $row["subject_name"] . "<br>";
                }
              }
            } else {
              echo "No subjects found for the selected faculty.";
            }
          } else {
            echo "Faculty not found.";
          }
        }

        // Close the database connection
        $conn->close();
        ?>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit">
      </div>
    </form>
  </div>
</body>
</html>
