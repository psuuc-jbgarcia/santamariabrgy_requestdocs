<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Walk-In Requests</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

    <h1>Walk-In Requests</h1>

    <?php
    require '../connection.php';
    // Fetch data from the database
    $sql = "SELECT CONCAT(firstName, ' ', middleName, ' ', lastName) AS full_name, visitorEmail, purpose, submissionDate, id, documentType, visitorEmail FROM walkinrequests";
    $result = $conn->query($sql);
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
                <table id="walkInRequestsTable" class="table table-striped">
                    <thead>
                        <tr style="background-color: #28a745 !important; color: #fff;">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Purpose</th>
                            <th>Date Requested</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['full_name']; ?></td>
                                <td><?php echo $row['visitorEmail']; ?></td>
                                <td><?php echo $row['documentType']; ?></td>
                                <td><?php echo $row['purpose']; ?></td>
                                <td><?php echo date('Y-m-d', strtotime($row['submissionDate'])); ?></td>
                                <td><button class="btn btn-primary generate-btn" data-id="<?php echo $row['id']; ?>" data-email="<?php echo $row['visitorEmail']; ?>" data-request-type="<?php echo $row['documentType']; ?>">Generate</button></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            var table = $('#walkInRequestsTable').DataTable({
                dom: 'Bfrtip', // Specify the elements to appear in the DOM
                buttons: [
                    'pdfHtml5' ,// Add the PDF button
                    'excelHtml5' // Add the Excel button

                ]
            });

            // Date range filtering
            $('#min, #max').change(function() {
                table.draw();
            });

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var date = new Date(data[4]); // Assuming Date Requested column is at index 4
                    var startDate = new Date(min);
                    var endDate = new Date(max);

                    if ((isNaN(startDate) && isNaN(endDate)) ||
                        (isNaN(startDate) && date <= endDate) ||
                        (startDate <= date && isNaN(endDate)) ||
                        (startDate <= date && date <= endDate)) {
                        return true;
                    }
                    return false;
                }
            );

            // Event delegation for the "Generate" button
            $('#walkInRequestsTable').on('click', '.generate-btn', function() {
                var id = $(this).data('id');
                var email = $(this).data('email');
                var requestType = $(this).data('request-type');
                generateDocuments(id, email, requestType);
            });
        });

        // Function to generate documents
        function generateDocuments(id, email, requestType) {
            if (requestType === 'Barangay Clearance') {
                window.open('/websys2mtr-r/walkin/walkin_clearance.php?id=' + id + '&email=' + email, '_blank');
            } else if (requestType === 'Business Permit') {
                window.open('/websys2mtr-r/walkin/walkin_business.php?id=' + id + '&email=' + email, '_blank');
            } else if (requestType === 'Residency Certificate') {
                window.open('/websys2mtr-r/walkin/walkin_residency.php?id=' + id + '&email=' + email, '_blank');
            } else if (requestType === 'Indigency Certificate') {
                window.open('/websys2mtr-r/walkin/walkin_indigency.php?id=' + id + '&email=' + email, '_blank');
            } else {
                alert('Invalid request type');
            }
        }
    </script>
</body>
</html>
