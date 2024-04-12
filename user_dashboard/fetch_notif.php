<style>
     .notification-card {
        border: 1px solid #ccc; /* Add border for card-like appearance */
        border-radius: 5px; /* Add border radius for rounded corners */
        padding: 10px; /* Add padding for spacing */
        margin-bottom: 10px; /* Add margin between cards */
        background-color: #f9f9f9; /* Add background color */
    }
    /* CSS styles for notification content */
    .notification-content {
        max-width: 100%;
        overflow-wrap: break-word; /* Wrap long words to prevent overflow */
        font-size: 16px; /* Adjust font size as needed */
    }

    /* Media query for smaller screens */
    @media (max-width: 576px) {
        .notification-content {
            font-size: 14px; /* Reduce font size for smaller screens */
        }
    }

    /* Additional styles for modal */
    .modal-body {
        padding: 10px; /* Add padding to modal body */
    }
</style>

<?php
session_start();
$email=$_SESSION['email'];
require '../connection.php';      
// Fetch notifications from the database
$stmt = "SELECT * FROM notifications where user_email='$email' order by id desc";
$result = $conn->query($stmt);

// Check if there are any notifications
if ($result->num_rows > 0) {
    // Output each notification as a card
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $message = $row['message'];
        $createdAt = $row['created_at'];
        $isRead = $row['is_read'] == 1 ? 'Read' : 'Unread'; // Convert 1 to Read and 0 to Unread

        // Output notification card
        echo '<div class="notification-card">';
        echo '<strong>' . $message . '</strong><br>';
        echo '<small>Received at: ' . $createdAt . '</small><br>';
        echo '<small>Status: ' . $isRead . '</small>';
        echo '</div>';
    }
} else {
    // If there are no notifications
    echo '<p>No notifications</p>';
}
?>