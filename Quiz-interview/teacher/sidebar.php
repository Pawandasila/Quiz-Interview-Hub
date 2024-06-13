<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";


$con = mysqli_connect($servername, $username, $password, $dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}


$sql = "SELECT COUNT(*) AS num_fields FROM interview_details";
$result = $con->query($sql);



if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $num_fields = $row['num_fields'];
}
?>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="scheduled.php" style="display: flex; justify-content: space-between;">
        <span class="menu-title">Request </span>
        &emsp; &emsp; &emsp;&emsp;&emsp;<span class="badge badge-warning " style="border-radius: 7px; color: black;font-size: 20px; padding-left: 15px;padding-right: 15px;"><?php echo $num_fields; ?></span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="HR.php">
        <span class="menu-title">Scheuled interview </span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="test.php">
        <span class="menu-title">Test </span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pyq.php">
        <span class="menu-title">PYQ</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="study_material.php">
        <span class="menu-title">Study Material</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="create-test.php">
        <span class="menu-title">Create Test </span>
      </a>
    </li>

  </ul>
</nav>