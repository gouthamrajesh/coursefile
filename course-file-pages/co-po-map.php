<?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $dbname = "project";

    // Retrieving the subject code from the URL parameter
    if (isset($_GET['subject'])) {
        $subjectCode = $_GET['subject'];
    } else {
        $subjectCode = 'No Subject Code Available';
    }

    session_start();
    $current_user = $_SESSION['$current_user'];
    $_SESSION['subjectCode'] = $subjectCode;

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $successMessage = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $coIds = array("co1", "co2", "co3", "co4", "co5");
        $poIds = array("po1", "po2", "po3", "po4", "po5", "po6", "po7", "po8", "po9", "po10", "po11", "po12");

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        foreach ($_POST['cell'] as $row => $rowData) {
            $coId = $coIds[$row - 2];

            foreach ($rowData as $col => $cellValue) {
                $poId = $poIds[$col - 2];
                $level = $cellValue;

                $sql = "INSERT INTO co_po_mapping (co_id, po_id, level) VALUES ('$coId', '$poId', '$level')";
                $conn->query($sql);
            }
        }

        $successMessage = "Data added successfully.";

        $conn->close();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>CO - PO Mapping</title>
    <link rel="stylesheet" href="../css/facu_prof.css" type="text/css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .fac_name {
            text-align: center;
            margin: 20px;
        }

        .fac_name h1 {
            margin-bottom: 10px;
        }

        .container {
            max-width: 100%;
            overflow-x: auto;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            white-space: nowrap;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: lightgray;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .success-message {
            color: green;
            margin-top: 10px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            margin-left: 30px;
            margin-bottom: 30px;
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

        a
        {
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="fac_name">
    <h1>Course File</h1>
    Faculty Name: <?php echo $current_user; ?>
    <br>
    Subject Code: <?php echo $subjectCode; ?>
    <br>
    <h4>Course Outcome - Program Outcome Mapping</h4>
</div>

<div class="container">
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
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php if (!empty($successMessage)): ?>
        <p class="success-message"><?php echo $successMessage; ?></p>
    <?php endif; ?>
</div>

<br><br>
    <button type="submit"><a href="../course-file.php?subject=<?php echo urlencode($subjectCode); ?>">Back to Home</a></button>
</body>
</html>
