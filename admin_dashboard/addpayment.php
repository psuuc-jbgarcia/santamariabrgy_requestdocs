<?php 
require '../connection.php';
$response=array();
$amount=$_POST['amount'];
$doctype=$_POST['doctype'];
$email=$_POST['email'];
if($amount==""){

    $response=[
        'title'=>'Please input the payment.',
        'icon'=>'error'
    ];
}
else{
    $stmt=" insert into payment(amount,doctype,email,date_paid)values(?,?,?,NOW())";
$result=$conn->prepare($stmt);
$result->bind_param("iss",$amount,$doctype,$email);
$result->execute();
if ($result == true) {
    $response=[
        'title'=>'Your payment has been recorded successfully.',
        'icon'=>'success'
    ];
} else {
    $response=[
        'title'=>'There was an error recording your payment. Please try again later.',
        'icon'=>'error'
    ];
}
}
echo json_encode($response);

?>