
    
<?php 
session_start();
require '../../connection.php';
require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';

       
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    $email=$_POST['email'];
    $username="";
    $insertQuery="select username,email from users where email=?";
    $stmt=$conn->prepare($insertQuery);
    $stmt->bind_param("s",$email);
    $stmt->execute();
   $result=$stmt->get_result();
    if($result->num_rows===1){
        // para sa paglabas ng username based sa email
        $data=$result->fetch_assoc();
        $username=$data['username'];
        // session para sa email para magamit ko sa reset pass
        $_SESSION['email']=$data['email'];
        // echo "<script>    Swal.fire({
        //     title: 'Hello',
        //     text: '$username',
        //     icon: 'success'
        // });</script>";
     
       
       // Initialize PHPMailer
       $mail = new PHPMailer(true);
       
       try {
           // Set up the SMTP server settings
           $mail->isSMTP();
           $mail->Host = 'smtp.gmail.com';  // Your SMTP server
           $mail->SMTPAuth = true;
           $mail->Username = 'jgarcia_21ur0151@psu.edu.ph';  // SMTP username
           $mail->Password = '@jerico123*';  // SMTP password
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS
           $mail->Port = 587;  // SMTP port
       
           // Sender
           $mail->setFrom('jgarcia_21ur0151@psu.edu.ph', 'Santa Maria Forgot Password Services');
       
           // Recipient
        
           $mail->addAddress($email);
       
           // Content
           $mail->isHTML(true);
           $mail->Subject = 'Recover your password';
           $mail->Body = '<b>Dear ' . $username . ',</b>
           <h3>We received a request to reset your password.</h3>
           <p>Kindly click the link below to reset your password:</p>
           http://localhost/websys2mtr/user_registration/resetpass.php
           <br> <br>
           <p>Do not share this if you did not request it.</p>';
           
       
           $mail->send();
           echo "<script>alert('Password reset email sent successfully.Check your email')</script>
           ";
           header("Refresh:1;url=forgotpass.php");
       } catch (Exception $e) {
        // echo "<script>    Swal.fire({
        //     title: 'We cant send an email unless you',
        //     text: 'Enable Less secure apps in your Google Account settings',
        //     icon: 'error'
        // });</script>";
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          
       }
    }
    else{
       
        echo "<script>alert('Your email is not found or register')</script>";


        header("Refresh:1;url=forgotpass.php");
    }
  
    


?>

