<?php
session_start();
require '../connection.php';

$tcode = $_POST['tracking'];
$fullname = $_POST['fullname'];
$pdate = $_POST['pickupdate'];
$purpose = $_POST['purpose'];
$type = $_POST['type'];
$status = $_POST['status'];

// Check if session variables are set and not empty
if (isset($_SESSION['user']) && isset($_SESSION['email']) && !empty($_SESSION['user']) && !empty($_SESSION['email'])) {
    $username = $_SESSION['user'];
    $email = $_SESSION['email'];

    if ($purpose == "" || $pdate == "") {
        $response = [
            'title' => 'Fill up all fields',
            'text' => '',
            'icon' => 'error'
        ];
    } else {
        $stmt = "INSERT INTO clearance (tracking_code, fullname, pickup_date, purpose, type, status, username, email, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $result = $conn->prepare($stmt);
        $result->bind_param("ssssssss", $tcode, $fullname, $pdate, $purpose, $type, $status, $username, $email);
        $result->execute();

        if ($result == true) {
            $response = [
                'title' => 'Request Successful',
                'text' => 'Please wait while we process your request.',
                'icon' => 'success'
            ];
        } else {
            $response = [
                'title' => 'Request Error',
                'text' => '',
                'icon' => 'error'
            ];
        }
    }
} else {
    // Session variables not set or empty
    $response = [
        'title' => 'Session Error',
        'text' => 'User session data not found.',
        'icon' => 'error'
    ];
}

echo json_encode($response);
?>
