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
                <form name="form1" id="form1" method="get" class="container">
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subjects:</label>
                        <select class="form-select" id="subject" name="subject">
                            <option value="0">Select company name</option>
                            <?php
                            $selectPYQ = mysqli_query($con, "SELECT * FROM study_material");
                            if ($selectPYQ) {
                                while ($PYQ_opt_value = mysqli_fetch_assoc($selectPYQ)) {
                                    echo '<option value="' . $PYQ_opt_value['id'] . '">' . $PYQ_opt_value['company_name'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
