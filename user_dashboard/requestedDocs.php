<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Documents</title>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- DataTables CSS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            background-color: #f3f3f3;
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #28a745;
            /* Green color for heading */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #dff0d8;
            /* Light green background color for tables */
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            /* Dark green background color for table headers */
            color: #fff;
            /* White text color for table headers */
        }

        tbody tr:nth-child(even) {
            background-color: #d9ead3;
            /* Light green background color for even rows */
        }

        tbody tr:hover {
            background-color: #c7e5c0;
            /* Darker green background color on hover */
        }
        
        @media (max-width: 576px) {

/* Extra small devices (phones) */
.hero-text h1 {
    font-size: 24px;
}

.hero-text p {
    font-size: 16px;
}
}

@media (min-width: 577px) and (max-width: 768px) {

/* Small devices (tablets) */
.hero-text h1 {
    font-size: 28px;
}

.hero-text p {
    font-size: 18px;
}
}
/* CSS for notification container */
.notification-container {
position: relative;
display: inline-block; /* Ensures elements are displayed in line */
}

/* CSS for notification count badge */
#msgcount {
position: absolute;
top: 0;
right: 0;
transform: translate(50%, -50%);
}

/* Media query for smaller devices */
@media (max-width: 768px) {
/* Adjust the badge size and position for smaller devices */
#msgcount {
transform: none;
top: auto;
right: -8px;
bottom: 0;
}
}
.table-container {
    background-color: #dff0d8;
    margin-bottom: 20px;
    padding: 10px;
}

.table-row {
    display: flex;
}

.header {
    background-color: #28a745;
    color: #fff;
}

.table-cell {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    flex: 1;
}


    </style>
</head>

<body>
  
<nav class="navbar navbar-expand-lg navbar-light fixed-top mb-5" style="background-color: #ffffff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="50" height="50" class="mr-2">
            Municipality of Sta Maria
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="userdashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userdashboard.php">Track Documents</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="requestDocsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Request Documents</a>
                    <div class="dropdown-menu" aria-labelledby="requestDocsDropdown">
                        <a class="dropdown-item" href="#request-service1" onclick="proceedToService('Barangay Clearance')">Barangay Clearance</a>
                        <a class="dropdown-item" href="#request-service2" onclick="proceedToService('Barangay Permit')">Business Permit</a>
                        <a class="dropdown-item" href="#request-service3" onclick="proceedToService('Indigency Certificate')">Indigency Certificate</a>
                        <a class="dropdown-item" href="#request-service4" onclick="proceedToService('Residency Certificate')">Residency Certificate</a>
                    </div>
                </li>
            </ul>
            <?php
            require '../connection.php';
            $user = $_SESSION['user'];
            $stmt = "select fname from users where username=?";
            $result = $conn->prepare($stmt);
            $result->bind_param("s", $user);
            $result->execute();
            $get = $result->get_result();
            if ($get->num_rows === 1) {
                $data = $get->fetch_assoc();
                $nameParts =  $data['fname'];
                echo '<div class="dropdown">
                        <button class="btn btn-white text-white dropdown-toggle bg-success" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: green;">
                            ' . $nameParts . '
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
                            <a class="dropdown-item" href="requestedDocs.php"><i class="fas fa-file-alt"></i> Requested Documents</a>
                            <a class="dropdown-item" href="suggestUI.php"><i class="fas fa-comments"></i> Your Suggestions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </div>
                    </div>';
            }
            ?>
            <div class="notification-container">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#notificationModal">
                    <i class="fas fa-bell"></i>
                </button>
                <div id="msgcount" class="msgcount">
                    <span id="notificationBadge" class="badge badge-danger"></span>
                </div>
            </div>
        </div>
    </div>
</nav>



<br>
<?php
require '../connection.php';

