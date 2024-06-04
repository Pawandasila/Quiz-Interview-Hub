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



        // showQuestion(currentQuestion);
        // updateNavigationButtons();


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


<!-- uer webcam acess -->
<script>
    $(document).ready(function() {

        // if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        //     navigator.mediaDevices.getUserMedia({
        //             video: true
        //         })
        //         .then(function(stream) {
        //             const videoElement = document.getElementById('webcamVideo');
        //             videoElement.srcObject = stream;
        //             videoElement.play();
        //             console.log("object")

        //             var warningCount = 0;

        //             $(window).on("blur focus", function(e) {
        //                 var prevType = $(this).data("prevType");

        //                 if (prevType != e.type) {

        //                     switch (e.type) {
        //                         case "blur":
        //                             warningCount++;

        //                             if (warningCount >= 4) {
        //                                 $('#disqualificationModal').modal('show');
        //                             } else {
        //                                 $('#warningModal').modal('show');
        //                             }

        //                             break;
        //                         case "focus":
        //                             break;
        //                     }

        //                 }

        //                 $(this).data("prevType", e.type);
        //             });

        //             // Event listener for the exit button
        //             $('#exit').on('click', function() {
        //                 // Hide the modal
        //                 $('#warningModal').modal('hide');
        //             });

        //         })
        //         .catch(function(error) {
        //             console.error('Error accessing webcam:', error);
        //         });
        // } else {
        //     console.error('getUserMedia is not supported in this browser');
        // }

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




<!-- quiz jquery -->
<script>
    $(document).ready(()=>{
        
        <?php
            $result=mysqli_query($con,"select * from sections where test_id='$test_id';");
            $key=array();
            $mainarray=array();
            $ques=array();
            $section_name = array();
            $ans = array();
            $org_ans = array();
            while($row=mysqli_fetch_assoc($result))
            {
                array_push($key,"key".$row["section_id"]);
                array_push($section_name,$row["section_name"]);
                $value = array();
                $fx=mysqli_query($con,"select * from questions where section_id=".$row['section_id'].";");
                $xx=array();
                $oa=array();
                while($r=mysqli_fetch_assoc($fx))
                {
                    $val = array();
                    $val["question_id"]=$r["question_id"];
                    $val["question_text"]=$r["question_text"];
                    $val["optionA"]=$r["option1"];
                    $val["optionB"]=$r["option2"];
                    $val["optionC"]=$r["option3"];
                    $val["optionD"]=$r["option4"];
                    $val["correct"]=$r["correct_answer"];
                    array_push($value,$val);
                    array_push($xx,0);
                    array_push($oa,$r["correct_answer"]);
                    ?>
                    // alert('<?php echo $val["question_text"] ?>');
                    <?php
                }
                array_push($mainarray,$value);
                array_push($ans,$xx);
                array_push($org_ans,$oa);
                ?>
                <?php
            }

            $ques_json = json_encode($mainarray);
            $sec_json = json_encode($section_name);
            $ans_json = json_encode($ans);
            $org_ans_json = json_encode($org_ans);
        ?>
        var ques = <?php echo $ques_json; ?>;
        var sec = <?php echo $sec_json; ?>;
        var ans = <?php echo $ans_json; ?>;
        var org_ans = <?php echo $org_ans_json; ?>;
        console.log(ques);
        console.log(sec);
        console.log(ans);
        console.log(org_ans);

        // $("#ques_tag").html("1/"+ques[0].length);
        var ques_no=0;
        var section_no=0;
        var total_ques=ques[section_no].length;

        // cat_box(total_ques);
        $("#category_box").empty();
        for(var i=0;i<total_ques;i++)
                $("#category_box").append('<div class="digit-box" data-question="' + i + '" >' + (i+1) + '</div>');
        $('.digit-box[data-question=0]').addClass('highlight');
        comp_div(section_no,ques_no,total_ques);
        $("#category_box_heading").html("Category:"+sec[section_no]);
        // console.log(ques_no,section_no,total_ques);

        $("#sectionSelect").on('change',function(){
            // alert($("#sectionSelect").val());
            section_no=$("#sectionSelect").val();
            ques_no=0;
            total_ques=ques[section_no].length;
            // cat_box(total_ques);
            $("#category_box").empty();
            for(var i=0;i<total_ques;i++)
                $("#category_box").append('<div class="digit-box" data-question="' + i + '" >' + (i+1) + '</div>');
            $('.digit-box[data-question=0]').addClass('highlight');

            $('.digit-box').click(function() {
                $('.digit-box').removeClass('highlight'); 
                $(this).addClass('highlight');
                q=$(this).data('question');
                comp_div(section_no,q,total_ques);
            });
            
        
            comp_div(section_no,ques_no,total_ques);
            $("#category_box_heading").html("Category:"+sec[section_no]);
        });
        function comp_div(s,q,tq)
        {
            // console.log(ques_no,section_no,total_ques);
            $("#ques_tag").html(q+1+"/"+tq);
            $("#question").html(ques[s][q].question_text);
            $("#first").empty();
            $("#first").append("<input id='firstRadio' type='radio' value='1' name='quizOption'>"+ques[s][q].optionA);
            $("#second").empty();
            $("#second").append("<input id='secondRadio' type='radio' value='2' name='quizOption'>"+ques[s][q].optionB);
            $("#third").empty();
            $("#third").append("<input id='thirdRadio' type='radio' value='3' name='quizOption'>"+ques[s][q].optionC);
            $("#fourth").empty();
            $("#fourth").append("<input id='fourthRadio' type='radio' value='4' name='quizOption'>"+ques[s][q].optionD);
            
            $('input[name="quizOption"]').on('change',function()
            {
                value = $('input[name="quizOption"]:checked').val();
                ans[s][q]=value;
            });

            // alert(ques_no+1==total_ques);
            // alert(ques_no+1==1);
            $("#quiz-next").prop("disabled",q+1==total_ques);
            $("#quiz-prev").prop("disabled",q+1==1);
            ques_no=q;
            
        }



        $("#quiz-prev").on('click',function(){
            $('.digit-box[data-question='+ques_no+']').removeClass('highlight');
            $('.digit-box[data-question='+(ques_no-1)+']').addClass('highlight');
            ques_no=ques_no-1;
            comp_div(section_no,ques_no,total_ques);
            
        })
        
        $("#quiz-next").on('click',function(){
            $('.digit-box[data-question='+ques_no+']').removeClass('highlight');
            $('.digit-box[data-question='+(ques_no+1)+']').addClass('highlight');
            ques_no=ques_no+1;
            comp_div(section_no,ques_no,total_ques);
        })


        $('.digit-box').click(function() {
            $('.digit-box').removeClass('highlight'); 
            $(this).addClass('highlight');
            q=$(this).data('question');
            comp_div(section_no,q,total_ques);
        });

        $('#end_test').on('click',function(){
            // console.log(org_ans[1]);
            var final_ans=0;
            for(var row in org_ans)
            {
                for(var col in org_ans[row])
                if(org_ans[row][col]==ans[row][col])
                    final_ans++;
            }
            console.log(final_ans);
        })
    })


</script>




