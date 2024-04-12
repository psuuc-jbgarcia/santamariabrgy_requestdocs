<?php  
require '../connection.php'; 

// Fetch count of unread notifications from the database
$stmt = "SELECT COUNT(*) AS unread_count FROM notifications WHERE is_read = 0";
$result = $conn->query($stmt);

// Check if the query was successful
if ($result) {
    // Fetch the unread count
    $row = $result->fetch_assoc();
    $unreadCount = $row['unread_count'];

    // Output the badge with the unread count if there are unread notifications
    if ($unreadCount > 0) {
        echo '<span id="notificationBadge" class="badge badge-danger">' . $unreadCount . '</span>';
    }
    else{
        echo '<span id="notificationBadge" class="badge badge-danger"></span>';

    }
} else {
    // Handle errors
    echo '<span id="notificationBadge" class="badge badge-danger">Error</span>';
}
?>
