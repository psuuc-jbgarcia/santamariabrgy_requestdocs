
  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <h1>Indigency Certificate Requests</h1>


<?php
require '../connection.php';
$stmt = "SELECT * FROM certificates WHERE status='Pending' or status='Process' or status='Ready to Pick Up' order by date DESC";
$result = $conn->prepare($stmt);
$result->execute();
$data = $result->get_result();
?>

<table id="requestsTableindigency" class="display">
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
        <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['tracking_code']; ?></td>
                <td><?php echo $row['full_name']; ?></td>
                <td><?php echo $row['purpose']; ?></td>

                <td><?php echo $row['email']; ?></td>

                <td> <select class="form-control" id="statusI">
                <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Process" <?php echo ($row['status'] == 'Process') ? 'selected' : ''; ?>>Process</option>
                        <option value="Ready to Pick Up" <?php echo ($row['status'] == 'Ready to Pick Up') ? 'selected' : ''; ?>>Ready to Pick Up</option>
                        <option value="Released" <?php echo ($row['status'] == 'Released') ? 'selected' : ''; ?>>Released</option>
</select>
</td> <!-- You can modify this part based on your requirement -->
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Include DataTables JS -->
<script>
    $(document).ready(function() {
        $('#requestsTableindigency').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#requestsTableC').DataTable();
        $('select[id^="statusI"]').change(function() {
            var trackingCode = $(this).closest('tr').find('td:first-child').text().trim(); // Get tracking code from the first column of the same row
            var newStatus = $(this).val();
         
var data= { trackingCode: trackingCode, newStatus: newStatus }
            $.ajax({
                url: 'updatestatus_indigency.php',
                method: 'POST',
                data:data,
                dataType:'json',
                success: function(response) {
                    Swal.fire({
                            title: response.title,
                            text: response.text,
                            icon: response.icon
                        });
                  
                },
                error: function(xhr, status, error) {
                    console.error(error); 
                }
            });
        });
    });
</script>
