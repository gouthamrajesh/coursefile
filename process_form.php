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

// Get the form data
$facultyName = $_POST['faculty_name'];
$subjectCode = $_POST['subject_code'];
$semesterNumber = $_POST['semester_number'];

// Prepare and bind the INSERT statement
$query = "INSERT INTO subjects (faculty_name, subject_code, semester_number) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $facultyName, $subjectCode, $semesterNumber);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Subject code '$subjectCode' for semester $semesterNumber was successfully inserted for faculty $facultyName.";
} else {
    echo "Error inserting subject code: " . $stmt->error;
}

// Close the prepared statement and database connection
$stmt->close();
$conn->close();
?>
