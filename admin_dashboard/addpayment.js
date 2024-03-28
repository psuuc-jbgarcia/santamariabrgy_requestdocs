$(function(){
$("#pay").click(function(){
payment();
});
function payment(){
    var value=$("#paymentAmount").val();
    var doctype=$("#documentType").val();
    var email=$("#selectedUserEmail").val();
    var data={
        amount:value,
        doctype:doctype,
        email:email
    };
    $.ajax({
  url:'addpayment.php',
  method:'post',
  data:data,
  dataType:'json',
  success:function(response){
Swal.fire({
  title:response.title,
  icon: response.icon,

});
if(response.icon=="success"){
    $('#paymentModal').modal('hide');

}
  },
    });
}
});