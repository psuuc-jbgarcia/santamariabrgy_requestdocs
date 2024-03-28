<?php 
session_start();
require '../connection.php';

// Check if the user is logged in
if(isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    
    // Prepare and execute the SQL query to fetch certificate data for the logged-in user
    $stmt = "SELECT * FROM residency WHERE username=? order by id desc";
    $result = $conn->prepare($stmt);
    $result->bind_param("s", $username);
    $result->execute();
    $certificateData = $result->get_result();
    
    // Check if there are any rows returned
    if($certificateData->num_rows > 0) {
        // Output data of each row
        while($row = $certificateData->fetch_assoc()) {
            // Output each row of data as table rows
            echo "<tr>";
            echo "<td>" . $row["tracking_code"] . "</td>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . date("F j, Y", strtotime($row["pick_up_date"])) . "</td>";
            echo "<td>" . $row["type"] . "</td>";
            // echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . date("F j, Y", strtotime($row["date_requested"])) . "</td>";
            
            // Add a "Cancel Request" button for each row
            // echo '<td><button class="btn btn-danger cancel-btn" data-toggle="modal" data-target="#cancelResidencyModal">Cancel Request</button>
            // </td>';

            echo "</tr>";
        }
    } else {
        // If no rows are returned, display a message
        echo "<tr><td colspan='6'>No certificates found for this user.</td></tr>";
    }
} else {
    // If the user is not logged in, display a message
    echo "<tr><td colspan='6'>User is not logged in.</td></tr>";
}

// Close the database connection
$conn->close();
?>
