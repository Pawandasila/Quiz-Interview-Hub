<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .user-image-container {
            position: relative;
            display: inline-block;
        }

        .user-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .user-image-container:hover .user-image-overlay {
            opacity: 1;
        }

        .user-image {
            object-fit: cover;
            border-radius: 50%;
            width: 100%;
            height: 100%;
        }

        .edit-icon {
            color: white;
        }

        .editable {
            border: 1px solid #007bff;
            padding: 3px;
            display: inline-block;
        }

        .counter-block {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background: linear-gradient(to right bottom, #4CAF50, #2196F3);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateZ(0);
        }

        .counter-item {
            margin-bottom: 20px;
            text-align: center;
        }

        .counter-content {
            padding: 20px;
            border-radius: 10px;
            background: linear-gradient(to right bottom, #ffffff, #f1f1f1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateZ(0);
        }

        .counter-content i {
            font-size: 3rem;
            margin-bottom: 10px;
            color: #007bff;
        }

        .counter-content p {
            margin: 0;
            color: #333;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center p-4">

    <div class="card user-card">
        <div class="card-header text-center">
            <h5 class="card-title">Profile Setting</h5>
        </div>
        <div class="card-body text-center">
            <div class="user-image-container">
                <img id="profile-image" src="https://bootdey.com/img/Content/avatar/avatar7.png"
                    class="user-image img-radius" alt="User-Profile-Image">
                <div class="user-image-overlay position-absolute top-0 start-0 rounded-circle">
                    <a href="#" class="edit-icon edit-button" data-bs-toggle="popover" data-bs-placement="right"
                        data-bs-trigger="manual" data-bs-html="true"
                        title='<div class="custom-popover-title">NOTE</div>' data-bs-content='Edit your content here.'>
                        <i class="fa fa-pencil"></i>
                    </a>
                </div>
            </div>
            <h6 class="f-w-600 mt-3 mb-2">
                <span contenteditable="true" class="editable">Alessa Robert</span>
                <a href="#" class="edit-icon edit-button" data-bs-toggle="popover" data-bs-placement="right"
                    data-bs-trigger="manual" data-bs-html="true" title='<div class="custom-popover-title">NOTE</div>'
                    data-bs-content='Edit your content here.'>
                    <i class="fa fa-pencil" style="color: black;"></i>
                </a>
            </h6>
            <p class="text-muted">
                <span contenteditable="true" class="editable">Male</span> | Born
                <span contenteditable="true" class="editable">23.05.1992</span>
                <a href="#" class="edit-icon edit-button" data-bs-toggle="popover" data-bs-placement="right"
                    data-bs-trigger="manual" data-bs-html="true" title='<div class="custom-popover-title">NOTE</div>'
                    data-bs-content='Edit your content here.'>
                    <i class="fa fa-pencil" style="color: black;"></i>
                </a>
            </p>
            <hr>
            <p class="text-muted mt-3">Activity Level: 87%</p>

            <ul class="list-unstyled activity-leval">
                <li class="active"></li>
                <li class="active"></li>
                <li class="active"></li>
                <li></li>
                <li></li>
            </ul>
            <div class="counter-block bg-c-blue mt-3 p-3">
                <div class="row">
                    <div class="col-4 counter-item">
                        <div class="counter-content">
                            <i class="fa fa-graduation-cap fa-3x mb-2"></i>
                            <p class="mb-0">Number of Tests Given</p>
                            <p>1256</p>
                        </div>
                    </div>
                    <div class="col-4 counter-item">
                        <div class="counter-content">
                            <i class="fa fa-users fa-3x mb-2"></i>
                            <p class="mb-0">Number of Interviews Given</p>
                            <p>8562</p>
                        </div>
                    </div>
                    <div class="col-4 counter-item">
                        <div class="counter-content">
                            <i class="fa fa-line-chart fa-3x mb-2"></i>
                            <p class="mb-0">Performance</p>
                            <p>189</p>
                        </div>
                    </div>
                </div>
            </div>

            <p class="mt-3 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <hr>
            <div class="row justify-content-center user-social-link">
                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function () {
            var profileFileInput = $('#profileFileInput');
            var profileImage = $('#profile-image');

            profileFileInput.on('change', function (event) {
                var file = event.target.files[0];
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        profileImage.attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
                $('#profileModal').modal('hide');
            });
        });

        $(document).ready(function () {
            $('.edit-button').on('click', function () {
                $(this).popover('show');
                var popover = $(this);
                setTimeout(function () {
                    popover.popover('dispose');
                }, 1540);
            });
        });

    </script>

</body>

</html>