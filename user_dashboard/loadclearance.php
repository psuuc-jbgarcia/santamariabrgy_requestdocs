
<?php 
session_start();
require '../connection.php';

if(isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
    
    $stmt = "SELECT * FROM clearance WHERE username=? order by cid desc";
    $result = $conn->prepare($stmt);
    $result->bind_param("s", $username);
    $result->execute();
    $getresult = $result->get_result();
    
    if($getresult->num_rows > 0) {
        while($data = $getresult->fetch_assoc()) {
            // Output each row of data
            echo "<tr>";
            echo "<td>" . ucfirst($data['tracking_code']) . "</td>";
            echo "<td>" . ucfirst($data['fullname']) . "</td>";
            echo "<td>" . date("F j, Y", strtotime($data['pickup_date'])) . "</td>"; // Format pickup_date
            echo "<td>" . ucfirst($data['purpose']) . "</td>";
            echo "<td>" . ucfirst($data['type']) . "</td>";
            // echo "<td>" . ucfirst($data['status']) . "</td>";
            echo "<td>" . date("F j, Y", strtotime($data['date'])) . "</td>";
            // echo '<td><button class="btn btn-danger cancel-btn" onclick="cancelclearance('.$data["cid"].')">Cancel Request</button>';
         
            
            echo "</tr>";
        }
    } else {
        // Handle case when no rows are returned
        echo "<tr><td colspan='9'>No records found.</td></tr>";
    }
} else {
    // Handle case when user is not logged in
    echo "<tr><td colspan='9'>User is not logged in.</td></tr>";
}

$conn->close(); // Close the database connection
?>

<script>
            function cancelclearance(id) {
        alert(id);
        $.get("cancelclearance.php?id=" + id, function(data, status) {
            // Handle response if needed
        });
    }
    </script>

<!-- echo '<td><button class="btn btn-danger cancel-btn" data-toggle="modal" data-target="#cancelClearanceModal" onclick="cancelclearance('.$data["cid"].')">Cancel Request</button> -->
