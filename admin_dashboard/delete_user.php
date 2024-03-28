<?php
require '../connection.php';

$id = $_GET['id'];

// Fetch the username based on the user ID
$stmtUsername = "SELECT username FROM users WHERE id=?";
$resultUsername = $conn->prepare($stmtUsername);
$resultUsername->bind_param('i', $id);
$resultUsername->execute();
$resultUsername->store_result();

if ($resultUsername==true) {
    $resultUsername->bind_result($username);
    $resultUsername->fetch();

    // Delete records in other tables using the fetched username
    $tables = array("personalinformation", "permits", "certificates", "residency", "clearance");
    foreach ($tables as $table) {
        $stmtDelete = "DELETE FROM $table WHERE username=?";
        $resultDelete = $conn->prepare($stmtDelete);
        $resultDelete->bind_param('s', $username);
        $resultDelete->execute();
        $resultDelete->close();
    }

    // Delete the user account from the users table
    $stmtDeleteUser = "DELETE FROM users WHERE id=?";
    $resultDeleteUser = $conn->prepare($stmtDeleteUser);
    $resultDeleteUser->bind_param('i', $id);
    $resultDeleteUser->execute();

    if ($resultDeleteUser) {
        echo "The user account and associated records have been deleted.";
    } else {
        echo "Error while deleting user account.";
    }
} else {
    echo "User not found.";
}

$resultUsername->close();
$conn->close();
?>
