<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Backend Panel</title>
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

        /* Custom CSS for button hover effect */
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(3, 0, 0, 0.1);
            transition: all 0.3s ease;
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
                        <h3 class="page-title">PYQ </h3>
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
                                    PYQ's Details
                                </h4>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable">
                                        <thead class="table-dark">
                                            <tr class="text-center">
                                                <th>Sr. No</th>
                                                <th>Topic Name</th>
                                                <th>Topic Name</th>
                                                <th>Action</th>
                                                <th>Respnse</th>
                                            </tr>
                                        </thead>
                                        <tbody id='category' class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <!-- Button trigger modal -->

                                                <td>Main</td>
                                                <td>
                                                    <button type="button" class="btn btn-hover btn-primary "
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="fas fa-upload"></i> file
                                                    </button>

                                                    <button type="button" class="btn btn-hover btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#linkModal">
                                                        <i class="fas fa-upload"></i> Link
                                                    </button>

                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- Upload Link button (inside the Action column) -->
                                                        <div class="mx-1"></div>
                                                        <!-- Edit button -->
                                                        <button class="btn btn-warning btn-hover edit-link">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <div class="mx-1"></div>
                                                        <!-- Delete button -->
                                                        <button type="button"
                                                            class="btn btn-danger btn-hover delete-button">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!-- Done button -->
                                                    <button class="btn btn-hover btn-success done-button">
                                                        <i class="fas fa-check"></i>
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

                <!-- Main modal for file upload -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Choose File:</label>
                                        <input type="file" class="form-control" id="file">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="uploadFile">Upload</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for link upload -->
                <div class="modal fade" id="linkModal" tabindex="-1" aria-labelledby="linkLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="linkLabel">Upload Link</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="link" class="form-label">Link:</label>
                                        <input type="text" class="form-control" id="link">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="uploadLink">Upload</button>
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

            $('#filter').change(function () {
                var selectedValue = $(this).val();
                $('#category tr').hide();
                $('#category tr').each(function () {
                    var testType = $(this).find('td:eq(5)').text().trim();
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
</body>

</html>