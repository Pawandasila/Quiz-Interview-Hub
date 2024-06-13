<?php
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
?>

<div class="study_material model-container" id="study_material" style="display: none;">
    <div id="contentIcon4" class="tab-content" style="display: block;">
        <ul class="nav nav-tabs" id="tabsIcon4">
            <li class="nav-item">
                <a class="nav-link active" id="tab1Icon4" data-bs-toggle="tab" href="#contentTab1Icon4">PYQ'S</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="contentTab1Icon4">
                <div class="col-md-8 offset-md-2">
                    <form class="container" id="form1">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subjects:</label>
                            <select name="subject" id="subject" class="form-select">
                                <option value="0">Select company name</option>
                                <?php
                                $selectPYQ = mysqli_query($con, "SELECT * FROM pyq");
                                $PYQ_opt = mysqli_fetch_all($selectPYQ, MYSQLI_ASSOC);
                                foreach ($PYQ_opt as $PYQ_opt_value) {
                                    echo "<option value=\"{$PYQ_opt_value['id']}\" data-link=\"{$PYQ_opt_value['link']}\">{$PYQ_opt_value['company_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success" id="submitBtn" disabled>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#subject').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue !== '0') {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        });

        $('#form1').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            var selectedOption = $('#subject option:selected');
            var selectedLink = selectedOption.attr('data-link'); // Use attr() to get data attribute

            if (selectedLink && selectedOption.val() !== '0') {
                window.location.href = selectedLink;
            } else {
                alert("Please select a valid option.");
            }
        });
    });
</script>
