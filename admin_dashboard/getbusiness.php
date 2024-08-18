<?php
require '../connection.php';
$tracking_code = $_GET['trackingCode'];
$email = $_GET['email'];

$response = array();

// Fetch permit data
$stmt = "SELECT * FROM permits WHERE tracking_code=?";
$result = $conn->prepare($stmt);
$result->bind_param('s',$tracking_code );
$result->execute();
$data = $result->get_result()->fetch_assoc();

if ($data) {
    // Fetch user data associated with the permit
    $stmtUser = "SELECT * FROM users WHERE email=?";
    $resultUser = $conn->prepare($stmtUser);
    $resultUser->bind_param('s', $email); // Assuming email is the user identifier
    $resultUser->execute();
    $userData = $resultUser->get_result()->fetch_assoc();

    if ($userData) {
        // You may need additional queries to fetch related data, depending on your database schema
        $issueDate = $data['date'];
        $expiryDate = date('Y-m-d', strtotime('+6 months', strtotime($issueDate)));
        $response['businessName'] = $data['business_name'];
        $response['businessType'] = $data['business_nature'];
        $response['ownerName'] = $data['business_owner_full_name'];
        $response['startDate'] = $data['date_applied'];
        $response['endDate'] = $data['date'];
        $response['barangayName'] = $userData['barangay']; // Assuming barangay name is stored in the 'barangay' column
        $response['expiryDate'] = $expiryDate; // Include expiry date in the response

        // Include other fields here if needed
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
