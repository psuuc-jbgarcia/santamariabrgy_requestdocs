<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find your account</title>
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/main.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
 body {
    background: linear-gradient(to top, rgba(0,0,0,4), rgba(0,0,0,0.5)), url('../bg1.jpg') no-repeat center center fixed;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}



 
        .password-reset-container {
            max-width: 500px; /* Increased max-width */
            padding: 20px;
            background-color: #fff; /* White background color */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .password-reset-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #28a745; /* Green text color */
        }

        .form-control,
        .btn {
            border-radius: 5px;
        }

        .btn-green {
            background-color: #28a745; /* Green background color */
            color: #fff; /* White text color */
        }

        .btn-green:hover {
            background-color: #218838; /* Darker shade on hover */
        }
    </style>
</head>

<body>
    <div class="password-reset-container">
        <h2>Forgot Password</h2>
        <form action="forgotpassfunctionality.php" method="POST">
            <div class="mb-3">
            <label for="email" class="form-label"><b>Email Address</b</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <button type="submit" class="btn btn-green w-100" name="forgot" id="forgot">Reset Password</button>
        </form>
        <div class="mt-3 text-center">
            <a href="../login.php" style="color: #28a745;">Back to Login</a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(function(){
            $("#forgot").click(function(){
                getEmail();
            });

            function getEmail(){
                var email=$("#email").val();
                var data={
                    email:email
                }
                $.ajax({
                    url:'forgotpassfunctionality.php',
                    method:'post',
                    data:data,
                    success:function(result){
                        // Do something with the result if needed
                    },
                });
            }
        });
    </script>
</body>

</html>
