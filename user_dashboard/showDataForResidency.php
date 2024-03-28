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
        <label for="residencyTrackingCode" class="col-sm-3 col-form-label font-weight-bold">Tracking Code:</label>
        <div class="col-sm-9">
            <small class="form-text text-muted">
                Click the tracking code to copy for order reference.
            </small>
            <input type="text" class="form-control" id="residencyTrackingCode" value="<?php echo mt_rand(100000, 999999) ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyFullName" class="col-sm-3 col-form-label font-weight-bold">Full Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="residencyFullName" value="<?php echo $data['fname']." ".$data['mname']." " .$data['lname'] ?>" readonly>
        </div>
    </div>
    

    <div class="form-group row">
        <label for="indigencyPickUpDate" class="col-sm-3 col-form-label font-weight-bold">Pick Up Date:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="residencyPickUpDate" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyPurpose" class="col-sm-3 col-form-label font-weight-bold">Purpose:</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="residencyPurpose" rows="3" placeholder="Enter purpose"></textarea>
        </div>
    </div>
<?php
}
?>
<script>
$(document).ready(function(){
    // Function to copy the tracking code when clicked
    function copyTrackingCode() {
        // Select the tracking code input field
        var trackingCodeInput = document.getElementById("indigencyTrackingCode");

        // Select its content
        trackingCodeInput.select();

        // Copy the selected content
        document.execCommand("copy");

        // Deselect the input field
        trackingCodeInput.blur();

        // Show a message to indicate that the tracking code has been copied
        alert("Tracking code copied to clipboard: " + trackingCodeInput.value);
    }

    // Event listener for when the tracking code input field is clicked
    $('#indigencyTrackingCode').click(function(){
        // Call the function to copy the tracking code
        copyTrackingCode();
    });
});
</script>
