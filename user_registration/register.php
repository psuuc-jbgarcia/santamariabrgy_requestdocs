<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Barangay Request System</title>
    <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>

    <style>
        /* Custom CSS can go here */
        body {
            font-family: Arial, sans-serif;
            background: url('../user_registration/bg1.jpg') no-repeat center center fixed;
            /* Background image with gradient overlay */
            background-size: cover;
            /* Cover the entire screen */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            /* Reset default margin */
            background: linear-gradient(to top, rgba(0, 0, 0, 4), rgba(0, 0, 0, 0.5)), url('../user_registration/bg1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            max-width: 600px;
            /* Increased max-width */
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top: 50px;
            /* Adjusted margin on top */
        }

        .card-header {
            /* Changed to green */
            color: #ffffff;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px;
        }

        .card-body {
            padding: 30px 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-register {
            background-color: #28a745;
            /* Changed to green */
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }

        .btn-register:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }

        .login-link a {
            color: #ffffff;
            /* Changed link color to white */
        }

        #camera-container {
            position: relative;
            overflow: hidden;
            border-radius: 50%;
            /* Circular shape */
            width: 200px;
            /* Set width of circular video */
            height: 200px;
            /* Set height of circular video */
            margin: 0 auto;
            /* Center horizontally */
        }

        #camera-feed {
            width: 100%;
            height: auto;
            position: absolute;
            top: 50%;
            /* Center vertically */
            left: 50%;
            /* Center horizontally */
            transform: translate(-50%, -50%);
            /* Center precisely */
            border-radius: 50%;
            /* Ensure video is circular */
        }

        #snapshot {
            width: 100%;
            margin-bottom: 15px;
            border-radius: 50%;
            /* Ensure image is circular */
        }

        #taken-picture {
            width: 100%;
            border-radius: 50%;
            /* Ensure image is circular */
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        .form-control.error {
            border-color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="1708167598_download-removebg-preview.png" alt="Logo" width="100" height="100"> <!-- Your logo here -->
            </div>
            <div class="card-body">
                <div id="camera-container">
                    <video id="camera-feed" autoplay></video>
                    <canvas id="snapshot" style="display:none;"></canvas>
                    <img id="taken-picture" src="" style="display: none;">
                </div>
                <button type="button" id="skipPicture" class="btn btn-secondary btn-lg btn-block mt-3">Skip taking a picture</button>
                <button type="button" id="takePicture" class="btn btn-success btn-lg btn-block mt-3">Take Picture</button>
                <button type="button" id="retakePicture" class="btn btn-secondary btn-lg btn-block mt-3" style="display:none;">Retake Picture</button>

                <form id="register-form" style="display:none; margin-top: 20px;">

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            <div class="error-message" id="username-error"></div>
                        </div>
                        <div class="form-group col">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            <div class="error-message" id="email-error"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Enter your password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye" style="color: green;"></i> <!-- Font Awesome eye icon in green -->
                                    </button>
                                </div>
                            </div>
                            <div class="error-message" id="password-error" ></div>
                        </div>

                        <div class="form-group col">
                            <label for="confirmPassword">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="fas fa-eye" style="color: green;"></i> <!-- Font Awesome eye icon in green -->
                                    </button>
                                </div>
                            </div>
                            <div class="error-message" id="confirmPassword-error"></div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter your First Name">
                            <div class="error-message" id="firstName-error"></div>
                        </div>
                        <div class="form-group col">
                            <label for="middleName">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" placeholder="Enter your Middle Name">
                            <div class="error-message" id="middleName-error"></div>
                        </div>
                        <div class="form-group col">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter your Last Name">
                            <div class="error-message" id="lastName-error"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="error-message" id="gender-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="purok">Purok</label>
                        <select class="form-control" id="purok">
                            <option value="Purok 1">Purok 1</option>
                            <option value="Purok 2">Purok 2</option>
                            <option value="Purok 3">Purok 3</option>
                            <option value="Purok 4">Purok 4</option>
                            <option value="Purok 5">Purok 5</option>
                            <option value="Purok 6">Purok 6</option>
                            <option value="Purok 7">Purok 7</option>
                        </select>
                        <div class="error-message" id="purok-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="barangay">Barangay</label>
                        <select class="form-control" id="brgy">
                            <option value="Alipangpang">Alipangpang</option>
                            <option value="Poblacion East">Poblacion East</option>
                            <option value="Poblacion West">Poblacion West</option>
                            <option value="Pugot">Pugot</option>
                            <option value="Samon">Samon</option>
                            <option value="San Alejandro">San Alejandro</option>
                            <option value="San Mariano">San Mariano</option>
                            <option value="San Pablo">San Pablo</option>
                            <option value="San Patricio">San Patricio</option>
                            <option value="San Vicente">San Vicente</option>
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="Santa Rosa">Santa Rosa</option>
                        </select>
                        <div class="error-message" id="barangay-error"></div>
                    </div>

                    <input type="file" id="profile-picture" style="display:none;">
                    <button type="button" class="btn btn-success btn-lg btn-block mt-3" id="addACCOUNT">Register</button>
                </form>
                <div class="login-link">
                    <p style="color: green;">Already have an account? <a style="color: green;" href="login.php">Login</a></p>
                </div>
                <!-- Display the taken picture -->
            </div>
        </div>
    </div>


    <script>
        // Function to skip taking a picture and proceed to registration
        $('#skipPicture').click(function() {
            document.getElementById('profile-picture').value = null;

            $('#register-form').show(); // Show the registration form
            $('#camera-container').hide(); // Hide the camera feed
            $('#snapshot').hide(); // Hide the snapshot canvas
            $('#skipPicture').hide(); // Hide the skip button
            $('#takePicture').hide(); // Hide the take picture button
            $('#retakePicture').hide();
        });

        // Registration form validation
        $('#addACCOUNT').click(function() {
            $('.error-message').text('');
            $('.form-control').removeClass('error');

            var isValid = true;

            // Username validation
            var username = $('#username').val().trim();
            if (!username) {
                $('#username-error').text('Please enter your username');
                $('#username').addClass('error');
                isValid = false;
            }

            // Email validation
            var email = $('#email').val().trim();
            if (!email) {
                $('#email-error').text('Please enter your email');
                $('#email').addClass('error');
                isValid = false;
            } else if (!isValidEmail(email)) {
                $('#email-error').text('Please enter a valid email address');
                $('#email').addClass('error');
                isValid = false;
            }

            // Password validation
            var password = $('#password').val().trim();
            if (!password) {
                $('#password-error').text('Please enter your password');
                $('#password').addClass('error');
                isValid = false;
            } 
            
             if (password.length < 8 || !(/[A-Z]/.test(password))) {
                $('#password-error').text('Password must be at least 8 characters long and contain at least one uppercase letter');
                $('#password').addClass('error');
                isValid = false;
            }

            // Confirm Password validation
            var confirmPassword = $('#confirmPassword').val().trim();
            if (!confirmPassword) {
                $('#confirmPassword-error').text('Please confirm your password');
                $('#confirmPassword').addClass('error');
                isValid = false;
            } else if (confirmPassword !== password) {
                $('#confirmPassword-error').text('Passwords do not match');
                $('#confirmPassword').addClass('error');
                isValid = false;
            }

            // First Name validation
            var firstName = $('#firstName').val().trim();
            if (!firstName) {
                $('#firstName-error').text('Please enter your first name');
                $('#firstName').addClass('error');
                isValid = false;
            }

            // Middle Name validation
            var middleName = $('#middleName').val().trim();
            if (!middleName) {
                $('#middleName-error').text('Please enter your middle name');
                $('#middleName').addClass('error');
            }
            // Middle Name is optional, so no validation needed

            // Last Name validation
            var lastName = $('#lastName').val().trim();
            if (!lastName) {
                $('#lastName-error').text('Please enter your last name');
                $('#lastName').addClass('error');
                isValid = false;
            }






            // Additional validations can be added here

            // If all validations pass, submit the form

        });

        // Function to validate email format
        function isValidEmail(email) {
            // Regular expression for basic email validation
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
        <script src="register.js">

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>