$(function(){
    $("#pay").click(function(){
        payment();
    });

    function payment(){
        var value = $("#paymentAmount").val();
        var doctype = $("#documentType").val();
        var email = $("#selectedUserEmail").val();
        var data = {
            amount: value,
            doctype: doctype,
            email: email
        };

        $.ajax({
            url: 'addpayment.php',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(response){
                console.log('Response received:', response);
                Swal.fire({
                    title: response.title,
                    icon: response.icon
                });
                if(response.icon === "success"){
                  setTimeout(function() {
            $('#paymentModal').removeClass('show');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $("#paymentAmount").val('');
            console.log('Reloading page');
            location.reload();
        }, 1000); 
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.error('Error:', textStatus, errorThrown);
            }
        });
    }
});

