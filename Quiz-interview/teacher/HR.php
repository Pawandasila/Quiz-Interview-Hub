<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Backend Panel</title>
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
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

    <?php include "navbar.php"; ?>

    <div class="container-fluid page-body-wrapper">

      <?php include "sidebar.php"; ?>

      <div class="main-panel table-responsive" style=" height: 50%; overflow: scroll;">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> HR Request </h3>
          </div>

          <div class="col-lg-6 grid-margin stretch-card table-responsive" style="width:79vw">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">HR Request</h4>
                <div class="table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Name of Student</th>
                        <th scope="col">Date and time</th>
                        <th scope="col">Interview Name</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Meeting Link</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM interview_details where admin_status = 'Done' ";
                      $result = $con->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                          if (empty($row['meeting_link'])) {

                            $meeting_link_status = "disabled";
                            $meeting_link_href = "#";
                          } else {

                            $meeting_link_status = "";
                            $meeting_link_href = $row['meeting_link'];
                          }
                      ?>
                          <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td><?php echo $row['date_and_time'] ?></td>
                            <td><?php echo $row['interview_name'] ?></td>
                            <td>John Doe</td>
                            <td><button type="button" class="btn btn-info" <?php echo $meeting_link_status; ?> onclick="window.location.href='<?php echo $meeting_link_href; ?>'">
                                Meeting Link
                              </button></td>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © to the Team</span>
          </div>
        </footer>

      </div>

    </div>
  </div>
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>