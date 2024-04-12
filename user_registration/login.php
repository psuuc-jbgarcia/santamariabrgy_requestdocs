<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barangay Request System</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" href="../landingpage/1708167598_download-removebg-preview.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>
    <style>
        /* Custom CSS can go here */
        body {
            font-family: Arial, sans-serif;
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
            max-width: 400px;
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-header {
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

        .btn-login {
            background-color: #28a745;
            /* Changed to green */
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #218838;
            /* Darker green on hover */
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #28a745;
            /* Changed to green */
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #28a745;
            /* Changed to green */
        }

        .error-message {
            display: none;
            color: red;
            /* Set the text color to red */
            margin-top: 5px;
            /* Add some space between the input field and the error message */
        }

        .has-error .form-control {
            border-color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <img src="1708167598_download-removebg-preview.png" alt="Logo" width="100" height="100">
                <!-- Your logo here -->
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username">
                        <div class="error-message" id="username-error" style="display: none;">Username is required.
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="togglePassword" style=" color: green; "></i>
                                    <!-- Eye icon -->
                                </span>
                            </div>

                        </div>
                        <div class="error-message" id="password-error" style="display: none;">Password is
                            required.</div>

                    </div>
                    <button type="button" class="btn btn-login" id="login">Login</button>
                </form>
                <div class="forgot-password">
                    <a href="../user_registration/phpmailer/forgotpass.php">Forgot Password?</a>
                </div>
                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $("#togglePassword").click(function() {
        var passwordField = $("#password");
        var icon = $(this);

        if (passwordField.attr("type") === "password") {
            passwordField.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash"); // Change icon to hide password
        } else {
            passwordField.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye"); // Change icon to show password
        }
    });

    $(document).ready(function() {
        $("#login").click(function() {
            login();
        });

        function login() {
            var username = $("#username").val().trim();
            var password = $("#password").val().trim();

            // Clear previous error styles and messages
            $(".form-group").removeClass("has-error");
            $(".error-message").hide();
            if (password === ""&& username === "") {
                $("#password").closest('.form-group').addClass("has-error");
                $("#password-error").show();
                $("#password").focus();
                $("#username").closest('.form-group').addClass("has-error");
                $("#username-error").show();
                $("#username").focus();
                return; // Stop further execution
            }
            // Check for empty fields
            if (username === "") {
                $("#username").closest('.form-group').addClass("has-error");
                $("#username-error").show();
                $("#username").focus();
                return; // Stop further execution
            }

            if (password === "") {
                $("#password").closest('.form-group').addClass("has-error");
                $("#password-error").show();
                $("#password").focus();
                return; // Stop further execution
            }
          

            // Perform login action if all fields are filled
            var data = {
                username: username,
                password: password
            };

            $.ajax({
                url: 'login2.php',
                method: 'post',
                data: data,
                dataType: 'text', // Change dataType to 'text'
                success: function(result) {
                    if (result == "Password is wrong") {
                        // Display error message
                        $("#password").closest('.form-group').addClass("has-error");
                        $("#password-error").text(result).show();
                    }
                    if (result == "Username is not registered") {
                        // Display error message
                        $("#username").closest('.form-group').addClass("has-error");
                        $("#username-error").text(result).show();
                    }
                    if (result == "Welcome user") {
                        setInterval(function() {
    window.location.href = '../user_dashboard/userdashboard.php';
}, 1000);
                    }
                    if (result == "Welcome admin") {
                        setInterval(function() {
    window.location.href = '../admin_dashboard/admindashboard.php';
}, 1000);
                    }
                    // Handle other responses if needed
                },
            });
        }
    });
</script>

</html>