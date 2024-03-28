<?php
session_start();
require '../connection.php';

// Function to sanitize input data
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}


// Retrieve and sanitize input data
$username = sanitize($_POST['username']);
$email = sanitize($_POST['email']);
$password = $_POST['password']; // No need to sanitize passwords for hashing
$cpass = $_POST['cpass'];
$fname=sanitize($_POST['fname']);
$lname=sanitize($_POST['lname']);
$mname=sanitize($_POST['mname']);
$gender=sanitize($_POST['gender']);
$purok = sanitize($_POST['purok']);
$brgy = sanitize($_POST['brgy']);
$imageDataURL = $_POST["imageDataURL"];

// Check if all required fields are provided
if (empty($username) || empty($email) || empty($password)||empty($fname)||empty($mname)||empty($lname) || empty($cpass) ||  empty($purok) || empty($brgy) || empty($imageDataURL)) {
    echo "Error: All fields are required.";
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit(); // Stop further execution
}
// Check if username and password match
if ($password !== $cpass) {
    echo "Error: Passwords do not match.";
    exit;
}

// Check if email is already registered
$emailCheckStmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$emailCheckStmt->bind_param("s", $email);
$emailCheckStmt->execute();
$emailCheckResult = $emailCheckStmt->get_result();

if ($emailCheckResult->num_rows > 0) {
    echo "Error: Email address already exists.";
    exit;
}

// Password validation
if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password)) {
    echo "Error: Password must be at least 8 characters long and contain at least one uppercase letter.";
    exit;
}

// Check if username is already taken in the users table
$usernameCheckStmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$usernameCheckStmt->bind_param("s", $username);
$usernameCheckStmt->execute();
$usernameCheckResult = $usernameCheckStmt->get_result();

if ($usernameCheckResult->num_rows > 0) {
    echo "Error: Username already taken.";
    exit;
}

// Proceed with image upload
$base64Image = str_replace('data:image/jpeg;base64,', '', $imageDataURL);
$imageData = base64_decode($base64Image);
$uploadDirectory = '../user_registration/userimage/';
$filename = 'snapshot_' . time() . '.jpg';
$filePath = $uploadDirectory . $filename;

if (!file_put_contents($filePath, $imageData)) {
    echo "Error: Failed to save image.";
    exit;
}

// Insert user data into the database
$hashedPasswordUser=password_hash($password,PASSWORD_BCRYPT);
$insertStmt = $conn->prepare("INSERT INTO users (username, email, passwords, fname,mname,lname,gender, purok, barangay, profile_picture) VALUES (?, ?, ?, ?, ?, ?,?, ?,?,?)");
$insertStmt->bind_param("ssssssssss", $username, $email, $hashedPasswordUser, $fname,$mname,$lname, $gender,$purok, $brgy, $filename);

if ($insertStmt->execute()) {
    echo "Registered Successfully";
    $_SESSION['user']=$username;
    $_SESSION['email']=$email;

    exit();
    } else {
    echo "Error: Failed to register user.";
}

$insertStmt->close();
$emailCheckStmt->close();
$usernameCheckStmt->close();
$conn->close();
?>
