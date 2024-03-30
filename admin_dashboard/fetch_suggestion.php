
  
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
        
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['suggestion']; ?></td>

            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Include DataTables JS -->
<script>
    $(document).ready(function() {
        $('#sgest').DataTable();
    });
</script>


