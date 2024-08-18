<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggestions</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- Include Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

    <h1>Suggestions</h1>

    <?php
    require '../connection.php';
    $stmt = "SELECT * FROM suggestions ORDER BY date_requested DESC";
    $result = $conn->prepare($stmt);
    $result->execute();
    $data = $result->get_result();
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <label for="min">From:</label>
                <input type="date" id="min" name="min">
                <label for="max">To:</label>
                <input type="date" id="max" name="max">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table id="sgest" class="display">
                    <thead>
                        <tr style="background-color: #28a745 !important; color: #fff;">
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
                                <td><?php echo date('Y-m-d', strtotime($row['date_requested'])); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
            // Initialize DataTables with buttons
            var table = $('#sgest').DataTable({
                dom: 'Bfrtip', // Specify the elements to appear in the DOM
                buttons: [
                    'pdfHtml5', // Add the PDF button
                    'excelHtml5' // Add the Excel button

                ]
            });

            // Date range filtering
            $('#min, #max').change(function() {
                table.draw();
            });

            // Date range filter function
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var date = data[3] || ''; // Assuming Date column is at index 3
                    var startDate = new Date(date);
                    startDate.setHours(0,0,0,0);

                    if ((min === '' || max === '') ||
                        (new Date(min) <= startDate && new Date(max) >= startDate)) {
                        return true;
                    }
                    return false;
                }
            );
        });
    </script>
</body>
</html>
