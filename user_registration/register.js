var imageDataURL=null;
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
            $('#skipPicture').hide(); // Hide the skip button

            var video = document.getElementById('camera-feed');
            var canvas = document.getElementById('snapshot');
            var context = canvas.getContext('2d');

            // Check if the video and canvas elements exist
            if (video && canvas) {
                // Set canvas dimensions
                canvas.width = Math.min(video.videoWidth, video.videoHeight);
                canvas.height = canvas.width;

                // Calculate crop values to create a circular image
                var cropX = (video.videoWidth - canvas.width) / 2;
                var cropY = (video.videoHeight - canvas.height) / 2;

                // Draw video frame onto canvas
                context.drawImage(video, cropX, cropY, canvas.width, canvas.height, 0, 0, canvas.width, canvas.height);

                // Convert canvas to data URL
                imageDataURL = canvas.toDataURL('image/jpeg');

                // Set data URL as source for input file
                var input = document.getElementById('profile-picture');
                if (input) {
                    input.setAttribute('value', imageDataURL);
                    // Set filename for the image (you can adjust this as needed)
                    var filename = 'snapshot_' + new Date().getTime() + '.jpg';
                    input.setAttribute('name', filename); // Set the filename as the name attribute

                    // Log the filename to the console
                    console.log('Image filename:', filename);
                }

                // Display snapshot
                canvas.style.display = 'block';

                // Hide camera feed and show retake button and registration form
                video.style.display = 'none';
                document.getElementById('takePicture').style.display = 'none';
                document.getElementById('retakePicture').style.display = 'block';
                document.getElementById('register-form').style.display = 'block';

                // Display taken picture
                var takenPicture = document.getElementById('taken-picture');
                if (takenPicture) {
                    takenPicture.src = imageDataURL;
                    takenPicture.style.display = 'block';
                } else {
                    console.error("Element with id 'taken-picture' not found.");
                }
            } else {
                console.error("Elements 'camera-feed' or 'snapshot' not found.");
            }
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

        // Event listener for taking snapshot
        document.getElementById('takePicture').addEventListener('click', takeSnapshot);

        // Event listener for retaking picture
        document.getElementById('retakePicture').addEventListener('click', retakePicture);

        // Function to add account
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

            var data = {
                username: username,
                email: email,
                password: password,
                cpass: cpass,
                fname: fname,
                mname: mname,
                lname: lname,
                gender: gender,
                purok: purok,
                brgy: brgy,
                imageDataURL: imageDataURL, // Pass the image data URL
            };

            console.log(imageDataURL);

            // Make AJAX request to add user
            $.ajax({
                url: "adduser.php",
                method: "post",
                data: data,
                success: function(response) {
                    if (response === 'Registered Successfully') {

                        setTimeout(function() {
                            window.location.href = "form.php";

                        }, 1000);
                    } 
                },
            });
        }

        // Event listener for adding account
        $("#addACCOUNT").click(function() {
            add();
        });
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