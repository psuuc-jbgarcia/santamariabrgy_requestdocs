<?php
require '../connection.php';

    $stmt = "UPDATE notifications SET is_read = 1 ";
    $updateResult = $conn->prepare($stmt);
    $updateResult->execute();

    // Check if the update was successful
    if ($updateResult !== false && $updateResult->affected_rows > 0) {
 echo "marked";        // Return success message
    } else {
        echo "not marrked";        // Return success message
    }

?>
