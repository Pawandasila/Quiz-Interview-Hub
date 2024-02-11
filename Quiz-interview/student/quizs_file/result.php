<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            scroll-behavior: smooth;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .option {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .option:hover {
            background-color: #f0f0f0;
        }

        .option-selected {
            background-color: #e9ecef !important;
        }

        .correct-answer {
            display: none;
            font-style: italic;
            color: #28a745;
        }

        .icon {
            font-size: 1.2em;
            margin-right: 5px;
        }

        .correct-icon {
            color: #28a745;
            display: none;
        }
    </style>
</head>

<body class="d-flex justify-content-around">

    

    <div class="container">

        <div class="alert alert-primary mt-4" role="alert">
            <h4 class="alert-heading text-center">Text here </h4>
            <hr>
            <div class="row justify-content-center"> <!-- Center the table horizontally -->
                <div class="col-md-12">
                    <table class="text-center table table-hover table-borderless table-primary">
                        <!-- Added table-borderless class -->
                        <tbody>
                            <tr>
                                <th scope="row">Name</th>
                                <td class="p-3">John Doe</td> <!-- Added padding -->
                            </tr>
                            <tr>
                                <th scope="row">Student ID</th>
                                <td class="p-3">123456</td> <!-- Added padding -->
                            </tr>
                            <tr>
                                <th scope="row">Course</th>
                                <td class="p-3">Computer Science</td> <!-- Added padding -->
                            </tr>
                            <tr>
                                <th scope="row">Exam Date</th>
                                <td class="p-3">January 28, 2024</td> <!-- Added padding -->
                            </tr>
                            <tr>
                                <th scope="row">Score</th>
                                <td class="p-3">67%</td> <!-- Added padding -->
                            </tr>
                            <tr>
                                <th scope="row">Grade</th>
                                <td class="p-3">B</td> <!-- Added padding -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Test Details
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Test Result</h5>
                                <p class="card-text"><i class="fas fa-check-circle"></i> Passed</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Questions</h5>
                                <p class="card-text"><i class="fas fa-list"></i> 10</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 bg-info text-white">
                            <div class="card-body">
                                <h5 class="card-title">Questions Attempted</h5>
                                <p class="card-text"><i class="fas fa-check"></i> 8</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Questions Skipped</h5>
                                <p class="card-text"><i class="fas fa-times"></i> 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Correct Questions</h5>
                                <p class="card-text"><i class="fas fa-check"></i> 7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 bg-danger text-white">
                            <div class="card-body">
                                <h5 class="card-title">Wrong Questions</h5>
                                <p class="card-text"><i class="fas fa-times"></i> 1</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 bg-warning text-dark">
                            <div class="card-body">
                                <h5 class="card-title">Disqualified</h5>
                                <p class="card-text"><i class="fas fa-exclamation-triangle"></i> 0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="card">
            <div class="card-header">
                Questions
            </div>
            <div class="card-body">
                <!-- Question 1 -->
                <div class="question mb-4" data-question="1">
                    <p class="fw-bold">1. What is the capital of France?</p>
                    <div class="options">
                        <p class="option option-selected" data-option="A">A. London</p>
                        <p class="option" data-option="B">B. Berlin</p>
                        <p class="option" data-option="C">C. Paris (Correct Answer)</p>
                        <p class="option" data-option="D">D. Madrid</p>
                    </div>
                    <p class="correct-answer">Correct Answer: C. Paris</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 2 -->
                <div class="question mb-4" data-question="2">
                    <p class="fw-bold">2. Who wrote "Romeo and Juliet"?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. William Shakespeare (Correct Answer)</p>
                        <p class="option option-selected" data-option="B">B. Charles Dickens</p>
                        <p class="option" data-option="C">C. Jane Austen</p>
                        <p class="option" data-option="D">D. F. Scott Fitzgerald</p>
                    </div>
                    <p class="correct-answer">Correct Answer: A. William Shakespeare</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 3 -->
                <div class="question mb-4" data-question="3">
                    <p class="fw-bold">3. Which planet is known as the Red Planet?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. Venus</p>
                        <p class="option option-selected" data-option="B">B. Mars (Correct Answer)</p>
                        <p class="option" data-option="C">C. Jupiter</p>
                        <p class="option" data-option="D">D. Saturn</p>
                    </div>
                    <p class="correct-answer">Correct Answer: B. Mars</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 4 -->
                <div class="question mb-4" data-question="4">
                    <p class="fw-bold">4. What is the chemical symbol for water?</p>
                    <div class="options">
                        <p class="option option-selected" data-option="A">A. H2O (Correct Answer)</p>
                        <p class="option" data-option="B">B. CO2</p>
                        <p class="option" data-option="C">C. O2</p>
                        <p class="option" data-option="D">D. NaCl</p>
                    </div>
                    <p class="correct-answer">Correct Answer: A. H2O</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 5 -->
                <div class="question mb-4" data-question="5">
                    <p class="fw-bold">5. Who painted the Mona Lisa?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. Pablo Picasso</p>
                        <p class="option option-selected" data-option="B">B. Leonardo da Vinci (Correct Answer)</p>
                        <p class="option" data-option="C">C. Vincent van Gogh</p>
                        <p class="option" data-option="D">D. Michelangelo</p>
                    </div>
                    <p class="correct-answer">Correct Answer: B. Leonardo da Vinci</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 6 -->
                <div class="question mb-4" data-question="6">
                    <p class="fw-bold">6. What is the tallest mountain in the world?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. Mount Kilimanjaro</p>
                        <p class="option option-selected" data-option="B">B. Mount Everest (Correct Answer)</p>
                        <p class="option" data-option="C">C. Mount Fuji</p>
                        <p class="option" data-option="D">D. K2</p>
                    </div>
                    <p class="correct-answer">Correct Answer: B. Mount Everest</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 7 -->
                <div class="question mb-4" data-question="7">
                    <p class="fw-bold">7. What is the largest ocean on Earth?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. Indian Ocean</p>
                        <p class="option" data-option="B">B. Atlantic Ocean</p>
                        <p class="option" data-option="C">C. Arctic Ocean</p>
                        <p class="option option-selected" data-option="D">D. Pacific Ocean (Correct Answer)</p>
                    </div>
                    <p class="correct-answer">Correct Answer: D. Pacific Ocean</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 8 -->
                <div class="question mb-4" data-question="8">
                    <p class="fw-bold">8. Which country is famous for kangaroos?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. South Africa</p>
                        <p class="option" data-option="B">B. New Zealand</p>
                        <p class="option option-selected" data-option="C">C. Australia (Correct Answer)</p>
                        <p class="option" data-option="D">D. Brazil</p>
                    </div>
                    <p class="correct-answer">Correct Answer: C. Australia</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 9 -->
                <div class="question mb-4" data-question="9">
                    <p class="fw-bold">9. Who developed the theory of relativity?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. Isaac Newton</p>
                        <p class="option option-selected" data-option="B">B. Albert Einstein (Correct Answer)</p>
                        <p class="option" data-option="C">C. Galileo Galilei</p>
                        <p class="option" data-option="D">D. Nikola Tesla</p>
                    </div>
                    <p class="correct-answer">Correct Answer: B. Albert Einstein</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

                <!-- Question 10 -->
                <div class="question mb-4" data-question="10">
                    <p class="fw-bold">10. Which gas do plants absorb for photosynthesis?</p>
                    <div class="options">
                        <p class="option" data-option="A">A. Oxygen</p>
                        <p class="option option-selected" data-option="B">B. Carbon dioxide (Correct Answer)</p>
                        <p class="option" data-option="C">C. Nitrogen</p>
                        <p class="option" data-option="D">D. Hydrogen</p>
                    </div>
                    <p class="correct-answer">Correct Answer: B. Carbon dioxide</p>
                    <span class="icon correct-icon"><i class="fas fa-check-circle"></i></span>
                </div>
                <hr>

            </div>
        </div>




    </div>





    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JavaScript for functionality -->
    <script>
        $(document).ready(function () {
            // Animate the correct answers
            $('.correct-icon').fadeIn(1500);

            // Add a pulsating effect to the correct answers
            $('.correct-icon').css('animation', 'pulse 1s infinite');

            // Define a custom animation for pulsating effect
            /* Keyframes definition */
            var keyframes = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.1); }
                100% { transform: scale(1); }
            }
        `;

            // Append the keyframes to the head of the document
            $('icon').append('<style>' + keyframes + '</style>');
        });
    </script>
</body>

</html>