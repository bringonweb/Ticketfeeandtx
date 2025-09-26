<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <title>Server Error - </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .error-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            max-width: 600px;
            text-align: center;
        }

        .error-icon {
            font-size: 4rem;
            color: #dc3545;
            margin-bottom: 20px;
        }

        h1 {
            color: #dc3545;
            margin-bottom: 15px;
            font-size: 2rem;
        }

        p {
            color: #6c757d;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .contact-info {
            background: #fff3cd;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .contact-info a {
            color: #856404;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-return {
            background: #007bff;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            transition: background 0.3s;
        }

        .btn-return:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">⚠️</div>
        <h1>Server Error</h1>
        <p>We're experiencing technical difficulties. Please try again later.</p>
        
        <div class="contact-info">
            <p>Need immediate assistance? Contact us:</p>
            <p>📞 <a href="tel:+1 (833) 666-3503"> +1 (833) 666-3503</a></p>
            <p>📧 <a href="mailto: info@skylinetravelsllc.com"> info@skylinetravelsllc.com</a></p>
        </div>

        <a href="index.php" class="btn-return">
            ← Return to Booking Page
        </a>
    </div>
</body>
</html>