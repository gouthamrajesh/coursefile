<?php
// Retrieving the subject code from the URL parameter
if (isset($_GET['subject'])) {
    $subjectCode = $_GET['subject'];
} else {
    $subjectCode = 'No Subject Code Available';
}

session_start();
$current_user = $_SESSION['$current_user'];
$_SESSION['subjectCode'] = $subjectCode;

$conn = mysqli_connect("localhost:3306", "root", "root", "project");
$sqlStudents = "SELECT roll_no, name FROM students";
$resultStudents = mysqli_query($conn, $sqlStudents);
$students = mysqli_fetch_all($resultStudents, MYSQLI_ASSOC);

// Calculate and update the total column
$sqlUpdate = "UPDATE cumu_calcu
              SET total = COALESCE(avg_series, 0) + COALESCE(avg_assignment, 0) + COALESCE(avg_attendance, 0)";
mysqli_query($conn, $sqlUpdate);

// Fetch data from cumu_calcu table
$sqlSelect = "SELECT * FROM cumu_calcu";
$result = mysqli_query($conn, $sqlSelect);
$records = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cumulative Internal Scores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        .fac_name {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="fac_name">
        <h1>Cumulative Internal Scores</h1>
        Faculty Name: <?php echo $current_user; ?><br>
        Subject Code: <?php echo $subjectCode; ?><br>
        <h4>Cumulative Scores</h4>
    </div>

    <table>
        <tr>
            <th>Roll Number</th>
            <th>Name</th>
            <th>Average Series</th>
            <th>Average Assignment</th>
            <th>Average Attendance</th>
            <th>Total</th>
        </tr>
        <?php foreach ($records as $record) { ?>
            <tr>
                <td><?php echo $record['roll_no']; ?></td>
                <td><?php echo $record['name']; ?></td>
                <td><?php echo $record['avg_series']; ?></td>
                <td><?php echo $record['avg_assignment']; ?></td>
                <td><?php echo $record['avg_attendance']; ?></td>
                <td><?php echo $record['total']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
