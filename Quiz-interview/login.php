<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login/Signup Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url(https://i.ibb.co/VQmtgjh/6845078.png) no-repeat;
            height: 100vh;
            font-family: sans-serif;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .card {
            width: 20rem;
        }

        .user-wrapper {
            text-align: center;
        }

        .user {
            margin: 0 auto;
            display: block;
            margin-bottom: 20px;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-control {
            border-color: 0 0 5px rgba(0, 255, 0, .3);
            outline: none;
            height: 40px;
            /* color: #fff; */
            background: transparent;
            font-size: 16px;
            padding-left: 20px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        .form-control:hover,
        .form-control:focus {
            border-color: #42F3FA;
            color: black;
            box-shadow: 0 0 5px rgba(0, 255, 0, .3), 0 0 10px rgba(0, 255, 0, .2), 0 0 15px rgba(0, 255, 0, .1), 0 2px 0 black;
        }

        .btn-primary {
            background-color: #59238F;
            border: none;
        }

        .btn-primary:hover {
            background-color: #42F3FA;
        }

        a {
            color: #262626;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        a:hover {
            color: #00ffff;
        }

        p {
            color: #0000ff;
        }

        input[type="text"],
        input[type="password"] {
            padding: 20px;
        }
    </style>
</head>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";

$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// if (isset($_POST["login"])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // $username = trim($_POST['username']);
        // $password = ($_POST['password']);
        
        // $query = "SELECT * FROM student_login WHERE email = '$username'";
        // $result = mysqli_query($con, $query);
        // Query to check if the username exists
    
        // if ($result && mysqli_num_rows($result) > 0) {
        //     $row = mysqli_fetch_assoc($result);
        //     $hashedPassword = $row['password'];
    
        //     echo "<script>alert('Entered Password: " . $password . "');</script>";
        //     echo "<script>alert('Hashed Password from Database: " . $hashedPassword  . "');</script>";
    
        //     // Check if the entered password matches the hashed password
        //     $ans = password_verify($password, $hashedPassword);
    
        //     echo "<script>alert('".$ans."')</script>";
    
        //     if ($ans) {
        //         echo '<script>alert("Login successful");</script>';
        //     } else {
        //         echo '<script>alert("Invalid username or password");</script>';
        //     }
        // } else {
        //     echo '<script>alert("Invalid username or password");</script>';
        // }

        $pass = mysqli_query($con, "SELECT * FROM `student_login` WHERE `email` = '".$_POST['username']."'");
        $pass_veri = mysqli_fetch_assoc($pass);

        $newpass = $pass_veri['password'];

        if(password_verify($_POST['password'], $newpass)){
            echo "<script>alert('Confirm Password')</script>";
        }else{
            echo "<script>alert('not ')</script>";
        }
    }
    mysqli_close($con);

?>

<body>

    <div class="container mt-5">
        <div class="card mx-auto">
            <div class="card-body">
                <div class="user-wrapper">
                    <img class="user mb-3" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
                </div>
                <form id="signup-form" class="needs-validation" action="index.php" novalidate>
                    <div class="mb-4">
                        <input type="email" class="form-control" name="username" placeholder="Username" required>
                        <div class="invalid-feedback">
                            Please enter your username.
                        </div>
                    </div>
                    <div class="mb-4">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary m-3 d-flex justify-content-center align-items-center">
                        Login
                    </button>
                </form>
                <span>Already have an account? </span>
                <a href="sign-up.php">Sign up</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        // Enable Bootstrap validation styles
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