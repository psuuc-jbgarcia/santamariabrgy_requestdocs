<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<?php
require '../connection.php';

// Fetch data from permits table
$stmtPermits = "SELECT tracking_code, business_owner_full_name AS name, business_name, business_nature, email,date,date_applied, status,recipent,type FROM permits where status='Pending' or status='Process' or status='Ready To Pick Up' ORDER BY date DESC";
$resultPermits = $conn->prepare($stmtPermits);
$resultPermits->execute();
$dataPermits = $resultPermits->get_result();

// Fetch data from clearance table
$stmtClearance = "SELECT tracking_code, fullname AS name, purpose, email, status,date,pickup_date,recipent,type FROM clearance where status='Pending' or status='Process' or status='Ready To Pick Up' ORDER BY date DESC";
$resultClearance = $conn->prepare($stmtClearance);
$resultClearance->execute();
$dataClearance = $resultClearance->get_result();

// Fetch data from certificates table
$stmtCertificates = "SELECT tracking_code, full_name AS name, purpose, email, status,pick_up_date,date,recipent,type  FROM certificates where status='Pending' or status='Process' or status='Ready To Pick Up' ORDER BY date DESC";
$resultCertificates = $conn->prepare($stmtCertificates);
$resultCertificates->execute();
$dataCertificates = $resultCertificates->get_result();

// Fetch data from residency table
$stmtResidency = "SELECT tracking_code, full_name AS name, purpose, email, status,pickup_date,date_requested,recipent,type FROM residency where status='Pending' or status='Process' or status='Ready To Pick Up' ORDER BY date_requested DESC";
$resultResidency = $conn->prepare($stmtResidency);
$resultResidency->execute();
$dataResidency = $resultResidency->get_result();
?>

<table id="requestsTable" class="display">
    <thead>
        <tr style="background-color: #28a745 !important; color: #fff;">
            <th>Tracking Code</th>
            <th>Name</th>
            <th>Request Type</th>
            <th>Email</th>
            <th>Purpose</th>
            <th>Recipient</th>
            <th>Pick Up Date</th>
            <th>Date Requested</th>

            <th>Action</th>
            <th>Generate</th>

        </tr>
    </thead>
    <tbody>
        <!-- Permits Data -->
        <?php while ($row = $dataPermits->fetch_assoc()) : ?>
            <tr data-email="<?php echo $row['email']; ?>">
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>Business Permit</td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['business_name']; ?></td>
                <td><?php echo $row['recipent']; ?></td>

                <td><?php echo date('F j, Y', strtotime($row['date_applied'])); ?></td>
                <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>


                <td>
                    <select class="form-control status-select" data-type="permits">
                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Process" <?php echo ($row['status'] == 'Process') ? 'selected' : ''; ?>>Process</option>
                        <option value="Ready to Pick Up" <?php echo ($row['status'] == 'Ready to Pick Up') ? 'selected' : ''; ?>>Ready to Pick Up</option>
                        <option value="Released" <?php echo ($row['status'] == 'Released') ? 'selected' : ''; ?>>Released</option>

                    </select>
                </td>
                <td>
                <button class="btn btn-primary btn-sm" onclick="generateDocument('<?php echo $row['tracking_code']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['type']; ?>')">Generate</button>
</td>
            </tr>
        <?php endwhile; ?>

        <!-- Clearance Data -->
        <?php while ($row = $dataClearance->fetch_assoc()) : ?>
            <tr data-email="<?php echo $row['email']; ?>">
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>Barangay Clearance</td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['recipent']; ?></td>

                <td><?php echo date('F j, Y', strtotime($row['pickup_date'])); ?></td>

                <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                <td>
                    <select class="form-control status-select" data-type="clearance">
                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Process" <?php echo ($row['status'] == 'Process') ? 'selected' : ''; ?>>Process</option>
                        <option value="Ready to Pick Up" <?php echo ($row['status'] == 'Ready to Pick Up') ? 'selected' : ''; ?>>Ready to Pick Up</option>
                        <option value="Released" <?php echo ($row['status'] == 'Released') ? 'selected' : ''; ?>>Released</option>

                    </select>
                </td>
                <td>
                <button class="btn btn-primary btn-sm" onclick="generateDocument('<?php echo $row['tracking_code']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['type']; ?>')">Generate</button>
