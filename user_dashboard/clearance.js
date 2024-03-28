// $(function(){
//     $("#requestClerance").click(function(){
//         addClearance();
//         });
// function addClearance(){
//     var tracking=$("#clearanceTrackingCode").val();
//     var fullname=$("#clearanceFullName").val();
//     var pickupdate=$("#clearanceDateApplied").val();
//     var purpose=$("#clearancePurpose").val();
//     var type=$("#type").val();
//     var status="Pending";
//     var data={
//         tracking:tracking,
//         fullname:fullname,
//         pickupdate:pickupdate,
//         purpose:purpose,
//         type:type,
//         status:status,
        
//     }
//     $.ajax({
// url:"requestClearance.php",
// method:"post",
// data:data,
// dataType:"json",
// success:function(response){
//     Swal.fire({
//         title: response.title,
//         text: response.text,
//         icon: response.icon
//     });
//     if(response.icon=="success"){
//         $('#serviceModal').modal('hide');

//     }


// },
//     });
// }

// });