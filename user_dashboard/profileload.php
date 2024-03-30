<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
session_start();
require '../connection.php';


$username = $_SESSION['user'];
$stmt = "select * from users where username =?";
$result = $conn->prepare($stmt);
$result->bind_param('s', $username);
$result->execute();
$result = $result->get_result();
$stmt1 = "select * from personalinformation where username =?";
$result1 = $conn->prepare($stmt1);
$result1->bind_param('s', $username);
$result1->execute();
$result1 = $result1->get_result();
if ($result1->num_rows > 0) {
    $personT = $result1->fetch_assoc();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
?>
        <div id="app">
            <div class="p-1 text-center bg-success text-white border-bottom sticky-top-container">
                <div class="container d-flex justify-content-between">
                    <div class="row">
                        <span class="navbar-text">
                            <i class="bi bi-geo-alt-fill"></i><a href="userdashboard.php" style="text-decoration: none;">Back to HomePage</a>
                        </span>

                    </div>
                    <div class="row">
                        <span class="navbar-text">
                            <i class="bi bi-geo-alt-fill"></i>Profile
                        </span>

                    </div>
                </div>
            </div>

            <main>
                <div class="container" style="margin-top: 60px">
                    <form class="form-control m-3 p-5 shadow-lg">
                        <input type="hidden" name="_token" value="bcrQuXSTVdYFsLrzwfOBW24ABJalkWRctZ2wBiU0" autocomplete="off">
                    
                        <center>
                            <video id="cameraPreview" style="display:none;height: 200px"></video>
                        </center>
                        <center>

                            <img src="../user_registration/userimage/<?php echo $userData['profile_picture'] ?>" alt="profile" id="defaultImage" style="height: 200px"><br><br>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
    Update Picture
</button>

                            <!-- 
                        <a class="btn btn-primary" id="openCamera">Open Camera</a>
                        <a class="btn btn-danger" id="capture">Capture</a> -->
                        </center>
                        <hr class="mb-3">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="firstname" class="form-label">First Name</label>
                                <input id="firstname" type="text" class="form-control  shadow " name="firstname" value="<?php echo $userData['fname'] ?>">
                            </div>
                            <div class="col">
                                <label for="middlename" class="form-label">Middle Name</label>
                                <input id="middlename" type="text" class="form-control shadow " name="middlename" value="<?php echo $userData['mname'] ?>">
                            </div>
                            <div class="col">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input id="lastname" type="text" class="form-control  shadow " name="lastname" value="<?php echo $userData['lname'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="alias" class="form-label">Alias</label>
                                <input id="alias" type="text" class="form-control  shadow " name="alias" value="<?php echo $personT['alias']; ?>">
                            </div>
                            <div class="col">
                                <label for="place_of_birth" class="form-label">Place of Birth</label>
                                <input id="place_of_birth" type="text" class="form-control  shadow " name="place_of_birth" value="<?php echo $personT['place_of_birth']; ?>">
                            </div>
                            <div class="col">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input id="birthdate" type="date" class="form-control  shadow " name="birthdate" value="<?php echo $personT['birthdate']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="age" class="form-label">Age</label>
                                <input id="age" type="text" class="form-control shadow" value="<?php echo $personT['age']; ?>">
                            </div>
                            <div class="col">
                                <label for="sex" class="form-label">Sex</label>
                                <select id="sex" class="form-control  shadow " name="sex" required>
                                    <option value="male" <?php if ($userData['gender'] == "male") echo 'selected' ?>>Male</option>
                                    <option value="female" <?php if ($userData['gender'] == "female") echo 'selected' ?>>Female</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="religion" class="form-label">Religion</label>
                                <input id="religion" type="text" class="form-control  shadow " name="religion" value="<?php echo $personT['religion']; ?>">
                            </div>
                            <div class="col">
                                <label for="citizenship" class="form-label">Citizenship</label>
                                <input id="citizenship" type="text" class="form-control  shadow " name="citizenship" value="<?php echo $personT['citizenship']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="civil_status" class="form-label">Civil Status</label>
                                <input id="sttus" type="text" class="form-control  shadow " name="sts" value="<?php echo $personT['civil_status']; ?>">

                            </div>
                            <div class="col">
                                <label for="occupation" class="form-label">Occupation</label>
                                <input id="occupation" type="text" class="form-control  shadow " name="occupation" value="<?php echo $personT['occupation']; ?>">
                            </div>
                            <div class="col">
                                <label for="registered_voter" class="form-label">Registered Voter?</label>
                                <select id="registered_voter" class="form-control  shadow " name="registered_voter" required>
                                    <option value="YES" <?php if ($personT['registered_voter'] == 'YES') {
                                                            echo 'selected';
                                                        } ?>>YES</option>
                                    <option value="NO" <?php if ($personT['registered_voter'] == 'NO') {
                                                            echo 'selected';
                                                        } ?>>NO</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="contact_number" class="form-label">Contact Number</label>
                                <input id="contact_number" type="tel" class="form-control  shadow " name="contact_number" value="<?php echo $personT['contact_number']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label class="form-label">Barangay</label>
                                <select name="barangay" id="barangay" class="form-select shadow">
                                    <option value="">Select Barangay</option>
                                    <option value="Alipangpang" <?php if ($userData['barangay'] == 'Alipangpang') {
                                                                    echo 'selected';
                                                                } ?>>Alipangpang</option>

                                    <option value="Poblacion East" <?php if ($userData['barangay'] == 'Poblacion East') {
                                                                        echo 'selected';
                                                                    } ?>>Poblacion East</option>
                                    <option value="Poblacion West" <?php if ($userData['barangay'] == 'Poblacion West') {
                                                                        echo 'selected';
                                                                    } ?>>Poblacion West</option>
                                    <option value="Pugot" <?php if ($userData['barangay'] == 'Pugot') {
                                                                echo 'selected';
                                                            } ?>>Pugot</option>
                                    <option value="Samon" <?php if ($userData['barangay'] == 'Samon') {
                                                                echo 'selected';
                                                            } ?>>Samon</option>
                                    <option value="San Alejandro" <?php if ($userData['barangay'] == 'San Alejandro') {
                                                                        echo 'selected';
                                                                    } ?>>San Alejandro</option>
                                    <option value="San Mariano" <?php if ($userData['barangay'] == 'San Mariano') {
                                                                    echo 'selected';
                                                                } ?>>San Mariano</option>
                                    <option value="San Pablo" <?php if ($userData['barangay'] == 'San Pablo') {
                                                                    echo 'selected';
                                                                } ?>>San Pablo</option>
                                    <option value="San Patricio" <?php if ($userData['barangay'] == 'San Patricio') {
                                                                        echo 'selected';
                                                                    } ?>>San Patricio</option>
                                    <option value="San Vicente" <?php if ($userData['barangay'] == 'San Vicente') {
                                                                    echo 'selected';
                                                                } ?>>San Vicente</option>
                                    <option value="Santa Cruz" <?php if ($userData['barangay'] == 'Santa Cruz') {
                                                                    echo 'selected';
                                                                } ?>>Santa Cruz</option>
                                    <option value="Santa Rosa" <?php if ($userData['barangay'] == 'Santa Rosa') {
                                                                    echo 'selected';
                                                                } ?>>Santa Rosa</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="purok" class="form-label">Purok</label>
                                <select name="purok" id="purok" class="form-select">
                                    <option value="Purok 1" <?php if ($userData['purok'] == 'Purok 1') {
                                                                echo 'selected';
                                                            } ?>>Purok 1</option>
                                    <option value="Purok 2" <?php if ($userData['purok'] == 'Purok 2') {
                                                                echo 'selected';
                                                            } ?>>Purok 2</option>
                                    <option value="Purok 3" <?php if ($userData['purok'] == 'Purok 3') {
                                                                echo 'selected';
                                                            } ?>>Purok 3</option>
                                    <option value="Purok 4" <?php if ($userData['purok'] == 'Purok 4') {
                                                                echo 'selected';
                                                            } ?>>Purok 4</option>
                                    <option value="Purok 5" <?php if ($userData['purok'] == 'Purok 5') {
                                                                echo 'selected';
                                                            } ?>>Purok 5</option>
                                    <option value="Purok 6" <?php if ($userData['purok'] == 'Purok 6') {
                                                                echo 'selected';
                                                            } ?>>Purok 6</option>
                                    <option value="Purok 7" <?php if ($userData['purok'] == 'Purok 7') {
                                                                echo 'selected';
                                                            } ?>>Purok 7</option>


                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="household" class="form-label">Household Number</label>
                                <input id="house" type="text" class="form-control shadow " name="house" value="<?php echo $personT['household_number']; ?>">


                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success w-100 shadow" id="update">
                                    Update
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="userdashboard.php" class="btn btn-outline-danger w-100 shadow">
                                    Cancel
                                </a>
                            </div>
                        </div>


                    </form>
                    <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add an input field for image upload -->
                <input type="file" id="profilePicture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                <!-- Display image preview -->
                <img id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- Add a button to confirm the update -->
                <button type="button" class="btn btn-primary" id="confirmUpdate">Confirm Update</button>
            </div>
        </div>
    </div>
</div>
                </div>
            </main>
        </div>

<?php
    }
}

