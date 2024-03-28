
<?php
session_start();
require '../connection.php';


$username=$_SESSION['user'];
$stmt="select * from users where username =?";
$result=$conn->prepare($stmt);
$result->bind_param('s',$username);
$result->execute();
$result=$result->get_result();
$stmt1="select * from personalinformation where username =?";
$result1=$conn->prepare($stmt1);
$result1->bind_param('s',$username);
$result1->execute();
$result1=$result1->get_result();
if($result1->num_rows>0){
    $personT=$result1->fetch_assoc();

if($result->num_rows>0){
    $userData=$result->fetch_assoc();
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
                        <canvas id="captureCanvas" style="display:none;height:200px;"></canvas>
                    </center>
                    <center>
                    <video id="cameraPreview" style="display:none;height: 200px"></video>
                    </center>
                    <center>
                       
                        <img src="../user_registration/userimage/<?php echo $userData['profile_picture'] ?>" alt="profile" id="defaultImage" style="height: 200px"><br><br>
                        <a class="btn btn-primary" id="openCamera">Open Camera</a>
                        <a class="btn btn-danger" id="capture">Capture</a>
                    </center>
                    <hr class="mb-3" >
                    <div class="row mb-3">
    <div class="col">
        <label for="firstname" class="form-label">First Name</label>
        <input id="firstname" type="text" class="form-control  shadow " name="firstname" value="<?php echo $userData['fname'] ?>" required>
    </div>
    <div class="col">
        <label for="middlename" class="form-label">Middle Name</label>
        <input id="middlename" type="text" class="form-control shadow " name="middlename" value="<?php echo $userData['mname'] ?>">
    </div>
    <div class="col">
        <label for="lastname" class="form-label">Last Name</label>
        <input id="lastname" type="text" class="form-control  shadow " name="lastname" value="<?php echo $userData['lname'] ?>" required>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label for="alias" class="form-label">Alias</label>
        <input id="alias" type="text" class="form-control  shadow " name="alias" value="<?php echo $personT['alias']; ?>" required>
    </div>
    <div class="col">
        <label for="place_of_birth" class="form-label">Place of Birth</label>
        <input id="place_of_birth" type="text" class="form-control  shadow " name="place_of_birth" value="<?php echo $personT['place_of_birth']; ?>" required>
    </div>
    <div class="col">
        <label for="birthdate" class="form-label">Birthdate</label>
        <input id="birthdate" type="date" class="form-control  shadow " name="birthdate" value="<?php echo $personT['birthdate']; ?>" required>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label for="age" class="form-label">Age</label>
        <input id="religion" type="text" class="form-control shadow" value="<?php echo $personT['age']; ?>" readonly>
    </div>
    <div class="col">
        <label for="sex" class="form-label">Sex</label>
        <select id="sex" class="form-control  shadow " name="sex" required>
            <option value="male" <?php  if($userData['gender']=="male") echo 'selected' ?>>Male</option>
            <option value="female"  <?php  if($userData['gender']=="female") echo 'selected' ?>>Female</option>
        </select>
    </div>
    <div class="col">
        <label for="religion" class="form-label">Religion</label>
        <input id="religion" type="text" class="form-control  shadow " name="religion" value="<?php echo $personT['religion']; ?>" required>
    </div>
    <div class="col">
        <label for="citizenship" class="form-label">Citizenship</label>
        <input id="citizenship" type="text" class="form-control  shadow " name="citizenship" value="<?php echo $personT['citizenship']; ?>" required>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <label for="civil_status" class="form-label">Civil Status</label>
        <input id="sttus" type="text" class="form-control  shadow " name="sts" value="<?php echo $personT['civil_status']; ?>" required>

    </div>
    <div class="col">
        <label for="occupation" class="form-label">Occupation</label>
        <input id="occupation" type="text" class="form-control  shadow " name="occupation" value="<?php echo $personT['occupation']; ?>" required>
    </div>
    <div class="col">
        <label for="registered_voter" class="form-label">Registered Voter?</label>
        <select id="registered_voter" class="form-control  shadow " name="registered_voter" required>
            <option value="YES" <?php if($personT['registered_voter']=='YES') {echo 'selected';} ?>>YES</option>
            <option value="NO" <?php if($personT['registered_voter']=='NO') {echo 'selected';} ?>>NO</option>
        </select>
    </div>
    <div class="col">
        <label for="contact_number" class="form-label">Contact Number</label>
        <input id="contact_number" type="tel" class="form-control  shadow " name="contact_number" value="<?php echo $personT['contact_number']; ?>" required>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        <label class="form-label">Barangay</label>
        <select name="barangay" id="barangay" class="form-select shadow">
            <option value="" disabled selected>Select Barangay</option>
            <option value="Alipangpang" <?php  if($userData['barangay']=='Alipangpang'){echo 'selected';} ?>>Alipangpang</option>

                            <option value="Poblacion East" <?php  if($userData['barangay']=='Poblacion East'){echo 'selected';} ?>>Poblacion East</option>
                            <option value="Poblacion West" <?php  if($userData['barangay']=='Poblacion West'){echo 'selected';} ?>>Poblacion West</option>
                            <option value="Pugot" <?php  if($userData['barangay']=='Pugot'){echo 'selected';} ?>>Pugot</option>
                            <option value="Samon"<?php  if($userData['barangay']=='Samon'){echo 'selected';} ?>>Samon</option>
                            <option value="San Alejandro"<?php  if($userData['barangay']=='San Alejandro'){echo 'selected';} ?>>San Alejandro</option>
                            <option value="San Mariano"<?php  if($userData['barangay']=='San Mariano'){echo 'selected';} ?>>San Mariano</option>
                            <option value="San Pablo"<?php  if($userData['barangay']=='San Pablo'){echo 'selected';} ?>>San Pablo</option>
                            <option value="San Patricio"<?php  if($userData['barangay']=='San Patricio'){echo 'selected';} ?>>San Patricio</option>
                            <option value="San Vicente"<?php  if($userData['barangay']=='San Vicente'){echo 'selected';} ?>>San Vicente</option>
                            <option value="Santa Cruz"<?php  if($userData['barangay']=='Santa Cruz'){echo 'selected';} ?>>Santa Cruz</option>
                            <option value="Santa Rosa"<?php  if($userData['barangay']=='Santa Rosa'){echo 'selected';} ?>>Santa Rosa</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="purok" class="form-label">Purok</label>
        <select name="purok" id="purok" class="form-select">
        <option value="Purok 1" <?php if($userData['purok']=='Purok 1'){echo 'selected';} ?>>Purok 1</option>
<option value="Purok 2" <?php if($userData['purok']=='Purok 2'){echo 'selected';} ?>>Purok 2</option>
<option value="Purok 3" <?php if($userData['purok']=='Purok 3'){echo 'selected';} ?>>Purok 3</option>
<option value="Purok 4" <?php if($userData['purok']=='Purok 4'){echo 'selected';} ?>>Purok 4</option>
<option value="Purok 5" <?php if($userData['purok']=='Purok 5'){echo 'selected';} ?>>Purok 5</option>
<option value="Purok 6" <?php if($userData['purok']=='Purok 6'){echo 'selected';} ?>>Purok 6</option>
<option value="Purok 7" <?php if($userData['purok']=='Purok 7'){echo 'selected';} ?>>Purok 7</option>


                                </select>
    </div>
    <div class="col-md-3">
        <label for="household" class="form-label">Household Number</label>
        <input id="house" type="text" class="form-control shadow " name="house" value="  <?php echo $personT['household_number']; ?>" required>

      
    </div>
    
</div>
<div class="row">
    <div class="col-md-6">
        <button type="button" class="btn btn-success w-100 shadow" id="update">
            Update
        </button>
    </div>
    <div class="col-md-6">
        <a href="" class="btn btn-outline-danger w-100 shadow">
            Cancel
        </a>
    </div>
</div>


                </form>
            </div>
        </main>
    </div>

    <?php
}
}

