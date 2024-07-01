<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";


$con = mysqli_connect($servername, $username, $password, $dbname);
?>

<div class="test_model model-container" id="test_model" style="display: block;">
  <div id="contenticon1" class="tab-content" style="display: block;">

    
    <ul class="nav nav-tabs" id="tabsIcon1">
      <!-- <li class="nav-item">
        <a class="nav-link active" id="tab1Icon1" href="#contentTab1Icon1">Mock Test</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link active" id="tab2Icon1" href="#contentTab2Icon1">Main Tests</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" id="tab3Icon1" href="#contentTab3Icon1">Result</a>
      </li> -->
    </ul>
    <hr>

    <div class="tab-content">
     
      <!-- <div class="tab-pane fade show active" id="contentTab1Icon1">
        <div class="row">
          
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Test Name 1</h5>
              </div>
              <div class="card-body">
                
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

          
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Test Name 2</h5>
              </div>
              <div class="card-body">
                
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

          
          <div class="col-md-4 col-sm-6 mb-3">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Test Name 3</h5>
              </div>
              <div class="card-body">
                
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
      </div> -->



      <div class="tab-pane fade show active" id="contentTab2Icon1">
        <div class="row">
      
          <?php
          $result = mysqli_query($con, "SELECT * FROM main_test");
          while ($row = mysqli_fetch_array($result)) {
            $company_name = $row["company_name"];
            $test_name = $row["test_name"];
            $start_date_time = $row["start_date_time"];
            $end_date_time = $row["end_date_time"];
            $test_id = $row["test_id"];
          ?>

            <div class="col-md-4 col-sm-6 mb-3">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><?php echo $test_name ?></h5>
                </div>
                <div class="card-body">
                  
                  <div style="height: 200px; width: 100%;">
                  <img src="https://th.bing.com/th?id=OIP.WivWzWIIeKJJlBUlJzlyGwHaFd&w=291&h=214&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2" class="card-img-top" alt="Random Nature Image" style="height: 100%; width: 100%;">
                  </div>
                  <p class="card-text">Company: <?php echo $company_name ?></p>
                  <p class="card-text">Start Date: <?php echo $start_date_time ?></p>
                  <p class="card-text">End Date: <?php echo $end_date_time ?></p>
                  <div class="card-footer">
                    <a href="../student/instruction_file.php?test_id=<?php echo $test_id ?>" class="btn btn-primary">Start Test</a>
                  </div>
                </div>
              </div>
            </div>
          <?php
          }
          $con->close();

          ?>
        </div>
      </div>


      
      <!-- <div class="tab-pane fade" id="contentTab3Icon1" style="padding: 12px;">

    
        <div class="col-md-12 mb-3" style="margin-bottom: 12px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Summary</h5>


              <div class="row text-center">
         
                <div class="col-6 col-md-3 mb-3">
                  <div class="summary-box given-box">
                    <i class="fas fa-clipboard-check"></i>
                    <p class="box-title">Tests Given</p>
                    <p class="box-value">100</p>
                  </div>
                </div>

        
                <div class="col-6 col-md-3 mb-3">
                  <div class="summary-box passed-box">
                    <i class="fas fa-check-circle"></i>
                    <p class="box-title">Tests Passed</p>
                    <p class="box-value">80</p>
                  </div>
                </div>

 
                <div class="col-6 col-md-3 mb-3">
                  <div class="summary-box enrolled-box">
                    <i class="fas fa-hourglass-half"></i>
                    <p class="box-title">Not Given (Enrolled)</p>
                    <p class="box-value">20</p>
                  </div>
                </div>

 
                <div class="col-6 col-md-3 mb-3">

                <div class="summary-box disqualified-box">
                  <i class="fas fa-times-circle"></i>
                  <p class="box-title">Disqualified Tests</p>
                  <p class="box-value">5</p>
                </div>
                </div>
                
              </div>

            </div>
          </div>
        </div>


        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Tests Given</h5>
              <p class="card-text">120</p>
        
              <div class="row">
          
                <div class="col-md-6">
                  <div class="chart-container" style="position: relative; height: 40vh; width: 100%;">
                    <canvas id="pieChart"></canvas>
                  </div>
                </div>

             
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
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

   
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Marks in Each Subject</h5>
          
              <select id="testDropdown" class="form-select mb-3" onchange="showTestResults()">
                <option value="select">Select Test</option>
                <option value="dsa">DSA Exam</option>
                <option value="test2">C++ Exams</option>
                <option value="test3">Java Exams</option>
               
              </select>

              <div id="testResultsContainer" class="table-responsive">
       
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

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>



      </div> -->


    </div>
  </div>
</div>