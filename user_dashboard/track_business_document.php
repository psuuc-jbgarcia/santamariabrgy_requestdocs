<?php
require '../connection.php';
$tid = $_GET['tid'];
$stmt = "select * from permits where tracking_code=?";
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
                                <th>Business Owner Full Name</th>
                                <th>Business Name</th>
                                <th>Business Nature</th>
                                <th>Pick Up Date</th>
                                <th>Type</th>
                                <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr <?php if ($row["status"] === "Pending") echo 'style="background-color: #ffcccc;"'; ?>
    <?php if ($row["status"] === "Process") echo 'style="background-color: #cceeff;"'; ?>
    <?php if ($row["status"] === "Ready to Pick Up") echo 'style="background-color: #ADD8E6;"'; ?>
    <?php if ($row["status"] === "Released") echo 'style="background-color: #90EE90;"'; ?>>
    <td><?php echo $row["tracking_code"]; ?></td>
    <td><?php echo $row["business_owner_full_name"]; ?></td>
    <td><?php echo $row["business_name"]; ?></td>
    <td><?php echo $row["business_nature"]; ?></td>
    <td><?php echo date("F j, Y", strtotime($row["date_applied"])); ?></td>
    <td><?php echo $row["type"]; ?></td>
    <td><?php echo $row["status"]; ?></td>
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
 