?>
<script>
    $(function(){
function update(){
formData['firstname'] = $('#firstname').val();
formData['middlename'] = $('#middlename').val();
formData['lastname'] = $('#lastname').val();
formData['alias'] = $('#alias').val();
formData['place_of_birth'] = $('#place_of_birth').val();
formData['birthdate'] = $('#birthdate').val();
formData['sex'] = $('#sex').val();
formData['religion'] = $('#religion').val();
formData['citizenship'] = $('#citizenship').val();
formData['civil_status'] = $('#sttus').val(); // Corrected ID
formData['occupation'] = $('#occupation').val();
formData['registered_voter'] = $('#registered_voter').val();
formData['contact_number'] = $('#contact_number').val();
formData['barangay'] = $('#barangay').val();
formData['purok'] = $('#purok').val();
formData['house'] = $('#house').val();

}
    });
</script>
<script>
    $(function(){
        // Function to open camera
        $('#openCamera').click(function() {
            navigator.mediaDevices.getUserMedia({ video: true })
                .then(function(stream) {
                    var video = document.getElementById('cameraPreview');
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.error('Error accessing the camera: ', err);
                });
        });

        // Function to capture image
        $('#capture').click(function() {
            var canvas = document.getElementById('captureCanvas');
            var video = document.getElementById('cameraPreview');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            
            // Convert canvas to data URL
            var dataURL = canvas.toDataURL('image/png');
            
            // Send dataURL to server for processing (you can use AJAX for this)
            // Example AJAX code:
            $.ajax({
                type: 'POST',
                url: 'process_image.php',
                data: { image: dataURL },
                success: function(response) {
                    // Handle response from server
                    console.log('Image uploaded successfully');
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error uploading image: ', error);
                }
            });
        });
    });
</script>
