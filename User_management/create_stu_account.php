<?php
// Retrieve the form data
$student_number = $_POST['student_number'];
$name_with_initials = $_POST['name_with_initials'];
$preferred_name = $_POST['preferred_name'];
$specialization = $_POST['specialization'];
$current_gpa = $_POST['current_gpa'];
$qualifications = $_POST['qualifications'];
$achievements = $_POST['achievements'];
$extra_curricular_activities = $_POST['extra_curricular_activities'];
$linkedin_account = $_POST['linkedin_account'];

// Validate and sanitize the form data as needed

// Create a connection to the database
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "your_database_name"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the form data into the database table
$sql = "INSERT INTO student (student_number, name_with_initials, preferred_name, specialization, current_gpa, qualifications, achievements, extra_curricular_activities, linkedin_account)
        VALUES ('$student_number', '$name_with_initials', '$preferred_name', '$specialization', '$current_gpa', '$qualifications', '$achievements', '$extra_curricular_activities', '$linkedin_account')";

if ($conn->query($sql) === TRUE) {
    echo "Account created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
