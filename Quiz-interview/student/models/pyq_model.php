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


<div class="study_material model-container" id="study_material" style="display: block;">
    <div id="contentIcon4" class="tab-content" style="display: block;">
        <ul class="nav nav-tabs" id="tabsIcon4">
            <li class="nav-item">
                <a class="nav-link active" id="tab1Icon4" data-bs-toggle="tab" href="#contentTab1Icon4">PYQ'S</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" id="tab2Icon4" data-bs-toggle="tab" href="#contentTab2Icon4">Tab 2</a>
            </li> -->
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="contentTab1Icon4">
                <div class="col-md-8 offset-md-2">
                    <form name="form1" id="form1" action="https://www.geeksforgeeks.org/" method="get" target="_blank"
                        class="container">
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subjects:</label>
                            <select name="subject" id="subject" class="form-select">
                            <?php
                            $selectPYQ = mysqli_query($con, "SELECT * FROM pyq");
                            $PYQ_opt = mysqli_fetch_all($selectPYQ, MYSQLI_ASSOC);
                            ?>
                            <option value="0">Select company name</option>
                            <?php foreach ($PYQ_opt as $PYQ_opt_value) : ?>
                                <option value="<?php echo $PYQ_opt_value['id']; ?>"><?php echo $PYQ_opt_value['company_name']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>

            <!-- <div class="tab-pane fade" id="contentTab2Icon4">
            </div> -->
        </div>
    </div>
</div>