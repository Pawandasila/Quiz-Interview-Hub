<?php
    $test_id = $_GET['test_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructions</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-vkEHtRiIaV0Kt//2a7uSizmwFzPrdI1zI6lEo0cbD7xaP5vNkPcLDG2a6sRr0JkN" crossorigin="anonymous">
    <style>
        .indicator {
            width: 20px;
            height: 20px;
            display: inline-block;
            margin-right: 10px;
            border-radius: 50%;
        }

        .attempted {
            background-color: blue;
        }

        .not-attempted {
            background-color: red;
        }

        .instructions-list {
            padding-left: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        i{
            margin-right: 5px;
        }
    </style>
</head>

<body class="container mt-5 list-group-flush">

    <h2 class="mb-4">Instructions</h2>
    <p>Follow the instructions below:</p>

    <ol class="instructions-list">
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Read each question carefully before answering.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Attempt all questions to the best of your knowledge.</li>
        <!-- <li class="list-group-item list-group-item-success mb-2">Use the provided color indicators to track your progress: -->
        <li class="list-group-item s mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Use the provided color indicators to track your progress:
            <br>
            &emsp;
            <span class="indicator attempted"></span> Attempted
            <span class="indicator not-attempted"></span> Not Attempted
            <!-- Add more indicators as needed -->
        </li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Keep an eye on the timer to manage your time effectively.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Review your answers before submitting the test.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Use a quiet and well-lit environment for better focus.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>If unsure about an answer, make an educated guess.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Double-check your answers for accuracy and completeness.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Ensure you have the necessary materials (pen, paper, calculator, etc.) before starting.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Avoid any distractions and focus solely on the test questions.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Read any provided passage or question context thoroughly.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Use the navigation buttons to move between questions easily.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Answer the questions in the order that you find most comfortable.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Monitor the time remaining and allocate it wisely across all questions.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Do not leave any question unanswered; make an attempt even if unsure.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Submit your answers before the test deadline if applicable.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Keep a positive mindset and stay calm throughout the test.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Click "Start Test" when you are ready to begin.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Click "Quit Test" if you need to exit the test prematurely.</li>
        <li class="list-group-item  mb-2"><i class="fa-solid fa-book-open" style="color: #489da8;"></i>Good luck!</li>
    </ol>

    <!-- Start and Quit Buttons -->
    <div class="button-container">
        <a class="btn btn-primary" href="./quizs_file/index.php?test_id=<?php echo $test_id ?>" onclick="startTest()">Start Test</a>
        <a class="btn btn-danger" href="./index.php" onclick="quitTest()">Quit Test</a>
    </div>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to handle the start test button click
        function startTest() {
            alert('test is starting please give it seriously!');
            // Add any additional logic for starting the test
        }

        // Function to handle the quit test button click
        function quitTest() {
            alert("Test is quiting!");
            // Add any additional logic for quitting the test
        }
    </script>
    <script src="https://kit.fontawesome.com/603603feae.js" crossorigin="anonymous"></script>

</body>

</html>
