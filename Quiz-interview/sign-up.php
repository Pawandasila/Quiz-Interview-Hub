<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $logusername = $_POST['logusername'];
    $college = $_POST['college'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $dob = $_POST['dob'];
    $logpass = password_hash($_POST['logpass'], PASSWORD_DEFAULT); // Hash the password
    $logrepass = $_POST['logrepass'];
    $image = $_POST['image'];

    // Check if passwords match
    if ($_POST['logpass'] !== $logrepass) {
        echo "Passwords do not match.";
        exit();
    }

    // Upload image to server
    $upload_dir = "uploads/";
    $image_parts = explode(";base64,", $image);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $file_name = uniqid() . '.' . $image_type;
    $file = $upload_dir . $file_name;
    file_put_contents($file, $image_base64);

    // Insert user data into database
    $sql = "INSERT INTO users (firstname, username, college, course, branch, semester, dob, password, profile_picture, reg_date)
            VALUES ('$firstname', '$logusername', '$college', '$course', '$branch', '$semester', '$dob', '$logpass', '$file', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
