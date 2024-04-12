<?php
require '../connection.php';
$tid = $_GET['tid'];
$stmt = "SELECT * FROM residency WHERE tracking_code=?";
$result = $conn->prepare($stmt);
$result->bind_param('s', $tid);
$result->execute();
$result = $result->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Documents</title>
    <!-- Bootstrap CSS -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .status-circle {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }
        .pending { background-color: #ffcccc; }
        .process { background-color: #cceeff; }
        .ready { background-color: #ADD8E6; font-size: 14px; }
        .released { background-color: #90EE90; }
        .arrow-right {
            font-size: 20px;
            color: black;
            margin: 0 10px;
        }
        .no-records {
            font-size: 24px;
            font-weight: bold;
            color: #555;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <?php
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <div class="d-flex justify-content-center align-items-center">
            <?php if ($row["status"] === 'Pending') : ?>
                <div class="status-circle pending">
                    <?php echo $row["status"]; ?>
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
            <?php elseif ($row["status"] === 'Process') : ?>
                <div class="status-circle pending">
                    Pending
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
                <div class="status-circle process">
                    Process
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
            <?php elseif ($row["status"] === 'Ready to Pick Up') : ?>
                <div class="status-circle pending">
                    Pending
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
                <div class="status-circle process">
                    Process
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
                <div class="status-circle ready">
                    Ready<br>to Pick Up
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
            <?php elseif ($row["status"] === 'Released') : ?>
                <div class="status-circle pending">
                    Pending
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
                <div class="status-circle process">
                    Process
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
                <div class="status-circle ready">
                    Ready<br>to Pick Up
                </div>
                <i class="fas fa-arrow-right arrow-right"></i>
                <div class="status-circle released">
                    Released
                </div>
            <?php endif; ?>
        </div>
    <?php
    } else {
        // Display a message when no records are found
        echo "<div class='no-records'>No records found.</div>";
    }
    ?>
</div>


</body>
</html>
