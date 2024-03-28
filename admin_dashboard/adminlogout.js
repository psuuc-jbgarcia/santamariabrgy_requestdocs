$(function(){
    // Remove existing click event handlers for #logoutBtn
    $("#loutadmin").unbind("click");

    // Add click event handler for #logoutBtn
    $("#loutadmin").click(function(event){
        event.preventDefault(); // Prevent default action

        $.ajax({
            url: "logout.php",
            type: "POST",
            dataType: "json",
            success: function(response){
                if(response.status === 'success'){
                    // Redirect to the login page after successful logout
                    alert(response.message);
                    window.location.href = "../index.php";
                } else {
                    alert("Error: " + response.message);
                }
            },
            error: function(xhr, status, error){
                console.error("AJAX Error: " + error);
            }
        });

        return false; // Prevent default action and stop event propagation
    });
});