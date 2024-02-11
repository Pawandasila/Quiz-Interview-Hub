<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- full screen  -->

<script>
    let times = 0;

    // document.getElementById('startTestButton').addEventListener('click', function() {
    //     var elem = document.documentElement;
    //     if (elem.requestFullscreen) {
    //         elem.requestFullscreen();
    //     } else if (elem.webkitRequestFullscreen) {
    //         /* Safari */
    //         elem.webkitRequestFullscreen();
    //     } else if (elem.msRequestFullscreen) {
    //         /* IE11 */
    //         elem.msRequestFullscreen();
    //     }

    // document.querySelector('.start-test-container').style.display = 'none';
    // Show the quiz container
    // document.querySelector('.container-fluid').style.display = 'block';

    // $(document).ready(function() {
    //     var timeInSeconds = 5.1 * 60; // 5 minutes in seconds

    //     var countdownInterval = setInterval(function() {
    //         var hours = Math.floor(timeInSeconds / 3600);
    //         var minutes = Math.floor((timeInSeconds % 3600) / 60);
    //         var seconds = timeInSeconds % 60;

    //         $(".time").html(hours + "hr " + minutes + "min " + seconds + "sec");

    //         // Check if the time is less than 5 minutes (300 seconds)
    //         if (timeInSeconds < 300) {
    //             // Change the background color to red
    //             $(".quiz-timer").addClass("badge-danger");
    //             $(".timer-alert").show(); // Display the alert div
    //         }


    //         if (timeInSeconds === 0) {
    //             clearInterval(countdownInterval);
    //             // Open the Bootstrap modal when the time is up
    //             $('#timeUpModal').modal('show');
    //         } else {
    //             timeInSeconds--;
    //         }
    //     }, 1000);
    // });
    // });
    // document.addEventListener('contextmenu', function(event) {
    // event.preventDefault();
    // });

    document.addEventListener('fullscreenchange', function(event) {
        if (!document.fullscreenElement) {
            // Display the warning modal
            // alert(times);
            times++;
            if (!document.fullscreenElement && times > 0) {
                // Display the warning modal
                if (times == 2) {
                    // Show the disqualification modal
                    $('#warningModal').modal('hide');
                    $('#disqualificationModal').modal('show');
                } else {
                    $('#warningModal').modal('show');
                }
            }

        }
    });

    document.getElementById('retryFullScreen').addEventListener('click', function() {
        var elem = document.documentElement;
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) {
            /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) {
            /* IE11 */
            elem.msRequestFullscreen();
        }

        // Close the warning modal
        $('#warningModal').modal('hide');
    });
</script>

<!-- quiz jquery -->
<script>
    $(document).ready(function() {
        let currentQuestion = 1;
        let totalQuestions = 5;

        function showQuestion(questionNumber) {
            let quizBodies = $('.quiz-list-body');

            quizBodies.each(function(index) {
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

        $('.quiz-prev').on('click', function() {
            if (currentQuestion > 1) {
                currentQuestion--;
                $('.quiz-number').text(currentQuestion + ' / ' + totalQuestions);
                showQuestion(currentQuestion);
                updateNavigationButtons();
            }
        });

        $('.quiz-next').on('click', function() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                $('.quiz-number').text(currentQuestion + ' / ' + totalQuestions);
                showQuestion(currentQuestion);
                updateNavigationButtons();
            }
        });

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
    // $(document).ready(function () {
    //     const videoSection = $('.video-section')[0];
    //     const webcamVideo = $('#webcamVideo')[0];

    //     if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    //         navigator.mediaDevices.getUserMedia({ video: true })
    //             .then(function (stream) {
    //                 // Assign the webcam stream to the video element
    //                 webcamVideo.srcObject = stream;

    //                 // Handle stopping the stream when the page is closed
    //                 $(window).on('beforeunload', function () {
    //                     stream.getTracks().forEach(track => track.stop());
    //                 });
    //             })
    //             .catch(function (error) {
    //                 console.error('Error accessing webcam:', error);
    //             });
    //     } else {
    //         console.error('getUserMedia is not supported in this browser');
    //     }
    // });
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

    // Event listener for right-click
    // document.addEventListener('contextmenu', function (e) {
    //     e.preventDefault();
    //     displayModal();
    // });

    // Event listener for key press
    // document.addEventListener('keydown', function (e) {
    //     e.preventDefault();
    //     displayModal();
    // });

    // Full-screen on page load
    // Full-screen on page load
    //   document.addEventListener('DOMContentLoaded', function () {
    //     document.documentElement.requestFullscreen();
    // });
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