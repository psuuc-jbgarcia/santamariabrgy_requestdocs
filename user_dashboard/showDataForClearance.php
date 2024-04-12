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
            <input type="text" class="form-control" id="clearanceFullName" value="<?php echo $data['fname']." ".$data['mname']." " .$data['lname'] ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="clearancePickUpDate" class="col-sm-3 col-form-label font-weight-bold">Pick Up Date:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="clearancePickUpDate" placeholder="Enter pick up date">
        </div>
    </div>
    <div class="form-group row">
        <label for="clearancePurpose" class="col-sm-3 col-form-label font-weight-bold">Purpose:</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="clearancePurpose" rows="3" placeholder="Enter purpose"></textarea>
        </div>
    </div>
<!-- Your existing HTML code -->
<div class="form-group row">
    <label for="recipient" class="col-sm-3 col-form-label font-weight-bold">Recipient:</label>
    <div class="col-sm-9">
        <select class="form-control" id="recipient" name="recipient">
            <option value="Myself">Myself</option>
            <option value="Mother">Mother</option>
            <option value="Son">Son</option>
        </select>
        <small id="recipientMessage" class="form-text text-muted" style="display: none;">If you are getting the document for yourself, you can ignore this selection.</small>
    </div>
</div>
<div class="form-group row" id="recipientNameInput" style="display: none;">
    <label for="recipientName" class="col-sm-3 col-form-label font-weight-bold">Recipient's Name:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="recipientName" placeholder="Enter recipient's name">
    </div>
</div>
<!-- Your existing PHP code -->

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
        function toggleRecipientNameInput() {
            const recipientValue = $('#recipient').val();
            const recipientNameInput = $('#recipientNameInput');
            if (recipientValue === "Mother" || recipientValue === "Son") {
                recipientNameInput.show(); // Show input field if Mother or Son is selected
            } else {
                recipientNameInput.hide(); // Hide input field otherwise
            }
        }

        // Event listener for when the recipient dropdown changes
        $('#recipient').change(function() {
            // Call the function to toggle recipient name input field
            toggleRecipientNameInput();
        });

        // Call the function initially to set the visibility based on the default selected option
        toggleRecipientNameInput();
    });
</script>
