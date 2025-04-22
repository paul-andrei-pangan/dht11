<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Import PHPMailer classes (make sure the path is correct!)
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

// Create instance
$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gas = $_POST['gas'] ?? 'N/A';
    $temperature = $_POST['temperature'] ?? 'N/A';
    $humidity = $_POST['humidity'] ?? 'N/A';

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'paulpogi828@gmail.com'; // Your Gmail
        $mail->Password = 'oulytkbxxxiubdlq';      // App password, no spaces!
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // From and To
        $mail->setFrom('paulpogi828@gmail.com', 'Gas Alert System');
        $mail->addAddress('juicecalamansi1@gmail.com'); // Recipient email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = '🚨 GAS DETECTED!';
        $mail->Body    = "
            <h3>🔥 Gas Alert Detected!</h3>
            <p><strong>Gas Value:</strong> $gas</p>
            <p><strong>Temperature:</strong> $temperature &deg;C</p>
            <p><strong>Humidity:</strong> $humidity%</p>
        ";

        $mail->send();
        echo 'Email sent';
    } catch (Exception $e) {
        echo 'Email failed: ' . $mail->ErrorInfo;
    }
} else {
    echo "No data received";
}
?>
