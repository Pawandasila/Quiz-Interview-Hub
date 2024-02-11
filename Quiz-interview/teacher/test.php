<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Backend Website</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            scroll-behavior: smooth;
        }

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

                    <div class="col-md-12 grid-margin stretch-card table-responsive">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between">
                                    Tests Details
                                    <div class="form-group d-flex justify-content-center align-items-center">
                                        <label for="filter" class="me-2" style="font-size: 22px;">Filter:</label>
                                        <select class="form-select" id="filter" style="width: 10rem;">
                                            <option value="Select" selected>Select</option>
                                            <option value="main">Main</option>
                                            <option value="mock">Mock</option>
                                        </select>
                                    </div>


                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable">
                                        <thead class="table-dark">
                                            <tr class="text-center">
                                                <th>Sr. No</th>
                                                <th>Test Name</th>
                                                <th>Company Name</th>
                                                <th>Start Date and Time</th>
                                                <th>End Date and Time</th>
                                                <th>Test Type</th>
                                                <th>Action</th>
                                                <th>Respnse</th>
                                            </tr>
                                        </thead>
                                        <tbody id='category'>
                                            <tr>
                                                <td>1</td>
                                                <td>Mathematics Olympiad</td>
                                                <td>ABC Educational Services</td>
                                                <td>2024-01-25 09:00 AM</td>
                                                <td>2024-01-25 11:00 AM</td>
                                                <td>Main</td>
                                                <td>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <!-- Edit button -->
                                                        <button class="btn btn-warning edit-link">
                                                            <i class="fas fa-edit me-2"></i>
                                                        </button>
                                                        <!-- Delete button -->
                                                        <button type="button" class="btn btn-danger delete-button">
                                                            <i class="fas fa-trash-alt me-2 "></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!-- Done button -->
                                                    <button class="btn btn-success done-button">
                                                        <i class="fas fa-check me-1"></i>Done
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Add more rows for additional tests as needed -->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <footer class="footer">
                    <div class="container-fluid d-flex justify-content-between">
                        <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © to the
                            Team</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <?php 
    include "jquery.php";
    ?>

    <script>
        $(document).ready(function () {
            // Event listener for filter change
            $('#filter').change(function () {
                var selectedValue = $(this).val();

                // Hide all rows initially
                $('#category tr').hide();

                // Show rows with the selected value in the Test Type column
                $('#category tr').each(function () {
                    var testType = $(this).find('td:eq(5)').text().trim();
                    // alert(testType);
                    if (selectedValue === testType) {
                        alert("The selected value");
                    }

                    if (selectedValue === 'Select') {
                        $(this).show();
                    }
                });
            });
        });
    </script>



    <!-- End custom js for this page -->
</body>

</html>