<?php
require '../connection.php';
require '../admin_dashboard/phpmailer/PHPMailer.php';
require '../admin_dashboard/phpmailer/SMTP.php';
require '../admin_dashboard/phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$response = array();

$trackingCode = $_POST['trackingCode'];
$newStatus = $_POST['newStatus'];

// Update status in the database
$stmt = "UPDATE clearance SET status=? WHERE tracking_code=?";
$updateResult = $conn->prepare($stmt);
$updateResult->bind_param("ss", $newStatus, $trackingCode);
$updateResult->execute();

if ($updateResult) {
        if ($newStatus === 'Ready to Pick Up') {
            // Fetch user's email address based on trackingCode
            $stmt = "SELECT email FROM clearance WHERE tracking_code=?";
            $selectResult = $conn->prepare($stmt);
            $selectResult->bind_param("s", $trackingCode);
            $selectResult->execute();
            $selectResult->store_result();

            if ($selectResult->num_rows > 0) {
                $selectResult->bind_result($userEmail);
                $selectResult->fetch();

                // Create a new PHPMailer instance
                $mail = new PHPMailer();

                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Your SMTP server (Gmail)
                $mail->SMTPAuth = true;
                $mail->Username = 'jgarcia_21ur0151@psu.edu.ph'; // Your Gmail address
                $mail->Password = '@jerico123*'; // Your Gmail password or App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Sender
                $mail->setFrom('jgarcia_21ur0151@psu.edu.ph', 'Santa Maria Online Documents Request System'); // Your name and Gmail address

                // Recipient
                $mail->addAddress($userEmail); // Email address of the recipient

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Document Ready for Pickup';
                $mail->Body = 'Your Barangay Clearance document is now ready for pickup. Please visit our office to collect it. Additionally, please note that there is a payment of 100 pesos required for this service.';
                $mail->AltBody = 'Your document is now ready for pickup. Please visit our office to collect it.';

                // Send email
                if (!$mail->send()) {
                    $response = array(
                        'title' => 'Email Sending Failed',
                        'icon' => 'error',
                        'text' => 'Mailer Error: ' . $mail->ErrorInfo
                    );
                } else {
                    $response = array(
                        'title' => 'Email Sent',
                        'icon' => 'success',
                        'text' => 'Notification email sent successfully.'
                    );
                }
            }
        } else {
            $response = array(
                'title' => 'Status Updated',
                'icon' => 'success',
                'text' => 'Status updated successfully.'
            );
        }
    } else {
        $response = array(
            'title' => 'Error',
            'icon' => 'error',
            'text' => 'No rows affected. Tracking code not found or status already set to the same value.'
        );
    }


echo json_encode($response);
?>
