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



<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card table-responsive">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Test Details</h4>
                    <form id="testForm" class="row g-3">
                        <input type="hidden" id="testId" value="<?php echo $testId; ?>">
                        <div class="col-md-4">
                            <label for="testName" class="form-label">Test Name:</label>
                            <input type="text" id="testName" name="testName" class="form-control" value="<?php echo isset($testData['test_name']) ? $testData['test_name'] : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="CompanyName" class="form-label">Company Name:</label>
                            <input type="text" id="CompanyName" name="CompanyName" class="form-control" value="<?php echo isset($testData['company_name']) ? $testData['company_name'] : ''; ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="testType" class="form-label">Test Type:</label>
                            <input type="text" id="testType" name="testType" class="form-control" value="<?php echo isset($testData['test_type']) ? $testData['test_type'] : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="startDateAndTime" class="form-label">Start Date and Time:</label>
                            <input type="datetime-local" id="startDateAndTime" name="startDateAndTime" class="form-control" value="<?php echo isset($testData['start_date_time']) ? str_replace(' ', 'T', $testData['start_date_time']) : ''; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="endDateAndTime" class="form-label">End Date and Time:</label>
                            <input type="datetime-local" id="endDateAndTime" name="endDateAndTime" class="form-control" value="<?php echo isset($testData['end_date_time']) ? str_replace(' ', 'T', $testData['end_date_time']) : ''; ?>" required>
                        </div>

                        <div id="sections" class="col-md-12">
                            <?php foreach ($sectionsData as $section) : ?>
                                <hr>
                                <div class="section mb-4 p-3 bg-light rounded">
                                    <label class="form-label">Section Name:</label>
                                    <input type="text" class="section-name form-control" name="sectionName[]" value="<?php echo $section['section_name']; ?>" required>
                                    <label class="form-label">Marks:</label>
                                    <input type="number" class="section-marks form-control" name="marks[]" value="<?php echo $section['marks']; ?>" required>

                                    <table class="table table-bordered mt-3">
                                        <thead class="table-dark">
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
                                                    <td><input type="text" class="question-text form-control" name="questionText[]" value="<?php echo $question['question_text']; ?>" required></td>
                                                    <td><input type="text" class="option1 form-control" name="option1[]" value="<?php echo $question['option1']; ?>" required></td>
                                                    <td><input type="text" class="option2 form-control" name="option2[]" value="<?php echo $question['option2']; ?>" required></td>
                                                    <td><input type="text" class="option3 form-control" name="option3[]" value="<?php echo $question['option3']; ?>" required></td>
                                                    <td><input type="text" class="option4 form-control" name="option4[]" value="<?php echo $question['option4']; ?>" required></td>
                                                    <td><input type="text" class="correct-answer form-control" name="correctAnswer[]" value="<?php echo $question['correct_answer']; ?>" required></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="col-12">
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