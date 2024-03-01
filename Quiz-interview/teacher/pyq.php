<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

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
                                                <th>Upload Method</th>
                                                <th>Action</th>
                                                <th>Respnse</th>
                                            </tr>
                                        </thead>
                                        <tbody id='category' class="text-center">
                                            <tr>
                                                <td>1</td>
                                                <!-- Button trigger modal -->
                                                <td id="TopicName">Main</td>
                                                <td>
                                                    <button type="button" class="btn btn-hover btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="fas fa-upload"></i> file
                                                    </button>

                                                    <button type="button" class="btn btn-hover btn-primary" data-bs-toggle="modal" data-bs-target="#linkModal">
                                                        <i class="fas fa-upload"></i> Link
                                                    </button>

                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <div class="mx-1"></div>
                                                        <button class="btn btn-warning btn-hover edit-link">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <div class="mx-1"></div>
                                                        <button type="button" class="btn btn-danger btn-hover delete-button">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td>
                                                    <!-- Add an id attribute to the submit button for easy reference -->
                                                    <button class="btn btn-hover btn-success done-button" type="submit" id="submitData">
                                                        <i class="fas fa-check"></i>Submit
                                                    </button>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for file upload -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="fileForm">
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Enter Topic Name</label>
                                        <input type="text" class="form-control" id="text">
                                    </div>
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Choose File:</label>
                                        <input type="file" class="form-control" id="file">
                                        <div id="file-name"></div> <!-- Display file name here -->
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="uploadFile">Upload</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="linkForm">
                                    <div class="mb-3">
                                        <label for="Linktext" class="form-label">Enter Topic Name</label>
                                        <input type="text" class="form-control" id="LinkTopic">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Linktext" class="form-label">Enter Link Text</label>
                                        <input type="text" class="form-control" id="Linktext">
                                    </div>
                                    <!-- Add other necessary fields for the link form -->
                                    <button type="submit" class="btn btn-primary" id="uploadLink">Upload</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['submitData'])) {
            // Retrieve data from the form
            $linkTopic = $_POST['LinkTopic'];
            $linkText = $_POST['Linktext'];
            $dateTime = date('Y-m-d H:i:s'); // Current date and time

            // Generate a random company name
            $companyName = generateRandomString();

            // Check if a file has been uploaded
            if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                // File upload path
                $uploadDir = 'uploads/'; // Directory where the uploaded files will be stored
                $uploadedFile = $uploadDir . basename($_FILES['file']['name']); // Path to the uploaded file

                // Move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile)) {
                    // Insert data into the database
                    $query = "INSERT INTO `pyq`(`teacherid`, `company_name`, `uploaded_file`, `date`, `time`) 
                          VALUES ('1', '$linkTopic', '$uploadedFile', '$dateTime', NOW())";
                    mysqli_query($con, $query); // Execute the query to insert data into the database
                    echo "File uploaded successfully."; // Output success message
                } else {
                    echo "Error uploading file."; // Output error message if file upload fails
                }
            } else {
                // Insert link data into the database
                $query = "INSERT INTO `pyq`(`teacherid`, `company_name`, `link`, `date`, `time`) 
                  VALUES ('1', '$linkTopic', '$linkText', '$dateTime', NOW())";
                mysqli_query($con, $query);
                echo "Link added successfully.";
            }
        }
    }

    // Function to generate a random string for company name
    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    ?>

    <?php
    include "jquery.php";
    ?>

    <script>
        $(document).ready(function() {
            // Handle form submission for file upload
            $('#fileForm').on('submit', function(event) {
                event.preventDefault();
                let linkText = $('#text').val();
                let topicName = $('#text').val();
                // Perform actions related to file upload
                // console.log('Topic Name: ', topicName);
                $('#TopicName').text(linkText);
                // You can further process file upload here
                $('#exampleModal').modal('hide');
            });

            // Handle form submission for link upload
            $('#linkForm').on('submit', function(event) {
                event.preventDefault();
                let LinkTopic = $('#LinkTopic').val();
                // Update the topic name with the link text
                $('#TopicName').text(LinkTopic);
                // You can perform other actions related to link upload
                $('#linkModal').modal('hide');
            });
        });

    </script>



    <!-- End custom js for this page -->
</body>

</html>`