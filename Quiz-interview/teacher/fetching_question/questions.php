<?php
if (isset($_GET['test_id'])) {
    // Data is coming from GET method, hide the form
    echo '<style>.form-initial { display: none; }</style>';
} else {
    // Data is not coming from GET method, show the form
    echo '<style>.testForm { display: block; }</style>';
}
?>

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

$testId = isset($_GET['test_id']) ? $_GET['test_id'] : null;
$testData = [];
$sectionsData = [];

if ($testId) {
    // Fetch test details
    $testQuery = "SELECT * FROM `main_test` WHERE `test_id` = $testId";
    $testResult = mysqli_query($con, $testQuery);
    if ($testResult) {
        $testData = mysqli_fetch_assoc($testResult);

        // Fetch sections and questions
        $sectionsQuery = "SELECT * FROM `sections` WHERE `test_id` = $testId";
        $sectionsResult = mysqli_query($con, $sectionsQuery);
        while ($section = mysqli_fetch_assoc($sectionsResult)) {
            $sectionId = $section['section_id'];
            $questionsQuery = "SELECT * FROM `questions` WHERE `section_id` = $sectionId";
            $questionsResult = mysqli_query($con, $questionsQuery);
            $section['questions'] = mysqli_fetch_all($questionsResult, MYSQLI_ASSOC);
            $sectionsData[] = $section;
        }
    }
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .section {
            margin-bottom: 20px;
        }

        .card-title {
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Test Details</h4>
                        <form id="testForm">
                            <input type="hidden" id="testId" value="<?php echo $testId; ?>">
                            <div class="form-group">
                                <label for="testName">Test Name:</label>
                                <input type="text" id="testName" name="testName" class="form-control" value="<?php echo isset($testData['test_name']) ? $testData['test_name'] : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="CompanyName">Company Name:</label>
                                <input type="text" id="CompanyName" name="CompanyName" class="form-control" value="<?php echo isset($testData['company_name']) ? $testData['company_name'] : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="testType">Test Type:</label>
                                <input type="text" id="testType" name="testType" class="form-control" value="<?php echo isset($testData['test_type']) ? $testData['test_type'] : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="startDateAndTime">Start Date and Time:</label>
                                <input type="datetime-local" id="startDateAndTime" name="startDateAndTime" class="form-control" value="<?php echo isset($testData['start_date_time']) ? str_replace(' ', 'T', $testData['start_date_time']) : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="endDateAndTime">End Date and Time:</label>
                                <input type="datetime-local" id="endDateAndTime" name="endDateAndTime" class="form-control" value="<?php echo isset($testData['end_date_time']) ? str_replace(' ', 'T', $testData['end_date_time']) : ''; ?>" required>
                            </div>

                            <div id="sections">
                                <?php foreach ($sectionsData as $section) : ?>
                                    <div class="section">
                                        <hr>
                                        <div class="form-group">
                                            <label>Section Name:</label>
                                            <input type="text" class="form-control section-name" name="sectionName[]" value="<?php echo $section['section_name']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Marks:</label>
                                            <input type="number" class="form-control section-marks" name="marks[]" value="<?php echo $section['marks']; ?>" required>
                                        </div>

                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Question</th>
                                                    <th>Option 1</th>
                                                    <th>Option 2</th>
                                                    <th>Option 3</th>
                                                    <th>Option 4</th>
                                                    <th>Correct Answer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($section['questions'] as $question) : ?>
                                                    <tr>
                                                        <td><input type="text" class="form-control question-text" name="questionText[]" value="<?php echo $question['question_text']; ?>" required></td>
                                                        <td><input type="text" class="form-control option1" name="option1[]" value="<?php echo $question['option1']; ?>" required></td>
                                                        <td><input type="text" class="form-control option2" name="option2[]" value="<?php echo $question['option2']; ?>" required></td>
                                                        <td><input type="text" class="form-control option3" name="option3[]" value="<?php echo $question['option3']; ?>" required></td>
                                                        <td><input type="text" class="form-control option4" name="option4[]" value="<?php echo $question['option4']; ?>" required></td>
                                                        <td><input type="text" class="form-control correct-answer" name="correctAnswer[]" value="<?php echo $question['correct_answer']; ?>" required></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="SubmitForm" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#SubmitForm").click(function(e) {
                e.preventDefault();

                var sections = [];
                $(".section").each(function() {
                    var sectionName = $(this).find(".section-name").val();
                    var marks = $(this).find(".section-marks").val();
                    var questions = [];
                    $(this).find("tbody tr").each(function() {
                        var questionText = $(this).find(".question-text").val();
                        var option1 = $(this).find(".option1").val();
                        var option2 = $(this).find(".option2").val();
                        var option3 = $(this).find(".option3").val();
                        var option4 = $(this).find(".option4").val();
                        var correctAnswer = $(this).find(".correct-answer").val();
                        questions.push({
                            questionText: questionText,
                            option1: option1,
                            option2: option2,
                            option3: option3,
                            option4: option4,
                            correctAnswer: correctAnswer
                        });
                    });
                    sections.push({
                        sectionName: sectionName,
                        marks: marks,
                        questions: questions
                    });
                });

                $.ajax({
                    url: "action.php",
                    type: "post",
                    data: {
                        action: 'insertdata',
                        testId: $("#testId").val(),
                        testName: $('#testName').val(),
                        CompanyName: $('#CompanyName').val(),
                        testType: $('#testType').val(),
                        startDateAndTime: $('#startDateAndTime').val(),
                        endDateAndTime: $('#endDateAndTime').val(),
                        sections: sections
                    },
                    success: function(response) {
                        location.reload();
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + ": " + errorThrown);
                    }
                });
            });
        });
    </script>

</body>

</html>