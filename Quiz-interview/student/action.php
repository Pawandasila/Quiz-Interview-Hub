<?php
// Include the database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {


    if ($_POST['action'] == 'setInterviewDetails') {
        // Retrieve data from the POST request
        $interviewerType = $_POST['interviewerType'];
        $interviewerName = $_POST['interviewerName'];
        $name = $_POST['name'];
        $course = $_POST['course'];
        $branch = $_POST['branch'];
        $company_name = $_POST['companyAvailable'];
        $interviewRole = $_POST['interviewRole'];
        $interviewDateTime = $_POST['interviewDateTime'];
        $admin_status = "pending";
        $payment_status = "pending";

        // Construct SQL query based on interviewer type

        if ($interviewerType == "HR") {
            $sql = "INSERT INTO interview_details (hr_name, course, branch, interview_name, date_and_time, payment_status, company_name, admin_status)
                VALUES ('$interviewerName', '$course', '$branch', '$interviewRole', '$interviewDateTime', '$payment_status', '$company_name', '$admin_status')";
        } else {
            $sql = "INSERT INTO interview_details (teacher_name, course, branch, interview_name, date_and_time, payment_status, company_name, admin_status)
                VALUES ('$interviewerName', '$course', '$branch', '$interviewRole', '$interviewDateTime', '$payment_status', '$company_name', '$admin_status')";
        }

        if ($con->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
        
    } else {
        echo "Invalid action!";
    }
} else {
    echo "Invalid request!";
}

// Close the database connection
mysqli_close($con);
