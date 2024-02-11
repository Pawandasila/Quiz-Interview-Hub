<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
    .card {
      margin: 0;
    }

    @media (max-width: 576px) {
      .col-lg-6 {
        width: 100%;
      }
    }

    i {
      margin-right: 12px;
    }

    i:hover {
      cursor: pointer;
    }

    th.text-center {
        text-align: center;
    }


  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php
     include "navbar.php";
     ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php
        include "sidebar.php";
        ?>
      <!-- partial -->
      <div class="main-panel table-responsive" style=" height: 50%; overflow: scroll;" >
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> HR Request </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <div class="input-group">
                    <input type="text" class="form-control" id = "myInput" placeholder="Search...">
                    <!-- <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div> -->
                  </div>
                </li>
              </ol>
            </nav>
          </div>

          <div class="col-lg-6 grid-margin stretch-card table-responsive" style="width:79vw">
            <div class="card ">
              <div class="card-body">
                <h4 class="card-title">HR Request </h4>
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No</th>
                            <th scope="col">Name of Student</th>
                            <th scope="col">Date and time</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <th scope="row">1</th>
                          <td>John Doe</td>
                          <td>
                            12th jan 2023 
                            <span>12:00</span>
                          </td>
                          <td>John Doe</td>
                          <td>
                              <!-- Add action buttons or links here -->
                              <button class="btn btn-primary" disabled>Accept</button>
                          </td>
                      </tr>
                      <tr>
                          <th scope="row">2</th>
                          <td>Jane Smith</td>
                          <td>
                            12th jan 2023 
                            <span>12:00</span>
                          </td>
                          <td>John Doe</td>
                          <td>
                              <!-- Add action buttons or links here -->
                              <button class="btn btn-primary" disabled>Accept</button>
                          </td>
                      </tr>
                      <tr>
                          <th scope="row">3</th>
                          <td>Bob Johnson</td>
                          <td>
                            12th jan 2023 
                            <span>12:00</span>
                          </td>
                          <td>John Doe</td>
                          <td>
                              <!-- Add action buttons or links here -->
                              <button class="btn btn-primary" disabled>Accept</button>
                          </td>
                      </tr>
                      <tr>
                          <th scope="row">4</th>
                          <td>Alice Williams</td>
                          <td>
                            12th jan 2023 
                            <span>12:00</span>
                          </td>
                          <td>John Doe</td>
                          <td>
                              <!-- Add action buttons or links here -->
                              <button class="btn btn-primary" disabled>Accept</button>
                          </td>
                      </tr>
                  </tbody>
                  
                </table>
                
                </div>
              </div>
            </div>
          </div>
      </div>

   

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © to the Team</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  
  
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <!-- Include Popper.js (required for Bootstrap dropdowns) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <!-- Include Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Include your custom scripts after including jQuery, Popper.js, and Bootstrap JS -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
  <script src="../../assets/js/file-upload.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <!-- Include Chart.js library -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script> -->
  
<script>
   $(document).ready(function () {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tbody tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
  


  <!-- End custom js for this page -->
</body>

</html>