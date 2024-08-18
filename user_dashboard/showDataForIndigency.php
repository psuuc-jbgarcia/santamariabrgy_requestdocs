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
        <label for="indigencyTrackingCode" class="col-sm-3 col-form-label font-weight-bold">Tracking Code:</label>
        <div class="col-sm-9">
            <small class="form-text text-muted">
                Click the tracking code to copy for order reference.
            </small>
            <input type="text" class="form-control" id="indigencyTrackingCode" value="<?php echo mt_rand(100000, 999999) ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyFullName" class="col-sm-3 col-form-label font-weight-bold">Full Name:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="indigencyFullName" value="<?php echo $data['fname']." ".$data['mname']." " .$data['lname'] ?>" readonly>
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyOccupation" class="col-sm-3 col-form-label font-weight-bold">Occupation:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="indigencyOccupation" placeholder="Enter occupation">
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyIncome" class="col-sm-3 col-form-label font-weight-bold">Income per month:</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" id="indigencyIncome" placeholder="Enter income per month">
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyPickUpDate" class="col-sm-3 col-form-label font-weight-bold">Pick Up Date:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="indigencyPickUpDate" placeholder="dd/mm/yyyy">
        </div>
    </div>
    <div class="form-group row">
        <label for="indigencyPurpose" class="col-sm-3 col-form-label font-weight-bold">Purpose:</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="indigencyPurpose" rows="3" placeholder="Enter purpose"></textarea>
        </div>
    </div>
    <div class="form-group row">
    <label for="recipient" class="col-sm-3 col-form-label font-weight-bold">Recipient:</label>
    <div class="col-sm-9">
        <select class="form-control" id="recipient1" name="recipient">
        <option value="Myself">Myself</option>

            <option value="Mother">Mother</option>
            <option value="Son">Son</option>
            <option value="Father">Father</option>
            <option value="Brother">Brother</option>
            <option value="Sister">Sister</option>
            <option value="Relatives">Relatives</option>
            <option value="Others">Others</option>
        </select>
        <small id="recipientMessage" class="form-text text-muted" style="display: none;">If you are getting the document for yourself, you can ignore this selection.</small>
    </div>
</div>
<div class="form-group row" id="recipientNameInput" style="display: none;">
    <label for="recipientName" class="col-sm-3 col-form-label font-weight-bold">Recipient's Name:</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="recipientIndi" placeholder="Enter recipient's name">
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
    function toggleRecipientNameInput() {
        const recipientValue = $('#recipient1').val();
        const recipientNameInput = $('#recipientNameInput');
        if (recipientValue === "Mother" || recipientValue === "Son" || recipientValue === "Father" || recipientValue === "Brother" || recipientValue === "Sister" || recipientValue === "Relatives" || recipientValue === "Others") {
            recipientNameInput.show(); // Show input field if Mother, Son, Father, Brother, Sister, Relatives, or Others is selected
        } else {
            recipientNameInput.hide(); // Hide input field otherwise
        }
    }

    // Event listener for when the recipient dropdown changes
    $('#recipient1').change(function() {
        // Call the function to toggle recipient name input field
        toggleRecipientNameInput();
    });

    // Call the function initially to set the initial state
    toggleRecipientNameInput();

});
</script>
