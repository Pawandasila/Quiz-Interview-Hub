<!DOCTYPE html>
<html lang="en">

<head>

  <!-- header files -->

  <?php 
  include "components/head.php";
  ?>

  <style>

    .profile-pic {
      display: inline-block;
      vertical-align: middle;
      width: 50px;
      height: 50px;
      overflow: hidden;
      border-radius: 50%;
    }

    .profile-pic img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .profile-menu .dropdown-menu {
      right: 0;
      left: unset;
    }

    .profile-menu .fa-fw {
      margin-right: 10px;
    }

    .toggle-change::after {
      border-top: 0;
      border-bottom: 0.3em solid;
    }

    .second-div {
      background-color: white;
      padding: 20px;
      margin-top: 35px;
    }

    .icon-container {
      display: flex;
      justify-content: space-around;
      align-content: center;
      background-color: #1E90FF;
      height: 12rem;
      border-bottom-left-radius: 12px;
      border-bottom-right-radius: 12px;
    }

    .searchbar {
      padding: 12px 12px;
      display: flex;
      background-color: #6495ED;
      justify-content: flex-end;
      align-items: center;
      flex-grow: 1;
      border-bottom: 2px solid black;
      border-top-right-radius: 12px;
      border-top-left-radius: 12px;
    }

    .searchbar input {
      padding: 3px 10px;
      text-align: center;
      border-radius: 12px;
      background-color: white;
      border: 3px solid #6495ED;
    }


    .icon-item {
      text-align: center;
      margin-top: 57px;
      /* background-color: #fff; */
      height: 5.5rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .icon-item i {
      font-size: 3rem;
      color: white;
    }

    .icon-item i:hover {
      color: black;
      box-shadow: 0px 0px 0px rgba(255, 255, 255, 0.7);
      /* Adjust the values for your preferred glow effect */
    }

    .icon-item i,
    .icon-item p:hover {
      cursor: pointer;
    }

    .icon-container a {
      text-decoration: none;
      color: black;
    }

    .nav-tabs {
      background-color: rgba(216, 219, 208, 0.5);
      border-radius: 0.25rem;
      /* Adjust the border-radius as needed */
      overflow: hidden;
    }

    .nav-link {
      color: #007bff;
      /* Default tab text color */
      border: none;
      border-radius: 0.25rem 0.25rem 0 0;
      /* Adjust the border-radius as needed */
      margin-right: 2px;
      transition: background-color 0.3s, color 0.3s;
    }

    .nav-link:hover {
      background-color: rgba(203, 214, 175, 0.5);
      /* Lighten the background on hover */
      color: #0056b3;
      /* Darken the text color on hover */
    }

    @media (min-width: 768px) and (max-width: 1024px) {
      .order-md-1 {
        order: 2 !important;
      }

      .order-md-2 {
        order: 1 !important;
      }
    }

    /* .first-div{
      background-color: #3D3B3C !important;
    }

    .template{
      background-color: #3D3B3C !important;
    }

    .second-div{
      background-color: #3D3B3C;
    } */

  </style>


</head>

<body>

  <!-- navbar -->
  <?php
  include "components/nav.php";
  ?>

  <div class="container-fluid">
    <div class="row">

      <!-- First div -->
      <?php
      include "components/user_profile_card.php";
      ?>

      <!-- Second div with 70% width -->
      <div class="col-12 col-md-8 second-div order-md-1">
        <div class="searchbar">
          <input type="search" name="search" id="Searchbar" placeholder="Enter to search ">
        </div>
        <div class="icon-container">
          <a href="#" class="icon-item" onclick="showTabs('icon1')">
            <i class="fas fa-clipboard-list"></i>
            <p>Test</p>
          </a>

          <a href="#" class="icon-item" onclick="showTabs('icon2')">
            <i class="fas fa-user-tie"></i>
            <p>Interview</p>
          </a>

          <a href="#" class="icon-item" onclick="showTabs('icon3')">
            <i class="fas fa-book"></i>
            <p>Study Material</p>
          </a>

          <a href="#" class="icon-item" onclick="showTabs('icon4')">
            <i class="fas fa-history"></i>
            <p>PYQ</p>
          </a>
        </div>

        <hr style="border: 2px solid black;">

        <?php 
        include "models/test_model.php";
        ?>

        <?php 
        include "models/interview_model.php";
        ?>


        <?php
        include "models/pyq_model.php";
        ?>

        <?php
        include "models/study_material_model.php"
        ?>

      </div>
    </div>
  </div>



  <?php
  include "models/jquery_model.php";
  ?>

  <script>
    document.addEventListener("contextmenu", function (e) {
      e.preventDefault();
    }, false);
  </script>

</body>

</html>