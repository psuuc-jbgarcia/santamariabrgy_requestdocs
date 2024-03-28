<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barangay Request System</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            margin: 0; /* Reset default margin */
            background: linear-gradient(to top, rgba(0,0,0,4), rgba(0,0,0,0.5)), url('../user_registration/bg1.jpg');
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
            background-color: #28a745; /* Changed to green */
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
            background-color: #28a745; /* Changed to green */
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: #28a745; /* Changed to green */
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #28a745; /* Changed to green */
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
                <form>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="togglePassword" style=" color: green; "></i> <!-- Eye icon -->
                                </span>
                            </div>
                        </div>
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
        $("#togglePassword").click(function () {
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

    $("#login").click(function(){
        login();
    });

    function login(){
        var username=$("#username").val();
        var password=$("#password").val();
        var data={
            username:username,
            password:password
        }

        $.ajax({
            url:'login2.php',
            method:'post',
            data:data,
            // dataType: 'json',
            success:function(result){
                alert(result);
                if(result=== 'Welcome admin'){
                    window.location.href = "../admin_dashboard/admindashboard.php";
                } else if(result === 'Welcome user'){
                    window.location.href = "../user_dashboard/userdashboard.php";
                }
 
//                 Swal.fire({
//   title:result.title,
//   icon:result.icon,

// });
// setTimeout(function() {
//                 if(result.title === 'Welcome admin'){
//                     window.location.href = "../admin_dashboard/admindashboard.php";
//                 } else if(result.title === 'Welcome user'){
//                     window.location.href = "../user_dashboard/userdashboard.php";
//                 }
//             }, 1000);
            },
        });
    }
</script>

</html>
