<?php
session_start();
require '../connection.php';

// Retrieve data sent via AJAX
$trackingCode = $_POST['trackingCode'];
$fullName = $_POST['fullName'];
$occupation = $_POST['occupation'];
$income = $_POST['income'];
$pickUpDate = $_POST['pickUpDate'];
$purpose = $_POST['purpose'];
$type = $_POST['type'];
$status = $_POST['status'];
$username = $_SESSION['user'];
$email = $_SESSION['email'];


// Check if any required field is empty
if ($occupation == "" || $income == "" || $pickUpDate == "" || $purpose == "" || $type == "" || $status == "") {
    $response = [
        'title' => 'Fill up all fields',
        'text' => '',
        'icon' => 'error'
    ];
    // echo "SS";
} else {
    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO certificates (tracking_code, full_name, occupation, income, pick_up_date, purpose, type, status, date, username,email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?,?)");
    $stmt->bind_param("ssssssssss", $trackingCode, $fullName, $occupation, $income, $pickUpDate, $purpose, $type, $status, $username,$email);

    if ($stmt->execute()) {
        $response = [
            'title' => 'Request Successful',
            'text' => 'Please wait while we process your request.',
            'icon' => 'success'
        ];
        // echo 'add';
    } else {
        $response = [
            'title' => 'Request Error',
            'text' => '',
            'icon' => 'error'
        ];
        // echo 'error';
    }
}

echo json_encode($response);
?>
