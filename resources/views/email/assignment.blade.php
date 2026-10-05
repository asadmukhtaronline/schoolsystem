<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Assignment Created</title>
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
            padding: 10px;
            background-color: #f0f4f8;
            text-align: center;
            border-bottom: 1px solid #e1e4e8;
        }

        .header img {
            max-width: 120px;
            height: auto;
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

        .content ul {
            padding-left: 20px;
        }

        .content ul li {
            margin-bottom: 10px;
        }

        .button-container {
            text-align: center;
        }

        .footer {
            padding: 10px;
            background-color: #f6f8fa;
            text-align: center;
            font-size: 12px;
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
            <img src="https://media.licdn.com/dms/image/D4D0BAQEXWkksDlrkpQ/company-logo_200_200/0/1694438809223?e=2147483647&v=beta&t=8ESXIXBUmHsjODNP-cv66k6Ut2D2IOOEoBKSi2TgJbE" alt="School Management System Logo">
        </div>

        <div class="content">
            <h1 style="font-size: 20px; color: #24292e;">New Assignment Created by admin</h1>
            <p>Dear {{ ucfirst($teacher) }},</p>
            <p>An assignment has been created with the following details:</p>
            <ul>
                <li><strong>Class:</strong> {{ ucfirst($className) }}</li>
                <li><strong>Section:</strong> {{ ucfirst($sectionName) }}</li>
                <li><strong>Assignment Title:</strong> {{ ucfirst($assignmentTitle) }}</li>
                <li><strong>Due Date:</strong> {{ $dueDate }}</li>
                <li><strong>Created By:</strong> {{ ucfirst($creatorName) }}</li>
            </ul>
            <p>Thank you,</p>
            <p>Your School Management System</p>
        </div>

        <div class="footer">
            <p>&copy; 2024 School Management System. All rights reserved.</p>
            <p><a href="http://127.0.0.1:8000/">Visit our website</a> | <a href="http://127.0.0.1:8000/">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>
