<?php
require_once __DIR__. '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function sendRecommendationEmail($name, $skill, $email, $phone){
    $emailHTML = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #4CAF50;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            color: #ffffff;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            line-height: 1.6;
        }
        .content h2 {
            color: #4CAF50;
            font-size: 20px;
        }
        .content p {
            margin: 10px 0;
        }
        .content .highlight {
            font-weight: bold;
            color: #4CAF50;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #777777;
            border-top: 1px solid #dddddd;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Event Planning Committee Recommendation</h1>
        </div>
        <div class="content">
            <h2>Hello, $name!</h2>
            <p>We are excited to inform you that you have been recommended to join our <span class="highlight">Event Planning Committee</span>!</p>
            <p>We believe that your skills in <span class="highlight">$skill</span> make you an excellent candidate for our team.</p>
            <p>We would love to discuss this opportunity with you in more detail. If you're interested, please reach out at your earliest convenience.</p>
            <p>For any inquiries, feel free to contact us by replying to this email or by phone: <span class="highlight">$phone</span>.</p>
            <p>Looking forward to hearing from you soon!</p>
            <p>Best regards,</p>
            <p>The Event Planning Team</p>
        </div>
        <div class="footer">
            © 2023 Event Planning Committee. All rights reserved.
        </div>
    </div>
</body>
</html>
HTML;

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->SMTPAuth = true;

    // setup configuration
    echo ($_ENV["SMTP_HOST"]);
    $mail->Host = $_ENV["SMTP_HOST"];
    $mail->SMTPSecure = $_ENV["SMTP_ENCRYPTION"];
    $mail->Port = $_ENV["SMTP_PORT"];

    // SMTP username and password
    $mail->Username = $_ENV["SMTP_USERNAME"];
    $mail->Password = $_ENV["SMTP_PASSWORD"];

    $mail->addAddress($email, $name);
    $mail->setFrom($_ENV["SMTP_FROM"], $_ENV["SMTP_FROM_NAME"]);

    // EMAIL CONTENT
    $mail->Subject = "$name, You've been recommended as an amazing creator";
    $mail->Body = $emailHTML;

    if($mail->send()) {
        header("Location: success.php");
        exit();
    } else {
        echo "Unable to send email.";
    }
    

    
}
    
?>
