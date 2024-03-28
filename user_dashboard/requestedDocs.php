<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Documents</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/main.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            color: #333;
            padding: 20px;
        }

        h1 {
            color: #28a745;
            /* Green color for heading */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #dff0d8;
            /* Light green background color for tables */
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #28a745;
            /* Dark green background color for table headers */
            color: #fff;
            /* White text color for table headers */
        }

        tbody tr:nth-child(even) {
            background-color: #d9ead3;
            /* Light green background color for even rows */
        }

        tbody tr:hover {
            background-color: #c7e5c0;
            /* Darker green background color on hover */
        }

        .navbar {
            background-color: #28a745;
            /* Green background color for navigation bar */
        }

        .navbar-brand {
            color: #fff;
            /* White text color for navigation brand */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <!-- Back button -->
            <a href="userdashboard.php" class="btn btn-light mr-auto">Back</a>
            <!-- Logo container -->
            <div class="navbar-brand mx-auto">
                <!-- Logo image -->

            </div>
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">Requested Documents</a>
        </div>
    </nav>

    <div class="container">
        <div class="col-md-12">
        </div>
        <!-- Navigation Link Wrapped in a Card -->

        <div class="row mb-4">

        </div>
        <div class="row mb-4 text-center">
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="barangay-clearance">Barangay Clearance</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="barangay-permit">Business Permit</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="indigency-certificate">Indigency Certificate</button>
            </div>
            <div class="col-md-3">
                <button class="btn btn-outline-success btn-document" data-table="residency-certificate">Residency Certificate</button>
            </div>
        </div>



        <!-- Barangay Clearance Requests Container -->
        <div id="barangay-clearance-container">
            <h2>Barangay Clearance Requests</h2>
            <table id="barangay-clearance-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking_code</th>
                        <th>Fullname</th>
                        <th>Pickup_date</th>
                        <th>Purpose</th>
                        <th>Type</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->

                    </tr>
                </thead>
                <tbody id="clearanceload">

                </tbody>
            </table>
        </div>

        <!-- Barangay Permit Requests Container -->
        <div id="barangay-permit-container">
            <h2>Business Permit Requests</h2>
            <table id="barangay-permit-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking Code</th>
                        <th>Pick Up Date</th>

                        <th>Business Owner Full Name</th>
                        <th>Business Name</th>
                        <th>Business Nature</th>
                        <th>Date Applied</th>
                        <!-- <th>Status</th> -->
                        <th>Date</th>
                        <!-- <th>Actions</th> -->

                    </tr>
                </thead>
                <tbody id="business">

                </tbody>
            </table>
        </div>

        <!-- Indigency Certificate Requests Container -->
        <div id="indigency-certificate-container">
            <h2>Indigency Certificate Requests</h2>
            <table id="indigency-certificate-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking Code</th>
                        <th>Full Name</th>
                        <th>Pick Up Date</th>
                        <th>Type</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->


                    </tr>
                </thead>
                <tbody id="loadingigency">

                </tbody>
            </table>
        </div>

        <!-- Residency Certificate Requests Container -->
        <div id="residency-certificate-container">
            <h2>Residency Certificate Requests</h2>
            <table id="residency-certificate-table" class="display">
                <thead>
                    <tr>
                        <th>Tracking Code</th>
                        <th>Full Name</th>
                        <th>Pick Up Date</th>
                        <th>Type</th>
                        <!-- <th>Status</th> -->
                        <th>Date Requested</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody id="loadresidency">

                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal for canceling clearance requests -->



    <!-- Modal for canceling permit requests -->
    <div class="modal fade" id="cancelPermitModal" tabindex="-1" role="dialog" aria-labelledby="cancelPermitModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelPermitModalLabel">Cancel Permit Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this Business permit request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmPermitCancelBtn">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for canceling indigency requests -->
    <div class="modal fade" id="cancelIndigencyModal" tabindex="-1" role="dialog" aria-labelledby="cancelIndigencyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelIndigencyModalLabel">Cancel Indigency Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this indigency request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmIndigencyCancelBtn">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for canceling residency requests -->
    <div class="modal fade" id="cancelResidencyModal" tabindex="-1" role="dialog" aria-labelledby="cancelResidencyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelResidencyModalLabel">Cancel Residency Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this residency request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="confirmResidencyCancelBtn">Confirm Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Add this button to trigger the modal -->

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
            loadclearance();
            loadPermitData();
            loadIndi();
            residency();

            function loadclearance() {
                $('#clearanceload').load('loadclearance.php');

            }

            function loadPermitData() {
                $('#business').load('loadbusiness.php');
            }

            function loadIndi() {
                $('#loadingigency').load('loadindigency.php');
            }

            function residency() {
                $("#loadresidency").load('loadresidency.php');
            }

        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables
            var clearanceTable = $('#barangay-clearance-table').DataTable({
                searching: false // Disable search functionality

            });
            var permitTable = $('#barangay-permit-table').DataTable({
                searching: false // Disable search functionality

            });
            var indigencyTable = $('#indigency-certificate-table').DataTable({
                searching: false // Disable search functionality

            });
            var residencyTable = $('#residency-certificate-table').DataTable({
                searching: false // Disable search functionality

            });

            // Hide all tables and their containers except Barangay Clearance
            $('table').hide();
            $('div[id$="-container"]').hide();
            $('#barangay-clearance-table').show();
            $('#barangay-clearance-container').show();

            // Show/hide tables based on button clicks
            $('.btn-document').on('click', function() {
                var tableID = $(this).data('table');

                // Hide all tables and their containers
                $('table').hide();
                $('div[id$="-container"]').hide();

                // Show the corresponding table and its container
                $('#' + tableID + '-table').show();
                $('#' + tableID + '-container').show();

                // Reinitialize DataTables for the shown table
                if (tableID === 'barangay-clearance') {
                    clearanceTable = $('#barangay-clearance-table').DataTable();
                } else if (tableID === 'barangay-permit') {

                    permitTable = $('#barangay-permit-table').DataTable();
                } else if (tableID === 'indigency-certificate') {
                    indigencyTable = $('#indigency-certificate-table').DataTable();
                } else if (tableID === 'residency-certificate') {
                    residencyTable = $('#residency-certificate-table').DataTable();
                }
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle click event of the confirm cancel button in the clearance modal
            $('#confirmClearanceCancelBtn').click(function() {
                // Logic to cancel clearance request
                $('#cancelClearanceModal').modal('hide');
                // Additional logic here if needed
            });

            // Handle click event of the confirm cancel button in the permit modal
            $('#confirmPermitCancelBtn').click(function() {
                // Logic to cancel permit request
                $('#cancelPermitModal').modal('hide');
                // Additional logic here if needed
            });

            // Handle click event of the confirm cancel button in the indigency modal
            $('#confirmIndigencyCancelBtn').click(function() {
                // Logic to cancel indigency request
                $('#cancelIndigencyModal').modal('hide');
                // Additional logic here if needed
            });

            // Handle click event of the confirm cancel button in the residency modal
            $('#confirmResidencyCancelBtn').click(function() {
                // Logic to cancel residency request
                $('#cancelResidencyModal').modal('hide');
                // Additional logic here if needed
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-document').click(function() {
                $('.btn-document').removeClass('btn-success active');
                $(this).toggleClass('btn-success active');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle click event of the confirm cancel button in the clearance modal
            $('#confirmClearanceCancelBtn').click(function() {
                // Send AJAX request to cancel clearance request
                $.get('cancel_clearance.php', function(data) {
                    // Handle the response from the server, if needed
                    // For example, you can reload the table data after cancellation
                    $('#clearanceload').load('loadclearance.php');
                });
                // Hide the modal
                $('#cancelClearanceModal').modal('hide');
            });
        });
    </script>
    <script src="cancel.js"></script>
</body>

</html>