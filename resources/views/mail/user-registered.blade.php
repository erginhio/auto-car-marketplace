<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to AutoMarket</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
            color: #333;
        }

        .email-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .email-container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            max-width: 150px;
            height: auto;
            border-radius: 16px; /* ✅ smooth rounded corners */
            padding: 6px;        /* ✅ spacing inside */
            background-color: #ffffff; /* ✅ clean badge look */
        }

        .welcome-header {
            color: #2c3e50;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .welcome-message {
            color: #555;
            font-size: 16px;
            text-align: center;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .verification-button {
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
            padding: 15px 25px;
            background-color: #a256f2;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .footer {
            text-align: center;
            color: #777;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .social-links {
            margin-top: 20px;
            text-align: center;
        }

        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #3498db;
            text-decoration: none;
        }

        @media only screen and (max-width: 480px) {
            .email-container {
                padding: 20px;
            }

            .welcome-header {
                font-size: 24px;
            }

            .welcome-message {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="email-wrapper">
    <div class="email-container">

        <div class="logo">
            <img
                src="https://raw.githubusercontent.com/Seyla123/Laravel-cars-selling-website/refs/heads/develop/public/assets/images/logo.png"
                alt="AutoMarket Logo"
            >
        </div>

        <h1 class="welcome-header">Welcome to SeylaWheels! 🚗</h1>

        <p class="welcome-message">
            Thank you for joining SeylaWheels! We're excited to have you as part of our community.
            To get started and ensure the security of your account, please verify your email address
            by clicking the button below.
        </p>

        <a href="#" class="verification-button">Verify Email Address</a>

        <p class="welcome-message">
            If you didn't receive the verification email, please check your spam folder or click below to request a new one.
            <br><br>
            <a href="#" style="color: #3498db; text-decoration: underline;">Resend Verification Email</a>
        </p>

        <div class="footer">
            <p>© 2025 SeylaWheels. All rights reserved.</p>
            <p>If you didn't create this account, please ignore this email.</p>

            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>

    </div>
</div>
</body>
</html>
