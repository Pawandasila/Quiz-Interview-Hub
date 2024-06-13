

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            scroll-behavior: smooth;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .option {
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .option:hover {
            background-color: #f0f0f0;
        }

        .option-selected {
            background-color: #e9ecef !important;
        }

        .correct-answer {
            /* display: ; */
            font-style: italic;
            color: #28a745;
        }

        .icon {
            font-size: 1.2em;
            margin-right: 5px;
        }

        .correct-icon {
            color: #28a745;
            display: none;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="d-flex justify-content-around">

    <div class="container">
        <div class="row">
            <!-- User Details Section -->
            <div class="col-md-4">
                <div class="alert alert-primary mt-4" role="alert">
                    <h4 class="alert-heading text-center">User Details</h4>
                    <hr>
                    <div class="row justify-content-center">
                        <div class="text-center mb-4">
                            <img src="https://th.bing.com/th/id/OIP.Rg2FmvXuSaiA7GHVqvuY0QHaFj?w=279&h=209&c=7&r=0&o=5&dpr=1.3&pid=1.7" class="rounded-circle img-fluid" alt="User Image" width="200" height="200">
                        </div>

                        <div class="col-md-12 mt-4">
                            <table class="text-center table table-hover table-borderless table-primary">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td class="p-3 ">John Doe</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Student ID</th>
                                        <td class="p-3">123456</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Course</th>
                                        <td class="p-3">Computer Science</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Exam Date</th>
                                        <td class="p-3">January 28, 2024</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Score</th>
                                        <td class="p-3">67%</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Grade</th>
                                        <td class="p-3">B</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Test Details and Questions Section -->
            <div class="col-md-8">
                <div class="container mt-4">
                    <!-- Main Tabs -->
                    <ul class="nav nav-tabs" id="mainTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="true">Test Details</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="mainTabsContent">
                        <!-- Test Details Tab -->
                        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="card mt-3">
                                <div class="card-header">
                                    Test Details
                                </div>
                                <div class="card-body">
                                    <div class="row row-cols-1 row-cols-md-3 ">

                                    <?php 
                                    $var = 123;
                                    if($var == 123 ){
                                    ?>
                                        <div class="col">
                                            <div class="card h-100 bg-success text-white">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">Test Result</h5>
                                                    <p class="card-text"><i class="fas fa-check-circle"></i> Passed</p>
                                                </div>
                                            </div>

                                        </div>

                                        <?php
                                        }
                                        else{
                                        ?>

                                        <div class="col">
                                            <div class="card h-100 bg-success text-white">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">Disqualified</h5>
                                                    <p class="card-text"><i class="fas fa-check-circle"></i> <?php echo $var ?> </p>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JavaScript for functionality -->


</body>

</html>