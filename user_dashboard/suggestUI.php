<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestion Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js//main.js"></script>
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../landingpage/backround.png') center/cover no-repeat;
            color: #fff;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .card-header {
            background: linear-gradient(to right, #28a745, #155724);
            color: #fff;
        }
        h2 {
            color: #155724;
        }
        label {
            color: #155724;
        }
        .btn-submit {
            background: linear-gradient(to right, #28a745, #155724);
            border-color: #28a745;
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-6">
                <!-- Place your logo here -->
                <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" height="70px">
            </div>
            <div class="col-md-6 text-right">
                <!-- Button for navigation -->
                <a href="userdashboard.php" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card p-4">
            <div class="card-header">
                <h2 class="mb-0">Suggestion Form</h2>
            </div>
            <div class="card-body" id="suggestbody">
                 
            
            </div>
        </div>
    </div>
</body>
<script>
    $(function(){
        loadsuggest();

       function loadsuggest(){
        $("#suggestbody").load("suggestload.php");
       }
    })
</script>
</html>