// Function to fetch data and display in a table
function displayDataInTable($result, $title) {
    echo "<style> #body{
        style='display: none;
    }
        </style>";
    echo "<h2>$title:</h2>";
    echo "<div class='table-container'>";
    echo "<div class='table-row header'>";
    echo "<div class='table-cell'>Name</div>";
    echo "<div class='table-cell'>Type</div>";
    echo "<div class='table-cell'>Status</div>";
    echo "</div>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='table-row'>";
        echo "<div class='table-cell'>" . $row['Name'] . "</div>";
        echo "<div class='table-cell'>" . $row['Type'] . "</div>";
        echo "<div class='table-cell'>" . $row['Status'] . "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
}


// Check if the tracking code is passed in the URL
if (isset($_GET['tracking_code'])) {
    $trackingCode = $_GET['tracking_code'];

    // Check if the user is logged in
    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];

        // Prepare and execute the SQL queries to fetch data for the tracking code from all tables
        $stmt1 = $conn->prepare("SELECT full_name AS Name, type AS Type, status AS Status FROM residency WHERE username=? AND tracking_code=?");
        $stmt1->bind_param("ss", $username, $trackingCode);
        $stmt1->execute();
        $result1 = $stmt1->get_result();
        
        $stmt2 = $conn->prepare("SELECT business_owner_full_name AS Name, type AS Type, status AS Status FROM permits WHERE username=? AND tracking_code=?");
        $stmt2->bind_param("ss", $username, $trackingCode);
        $stmt2->execute();
        $result2 = $stmt2->get_result();
        
        $stmt3 = $conn->prepare("SELECT fullname AS Name, type AS Type, status AS Status FROM clearance WHERE username=? AND tracking_code=?");
        $stmt3->bind_param("ss", $username, $trackingCode);
        $stmt3->execute();
        $result3 = $stmt3->get_result();
        
        $stmt4 = $conn->prepare("SELECT full_name AS Name, type AS Type, status AS Status FROM certificates WHERE username=? AND tracking_code=?");
        $stmt4->bind_param("ss", $username, $trackingCode);
        $stmt4->execute();
        $result4 = $stmt4->get_result();
        
        // Display the results in tables
        if ($result1->num_rows > 0) {
            displayDataInTable($result1, "Residency");
        } else {
        }
        
        if ($result2->num_rows > 0) {
            displayDataInTable($result2, "Permits");
        } else {
        }
        
        if ($result3->num_rows > 0) {
            displayDataInTable($result3, "Clearance");
        } else {
        }
        
        if ($result4->num_rows > 0) {
            displayDataInTable($result4, "Certificates");
        } else {
        }
        
        // Close prepared statements
        $stmt1->close();
        $stmt2->close();
        $stmt3->close();
        $stmt4->close();
        
    } else {
        // If the user is not logged in, display a message
        echo "<p>User is not logged in.</p>";
    }
} else {
    // If the tracking code is not passed in the URL, display a message
}

