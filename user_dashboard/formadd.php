<?php 
session_start();
require '../connection.php';

// Check if any of the fields is empty
if(empty($_POST['alias']) || empty($_POST['placeOfBirth']) || empty($_POST['birthdate']) || empty($_POST['age']) || empty($_POST['religion']) || empty($_POST['civilStatus']) || empty($_POST['citizenship']) || empty($_POST['occupation']) || empty($_POST['registeredVoter']) || empty($_POST['contactNumber']) || empty($_POST['householdNumber'])) {
    echo "Please fill in all fields.";
    exit(); // Stop further execution
}

$alias = $_POST['alias'];
$placeOfBirth = $_POST['placeOfBirth'];
$birthdate = $_POST['birthdate'];
$age = $_POST['age'];
$religion = $_POST['religion'];
$civilStatus = $_POST['civilStatus'];
$citizenship = $_POST['citizenship'];
$occupation = $_POST['occupation'];
$registeredVoter = $_POST['registeredVoter'];
$contactNumber = $_POST['contactNumber'];
$householdNumber = $_POST['householdNumber'];
$username = $_SESSION['user'];

$stmt = "INSERT INTO personalinformation (alias, place_of_birth, birthdate, age, religion, citizenship, civil_status, occupation, registered_voter, contact_number, household_number, username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$result = $conn->prepare($stmt);
$result->bind_param("sssissssssss", $alias, $placeOfBirth, $birthdate, $age, $religion, $citizenship, $civilStatus, $occupation, $registeredVoter, $contactNumber, $householdNumber, $username);
$result->execute();

if($result === false) {
    echo "Error: " . $conn->error;
} else {
    if($result->affected_rows > 0){
        echo "You have successfully filled up the form";
    } else {
        echo "Error: No rows were affected";
    }
}


?>
