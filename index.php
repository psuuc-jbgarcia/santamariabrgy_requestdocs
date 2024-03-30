<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Request System</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
<style>
    a{
        text-decoration: none;color: white;
    }
    @media (max-width: 576px) { /* Extra small devices (phones) */
        .hero-text h1 {
            font-size: 24px;
        }
        .hero-text p {
            font-size: 16px;
        }
    }

    @media (min-width: 577px) and (max-width: 768px) { /* Small devices (tablets) */
        .hero-text h1 {
            font-size: 28px;
        }
        .hero-text p {
            font-size: 18px;
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
            <img src="./landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="50" height="50" class="mr-2"> <!-- Adjust width and height as needed -->
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
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#map">Map</a>
                    </li>
                </ul>
  <div class="dropdown">
                    <button class="btn btn-white dropdown-toggle bg-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: green;">
                        User
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="user_registration/register.php">Register</a>
                        <a class="dropdown-item" href="user_registration/login.php">Login</a>
                    </div>
                </div>
             
            </div>
    </div>
</nav>

    <div class="container mt-5" id="home">
    <div class="jumbotron hero-image position-relative" style="background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.5)), url('./landingpage/backround.png'); background-repeat: no-repeat; background-size: cover; min-height: 80vh;">
        <div class="container hero-text text-center">
            <img src="./landingpage/1708167598_download-removebg-preview.png" alt="Logo" class="img-fluid logo-image"> <!-- Add the "img-fluid" class to make the image responsive -->
            <h1 class="display-4">Welcome to Municipality of Sta Maria</h1>
            <p class="lead">Open Hours of Barangay: Monday to Friday (8AM-5PM).</p>
            <p class="lead">Email at: <a href="mailto:stamaria@gmail.com" style="text-decoration: none; color:white;">stamaria@gmail.com</a></p>
            <p class="lead">Make your requests hassle-free!</p>
            <a href="./user_dashboard/about.php" class="btn btn-success btn-lg">About Us</a>
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
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('./landingpage/barangay-clearance.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Barangay Clearance</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Barangay Clearance and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService()">Proceed</a>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('./landingpage/barangay-permit.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Barangay Permit</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Business Permit and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService()">Proceed</a>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('./landingpage/indigency-request.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Indigency Certificate</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Indigency Request and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService()">Proceed</a>
                    </div>

                    <div class="col-md-6 col-lg-3 mb-4"> <!-- Adjust column size for mobile view -->
                        <div class="card card-cover overflow-hidden text-bg-light rounded-4 shadow-lg" style="background-image: url('./landingpage/residency-cert.png'); background-size: 100%; background-repeat: no-repeat; min-height: 40vh;">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1"></div>
                        </div>
                        <h3 class="pt-2 mt-2 m-lg-3 mb-4 display-8 lh-1 fw-bold text-success text-center">Residency Certificate</h3>
                        <p class="pt-1 mt-1 m-lg-3 mb-4 display-15 lh-1 text-dark-emphasis text-center">View the requirements needed for Recidency Certificate and acquire online now.</p>
                        <a href="#" class="btn btn-success btn-lg btn-block" onclick="proceedToService()">Proceed</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="bg-success" style="background-color: #6c757d; padding: 0.75rem; text-align: center; margin-top: 1rem;">
        <h4 class="text-white">LGU OFFICIALS</h4>
    </div>
 


            <div class="container">
                <div class="local-officials">
                <div class="row">
                    <div class="col-md-6 text-center" >
                        <div class="official">
                            <img src="./image_officials/stamariapangasinan-mayor.jpg" alt="Mayor" class="img-fluid rounded-circle mb-3">
                            <h5 class="font-weight-bold">HON. JULIUS C. RAMOS
                            </h5>
                            <h6 style="color: gray;">Municipal Mayor


                            </h6>
                          
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="official">
                            <img src="./image_officials/HON.-TEODORO-A.-RAMOS.jpg" alt="Vice Mayor" class="img-fluid rounded-circle mb-3">
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
                                        <img src="./image_officials/HN.-NOELA-A.-MANICDO.jpg" alt="Councilor 1" class="img-fluid rounded-circle mb-3">
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
                                        <img src="./image_officials/HON.-ELVIS-J.-ORIA.jpg" alt="Councilor 2" class="img-fluid rounded-circle mb-3">
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
                                        <img src="./image_officials/HON.-ROBERT-A.-GINEZ.jpg" alt="Councilor 3" class="img-fluid rounded-circle mb-3">
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
                                    <img src="./image_officials/HON.-SARAH-L.-NAVARRO-.jpg" alt="Councilor 1" class="img-fluid rounded-circle mb-3">
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
                                    <img src="./image_officials/HON.-KASH-MIKAIL-O.-GINEZ.jpg" alt="Councilor 2" class="img-fluid rounded-circle mb-3">
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
                                    <img src="./image_officials/HON.-ANTONIO-S.-CANTORIA.jpg" alt="Councilor 3" class="img-fluid rounded-circle mb-3">
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
                            <img src="./image_officials/HON.-MOISES-M.-HORTALEZA.jpg" alt="Mayor" class="img-fluid rounded-circle mb-3">
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
                            <img src="./image_officials/HON.-GIAN-FRANCO-A.-GINEZ.jpg" alt="Vice Mayor" class="img-fluid rounded-circle mb-3">
                            <h5 class="font-weight-bold">HON. GIAN FRANCO C. GINEZ
                            </h5>
                            <h6 style="color: gray;">Municipal Councilor</h6>
                            <h6 style="color: gray;"> Chairman: Health and Sanitation; Cooperatives
                            </h6>



                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

 
    <div class="bg-success" style="background-color: #6c757d; padding: 0.75rem; text-align: center; margin-top: 1rem;">
        <h4 class="text-white">BARANGAY OFFICIALS</h4>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12 text-center" >
            <div class="official">
                <img src="./image_officials/1705868790_Simon L. Maningding2.png" alt="Mayor" class="img-fluid rounded-circle mb-3" style="max-width: 50%;">
                <h5 class="font-weight-bold">HON. Simon Maningding</h5>
                <p style="color: gray;">Barangay Chairman</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-center" >
            <div class="official">
                <img src="./image_officials/kagawad.jpg" alt="Mayor" class="img-fluid rounded-circle mb-3" style="max-width: 50%;">
                <h5 class="font-weight-bold">HON. Juanito Bernardo</h5>
                <p style="color: gray;">Barangay Kagawad</p>
            </div>
        </div>
        <div class="col-md-6 text-center" >
            <div class="official">
                <img src="./image_officials/1704970139_number_9-webp (1) (2).jpg" alt="Another Image" class="img-fluid rounded-circle mb-3" style="max-width: 50%;">
                <h5 class="font-weight-bold">Rhovie Jane Abenojar</h5>
                <p style="color: gray;">Barangay  Kagawad</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 text-center" >
            <div class="official">
                <img src="./image_officials/1702911762_juanits.png" alt="Mayor" class="img-fluid rounded-circle mb-3" style="max-width: 50%;">
                <h5 class="font-weight-bold">HON. Juanito Abenojar</h5>
                <p style="color: gray;">Barangay Kagawad</p>
            </div>
        </div>
        <div class="col-md-6 text-center" >
            <div class="official">
                <img src="./image_officials/k1.jpg" alt="Another Image" class="img-fluid rounded-circle mb-3" style="max-width: 50%;">
                <h5 class="font-weight-bold">Juan Cruz</h5>
                <p style="color: gray;">Barangay  Kagawad</p>
            </div>
        </div>
    </div>
  

</div>
<!-- <div class="bg-green-black p-2 text-center mb-3">
        <h4 class="text-white">BARANGAY SK OFFICIALS</h4>
    </div> -->

 
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
                        <p class="card-text"><i class="fas fa-envelope" style="color: green;"></i> Email: <a style="color: black; " href="mailto:brgyalipangpang@gmail.com">brgyalipangpang@gmail.com</a></p>
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
                <img src="./landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="50" height="50" class="mr-2">
                <p>Municipality of Sta Maria, Barangay San Vicente is committed to providing efficient services to its constituents.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a style="text-decoration: none; color:white;" href="#">Home</a></li>
                    <li><a style="text-decoration: none; color:white;" href="#">Services</a></li>
                    <li><a style="text-decoration: none; color:white;" href="#">Map</a></li>
                </ul>
            </div>
            <div class="col-md-4">
    <h5>Contact Us</h5>
    <ul class="list-unstyled">
    <li><i class="fas fa-envelope"></i> <a href="mailto:example@example.com" style="text-decoration: none !important;">Email: example@example.com</a></li>
<li><i class="fas fa-phone"></i> <a href="tel:+1234567890" style="text-decoration: none !important;">Phone: +1234567890</a></li>

        <li><i class="fas fa-map-marker-alt"></i> Address: Municipality of Sta Maria, Barangay San Vicente, Santa Maria, Pangasinan</li>
        <li><a href="https://www.facebook.com/profile.php?id=100064137502992" style="text-decoration: none;"><i class="fab fa-facebook"></i> Facebook</a></li>
    </ul>
</div>

        </div>
        <p>&copy; 2024 Barangay Request System. All rights reserved.</p>
    </div>
</footer>





    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
   function proceedToService() {
    // Display SweetAlert for login prompt
    Swal.fire({
        title: "Login Required",
        text: "You need to login first to access this service.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Login",
        cancelButtonText: "Cancel",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect user to login page (replace "login.php" with your actual login page)
            window.location.href = "./user_registration/login.php";
        }
    });
}

</script>
<script>
window.embeddedChatbotConfig = {
chatbotId: "iMh1QFSwqoXcpcnI_GVuD",
domain: "www.chatbase.co"
}
</script>
<script
src="https://www.chatbase.co/embed.min.js"
chatbotId="iMh1QFSwqoXcpcnI_GVuD"
domain="www.chatbase.co"
defer>
</script>


</body>

</html>
