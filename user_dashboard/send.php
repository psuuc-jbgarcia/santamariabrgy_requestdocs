<?php 
require '../connection.php';
$response=array();
$name=$_POST['nameval'];
$email=$_POST['emailval'];
$suggestions=$_POST['suggestion'];

if($suggestions==""){
    $response=[
    'title'=>'Fill up the fields',
    'icon'=> 'error'
    ];
}
else{
    $stmt="insert into suggestions(name,email,suggestion,date_requested)values(?,?,?,NOW())";
$result=$conn->prepare($stmt);
$result->bind_param("sss",$name,$email,$suggestions);
$result->execute();
if ($result == true) {
    $response = [
        'title' => 'Your suggestion has been submitted.',
        'icon' => 'success'
    ];
} else {
    $response = [
        'title' => 'Error while submitting.',
        'icon' => 'error'
    ];
}

}
echo json_encode($response);
?>