$(function() {
    $("#addACCOUNT").click(function() {
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
            fname: fname,
            mname: mname,
            lname: lname,
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
                } else {
                    alert(response);
                }

            },
        });
    }
});
