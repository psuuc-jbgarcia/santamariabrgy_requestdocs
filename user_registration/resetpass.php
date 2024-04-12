<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(to top, rgba(0,0,0,4), rgba(0,0,0,0.5)), url('../user_registration/bg1.jpg') no-repeat center center fixed;

            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .card {
            border: 2px solid #28a745;
            border-radius: 10px;
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        .card-header {
            background-color: #28a745;
            color: #fff;
            border-bottom: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-control,
        .btn {
            border-radius: 5px;
        }

        .btn-green {
            background-color: #28a745;
            color: #fff;
        }

        .btn-green:hover {
            background-color: #218838;
        }

        .input-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="resetpass.php" method="post">
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new_password" name="newpassword" required>
                                    <div class="password-toggle" onclick="togglePassword('new_password')">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirm_password" name="confirmpassword" required>
                                    <div class="password-toggle" onclick="togglePassword('confirm_password')">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-green btn-block" id="change">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId) {
            var input = document.getElementById(inputId);
            var eyeIcon = document.querySelector('#' + inputId + ' + .password-toggle i');

            if (input.type === "password") {
                input.type = "text";
                eyeIcon.className = 'fa fa-eye-slash';
            } else {
                input.type = "password";
                eyeIcon.className = 'fa fa-eye';
            }
        }
    </script>
    <script>
        $(function () {
            $("#change").click(function () {
                change();
            });

            function change() {
                var newpass = $("#new_password").val();
                var confirmpass = $("#confirm_password").val();
                var data = {
                    newpass: newpass,
                    confirmpass: confirmpass
                }
                $.post("resetpass2.php", data, function (response) {
                    alert(response);
                    if(response=="Your password has been changed."){
                        setTimeout(function(){
    window.location.href = "login.php";
}, 2000); // 2000 milliseconds delay (2 seconds)

                }
                });
            }

        });
    </script>
</body>

</html>
