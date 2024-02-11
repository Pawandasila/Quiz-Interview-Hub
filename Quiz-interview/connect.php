<?php
$servername = "localhost"; // Replace with your database host (e.g., "localhost")
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "quiz"; // Replace with your database name

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";

mysqli_close($con);
?>
