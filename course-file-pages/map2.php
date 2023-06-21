<!DOCTYPE html>
<html>
<head>
    <title>CO-PO Mapping</title>
    <style>
        /* CSS Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1160px;
            margin: 0 auto;
            padding: 20px;
        }

        .fac_name {
            text-align: center;
            margin-bottom: 20px;
        }

        h1, h4 {
            margin: 0;
        }

        .table-container {
            overflow: auto;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            white-space: nowrap;
        }

        th {
            background-color: lightgray;
        }

        .submit-container {
            background-color: #337ab7;
            color: white;
            padding: 10px;
            text-align: center;
        }

        input[type="number"] {
            width: 70px;
            height: 25px;
            border: 1px solid #ccc;
            padding: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php
    // Establish database connection
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

    <div class="container">
        <div class="fac_name">
            <h1>Course File</h1>
            <p>Faculty Name: <?php echo $current_user; ?></p>
            <p>Subject Code: <?php echo $subjectCode; ?></p>
            <h4>Course Outcome - Program Outcome Mapping</h4>
        </div>

        <div class="table-container">
            <form method="POST">
                <table>
                    <tr>
                        <th></th>
                        <?php
                        for ($col = 1; $col <= 12; $col++) {
                            echo "<th>PO" . $col . "</th>";
                        }
                        ?>
                    </tr>
                    <?php
                    $coIds = array("CO1", "CO2", "CO3", "CO4", "CO5");
                    for ($row = 2; $row <= 6; $row++) {
                        echo "<tr>";
                        echo "<th>" . $coIds[$row - 2] . "</th>";
                        for ($col = 2; $col <= 13; $col++) {
                            echo "<td><input type='number' name='cell[$row][$col]'></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
                <div class="submit-container">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Database connection code here

        foreach ($_POST['cell'] as $row => $rowData) {
            // Insert data into the database here
        }

        // Close database connection here
    }
    ?>
</body>
</html>
