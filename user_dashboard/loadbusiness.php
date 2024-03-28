<?php
session_start();
require '../connection.php';

// Check if the user is logged in
if(isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    
    // Prepare and execute the SQL query to fetch permits data for the logged-in user
    $stmt = "SELECT * FROM permits WHERE username=? order by id desc";
    $result = $conn->prepare($stmt);
    $result->bind_param("s", $username);
    $result->execute();
    $permitData = $result->get_result();
    
    // Check if there are any rows returned
    if($permitData->num_rows > 0) {
        // Output data of each row
        while($row = $permitData->fetch_assoc()) {
            // Output each row of data as table rows
            echo "<tr>";
            echo "<td>" . $row["tracking_code"] . "</td>";
            echo "<td>" . date("F j, Y", strtotime($row["date_applied"])) . "</td>";
            
            echo "<td>" . $row["business_owner_full_name"] . "</td>";
            echo "<td>" . $row["business_name"] . "</td>";
            echo "<td>" . $row["business_nature"] . "</td>";
            // echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . date("F j, Y", strtotime($row["date"])) . "</td>"; // Outputting the date in the desired format
            
            
            // Add a "Cancel Request" button for each row
            // echo '<td><button class="btn btn-danger cancel-btn" data-toggle="modal" data-target="#cancelPermitModal">Cancel Request</button>
            // ';

            echo "</tr>";
        }
    } else {
        // If no rows are returned, display a message
        echo "<tr><td colspan='10'>No permits found for this user.</td></tr>";
    }
} else {
    // If the user is not logged in, display a message
    echo "<tr><td colspan='10'>User is not logged in.</td></tr>";
}

// Close the database connection
$conn->close();
?>
