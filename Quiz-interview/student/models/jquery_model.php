<!-- jQuery  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
  document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', event => {
      if (event.target.classList.contains('dropdown-toggle')) {
        event.target.classList.toggle('toggle-change');
      } else if (event.target.parentElement.classList.contains('dropdown-toggle')) {
        event.target.parentElement.classList.toggle('toggle-change');
      }
    });
  });
</script>


<script>
  $(document).ready(function() {
    $('#tabsIcon1 a').on('click', function(e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });
</script>


<script>
  $(document).ready(function() {
    $('.icon-item').click(function(e) {
      e.preventDefault();
      var targetModal = $(this).data('modal-target');
      $(targetModal).modal('toggle'); 
    });

    
    $('.modal').on('hidden.bs.modal', function() {
      
      $(this).find('form')[0].reset();
    });
  });
</script>


<script>
  function showTabs(iconId) {
    
    $('.model-container').hide();

    if (iconId == 'icon1') {
      $('#test_model').show();
      
      $('#tab1Icon1').addClass('active');
    } else if (iconId == 'icon2') {
      $('#interview_model').show();
      
      $('#tab1Icon2').addClass('active');
    } else if (iconId == 'icon3') {
      $('#pyq_model').show();
      
      $('#tab1Icon3').addClass('active');
    } else if (iconId == 'icon4') {
      $('#study_material').show();
      $('#tab1Icon4').addClass('active');
    } else {
      
      $('.model-container').hide();
    }
  }

  
  function redirectToGFG(topic) {
    const topicURLs = {
      'dsa': 'https://www.geeksforgeeks.org/data-structures/',
      'cpp': 'https://www.geeksforgeeks.org/c-plus-plus/',
      'java': 'https://www.geeksforgeeks.org/java/'
      
    };

    window.location.href = topicURLs[topic];
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  $(document).ready(function() {
    
    var data = {
      labels: ["Test 1", "Test 2", "Test 3", "Test 4", "Test 5"],
      datasets: [{
        data: [20, 30, 15, 25, 10],
        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#8BC34A", "#FF9800"],
        hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#8BC34A", "#FF9800"]
      }]
    };

    
    var ctx = $("#pieChart")[0].getContext("2d");


    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: data
    });
  });
</script>


<script>
  function showTestResults() {
    var selectedTest = $("#testDropdown").val();
    
    var testResultsData = {
      select: {
        result: "",
        subjects: [],
        percentage: "",
      },
      dsa: {
        result: "Pass",
        subjects: [{
            name: "Data Structures",
            marks: 90,
            grade: "A+",
            points: 4.0
          },
          {
            name: "Algorithms",
            marks: 85,
            grade: "A",
            points: 3.7
          },
          
        ],
        percentage: "92%", 
      },
      test2: {
        result: "Fail",
        subjects: [{
            name: "C++ Programming",
            marks: 70,
            grade: "B",
            points: 3.0
          },
          {
            name: "Software Engineering",
            marks: 65,
            grade: "B-",
            points: 2.7
          },
        
        ],
        percentage: "68%", 
      },
      test3: {
        result: "Pass",
        subjects: [{
            name: "Java Programming",
            marks: 88,
            grade: "A",
            points: 3.9
          },
          {
            name: "Web Development",
            marks: 80,
            grade: "A-",
            points: 3.5
          },
          
        ],
        percentage: "84%",
      },
    };

    
    var resultsContainer = $("#testResultsContainer");
    resultsContainer.empty();

    if (selectedTest in testResultsData) {
      var testResult = testResultsData[selectedTest];

      
      resultsContainer.append(`<p><strong>Name of Test:</strong> ${selectedTest}</p>`);
      resultsContainer.append(`<p><strong>Result of the Test:</strong> ${testResult.result}</p>`);


      var table = $("<table class='table table-borderless table-hover table-striped'>").append(`
    <thead>
      <tr>
        <th>Sr. No</th>
        <th>Subject</th>
        <th>Marks</th>
        <th>Grade</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>`);

      $.each(testResult.subjects, function(index, subject) {
        table.find('tbody').append(`<tr>
        <td>${index + 1}</td>
        <td>${subject.name}</td>
        <td>${subject.marks}</td>
        <td>${subject.grade}</td>
        <td>${subject.points}</td>
        <td>
          <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View Details">
            <i class="fas fa-info-circle"></i>
          </button>
        </td>
      </tr>`);
      });

      resultsContainer.append(table);

      
      resultsContainer.append(`<p><strong>Percentage:</strong> ${testResult.percentage}</p>`);
    }
  }
</script>





<script>
  $(document).ready(function() {

    $('#interviewerType').change(function() {
      showDropdown($(this).val());
    });

    function showDropdown(value) {
      var dropdown = document.getElementById("interviewerNames");
      dropdown.innerHTML = "";

      if (value === "HR") {
        var hrNames = ["John Doe", "Jane Smith", "Michael Johnson"];

        for (var i = 0; i < hrNames.length; i++) {
          var option = document.createElement("option");
          option.text = hrNames[i];
          option.value = hrNames[i];
          // alert(option.value);
          dropdown.add(option);
        }
      } else if (value === "Faculty") {
        var facultyNames = ["Dr. Smith", "Prof. Johnson", "Ms. Brown"];
        for (var j = 0; j < facultyNames.length; j++) {
          var option = document.createElement("option");
          option.text = facultyNames[j];
          option.value = facultyNames[j];
          dropdown.add(option);
        }
      }
    }
  });


  $(document).ready(function() {
    var companies = <?php echo json_encode($companies_name); ?>;
    var companiesRole = <?php echo json_encode($companies_role); ?>;

    $('#companyAvailable').change(function() {
      var selectedCompanyName = $(this).val();
      var roleSelect = $('#interviewName');
      roleSelect.empty();
      roleSelect.append('<option value="" selected disabled>Select a role</option>');


      var selectedCompanyIndex = companies.indexOf(selectedCompanyName);
      if (selectedCompanyIndex !== -1) {
        roleSelect.append(new Option(companiesRole[selectedCompanyIndex], companiesRole[selectedCompanyIndex]));
      }
    });
  });
</script>

<!-- study material -->


<!-- polar chart -->
<script>
  var ctxPA = document.getElementById("polarChart").getContext('2d');
  var myPolarChart = new Chart(ctxPA, {
    type: 'polarArea',
    data: {
      labels: ["DSA", "TOC", "Algorithms", "Database", "Networking"],
      datasets: [{
        data: [80, 65, 75, 90, 85],
        backgroundColor: ["rgba(219, 0, 0, 0.1)", "rgba(0, 165, 2, 0.1)", "rgba(255, 195, 15, 0.2)",
          "rgba(55, 59, 66, 0.1)", "rgba(0, 0, 0, 0.3)"
        ],
        hoverBackgroundColor: ["rgba(219, 0, 0, 0.2)", "rgba(0, 165, 2, 0.2)",
          "rgba(255, 195, 15, 0.3)", "rgba(55, 59, 66, 0.1)", "rgba(0, 0, 0, 0.4)"
        ]
      }]
    },
    options: {
      responsive: true,
      tooltips: {
        callbacks: {
          label: function(tooltipItem, data) {
            return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
          }
        }
      },
      scale: {
        ticks: {
          beginAtZero: true,
          max: 100,
          stepSize: 20
        },
        reverse: false
      },
      layout: {
        padding: {
          left: 10,
          right: 10,
          top: 20,
          bottom: 10
        }
      }
    }
  });
</script>


<script>
  $(document).ready(function() {
    
    $('.test-title').each(function() {
      var resultCell = $(this).siblings('.result-cell');
      var result = resultCell.text().trim().toLowerCase();

      if (result === 'pass') {
        resultCell.addClass('success');
      } else {
        resultCell.addClass('fail');
      }

      if (result === 'pass') {
        $(this).append('<i class="fas fa-check-circle text-success"></i>');
      } else {
        $(this).append('<i class="fas fa-times-circle text-danger"></i>');
      }
    });
  });
</script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
  $(document).ready(function() {
    $('.rzp-button').each(function() {
      $(this).on('click', function(e) {
        var cardId = $(this).data('id');
        var additionalData = {
          name: "Pawan",
          price: parseInt($('#Price').text().replace('₹', '')),
          email: "test@razorpay.com",
          contact: 1231223123
        };

        $.ajax({
          type: 'post',
          url: 'payment_process.php',
          data: {
            name: additionalData.name,
            price: additionalData.price,
            card_id: cardId
          },
          success: function(result) {
            var options = {
              "key": "rzp_test_LAhGZsvKSeGPAe",
              "amount": additionalData.price * 100,
              "currency": "INR",
              "name": additionalData.name,
              "description": "Payment for Interview",
              "image": "assets/logo.png",
              "handler": function(response) {
                $.ajax({
                  type: 'post',
                  url: 'payment_process.php',
                  data: {
                    payment_id: response.razorpay_payment_id,
                    card_id: cardId
                  },
                  success: function(result) {
                    console.log(result);
                    location.reload(); 
                  }
                });
              },
              "prefill": {
                "name": "Pawan",
                "email": "test@razorpay.com",
                "contact": "1231223123"
              },
              "notes": {
                "address": "Razorpay Corporate Office"
              },
              "theme": {
                "color": "#3399cc"
              }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
          }
        });
      });
    });
  });
</script>