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

// Handle form submission
$successMessage = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $programOutcomes = array();
    for ($i = 1; $i <= 12; $i++) {
        $poID = 'po' . $i;
        $content = $_POST[$poID];
        $programOutcomes[] = "('$poID', '$content')";
    }

    if (!empty($programOutcomes)) {
        $values = implode(',', $programOutcomes);
        $sql = "INSERT INTO program_outcomes (id, content) VALUES $values";

        if (mysqli_query($conn, $sql)) {
            $successMessage = "Program outcomes stored successfully.";
        } else {
            $errorMessage = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/upload.css" type="text/css" />
    <link rel="stylesheet" href="../css/facu_prof.css" type="text/css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
    <title>Program Outcome</title>
</head>
<body>
    <div class="container">
        <h1>Course File</h1>
        <p class="fac_name">Faculty Name: <?php echo $current_user; ?></p>
        <p class="fac_name">Subject Code: <?php echo $subjectCode; ?></p>

        <form method="POST" action="">
            <h4>Program Outcome</h4>
            <?php for ($i = 1; $i <= 12; $i++) : ?>
                <?php $poID = 'po' . $i; ?>
                <label for="<?php echo $poID; ?>">PO<?php echo $i; ?>:</label>
                <input type="text" name="<?php echo $poID; ?>" id="<?php echo $poID; ?>" required>
            <?php endfor; ?>

            <input type="submit" value="Submit">
        </form>

        <?php if (!empty($successMessage)) : ?>
            <div class="success-message">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($errorMessage)) : ?>
            <div class="error-message">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
