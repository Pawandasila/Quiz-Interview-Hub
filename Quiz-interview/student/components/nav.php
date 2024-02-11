<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Logo on the left -->
      <a class="navbar-brand" href="#">
        <img src="path/to/your/logo.png" alt="Logo">
      </a>

      <!-- Toggler button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar items -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"
          style="gap: 1rem; display: flex; justify-content: center; align-items: center;">
          <!-- Home and Dashboard links on the right -->
          <li class="nav-item">
            <a class="nav-link" href="index.php"> <i class="fa fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#"> <i class="fa fa-user"></i> Your Name</a>
          </li>

          <!-- Profile dropdown on the right -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="profile-pic">
                <img src="https://picsum.photos/id/1015/250/250" alt="Random Person Image">
              </div>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="position: absolute; left: -53px;">
              <li><a class="dropdown-item" href="#"><i class="fas fa-sliders-h fa-fw"></i> Account</a></li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
