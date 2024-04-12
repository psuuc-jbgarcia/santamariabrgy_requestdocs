<?php session_start();
$nameAdmin = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <!-- Font Awesome CSS -->
  <link rel="shortcut icon" href="1708167598_download-removebg-preview copy 2.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/main.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="adminstyle.css">
  <style>
    .request-box:hover {
      cursor: pointer;
    }

    /* Custom CSS to adjust modal width */
    .modal-dialog {
      max-width: 100%;
      /* Adjust the value as needed */
    }

    .nav-link.active,
    .nav-link:focus {
      background-color: white !important;
      color: #333 !important;
      /* Change text color to black */
    }
  </style>

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
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 d-md-block bg-success sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#dash-tab" data-toggle="tab"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>

            <!-- Inside the sidebar -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#notifications-tab" data-toggle="tab"><i class="fas fa-bell"></i>All Pending Requests</a>
            </li> -->

            <!-- <li class="nav-item">
              <a class="nav-link" href="#brgy-clearance-tab" data-toggle="tab"><i class="fas fa-file-alt"></i> Barangay Clearance</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#indigency-tab" data-toggle="tab"><i class="fas fa-id-badge"></i> Indigency Certificate</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#residency-cert-tab" data-toggle="tab"><i class="fas fa-home"></i> Residency Certificate</a>
            </li> -->
            <!-- <li class="nav-item">
              <a class="nav-link" href="#business-permit-tab" data-toggle="tab"><i class="fas fa-building"></i> Business Permit</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#all" data-toggle="tab"><i class="fas fa-building"></i> All Request Documents</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#user-management-tab" data-toggle="tab"><i class="fas fa-users"></i> User Management</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="#suggestions-tab" data-toggle="tab"><i class="fas fa-comments"></i> Suggestions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#payment-management-tab" data-toggle="tab"><i class="fas fa-money-bill-alt"></i> Payment Management</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#template" data-toggle="tab"><i class="far fa-file-alt"></i>Logs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#logs" data-toggle="tab"><i class="fas fa-check"></i>Logs</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- For small screens, display a select dropdown instead of the sidebar -->
      <select class="custom-select d-md-none" onchange="location = this.value;">
        <option selected>Select Page</option>
        <option value="#dash-tab">Dashboard</option>
        <option value="#brgy-clearance-tab">Barangay Clearance</option>
        <option value="#indigency-tab">Indigency Certificate</option>
        <option value="#residency-cert-tab">Residency Certificate</option>
        <option value="#business-permit-tab">Business Permit</option>
        <option value="#user-management-tab">User Management</option>
        <option value="#suggestions-tab">Suggestions</option>
        <option value="#payment-management-tab">Payment Management</option>
      </select>


      <!-- Page content -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="dash-tab">
            <h1>Dashboard</h1>
            <div class="row">
              <!-- Display number of users -->
              <div class="col-md-6">
                <div class="request-box bg-primary rounded p-3" data-toggle="modal" data-target="#userModal">
                  <h4><i class="fas fa-users"></i> Number of Users</h4>
                  <span style="font-size: large;" class="badge" id="userCount"></span>
                </div>
              </div>
              <!-- Modal for Number of Users -->
              <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="userModalLabel">Number of Users</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="bg-success text-white">
                            <tr>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Name</th>
                              <th>Gender</th>
                              <th>Purok</th>
                              <th>Barangay</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require '../connection.php';
                            // Prepare and bind the SELECT statement
                            $stmt = $conn->prepare("SELECT CONCAT(fname, ' ', mname, ' ', lname) AS name_concat, username, email, gender, purok, barangay FROM users");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                              // Output data of each row
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["name_concat"] . "</td>";
                                echo "<td>" . $row["gender"] . "</td>";
                                echo "<td>" . $row["purok"] . "</td>";
                                echo "<td>" . $row["barangay"] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='6'>No records found</td></tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>

              <!-- Display total revenue -->
              <div class="col-md-6">
                <div class="request-box bg-warning rounded p-3" data-toggle="modal" data-target="#revenueModal">
                  <h4><i class="fas fa-money-bill-alt"></i> Total Revenue</h4>
                  <span style="font-size: large;" class="badge" id="totalRevenue"></span>
                </div>
              </div>
              <!-- Modal for Total Revenue -->
              <div class="modal fade" id="revenueModal" tabindex="-1" aria-labelledby="revenueModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="revenueModalLabel">Total Revenue</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="bg-success text-white">
                            <tr>
                              <th>Amount</th>
                              <th>Document Type</th>
                              <th>Email</th>
                              <th>Date Paid</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require '../connection.php';
                            // Prepare and bind the SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM payment");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                              // Output data of each row
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["amount"] . "</td>";
                                echo "<td>" . $row["doctype"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["date_paid"] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='5'>No payment records found</td></tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <!-- Display number of requests for Barangay Clearance -->
              <div class="col-md-6">
                <div class="request-box bg-primary rounded p-3" data-toggle="modal" data-target="#brgyClearanceModal">
                  <h4><i class="fas fa-file-alt"></i> Barangay Clearance Requests</h4>
                  <span style="font-size: larger;" class="badge" id="brgyClearanceCount"></span>
                  <canvas id="brgyClearanceChart" width="400" height="100"></canvas>
                </div>
              </div>
              <!-- Modal for Barangay Clearance -->
              <!-- Modal for Barangay Clearance -->
              <div class="modal fade" id="brgyClearanceModal" tabindex="-1" aria-labelledby="brgyClearanceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="brgyClearanceModalLabel">Barangay Clearance Requests</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="bg-success text-white">
                            <tr>
                              <th>Tracking Code</th>
                              <th>Full Name</th>
                              <th>Pickup Date</th>
                              <th>Purpose</th>
                              <th>Type</th>
                              <th>Status</th>
                              <th>Username</th>
                              <th>Date</th>
                              <th>Email</th>
                              <th>Recipient</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require '../connection.php';
                            // Prepare and bind the SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM clearance");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                              // Output data of each row
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["tracking_code"] . "</td>";
                                echo "<td>" . $row["fullname"] . "</td>";
                                echo "<td>" . $row["pickup_date"] . "</td>";
                                echo "<td>" . $row["purpose"] . "</td>";
                                echo "<td>" . $row["type"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["date"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["recipent"] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='11'>No records found</td></tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>



              <!-- Display number of requests for Business Permit -->
              <div class="col-md-6">
                <div class="request-box bg-secondary rounded p-3" data-toggle="modal" data-target="#businessPermitModal">
                  <h4><i class="fas fa-building"></i> Business Permit Requests</h4>
                  <span style="font-size: larger;" class="badge" id="businessPermitCount"></span>
                  <canvas id="businessPermitChart" width="400" height="100"></canvas>
                </div>
              </div>
              <!-- Modal for Business Permit -->
              <div class="modal fade" id="businessPermitModal" tabindex="-1" aria-labelledby="businessPermitModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="businessPermitModalLabel">Business Permit Requests</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="bg-success text-white">
                            <tr>
                              <th>Tracking Code</th>
                              <th>Business Owner Full Name</th>
                              <th>Business Name</th>
                              <th>Business Nature</th>
                              <th>Date Applied</th>
                              <th>Type</th>
                              <th>Status</th>
                              <th>Username</th>
                              <th>Date</th>
                              <th>Email</th>
                              <th>Recipient</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require '../connection.php';
                            // Prepare and bind the SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM permits");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                              // Output data of each row
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["tracking_code"] . "</td>";
                                echo "<td>" . $row["business_owner_full_name"] . "</td>";
                                echo "<td>" . $row["business_name"] . "</td>";
                                echo "<td>" . $row["business_nature"] . "</td>";
                                echo "<td>" . $row["date_applied"] . "</td>";
                                echo "<td>" . $row["type"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["date"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["recipent"] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='11'>No records found</td></tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <!-- Display number of requests for Indigency Certificate -->
              <div class="col-md-6">
                <div class="request-box bg-success rounded p-3" data-toggle="modal" data-target="#indigencyModal">
                  <h4><i class="fas fa-id-badge"></i> Indigency Certificate Requests</h4>
                  <span style="font-size: larger;" class="badge" id="indigencyCount"></span>
                  <canvas id="indigencyChart" width="400" height="100"></canvas>
                </div>
              </div>
              <!-- Modal for Indigency Certificate -->
              <div class="modal fade" id="indigencyModal" tabindex="-1" aria-labelledby="indigencyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="indigencyModalLabel">Indigency Certificate Requests</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="bg-success text-white">
                            <tr>
                              <th>Tracking Code</th>
                              <th>Full Name</th>
                              <th>Occupation</th>
                              <th>Income</th>
                              <th>Pickup Date</th>
                              <th>Purpose</th>
                              <th>Type</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Recipient</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require '../connection.php';
                            // Prepare and bind the SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM certificates WHERE type = 'Indigency Certificate'");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                              // Output data of each row
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["tracking_code"] . "</td>";
                                echo "<td>" . $row["full_name"] . "</td>";
                                echo "<td>" . $row["occupation"] . "</td>";
                                echo "<td>" . $row["income"] . "</td>";
                                echo "<td>" . $row["pick_up_date"] . "</td>";
                                echo "<td>" . $row["purpose"] . "</td>";
                                echo "<td>" . $row["type"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>" . $row["date"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["recipent"] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='12'>No records found</td></tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Display number of requests for Residency Certificate -->
              <div class="col-md-6">
                <div class="request-box bg-danger rounded p-3" data-toggle="modal" data-target="#residencyModal">
                  <h4><i class="fas fa-home"></i> Residency Certificate Requests</h4>
                  <span style="font-size: larger;" class="badge" id="residencyCount"></span>
                  <canvas id="residencyChart" width="400" height="100"></canvas>
                </div>
              </div>
              <!-- Modal for Residency Certificate -->
              <div class="modal fade" id="residencyModal" tabindex="-1" aria-labelledby="residencyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="residencyModalLabel">Residency Certificate Requests</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                          <thead class="bg-success text-white">
                            <tr>
                              <th>Tracking Code</th>
                              <th>Full Name</th>
                              <th>Pickup Date</th>
                              <th>Purpose</th>
                              <th>Type</th>
                              <th>Status</th>
                              <th>Username</th>
                              <th>Date Requested</th>
                              <th>Email</th>
                              <th>Recipient</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            require '../connection.php';
                            // Prepare and bind the SELECT statement
                            $stmt = $conn->prepare("SELECT * FROM residency");
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                              // Output data of each row
                              while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["tracking_code"] . "</td>";
                                echo "<td>" . $row["full_name"] . "</td>";
                                echo "<td>" . $row["pickup_date"] . "</td>";
                                echo "<td>" . $row["purpose"] . "</td>";
                                echo "<td>" . $row["type"] . "</td>";
                                echo "<td>" . $row["status"] . "</td>";
                                echo "<td>" . $row["username"] . "</td>";
                                echo "<td>" . $row["date_requested"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["recipent"] . "</td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr><td colspan='10'>No records found</td></tr>";
                            }
                            $stmt->close();
                            $conn->close();
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>






            <br>
            <canvas id="requestChart" width="400" height="200"></canvas>
            <br>

            <br>
            <canvas id="userChart" width="150" height="100"></canvas>
            <br>

            <br>
            <canvas id="revenueChart" width="800" height="400"></canvas>
            <br>
            <br>

          </div>

          <!-- <div class="tab-pane fade" id="brgy-clearance-tab">
          </div>
=          <div class="tab-pane fade" id="notifications-tab">
            <h1>All Pending Requests</h1>
            <ul id="notificationList">
            </ul>
          </div> -->

          <!-- <div class="tab-pane fade" id="indigency-tab">
          </div>
          <div class="tab-pane fade" id="residency-cert-tab">

          </div>
          <div class="tab-pane fade" id="business-permit-tab">

          </div> -->
          <div class="tab-pane fade" id="all">


          </div>
          <div class="tab-pane fade" id="logs">
          </div>
          <div class="tab-pane fade" id="template">
            <h1>te</h1>
          </div>
          <!-- <div class="tab-pane fade usertab" id="user-management-tab">

          </div> -->
          <div class="tab-pane fade" id="suggestions-tab">
          </div>
          <div class="tab-pane fade" id="payment-management-tab">
            <div class="text-center">
              <h1 style="color: #28a745;">Payment Management</h1>
              <p style="color: #28a745;">Handle input payments here.</p>
              <p style="color: #28a745;">Please make the payment first before releasing the documents.</p>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#paymentModal">
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
                    <input type="number" class="form-control" id="paymentAmount" value="100" placeholder="Enter payment amount in PHP" style="color: #28a745;" readonly>
                  </div>
                  <div class="form-group">
                    <label for="documentType" style="color: #28a745;">Document Type:</label>
                    <select class="form-control" id="documentType" style="color: #28a745;">
                      <option value="brgyClearance">Barangay Clearance</option>
                      <option value="businessPermit">Business Permit</option>
                      <!-- Add more document types as needed -->
                    </select>
                  </div>
                  <div class="form-group" id="userspayment"></div>
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
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="adminlogout.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="loadAllRequest.js">
  </script>
  <script>
    $(document).ready(function() {
      // Fetch data from the PHP script using jQuery

      $.getJSON('fetchdata.php')
        .done(function(data) {
          // Check if data contains the necessary fields
          if (!('users' in data) || !('clearance' in data) || !('permit' in data) || !('indigency' in data) || !('residency' in data)) {
            console.error('Incomplete data received:', data);
            return;
          }

          // Prepare data for user chart
          var userCount = data.users;

          // Create a user chart
          var userCtx = document.getElementById('userChart').getContext('2d');
          var userChart = new Chart(userCtx, {
            type: 'pie',
            data: {
              labels: ['Users'],
              datasets: [{
                label: 'Number of Users',
                data: [userCount],
                backgroundColor: ['rgba(0, 0, 139, 0.5)'], // Dark blue background with 50% opacity
                borderColor: ['rgba(0, 0, 139, 1)'], // Dark blue border color

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
          var requestLabels = ['Barangay Clearance', 'Business Permit', 'Indigency Certificate', 'Residency Certificate'];
          var requestCounts = [data.clearance, data.permit, data.indigency, data.residency];

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
                  'rgba(0, 150, 0, 1)', // Even Darker Green

                  'rgba(0, 150, 0, 1)', // Even Darker Green
                  'rgba(0, 150, 0, 1)', // Even Darker Green
                  'rgba(0, 150, 0, 1)', // Even Darker Green
                ],
                borderColor: [
                  'rgba(0, 255, 0, 1)', // Green
                  'rgba(0, 255, 0, 0.3)', // Darker green (adjust alpha value as needed)
                  'rgba(0, 255, 0, 0.3)', // Darker green (adjust alpha value as needed)
                  'rgba(0, 255, 0, 0.3)' // Darker green (adjust alpha value as needed)
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
  <script src="box.js">
  </script>

  <script src="addpayment.js"></script>
  <script>
    loadthepending();

    function loadthepending() {
      $("#notifications-tab").load('fetch_allpending.php');
    }
  </script>
  <script>
    loadall();
    loadlogs();

    function loadall() {
      $("#all").load('fetch_all.php');
    }

    function loadlogs() {
      $("#logs").load('fetch_logs.php');
    }
    // setInterval(loadall, 10000);
  </script>
</body>

</html>