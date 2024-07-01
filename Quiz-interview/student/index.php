
<?php
  session_start();
?>

<?php
  include "components/nav.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>


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
      overflow: hidden;
    }

    .nav-link {
      color: #007bff;
      border: none;
      border-radius: 0.25rem 0.25rem 0 0;
      margin-right: 2px;
      transition: background-color 0.3s, color 0.3s;
    }

    .nav-link:hover {
      background-color: rgba(203, 214, 175, 0.5);
      color: #0056b3;
     
    }

    @media (min-width: 768px) and (max-width: 1024px) {
      .order-md-1 {
        order: 2 !important;
      }

      .order-md-2 {
        order: 1 !important;
      }
    }

    .custom-btn {
      background-color: #e6005c;
      color: #fff;
      border: none;
      outline: none;
      padding: 10px 20px;
      border-radius: 5px;
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease-in-out;
      z-index: 1;
    }

    .custom-btn::before {
      content: "";
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background-color: rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      z-index: -1;
      transition: all 0.5s ease-in-out;
    }

    .custom-btn:hover {
      background-color: #e6005c;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    .custom-btn:hover::before {
      width: 200%;
      height: 200%;
      top: -50%;
      left: -50%;
    }
  </style>


</head>

<body>


  <div class="container-fluid">
    <div class="row">


      <?php
      include "components/user_profile_card.php";
      ?>


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
    document.addEventListener("contextmenu", function(e) {
      e.preventDefault();
    }, false);
  </script>


  <script>
    $(document).ready(function() {
      $('#Interview-form-submit').on('click', function(e) {

        e.preventDefault();


        var interviewerType = $('#interviewerType').val();
        var interviewerName = $('#interviewerNames').val();
        var name = $('#name').val();
        var course = $('#course').val();
        var branch = $('#branch').val();
        var companyAvailable = $('#companyAvailable').val();
        // alert(companyAvailable)
        var interviewRole = $('#interviewName').val();
        var interviewDateTime = $('#interviewDateTime').val();

 
        $.ajax({
          url: 'action.php',
          type: 'POST',
          data: {
            action: 'setInterviewDetails',
            interviewerType: interviewerType,
            interviewerName: interviewerName,
            name: name,
            course: course,
            branch: branch,
            companyAvailable: companyAvailable,
            interviewRole: interviewRole,
            interviewDateTime: interviewDateTime
          },
          success: function(data) {
            alert(data);
            $('#interviewerType').val("");
            $('#interviewerNames').val("");
            $('#name').val("");
            $('#course').val("");
            $('#branch').val("");
            $('#companyAvailable').val("");
            $('#interviewName').val("");
            $('#interviewDateTime').val("");
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert('AJAX request failed: ' + textStatus + ', ' + errorThrown);
          }
        });
      });
    });
  </script>



</body>

</html>