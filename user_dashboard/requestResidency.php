<?php
session_start();
require '../connection.php';

// Retrieve data sent via AJAX
$trackingCode = $_POST['trackingCode'];
$fullName = $_POST['fullName'];
$pickUpDate = $_POST['pickUpDate'];
$purpose = $_POST['purpose'];
$type = "Residency Certificate";
$status = "Pending";
$username = $_SESSION['user'];
$email = $_SESSION['email'];
$recipent=$_POST['recipent'];
if($recipent==""){
    $recipent="Myself";
}

// Perform input validation
if(empty($trackingCode) || empty($fullName) || empty($pickUpDate) || empty($purpose) || empty($type) || empty($status) || empty($username)) {
    $response = [
        'title' => 'Fill up all fields',
        'text' => '',
        'icon' => 'error'
    ];
    // echo 'empty';
} else {
    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO residency (tracking_code, full_name, pickup_date, purpose, type, status, username,email,recipent,date_requested) VALUES (?,?, ?, ?, ?, ?, ?, ?,?,NOW())");
    $stmt->bind_param("sssssssss", $trackingCode, $fullName, $pickUpDate, $purpose, $type, $status, $username,$email,$recipent);

    if($stmt->execute()) {
      // echo "add";
        $response = [
            'title' => 'Request Successful',
            'text' => 'Please wait while we process your request.',
            'icon' => 'success'
        ];
    } else {
      echo 'error';
        $response = [
            'title' => 'Request Error',
            'text' => '',
            'icon' => 'error'
        ];
    }
}

echo json_encode($response);
?>
