<?php
// Retrieving the subject code from the URL parameter
if (isset($_GET['subject'])) 
{
    $subjectCode = $_GET['subject'];
} 
else 
{
    $subjectCode = 'No Subject Code Available';
}
session_start();
$current_user = $_SESSION['$current_user'];
$conn = mysqli_connect("localhost:3306", "root", "root", "project");

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sl_no = $_POST['sl_no'];
  $date = $_POST['date'];
  $topic = $_POST['topic'];
  $teaching_hours = $_POST['teaching_hours'];

  // Insert data into the course_plan table
  $sql = "INSERT INTO subject_coverage (sl_no, date, topic, teaching_hours)
          VALUES ('$sl_no', '$date', '$topic', '$teaching_hours')";
  if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

$sql1 = "SELECT * FROM faculty_preference";
$sql2 = "SELECT * FROM subjects";
$faculty = mysqli_query($conn, $sql1);
$designation = $_SESSION['$designation'];
$spcl_desig = $_SESSION['$spcl_desig'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subject Coverage - Course File</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }

    .fac_name {
      text-align: center;
      padding: 20px;
      background-color: #f1f1f1;
    }

    .fac_name h1 {
      margin: 0;
    }

    .fac_name p {
      margin: 0;
    }

    .fac_name h4 {
      margin: 0;
      margin-top: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    input[type="text"], input[type="date"], input[type="number"] {
      width: 100%;
      padding: 5px;
    }

    input[type="submit"] {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: white;
      border: none;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="fac_name">
    <h1>Subject Coverage | Course Diary</h1>
    <p>Faculty Name: <?php echo $current_user; ?></p>
    <p>Subject Code: <?php echo $subjectCode; ?></p>
    <h4>Subject Coverage</h4>
  </div>

  <form method="POST" action="">
    <table>
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Date</th>
          <th>Topic</th>
          <th>Number of Teaching Hours</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="sl_no"></td>
          <td><input type="date" name="date"></td>
          <td><input type="text" name="topic"></td>
          <td><input type="number" name="teaching_hours"></td>
        </tr>
      </tbody>
    </table>
    <input type="submit" value="Submit">
  </form>
</body>
</html>
