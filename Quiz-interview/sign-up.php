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
    $logpass = password_hash($_POST['logpass'], PASSWORD_DEFAULT);
    $logrepass = $_POST['logrepass'];
    $phoneNum = $_POST['phoneNum'];

    // Check if passwords match
    if ($_POST['logpass'] !== $logrepass) {
        echo "<script>alert('Passwords do not match');</script>";
        exit();
    }


    // Insert user data into database
    
    $sql = "INSERT INTO users (`firstname`, `username`, `college`, `course`, `branch`, `semester`, `dob`, `password`, `reg_date`, `Phone`)
            VALUES ('$firstname', '$logusername', '$college', '$course', '$branch', '$semester', '$dob', '$logpass',NOW() , $phoneNum)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
        header("Location: authen.php"); 

    } else {
        echo "<script>console.log('Error: " . $sql . "');</script>";
        echo $conn->error; 
    }
}

$conn->close();
