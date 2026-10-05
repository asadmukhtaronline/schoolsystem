
        
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Fee Payment Confirmation</title>
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
                    <img src="https://media.licdn.com/dms/image/D4D0BAQEXWkksDlrkpQ/company-logo_200_200/0/1694438809223?e=2147483647&v=beta&t=8ESXIXBUmHsjODNP-cv66k6Ut2D2IOOEoBKSi2TgJbE" alt="Web Educatorz Logo">
                </div>
        
                <div class="content">
                    <h1 style="font-size: 20px; color: #24292e;">Fee Payment Confirmation</h1>
                    <p>Dear Parent/Guardian,</p>
                    <p>We have received the payment for the following details:</p>
                    <ul>
                        <li>Student Name: {{ $studentName }}</li>
                        <li>Class: {{ $classTitle }}</li>
                        <li>Section: {{ $sectionTitle }}</li>
                        <li>Fee Amount: {{ $fee }}</li>
                        <li>Fee Date: {{ $feeDate }}</li>
                    </ul>
                    <p>Thank you for your prompt payment.</p>
                    <p>Best regards,<br><strong>Web Educatorz</strong></p>
                </div>
        
                <div class="footer">
                    <p>&copy; 2024 Web Educatorz. All rights reserved.</p>
                    <p><a href="http://127.0.0.1:8000/">Visit our website</a> | <a href="http://127.0.0.1:8000">Unsubscribe</a></p>
                </div>
            </div>
        </body>
        
        </html>
        
           