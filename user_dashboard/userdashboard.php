<?php
session_start();
if (!$_SESSION['user']) {
    header("Refresh:1;url=../user_registration/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Request System</title>
    <link rel="icon" href="../landingpage/1708167598_download-removebg-preview.png">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../style.css">

    <script src="../js/jquery-3.3.1.js"> </script>

    <script src="../js/main.js"></script>

    <style>
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


        /* Add more media queries for larger devices if needed */
    </style>

</head>
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
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#trackdocs">Track Documents</a>
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
        <span id="notificationBadge" class="badge badge-danger">1</span>
    </div>
</div>



</nav>


<body>


    <div class="container mt-5" id="home">
        <div class="jumbotron hero-image position-relative" style="background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.5)), url('../landingpage/backround.png'); background-repeat: no-repeat; background-size: cover; min-height: 80vh;">
            <div class="container hero-text text-center">
                <img src="../landingpage/logo.gif" alt="Logo" class="logo-image"> <!-- Add your logo image here -->
                <h1 class="display-4">Welcome to Municipality of Sta Maria</h1>
                <p class="lead">Open Hours of Barangay: Monday to Friday (8AM-5PM).</p>
                <p class="lead">Email at: <a href="stamaria@gmail.com" style="text-decoration: none; color:white;">stamaria@gmail.com</a></p>
                <p class="lead">Make your requests hassle-free!</p>
                <a href="../user_dashboard/about.php" class="btn btn-success btn-lg">About Us</a>
            </div>
        </div>
    </div>








    <div class="bg-success" style="background-color: #6c757d; padding: 0.75rem; text-align: center; margin-top: 1rem;">
        <h4 class="text-white">E-SERVICES</h4>
    </div>


    <section id="services">
        <div class="bg-dark-subtle" id="features">
            <div class="container px-4 py-5" id="custom-cards" style="margin-top: -5%">
                <div class="row align-items-stretch g-4 py-5">
                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('../landingpage/barangay-clearance.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Barangay Clearance</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Barangay Clearance and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService('Barangay Clearance')">AVAIL NOW</a>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('../landingpage/barangay-permit.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Business Permit</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Business Permit and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService('Barangay Permit')">AVAIL NOW</a>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('../landingpage/indigency-request.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Indigency Certificate</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Indigency Request and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService('Indigency Certificate')">AVAIL NOW</a>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('../landingpage/residency-cert.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Residency Certificate</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Recidency Certificate and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService('Residency Certificate')">AVAIL NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-success" style="background-color: #6c757d; padding: 0.75rem; text-align: center; margin-top: 1rem;">
        <h4 class="text-white" id="trackdocs">TRACK YOUR DOCS</h4>
    </div>
    <div class="container mt-5">
        <h1 class="mb-4">Track Documents</h1>
        <div id="track-docs-section" class="card" style="height: 450px;">
            <div class="card-body">
                <p class="card-text">Track your documents by entering the tracking ID below:</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter Tracking ID" id="tracking-id-input">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="button" id="track-btn">Track</button>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="document-type-select">Select Document Type:</label>
                    <!-- Apply custom styling to the select element -->
                    <select class="form-control" id="document-type-select" style="font-size: 16px; padding: 10px; height: 50px;">
                        <option value="business">Business Documents</option>
                        <option value="clearance">Clearance Documents</option>
                        <option value="indigency">Indigency Documents</option>
                        <option value="residency">Residency Documents</option>
                    </select>
                </div>
                <div id="tracking-info" class="mt-3"></div>
            </div>
        </div>
    </div>


    <br>
    <br>

    <div class="bg-success" style="background-color: #6c757d; padding: 0.75rem; text-align: center; margin-top: 1rem;">
        <h4 class="text-white">LGU OFFICIALS</h4>
    </div>




    <div class="container">
        <div class="local-officials">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="official">
                        <img src="../image_officials/stamariapangasinan-mayor.jpg" alt="Mayor" class="img-fluid rounded-circle mb-3">
                        <h5 class="font-weight-bold">HON. JULIUS C. RAMOS
                        </h5>
                        <h6 style="color: gray;">Municipal Mayor


                        </h6>

                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="official">
                        <img src="../image_officials/HON.-TEODORO-A.-RAMOS.jpg" alt="Vice Mayor" class="img-fluid rounded-circle mb-3">
                        <h5 class="font-weight-bold">HON. TEODORO A. RAMOS

                        </h5>
                        <h6 style="color: gray;">Municipal Vice Mayor</h6>




                    </div>
                </div>
            </div>
            <!-- Second Row: Councilors -->
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="official">
                                <img src="../image_officials/HN.-NOELA-A.-MANICDO.jpg" alt="Councilor 1" class="img-fluid rounded-circle mb-3">
                                <h5 class="font-weight-bold">HON. NOELA A. MANICDO
                                </h5>
                                <h6 style="color: gray;">Municipal Councilor
                                </h6>
                                <h6 style="color: gray;">Chairman Appropriations; Environmental Protection

                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="official">
                                <img src="../image_officials/HON.-ELVIS-J.-ORIA.jpg" alt="Councilor 2" class="img-fluid rounded-circle mb-3">
                                <h5 class="font-weight-bold">HON. ELVIS J.ORIA
                                </h5>
                                <h6 style="color: gray;">Municipal Councilor
                                </h6>
                                <h6 style="color: gray;">Chairman: Social Services; Transportation and Communications

                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="official">
                                <img src="../image_officials/HON.-ROBERT-A.-GINEZ.jpg" alt="Councilor 3" class="img-fluid rounded-circle mb-3">
                                <h5 class="font-weight-bold">HON. ROBERT A. GINEZ</h5>
                                <h6 style="color: gray;">Municipal Councilor</h6>
                                <h6 style="color: gray;">Chairman: Police Matters; Agriculture</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Third Row: Councilors -->

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="official">
                            <img src="../image_officials/HON.-SARAH-L.-NAVARRO-.jpg" alt="Councilor 1" class="img-fluid rounded-circle mb-3">
                            <h5 class="font-weight-bold">HON. SARAH L. NAVARRO
                            </h5>
                            <h6 style="color: gray;">Municipal Councilor</h6>
                            <h6 style="color: gray;">Chairman: Human Rights; Family and Women

                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="official">
                            <img src="../image_officials/HON.-KASH-MIKAIL-O.-GINEZ.jpg" alt="Councilor 2" class="img-fluid rounded-circle mb-3">
                            <h5 class="font-weight-bold">HON. KASH MIKAIL O. GINEZ</h5>
                            <h6 style="color: gray;">Municipal Councilor</h6>
                            <h6 style="color: gray;">Chairman: Market and Slaughterhouse Information</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="official">
                            <img src="../image_officials/HON.-ANTONIO-S.-CANTORIA.jpg" alt="Councilor 3" class="img-fluid rounded-circle mb-3">
                            <h5 class="font-weight-bold">HON. ANTONIO S. CANTORIA
                            </h5>
                            <h6 style="color: gray;">Municipal Councilor</h6>
                            <h6 style="color: gray;">Chairman: Ways and Means

                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 4th Row: Mayor and Vice Mayor -->
        <div class="row">
            <div class="col-md-6 text-center">
                <div class="official">
                    <img src="../image_officials/HON.-MOISES-M.-HORTALEZA.jpg" alt="Mayor" class="img-fluid rounded-circle mb-3">
                    <h5 class="font-weight-bold">HON. MOISES M. HORTALEZA III
                    </h5>
                    <h6 style="color: gray;">Municipal Councilor


                    </h6>
                    <h6 style="color: gray;">Chairman: Engineering and Public Works; Trade, Commerce and Industry

                    </h6>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="official">
                    <img src="../image_officials/HON.-GIAN-FRANCO-A.-GINEZ.jpg" alt="Vice Mayor" class="img-fluid rounded-circle mb-3">
                    <h5 class="font-weight-bold">HON. GIAN FRANCO C. GINEZ
                    </h5>
                    <h6 style="color: gray;">Municipal Vice Mayor</h6>
                    <h6 style="color: gray;"> Chairman: Health and Sanitation; Cooperatives
                    </h6>



                </div>
            </div>
        </div>
    </div>


    </div>
    </div>


    <div class="bg-success" style="background-color: #6c757d; padding: 0.75rem; text-align: center; margin-top: 1rem;">
        <h4 class="text-white">MAP</h4>
    </div>

    <div id="map" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- Google Maps iframe -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122751.34935926284!2d120.62625216569765!3d15.96243818425248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913d4ecc7d69ef%3A0x820fadbab1e7d088!2sSanta%20Maria%2C%20Pangasinan!5e0!3m2!1sen!2sph!4v1710081597706!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <!-- Additional information -->
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">Map Section</h1>
                            <p class="card-text"><i class="fas fa-map-marker-alt" style="color: green;"></i> Address: Municipality of Sta Maria, Barangay San Vicente, Santa Maria, Pangasinan</p>
                            <p class="card-text"><i class="fas fa-clock" style="color: green;"></i> Open Hours: Monday to Friday, 8:00 AM - 5:00 PM</p>
                            <p class="card-text"><i class="fas fa-envelope" style="color: green;"></i> Email: <a style="text-decoration: none; color:black;" href="mailto:brgyalipangpang@gmail.com">brgyalipangpang@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Sta Maria</h5>
                    <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="50" height="50" class="mr-2">
                    <p>Municipality of Sta Maria, Barangay San Vicente is committed to providing efficient services to its constituents.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a style="text-decoration: none; color:white;" href="#">Home</a></li>
                        <li><a style="text-decoration: none; color:white;" href="#trackdocs">Track Documents</a></li>
                        <li><a style="text-decoration: none; color:white;" href="#">Request Documents</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-envelope"></i> <a href="mailto:example@example.com" class="text-decoration-none">Email: example@example.com</a></li>
                        <li><i class="fas fa-phone"></i> <a href="tel:+1234567890" class="text-decoration-none">Phone: +1234567890</a></li>
                        <li><i class="fas fa-map-marker-alt"></i> Address: Municipality of Sta Maria, Barangay San Vicente, Santa Maria, Pangasinan</li>
                        <li><a href="https://www.facebook.com/profile.php?id=100064137502992" class="text-decoration-none"><i class="fab fa-facebook"></i> Facebook</a></li>
                    </ul>
                </div>



                </>
                <p>&copy; 2024 Barangay Request System. All rights reserved.</p>
            </div>
    </footer>




    <!-- Bootstrap JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="serviceModalLabel">Request Barangay Clearance</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="brgyclearancebody">
                    <!-- Input fields for Barangay Clearance service -->
                    <!-- load by jquery -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="requestClerance">Request</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="permitModal" tabindex="-1" role="dialog" aria-labelledby="permitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="permitModalLabel">Request Business Permit</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="brgypermitbody">
                    <!-- Input fields for Business Permit service -->
                    <!-- load by jquery -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="requestPermit">Request</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="indigencyModal" tabindex="-1" role="dialog" aria-labelledby="indigencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="indigencyModalLabel">Request Indigency Certificate</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="forindigency">
                    <!-- Input fields for Indigency Certificate service -->
                    <!-- load by jquery -->


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="indigency">Request</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="residencyModal" tabindex="-1" role="dialog" aria-labelledby="residencyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="residencyModalLabel">Request Residency Permit</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="forResidencys">
                    <!-- Input fields for Residency Permit service -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="residency">Request</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function proceedToService(serviceName) {
            // Check if the service is Barangay Clearance
            if (serviceName === 'Barangay Clearance') {
                $('#serviceModal').modal('show');
            }
            if (serviceName === "Barangay Permit") {
                $('#permitModal').modal('show');

            }
            if (serviceName === "Indigency Certificate") {
                $("#indigencyModal").modal('show');
            }
            if (serviceName === "Residency Certificate") {
                $("#residencyModal").modal('show');

            }

            // Show the modal
        }
    </script>
    <script src="getdata.js"></script>
    <script src="search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="logout.js"></script>

    <script>
        $(function() {
            $('#serviceModal').on('shown.bs.modal', function(e) {
                // Call the function to load data into the modal
                showDataInModalforClearance();
            });

            $('#permitModal').on('shown.bs.modal', function(e) {
                // Call the function to load data into the permit modal
                showDataInPermitModal();
            });
            $('#indigencyModal').on('shown.bs.modal', function(e) {
                // Call the function to load data into the permit modal
                showDataInIndigencyModal();
            });
            $('#residencyModal').on('shown.bs.modal', function(e) {
                showDataInResidencyModal()
            });

            function showDataInModalforClearance() {
                $("#brgyclearancebody").load("showDataForClearance.php");
            }

            function showDataInPermitModal() {
                $("#brgypermitbody").load("showDataForPermit.php");
            }

            function showDataInIndigencyModal() {
                $("#forindigency").load("showDataForIndigency.php");
            }


        });


        function showDataInResidencyModal() {
            $("#forResidencys").load("showDataForResidency.php");
        }
    </script>
    <script>
        //   clearance 
        $(function() {
            $("#requestClerance").click(function() {
                addClearance();

            });
            $("#requestPermit").click(function() {
                permit();

            });


            function addClearance() {
                var tracking = $("#clearanceTrackingCode").val();
                var fullname = $("#clearanceFullName").val();
                var pickupdate = $("#clearancePickUpDate").val();
                var purpose = $("#clearancePurpose").val();
                var recipent = $("#recipientName").val();
                
                var type = $("#type").val();
                var status = "Pending";
                var data = {
                    tracking: tracking,
                    fullname: fullname,
                    pickupdate: pickupdate,
                    purpose: purpose,
                    recipent: recipent,
                    type: type,
                    status: status,

                }
                $.ajax({
                    url: "requestClearance.php",
                    method: "post",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            text: response.text,
                            icon: response.icon
                        });
                        console.log(response)
                        if (response.icon == "success") {
                            $('#serviceModal').modal('hide');

                        }


                    },
                });
            }
            // permit

            function permit() {
                var type = "Business Permit";
                var status = "Pending";
                var trackingCode = $('#permitTrackingCode').val();
                var businessOwnerFullName = $('#permitBusinessOwnerFullName').val();
                var businessName = $('#permitBusinessName').val();
                var businessNature = $('#permitBusinessNature').val();
                var recipent = $("#recipientPermits").val();
                var dateApplied = $('#permitDateApplied').val();
                var data = {
                    trackingCode: trackingCode,
                    businessOwnerFullName: businessOwnerFullName,
                    businessName: businessName,
                    businessNature: businessNature,
                    recipent: recipent,
                    dateApplied: dateApplied,
                    type: type,
                    status: status
                }
                $.ajax({
                    url: 'requestPermit.php',
                    method: "post",
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        // alert(response);
                        Swal.fire({
                            title: response.title,
                            text: response.text,
                            icon: response.icon
                        });
                        if (response.icon == "success") {
                            $('#permitModal').modal('hide');

                        }
                    }
                });
            }

            $("#indigency").click(function() {
                indigency();
            });

            function indigency() {
                var trackingCode = $('#indigencyTrackingCode').val();
                var fullName = $('#indigencyFullName').val();
                var occupation = $('#indigencyOccupation').val();
                var income = $('#indigencyIncome').val();
                var pickUpDate = $('#indigencyPickUpDate').val();
                var purpose = $('#indigencyPurpose').val();
                var recipent = $("#recipientIndi").val();
                var type = "Indigency Certificate";
                var status = "Pending";
                var data = {
                    trackingCode: trackingCode,
                    fullName: fullName,
                    occupation: occupation,
                    income: income,
                    pickUpDate: pickUpDate,
                    purpose: purpose,
                    recipent: recipent,
                    type: type,
                    status: status
                }
                $.ajax({
                    url: 'requestIndigency.php',
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            text: response.text,
                            icon: response.icon
                        });
                        if (response.icon == "success") {
                            $("#indigencyModal").modal('hide');

                        }
                    },
                });
            }
            $("#residency").click(function() {
                residency();
            });

            function residency() {

                var trackingCode = $('#residencyTrackingCode').val();
                var fullName = $('#residencyFullName').val();
                var pickUpDate = $('#residencyPickUpDate').val();
                var purpose = $('#residencyPurpose').val();
                var recipent = $("#recipientResi").val();
                var type = "Residency Certificate";
                var status = "Pending";
                var data = {
                    trackingCode: trackingCode,
                    fullName: fullName,
                    pickUpDate: pickUpDate,
                    purpose: purpose,
                    recipent: recipent,
                    type: type,
                    status: status
                }
                // AJAX request
                $.ajax({
                    method: 'POST',
                    url: 'requestResidency.php',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            title: response.title,
                            text: response.text,
                            icon: response.icon
                        });
                        if (response.icon == "success") {
                            $("#residencyModal").modal('hide');

                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                        alert('An error occurred while submitting the form. Please try again.');
                    }
                });



            }


        });
    </script>

<!-- Button to trigger the modal -->


<!-- Modal -->
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