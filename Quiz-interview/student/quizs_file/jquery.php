<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- full screen  -->

<script>
    let times = 0;

    document.getElementById('startTestButton').addEventListener('click', function() {

        function initializeFullScreen() {
            var elem = document.documentElement;
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) {
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                elem.msRequestFullscreen();
            }
        }
        initializeFullScreen();


        document.querySelector('.start-test-container').style.display = 'none';

        // Show the quiz container

        document.querySelector('.container-fluid').style.display = 'block';



        showQuestion(currentQuestion);
        updateNavigationButtons();


    });

    // right click disabled
    // document.addEventListener('contextmenu', function(event) {
    //     event.preventDefault();
    // });

    document.addEventListener('fullscreenchange', function(event) {
        if (!document.fullscreenElement) {
            // Display the warning modal
            // alert(times);
            times++;


            if (!document.fullscreenElement && times > 0) {
                // Display the warning modal
                if (times == 3) {
                    // Show the disqualification modal
                    $('#warningModal').modal('hide');
                    $('#disqualificationModal').modal('show');
                } else {
                    $('#warningModal').modal('show');
                }
            }

        }
    });
</script>

<!-- quiz jquery -->
<script>
    $(document).ready(function() {
        let currentQuestion = 1;
        // const totalQuestions = <?php echo $totalQuestions; ?>; // Adjust this as needed
        const totalQuestions = 5; // Adjust this as needed

        function updateHighlight() {
            document.querySelectorAll('.digit-box').forEach(box => {
                box.classList.remove('highlight');
            });
            document.querySelector('.digit-box[data-question="' + currentQuestion + '"]').classList.add('highlight');
        }

        function showQuestion(questionNumber) {
            $('.quiz-list-body').hide();
            $('#question' + questionNumber).show();
        }

        function updateNavigationButtons() {
            $('.quiz-prev').prop('disabled', currentQuestion === 1);
            $('.quiz-next').prop('disabled', currentQuestion === totalQuestions);
            if (currentQuestion === totalQuestions) {
                $('.btn-3d').show();
            } else {
                $('.btn-3d').hide();
            }
        }

        $('.quiz-prev').on('click', function() {
            if (currentQuestion > 1) {
                currentQuestion--;
                $('.quiz-number').text(currentQuestion + ' / ' + totalQuestions);
                showQuestion(currentQuestion);
                updateNavigationButtons();
                updateHighlight();
            }
        });

        $('.quiz-next').on('click', function() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                $('.quiz-number').text(currentQuestion + ' / ' + totalQuestions);
                showQuestion(currentQuestion);
                updateNavigationButtons();
                updateHighlight();
            }
        });

        document.querySelectorAll('.digit-box').forEach(box => {
            box.addEventListener('click', function() {
                currentQuestion = parseInt(this.getAttribute('data-question'));
                updateHighlight();
            });
        });

        updateHighlight();


        let score = [0, 0, 0, 0, 0];
        let answer = [1, 2, 3, 2, 1];

        $('input[name="quizOption"]').on('click', function() {
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
            let totalQuestions = 5;

            $('.quiz-list-body').each(function(index) {
                if (index + 1 === totalQuestions + 1) {
                    $(this).css('display', 'block');
                } else {
                    $(this).css('display', 'none');
                }
            });

            let sums = 0;
            for (let i = 0; i < totalQuestions; i++) {
                sums = sums + score[i];
            }

            $('.TotalScore').text(sums + '/' + totalQuestions);
        }

        $(".btn-3d").on("click", showResult);

        showQuestion(currentQuestion);
        updateNavigationButtons();
    });
</script>


<!-- uer webcam acess -->
<script>
    $(document).ready(function() {

        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    const videoElement = document.getElementById('webcamVideo');
                    videoElement.srcObject = stream;
                    videoElement.play();
                    console.log("object")

                    var warningCount = 0;

                    $(window).on("blur focus", function(e) {
                        var prevType = $(this).data("prevType");

                        if (prevType != e.type) {

                            switch (e.type) {
                                case "blur":
                                    warningCount++;

                                    if (warningCount >= 4) {
                                        $('#disqualificationModal').modal('show');
                                    } else {
                                        $('#warningModal').modal('show');
                                    }

                                    break;
                                case "focus":
                                    break;
                            }

                        }

                        $(this).data("prevType", e.type);
                    });

                    // Event listener for the exit button
                    $('#exit').on('click', function() {
                        // Hide the modal
                        $('#warningModal').modal('hide');
                    });

                })
                .catch(function(error) {
                    console.error('Error accessing webcam:', error);
                });
        } else {
            console.error('getUserMedia is not supported in this browser');
        }

    });
</script>
<script>
    $(document).ready(function() {
        var video = document.getElementById('webcamVideo');
        var stopBtn = document.getElementById('stopVideoBtn');

        stopBtn.addEventListener('click', function() {
            video.pause();
        });
    });
</script>

<script>
    // Function to handle the modal display
    function displayModal() {
        $('#warningModal').modal('show');
    }
</script>


<!-- select box dropdown menue -->
<script>
    function loadQuestions() {
        var selectedSectionId = $("#sectionSelect").val();

        // Perform an AJAX request to fetch questions for the selected section
        $.ajax({
            url: 'fetch_questions.php',
            type: 'POST',
            data: {
                sectionId: selectedSectionId
            },
            success: function(response) {
                var index = response.indexOf('<');

                // Extract the substring before '<' character
                var numberString = response.substring(0, index);

                // Convert the extracted string to a number
                var totalQuestions = parseInt(numberString);

                // Output the total questions to console for verification
                alert("Total Questions: " + totalQuestions);

                // Clear existing question numbers
                const questionNumbersContainer = $('.row.justify-content-center');
                questionNumbersContainer.empty();

                // Generate question numbers based on total questions
                for (let i = 1; i <= totalQuestions; i++) {
                    const questionNumberDiv = $('<div>', {
                        class: 'col-3 mb-4 ',
                        html: `<div class="question-number">${i}</div>`
                    });
                    questionNumbersContainer.append(questionNumberDiv);
                }

                // Update the quiz container with the fetched questions
                $('.quiz-container').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error loading questions. Please try again.');
            }
        });

        $(document).ready(function() {

            $('#next-btn').click(function() {
                let g = '';
                $(".card-body").empty();
                for (let index = 10; index < 21; index++) {
                    g += '<div class="digit-box warning">' + index + ' </div>';
                }
                $(".card-body").append(
                    g
                )
            });

            $('#previous-btn').click(function() {
                let g = '';
                $(".card-body").empty();
                for (let index = 1; index < 13; index++) {
                    g += '<div class="digit-box warning">' + index + ' </div>';
                }
                $(".card-body").append(g);
            });
        });
    }
</script>