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
    <link rel="shortcut icon" href="../../landingpage/1708167598_download-removebg-preview.png">

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
       $(function() {
    $("#change").click(function() {
        change();
    });

    function change() {
        var newpass = $("#new_password").val();
        var confirmpass = $("#confirm_password").val();

        // Regular expression to check if password has at least 8 characters and 1 uppercase letter
        var passwordRegex = /^(?=.*[A-Z]).{8,}$/;

        // Check if new password meets the criteria
        if (!passwordRegex.test(newpass)) {
            $("#new_password").addClass('is-invalid'); // Add Bootstrap class for validation error
            $("#new_password").siblings('.invalid-feedback').html('Password must be at least 8 characters long and contain at least one uppercase letter.'); // Show error message
            return; // Exit function if validation fails
        }

        // Check if new password matches the confirmation password
        if (newpass !== confirmpass) {
            $("#confirm_password").addClass('is-invalid'); // Add Bootstrap class for validation error
            $("#confirm_password").siblings('.invalid-feedback').html('Passwords do not match.'); // Show error message
            return; // Exit function if validation fails
        }

        var data = {
            newpass: newpass,
            confirmpass: confirmpass
        }
        $.post("resetpass2.php", data, function(response) {
            alert(response);
            if (response == "Your password has been changed.") {
                setTimeout(function() {
                    window.location.href = "login.php";
                }, 2000); // 2000 milliseconds delay (2 seconds)
            }
        });
    }
});

    </script>
</body>

</html>
