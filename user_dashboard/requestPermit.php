<?php 
session_start();
require '../connection.php';
$response=array();
$trackingCode = $_POST['trackingCode'];
$businessOwnerFullName = $_POST['businessOwnerFullName'];
$businessName = $_POST['businessName'];
$businessNature=$_POST['businessNature'];
$dateApplied = $_POST['dateApplied'];
$type = $_POST['type'];
$status = $_POST['status'];
$username=$_SESSION['user'];
$email=$_SESSION['email'];
$recipent=$_POST['recipent'];
if($recipent==""){
    $recipent="Myself";
}

if($businessName==""||$businessNature==""||$dateApplied==''){
    $response = [
        'title' => 'Fill up all fields',
        'text' => '',
        'icon' => 'error'
    ];
}
else{
    $stmt="insert into permits(tracking_code,business_owner_full_name,business_name,business_nature,date_applied,type,status,username,email,recipent,date)values(?,?,?,?,?,?,?,?,?,?,NOW())";
    $result=$conn->prepare($stmt);
    $result->bind_param("ssssssssss",$trackingCode,$businessOwnerFullName,$businessName,$businessNature,$dateApplied,$type,$status,$username,$email,$recipent);
    $result->execute();
    if($result==true){
        $response = [
            'title' => 'Request Successful',
            'text' => 'Please wait while we process your request.',
            'icon' => 'success'
        ];
        // echo "add";
        
    }
    else{
        echo "error";
        $response = [
            'title' => 'Request Error',
            'text' => '',
            'icon' => 'error'
        ];
    }
}


echo json_encode($response);

?>


