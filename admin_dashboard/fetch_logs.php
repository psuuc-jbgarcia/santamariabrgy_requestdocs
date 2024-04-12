<?php
require '../connection.php';

// Fetch data from document_logs table
$stmtLogs = "SELECT * FROM document_logs ORDER BY timestamp DESC";
$resultLogs = $conn->prepare($stmtLogs);
$resultLogs->execute();
$dataLogs = $resultLogs->get_result();
?>

<table id="logsTable" class="display">
    <thead>
        <tr style=" background-color: #28a745 !important;
            color: #fff;  ">
            <th>Tracking Code</th>
            <th>Request Type</th>
            <th>New Status</th>
            <th>Admin Name</th>
            <th>User Email</th>

            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        <!-- Logs Data -->
        <?php while ($row = $dataLogs->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['request_type']; ?></td>
                <td><?php echo $row['new_status']; ?></td>
                <td><?php echo $row['admin_name']; ?></td>
                <td><?php echo $row['email']; ?></td>

                <td><?php echo date('F j, Y H:i:s', strtotime($row['timestamp'])); ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Include DataTables JS and Buttons extension -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#logsTable').DataTable({
            dom: 'Bfrtip', // Add Buttons extension to the DOM
            buttons: [
                'pdfHtml5' // Add PDF download button
            ]
        });
    });
</script>
