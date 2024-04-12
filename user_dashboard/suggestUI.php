<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestion Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png">

    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js//main.js"></script>
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../landingpage/backround.png') center/cover no-repeat;
color: black;        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
   
        h2 {
            color: #155724;
        }
        label {
            color: #155724;
        }
        .btn-submit {
background: green;            border-color: #28a745;
            color: #fff;
        }
        .btn-submit:hover {
            background: linear-gradient(to right, #218838, #0e4423);
            border-color: #1e7e34;
            color: #fff;
        }
        .logo {
            width: 200px; /* Adjust as needed */
            height: auto; /* Maintain aspect ratio */
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
    </style>
</head>
<body>
      
<nav class="navbar navbar-expand-lg navbar-light fixed-top mb-5" style="background-color: #ffffff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);"> <!-- Add inline style to set background color to white and add drop shadow -->
    <!-- Change navbar-dark to navbar-light -->

    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top mb-5">  -->
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="50" height="50" class="mr-2"> <!-- Adjust width and height as needed -->
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
            <div class="dropdown">
                <button class="btn btn-white text-white dropdown-toggle bg-success" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: green;">
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
                        echo $nameParts; // Display the user's first name
                    }
                    ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
    <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
    <a class="dropdown-item" href="requestedDocs.php"><i class="fas fa-file-alt"></i> Requested Documents</a>
    <a class="dropdown-item" href="suggestUI.php"><i class="fas fa-comments"></i> Your Suggestions</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
            </div>
            <div class="notification-container">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#notificationModal">
        <i class="fas fa-bell"></i> <!-- Font Awesome bell icon -->
    </button>
    <div id="msgcount" class="msgcount">
        <span id="notificationBadge" class="badge badge-danger"></span>
    </div>
</div>
        </div>
    </div>
</nav>
    <div class="container" style="margin-top: 100px;">
        
        <div class="card p-4">
            <div class="card-header">
                <h2 class="mb-0">Suggestion Form</h2>
            </div>
            <div class="card-body" id="suggestbody">
                 
            
            </div>
        </div>
    </div>
</body>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

<script>
    $(function(){
        loadsuggest();

       function loadsuggest(){
        $("#suggestbody").load("suggestload.php");
       }
    })
</script>

</html>
