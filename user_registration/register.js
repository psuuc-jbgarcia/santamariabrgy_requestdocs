// Access the device camera
navigator.mediaDevices.getUserMedia({
    video: true
})
.then(function(stream) {
    var video = document.getElementById('camera-feed');
    video.srcObject = stream;
    video.play();
})
.catch(function(err) {
    console.log('An error occurred: ' + err);
});

// Function to capture snapshot
function takeSnapshot() {
var video = document.getElementById('camera-feed');
var canvas = document.getElementById('snapshot');
var context = canvas.getContext('2d');

// Set canvas dimensions
canvas.width = Math.min(video.videoWidth, video.videoHeight);
canvas.height = canvas.width;

// Calculate crop values to create a circular image
var cropX = (video.videoWidth - canvas.width) / 2;
var cropY = (video.videoHeight - canvas.height) / 2;

// Draw video frame onto canvas
context.drawImage(video, cropX, cropY, canvas.width, canvas.height, 0, 0, canvas.width, canvas.height);

// Convert canvas to data URL
var dataURL = canvas.toDataURL('image/jpeg');

// Set data URL as source for input file
var input = document.getElementById('profile-picture');
input.setAttribute('value', dataURL);

// Set filename for the image (you can adjust this as needed)
var filename = 'snapshot_' + new Date().getTime() + '.jpg';
input.setAttribute('name', filename); // Set the filename as the name attribute
alert(filename);
// Display snapshot
canvas.style.display = 'block';

// Hide camera feed and show retake button and registration form
video.style.display = 'none';
document.getElementById('takePicture').style.display = 'none';
document.getElementById('retakePicture').style.display = 'block';
document.getElementById('register-form').style.display = 'block';

// Display taken picture
document.getElementById('taken-picture').src = dataURL;
document.getElementById('taken-picture').style.display = 'block';
}

// Function to retake picture
function retakePicture() {
var video = document.getElementById('camera-feed');
var canvas = document.getElementById('snapshot');

// Clear snapshot canvas
var context = canvas.getContext('2d');
context.clearRect(0, 0, canvas.width, canvas.height);

// Show camera feed and hide retake button and registration form
video.style.display = 'block';
document.getElementById('takePicture').style.display = 'block';
document.getElementById('retakePicture').style.display = 'none';
document.getElementById('register-form').style.display = 'none';

// Hide taken picture
document.getElementById('taken-picture').style.display = 'none';
}


document.getElementById('takePicture').addEventListener('click', takeSnapshot);
document.getElementById('retakePicture').addEventListener('click', retakePicture);

$(function() {
$("#add").click(function() {
    add();
 
});

function add() {

    var username = $("#username").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var cpass = $("#confirmPassword").val();
    var fname = $("#firstName").val();
    var mname = $("#middleName").val();
    var lname = $("#lastName").val();
    var gender = $("#gender").val();
    var purok = $("#purok").val();
    var brgy = $("#brgy").val();
    var canvas = document.getElementById('snapshot');
    var context = canvas.getContext('2d');

    var video = document.getElementById('camera-feed');
    var cropX = (video.videoWidth - canvas.width) / 2;
    var cropY = (video.videoHeight - canvas.height) / 2;
    context.drawImage(video, cropX, cropY, canvas.width, canvas.height, 0, 0, canvas.width, canvas.height);

    var imageDataURL = canvas.toDataURL('image/jpeg');

    var filename = document.getElementById('profile-picture').value;

    var data = {
        username: username,
        email: email,
        password: password,
        cpass: cpass,
fname:fname,
mname:mname,
lname:lname,
        gender: gender,
        purok: purok,
        brgy: brgy,
        imageDataURL: imageDataURL,
    };


    console.log(imageDataURL);

    $.ajax({
        url: "adduser.php",
        method: "post",
        data: data,
        success: function(response) {
            if (response === 'Registered Successfully') {
                alert(response);
                setTimeout(function() {
                    window.location.href = "form.php";
                }, 1000); 
            }
                else {
                    alert(response);
                }
         
        },
    });
}

});
// PASWORD TOGGLE 
// Toggle password visibility
$("#togglePassword").click(function() {
    var passwordField = $("#password");
    var type = passwordField.attr("type") === "password" ? "text" : "password";
    passwordField.attr("type", type);
    $(this).find('i').toggleClass('fa-eye-slash fa-eye'); // Toggle Font Awesome icons
});

// Toggle confirm password visibility
$("#toggleConfirmPassword").click(function() {
    var confirmPasswordField = $("#confirmPassword");
    var type = confirmPasswordField.attr("type") === "password" ? "text" : "password";
    confirmPasswordField.attr("type", type);
    $(this).find('i').toggleClass('fa-eye-slash fa-eye'); // Toggle Font Awesome icons
});
