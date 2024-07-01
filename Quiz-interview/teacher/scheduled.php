<?php
session_start();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

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

    <?php
    include "navbar.php";
    ?>

    <div class="container-fluid page-body-wrapper">

      <?php
      include "sidebar.php";
      ?>

      <div class="main-panel table-responsive" style=" height: 50%; overflow: scroll;">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> HR Request </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <div class="input-group">
                    <input type="text" class="form-control" id="myInput" placeholder="Search...">

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
                        <th scope="col">Interview Name</th>
                        <th scope="col">Company Name</th>
                        <th class="text-center" scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $sql = "SELECT * FROM interview_details WHERE admin_status = 'pending' ";
                      $result = $con->query($sql);

                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {

                      ?>
                          <tr>
                            <th scope="row">1</th>
                            <td>John Doe</td>
                            <td>
                              <?php echo $row['date_and_time'] ?>
                            </td>
                            <td><?php echo $row['interview_name'] ?></td>
                            <td>John Doe</td>
                            <td>
                              <button class="btn btn-info action" data-id="<?php echo $row['id']; ?>" data-action="accept">Accept</button>
                              <button class="btn btn-danger action" data-id="<?php echo $row['id']; ?>" data-action="reject">Reject</button>

                            </td>
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

        <div class="modal fade" id="meetingLinkModal" tabindex="-1" aria-labelledby="meetingLinkModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="meetingLinkModalLabel">Enter Meeting Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="meetingLinkForm">
                  <div class="mb-3">
                    <label for="meetingLink" class="form-label">Meeting Link</label>
                    <input type="text" class="form-control" id="meetingLink" name="meetingLink" placeholder="Enter the Meeting link Here" required>
                    <input type="hidden" id="interviewId" name="interviewId">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!-- reject confirmation -->

        <div class="modal fade" id="rejectConfirmationModal" tabindex="-1" aria-labelledby="rejectConfirmationModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="rejectConfirmationModalLabel">Reject Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to reject this request?</p>
                <input type="hidden" id="rejectInterviewId" name="rejectInterviewId">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="rejectInterview">Reject</button>
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

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="../../assets/js/file-upload.js"></script>


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

  <script>
    $(document).ready(function() {
      $(".action").click(function() {
        var id = $(this).data("id");
        var action = $(this).data("action");

        if (action === 'accept') {
          $('#interviewId').val(id);
          $('#meetingLinkModal').modal('show');
        } else if (action === 'reject') {
          $('#rejectInterviewId').val(id);
          $('#rejectConfirmationModal').modal('show');
        }

        $('#meetingLinkForm').on('submit', function(e) {
          var meetingLink = $('#meetingLink').val();
          $.ajax({
            url: "action.php",
            method: "POST",
            data: {
              action: 'handleAction',
              id: id,
              action_taken: action,
              meeting_link: meetingLink
            },
            success: function(response) {
              location.reload();
            }
          });

        });

      });
    });
  </script>



</body>

</html>