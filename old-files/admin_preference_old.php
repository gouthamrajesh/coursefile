<?php
// Assuming you have already established a database connection
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your database credentials
$host = 'localhost:3306';
$username = 'root';
$password = 'root';
$database = 'project';

$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the names of faculties from the 'faculty' table
$query = "SELECT name FROM faculty";
$result = $conn->query($query);

// Check if there are any faculties in the database
if ($result->num_rows > 0) {
    echo "<h1>List of Faculties</h1>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['name'] . "</li>";
        echo "<form method='POST' action='process_form.php'>";
        echo "<input type='hidden' name='faculty_name' value='" . $row['name'] . "'>";
        echo "Subject Code: <input type='text' name='subject_code'><br>";
        echo "Semester Number: <input type='number' name='semester_number'><br>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
    echo "</ul>";
} else {
    echo "No faculties found in the database.";
}

// Close the database connection
$conn->close();
?>