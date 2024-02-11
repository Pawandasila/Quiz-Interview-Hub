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
    <style>
        .card {
            margin: 0;
        }

        @media (max-width: 576px) {
            .col-lg-6 {
                width: 100%;
            }
        }

        i:hover {
            cursor: pointer;
        }

        .sort-icon {
            font-size: 12px;
            /* Adjust the font size as needed */
            margin-left: 4px;
            height: 20px;
            width: 20px;
            background-color: red;
            border-radius: 50%;
            /* Add some spacing between the name and the icon */
        }

        .sort-icon:hover {
            cursor: pointer;

        }

        /* Style the tabs container */
        .tabs-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f0f0f0;
            /* Add your desired background color */
            padding: 10px;
        }

        /* Style the tabs */
        .tabs {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
            align-content: flex-start;
            flex-wrap: nowrap;
            /* justify-content: center; */
            align-items: center;
            gap: 7px;
            flex-direction: row;

        }

        .tabs li {
            margin-right: 20px;
            /* Adjust the spacing between tabs */
        }

        .tabs a {
            text-decoration: none;
            color: #333;
            font-weight: 900;
            font-size: 17px;
            padding: 5px 10px;
            background: rgb(231, 202, 54);
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .tabs a.active {
            background: #3366FF;
            /* Change this to your desired active background color */
            color: #fff;
            /* Change this to your desired active text color */
        }


        .tabs a:hover {
            background-color: #b4e186;
            /* Add a background color for the hover effect */
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
            <div class="main-panel" style=" height: 50%; overflow: scroll;">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Food Order </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">Search</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="breadcrumb-item">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addRowModal">Add New
                                        Row
                                    </button>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-12 stretch-card">
                        <div class="card table-responsive">
                            <div class="card-body">
                                <h4 class="card-title">Table with contextual classes</h4>
                                <p class="card-description"> Add class <code>.table-{color}</code>
                                </p>
                                <table class="table table-bordered table responsive table-hover">
                                    <thead>
                                        <tr>
                                            <th> ShopId </th>
                                            <th> Shop name </th>
                                            <th> Shop Description </th>
                                            <th> Shopkeeper Name </th>
                                            <th> Usename </th>
                                            <th> Contact Number </th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">

                                        <?php
                                                $result=mysqli_query($con,"SELECT * FROM shops"); 
                                                
                                                while($row=mysqli_fetch_array($result)){
                                                    $shopids= $row['ShopId'];
                                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['ShopID'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['ShopName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['ShopkeeperName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['ShopDescription'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['UserName'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['ContactNo'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                                }

                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                        // if(isset($_POST['update'])){
                        //     // echo '<script> alert("hello");</script>';
                        //     $ShopName = $_POST["newCategory"];
                        //     $shopkeeperName = $_POST["shopkeeperName"];
                        //     $ShopDescription = $_POST["newItem"];
                        //     $username = $_POST["username"];
                        //     $contactNo = $_POST["contactNo"];
                            
                        //     $sql = "INSERT INTO `shops`( `ShopName`, `ShopkeeperName`, `ShopDescription`, `UserName`, `ContactNo`) VALUES ('$ShopName','$shopkeeperName','$ShopDescription','$username',$contactNo)";

                        //     $result = mysqli_query($con,$sql);
                        // }
                    ?>

                    <!-- add new row -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="addRowModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addRowModalLabel">Add New Row</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="addRowForm" method="post">
                                    <div class="modal-body">
                                        <!-- Add input fields for adding new row here -->
                                        <div class="form-group">
                                            <label for="newCategory">shopName</label>
                                            <input type="text" class="form-control" id="newCategory" name="newCategory"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newItem">Shopkeeper Name</label>
                                            <input type="text" class="form-control" id="shopkeeperName"
                                                name="shopkeeperName" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newItem">Shop description</label>
                                            <input type="text" class="form-control" id="newItem" name="newItem"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newItem">username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="newItem">ContactNo</label>
                                            <input type="text" class="form-control" id="contactNo" name="contactNo"
                                                required>
                                        </div>
                                        <!-- Add more input fields as needed -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                            <button type="submit" id="btn-click" class="btn btn-primary" name="update">Add Row</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





                    <!-- content-wrapper ends -->
                    <!-- partial:../../partials/_footer.html -->
                    <footer class="footer">
                        <div class="container-fluid d-flex justify-content-between">
                            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                                bootstrapdash.com
                                2021</span>
                            <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a
                                    href="https://www.bootstrapdash.com/bootstrap-admin-template/"
                                    target="_blank">Bootstrap
                                    admin
                                    template</a> from Bootstrapdash.com</span>
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



  <!-- Include Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <!-- Include your custom scripts after including jQuery, Popper.js, and Bootstrap JS -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/file-upload.js"></script>

        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="../../assets/js/file-upload.js"></script>
        <!-- End custom js for this page -->

        <script>

            $('#addRowForm').on('submit', function (e) {
                e.preventDefault();
                category = $('#newCategory').val();
                shopkeeperName = $('#shopkeeperName').val();
                newItem = $('#newItem').val();
                username = $('#username').val();
                contactNo = $('#contactNo').val();

                var shopid = <?php  echo $shopid; ?>;
                
                td = "<tr><td>" + shopid + "</td>"
                td += "<td>" + category + "</td>"
                td += "<td>" + shopkeeperName + "</td>"
                td += "<td>" + newItem + "</td>"
                td += "<td>" + username + "</td>"
                td += "<td>" + contactNo + "</td></tr>";
                $('#data').append(td);
                // alert("hello world");
                $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: 'action=insertdata&category=' + category + '&shopkeeperName=' + shopkeeperName + '&newItem=' + newItem + '&username=' + username + '&contactNo=' + contactNo,
                    success: function (data) {
                        alert('AJAX request successful');
                        console.log('Response from server:', data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert('AJAX request failed:', textStatus, errorThrown);
                    }
                });
            })
        </script>


</body>

</html>