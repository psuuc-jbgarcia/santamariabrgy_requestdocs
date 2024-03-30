<!-- DataTables CSS -->
<h1>User Management</h1>

<?php
require '../connection.php';
$stmt = "SELECT * FROM users order by id";
$result = $conn->prepare($stmt);
$result->execute();
$data = $result->get_result();
?>

<table id="usersR" class="display">
    <thead>
        <tr style=" background-color: #28a745 !important;
            color: #fff;  ">
            <th>Username</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>

            <th>Barangay</th>
            <th>Email</th>
    
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $data->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['fname']; ?></td>
                <td><?php echo $row['mname']; ?></td>
                <td><?php echo $row['lname']; ?></td>
                <td><?php echo $row['barangay']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td> 
                    <button class="btn btn-danger delete-btn" data-tracking="" data-toggle="modal" data-target="#deleteConfirmationModal" data-id="<?php echo $row['id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Initialize DataTable
        var table = $('#usersR').DataTable();

        // Event listener for delete button
        $(document).on('click', '.delete-btn', function() {
            var userId = $(this).data('id');
            $('#confirmDeleteBtn').data('id', userId);
        });

        // Event listener for confirm delete button
        $('#confirmDeleteBtn').on('click', function() {
            var userId = $(this).data('id');
            deleteUser(userId);
        });

        // Function to load users
        function loadUsers() {
            $.ajax({
                url: 'fetch_users.php',
                type: 'GET',
                success: function(response) {
                    $('#user-management-tab').html(response);
                    // Reattach event listeners after content is loaded
                    attachEventListeners();
                },
                error: function(xhr, status, error) {
                    console.error('Error loading users:', error);
                }
            });
        }

        // Function to attach event listeners
        function attachEventListeners() {
            // Reattach event listeners for delete buttons
            $(document).on('click', '.delete-btn', function() {
                var userId = $(this).data('id');
                $('#confirmDeleteBtn').data('id', userId);
            });

            // Reattach event listener for confirm delete button
            $('#confirmDeleteBtn').on('click', function() {
                var userId = $(this).data('id');
                deleteUser(userId);
            });
        }

        function deleteUser(id) {
    $.get("delete_user.php?id=" + id, function(response) {
        // Hide modal after deletion
        $('#deleteConfirmationModal').modal('hide');
        // Reload the table after deletion
        loadUsers();
    }).fail(function(xhr, status, error) {
        console.error('Error deleting user:', error);
    }).always(function() {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
}



        // Initial load of users
    });
</script>

