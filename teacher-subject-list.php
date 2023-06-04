<!DOCTYPE html>
<html>
<head>
  <title>View Faculty Details</title>
  <link rel="stylesheet" type="text/css" href="./css/view_fac.css">
</head>
<body>
  <div class="container">
    <h2>Faculty Details</h2>
    <table class="table">
      <tr>
        <th>Faculty</th>
        <th>Subject Code</th>
        <th>Teaching Hours</th>
        <th>Semester Number</th>
        <th>Subject Credit</th>
      </tr>
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

      // Fetch faculty details from the database
      $sql = "SELECT * FROM subjects";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $faculty = $row['faculty'];
          $subject_code = $row['subject_code'];
          $teaching_hours = $row['teaching_hours'];
          $semester = $row['semester'];
          $subject_credit = $row['subject_credit'];

          echo "<tr>";
          echo "<td class='faculty'>$faculty</td>";
          echo "<td class='subject-code'>$subject_code</td>";
          echo "<td class='teaching-hours'>$teaching_hours</td>";
          echo "<td class='semester-number'>$semester</td>";
          echo "<td class='subject-credit'>$subject_credit</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No faculty details found.</td></tr>";
      }

      // Close the database connection
      $conn->close();
      ?>
    </table>
  </div>
</body>
</html>
