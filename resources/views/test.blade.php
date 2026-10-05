<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f8fa;
        }
    

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e1e4e8;
        }

        .header {
            padding: 10px; /* Reduced padding */
            background-color: #f0f4f8; /* Light background for the logo area */
            text-align: center;
            border-bottom: 1px solid #e1e4e8;
        }

        .header img {
            max-width: 120px; /* Reduced max-width */
            height: auto; /* Maintain aspect ratio */
        }

        .content {
            padding: 20px;
            font-size: 16px;
            color: #24292e;
            line-height: 1.6;
        }

        .content p {
            margin: 0 0 15px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 16px;
            color: #ffffff;
            background-color: #28a745;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
        }

        .footer {
            padding: 10px; /* Reduced padding */
            background-color: #f6f8fa;
            text-align: center;
            font-size: 12px; /* Smaller font size */
            color: #586069;
            border-top: 1px solid #e1e4e8;
        }

        .footer a {
            color: #0366d6;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <!-- Bracket Template Logo -->
            <img src="https://media.licdn.com/dms/image/D4D0BAQEXWkksDlrkpQ/company-logo_200_200/0/1694438809223?e=2147483647&v=beta&t=8ESXIXBUmHsjODNP-cv66k6Ut2D2IOOEoBKSi2TgJbE" alt="Bracket Template Logo">
            {{-- <img src="/logo.jfif" alt="Bracket Template Logo"> --}}
        </div>

        <div class="content">
            <!-- Email content -->
            <h1 style="font-size: 20px; color: #24292e;">You're Invited!</h1>
            <p>Hello [Recipient's Name],</p>
            <p>You have been invited to join the project <strong>[Project Name]</strong> on our platform.</p>
            <p>Please click the button below to accept the invitation and get started.</p>
            <a href="[Invitation Link]" class="button">Accept Invitation</a>
            <p>If you didn't expect this invitation, you can safely ignore this email.</p>
            <p>Best regards,<br>Your Company</p>
        </div>

        <div class="footer">
            <!-- Footer content -->
            <p>&copy; 2024 Your Company. All rights reserved.</p>
            <p><a href="https://www.yourwebsite.com">Visit our website</a> | <a href="[Unsubscribe Link]">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>
