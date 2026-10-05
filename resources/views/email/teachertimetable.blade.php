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
            <img src="https://media.licdn.com/dms/image/D4D0BAQEXWkksDlrkpQ/company-logo_200_200/0/1694438809223?e=2147483647&v=beta&t=8ESXIXBUmHsjODNP-cv66k6Ut2D2IOOEoBKSi2TgJbE" alt="Bracket Template Logo">
        </div>

        <div class="content">
            <h1 style="font-size: 20px; color: #24292e;">You are Welcome!</h1>
            <p>Hello {{ ucfirst($teacher->name) }},</p>
            <p>You have been assigned to the following sections in the class <strong>"{{ ucfirst($class->title) }}"</strong>:</p>
            
            <!-- Correctly display each section -->
            <ul>
                @foreach ($sections as $section)
                    <li><strong>{{ ucfirst($section->title) }}</strong></li>
                @endforeach
            </ul>
            
            <!-- Display the timetable details -->
            <p>The timetable assigned to you:</p>
            <ul>
                <p>You have been assigned section  in the class <strong>"{{ ucfirst($class->title) }}"</strong> on </p><br>
              <li><strong>{{ ucfirst($day->title) }}</strong>:</li>
                <li><strong>Time Slot:</strong> {{ $timetable->timeslot->start_time }} - {{ $timetable->timeslot->end_time }}</li>
            </ul>
            
            <!-- Center the button -->
            <p>Please click the button below to login to Web Educatorz:</p>
            <div class="button-container">
                <a href="http://127.0.0.1:8000/" class="button">Web Educatorz</a>
            </div>
            
            <p>If you didn't expect this invitation, you can safely ignore this email.</p>
            <p>Best regards,<br><strong>Web Educatorz</strong></p>
        </div>

        <div class="footer">
            <p>&copy; 2024 Web Educatorz. All rights reserved.</p>
            <p><a href="http://127.0.0.1:8000/">Visit our website</a> | <a href="http://127.0.0.1:8000">Unsubscribe</a></p>
        </div>
    </div>
</body>

</html>
