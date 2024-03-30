<h1>Barangay Clearance Requests</h1>


<?php
require '../connection.php';
$stmt = "SELECT * FROM clearance order by date DESC";
$result = $conn->prepare($stmt);
$result->execute();
$data = $result->get_result();
?>

<table id="requestsTableC" class="display">
    <thead>
        <tr style=" background-color: #28a745 !important;
            color: #fff;  ">
            <th>Tracking Code</th>
            <th>Name</th>
            <th>Purpose</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $data->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['purpose']; ?></td>

                <td><?php echo $row['email']; ?></td>

                <td> <select class="form-control" id="status">
                        <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Process" <?php echo ($row['status'] == 'Process') ? 'selected' : ''; ?>>Process</option>
                        <option value="Ready to Pick Up" <?php echo ($row['status'] == 'Ready to Pick Up') ? 'selected' : ''; ?>>Ready to Pick Up</option>
                        <option value="Released" <?php echo ($row['status'] == 'Released') ? 'selected' : ''; ?>>Released</option>
                    </select></td> <!-- You can modify this part based on your requirement -->
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
    $('#requestsTableC').DataTable();
    $('select[id^="status"]').change(function() {
        var trackingCode = $(this).closest('tr').find('td:first-child').text().trim();
        var newStatus = $(this).val();
        var data = {
            trackingCode: trackingCode,
            newStatus: newStatus
        };

        $.ajax({
            url: 'updatestatus_clearance.php',
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(response) {
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.icon
                });
                // Reload table data
                $('#requestsTableC').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

</script>