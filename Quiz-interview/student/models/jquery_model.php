<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Bootstrap 5 CSS and JS -->
<!-- Bootstrap 5 JavaScript and Popper.js -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Dropdown Toggle Script -->
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

<!-- Tab Switching Script -->
<script>
  $(document).ready(function() {
    $('#tabsIcon1 a').on('click', function(e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });
</script>

<!-- Modal Toggle Script -->
<script>
  $(document).ready(function() {
    $('.icon-item').click(function(e) {
      e.preventDefault();
      var targetModal = $(this).data('modal-target');
      $(targetModal).modal('toggle'); // 'toggle' instead of 'show'
    });

    // Handle close button click within the modal
    $('.modal').on('hidden.bs.modal', function() {
      // Optional: reset form fields on modal close
      $(this).find('form')[0].reset();
    });
  });
</script>

<!-- Tabs Display Script -->
<script>
  function showTabs(iconId) {
    // Hide all content blocks initially
    $('.model-container').hide();

    // Show the corresponding model based on the clicked icon
    if (iconId == 'icon1') {
      $('#test_model').show();
      // Optionally, set default active tab
      $('#tab1Icon1').addClass('active');
    } else if (iconId == 'icon2') {
      $('#interview_model').show();
      // Optionally, set default active tab
      $('#tab1Icon2').addClass('active');
    } else if (iconId == 'icon3') {
      $('#pyq_model').show();
      // Optionally, set default active tab
      $('#tab1Icon3').addClass('active');
    } else if (iconId == 'icon4') {
      $('#study_material').show();
      $('#tab1Icon4').addClass('active');
    } else {
      // Hide all models when no specific icon is clicked
      $('.model-container').hide();
    }
  }

  // Redirect to GeeksforGeeks
  function redirectToGFG(topic) {
    const topicURLs = {
      'dsa': 'https://www.geeksforgeeks.org/data-structures/',
      'cpp': 'https://www.geeksforgeeks.org/c-plus-plus/',
      'java': 'https://www.geeksforgeeks.org/java/'
      // Add more URLs as needed
    };

    window.location.href = topicURLs[topic];
  }
</script>

<!-- Chart.js Script for Pie Chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  $(document).ready(function() {
    // Pie Chart Data
    var data = {
      labels: ["Test 1", "Test 2", "Test 3", "Test 4", "Test 5"],
      datasets: [{
        data: [20, 30, 15, 25, 10],
        backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#8BC34A", "#FF9800"],
        hoverBackgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#8BC34A", "#FF9800"]
      }]
    };

    // Get the context of the canvas element
    var ctx = $("#pieChart")[0].getContext("2d");

    // Create the pie chart
    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: data
    });
  });
</script>

<!-- Test Results Display Script -->
<script>
  function showTestResults() {
    var selectedTest = $("#testDropdown").val();
    // Simulated data for the test results
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
          // Add more subjects as needed
        ],
        percentage: "92%", // Assuming the percentage based on marks
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
          // Add more subjects as needed
        ],
        percentage: "68%", // Assuming the percentage based on marks
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
          // Add more subjects as needed
        ],
        percentage: "84%", // Assuming the percentage based on marks
      },
    };

    // Display the test results in the container
    var resultsContainer = $("#testResultsContainer");
    resultsContainer.empty();

    if (selectedTest in testResultsData) {
      var testResult = testResultsData[selectedTest];

      // Display test name and result
      resultsContainer.append(`<p><strong>Name of Test:</strong> ${selectedTest}</p>`);
      resultsContainer.append(`<p><strong>Result of the Test:</strong> ${testResult.result}</p>`);

      // Display subjects, marks, grade, and points in a clean table without lines
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

      // Display percentage
      resultsContainer.append(`<p><strong>Percentage:</strong> ${testResult.percentage}</p>`);
    }
  }
</script>



<!-- interview dropdown script -->

<script>
  $(document).ready(function() {
    // Attach the event handler to the change event of the interviewer type dropdown
    // $('.form-control').hide();
    $('#interviewerType').change(function() {
      showDropdown($(this).val());
    });

    function showDropdown(selectedValue) {
      var dropdown = $('#interviewerDropdown');
      var interviewerDropdown = $('#interviewerName');

      if (selectedValue === 'HR' || selectedValue === 'Faculty') {
        dropdown.show();
        interviewerDropdown.empty(); // Clear options

        // Add dummy options based on selected value
        var dummyNames = selectedValue === 'HR' ? ['HR1', 'HR2', 'HR3'] : ['Teacher1', 'Teacher2', 'Teacher3'];

        $.each(dummyNames, function(index, name) {
          var option = $('<option>', {
            value: name,
            text: name
          });
          interviewerDropdown.append(option);
        });

        // Show the labels and hide the input fields
        $('.form-label').show();
        $('.form-control').show();

      } else {
        dropdown.hide();
        interviewerDropdown.empty(); // Clear options

        // Hide the labels and show the input fields
        $('.form-label').hide();

      }
    }
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

<!-- to handle the result analysis card -->

<script>
  $(document).ready(function() {
    // Assuming your card title has a class 'test-title'
    $('.test-title').each(function() {
      var resultCell = $(this).siblings('.result-cell'); // Assuming the result cell has a class 'result-cell'
      var result = resultCell.text().trim().toLowerCase();

      // Add a class based on the result
      if (result === 'pass') {
        resultCell.addClass('success');
      } else {
        resultCell.addClass('fail');
      }

      // Append an icon after the card title
      if (result === 'pass') {
        $(this).append('<i class="fas fa-check-circle text-success"></i>');
      } else {
        $(this).append('<i class="fas fa-times-circle text-danger"></i>');
      }
    });
  });
</script>


<!-- Payment gateway  -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  function updateButton() {
    var status = $('#status').text();
    var startInterviewBtn = $('#startInterviewBtn');
    var payButton = $('#rzp-button1');

    console.log(status);
    // startInterviewBtn.on('click', function(){
    // })
    if (status == 'Pending') {
      console.log('first');
    }

  }

  // Call the updateButton function on page load
  $(document).ready(function() {
    updateButton();
    9
  });

  var options = {
    "key": "rzp_test_LAhGZsvKSeGPAe", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://images.pexels.com/photos/1692984/pexels-photo-1692984.jpeg?auto=compress&cs=tinysrgb&h=650&w=940",
    "handler": function(response) {
      console.log(response);
    },
    "prefill": {
      "name": "Gaurav Kumar",
      "email": "gaurav.kumar@example.com",
      "contact": "9000090000"
    },
    "notes": {
      "address": "Razorpay Corporate Office"
    },
    "theme": {
      "color": "#3399cc"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.on('payment.failed', function(response) {
    alert(response.error.code);
    alert(response.error.description);
    alert(response.error.source);
    alert(response.error.step);
    alert(response.error.reason);
    alert(response.error.metadata.order_id);
    alert(response.error.metadata.payment_id);
  });
  document.getElementById('rzp-button1').onclick = function(e) {
    rzp1.open();
    e.preventDefault();
  }
</script>