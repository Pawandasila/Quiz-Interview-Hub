<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['userid'])) {
  echo "User not logged in.";
  exit();
}

$user_id = $_SESSION['userid'];


$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $username = strtoupper($row['username']);
  $firstName = strtoupper($row['firstname']);
  $phone = strtoupper($row['Phone']);
  $Dob = strtoupper($row['dob']);
  $College = strtoupper($row['college']);
  $Course = strtoupper($row['course']);
  $semester = strtoupper($row['semester']);
  $branch = strtoupper($row['branch']);  
} else {
  echo "No user found.";
}

if ($semester % 2 == 0) {
  $year = $semester / 2;
} else {
  $year = floor($semester / 2) + 1;
}

$conn->close();
?>

<div class="col-12 col-md-4 first-div d-flex align-items-center" style="background-color: white; height: 90vh; border-right: 1px solid #ccc;">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="template" style="background-color: #1E90FF; padding: 10px; height: 40vh;">
          <div class="user-image_main">
            <img src="./images/client.jpg" alt="user picture" height="120px" class="img-fluid">
          </div>
          <div class="user-detail">
            <h4><i style="color: black;" class="fas fa-user"></i> <?php echo $firstName ?></h4>
            <p><i style="color: black;" class="far fa-envelope"></i> <?php echo $username ?></p>
            <p><i style="color: black;" class="fas fa-phone"></i> <?php echo $phone ?> </p>

          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col">
        <div class="template" style="background-color: transparent; padding: 10px;height: 35vh;">
          <table class="table table-borderless table-hover table-striped custom-table">
            <tbody>
              <tr>
                <td>Date of Birth</td>
                <td><?php echo $Dob ?></td>
              </tr>
              <tr>
                <td>College</td>
                <td> <?php echo $College ?> </td>
              </tr>
              <tr>
                <td>Course</td>
                <td> <?php echo $Course ?> </td>
              </tr>
              <tr>
                <td>Year</td>
                <td><?php echo $year ?></td>
              </tr>
              <tr>
                <td>Semester</td>
                <td><?php echo $semester ?></td>
              </tr>
              <tr>
                <td>Branch</td>
                <td><?php echo $branch ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- <div class="button">
        <a href="../student/result_analysis.php" class="btn btn-warning">Show Overall Performance</a>
      </div> -->

      <div class="button">
        <a href="../student/result_analysis.php" class="btn btn-warning"></a>
      </div>
    </div>
  </div>
</div>