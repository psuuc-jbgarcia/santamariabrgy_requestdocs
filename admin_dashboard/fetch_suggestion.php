<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  
            <h1>Suggestions</h1>


<?php
require '../connection.php';
$stmt = "SELECT * FROM suggestions order by date_requested desc";
$result = $conn->prepare($stmt);
$result->execute();
$data = $result->get_result();
?>

<table id="sgest" class="display">
    <thead>
        <tr style=" background-color: #28a745 !important;
            color: #fff;  ">
            <th>Name</th>
            <th>Email</th>
            <th>Suggestion</th>
            <th>Date</th>

        
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['suggestion']; ?></td>
                <td><?php echo date('F j, Y', strtotime($row['date_requested'])); ?></td>


            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#sgest').DataTable(
               {
            dom: 'Bfrtip', // Specify the elements to appear in the DOM
        buttons: [
            'pdfHtml5' // Add the PDF button
        ]
        }
        );
    });
</script>


