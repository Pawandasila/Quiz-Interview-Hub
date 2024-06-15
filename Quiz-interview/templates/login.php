<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login/Signup</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="section">
    <div class="container">
      <form id="loginForm" method="post" action="/login">
        <div class="row full-height justify-content-center">
          <div class="col-12 text-center align-self-center py-5">
            <div class="section pb-5 pt-5 pt-sm-2 text-center">
              <h6 class="mb-0 pb-3">Log In</h6>
              <div class="form-group">
                <input type="text" name="username" class="form-style" placeholder="Your Email" id="username" autocomplete="off" required>
                <i class="input-icon fa fa-at"></i>
              </div>
              <div class="form-group mt-2">
                <input type="password" name="password" class="form-style" placeholder="Your Password" id="password" autocomplete="off" required>
                <i class="input-icon fa fa-lock"></i>
              </div>
              <button type="submit" class="btn mt-4">Login</button>
              <p class="mb-0 mt-4 text-center">
                <a href="#">Forgot your password?</a>
              </p>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
