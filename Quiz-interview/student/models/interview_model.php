<div class="interview_model model-container" id="interview_model" style="display: none;">
    <div id="contenticon2" class="tab-content" style="display: block;">

        <!-- Navbar with toggle button for small screens -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar content with the navigation items -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab1Icon2" data-bs-toggle="tab"
                                href="#contentTab1Icon2">Interviews Scheduled</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2Icon2" data-bs-toggle="tab" href="#contentTab2Icon2">Scheduled
                                an Interview</a>
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
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Interview Name 1</h5>
                            </div>
                            <div class="card-body text-center">
                                <!-- <div class="interview-model"
                                    style="height: 200px; width: 100%; background: #f2f2f2; padding: 20px; border-radius: 8px;">
                                    <p style="font-weight: bold;">Interviewer: <span id="interviewerName">John Doe
                                            (HR)</span></p>
                                    <p style="font-weight: bold;">Faculty Name: <span id="facultyName">Mr. Smith</span>
                                    </p>
                                    <p style="font-weight: bold;">Your Scheduled Date: <span id="scheduledDate">January
                                            3, 2024</span> at
                                        <span id="scheduledTime">3:30 PM</span>
                                    </p>
                                </div> -->

                                <p class="card-text mt-3">Company: Test Solutions</p>
                                <p style="font-weight: bold;">Interviewer: <span id="interviewerName">John Doe
                                        (HR)</span></p>
                                <p style="font-weight: bold;">Faculty Name: <span id="facultyName">Mr. Smith</span>
                                </p>
                                <p class="card-text">Interview Date: January 3, 2024</p>
                                <p class="card-text">Status: <span class="status"> Pending </span></p>
                                <p class="card-text">Time: 3:30 PM</p>
                                <button type="button" class="btn btn-primary mt-3">Start Interview</button>
                            </div>
                        </div>
                    </div>

                    <!-- Second Test Card -->
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Interview Name 2</h5>
                            </div>
                            <div class="card-body" style="text-align: center;">
                                <!-- <div class="interview_model"
                                    style="height: 200px; width: 100%; background: #f2f2f2; padding: 20px; border-radius: 8px;">
                                    <p style="font-weight: bold;">Interviewer: <span id="interviewerName">John Doe
                                            (HR)</span></p>
                                    <p style="font-weight: bold;">Faculty Name: <span id="facultyName">Mr. Smith</span>
                                    </p>
                                    <p style="font-weight: bold;">Your Scheduled Date: <span id="scheduledDate">January
                                            3,
                                            2024</span> at
                                        <span id="scheduledTime">3:30 PM</span>
                                    </p>
                                </div> -->

                                <p class="card-text mt-3">Company: Test Solutions</p>
                                <p style="font-weight: bold;">Interviewer: <span id="interviewerName">John Doe
                                        (HR)</span></p>
                                <p style="font-weight: bold;">Faculty Name: <span id="facultyName">Mr. Smith</span>
                                </p>
                                <p class="card-text">Interview Date: January 3, 2024</p>
                                <p class="card-text">Status: <span id="status"> Pending </span></p></p>
                                <p class="card-text">Time: 3:30 PM</p>
                                <!-- <button type="button" class="intern btn btn-primary mt-3"  id="startInterviewBtn">Start Interview</button> -->
                                <div id="buttonContainer" >
                                    <button id="rzp-button1" class="btn btn-primary mt-3" >Pay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Make an Interview Content -->
            <div class="tab-pane fade" id="contentTab2Icon2">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form>
                            <!-- Interviewer Type Dropdown -->
                            <div class="mb-3">
                                <label for="interviewerType" class="form-label">Select Interviewer Type</label>
                                <select class="form-select" id="interviewerType" onchange="showDropdown(this.value)">
                                    <option value="" selected disabled>Select</option>
                                    <option value="HR">HR</option>
                                    <option value="Faculty">Faculty</option>
                                    <option value="OwnFaculty">Own Faculty</option>
                                </select>
                            </div>

                            <!-- Dynamic Dropdown for HR or Faculty Names -->
                            <div class="mb-3" id="interviewerDropdown" style="display: none;">
                                <label for="interviewerName" class="form-label">Select Interviewer</label>
                                <select class="form-select" id="interviewerName">
                                    <!-- Options will be added dynamically using JavaScript -->
                                    <option value="" selected="selected">Please select Interviewer Type first</option>
                                </select>
                            </div>

                            <!-- Other Fields -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" value="Ravanjeet kaur" id="name" readonly>
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
                                <label for="interviewName" class="form-label">Interview Name</label>
                                <input type="text" class="form-control" id="interviewName" value="Web Developer"
                                    readonly>
                            </div>

                            <div class="mb-3">
                                <label for="interviewDateTime" class="form-label">Date and Time of Interview</label>
                                <input type="datetime-local" class="form-control" id="interviewDateTime">
                            </div>

                            <button type="button" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>




            <!-- Result content -->

        </div>
    </div>
</div>
<!-- <button id="rzp-button1">Pay</button> -->