<?php
session_start();
$email = $_SESSION['email'];
require '../connection.php';
?>

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
</style>

<?php
// Fetch notifications from the database
$stmt = "SELECT * FROM notifications WHERE user_email='$email' ORDER BY id DESC";
$result = $conn->query($stmt);

// Check if there are any notifications
if ($result->num_rows > 0) {
    // Output each notification as a card
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $message = $row['message'];
        $createdAt = $row['created_at'];

        // Extract tracking code from the message
        preg_match('/tracking code (\d+)/i', $message, $matches);
        $trackingCode = isset($matches[1]) ? $matches[1] : '';

        // Highlight tracking code in the message
        $highlightedMessage = preg_replace('/(\b'.$trackingCode.'\b)/i', '<span style="background-color: yellow; cursor: pointer;" onclick="redirectToDocumentRequest(\''.$trackingCode.'\')">$1</span>', $message);

        // Calculate time elapsed
        $now = new DateTime();
        $ago = new DateTime($createdAt);
        $diff = $now->diff($ago);

        $weeks = floor($diff->days / 7); // Calculate weeks directly from days
        $days = $diff->days % 7; // Calculate remaining days

        // Output notification card
        echo '<div class="notification-card">';
        echo '<strong>' . $highlightedMessage . '</strong><br>';
        echo '<small>Received ';
        if ($diff->y > 0) {
            echo $diff->y . ' year(s) ';
        } elseif ($diff->m > 0) {
            echo $diff->m . ' month(s) ';
        } elseif ($weeks > 0) {
            echo $weeks . ' week(s) ';
        } elseif ($days > 0) {
            echo $days . ' day(s) ';
        } elseif ($diff->h > 0) {
            echo $diff->h . ' hour(s) ';
        } elseif ($diff->i > 0) {
            echo $diff->i . ' minute(s) ';
        } elseif ($diff->s > 0) {
            echo $diff->s . ' second(s) ';
        }
        echo 'ago</small><br>';
        echo '</div>';
    }
} else {
    // If there are no notifications
    echo '<p>No notifications</p>';
}
?>

<script>
    function redirectToDocumentRequest(trackingCode) {
        window.location.href = 'requestedDocs_copy.php?tracking_code=' + trackingCode;
    }
</script>
