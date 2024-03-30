$(function() {
  

function loadata() {
    $('#data').load('profileload.php');
}

    $("#profilePictureInput").change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#imagePreview").attr("src", e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    // Handle click event on the confirm update button
    $("#confirmUpdate").click(function() {
        var imageDataUrl = $("#imagePreview").attr("src");
var data= {
    profileImageData: imageDataUrl
};
        // Send the image data URL to the backend
        $.ajax({
            url: "update_profilepic.php", 
            method: "POST",
            data:data,
            dataType:'json',
            success: function(response) {

Swal.fire({
  title:response.title,
  icon: response.icon,
});
setTimeout(function() {
    loadata();
}, 1000);

          
            },
            error: function(xhr, status, error) {
                console.error('Error updating profile picture: ', error);
            }
        });
    });
});
