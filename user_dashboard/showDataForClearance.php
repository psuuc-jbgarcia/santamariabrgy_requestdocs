<?php 
session_start();
require '../connection.php';
$username = $_SESSION['user'];
$stmt = "select fname,mname,lname from users where username=?";
$result = $conn->prepare($stmt);
$result->bind_param("s", $username);
$result->execute();
$result = $result->get_result();
if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
?>
    <div class="form-group row">
        <label for="clearanceTrackingCode" class="col-sm-3 col-form-label font-weight-bold">Tracking Code:</label>
        <div class="col-sm-9">
            <small class="form-text text-muted">
                Click the tracking code to copy for order reference.
            </small>
            <input type="text" class="form-control" id="clearanceTrackingCode" value="<?php echo mt_rand(100000, 999999); ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="clearanceFullName" class="col-sm-3 col-form-label font-weight-bold">Full Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="clearanceFullName" placeholder="Enter full name" value="<?php echo $data['fname']." ".$data['mname']." " .$data['lname'] ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="clearancePickUpDate" class="col-sm-3 col-form-label font-weight-bold">Pick Up Date:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="clearanceDateApplied" placeholder="Enter date applied">
        </div>
    </div>
    <div class="form-group row">
        <label for="clearancePurpose" class="col-sm-3 col-form-label font-weight-bold">Purpose:</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="clearancePurpose" rows="3" placeholder="Enter purpose"></textarea>
        </div>
    </div>
    <div class="col-sm-9">
    <input type="hidden" id="type" value="Barangay Clearance">
        </div>
    <div class="form-group row">
        <div class="col-sm-9 offset-sm-3">
            <!-- Offset the column to align with other fields -->
            <div class="alert alert-warning" role="alert">
                Please bring 100.00 pesos for payment
            </div>
        </div>
    </div>
 
<?php
}
?>
<script>
    $(document).ready(function() {
        // Function to copy the tracking code when clicked
        function copyTrackingCode() {
            // Select the tracking code input field
            var trackingCodeInput = document.getElementById("clearanceTrackingCode");

            // Select its content
            trackingCodeInput.select();
            trackingCodeInput.setSelectionRange(0, 99999); // For mobile devices

            // Copy the selected content
            document.execCommand("copy");

            // Deselect the input field
            trackingCodeInput.blur();

            // Show a message to indicate that the tracking code has been copied
            alert("Tracking code copied to clipboard: " + trackingCodeInput.value);
        }

        // Event listener for when the tracking code input field is clicked
        $('#clearanceTrackingCode').click(function() {
            // Call the function to copy the tracking code
            copyTrackingCode();
        });
    });
</script>
