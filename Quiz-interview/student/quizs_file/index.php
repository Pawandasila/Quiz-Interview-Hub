<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process quiz submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['quiz_completed'] = true;
    header('Location: result.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BrainBurst Quiz</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

        /* .digit-box {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #ccc;
            margin: 10px;
            text-align: center;
            line-height: 50px;
        } */

        .digit-box {
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: #ccc;
            margin: 10px;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }

        .highlight {
            background-color: yellow;
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
    <div class="container-fluid" style="height: 100vh;">
        <div class="row" style="height: 100%; padding: 12px;">
            <div class="col-md-9" style="display: flex; margin-top: 3rem; flex-wrap: nowrap; flex-direction: column;">
                <div class="timer-alert badge warning text-center mb-3 rounded border border-danger" style="display: none;">
                    <p class="d-inline-block">Time is running out, please hurry up!</p>
                </div>

                <div class="quiz-container">
                    <form id="quizForm" method="POST" action="">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM questions");
                        $totalQuestions = mysqli_num_rows($result);
                        $questionNumber = 1;

                        while ($row = mysqli_fetch_array($result)) {
                            $question = $row["question_text"];
                            $optiona = $row["option1"];
                            $optionb = $row["option2"];
                            $optionc = $row["option3"];
                            $optiond = $row["option4"];
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
                                            <input id="first<?php echo $questionNumber; ?>" type="radio" value="1" name="quizOption<?php echo $questionNumber; ?>"> <?php echo $optiona; ?>
                                        </li>
                                        <li class="component list-group-item">
                                            <input id="second<?php echo $questionNumber; ?>" type="radio" value="2" name="quizOption<?php echo $questionNumber; ?>"> <?php echo $optionb; ?>
                                        </li>
                                        <li class="component list-group-item">
                                            <input id="third<?php echo $questionNumber; ?>" type="radio" value="3" name="quizOption<?php echo $questionNumber; ?>"> <?php echo $optionc; ?>
                                        </li>
                                        <li class="component list-group-item">
                                            <input id="fourth<?php echo $questionNumber; ?>" type="radio" value="4" name="quizOption<?php echo $questionNumber; ?>"> <?php echo $optiond; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        <?php
                            $questionNumber++;
                        }
                        ?>
                        <div class="quiz-functions">
                            <button class="btn btn-secondary quiz-prev" type="button" disabled>&#x2190; Previous</button>

                            <button class="btn btn-primary btn-3d" type="submit">SUBMIT</button>

                            <button class="btn btn-secondary quiz-next" type="button">&#x2192; Next</button>
                        </div>
                    </form>
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
                    <button id="stopVideoBtn" class="btn btn-danger mt-3">Stop Video</button>

                    <div class="quiz-timer badge">
                        <span id="quiz-time">
                        </span>
                    </div>

                    <hr class="mt-4">

                    <?php
                    $selectResult = mysqli_query($con, "SELECT * FROM sections  ");
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
                                        <?php
                                        for ($i = 1; $i <= $totalQuestions; $i++) {
                                            echo '<div class="digit-box" data-question="' . $i . '">' . $i . '</div>';
                                        }
                                        ?>
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


    <?php
    include "jquery.php";
    ?>

    <script>
        $(document).ready(function() {
            // Variable to store the count
            // var warningCount = 0;

            // $(window).on("blur focus", function(e) {
            //     var prevType = $(this).data("prevType");

            //     if (prevType != e.type ) {

            //         switch (e.type) {
            //             case "blur":
            //                 warningCount++;

            //                 if (warningCount >= 4) {
            //                     $('#disqualificationModal').modal('show');
            //                 } else {
            //                     $('#warningModal').modal('show');
            //                 }

            //                 break;
            //             case "focus":
            //                 break;
            //         }

            //     }

            //     $(this).data("prevType", e.type);
            // });

            // // Event listener for the exit button
            // $('#exit').on('click', function() {
            //     // Hide the modal
            //     $('#warningModal').modal('hide');
            // });
        });
    </script>





    <script>
        var timeInSeconds = 120 * 60;
        var countdownInterval = setInterval(function() {
            var minutes = Math.floor(timeInSeconds / 60);
            var seconds = timeInSeconds % 60;

            // $("#time").text(minutes + "min " + seconds + "sec");
            var timestr = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

            document.querySelector('#quiz-time').innerText = timestr;

            if (timeInSeconds < 300) { // Less than 5 minutes
                $(".quiz-timer").addClass("badge-danger");
                $(".timer-alert").show();
            }

            if (timeInSeconds === 0) {
                clearInterval(countdownInterval);
                $('#timeUpModal').modal('show');
            } else {
                timeInSeconds--;
            }
        }, 1000);
    </script>
</body>

</html>