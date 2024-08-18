<?php
require '../connection.php';

// Initialize response array
$response = array();

try {
    
    // Get the values from the form
    $firstName = $_POST['firstName'];
    $middleName = $_POST['middleName'];
    $lastName = $_POST['lastName'];
    $contactNumber = $_POST['contactNumber'];
    $visitorEmail = $_POST['visitorEmail'];
    $brgy = $_POST['brgy'];
    $documentType = $_POST['documentType'];
    $purpose = isset($_POST['purpose']) ? $_POST['purpose'] : '';
    $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : '';
    $income = isset($_POST['income']) ? $_POST['income'] : '';
    $businessName = isset($_POST['businessName']) ? $_POST['businessName'] : '';
    $businessNature = isset($_POST['businessNature']) ? $_POST['businessNature'] : '';

// Check if required fields are empty
if (empty($_POST['firstName']) || empty($_POST['middleName']) || empty($_POST['lastName']) || empty($_POST['contactNumber']) || empty($_POST['visitorEmail']) || empty($_POST['brgy']) || empty($_POST['documentType'])) {
    $response['title'] = 'Empty Fields';
    $response['icon'] = 'error';
    $response['message'] = 'All fields are required.';
    echo json_encode($response);
    exit(); // Stop further execution
}

// Check email format
if (!filter_var($_POST['visitorEmail'], FILTER_VALIDATE_EMAIL)) {
    $response['title'] = 'Invalid email format.';
    $response['icon'] = 'error';
    $response['message'] = 'Invalid email format.';
    echo json_encode($response);
    exit(); // Stop further execution
}
    // Prepare and bind SQL statement
    $sql = "INSERT INTO walkinrequests (firstName, middleName, lastName, contactNumber, visitorEmail, documentType, purpose, occupation, income, businessName, businessNature, brgy) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $firstName, $middleName, $lastName, $contactNumber, $visitorEmail, $documentType, $purpose, $occupation, $income, $businessName, $businessNature, $brgy);

    // Execute the statement
    if ($stmt->execute()) {
        $response = [
            'title' => "Please wait while your request is being processed...",
            'icon' => 'success'
        ];
    } else {
        throw new Exception("Error executing SQL statement.");
    }
} catch (Exception $e) {
    // Handle exceptions
    $response = [
        'title' => "Error: " . $e->getMessage(),
        'icon' => 'error'
    ];
}

// Return the JSON response
echo json_encode($response);
?>