// Close the database connection
$conn->close();
?>


    <div class="container" id="body">
        <div class="col-md-12">
        </div>
        <!-- Navigation Link Wrapped in a Card -->

        <div class="row mb-4">

        </div>
        <div class="row mb-4 text-center" style="margin-top: 100px;">
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="barangay-clearance">Barangay Clearance</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="barangay-permit">Business Permit</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="indigency-certificate">Indigency Certificate</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="residency-certificate">Residency Certificate</button>
            </div>
        </div>



        <!-- Barangay Clearance Requests Container -->
        <div id="barangay-clearance-container">
            <h2>Barangay Clearance Requests</h2>
    <div class="row">
        <div class="col">
            <label for="min-clearance">From:</label>
            <input type="date" id="min-clearance" name="min-clearance">
            <label for="max-clearance">To:</label>
            <input type="date" id="max-clearance" name="max-clearance">
        </div>
    </div>
            <table id="barangay-clearance-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking_code</th>
                        <th>Fullname</th>
                        <th>Pick Up Date</th>
                        <th>Purpose</th>
                        <th>Type</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->

                    </tr>
                </thead>
                <tbody id="clearanceload">

                </tbody>
            </table>
        </div>

        <!-- Barangay Permit Requests Container -->
        <div id="barangay-permit-container">
            <h2>Business Permit Requests</h2>
            <div class="row">
        <div class="col">
            <label for="min-permit">From:</label>
            <input type="date" id="min-permit" name="min-permit">
            <label for="max-permit">To:</label>
            <input type="date" id="max-permit" name="max-permit">
        </div>
    </div>
            <table id="barangay-permit-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking Code</th>
                        <th>Pick Up Date</th>

                        <th>Business Owner Full Name</th>
                        <th>Business Name</th>
                        <th>Business Nature</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->

                    </tr>
                </thead>
                <tbody id="business">

                </tbody>
            </table>
        </div>

        <!-- Indigency Certificate Requests Container -->
        <div id="indigency-certificate-container">
            <h2>Indigency Certificate Requests</h2>
            <div class="row">
        <div class="col">
            <label for="min-indigency">From:</label>
            <input type="date" id="min-indigency" name="min-indigency">
            <label for="max-indigency">To:</label>
            <input type="date" id="max-indigency" name="max-indigency">
        </div>
    </div>
            <table id="indigency-certificate-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking Code</th>
                        <th>Full Name</th>
                        <th>Pick Up Date</th>
                        <th>Type</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->


                    </tr>
                </thead>
                <tbody id="loadingigency">

                </tbody>
            </table>
        </div>

        <!-- Residency Certificate Requests Container -->
        <div id="residency-certificate-container">
            <h2>Residency Certificate Requests</h2>
            div class="row">
        <div class="col">
            <label for="min-residency">From:</label>
            <input type="date" id="min-residency" name="min-residency">
            <label for="max-residency">To:</label>
            <input type="date" id="max-residency" name="max-residency">
        </div>
    </div>
            <table id="residency-certificate-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking Code</th>
                        <th>Full Name</th>
                        <th>Pick Up Date</th>
                        <th>Type</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody id="loadresidency">

                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal for canceling clearance requests -->



    <!-- Modal for canceling permit requests -->
    <div class="modal fade" id="cancelPermitModal" tabindex="-1" role="dialog" aria-labelledby="cancelPermitModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelPermitModalLabel">Cancel Permit Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this Business permit request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmPermitCancelBtn">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for canceling indigency requests -->
    <div class="modal fade" id="cancelIndigencyModal" tabindex="-1" role="dialog" aria-labelledby="cancelIndigencyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelIndigencyModalLabel">Cancel Indigency Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this indigency request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmIndigencyCancelBtn">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for canceling residency requests -->
    <div class="modal fade" id="cancelResidencyModal" tabindex="-1" role="dialog" aria-labelledby="cancelResidencyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelResidencyModalLabel">Cancel Residency Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this residency request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmResidencyCancelBtn">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Add this button to trigger the modal -->

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
            loadclearance();
            loadPermitData();
            loadIndi();
            residency();

            function loadclearance() {
                $('#clearanceload').load('loadclearance.php');

            }

            function loadPermitData() {
                $('#business').load('loadbusiness.php');
            }

            function loadIndi() {
                $('#loadingigency').load('loadindigency.php');
            }

            function residency() {
                $("#loadresidency").load('loadresidency.php');
            }

        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            var clearanceTable = $('#barangay-clearance-table').DataTable({
                searching: false // Disable search functionality

            });
            var permitTable = $('#barangay-permit-table').DataTable({
                searching: false // Disable search functionality

            });
            var indigencyTable = $('#indigency-certificate-table').DataTable({
                searching: false // Disable search functionality

            });
            var residencyTable = $('#residency-certificate-table').DataTable({
                searching: false // Disable search functionality

            });

            // Hide all tables and their containers except Barangay Clearance
            $('table').hide();
            $('div[id$="-container"]').hide();
            $('#barangay-clearance-table').show();
            $('#barangay-clearance-container').show();

            // Show/hide tables based on button clicks
            $('.btn-document').on('click', function() {
                var tableID = $(this).data('table');

                // Hide all tables and their containers
                $('table').hide();
                $('div[id$="-container"]').hide();

                // Show the corresponding table and its container
                $('#' + tableID + '-table').show();
                $('#' + tableID + '-container').show();

                // Reinitialize DataTables for the shown table
                if (tableID === 'barangay-clearance') {
                    clearanceTable = $('#barangay-clearance-table').DataTable();
                } else if (tableID === 'barangay-permit') {

                    permitTable = $('#barangay-permit-table').DataTable();
                } else if (tableID === 'indigency-certificate') {
                    indigencyTable = $('#indigency-certificate-table').DataTable();
                } else if (tableID === 'residency-certificate') {
                    residencyTable = $('#residency-certificate-table').DataTable();
                }
            });
  // Add date range filtering
  $('#min-clearance, #max-clearance').change(function() {
        var min = $('#min-clearance').val();
        var max = $('#max-clearance').val();

        clearanceTable.draw();

        if (min === "" && max === "") {
            clearanceTable.search('').columns().search('').draw();
        } else {
            clearanceTable.columns(5).search(min + '|' + max, true, false).draw();
        }
    });

    $('#min-permit, #max-permit').change(function() {
        var min = $('#min-permit').val();
        var max = $('#max-permit').val();

        permitTable.draw();

        if (min === "" && max === "") {
            permitTable.search('').columns().search('').draw();
        } else {
            permitTable.columns(5).search(min + '|' + max, true, false).draw();
        }
    });

    $('#min-indigency, #max-indigency').change(function() {
        var min = $('#min-indigency').val();
        var max = $('#max-indigency').val();

        indigencyTable.draw();

        if (min === "" && max === "") {
            indigencyTable.search('').columns().search('').draw();
        } else {
            indigencyTable.columns(4).search(min + '|' + max, true, false).draw();
        }
    });

    $('#min-residency, #max-residency').change(function() {
        var min = $('#min-residency').val();
        var max = $('#max-residency').val();

        residencyTable.draw();

        if (min === "" && max === "") {
            residencyTable.search('').columns().search('').draw();
        } else {
            residencyTable.columns(4).search(min + '|' + max, true, false).draw();
        }
    });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle click event of the confirm cancel button in the clearance modal
            $('#confirmClearanceCancelBtn').click(function() {
                // Logic to cancel clearance request
                $('#cancelClearanceModal').modal('hide');
                // Additional logic here if needed
            });

            // Handle click event of the confirm cancel button in the permit modal
            $('#confirmPermitCancelBtn').click(function() {
                // Logic to cancel permit request
                $('#cancelPermitModal').modal('hide');
                // Additional logic here if needed
            });

            // Handle click event of the confirm cancel button in the indigency modal
            $('#confirmIndigencyCancelBtn').click(function() {
                // Logic to cancel indigency request
                $('#cancelIndigencyModal').modal('hide');
                // Additional logic here if needed
            });

            // Handle click event of the confirm cancel button in the residency modal
            $('#confirmResidencyCancelBtn').click(function() {
                // Logic to cancel residency request
                $('#cancelResidencyModal').modal('hide');
                // Additional logic here if needed
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-document').click(function() {
                $('.btn-document').removeClass('btn-success active');
                $(this).toggleClass('btn-success active');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle click event of the confirm cancel button in the clearance modal
            $('#confirmClearanceCancelBtn').click(function() {
                // Send AJAX request to cancel clearance request
                $.get('cancel_clearance.php', function(data) {
                    // Handle the response from the server, if needed
                    // For example, you can reload the table data after cancellation
                    $('#clearanceload').load('loadclearance.php');
                });
                // Hide the modal
                $('#cancelClearanceModal').modal('hide');
            });
        });
    </script>
    <script src="cancel.js"></script>
    
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notif">
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
    notifs();
    loadmsgcount();
function notifs(){
    $("#notif").load("fetch_notif.php");
}
function loadmsgcount(){
    $("#msgcount").load("fetch_messagecount.php");
}
setInterval(function(){
    notifs();
    loadmsgcount();
},1000);
});

</script>
<script>
    $(document).ready(function() {
        function handleModalShown() {
            $.ajax({
                url: 'mark_notification_as_read.php', 
                type: 'POST',
                success: function(response) {
                   console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error marking notifications as read:', error); 
                }
            });
        }

        $('#notificationModal').on('shown.bs.modal', handleModalShown);
    });
</script>
</body>

</html>