?>

</script><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(function() {
        // Function to handle click event on the update button
        $('#update').click(function() {
            // Get the values of input fields
            var firstname = $('#firstname').val();
            var middlename = $('#middlename').val();
            var lastname = $('#lastname').val();
            var alias = $('#alias').val();
            var placeOfBirth = $('#place_of_birth').val();
            var birthdate = $('#birthdate').val();
            var sex = $('#sex').val();
            var religion = $('#religion').val();
            var citizenship = $('#citizenship').val();
            var civilStatus = $('#sttus').val();
            var occupation = $('#occupation').val();
            var registeredVoter = $('#registered_voter').val();
            var contactNumber = $('#contact_number').val();
            var barangay = $('#barangay').val();
            var purok = $('#purok').val();
            var householdNumber = $('#house').val();
            var age = $("#age").val();
            // Create an object to store the form data
            var data = {
                firstname: firstname,
                middlename: middlename,
                lastname: lastname,
                alias: alias,
                place_of_birth: placeOfBirth,
                birthdate: birthdate,
                sex: sex,
                religion: religion,
                citizenship: citizenship,
                civil_status: civilStatus,
                occupation: occupation,
                registered_voter: registeredVoter,
                contact_number: contactNumber,
                barangay: barangay,
                purok: purok,
                household_number: householdNumber,
                age: age
            };

            // Send formData to server using AJAX
            $.ajax({
                type: 'POST',
                url: 'update_profile.php', // Replace with the URL to handle profile updates
                data: data,
                dataType:'json',
                success: function(response) {
                   Swal.fire({
  title:response.title,
  icon: response.icon,

});
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error updating profile: ', error);
                }
            });
        });
    });
</script>

<script>
    // JavaScript function to preview the selected image
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var img = document.getElementById('imagePreview'); // Corrected ID reference
            img.src = dataURL;
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
<script src="update_profilepic.js"></script>

       