<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Send a response back to the client
$response = array(
    'status' => 'success',
    'message' => 'Logout successful'
);
echo json_encode($response);
?>

