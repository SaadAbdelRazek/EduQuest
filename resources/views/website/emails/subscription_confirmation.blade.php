<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Confirmation</title>
    <style>
        .email-container {
            width: 100%;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .message {
            font-size: 18px;
            color: #333;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
<div class="email-container">
    <img src="{{ $logo_url }}" alt="Company Logo" class="logo">
    <h1>{{ $title }}</h1>
    <p class="message">{{ $body }}</p>
    <p class="footer">Thank you for being part of our community!</p>
</div>
</body>
</html>
