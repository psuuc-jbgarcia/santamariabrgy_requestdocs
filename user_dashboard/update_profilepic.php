<?php
session_start();
require '../connection.php';
$response=array();
if(isset($_POST['profileImageData'])) {
    $username = $_SESSION['user'];

    $profileImageData = $_POST['profileImageData'];

    $profileImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $profileImageData));

    $uploadDirectory = '../user_registration/userimage/';

    $filename = uniqid() . '.png';

    $filePath = $uploadDirectory . $filename;

    if(file_put_contents($filePath, $profileImage)) {
        $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE username = ?");
        $stmt->bind_param('ss', $filename, $username);

        if($stmt->execute()) {
            $response=[
                'title'=>'Profile picture updated successfully.',
                'icon'=>'success'
            ];
        } else {
            // Failed to update profile picture
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // If failed to save the image file
    }
} else {
    $response=[
        'title'=>'No profile image data received.',
        'icon'=>'error'

    ];
}
echo json_encode($response);
?>
