<?php
session_start();
require '../connection.php';
$username = $_SESSION['user'];
$stmt = "select * from users where username=?";
$result = $conn->prepare($stmt);
$result->bind_param('s', $username);
$result->execute();
$result = $result->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc(); ?>
    <div class="form-group">
        <label for="name">Your Name:</label>
        <input type="text" class="form-control" id="nameS" name="name" value="<?php echo $data['fname'] . " " . $data['mname'] . " " . $data['lname'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="email">Your Email:</label>
        <input type="email" class="form-control" id="emailS" name="email" value="<?php echo $data['email'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="suggestion"> <i class="fas fa-envelope"></i> Your Suggestion:</label>
        <textarea class="form-control" id="suggestion" name="suggestion" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-submit" id="send">Send</button>
<?php
}

?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function() {
        $("#send").click(function() {
            sendSuggestion();
        });

        function sendSuggestion() {
            var name = $("#nameS").val();
            var email = $("#emailS").val();
            var suggestion = $("#suggestion").val();

            $.ajax({
                url: 'send.php',
                method: 'post',
                data: {
                    nameval: name,
                    emailval: email,
                    suggestion: suggestion
                },
                 dataType:'json',
                success: function(response) {
                    Swal.fire({
  title:response.title,
  icon: response.icon,

});
                    $("#suggestion").val('');
                }
            });
        }
    });
</script>