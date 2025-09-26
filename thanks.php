<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thanks for contacting</title>
    <!-- Latest Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .thank-you-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 600px;
            width: 100%;
            transform: translateY(0);
            animation: slideUp 0.8s ease;
        }

        .checkmark-circle {
            width: 100px;
            height: 100px;
            background: #4CAF50;
            border-radius: 50%;
            margin: 0 auto 20px;
            position: relative;
            animation: scaleUp 0.5s ease;
        }

        .checkmark {
            color: white;
            font-size: 50px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            color: #2d3748;
            margin-bottom: 15px;
            font-size: 2.5rem;
        }

        p {
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .home-button {
            background: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }

        .home-button:hover {
            background: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4);
        }

        .submitted-details {
            background: #f7fafc;
            padding: 20px;
            border-radius: 10px;
            margin: 25px 0;
            text-align: left;
        }

        .submitted-details p {
            margin: 10px 0;
            color: #4a5568;
        }

        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes scaleUp {
            from {
                transform: scale(0);
            }
            to {
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            .thank-you-container {
                padding: 30px;
            }

            h1 {
                font-size: 2rem;
            }

            .checkmark-circle {
                width: 80px;
                height: 80px;
            }

            .checkmark {
                font-size: 40px;
            }
        }

        @media (max-width: 480px) {
            .thank-you-container {
                padding: 20px;
            }

            h1 {
                font-size: 1.75rem;
            }

            p {
                font-size: 0.9rem;
            }

            .home-button {
                padding: 10px 25px;
                font-size: 1rem;
            }
        }
    </style>
  </head>
  <body>
    <header>
        
    
      
    </header>
    
    <div class="thank-you-container">
        <div class="checkmark-circle">
            <i class="fas fa-check checkmark"></i>
        </div>
        <h1>Thank You!</h1>
        <p>Your message has been successfully received. We appreciate you reaching out to us and will respond to your inquiry within 24-48 hours.</p>
        

        <a href="index.php" class="home-button">Return to Homepage</a>
    </div>




        

    </body>
</html>
  