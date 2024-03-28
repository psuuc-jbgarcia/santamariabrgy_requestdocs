<?php
// Connect to your database (replace placeholders with your actual database credentials)
require '../connection.php';

// Query to get total revenue by month
$sql_revenue = "SELECT MONTH(date_paid) AS month, SUM(amount) AS total_revenue FROM payment GROUP BY MONTH(date_paid)";
$result_revenue = $conn->query($sql_revenue);
$total_revenue = array();
if ($result_revenue->num_rows > 0) {
    while ($row = $result_revenue->fetch_assoc()) {
        $total_revenue[$row['month']] = $row['total_revenue'];
    }
}

// Close the connection
$conn->close();

// Send the data as JSON
header('Content-Type: application/json');
echo json_encode($total_revenue);
?>
