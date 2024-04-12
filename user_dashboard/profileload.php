<?php  session_start()?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">

<style>
     @media (max-width: 576px) {

/* Extra small devices (phones) */
.hero-text h1 {
    font-size: 24px;
}

.hero-text p {
    font-size: 16px;
}
}

@media (min-width: 577px) and (max-width: 768px) {

/* Small devices (tablets) */
.hero-text h1 {
    font-size: 28px;
}

.hero-text p {
    font-size: 18px;
}
}
/* CSS for notification container */
.notification-container {
position: relative;
display: inline-block; /* Ensures elements are displayed in line */
}

/* CSS for notification count badge */
#msgcount {
position: absolute;
top: 0;
right: 0;
transform: translate(50%, -50%);
}

/* Media query for smaller devices */
@media (max-width: 768px) {
/* Adjust the badge size and position for smaller devices */
#msgcount {
transform: none;
top: auto;
right: -8px;
bottom: 0;
}
}

</style>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-light fixed-top mb-5" style="background-color: #ffffff; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);"> <!-- Add inline style to set background color to white and add drop shadow -->
    <!-- Change navbar-dark to navbar-light -->

    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top mb-5">  -->
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../landingpage/1708167598_download-removebg-preview.png" alt="Logo" width="50" height="50" class="mr-2"> <!-- Adjust width and height as needed -->
            Municipality of Sta Maria
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="userdashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userdashboard.php">Track Documents</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="requestDocsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Request Documents</a>
                    <div class="dropdown-menu" aria-labelledby="requestDocsDropdown">
                        <a class="dropdown-item" href="#request-service1" onclick="proceedToService('Barangay Clearance')">Barangay Clearance</a>
                        <a class="dropdown-item" href="#request-service2" onclick="proceedToService('Barangay Permit')">Business Permit</a>
                        <a class="dropdown-item" href="#request-service3" onclick="proceedToService('Indigency Certificate')">Indigency Certificate</a>
                        <a class="dropdown-item" href="#request-service4" onclick="proceedToService('Residency Certificate')">Residency Certificate</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-white text-white dropdown-toggle bg-success" type="button" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: green;">
                    <?php
                    require '../connection.php';
                    $user = $_SESSION['user'];
                    $stmt = "select fname from users where username=?";
                    $result = $conn->prepare($stmt);
                    $result->bind_param("s", $user);
                    $result->execute();
                    $get = $result->get_result();
                    if ($get->num_rows === 1) {
                        $data = $get->fetch_assoc();
                        $nameParts =  $data['fname'];
                        echo $nameParts; // Display the user's first name
                    }
                    ?>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
    <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> Profile</a>
    <a class="dropdown-item" href="requestedDocs.php"><i class="fas fa-file-alt"></i> Requested Documents</a>
    <a class="dropdown-item" href="suggestUI.php"><i class="fas fa-comments"></i> Your Suggestions</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" id="logoutBtn"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
            </div>
            <div class="notification-container">
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#notificationModal">
        <i class="fas fa-bell"></i> <!-- Font Awesome bell icon -->
    </button>
    <div id="msgcount" class="msgcount">
        <span id="notificationBadge" class="badge badge-danger"></span>
    </div>
</div>
        </div>
  
    </div>

   
</nav>

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
     

            <main>
                <div class="container" style="margin-top: 60px">
                        <input type="hidden" name="_token" value="bcrQuXSTVdYFsLrzwfOBW24ABJalkWRctZ2wBiU0" autocomplete="off">
                    
                      
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


                        <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Input field for image upload -->
                <input type="file" id="profilePicture" name="profile_picture" accept="image/*" onchange="previewImage(event)">
                <!-- Display image preview -->
                <img id="imagePreview" src="#" alt="Preview" style="max-width: 100%; max-height: 200px;">
                <!-- Video element to display camera preview -->
                <video id="cameraPreview" style="width: 100%; height: auto;"></video>

                <!-- Button to open camera -->
                <button type="button" class="btn btn-primary mt-2" id="openCamera">Open Camera</button>
                
            </div>
            <button type="button" class="btn btn-primary" id="capture">Capture Image</button>

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
else{
    ?>
<div class="container mt-5">
        <div class="alert alert-warning" role="alert">
            It seems you haven't filled up your personal details yet. Please click the button below to fill up your personal details.
        </div>
        <div class="text-center">
            <a href="form.php" class="btn btn-primary">Fill Up Personal Details</a>
        </div>
    </div>
<?php
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
<script>
// JavaScript function to open or close the camera and display the stream in the modal
var isCameraOpen = false; // Track the state of the camera

document.getElementById('openCamera').addEventListener('click', function() {
    if (!isCameraOpen) { // If camera is not open
        console.log('Attempting to access camera...');
        // Get the video element
        var video = document.getElementById('cameraPreview');
        // Check if camera access is available
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            console.log('Camera access granted');
            console.log('Stream object:', stream);
            video.srcObject = stream;
            // Play the video to display the stream
            video.play();
            // Change button text to "Close Camera"
            document.getElementById('openCamera').textContent = 'Close Camera';
            isCameraOpen = true; // Update camera state
        })
        .catch(function(error) {
            console.error('Error accessing camera:', error);
        });
    } else { // If camera is already open
        // Get the video element
        var video = document.getElementById('cameraPreview');
        // Stop the video stream
        var stream = video.srcObject;
        var tracks = stream.getTracks();
        tracks.forEach(function(track) {
            track.stop();
        });
        // Clear the video srcObject
        video.srcObject = null;
        // Change button text to "Open Camera"
        document.getElementById('openCamera').textContent = 'Open Camera';
        isCameraOpen = false; // Update camera state
    }
});


// JavaScript function to capture the image from the camera stream
document.getElementById('capture').addEventListener('click', function() {
    // Get the video element
    var video = document.getElementById('cameraPreview');
    
    // Create a canvas element to capture the image
    var canvas = document.createElement('canvas');
    // Set the canvas dimensions to match the video stream
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    // Draw the current frame from the video stream onto the canvas
    var context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    // Convert the canvas content to a data URL representing the captured image
    var imageDataURL = canvas.toDataURL('image/jpeg');
    // Display the captured image in an img element
    var imagePreview = document.getElementById('imagePreview');
    imagePreview.src = imageDataURL;
    // You can now send the imageDataURL to your server for further processing or saving
    
    // Stop the video stream
    var stream = video.srcObject;
    var tracks = stream.getTracks();
    tracks.forEach(function(track) {
        track.stop();
    });
    // Clear the video srcObject
    video.srcObject = null;
    // Change button text to "Open Camera"
    document.getElementById('openCamera').textContent = 'Open Camera';
    // Update camera state
    isCameraOpen = false;
});


// JavaScript function to preview the selected image
function previewImage(event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function() {
        var dataURL = reader.result;
        var img = document.getElementById('imagePreview');
        img.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
}

</script>
<script src="update_profilepic.js"></script>

<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="notif">
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
    notifs();
    loadmsgcount();
function notifs(){
    $("#notif").load("fetch_notif.php");
}
function loadmsgcount(){
    $("#msgcount").load("fetch_messagecount.php");
}
setInterval(function(){
    notifs();
    loadmsgcount();
},1000);
});

</script>
<script>
    $(document).ready(function() {
        function handleModalShown() {
            $.ajax({
                url: 'mark_notification_as_read.php', 
                type: 'POST',
                success: function(response) {
                   console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error('Error marking notifications as read:', error); 
                }
            });
        }

        $('#notificationModal').on('shown.bs.modal', handleModalShown);
    });
</script>
       <!-- Bootstrap Bundle with Popper -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
