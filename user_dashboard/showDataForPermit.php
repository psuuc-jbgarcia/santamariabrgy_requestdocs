<?php 
session_start();
require '../connection.php';
$username=$_SESSION['user'];
$stmt="select fname,mname,lname from users where username=?";
$result=$conn->prepare($stmt);
$result->bind_param("s",$username);
$result->execute();
$result=$result->get_result();
if($result->num_rows==1){
    $data=$result->fetch_assoc();
    ?>
 <div class="form-group row">
                    <label for="permitTrackingCode" class="col-sm-3 col-form-label"><strong>Tracking Code:</strong></label>
                    <div class="col-sm-9">
                    <small class="form-text text-muted">
            Click the tracking code to copy for order reference.
        </small>
                        <input type="text" class="form-control" id="permitTrackingCode" value="<?php echo mt_rand(100000, 999999); ?>" readonly>
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="permitBusinessOwnerFullName" class="col-sm-3 col-form-label"><strong>Business Owner Full Name:</strong></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="permitBusinessOwnerFullName" value="<?php echo $data['fname']." ".$data['mname']." " .$data['lname'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="permitBusinessName" class="col-sm-3 col-form-label"><strong>Business Name:</strong></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="permitBusinessName" placeholder="Enter business name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="permitBusinessNature" class="col-sm-3 col-form-label"><strong>Business Nature:</strong></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="permitBusinessNature" rows="3" placeholder="Enter business nature"></textarea>
                    </div>
                </div>
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
        <input type="text" class="form-control" id="recipientPermits" placeholder="Enter recipient's name">
    </div>
</div>
                <div class="form-group row">
                    <label for="permitDateApplied" class="col-sm-3 col-form-label"><strong>Pick up Date:</strong></label>
                    <div class="col-sm-9">
                    <input type="date" class="form-control" id="permitDateApplied" placeholder="Enter date applied">
                    </div>
                </div>
                <div class="alert alert-warning" role="alert">
                    Please bring 100.00 pesos for payment
                </div>
    <?php
}
?>
<script>
$(document).ready(function(){
    // Function to copy the tracking code when clicked
    function copyTrackingCode() {
        // Select the tracking code input field
        var trackingCodeInput = document.getElementById("permitTrackingCode");

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
    $('#permitTrackingCode').click(function(){
        // Call the function to copy the tracking code
        copyTrackingCode();
    });

    // Function to toggle recipient name input field visibility
    function toggleRecipientNameInput() {
        const recipientValue = $('#recipient').val();
        const recipientNameInput = $('#recipientNameInput'); // Correct selector for the div containing the input field
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
