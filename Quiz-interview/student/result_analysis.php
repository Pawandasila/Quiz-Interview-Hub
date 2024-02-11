<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Analysis</title>
    <?php include "components/head.php"; ?>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .profile-pic {
            display: inline-block;
            vertical-align: middle;
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
        }

        .profile-pic img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .profile-menu .dropdown-menu {
            right: 0;
            left: unset;
        }

        .profile-menu .fa-fw {
            margin-right: 10px;
        }

        .polar-chart-container {
            width: 500px;
            height: 500px;
            margin: 50px auto;
        }

        #chart-heading {
            text-align: center;
            /* font-size: 18px; */
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            body {
                /* Your styles for small devices go here */
                /* Example: */
                height: fit-content;
                /* 100% of the viewport height */
                width: fit-content;
                /* 100% of the viewport width */
            }
        }

        @media (min-width: 768px) {
            body {
                /* Your styles for small devices go here */
                /* Example: */
                height: 100vh;
                /* 100% of the viewport height */
                width: 100vw;
                /* 100% of the viewport width */
            }
        }

        @media (max-width: 768px) {

            .result_profile-photo {
                width: 20rem;
            }
        }
    </style>

</head>

<body>

    <?php include "components/nav.php"; ?>

    <div class="container mt-5 chart shadow mb-5 bg-white rounded" style="height: auto;">
        <div class="row">
            <!-- Left column for the profile picture -->
            <div class="col-md-3 result_profile">
                <div class="img-fluid rounded-2" style="overflow: hidden;">
                    <!-- Use responsive image class -->
                    <img src="avatar.jpg" alt="Avatar" class="avatar-image result_profile-photo img-fluid"
                        style="border-radius: 50%; object-fit: cover;">
                </div>
                <br>
                <h2 id="chart-heading">Performance Chart of <span class="text-success">Ravanjeet kaur</span></h2>
            </div>

            <!-- Right column for the chart heading -->
            <div class="col-md-9">
                <div class="polar-chart-container chart">
                    <!-- Adjust chart styles here -->
                    <canvas id="polarChart"></canvas>
                </div>
            </div>
        </div>
    </div>



    <div class="results_container">
        <div class="test_model model-container" id="test_model" style="display: block;">
            <div id="contenticon1" class="tab-content" style="display: block;">

                <!-- Tabs -->
                <ul class="nav nav-tabs p-4" id="tabsIcon1">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1Icon1" href="#contentTab1Icon1"> Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2Icon1" href="#contentTab2Icon1">Interview</a>
                    </li>
                </ul>
                <hr>

                <div class="tab-content">
                    <!--  Test Result Content -->
                    <div class="tab-pane fade show active" id="contentTab1Icon1">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 p-3">
                            <!-- First Test Card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Test Name 1 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Test Name 1 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-success">
                                                    <td>Result:</td>
                                                    <td>Pass</td>
                                                </tr>
                                                <tr>
                                                    <td>Score:</td>
                                                    <td>85</td>
                                                </tr>
                                                <tr>
                                                    <td>Correct Questions:</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>Incorrect Questions:</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Skipped Questions:</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>
                                                <tr>
                                                    <td>Percentage:</td>
                                                    <td>85%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Second Test Card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Test Name 2 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Test Name 2 <i
                                                class="fas fa-times-circle text-danger"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-danger">
                                                    <td>Result:</td>
                                                    <td>Fail</td>
                                                </tr>
                                                <tr>
                                                    <td>Score:</td>
                                                    <td>85</td>
                                                </tr>
                                                <tr>
                                                    <td>Correct Questions:</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>Incorrect Questions:</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Skipped Questions:</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>
                                                <tr>
                                                    <td>Percentage:</td>
                                                    <td>85%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Third Test Card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Test Name 3 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Test Name 3 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-success">
                                                    <td>Result:</td>
                                                    <td>Pass</td>
                                                </tr>
                                                <tr>
                                                    <td>Score:</td>
                                                    <td>85</td>
                                                </tr>
                                                <tr>
                                                    <td>Correct Questions:</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>Incorrect Questions:</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Skipped Questions:</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>
                                                <tr>
                                                    <td>Percentage:</td>
                                                    <td>85%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- fourth Test card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Test Name 4 <i
                                                class="fas fa-times-circle text-danger"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Test Name 4 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-success">
                                                    <td>Result:</td>
                                                    <td>Pass</td>
                                                </tr>
                                                <tr>
                                                    <td>Score:</td>
                                                    <td>85</td>
                                                </tr>
                                                <tr>
                                                    <td>Correct Questions:</td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td>Incorrect Questions:</td>
                                                    <td>5</td>
                                                </tr>
                                                <tr>
                                                    <td>Skipped Questions:</td>
                                                    <td>3</td>
                                                </tr>
                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>
                                                <tr>
                                                    <td>Percentage:</td>
                                                    <td>85%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Main Interviews Content -->
                    <div class="tab-pane fade" id="contentTab2Icon1">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 p-4">
                            <!-- First Interview Card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Interview Name 1 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Interview Name 1 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-success">
                                                    <td>Result:</td>
                                                    <td>Pass</td>
                                                </tr>

                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Second Interview Card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Interview Name 2 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Interview Name 2 <i
                                                class="fas fa-times-circle text-danger"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-danger">
                                                    <td>Result:</td>
                                                    <td>Fail</td>
                                                </tr>

                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Third Interview Card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Interview Name 3 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Interview Name 2 <i
                                                class="fas fa-times-circle text-danger"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-danger">
                                                    <td>Result:</td>
                                                    <td>Fail</td>
                                                </tr>

                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- fourth card -->
                            <div class="col mb-3">
                                <div class="card hover">
                                    <div class="card-header">
                                        <h5 class="card-title">Interview Name 4 <i
                                                class="fas fa-check-circle text-success"></i></h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Interview Name 4 <i
                                                class="fas fa-times-circle text-danger"></i></h5>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr class="table-danger">
                                                    <td>Result:</td>
                                                    <td>Fail</td>
                                                </tr>

                                                <tr>
                                                    <td>Date:</td>
                                                    <td>January 3, 2024</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-primary">Start Test</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <?php include "models/jquery_model.php"; ?>

    <!-- Bootstrap 5 JS (Popper.js and Bootstrap JS) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> -->

</body>

</html>