</td>
            </tr>
        <?php endwhile; ?>

        <!-- Certificates Data -->
        <?php while ($row = $dataCertificates->fetch_assoc()) : ?>
            <tr data-email="<?php echo $row['email']; ?>">
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>Indigency Certificate</td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['recipent']; ?></td>

                <td><?php echo date('F j, Y', strtotime($row['pick_up_date'])); ?></td>
                <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>


                <td>
                    <select class="form-control status-select" data-type="certificates">
                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Process" <?php echo ($row['status'] == 'Process') ? 'selected' : ''; ?>>Process</option>
                        <option value="Ready to Pick Up" <?php echo ($row['status'] == 'Ready to Pick Up') ? 'selected' : ''; ?>>Ready to Pick Up</option>
                        <option value="Released" <?php echo ($row['status'] == 'Released') ? 'selected' : ''; ?>>Released</option>

                    </select>
                </td>
                <td>
                <button class="btn btn-primary btn-sm" onclick="generateDocument('<?php echo $row['tracking_code']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['type']; ?>')">Generate</button>
</td>
            </tr>
        <?php endwhile; ?>

        <!-- Residency Data -->
        <?php while ($row = $dataResidency->fetch_assoc()) : ?>
            <tr data-email="<?php echo $row['email']; ?>">
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>Residency Certificate</td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['purpose']; ?></td>
                <td><?php echo $row['recipent']; ?></td>

                <td><?php echo date('F j, Y', strtotime($row['pickup_date'])); ?></td>
                <td><?php echo date('F j, Y', strtotime($row['date_requested'])); ?></td>


                <td>
                    <select class="form-control status-select" data-type="residency">
                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Process" <?php echo ($row['status'] == 'Process') ? 'selected' : ''; ?>>Process</option>
                        <option value="Ready to Pick Up" <?php echo ($row['status'] == 'Ready to Pick Up') ? 'selected' : ''; ?>>Ready to Pick Up</option>
                        <option value="Released" <?php echo ($row['status'] == 'Released') ? 'selected' : ''; ?>>Released</option>

                    </select>
                </td>
                <td>
                <button class="btn btn-primary btn-sm" onclick="generateDocument('<?php echo $row['tracking_code']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['type']; ?>')">Generate</button>
</td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Include DataTables JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>


<script>
    $(document).ready(function() {
        $('#requestsTable').DataTable({
            dom: 'Bfrtip', // Specify the elements to appear in the DOM
            buttons: [
                'pdfHtml5', // Add the PDF button
                'excelHtml5' // Add the Excel button

            ]
        });
        $('.status-select').change(function() {
            var trackingCode = $(this).closest('tr').find('td:first-child').text().trim();
            var newStatus = $(this).val();
            var requestType = $(this).data('type');
            var email = $(this).closest('tr').data('email'); // Retrieve the email from the data attribute

            var data = {
                trackingCode: trackingCode,
                newStatus: newStatus,
                requestType: requestType,
                email: email
            };

            $.ajax({
                url: 'update_status.php',
                method: 'POST',
                data: data,
                dataType: 'json',
                success: function(response) {
                    Swal.fire({
                        title: response.title,
                        text: response.text,
                        icon: response.icon
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while updating the status.',
                        icon: 'error'
                    });
                }
            });
        });
    });
</script>
<script>
function generateDocument(trackingCode, email, requestType) {
    // Decode the tracking code and email parameters
    trackingCode = decodeURIComponent(trackingCode);
    email = decodeURIComponent(email);
// Redirect to the appropriate PHP file based on the request type
if (requestType === 'Barangay Clearance') {
    window.open('clearance.php?trackingCode=' + trackingCode + '&email=' + email, '_blank');
} else if (requestType === 'Business Permit') {
    window.open('business.php?trackingCode=' + trackingCode + '&email=' + email, '_blank');
} else if (requestType === 'Residency Certificate') {
    window.open('residency.php?trackingCode=' + trackingCode + '&email=' + email, '_blank');
} else if (requestType === 'Indigency Certificate') {
    window.open('indigency.php?trackingCode=' + trackingCode + '&email=' + email, '_blank');
} else {
    // Handle other request types if needed
    alert('Invalid request type');
}

}
</script>
