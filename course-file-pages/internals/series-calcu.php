<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course File</title>
    <link rel="stylesheet" href="../../css/course-file.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
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


    $conn = mysqli_connect("localhost:3306","root","root","project");
    $sql1 = " SELECT * FROM faculty_preference";
    $sql2 = "SELECT * FROM subjects";
    $faculty= mysqli_query($conn,$sql1);
    $designation = $_SESSION['$designation'];
    $spcl_desig = $_SESSION['$spcl_desig'];

    $sqlStudents = "SELECT roll_no, name FROM students";
    $resultStudents = mysqli_query($conn, $sqlStudents);
    $students = mysqli_fetch_all($resultStudents, MYSQLI_ASSOC);

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate form inputs
        $series1Scores = $_POST['series1'];
        $series2Scores = $_POST['series2'];

        // Prepare the SQL statement to insert into the series_calcu table
        $sqlInsert = "INSERT INTO series_calcu (roll_no, name, series1, series2, avg_series) VALUES ";
        $values = array();

        // Loop through each student and construct the values to be inserted
        foreach ($students as $student) {
            $rollNo = $student['roll_no'];
            $name = $student['name'];
            $series1Score = isset($series1Scores[$rollNo]) ? (int) $series1Scores[$rollNo] : null;
            $series2Score = isset($series2Scores[$rollNo]) ? (int) $series2Scores[$rollNo] : null;

            // Calculate the average series score
            $avgSeriesScore = ($series1Score + $series2Score) / 4;

            // Add the values to the array
            $values[] = "($rollNo, '$name', $series1Score, $series2Score, $avgSeriesScore)";

            // Prepare the SQL statement to insert into the cumu_calcu table
            $sqlInsertCumu = "INSERT INTO cumu_calcu (roll_no, name, avg_series) VALUES ";
            $valuesCumu = array();

            // Add the values to the array
            $valuesCumu[] = "($rollNo, '$name', $avgSeriesScore)";

            // Concatenate the values and complete the SQL statement
            $sqlInsertCumu .= implode(", ", $valuesCumu);

            // Insert the data into the cumu_calcu table
            mysqli_query($conn, $sqlInsertCumu);
        }

        // Concatenate the values and complete the SQL statement
        $sqlInsert .= implode(", ", $values);

        // Insert the data into the series_calcu table
        if (mysqli_query($conn, $sqlInsert)) {
            $message = "Data inserted successfully.";
            $messageClass = "success-message";
        } else {
            $message = "Error: " . mysqli_error($conn);
            $messageClass = "error-message";
        }
    }
    ?>
</head>
<body>
    <div class="fac_name">
        <h1>Course Diary</h1>
        Faculty Name: <?php echo $current_user; ?><br>
        Subject Code: <?php echo $subjectCode; ?><br>
        <h4>Series Calculator</h4>
    </div>

    <br><br>

    <form method="POST">
        <table>
            <tr>
                <th>Roll Number</th>
                <th>Name</th>
                <th>Series 1</th>
                <th>Series 2</th>
            </tr>
            <?php if ($students) {
                foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['roll_no']; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td><input type="number" name="series1[<?php echo $student['roll_no']; ?>]" step="0.01" min="0"></td>
                        <td><input type="number" name="series2[<?php echo $student['roll_no']; ?>]" step="0.01" min="0"></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="4">No students found.</td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($message)) { ?>
        <p class="<?php echo $messageClass; ?>"><?php echo $message; ?></p>
    <?php } ?>
</body>
</html>
