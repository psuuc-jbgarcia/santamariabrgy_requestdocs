<style>
    .confirmation-dialog {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        font-family: Arial, sans-serif;
    }

    .confirmation-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 8px;
        max-width: 600px;
        width: 80%;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .confirmation-message {
        margin-bottom: 20px;
        font-size: 18px;
        line-height: 1.5;
    }

    .confirmation-buttons {
        text-align: center;
    }

    .confirmation-buttons button {
        margin: 0 10px;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .confirmation-buttons button.cancel {
        background-color: #ddd;
        color: #333;
    }

    .confirmation-buttons button.confirm {
        background-color: #ff5f5f;
        color: #fff;
    }
</style>




<h1>User Management</h1>

<?php
require '../connection.php';
$stmt = "SELECT * FROM users ORDER BY id";
$result = $conn->prepare($stmt);
$result->execute();
$data = $result->get_result();
?>

<table id="usersR" class="display">
    <thead>
        <tr style="background-color: #28a745 !important; color: #fff;">
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
                    <button class="btn btn-danger delete-btn" data-id="<?php echo $row['id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Confirmation Dialog -->
<div class="confirmation-dialog" id="confirmationDialog">
    <div class="confirmation-content">
        <div class="confirmation-message">Are you sure you want to delete this user?</div>
        <div class="confirmation-buttons">
            <button class="btn btn-secondary cancel-btn">Cancel</button>
            <button class="btn btn-danger confirm-delete-btn">Delete</button>
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
            showConfirmation(userId);
        });

        // Event listener for cancel button
        $(document).on('click', '.cancel-btn', function() {
            hideConfirmation();
        });

        // Event listener for confirm delete button
        $(document).on('click', '.confirm-delete-btn', function() {
            var userId = $(this).data('id');
            deleteUser(userId);
            hideConfirmation();
        });

        function showConfirmation(userId) {
            $('#confirmationDialog').fadeIn();
            $('#confirmationDialog .confirm-delete-btn').data('id', userId);
        }

        function hideConfirmation() {
            $('#confirmationDialog').fadeOut();
        }

        function deleteUser(id) {
            $.ajax({
                type: 'get',
                url: 'delete_user.php',
                data: { id: id },
                success: function(response) {
alert(response);
                    var row = table.row($('#usersR button[data-id="' + id + '"]').closest('tr'));
                    row.remove().draw();
                },
                error: function(xhr, status, error) {
                    console.error('Error deleting user:', error);
                }
            });
        }
    });
</script>
