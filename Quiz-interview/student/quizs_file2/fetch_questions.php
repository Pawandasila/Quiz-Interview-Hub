<?php
// fetch_question.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Get the selected section ID from the AJAX request
$selectedSectionId = $_POST['sectionId'];

// Perform a query to get questions for the selected section
$result = mysqli_query($con, "SELECT * FROM questions WHERE section_id = $selectedSectionId");

// Generate HTML for the questions
$html = '';
$questionNumber = 1;
$totalQuestions = mysqli_num_rows($result);

while ($row = mysqli_fetch_array($result)) {
    $question = $row["question_text"];
    $optiona = $row["option1"];
    $optionb = $row["option2"];
    $optionc = $row["option3"];
    $optiond = $row["option4"];

    $html .= '<div class="quiz-number badge badge-dark">';
    $html .= $questionNumber . ' / ' . $totalQuestions;
    $html .= '</div>';
    $html .= '<div class="quiz-list-body" id="question' . $questionNumber . '">';
    $html .= '<div class="quiz-list alert alert-primary">';
    $html .= 'Q. <span>' . $question . '</span>';
    $html .= '</div>';
    $html .= '<div class="select rounded">';
    $html .= '<ul class="options list-group">';
    $html .= '<li class="component list-group-item">';
    $html .= '<input id="first' . $questionNumber . '" type="radio" value="1" name="quizOption"> ' . $optiona;
    $html .= '</li>';
    $html .= '<li class="component list-group-item">';
    $html .= '<input id="second' . $questionNumber . '" type="radio" value="2" name="quizOption"> ' . $optionb;
    $html .= '</li>';
    $html .= '<li class="component list-group-item">';
    $html .= '<input id="third' . $questionNumber . '" type="radio" value="3" name="quizOption"> ' . $optionc;
    $html .= '</li>';
    $html .= '<li class="component list-group-item">';
    $html .= '<input id="fourth' . $questionNumber . '" type="radio" value="4" name="quizOption"> ' . $optiond;
    $html .= '</li>';
    $html .= '</ul>';
    $html .= '</div>';
    $html .= '</div>';

    $questionNumber++;
}

echo $totalQuestions.$html;

// Add buttons for "Next" and "Previous"
if ($totalQuestions > 1) {
    echo '<div class="quiz-functions">';
    
    if ($questionNumber <= $totalQuestions) {
        echo '<button class="btn btn-secondary quiz-prev" disabled>&#x2190; Previous</button>';
    } else {
        echo '<button class="btn btn-secondary quiz-prev">&#x2190; Previous</button>';
    }

    if ($questionNumber <= $totalQuestions) {
        echo '<button class="btn btn-primary btn-3d" type="button" onclick="showNextSectionModal()">Next Section</button>';
    } else {
        echo '<button class="btn btn-primary btn-3d" type="button" onclick="showResult()">Submit</button>';
    }

    echo '<button class="btn btn-secondary quiz-next" disabled>&#x2192; Next</button>';
    echo '</div>';
}

?>

<!-- Add this JavaScript section below your PHP code -->
<script>
    $(document).ready(function () {
        let currentQuestion = 1;
        let totalQuestions = <?php echo $totalQuestions; ?>;

        function showQuestion(questionNumber) {
            let quizBodies = $('.quiz-list-body');

            quizBodies.each(function (index) {
                if (index + 1 === questionNumber) {
                    $(this).css('display', 'flex');
                } else {
                    $(this).css('display', 'none');
                }
            });
        }

        function updateNavigationButtons() {
            $('.quiz-prev').prop('disabled', currentQuestion === 1);
            $('.quiz-next').prop('disabled', currentQuestion === totalQuestions);

            if (currentQuestion == totalQuestions) {
                $('.btn-3d').css('display', 'block');
            } else {
                $('.btn-3d').css('display', 'none');
            }
        }

        $('.quiz-prev').on('click', function () {
            if (currentQuestion > 1) {
                currentQuestion--;
                $('.quiz-number').text(currentQuestion + ' / ' + totalQuestions);
                showQuestion(currentQuestion);
                updateNavigationButtons();
            }
        });

        $('.quiz-next').on('click', function () {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                $('.quiz-number').text(currentQuestion + ' / ' + totalQuestions);
                showQuestion(currentQuestion);
                updateNavigationButtons();
            }
        });

        let score = [0, 0, 0, 0, 0];
        let answer = [1, 2, 3, 2, 1];

        $('input[name="quizOption"]').on('click', function () {
            let selectedOptionValue = $(this).val();

            if (selectedOptionValue == answer[currentQuestion - 1]) {
                score[currentQuestion - 1] = 1;
                console.log('Correct!');
                console.log(score);
            } else {
                score[currentQuestion - 1] = 0;
                console.log('Incorrect!');
                console.log(score);
            }
        });

        function showResult() {
            let sums = score.reduce((a, b) => a + b, 0);
            $('.TotalScore').text(sums + ' / ' + totalQuestions);
            // Add logic to submit the quiz or show further actions
        }

        $(".btn-3d").on("click", showResult);

        showQuestion(currentQuestion);
        updateNavigationButtons();
    });

    function showNextSectionModal() {
        alert('Please Select Next Selection')
    }
</script>
