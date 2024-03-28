<?php
require '../connection.php';
session_start();

// Check if new password and confirm password are set
if(isset($_POST['newpass']) && isset($_POST['confirmpass'])) {
    $newpass = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];

    // Validate if new password matches confirm password
    if($newpass !== $confirmpass) {
        echo "New password and confirm password do not match.";
        exit(); // Stop execution
    }

    // Validate password length and uppercase letter presence
    if (strlen($newpass) < 8 || !preg_match("/[A-Z]/", $newpass)) {
        echo "Error: Password must be at least 8 characters long and contain at least one uppercase letter.";
        exit;
    }

    // Hash the new password
    $hashedpassword = password_hash($newpass, PASSWORD_BCRYPT);

    // Retrieve email from session
    $email = $_SESSION['email'];

    // Update password in the database
    $stmt = "UPDATE users SET passwords=? WHERE email=?";
    $result = $conn->prepare($stmt);
    $result->bind_param("ss", $hashedpassword, $email);

    if($result->execute() === true) {
        echo "Your password has been changed.";
        header("Refresh:1;url=login.php");
        session_destroy(); // Destroy session after successful password change
    } else {
        echo 'Error occurred while updating password.';
    }
} else {
    echo "New password or confirm password not provided.";
}
?>
