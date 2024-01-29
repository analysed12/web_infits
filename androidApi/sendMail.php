<?php

require_once "connect.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$otp = $_POST['otp'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit();
}

// Sanitize OTP input to allow only digits
$otp = filter_var($otp, FILTER_SANITIZE_NUMBER_INT);

// Check if OTP is a valid 4-digit number
if (strlen($otp) !== 4 || !is_numeric($otp)) {
    echo "Invalid OTP format.";
    exit();
}

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM client WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

if ($stmt->error) {
    // If there's an error in the query, display the error for debugging
    echo "Database query error: " . $stmt->error;
    exit(); // Exit the script to prevent further execution
}

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
  

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com'; // Replace with your SMTP server address
    $mail->Port = 587; // Replace with the appropriate SMTP port (e.g., 587 for TLS, 465 for SSL)
    $mail->SMTPAuth = true;
    $mail->Username = 'support@infits.in'; // Replace with your SMTP username
    $mail->Password = 'Infitssupport@123'; // Replace with your SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->setFrom("support@infits.in", "Infits Support");
    $mail->addAddress($email);

    $mail->Subject = "Password Reset";

    // Styling the email content with inline CSS
    $mail->Body = '
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Reset</title>
        <style>
            p {
                font-family: Arial, sans-serif;
            }
            .otp-box {
                border: 2px solid purple;
                padding: 10px;
                color: purple;
                display: inline-block;
                font-weight: bold;
                border-radius: 10px;
            }
            .image-container {
                text-align: center;
            }
            .image-container img {
                display: block;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; color: #333;">
            <img src="https://infits.in/androidApi/upload/infits_circle.png" alt="Infits" style="width: 40px;">
            <hr border: 1px solid #ddd;">
            <h2 style="color: #007bff;">Password Reset</h2>
            <p>Hello '.$name.',</p>
            <p>We received a request to reset your Infits password.</p>
            <p>Your One-Time Password (OTP) to reset your password is: <span class="otp-box">' . $otp . '</span></p>
            <p style="font-size: 12px; color: #888;">The OTP is valid for a limited time only for security purposes. Do not share this code with anyone.</p>
            <p>If you didn\'t initiate this request, please <span style="color: #007bff;">Let us Know.</span></p>
            <p>Regards,<br>Team <span style="color: purple;">Infits</span></p>
            <p style="font-size: 12px; color: #888;">This is an automated email. Please do not reply to this message.</p>
            <hr style="margin-top: 20px; margin-bottom: 20px; border: 1px solid #ddd;">
            <div class="image-container">
                <img src="https://infits.in/androidApi/upload/Infits_bk_img.png" alt="Infits" style="width: 100px; margin-top: 20px;">
            </div>
        </div>
    </body>
    </html>';

    // Add an alternative plain text version for email clients that do not support HTML
    $mail->AltBody = "Hello,Your One-Time Password (OTP) to reset your password is: . $otp . 
                    The OTP is valid for a limited time only for security purposes.Do not share this code with anyone.
                    If you didn\'t initiate this request, please Let us Know.
                    Regards,Team Infits";

    if ($mail->send()) {
        echo "Email sent successfully.";
    } else {
        echo "Failed to send the email. Error: " . $mail->ErrorInfo;
    }
} else {
    echo "Email is not registered.";
}

$stmt->close();
$conn->close();
?>
