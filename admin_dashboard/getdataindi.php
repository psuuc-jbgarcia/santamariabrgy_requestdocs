<?php
require '../connection.php';

$tracking_code = $_GET['trackingCode'];
$email = $_GET['email'];

$response = array();

$stmt1 = "select * from certificates where tracking_code=?";
$result1 = $conn->prepare($stmt1);
$result1->bind_param('s', $tracking_code);
$result1->execute();
$result1 = $result1->get_result();

if ($result1->num_rows > 0) {
    $data = $result1->fetch_assoc();

    $stmtBRGY1 = "select * from users where email=?";
    $resultBRGY1 = $conn->prepare($stmtBRGY1);
    $resultBRGY1->bind_param('s', $email);
    $resultBRGY1->execute();
    $resultBRGY1 = $resultBRGY1->get_result();
    if ($resultBRGY1->num_rows > 0) {
        $brgy = $resultBRGY1->fetch_assoc();

        // Calculate expiry date (6 months from issue date)
        $issueDate = $data['date'];
        $expiryDate = date('Y-m-d', strtotime('+6 months', strtotime($issueDate)));

        $response['applicantName'] = $data['full_name'];
        $response['address'] = $brgy['barangay'];
        $response['purpose'] = $data['purpose'];
        $response['issueDate'] = $issueDate;
        $response['expiryDate'] = $expiryDate;
        // Include other fields here
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
