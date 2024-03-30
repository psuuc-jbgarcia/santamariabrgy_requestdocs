<?php
session_start();
// Include your database connection file
require '../connection.php';

$response=array();
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$alias = $_POST['alias'];
$placeOfBirth = $_POST['place_of_birth'];
$birthdate = $_POST['birthdate'];
$sex = $_POST['sex'];
$religion = $_POST['religion'];
$citizenship = $_POST['citizenship'];
$civilStatus = $_POST['civil_status'];
$occupation = $_POST['occupation'];
$registeredVoter = $_POST['registered_voter'];
$contactNumber = $_POST['contact_number'];
$barangay = $_POST['barangay'];
$age = $_POST['age'];
$purok = $_POST['purok'];

$householdNumber = $_POST['household_number'];
$username = $_SESSION['user'];

$conn->begin_transaction();

$stmtUsers = $conn->prepare("UPDATE users SET fname=?, mname=?, lname=?, gender=?, purok=?, barangay=? WHERE username=?");
$stmtUsers->bind_param('sssssss', $firstname, $middlename, $lastname, $sex, $purok, $barangay, $username);
$stmtUsers->execute();

$stmtPersonalInfo = $conn->prepare("UPDATE personalinformation SET alias=?, place_of_birth=?, birthdate=?,age=? ,religion=?, citizenship=?, civil_status=?, occupation=?, registered_voter=?, contact_number=?, household_number=? WHERE username=?");
$stmtPersonalInfo->bind_param('ssssssssssss', $alias, $placeOfBirth, $birthdate,$age, $religion, $citizenship, $civilStatus, $occupation, $registeredVoter, $contactNumber, $householdNumber, $username);
$stmtPersonalInfo->execute();
if ($stmtUsers==true && $stmtPersonalInfo==true) {
    // If both updates were successful, commit the transaction
    $conn->commit();
    $response=[
        'title'=>'Profile updated successfully',
        'icon'=>'success'
    ];
} else {
    $conn->rollback();
    $response=[
        'title'=>'Failed to update profile',
        'icon'=>'error'
    ];
}

// Close the statements
$stmtUsers->close();
$stmtPersonalInfo->close();

// Close the database connection
$conn->close();
echo json_encode($response);
?>
