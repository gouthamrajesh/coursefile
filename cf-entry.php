<?php
session_start();
$current_user = $_SESSION['$current_user'];
$conn = mysqli_connect("localhost:3306", "root", "root", "project");

// Retrieve the subjects assigned to the current user
$sql = "SELECT * FROM subjects WHERE faculty = '$current_user'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="./css/facu_prof.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .fac_name {
            margin-top: 20px;
            text-align: center;
            font-size: 24px;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-submit {
            text-align: center;
        }

        .form-submit button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-submit button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="fac_name">
        <br>
        Faculty Name: <?php echo $current_user; ?>
    </div>

    <div class="form-container">
        <h2>Subject Filtration</h2>
        <form action="course-file.php" method="GET">
            <div class="form-group">
                <label for="subject">Choose Subject:</label>
                <select name="subject" id="subject">
                    <?php
                    // Populate the select options with subjects assigned to the current faculty
                    $_SESSION['$current_subcode'] = $subject_code;

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["subject_code"] . "'>" . $row["subject_code"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-submit">
                <button type="submit">Proceed to Course File</button>
            </div>
        </form>
    </div>

    <!-- Other HTML content and scripts go here -->
</body>
</html>
