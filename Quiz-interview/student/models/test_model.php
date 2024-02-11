<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
?>

<div class="test_model model-container" id="test_model" style="display: block;">
  <div id="contenticon1" class="tab-content" style="display: block;">

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="tabsIcon1">
      <li class="nav-item">
        <a class="nav-link active" id="tab1Icon1" href="#contentTab1Icon1">Mock Test</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab2Icon1" href="#contentTab2Icon1">Main Tests</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tab3Icon1" href="#contentTab3Icon1">Result</a>
      </li>
    </ul>
    <hr>

    <div class="tab-content">
      <!-- Mock Test Content -->
      <div class="tab-pane fade show active" id="contentTab1Icon1">
        <div class="row">
          <!-- First Test Card -->
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Test Name 1</h5>
              </div>
              <div class="card-body">
                <!-- Image Wrapper with Fixed Height and Width -->
                <div style="height: 200px; width: 100%;">
                  <img src="https://source.unsplash.com/800x600/?space" class="card-img-top" alt="Random Space Image" style="height: 100%; width: 100%;">
                </div>
                <p class="card-text">Company: Test Solutions</p>
                <p class="card-text">Date: January 3, 2024</p>
                <p class="card-text">Time: 3:30 PM</p>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary">Start Test</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Second Test Card -->
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Test Name 2</h5>
              </div>
              <div class="card-body">
                <!-- Image Wrapper with Fixed Height and Width -->
                <div style="height: 200px; width: 100%;">
                  <img src="https://source.unsplash.com/random/800x600" class="card-img-top" alt="Random Unsplash Image" style="height: 100%; width: 100%;">
                </div>
                <p class="card-text">Company: Test Solutions</p>
                <p class="card-text">Date : January 3, 2024 </p>
                <p class="card-text">Time: 3:30 PM</p>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary">Start Test</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Third Test Card -->
          <div class="col-md-4 col-sm-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Test Name 3</h5>
              </div>
              <div class="card-body">
                <!-- Image Wrapper with Fixed Height and Width -->
                <div style="height: 200px; width: 100%;">
                  <img src="https://source.unsplash.com/800x600/?animals" class="card-img-top" alt="Random Animal Image" style="height: 100%; width: 100%;">
                </div>
                <p class="card-text">Company: Test Solutions</p>
                <p class="card-text">Date : January 3, 2024 </p>
                <p class="card-text">Time: 3:30 PM</p>
                <div class="card-footer">
                  <button type="button" class="btn btn-primary">Start Test</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Main Tests Content -->
      <div class="tab-pane fade" id="contentTab2Icon1">
        <div class="row">
          <!-- First Test Card -->
          <?php
          $result = mysqli_query($con, "SELECT * FROM main_test");
          while ($row = mysqli_fetch_array($result)) {
            $company_name = $row["company_name"];
            $test_name = $row["test_name"];
            $start_date_time = $row["start_date_time"];
            $end_date_time = $row["end_date_time"];
          ?>

            <div class="col-md-4 col-sm-6 mb-3">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><?php echo $test_name ?></h5>
                </div>
                <div class="card-body">
                  <!-- Image Wrapper with Fixed Height and Width -->
                  <div style="height: 200px; width: 100%;">
                    <img src="https://source.unsplash.com/800x600/?nature" class="card-img-top" alt="Random Space Image" style="height: 100%; width: 100%;">
                  </div>
                  <p class="card-text">Company: <?php echo $company_name ?></p>
                  <p class="card-text">Start Date: <?php echo $start_date_time ?></p>
                  <p class="card-text">End Date: <?php echo $end_date_time ?></p>
                  <div class="card-footer">
                    <a href="../student/instruction_file.php" class="btn btn-primary">Start Test</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          $con->close();

          ?>



          <!-- Second Test Card -->


          <!-- Third Test Card -->

        </div>
      </div>


      <!-- Result content -->
      <div class="tab-pane fade" id="contentTab3Icon1" style="padding: 12px;">

        <!-- Summary -->
        <div class="col-md-12 mb-3" style="margin-bottom: 12px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Summary</h5>

              <!-- Centered Summary Boxes -->
              <div class="centered-summary-boxes">
                <!-- Tests Given -->
                <div class="summary-box given-box">
                  <i class="fas fa-clipboard-check"></i>
                  <p class="box-title">Tests Given</p>
                  <p class="box-value">100</p>
                </div>

                <!-- Tests Passed -->
                <div class="summary-box passed-box">
                  <i class="fas fa-check-circle"></i>
                  <p class="box-title">Tests Passed</p>
                  <p class="box-value">80</p>
                </div>

                <!-- Tests Not Given but Enrolled -->
                <div class="summary-box enrolled-box">
                  <i class="fas fa-hourglass-half"></i>
                  <p class="box-title">Not Given (Enrolled)</p>
                  <p class="box-value">20</p>
                </div>

                <!-- Disqualified Tests -->
                <div class="summary-box disqualified-box">
                  <i class="fas fa-times-circle"></i>
                  <p class="box-title">Disqualified Tests</p>
                  <p class="box-value">5</p>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Total Tests Given with Pie Chart -->
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Tests Given</h5>
              <p class="card-text">120</p>
              <!-- Pie Chart and Data -->
              <div class="row">
                <!-- Pie Chart -->
                <div class="col-md-6">
                  <canvas id="pieChart" style="width: 100%; height: auto; display: block;"></canvas>
                </div>

                <!-- Data Table -->
                <div class="col-md-6">
                  <h5>Test Performance Data</h5>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Test</th>
                          <th>Marks</th>
                          <th>Percentage</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Test 1</td>
                          <td>100</td>
                          <td>80%</td>
                        </tr>
                        <tr>
                          <td>Test 2</td>
                          <td>200</td>
                          <td>90%</td>
                        </tr>
                        <tr>
                          <td>Test 3</td>
                          <td>500</td>
                          <td>70%</td>
                        </tr>
                        <tr>
                          <td>Test 4</td>
                          <td>500</td>
                          <td>750%</td>
                        </tr>
                        <!-- Add re rows for other tests -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Marks in Each Subject -->
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Marks in Each Subject</h5>
              <!-- Dropdown to select the test -->
              <select id="testDropdown" class="form-select mb-3" onchange="showTestResults()">
                <option value="select">Select Test</option>
                <option value="dsa">DSA Exam</option>
                <option value="test2">C++ Exams</option>
                <option value="test3">Java Exams</option>
                <!-- Add more test options as needed -->
              </select>
              <!-- Container to display test results -->
              <div id="testResultsContainer" class="table-responsive">
                <!-- Test results will be displayed here dynamically -->
                <table class="table table-borderless table-hover table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th>Sr. No</th>
                      <th>Subject</th>
                      <th>Marks</th>
                      <th>Grade</th>
                      <th>Points</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Test results will be dynamically inserted here -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>