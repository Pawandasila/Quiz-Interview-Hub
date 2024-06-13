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

<div class="pyq_model model-container" id="pyq_model" style="display: none;">
    <div id="contentIcon3" class="tab-content" style="display: block;">
        <ul class="nav nav-tabs" id="tabsIcon3">
            <li class="nav-item">
                <a class="nav-link active" id="tab1Icon3" data-bs-toggle="tab" href="#contentTab1Icon3">Study Material</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="col-md-8 offset-md-2">
                <form class="container" id="form1">
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjects:</label>
                        <select name="subject" id="subject" class="form-select">
                            <option value="0" link > Select company name</option>
                            <?php
                            $selectPYQ = mysqli_query($con, "SELECT * FROM study_material");
                            $PYQ_opt = mysqli_fetch_all($selectPYQ, MYSQLI_ASSOC);
                            foreach ($PYQ_opt as $PYQ_opt_value) {
                                echo "<option value=\"{$PYQ_opt_value['id']}\" data-link=\"{$PYQ_opt_value['link']}\">{$PYQ_opt_value['topic_name']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <a type="submit" class="btn btn-success" id="submitBtn" target="_blank" href="https://www.geeksforgeeks.org/gate-cs-notes-gq/">Submit</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
</script>
