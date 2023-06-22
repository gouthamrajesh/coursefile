<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            padding: 20px;
        }

        .fac_name {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            margin-top: 0;
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

        input[type="number"] {
            width: 60px;
            padding: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-bottom: 10px;
            color: #555;
        }

        .success-message {
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        .error-message {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
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

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate form inputs
        $attendanceScores = $_POST['attendance'];

        // Prepare the SQL statement to insert into the attendance_calcu table
        $sqlInsert = "INSERT INTO attendance_calcu (roll_no, name, attendance_score) VALUES ";
        $values = array();

        // Loop through each student and construct the values to be inserted
        foreach ($students as $student) {
            $rollNo = $student['roll_no'];
            $name = $student['name'];
            $attendanceScore = isset($attendanceScores[$rollNo]) ? (int) $attendanceScores[$rollNo] : null;

            // Add the values to the array
            $values[] = "($rollNo, '$name', $attendanceScore)";
        }

        // Concatenate the values and complete the SQL statement
        $sqlInsert .= implode(", ", $values);

        // Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ...

    // ...

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ...

    // Insert the data into the attendance_calcu table
    if (mysqli_query($conn, $sqlInsert)) {
        // Calculate the average attendance for each student
        $sqlUpdate = "UPDATE cumu_calcu
                      INNER JOIN attendance_calcu
                      ON cumu_calcu.roll_no = attendance_calcu.roll_no
                      SET cumu_calcu.avg_attendance =
                          CASE
                              WHEN attendance_calcu.attendance_score BETWEEN 90 AND 100 THEN 10
                              WHEN attendance_calcu.attendance_score BETWEEN 80 AND 90 THEN 9
                              WHEN attendance_calcu.attendance_score BETWEEN 70 AND 80 THEN 8
                              WHEN attendance_calcu.attendance_score BETWEEN 60 AND 70 THEN 7
                              WHEN attendance_calcu.attendance_score BETWEEN 50 AND 60 THEN 6
                              WHEN attendance_calcu.attendance_score BETWEEN 40 AND 50 THEN 5
                              WHEN attendance_calcu.attendance_score BETWEEN 30 AND 40 THEN 4
                              WHEN attendance_calcu.attendance_score BETWEEN 20 AND 30 THEN 3
                              WHEN attendance_calcu.attendance_score BETWEEN 10 AND 20 THEN 2
                              WHEN attendance_calcu.attendance_score BETWEEN 1 AND 10 THEN 1
                              WHEN attendance_calcu.attendance_score = 0 THEN 0
                              ELSE cumu_calcu.avg_attendance
                          END";
        mysqli_query($conn, $sqlUpdate);

        $message = "Data inserted into attendance_calcu successfully.";
        $messageClass = "success-message";
    } else {
        $message = "Error: " . mysqli_error($conn);
        $messageClass = "error-message";
    }
}
}
    }
?>

</head>
<body>
    <div class="fac_name">
        <h1>Attendance Calculator</h1>
        Faculty Name: <?php echo $current_user; ?><br>
        Subject Code: <?php echo $subjectCode; ?><br>
        <h4>Attendance Scores</h4>
    </div>

    <br><br>

    <form method="POST">
        <table>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Attendance Score</th>
            </tr>
            <?php if ($students) {
                foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['roll_no']; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td><input type="number" name="attendance[<?php echo $student['roll_no']; ?>]" step="0.01" min="0"></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="3">No students found.</td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($message)) { ?>
        <p class="<?php echo $messageClass; ?>"><?php echo $message; ?></p>
    <?php } ?>

    <br><br>
    <a href="faculty_home.php" class="btn btn-secondary">Back to Home</a>
</body>
</html>
