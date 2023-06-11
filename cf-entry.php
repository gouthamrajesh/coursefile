<?php
// Replace the placeholders with your database credentials
$host = 'localhost:3306';
$username = 'root';
$password = 'root';
$database = 'project';

// Establish a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Retrieve unique faculty names from the subjects table
$query = "SELECT DISTINCT faculty FROM subjects";
$result = mysqli_query($connection, $query);

// Check if there are any faculty names
if (mysqli_num_rows($result) > 0) {
    // Display the sign-in form with the fetched faculty names
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Teacher Sign-in</title>
    </head>
    <body>
        <h2>Teacher Sign-in</h2>
        <form action="course-file.php" method="post">
            <label for="faculty_name">Faculty Name:</label>
            <select name="faculty_name" required>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='".$row['subject_code']."'>".$row['subject_code']."</option>";
                }
                ?>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Sign In">
        </form>
    </body>
    </html>

    <?php
} else {
    echo "No faculty names found in the subjects table.";
}

// Remember to close the database connection if needed
mysqli_close($connection);
?>
