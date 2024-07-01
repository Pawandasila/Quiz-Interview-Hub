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
    $testId = $_POST['testId'];
    $testName = $_POST['testName'];
    $CompanyName = $_POST['CompanyName'];
    $testType = $_POST['testType'];
    $startDateAndTime = $_POST['startDateAndTime'];
    $endDateAndTime = $_POST['endDateAndTime'];
    $sections = $_POST['sections'];

    if ($testId) {
        // Update existing test
        $sql = "UPDATE `main_test` SET `test_name`='$testName', `company_name`='$CompanyName', `start_date_time`='$startDateAndTime', `end_date_time`='$endDateAndTime', `test_type`='$testType' WHERE `test_id`=$testId";
        mysqli_query($con, $sql);

        // Update sections and questions
        foreach ($sections as $section) {
            $sectionId = $section['section_id'];
            $sectionName = $section['sectionName'];
            $marks = $section['marks'];
            $sql = "UPDATE `sections` SET `section_name`='$sectionName', `marks`='$marks' WHERE `section_id`=$sectionId AND `test_id`=$testId";
            mysqli_query($con, $sql);

            foreach ($section['questions'] as $question) {
                $questionId = $question['question_id'];
                $questionText = $question['questionText'];
                $option1 = $question['option1'];
                $option2 = $question['option2'];
                $option3 = $question['option3'];
                $option4 = $question['option4'];
                $correctAnswer = $question['correctAnswer'];
                $sql = "UPDATE `questions` SET `question_text`='$questionText', `option1`='$option1', `option2`='$option2', `option3`='$option3', `option4`='$option4', `correct_answer`='$correctAnswer' WHERE `question_id`=$questionId AND `section_id`=$sectionId";
                mysqli_query($con, $sql);
            }
        }
    } else {
        // Insert new test
        $sql = "INSERT INTO `main_test`(`test_name`, `company_name`, `start_date_time`, `end_date_time`, `test_type`) VALUES('$testName', '$CompanyName', '$startDateAndTime', '$endDateAndTime', '$testType')";
        mysqli_query($con, $sql);
        $testId = mysqli_insert_id($con);

        // Insert sections and questions
        foreach ($sections as $section) {
            $sectionName = $section['sectionName'];
            $marks = $section['marks'];
            $sql = "INSERT INTO `sections`(`test_id`, `section_name`, `marks`) VALUES('$testId', '$sectionName', '$marks')";
            mysqli_query($con, $sql);
            $sectionId = mysqli_insert_id($con);

            foreach ($section['questions'] as $question) {
                $questionText = $question['questionText'];
                $option1 = $question['option1'];
                $option2 = $question['option2'];
                $option3 = $question['option3'];
                $option4 = $question['option4'];
                $correctAnswer = $question['correctAnswer'];
                $sql = "INSERT INTO `questions`(`section_id`, `question_text`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES('$sectionId', '$questionText', '$option1', '$option2', '$option3', '$option4', '$correctAnswer')";
                mysqli_query($con, $sql);
            }
        }
    }

    if (mysqli_affected_rows($con) > 0) {
        echo "1"; // Success
    } else {
        echo "0"; // Error
    }
    mysqli_close($con);
    exit();
}
?>


<?php
if (isset($_POST['action']) && $_POST['action'] == 'handleAction') {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $action = $_POST['action_taken'];
        $meeting_link = $_POST['meeting_link'];

        if ($action == 'accept') {
            $sql = "UPDATE interview_details SET admin_status = 'Done', meeting_link = '$meeting_link' WHERE id = $id";

            if ($con->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Error updating record: " . $con->error;
            }
        } elseif ($action == 'reject') {
            
            $sql = "DELETE FROM interview_details WHERE id = $id";

            if ($con->query($sql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $con->error;
            }
        }
    }
    mysqli_close($con);
    exit();
}
?>
