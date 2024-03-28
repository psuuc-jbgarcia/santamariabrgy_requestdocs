<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="adminstyle.css">
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-white fixed-top shadow">
    <a class="navbar-brand" href="#" style="color: black!important;">
      <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" height="50">
      Admin Dashboard
    </a>
    <!-- Address display with icon -->
    <div style="text-align: center; color: green; font-weight: bold; margin-right: 50px; margin-left: 50px;">
      <i class="fas fa-map-marker-alt" style="color: green;"></i>
      <span id="address" style="color: green;">Sta Maria Municipal Hall, Poblacion West Street, Santa Maria, Pangasinan</span>
    </div>
    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-md-auto"> <!-- Adjusted class to align items to the right on medium and larger devices -->
        <li class="nav-item">
          <a class="nav-link" href="#" id="loutadmin"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3 col-lg-2 d-md-block bg-success sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#dash-tab" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#brgy-clearance-tab" data-toggle="tab"><i class="fas fa-file-alt"></i> Barangay Clearance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#indigency-tab" data-toggle="tab"><i class="fas fa-id-badge"></i> Indigency Certificate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#residency-cert-tab" data-toggle="tab"><i class="fas fa-home"></i> Residency Certificate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#business-permit-tab" data-toggle="tab"><i class="fas fa-building"></i> Business Permit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#user-management-tab" data-toggle="tab"><i class="fas fa-users"></i> User Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#suggestions-tab" data-toggle="tab"><i class="fas fa-comments"></i> Suggestions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#payment-management-tab" data-toggle="tab"><i class="fas fa-money-bill-alt"></i> Payment Management</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Page content -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="dash-tab">
            <h1>Dashboard</h1>
            <br>
            <canvas id="requestChart" width="400" height="200"></canvas>
            <br>

            <br>
            <canvas id="userChart" width="150" height="100"></canvas>
            <br>

            <br>
            <canvas id="revenueChart" width="800" height="400"></canvas>


          </div>

          <div class="tab-pane fade" id="brgy-clearance-tab">
          </div>
          <div class="tab-pane fade" id="indigency-tab">
          </div>
          <div class="tab-pane fade" id="residency-cert-tab">
          </div>
          <div class="tab-pane fade" id="business-permit-tab">
          </div>
          <div class="tab-pane fade usertab" id="user-management-tab">

          </div>
          <div class="tab-pane fade" id="suggestions-tab">
          </div>
          <div class="tab-pane fade" id="payment-management-tab">
           <div class="text-center">
    <h1 style="color: #28a745;">Payment Management</h1>
    <p style="color: #28a745;">Handle input payments here.</p>
    <p style="color: #28a745;">Please make the payment first before releasing the documents.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal" style="background-color: #28a745; border-color: #28a745;">
        Input Payment and Document Type
    </button>
</div>

          </div>

          <!-- Payment Modal -->
          <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="paymentModalLabel" style="color: #28a745;">Input Payment and Document Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="paymentAmount" style="color: #28a745;">Payment Amount (PHP):</label>
                      <input type="number" class="form-control" id="paymentAmount" placeholder="Enter payment amount in PHP" style="color: #28a745;">
                    </div>

                    <div class="form-group">
                      <label for="documentType" style="color: #28a745;">Document Type:</label>
                      <select class="form-control" id="documentType" style="color: #28a745;">
                        <option value="brgyClearance">Barangay Clearance</option>
                        <option value="businessPermit">Business Permit</option>
                     
                        <!-- Add more document types as needed -->
                      </select>
                    </div>
                    <div class="form-group" id="userspayment">

                    </div>

                    <button type="button" class="btn btn-primary" style="background-color: #28a745; border-color: #28a745;" id="pay">Pay</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <!-- Include DataTables JS -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script src="loadAllRequest.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="adminlogout.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    $(document).ready(function() {
      // Fetch data from the PHP script using jQuery
      $.getJSON('fetchdata.php', function(data) {
          // Prepare data for user chart
          var userCount = data.users || 0;

          // Create a user chart
          var userCtx = document.getElementById('userChart').getContext('2d');
          var userChart = new Chart(userCtx, {
            type: 'pie',
            data: {
              labels: ['Users'],
              datasets: [{
                label: 'Number of Users',
                data: [userCount],
                backgroundColor: ['rgba(54, 162, 235, 0.5)'],
                borderColor: ['rgba(54, 162, 235, 1)'],
                borderWidth: 1
              }]
            },
            options: {
              aspectRatio: 2, // Adjust the aspect ratio to control the size of the chart
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          });

          // Prepare data for request chart
          var requestLabels = Object.keys(data).filter(label => label !== 'users');
          var requestCounts = Object.values(data).filter(count => count !== userCount);

          // Create a request chart
          var requestCtx = document.getElementById('requestChart').getContext('2d');
          var requestChart = new Chart(requestCtx, {
            type: 'bar',
            data: {
              labels: requestLabels,
              datasets: [{
                label: 'Number of Requests',
                data: requestCounts,
                backgroundColor: [
                  'rgba(0, 255, 0, 0.5)', // Green
                  'rgba(0, 255, 0, 0.5)', // Green
                  'rgba(0, 255, 0, 0.5)', // Green
                  'rgba(0, 255, 0, 0.5)', // Green
                ],
                borderColor: [
                  'rgba(0, 255, 0, 1)', // Green
                  'rgba(0, 255, 0, 0.5)', // Green
                  'rgba(0, 255, 0, 0.5)', // Green
                  'rgba(0, 255, 0, 0.5)', // Green
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          });
        })
        .fail(function(jqXHR, textStatus, errorThrown) {
          console.error('Error fetching data:', textStatus, errorThrown);
        });
     

    });
  </script>
<script>
  $(document).ready(function() {
    // Fetch payment data from the PHP script using jQuery AJAX
    $.getJSON('fetch_revenue.php', function(data) {
      // Array of month names
      var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

      // Prepare data for the line chart
      var revenueLabels = Object.keys(data).map(month => monthNames[month - 1]); 
      var revenueData = Object.values(data);

      // Update the revenue chart with the fetched data
      revenueChart.data.labels = revenueLabels;
      revenueChart.data.datasets[0].data = revenueData;
      revenueChart.update();
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
      console.error('Error fetching revenue data:', textStatus, errorThrown);
    });

    // Your existing code for creating the revenue chart
    var revenueCtx = document.getElementById('revenueChart').getContext('2d');
    var revenueChart = new Chart(revenueCtx, {
      type: 'line',
      data: {
        labels: [],
        datasets: [{
          label: 'Total Revenue',
          data: [],
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  });
</script>


  <script>
    $(function() {
      loadusersforpayment();

      function loadusersforpayment() {
        $("#userspayment").load("load_users_forpayment.php");
      }
    });
  </script>

  <script src="addpayment.js"></script>
</body>

</html>