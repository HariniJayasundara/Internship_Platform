<?php

// Database connection file
// Database connection file
require_once('dimintern/db_connection.php');

// Retrieve the form data
$student_number = $_POST['student_number'];
$name_with_initials = $_POST['name_with_initials'];
$preferred_name = $_POST['preferred_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$specialization = $_POST['specialization'];
$current_gpa = $_POST['current_gpa'];
$qualifications = $_POST['qualifications'];
$achievements = $_POST['achievements'];
$extra_curricular_activities = $_POST['extra_curricular_activities'];
$linkedin_account = $_POST['linkedin_account'];


// Validate student number
$student_number = trim($student_number); // Remove leading/trailing whitespace
if (empty($student_number)) {
    die("Error: Student number is required.");
}

// Validate name with initials
$name_with_initials = trim($name_with_initials);
if (empty($name_with_initials)) {
    die("Error: Name with initials is required.");
}

// Validate preferred name
$preferred_name = trim($preferred_name);
if (empty($preferred_name)) {
    die("Error: Preferred name is required.");
}

// Validate email
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
    die("Error: Invalid email address.");
}

// Validate phone number
$phone_number = preg_replace('/\D/', '', $phone_number); // Remove non-digit characters
if (strlen($phone_number) !== 10) {
    die("Error: Phone number must have exactly 10 digits.");
}

// Validate specialization
$specialization = trim($specialization);
if (empty($specialization)) {
    die("Error: Specialization is required.");
}

// Validate current GPA
$current_gpa = filter_var($current_gpa, FILTER_VALIDATE_FLOAT);
if ($current_gpa === false) {
    die("Error: Invalid GPA.");
}

// Sanitize qualifications, achievements, extra-curricular activities, and LinkedIn account
$qualifications = trim($qualifications);
$achievements = trim($achievements);
$extra_curricular_activities = trim($extra_curricular_activities);
$linkedin_account = trim($linkedin_account);


// Insert the form data into the database table
$sql = "INSERT INTO student (student_number, name_with_initials, preferred_name, email, phone_number, specialization, current_gpa, qualifications, achievements, extra_curricular_activities, linkedin_account)
        VALUES ('$student_number', '$name_with_initials', '$preferred_name', '$email', '$phone_number', '$specialization', '$current_gpa', '$qualifications', '$achievements', '$extra_curricular_activities', '$linkedin_account')";

if ($conn->query($sql) === TRUE) {
    echo "Account created successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
