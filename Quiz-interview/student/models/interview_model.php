<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";
$con = mysqli_connect($servername, $username, $password, $dbname);

// Fetch data from the company_available table
$sql = "SELECT Company_Name, Company_role FROM company_available";
$result = $con->query($sql);

$companies_name = [];
$companies_role = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companies_name[] = $row['Company_Name'];
        $companies_role[] = $row['Company_role'];
    }
}

?>

<?php
// Check if the payment is successful
function isPaymentSuccessful($adminStatus)
{
    return $adminStatus === 'Done';
}

// Get the meeting date
function getMeetingDate($dateAndTime)
{
    
    return $dateAndTime;
}

// Format the meeting date for display
function formatMeetingDate($meetingDate)
{
    
    return $meetingDate;
}

?>

<div class="interview_model model-container" id="interview_model" style="display: none;">
    <div id="contenticon2" class="tab-content" style="display: block;">
        <!-- Navbar with toggle button for small screens -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar content with the navigation items -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1Icon2" data-bs-toggle="tab" href="#contentTab1Icon2">Interviews Scheduled</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2Icon2" data-bs-toggle="tab" href="#contentTab2Icon2">Schedule an Interview</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <hr>

        <div class="tab-content">
            <!-- Scheduled Interview Content -->
            <div class="tab-pane fade show active" id="contentTab1Icon2">
                <div class="row">
                    <!-- First Test Card -->
                    <?php
                    $sql = "SELECT * FROM interview_details";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $meetingDate = getMeetingDate($row['date_and_time']);
                            $formattedMeetingDate = formatMeetingDate($meetingDate);
                    ?>
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title"><?php echo $row["interview_name"]; ?></h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <p style="font-weight: bold;">Company Name: <span id="companyName" style="color:#ff0080"><?php echo $row["company_name"]; ?></span></p>
                                        
                                        <p style="font-weight: bold; ">Position: <span id="interviewerName" style="color:#ff0080"><?php echo $row["interview_name"]; ?></span></p>

                                        <p class="card-text" style="font-weight: bold;">Interview Date: <span style="color: #ff0080;"><?php echo $formattedMeetingDate; ?></span></p>
                                        <p class="card-text" style="font-weight: bold;">Payment Status: <span style="color: #ff0080;"><?php echo $row['payment_status']; ?></span></p>
                                        <p class="card-text" style="font-weight: bold;">Admin Status: <span style="color: #ff0080;"><?php echo $row['admin_status']; ?></span></p>
                                        
                                        <?php if ($row['admin_status'] === 'pending') : ?>

                                            <p class="card-text">Price: <span id="Price">₹999</span></p>
                                            <button class="rzp-button btn btn-primary mt-3" data-id="<?php echo $row['id']; ?>" disabled>Pending</button>

                                        <?php elseif ($row['admin_status'] === 'Done') : ?>

                                            <p class="card-text">Price: <span id="Price">₹999</span></p>
                                            <a href="#" class="btn btn-primary mt-3">Meeting Link</a>

                                        <?php else : ?>

                                            <p class="card-text">Price: <span id="Price">₹999</span></p>
                                            <button class="rzp-button btn btn-primary mt-3 custom-btn" data-id="<?php echo $row['id']; ?>">Pay Now</button>
                                            
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </div>
            </div>

            <!-- Schedule an Interview Content -->
            <div class="tab-pane fade" id="contentTab2Icon2">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form method="post" class="mb-4">

                            <div class="mb-3">
                                <label for="interviewerType" class="form-label">Select Interviewer Type</label>
                                <select class="form-select" id="interviewerType" onchange="showDropdown(this.value)">
                                    <option value="" selected disabled>Select</option>
                                    <option value="HR">HR</option>
                                    <option value="Faculty">Teacher</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="interviewerNames" class="form-label">Select Interviewer Name</label>
                                <select class="form-select" name="interviewerNames" id="interviewerNames">
                                    <option value="" selected disabled>Select Interviewer Type first</option>
                                </select>
                            </div>

                            <!-- Other Fields -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" value="Pawan Dasila" id="name" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="course" class="form-label">Course</label>
                                <input type="text" class="form-control" value="Btech" id="course" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="branch" class="form-label">Branch</label>
                                <input type="text" class="form-control" id="branch" value="CSE" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="companyAvailable" class="form-label">Company Available</label>
                                <select class="form-select" id="companyAvailable" name="companyAvailable">
                                    <option value="" disabled selected>Select Company Name</option>
                                    <?php
                                    foreach ($companies_name as $companyName) {
                                        echo "<option value='$companyName'>$companyName</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="interviewName" class="form-label">Interview Role</label>
                                <select class="form-select" id="interviewName">
                                    <option value="" selected disabled>Select a company first</option>
                                </select>
                            </div>
                                    
                            <div class="mb-3">
                                <label for="interviewDateTime" class="form-label">Date and Time of Interview</label>
                                <input type="datetime-local" class="form-control" id="interviewDateTime">
                            </div>

                            <button type="submit" id="Interview-form-submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>