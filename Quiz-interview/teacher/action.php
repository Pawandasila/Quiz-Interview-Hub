<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "quiz"; 

session_start();
// Create a database connection
$con = mysqli_connect($server, $username, $password, $database);

// Check if the connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['action']) && $_POST['action'] == 'insertdata') {
    // Retrieve data from the POST request
    $testName = $_POST['testName'];
    $CompanyName = $_POST['CompanyName'];
    $testType = $_POST['testType'];
    $startDateAndTime = $_POST['startDateAndTime'];
    $endDateAndTime = $_POST['endDateAndTime'];

    // Prepare your INSERT SQL query
    $sql = "INSERT INTO `main_test`(`test_name`, `company_name`, `start_date_time`, `end_date_time`, `test_type`) VALUES('$testName', '$CompanyName', '$startDateAndTime', '$endDateAndTime', '$testType')";

    // Execute the SQL query
    if (mysqli_query($con, $sql)) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }
    mysqli_close($con);
    exit(); // Exit the script after processing the request
}



?>

