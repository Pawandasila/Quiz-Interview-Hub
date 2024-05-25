<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Backend Website</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
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

        .table td {
            max-width: 150px;
            white-space: nowrap;
        }

        .table td[contenteditable="true"] {
            white-space: normal;
        }

        .table td input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
            white-space: wrap;
        }

        .table td[contenteditable="true"] input[type="text"] {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php include "navbar.php"; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            <?php include "sidebar.php"; ?>
            <!-- partial -->
            <div class="main-panel table-responsive" style="height: 50%; overflow: scroll">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">HR Request</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="myInput" placeholder="Search..." style="width: 20rem;border: 1px solid rgb(138, 138, 197);" />
                                    </div>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <hr style="margin-bottom: 20px" />
                    <div class="col-md-12 grid-margin stretch-card table-responsive">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Test Details</h4>
                                <form class="row g-3" method="post">
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Test name</label>
                                        <input type="text" class="form-control" id="TestName" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">Company name</label>
                                        <input type="text" class="form-control" id="CompanyName" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom04" class="form-label">Type of Test</label>
                                        <select class="form-select" id="testType" required>
                                            <option selected disabled value="">Select</option>
                                            <option value="Main">Main</option>
                                            <option value="Mock">Mock</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom05" class="form-label">Start Date And Time</label>
                                        <input type="datetime-local" class="form-control" id="startDateAndTime" required />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom05" class="form-label">End Date And Time</label>
                                        <input type="datetime-local" class="form-control" id="endDateAndTime" required />
                                    </div>
                                    <div class="col-md-3" style="padding: 1.8rem">
                                        <button class="btn btn-primary" id="add-section" type="submit">
                                            Add Section
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-bottom: 20px" />
                    <!-- table container -->
                    <div class="section" id="section">
                        <div id="sectionContent"></div>
                        <div class="button">
                            <button type="submit" id="SumbitForm" class="btn btn-info btn-hover">Done</button>
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

    <?php include "jquery.php"; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to add a new section
        $('.btn-info').hide();

        function addNewSection() {
            var sectionTemplate = `
            <form method="post" action="" class="section">
                <div class="col-md-12 grid-margin stretch-card table-responsive">
                    <div class="card">
                        <div class="card-body">
                            <div class="modal-header">
                                <div class="modal-title">
                                    Section
                                    <input type="text" class="form-control m-2" name="sectionName" placeholder="Enter The Section Name" required>
                                    <input type="file" class="form-control" id="data" name="data">
                                </div>
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>q.mo</th>
                                            <th style="width:70%">Question</th>
                                            <th>Option a</th>
                                            <th>Option b</th>
                                            <th>Option c</th>
                                            <th>Option d</th>
                                            <th>Correct Answer</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody id="category">
                                        <tr>
                                            <td><input type="text" value="1"></td>
                                            <td class="editable-cell"><input type="text" value="Tests details"></td>
                                            <td class="editable-cell"><input type="text" value="option a"></td>
                                            <td class="editable-cell"><input type="text" value="option b"></td>
                                            <td class="editable-cell"><input type="text" value="option c"></td>
                                            <td class="editable-cell"><input type="text" value="option d"></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <select class="form-select">
                                                        <option selected disabled>Select Answer</option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        <option value="4">Option 4</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" class="btn btn-danger delete-button">Remove</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-3">
                                        <button type="button" class="btn btn-danger add-row-button">Add New Row</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            `;
            
            $("#sectionContent").append(sectionTemplate);
            
            var $newSection = $("#sectionContent").children().last();
            handleSectionEvents($newSection);
            $('.btn-info').show();
        }

        // Function to handle events within a section
        function handleSectionEvents($section) {
            $section.find(".add-row-button").on("click", function() {
                var lastRowNumber = parseInt($section.find("#myTable tbody tr:last td:first input").val()) || 0;
                var newRowNumber = lastRowNumber + 1;
                var newRow = $section.find("#myTable tbody tr:first").clone();
                newRow.find("td:first input").val(newRowNumber);
                newRow.find(".editable-cell input").val("");
                $section.find("#myTable tbody").append(newRow);
            });

            $section.find('.delete-button').on("click", function() {
                $(this).closest('tr').remove();
            });

            $section.find("#data").on("change", function() {
                let selectedFile = this.files[0];
                if (selectedFile) {
                    let fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        let fileContent = e.target.result;
                        let lines = fileContent.split("\n");
                        let tbody = $section.find("#category");
                        tbody.empty();
                        lines.forEach(function(line, index) {
                            if (line.trim() !== "") {
                                let columns = line.split(",");
                                let newRow = "<tr>";
                                newRow += `<td><input type="text" value="${index + 1}"></td>`;
                                newRow += `<td contenteditable="true" class="editable-cell"><input type="text" value="${columns[0]}"></td>`;
                                for (let i = 1; i < 5; i++) {
                                    newRow += `<td contenteditable="true" class="editable-cell"><input type="text" value="${columns[i]}"></td>`;
                                }
                                let dropdownValues = columns.slice(1, 5);
                                newRow += `<td>
                                    <div class="d-flex justify-content-center">
                                        <select class="form-select">`;
                                dropdownValues.forEach((value, i) => {
                                    newRow += `<option value="${i + 1}" ${columns[5] == value ? "selected" : ""}>${value}</option>`;
                                });
                                newRow += `</select>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger delete-button">Remove</button>
                                    </div>
                                </td>`;
                                newRow += "</tr>";
                                tbody.append(newRow);
                            }
                        });
                    };
                    fileReader.readAsText(selectedFile);
                }
            });

            $section.find('.btn-close').on('click', function() {
                $section.remove();
            });
        }

        $(document).ready(function() {
            $("#add-section").on("click", function(e) {
                e.preventDefault();
                addNewSection();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#SumbitForm").click(function() {
                var testName = $('#TestName').val();
                var CompanyName = $('#CompanyName').val();
                var testType = $('#testType').val();
                var startDateAndTime = $('#startDateAndTime').val();
                var endDateAndTime = $('#endDateAndTime').val();
                alert(testName + ', ' + CompanyName + ', ' + testType + ', ' + startDateAndTime + ', ' + endDateAndTime);

                $.ajax({
                    url: "action.php",
                    type: "post",
                    data: {
                        action: 'insertdata',
                        testName: testName,
                        CompanyName: CompanyName,
                        testType: testType,
                        startDateAndTime: startDateAndTime,
                        endDateAndTime: endDateAndTime
                    },
                    success: function(response) {
                        location.reload();
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle AJAX errors
                        console.error(textStatus + ": " + errorThrown);
                    }
                });
            });
        });
    </script>
</body>

</html>
