<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Responsive Registration Form | CodingLab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .container {
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
            color: #59238F;
            margin-bottom: 20px;
        }

        /* .container .title::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            border-radius: 5px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        } */

        .content form .user-details .input-box input,
        .content form .gender-details .gender-title,
        .content form .button input {
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            border-color: #9b59b6;
            color: #fff;
            padding: 12px;
        }

        .content form .user-details .input-box input:focus,
        .content form .user-details .input-box input:valid,
        .content form .gender-details .category label .dot.one,
        .content form .gender-details .category label .dot.two,
        .content form .gender-details .category label .dot.three,
        .content form .button input:hover {
            background: linear-gradient(-135deg, #71b7e6, #9b59b6);
            color: #fff;
        }

        input[type="text"] {
            padding: 15px;
        }

        input[type="number"] {
            padding: 15px;
        }

        input[type="email"] {
            padding: 15px;
        }
    </style>
</head>



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

$errors = array(); // Array to store validation errors

if (isset($_POST['register'])) {

    // Validate First Name
    if (empty($_POST['Fname'])) {
        $errors['Fname'] = "Please enter your first name.";
    }

    // Validate Last Name
    if (empty($_POST['Lname'])) {
        $errors['Lname'] = "Please enter your last name.";
    }

    // Validate Email
    if (empty($_POST['email'])) {
        $errors['email'] = "Please enter your email.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    // Validate Phone Number
    if (empty($_POST['phone'])) {
        $errors['phone'] = "Please enter your phone number.";
    }

    // Validate Password
    if (empty($_POST['password'])) {
        $errors['password'] = "Please enter a password.";
    }

    // Validate Confirm Password
    if (empty($_POST['confirm-pass'])) {
        $errors['confirm-pass'] = "Please confirm your password.";
    } elseif ($_POST['password'] !== $_POST['confirm-pass']) {
        $errors['confirm-pass'] = "Passwords do not match.";
    }

    // Validate College Name
    if (empty($_POST['college-name'])) {
        $errors['college-name'] = "Please select your college.";
    }

    // Check if there are no validation errors
    if (empty($errors)) {

        // Hash the password
        $hashedPassword = $_POST['password'];

        // Check if the email already exists
        $stmt = mysqli_prepare($con, "SELECT * FROM teacher_login WHERE Email = ?");
        mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $errors['email'] = "Please select a different email as it already exists";
        } else {
            // Use prepared statement for insertion
            $stmt = mysqli_prepare($con, "INSERT INTO `teacher_login`(`Fname`, `Lname`, `Email`, `Password`, `SubjectId`, `ClgName`, `Available`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $available = 1; // Assuming 1 represents available
            mysqli_stmt_bind_param($stmt, "ssssssi", $_POST['Fname'], $_POST['Lname'], $_POST['email'], $hashedPassword, $_POST['phone'], $_POST['college-name'], $available);
            mysqli_stmt_execute($stmt);

            // Redirect to success page or display success message
            echo '<div class="alert alert-success" role="alert">Registration successful</div>'; 
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($con);


?>

<!-- Your HTML Form with Bootstrap Feedback Classes -->

<body>
    <div class="container mt-5">
        <div class="card mx-auto border-0">
            <div class="card-body">
                <div class="title text-center">Registration Yourself</div>
                <form action="#" method="post" class="needs-validation" novalidate>
                    <div class="row g-5">
                        <div class="col-md-6 form">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control <?php echo isset($errors['Fname']) ? 'is-invalid' : ''; ?>" name="Fname" id="firstName" placeholder="Enter your first name" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['Fname']) ? $errors['Fname'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control <?php echo isset($errors['Lname']) ? 'is-invalid' : ''; ?>" name="Lname" id="lastName" placeholder="Enter your last name" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['Lname']) ? $errors['Lname'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" name="email" id="email" placeholder="Enter your email" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['email']) ? $errors['email'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="number" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>" name="phone" id="phone" placeholder="Enter your number" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['phone']) ? $errors['phone'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" name="password" id="password" placeholder="Enter your password" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['password']) ? $errors['password'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control <?php echo isset($errors['confirm-pass']) ? 'is-invalid' : ''; ?>" name="confirm-pass" id="confirmPassword" placeholder="Confirm your password" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['confirm-pass']) ? $errors['confirm-pass'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" class="form-control <?php echo isset($errors['photo']) ? 'is-invalid' : ''; ?>" id="photo" name="photo" required>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['photo']) ? $errors['photo'] : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="clgName" class="form-label">College Name</label>
                            <select class="form-select <?php echo isset($errors['college-name']) ? 'is-invalid' : ''; ?>" id="clgName" name="college-name" required>
                                <option value="" disabled selected>Select your college</option>
                                <option value="college1">College 1</option>
                                <option value="college2">College 2</option>
                                <option value="college3">College 3</option>
                            </select>
                            <div class="invalid-feedback">
                                <?php echo isset($errors['college-name']) ? $errors['college-name'] : ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enable Bootstrap 5 validation styles
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>

</html>