<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sent Successfully</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .message-container {
            max-width: 500px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .message-container h1 {
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .message-container p {
            color: #333333;
            font-size: 18px;
            margin: 10px 0;
        }
        .button-container {
            margin-top: 15px;
        }
        .button-container a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="message-container">
    <h1>Email Sent Successfully!</h1>
    <p>Thank you! The recommendation email has been sent successfully to the recipient.</p>
    <div class="button-container">
        <a href="../form.php">Go to Form</a>
        <a href= "../index.php">Home</a>
    </div>
</div>

</body>
</html>
