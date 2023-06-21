<!DOCTYPE html>
<html>
<head>
    <title>Attendance Sheet - June 2023</title>
    <link rel="stylesheet" href="../css/facu_prof.css" type="text/css">
    <style>
        /* Existing styles */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e2e2e2;
        }

        /* New styles */
        .present {
            background-color: green;
            color: white;
        }
        .absent {
            background-color: red;
            color: white;
        }
        
    </style>
</head>
<body>

    <?php
    // Database connection parameters
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $database = "project";

    // Retrieving the subject code from the URL parameter
    if (isset($_GET['subject'])) {
        $subjectCode = $_GET['subject'];
    } else {
        $subjectCode = 'No Subject Code Available';
    }

    session_start();
    $current_user = $_SESSION['$current_user'];
    $_SESSION['subjectCode'] = $subjectCode;

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>

    <div class="fac_name">
        <h1>Course File</h1>
        Faculty Name: <?php echo $current_user; ?>
        <br>
        Subject Code: <?php echo $subjectCode; ?>
        <br>
    </div>

    <h1>Attendance Sheet - June 2023</h1>

    <?php

    // Fetch student data from the database
    $sql = "SELECT roll_no, name FROM students";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Roll Number</th><th>Name</th>";

        // Generate random working days for June 2023
        $days = range(1, 30); // Assuming June has 30 days
        shuffle($days);
        $workingDays = array_slice($days, 0, 10); // Selecting 10 random working days

        // Display column headers for the working days
        for ($day = 1; $day <= 30; $day++) {
            if (in_array($day, $workingDays)) {
                $date = date("d/m/Y", mktime(0, 0, 0, 6, $day, 2023));
                echo "<th>$date</th>";
            }
        }

        echo "</tr>";

        // Loop through each student
        while ($row = $result->fetch_assoc()) {
            $rollNumber = $row["roll_no"];
            $name = $row["name"];

            echo "<tr><td>$rollNumber</td><td>$name</td>";

            // Mark attendance for each working day
            for ($day = 1; $day <= 30; $day++) {
                if (in_array($day, $workingDays)) {
                    $attendance = (rand(0, 1) == 1) ? '1' : 'a';
                    $class = ($attendance == '1') ? 'present' : 'absent';
                    echo "<td class='$class'>$attendance</td>";
                }
            }

            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No students found.";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
