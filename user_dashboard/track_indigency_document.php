<?php
require '../connection.php';
$tid = $_GET['tid'];
$stmt = "select * from certificates where tracking_code=?";
$result = $conn->prepare($stmt);
$result->bind_param('s', $tid);
$result->execute();
$result = $result->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <tr>
                       
            <th>Tracking Code</th>
            <th>Full Name</th>
            <th>Purpose</th>
            <th>Type</th>

            <th>Status</th>
            <th>Pick Up Date</th>
           
                        </tr>
                    </thead>
                    <tbody>
                    <tr <?php if ($row["status"] === "Pending") echo 'style="background-color: #ffcccc;"'; ?>
    <?php if ($row["status"] === "Process") echo 'style="background-color: #cceeff;"'; ?>
    <?php if ($row["status"] === "Ready to Pick Up") echo 'style="background-color:#ADD8E6;"'; ?>
    <?php if ($row["status"] === "Released") echo 'style="background-color:#90EE90;"'; ?>>
    <td><?php echo $row["tracking_code"]; ?></td>
    <td><?php echo $row["full_name"]; ?></td>
    <td><?php echo $row["purpose"]; ?></td>
    <td><?php echo $row["type"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
    <td><?php echo date("F j, Y", strtotime($row["pick_up_date"])); ?></td>
</tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
} else {
    // Display a message when no records are found
    echo "<div class='container mt-3'>";
    echo "<div class='alert alert-danger' role='alert'>"; // Change alert-info to alert-danger
    echo "No records found.";
    echo "</div>";
    echo "</div>";
    
}

?>
