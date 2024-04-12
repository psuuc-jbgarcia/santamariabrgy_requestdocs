$(function(){
    // Remove existing click event handlers for #logoutBtn
    $("#logoutBtn").unbind("click");

    // Add click event handler for #logoutBtn
    $("#logoutBtn").click(function(event){
        event.preventDefault(); // Prevent default action

        $.ajax({
            url: "logout.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                if(response.status === 'success'){
                    // Redirect to the login page after successful logout
                    window.location.href = "../index.php";
                } else {
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: " + error);
            }
        });

        return false; // Prevent default action and stop event propagation
    });
});
