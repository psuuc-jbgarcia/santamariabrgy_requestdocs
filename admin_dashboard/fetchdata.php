<?php
// Connect to your database (replace placeholders with your actual database credentials)
require '../connection.php';
// Create connection

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch data for each type of request and number of users
$request_counts = array();

// Query to get the number of requests for Barangay Clearance
$sql_brgy_clearance = "SELECT COUNT(*) AS clearance_count FROM clearance";
$result_brgy_clearance = $conn->query($sql_brgy_clearance);
$clearance_count = 0;
if ($result_brgy_clearance->num_rows > 0) {
  $row = $result_brgy_clearance->fetch_assoc();
  $request_counts['clearance'] = $row["clearance_count"];
}

// Query to get the number of requests for Business Permit
$sql_business_permit = "SELECT COUNT(*) AS permit_count FROM permits";
$result_business_permit = $conn->query($sql_business_permit);
$permit_count = 0;
if ($result_business_permit->num_rows > 0) {
  $row = $result_business_permit->fetch_assoc();
  $request_counts['permit'] = $row["permit_count"];
}

// Query to get the number of requests for Indigency Certificate
$sql_indigency_cert = "SELECT COUNT(*) AS indigency_count FROM certificates";
$result_indigency_cert = $conn->query($sql_indigency_cert);
$indigency_count = 0;
if ($result_indigency_cert->num_rows > 0) {
  $row = $result_indigency_cert->fetch_assoc();
  $request_counts['indigency'] = $row["indigency_count"];
}

// Query to get the number of requests for Residency Certificate
$sql_residency_cert = "SELECT COUNT(*) AS residency_count FROM residency";
$result_residency_cert = $conn->query($sql_residency_cert);
$residency_count = 0;
if ($result_residency_cert->num_rows > 0) {
  $row = $result_residency_cert->fetch_assoc();
  $request_counts['residency'] = $row["residency_count"];
}

// Query to get the number of users
$sql_users = "SELECT COUNT(*) AS user_count FROM users";
$result_users = $conn->query($sql_users);
$user_count = 0;
if ($result_users->num_rows > 0) {
  $row = $result_users->fetch_assoc();
  $request_counts['users'] = $row["user_count"];
}

// Close the connection
$conn->close();

// Send the data as JSON
header('Content-Type: application/json');
echo json_encode($request_counts);
?>
