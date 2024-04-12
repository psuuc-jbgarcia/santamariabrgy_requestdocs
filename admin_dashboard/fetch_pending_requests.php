<?php
// Include your database connection file
require '../connection.php';

// Fetch pending requests from all four tables
$query = "SELECT tracking_code, full_name AS name, 'Indigency Certificate' AS document_type, email FROM certificates 
          UNION
          SELECT tracking_code, fullname AS name, 'Barangay Clearance' AS document_type, email FROM clearance
          UNION
          SELECT tracking_code, business_owner_full_name AS name, 'Business Permit' AS document_type, email FROM permits 
          UNION
          SELECT tracking_code, full_name AS name, 'Residency Certificate' AS document_type, email FROM residency ";

$result = $conn->query($query);

if ($result) {
    $requests = array();
    while ($row = $result->fetch_assoc()) {
        $requests[] = $row;
    }
    // Return the requests as JSON
    echo json_encode($requests);
} else {
    // Error handling if the query fails
    $response = [
        'error' => 'Failed to fetch pending requests from the database'
    ];
    echo json_encode($response);
}

// Close the database connection
$conn->close();
?>
