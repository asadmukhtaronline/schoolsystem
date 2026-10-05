<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fee Submission Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        h1, h2, h3 {
            margin: 0;
            padding: 10px 0;
        }
        h1 {
            font-size: 22px;
            font-weight: bold;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .details, .payment-info, .footer {
            margin: 10px 0;
        }
        .details table, .payment-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .details table th, .details table td,
        .payment-info table th, .payment-info table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .details table th {
            background-color: #f2f2f2;
        }
        .payment-info table th {
            background-color: #f9f9f9;
        }
        .checkboxes {
            padding: 8px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            text-align: center;
        }
        .signature {
            text-align: right;
            padding-top: 20px;
        }
        .signature img {
            max-width: 120px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>The Educators</h2>
       <p>+92 326 43 00 993 | info@webeducatorz.org | www.webeducatorz.org</p>
    </div>

    <div class="details">
        <table>
            <tr>
                <th>Date:</th>
                <td>September 12, 2024</td>
                <th>Receipt#:</th>
                <td>0755-089A</td>
            </tr>
            <tr>
                <th>Student Name:</th>
                <td>John Doe S/O Mr. Doe</td>
                <th>Amount:</th>
                <td>$450.00</td>
            </tr>
            <tr>
                <th>Received From:</th>
                <td>Mr. Adam Smith</td>
                <th>Amount in words:</th>
                <td>Four hundred and fifty Dollars</td>
            </tr>
            <tr>
                <th>Due Payment:</th>
                <td>$0.00</td>
                <th>Issue Date:</th>
                <td>September 12, 2024</td>
            </tr>
        </table>
    </div>

    <div class="payment-info">
        <h3>For payment of (Purpose of payment):</h3>
        <div class="checkboxes">
            Paid by: 
            <label><input type="checkbox" checked> Cash</label>
            <label><input type="checkbox"> Card</label>
            <label><input type="checkbox"> Check</label>
            <label><input type="checkbox"> Money Order</label>
            <br>
            Duration of payment: From <input type="text" value="starting date" style="border: none; border-bottom: 1px solid #000;"> To <input type="text" value="end date" style="border: none; border-bottom: 1px solid #000;">
        </div>

        <table>
            <tr>
                <th>Tuition Fee:</th>
                <td>$300.00</td>
            </tr>
            <tr>
                <th>Transport:</th>
                <td>$100.00</td>
            </tr>
            <tr>
                <th>Other:</th>
                <td>$50.00</td>
            </tr>
            <tr>
                <th>Total:</th>
                <td>$450.00</td>
            </tr>
            <tr>
                <th>Balance Due:</th>
                <td>$0.00</td>
            </tr>
        </table>
    </div>

    <div class="signature">
        <p>Received by: [Name]</p>
        <p>Signature:</p>
        <img src="signature.png" alt="Signature">
    </div>

    <div class="footer">
        <p>Produced by www.example.com</p>
    </div>
</div>

</body>
</html>
