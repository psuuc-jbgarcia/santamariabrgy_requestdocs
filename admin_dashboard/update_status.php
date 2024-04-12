<?php
session_start();
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
$requestType = $_POST['requestType']; // Added to distinguish document types
$email = $_POST['email'];

// Update status in the database based on the document type
switch ($requestType) {
    case 'permits':
        $stmt = "UPDATE permits SET status=? WHERE tracking_code=?";
        break;
    case 'clearance':
        $stmt = "UPDATE clearance SET status=? WHERE tracking_code=?";
        break;
    case 'residency':
        $stmt = "UPDATE residency SET status=? WHERE tracking_code=?";
        break;
    case 'certificates':
        $stmt = "UPDATE certificates SET status=? WHERE tracking_code=?";
        break;
    default:
        $response = array(
            'title' => 'Error',
            'icon' => 'error',
            'text' => 'Invalid document type.'
        );
        echo json_encode($response);
        exit();
}

$updateResult = $conn->prepare($stmt);
$updateResult->bind_param("ss", $newStatus, $trackingCode);
$updateResult->execute();

// Check if the update was successful
if ($updateResult==true) {

    // Status updated successfully
    $response = array(
        'title' => 'Status Updated',
        'icon' => 'success',
        'text' => 'Status updated successfully.'
    );

    insertLogEntry($conn, $trackingCode, $newStatus, $requestType, $email);


    // Check if the status is "Ready to Pick Up" and send email
    if ($newStatus === 'Ready to Pick Up') {
        // Fetch user's email address based on trackingCode
        switch ($requestType) {
            case 'permits':
                break;
            case 'clearance':
                break;
            case 'residency':
                break;
            case 'certificates':
                break;
            default:
                $response = array(
                    'title' => 'Error',
                    'icon' => 'error',
                    'text' => 'Invalid document type.'
                );
                echo json_encode($response);
                exit();
        }

        $stmt = "SELECT email FROM $requestType WHERE tracking_code=?";
        $selectResult = $conn->prepare($stmt);
        $selectResult->bind_param("s", $trackingCode);
        $selectResult->execute();
        $selectResult->store_result();

        if ($selectResult->num_rows > 0) {
            $selectResult->bind_result($userEmail);
            $selectResult->fetch();

            // Create a new PHPMailer instance
            $mail = new PHPMailer();

            // SMTP Configuration (Assuming Gmail SMTP)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jgarcia_21ur0151@psu.edu.ph'; // Your Gmail address
            $mail->Password = '@jerico123*'; // Your Gmail password or App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender
            $mail->setFrom('jgarcia_21ur0151@psu.edu.ph', 'Santa Maria Online Documents Request System'); // Your name and Gmail address

            // Recipient
            $mail->addAddress($userEmail); // Email address of the recipient

            // Email content (Modify as needed for different document types)
            $documentType = ucfirst($requestType); // Capitalize the document type
            $mail->isHTML(true);
            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'Document Ready for Pickup';
            // Logo image URL
            $logoUrl = 'https://www.pangasinan.gov.ph/wp-content/uploads/2023/06/santa-maria-seal.png'; // Replace 'https://example.com/logo.png' with the URL of your logo image

            // Email body with HTML markup
            // Email body with HTML markup
            $mail->Body = '
    <html>
    <head>
        <style>
            /* CSS styles for email body */
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
            }
            .card {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .logo {
                text-align: center;
                margin-bottom: 20px;
            }
            .logo img {
                max-width: 200px;
            }
            .message {
                font-size: 16px;
                line-height: 1.6;
                color: #333333;
            }
            .action-btn {
                display: inline-block;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: #ffffff;
                text-decoration: none;
                border-radius: 5px;
                margin-top: 20px;
            }
            .action-btn:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="' . $logoUrl . '" alt="Company Logo">
            </div>
            <div class="card">
                <div class="message">
                    <p>Your ' . $documentType . ' document is now ready for pickup. Please visit our office to collect it.</p>
                    <p>Additionally, please note that there is a payment of 100 pesos required for this service.</p>
                </div>
                <a href="#" class="action-btn">Collect Document</a>
            </div>
        </div>
    </body>
    </html>
';



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
    }
} else {
    // Error updating status
    $response = array(
        'title' => 'Error',
        'icon' => 'error',
        'text' => 'Error updating status in the database: ' . $conn->error
    );
}
$conn->close();

echo json_encode($response);
function insertLogEntry($conn, $trackingCode, $newStatus, $requestType, $email)
{
    if ($requestType == "clearance") {
        $type = "Barangay Clearance";
    } else if ($requestType == "permits") {
        $type = "Business Permit";
    } else if ($requestType == "certificate") {
        $type = "Indigency Certificates";
    } else if ($requestType == "residency") {
        $type = "Residency Certificate";
    }
    $adminName = $_SESSION['name'];
    $timestamp = date('Y-m-d H:i:s');
    $stmt = "INSERT INTO document_logs (tracking_code, new_status, request_type, admin_name, timestamp,email) VALUES (?, ?, ?, ?, ?, ?)";
    $insertResult = $conn->prepare($stmt);
    $insertResult->bind_param("ssssss", $trackingCode, $newStatus, $type, $adminName, $timestamp, $email);
    $insertResult->execute();
    $notificationMessage = "Your $type document request with tracking code $trackingCode is now $newStatus.";

    // Prepare the SQL statement to insert the notification
    $stmtNotif = "INSERT INTO notifications (user_email, message, created_at) VALUES (?, ?, ?)";
    $insertNotif = $conn->prepare($stmtNotif);
    $insertNotif->bind_param("sss", $email, $notificationMessage, $timestamp);
    $insertNotif->execute();
    $insertNotif->close(); // Close the prepared statement
}

