<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Barangay Sta. Maria</title>
  <!-- Bootstrap CSS -->
      <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <script src="../js/main.js"></script>
  <script src="../js/jquery-3.3.1.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    /* .container {
      margin-top: 50px;
    } */
    .jumbotron {
      background-color: #28a745;
      color: #fff;
      padding: 50px;
      border-radius: 15px;
    }
    .jumbotron h1 {
      font-size: 36px;
      font-weight: bold;
    }
    .card {
      margin-top: 30px;
      margin-bottom: 20px;
    }
    .card-body {
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    .img-left {
      float: left;
      margin-right: 20px;
    }
    @media (max-width: 768px) {
      .img-left {
        float: none;
        margin-right: 0;
        margin-bottom: 20px;
      }
    }
    .green-icon {
      color: #28a745;
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
                    $user =isset( $_SESSION['user'])?$_SESSION['user']:'';
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
    <a class="dropdown-item" href="notifications.php"><i class="fas fa-bell"></i> Notifications</a>
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
<br>
      <br>
     <br>
     <br>
      <br>
<div class="container">
  <div class="jumbotron text-center">
    <img src="../landingpage//1708167598_download-removebg-preview.png" alt="Barangay Sta. Maria Logo" class="mb-3" height="150px">
    <h1>About Barangay Sta. Maria</h1>
    <p class="lead">Empowering the Community Ever Since</p>
  </div>

  <div class="row">
    <div class="col-md-6">
      <img src="../landingpage/1710120869_city-hall.png" alt="Santa Maria Image" class="img-fluid img-left">
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">About Santa Maria</h3>
          <p class="card-text">Santa Maria, officially the Municipality of Santa Maria, is a 4th class municipality in the province of Pangasinan, Philippines. According to the 2020 census, it has a population of 34,220 people. Santa Maria is 72 kilometers from Lingayen and 188 kilometers from Manila.</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Location</h3>
          <p class="card-text"><i class="fas fa-map-marker-alt green-icon"></i> Santa Maria, Pangasinan, Philippines</p>
          <p class="card-text"><i class="fas fa-road green-icon"></i> 72 kilometers from Lingayen</p>
          <p class="card-text"><i class="fas fa-road green-icon"></i> 188 kilometers from Manila</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Providing Essential Services</h3>
          <p class="card-text"><i class="fas fa-hands-helping green-icon"></i> Fostering community engagement and unity</p>
          <p class="card-text"><i class="fas fa-heartbeat green-icon"></i> Enhancing the quality of life for all members</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Contact Information</h3>
          <p class="card-text"><i class="fas fa-phone green-icon"></i> Mayor's Office: 632-4348</p>
          <p class="card-text"><i class="fas fa-phone green-icon"></i> Philippine National Police: 574-7011 / 0998-598-5144</p>
          <p class="card-text"><i class="fas fa-phone green-icon"></i> Rural Health Unit: (075) 523-3773</p>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
