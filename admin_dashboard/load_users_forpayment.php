<label for="selectedUserEmail" style="color: #28a745;">Select User Email:</label>
<select class="form-control" id="selectedUserEmail" style="color: #28a745;">
    <?php
    require '../connection.php'; // Assuming this file contains your database connection

    // Query to select emails from the users table
    $stmt = "SELECT email FROM users";
    $result = $conn->prepare($stmt);
    $result->execute();
    $result = $result->get_result();

    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Loop through each row and output email as an option
        while ($data = $result->fetch_assoc()) {
            echo '<option value="' . $data['email'] . '">' . $data['email'] . '</option>';
        }
    }
    ?>
</select>
