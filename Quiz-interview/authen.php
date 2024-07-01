<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login/Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="section">
        <div class="container">
            <form id="signin" method="post" action="sign-in.php">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <h6 class="mb-0 pb-3"><span>Log In </span>/<span>Sign Up</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <h4 class="mb-4 pb-3">Log In</h4>
                                                <div class="form-group">
                                                    <input type="text" name="username" class="form-style" placeholder="Your Email" id="username" autocomplete="none">
                                                    <i class="input-icon fa fa-at"></i>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="none">
                                                    <i class="input-icon fa fa-lock"></i>
                                                </div>
                                                <button type="submit" name="login" class="btn mt-4">Login</button>
                                                <p class="mb-0 mt-4 text-center">
                                                    <a href="#0" class="link">Forgot your password?</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
            </form>
            <form id="registrationForm" method="post" action="sign-up.php">
                <div class="card-back">
                    <div class="center-wrap">
                        <div class="section text-center">
                            <h4 class="mb-4 pb-3 mt-4">Sign Up</h4>
                            <div class="form-group row">
                                <div class="input-container">
                                    <input type="text" name="firstname" class="form-style" placeholder="Your Name" id="logname" autocomplete="none" required>
                                    <i class="input-icon fa fa-user"></i>
                                    <div class="error-message" id="nameError"></div>
                                </div>
                                <div class="input-container">
                                    <input type="text" name="logusername" class="form-style" placeholder="Your username" id="logusername" autocomplete="none" required>
                                    <i class="input-icon fa fa-at"></i>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-container">
                                    <input type="text" name="college" class="form-style" placeholder="College" id="college" autocomplete="none">
                                    <i class="input-icon fa fa-university"></i>
                                </div>
                                <div class="input-container">
                                    <input type="text" name="course" class="form-style" placeholder="Course" id="course" autocomplete="none">
                                    <i class="input-icon fa fa-book"></i>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-container">
                                    <input type="text" name="branch" class="form-style" placeholder="Branch" id="branch" autocomplete="none">
                                    <i class="input-icon fa fa-graduation-cap"></i>
                                </div>
                                <div class="input-container">
                                    <input type="number" name="semester" class="form-style" placeholder="Semester" id="semester">
                                    <i class="input-icon fa fa-list-alt"></i>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="input-container">
                                    <input type="date" name="dob" class="form-style" placeholder="Date of Birth" id="dob">
                                    <i class="input-icon fa fa-calendar"></i>
                                </div>
                                <div class="input-container">
                                    <input type="number" name="phoneNum" class="form-style" placeholder="Your Phone Number" id="phoneNum" autocomplete="none" required>
                                    <div class="error-message" id="phoneNumError"></div>
                                    <i class="input-icon fa fa-phone"></i>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="input-container">
                                    <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="none" required>
                                    <div class="error-message" id="logpassError"></div>
                                    <i class="input-icon fa fa-lock"></i>
                                </div>
                                <div class="input-container">
                                    <input type="password" name="logrepass" class="form-style" placeholder="Re-Password" id="logrepass" autocomplete="none" required>
                                    <div class="error-message" id="logrepassError"></div>
                                    <i class="input-icon fa fa-lock"></i>
                                </div>
                            </div>
                            <button type="submit" name="Signup" class="btn mt-4">Signup</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>


    <script>
        // Toggle Login/Signup forms
        document.querySelector("#reg-log").addEventListener("change", function() {
            document.querySelector(".card-3d-wrap").classList.toggle("clicked");
        });
    </script>
</body>

</html>