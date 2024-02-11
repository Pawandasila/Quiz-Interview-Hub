<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBurst Quiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-H66XGqNhV3XWY6o05yP6L4GDOfkCHsC7jOM24QbCw9PpRRxFUbvmPUiQZQ+YAxp7uzZSFdzMyS+DgDPHtliJKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-H66XGqNhV3XWY6o05yP6L4GDOfkCHsC7jOM24QbCw9PpRRxFUbvmPUiQZQ+YAxp7uzZSFdzMyS+DgDPHtliJKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
    <style>
        /* .quiz-container {
            padding: 1rem;
        } */

        @media (max-width: 768px) {
            .quiz-functions {
                flex-direction: column;
                align-items: center;
            }
        }

        .card {
            width: 100%;
            /* Adjust the width as needed */
            height: 320px;
            /* Adjust the height as needed */
            margin: 0 auto;
            /* Center the card */
            overflow: auto;
            /* Add overflow property if content exceeds the height */
        }

        .digit-box {
            /* Adjust the styling of the digit-box as needed */
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #ccc;
            margin: 10px;
            text-align: center;
            line-height: 50px;
        }

        .card-footer {
            text-align: center;
        }

        .warning {
            background-color: #ffcccc;
            /* Specify the warning background color */
            color: #cc0000;
            /* Specify the text color for warning */
            font-weight: bold;
            /* Optionally make the text bold for emphasis */
        }

        #webcamVideo {
            width: 100%;
            height: 100%;
            transform: scaleX(-1);
            /* Flip the video horizontally */
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-H66XGqNhV3XWY6o05yP6L4GDOfkCHsC7jOM24QbCw9PpRRxFUbvmPUiQZQ+YAxp7uzZSFdzMyS+DgDPHtliJKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-H66XGqNhV3XWY6o05yP6L4GDOfkCHsC7jOM24QbCw9PpRRxFUbvmPUiQZQ+YAxp7uzZSFdzMyS+DgDPHtliJKw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- start button  -->
    <div class="start-test-container" style="height: 100vh; display: none; flex-direction:column; justify-content: center; align-items: center;">
        <div class="important-points bg-light p-4 rounded">
            <h2 class="mb-3">Important Points</h2>
            <ul class="list-styled">
                <li>You have only two chances if you accidentally exit full screen mode.</li>
                <li>You also have two chances if you press any key on your keyboard.</li>
                <li>Right-click functionality is disabled.</li>
            </ul>
        </div>
        <button id="startTestButton" class="btn btn-primary mt-4 btn-lg">Start Test</button>
    </div>



    <div class="container-fluid" style="height: 100vh; ">
        <div class="row" style="height: 100%; padding: 12px;">

            <div class="col-md-9" style="display: flex;margin-top:3rem;flex-wrap: nowrap;flex-direction: column;">

                <div class="timer-alert badge warning text-center mb-3 rounded border border-danger" style="display: none;">
                    <p class="d-inline-block">Time is running out, please hurry up!</p>
                </div>

                <div class="quiz-container">
                    <?php
                    $result = mysqli_query($con, "SELECT * FROM questions");
                    $totalQuestions = mysqli_num_rows($result); // Get the total number of questions
                    $questionNumber = 1; // Initialize the question number

                    // Fetch the timestamp only once outside the loop
                    $timestamp = time(); // Adjust this based on your actual timestamp retrieval logic

                    while ($row = mysqli_fetch_array($result)) {
                        $question = $row["question_text"];
                        $optiona = $row["option1"];
                        $optionb = $row["option2"];
                        $optionc = $row["option3"];
                        $optiond = $row["option4"];
                        $correct_option = $row["correct_answer"];
                    ?>

                        <div class="quiz-number badge badge-dark">
                            <?php echo $questionNumber; ?> / <?php echo $totalQuestions; ?>
                        </div>

                        <div class="quiz-list-body" id="question<?php echo $questionNumber; ?>">
                            <div class="quiz-list alert alert-primary">
                                Q. <span><?php echo $question; ?></span>
                            </div>
                            <div class="select rounded">
                                <ul class="options list-group">
                                    <li class="component list-group-item">
                                        <input id="first<?php echo $questionNumber; ?>" type="radio" value="1" name="quizOption"> <?php echo $optiona; ?>
                                    </li>
                                    <li class="component list-group-item">
                                        <input id="second<?php echo $questionNumber; ?>" type="radio" value="2" name="quizOption"> <?php echo $optionb; ?>
                                    </li>
                                    <li class="component list-group-item">
                                        <input id="third<?php echo $questionNumber; ?>" type="radio" value="3" name="quizOption"> <?php echo $optionc; ?>
                                    </li>
                                    <li class="component list-group-item">
                                        <input id="fourth<?php echo $questionNumber; ?>" type="radio" value="4" name="quizOption"> <?php echo $optiond; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    <?php
                        $questionNumber++; // Increment the question number
                    }
                    ?>
                    <div class="quiz-functions">
                        <button class="btn btn-secondary quiz-prev" disabled>&#x2190; Previous</button>
                        <button class="btn btn-primary btn-3d" type="button" style="display: none;">SUBMIT</button>
                        <button class="btn btn-secondary quiz-next">&#x2192; Next</button>
                    </div>
                </div>


            </div>

            <!-- times up timer -->
            <?php
            include 'models/times-up.php'
            ?>
            <?php
            include 'models/warning.php'
            ?>

            <?php
            include 'models/disqualified.php'
            ?>


            <div class="col-md-3">
                <!-- Sidebar (3 columns) -->
                <div class="sidebar">
                    <div class="video-section">
                        <video id="webcamVideo" width="100%" height="100%" autoplay playsinline webkit-playsinline></video>

                    </div>
                    <div class="user-name" style="display: flex; justify-content: center; align-items: center;">
                        RavanjeetKaur
                    </div>
                    <div class="quiz-timer badge">
                        <span class="time"><?php echo date("H:i:s", $timestamp); ?></span>
                    </div>

                    <!-- <button id="stopVideoBtn" class="btn btn-danger">Stop Video</button> -->
                    <hr class="mt-4">

                    <?php
                    $selectResult = mysqli_query($con, "SELECT * FROM sections");
                    $sections = mysqli_fetch_all($selectResult, MYSQLI_ASSOC);
                    ?>
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="question-category text-center flex-row">
                            <h3>Sections</h3>
                            <div class="dropdown">
                                <select class="btn btn-info" id="sectionSelect" onchange="loadQuestions()">
                                    <option value="0">Select Section</option>
                                    <?php foreach ($sections as $section) : ?>
                                        <option value="<?php echo $section['section_id']; ?>"><?php echo $section['section_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="container">
                        <div class="row">
                            <!-- Single card with increased height and width -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        Category: DSA
                                    </div>
                                    <div class="card-body text-center" style="padding: 1px;">
                                        <!-- <div class="digit-box warning">1</div>
                                        <div class="digit-box warning">2</div>
                                        <div class="digit-box warning">3</div>
                                        <div class="digit-box warning">4</div>
                                        <div class="digit-box warning">5</div>
                                        <div class="digit-box warning">6</div>
                                        <div class="digit-box warning">7</div>
                                        <div class="digit-box warning">8</div>
                                        <div class="digit-box warning">9</div> -->
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <!-- Next and Previous buttons with icons -->
                                        <button class="btn btn-info" id="previous-btn">&#x2190; </button>
                                        <button class="btn btn-info">End Test</button>
                                        <button class="btn btn-info" id="next-btn"> &#x2192; </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 Modal -->
    <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="alert alert-danger">Warning: Right-click and key press are disabled!</p>
                </div>
            </div>
        </div>
    </div>



    <?php
    include "jquery.php";
    ?>
</body>

</html>