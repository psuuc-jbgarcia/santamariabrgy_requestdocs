<?php
session_start();
require '../connection.php';
$response=array();
$stmt = "select username,passwords from users";
$username = trim($_POST['username']);
$password = trim($_POST['password']);
if ($username == "" || $password == "") {
    echo 'Please fill up the form';
    // $response=[
    //     'title'=>'Please fill up the form',
    //     'icon'=>'error'
    // ];
} else {
    $stmtAdmin = "SELECT username, passwords FROM adminaccount WHERE username = ?";
    $stmtAdmin = $conn->prepare($stmtAdmin);
    $stmtAdmin->bind_param("s", $username);
    $stmtAdmin->execute();
    $resultAdmin = $stmtAdmin->get_result();
    if ($resultAdmin->num_rows === 1) {
        // admin account validation
        $dataAdmin = $resultAdmin->fetch_assoc();
        $hashedPasswordAdmin = $dataAdmin['passwords'];

        if ($password == $hashedPasswordAdmin) {
            $_SESSION['admin'] = $username;
            echo 'Welcome admin';

            // $response=[
            //     'title'=>'Welcome admin',
            //     'icon'=>'info'
            // ];
        } else {
            echo 'Password is wrong';
            // $response=[
            //     'title'=>'Password is wrong',
            //     'icon'=>'error'
            // ];
        }
    } else {
        // user account validation
        $stmtUser = "SELECT username, passwords,email FROM users WHERE username = ?";
        $stmtUser = $conn->prepare($stmtUser);
        $stmtUser->bind_param("s", $username);
        $stmtUser->execute();
        $resultUser = $stmtUser->get_result();

        if ($resultUser->num_rows === 1) {
            // Regular user login
            $dataUser = $resultUser->fetch_assoc();
            $hashedPasswordUser = $dataUser['passwords'];
            $email=$dataUser['email'];

            if (password_verify($password, $hashedPasswordUser)) {
                // Store the username in the session
                $_SESSION['user'] = $username;
                $_SESSION['email']=$email;
                echo 'Welcome user';
                // $response=[
                //     'title'=>'Welcome user',
                //     'icon'=>'success'
                // ];
                
            } else {
                echo 'Password is wrong';
                // $response=[
                //     'title'=>'Password is wrong',
                //     'icon'=>'error'
                // ];
            }
        } else {
            echo 'Username is not registered';
            // $response=[
            //     'title'=>'Username is not registered',
            //     'icon'=>'error'
            // ];
        }
    }
}
// echo json_encode($response);
?>