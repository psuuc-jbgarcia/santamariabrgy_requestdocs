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
<br>
<br>

<br>
<?php
require '../connection.php';

// Function to fetch data and display in a table
function displayDataInTable($result, $title) {
    echo "<style> #body{
        style='display: none;
    }
        </style>";
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


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</body>

</html>