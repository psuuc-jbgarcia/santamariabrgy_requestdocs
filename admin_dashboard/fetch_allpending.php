
  <style>
    /* Add custom styles here */
  </style>

  <!-- Navigation bar -->
  <!-- Include your navigation bar code here -->

  <!-- Main content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h1>Pending Requests</h1>
        <table id="requestpending" class="display">
          <thead>
            
            <tr style=" background-color: #28a745 !important;
            color: #fff;  ">
              <th>Tracking Code</th>
              <th>Name</th>
              <th>Document Type</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <!-- Table body will be dynamically populated here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function() {
      // Call the function to fetch pending requests and populate the table
      fetchPendingRequests();

      // Function to fetch pending requests
      function fetchPendingRequests() {
        // Perform an AJAX request to fetch pending requests
        $.ajax({
          url: 'fetch_pending_requests.php', // Replace 'fetch_pending_requests.php' with the file path where you execute the SQL query
          method: 'GET',
          success: function(response) {
            // Parse the JSON response
            var pendingRequests = JSON.parse(response);
            // Get the table body element
            var tableBody = $('#requestpending tbody');
            // Clear any existing rows in the table
            tableBody.empty();
            // Iterate through each pending request and add it to the table
            pendingRequests.forEach(function(request) {
              // Create a new row
              var row = $('<tr >');
              // Add data to the row
              row.append('<td>' + request.tracking_code + '</td>');
              row.append('<td>' + request.name + '</td>');
              row.append('<td>' + request.document_type + '</td>');
              row.append('<td>' + request.email + '</td>');
              // Add an action button (you can customize this)
    
              // Append the row to the table body
              tableBody.append(row);
            });
            // Initialize the DataTable
            $('#requestpending').DataTable();
          },
          error: function(xhr, status, error) {
            console.error('Error fetching pending requests:', error);
          }
        });
      }
          // Poll the server every 5 seconds

      setInterval(fetchPendingRequests, 3000);

    });
  </script>

