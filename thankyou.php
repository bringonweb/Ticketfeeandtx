<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - TicketFeeAndTx.com</title>
    <link rel="stylesheet" href="premium-styles.css">
    <link rel="stylesheet" href="navbar-fix.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/assets/favicon.png">
</head>
<body>
    <?php include 'partials/navbar.php'; ?>
    
    <section class="thankyou-section">
        <div class="container">
            <div class="thankyou-content">
                <div class="success-icon">
                    <i class="ri-check-double-line"></i>
                </div>
                
                <h1 class="thankyou-title">Thank You for Your Request!</h1>
                
                <p class="thankyou-message">
                    We've received your flight search request and our travel experts are already working on finding you the best deals.
                </p>
                
                <div class="next-steps">
                    <h3>What happens next?</h3>
                    <div class="steps-grid">
                        <div class="step-item">
                            <div class="step-icon">
                                <i class="ri-search-line"></i>
                            </div>
                            <div class="step-content">
                                <h4>We Search</h4>
                                <p>Our experts search through 500+ airlines for the best deals</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-icon">
                                <i class="ri-phone-line"></i>
                            </div>
                            <div class="step-content">
                                <h4>We Contact You</h4>
                                <p>We'll call or email you within 2 hours with personalized options</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-icon">
                                <i class="ri-plane-line"></i>
                            </div>
                            <div class="step-content">
                                <h4>You Fly</h4>
                                <p>Book your preferred option and enjoy your journey</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="contact-info">
                    <p>Need immediate assistance? Our 24/7 support team is here to help:</p>
                    <div class="contact-buttons">
                        <a href="tel:+1877413-0030" class="btn-primary">
                            <i class="ri-phone-line"></i>
                            Call Now: +1 (877) 413-0030
                        </a>
                        <a href="mailto:admin@ticketfeeandtx.com" class="btn-outline">
                            <i class="ri-mail-line"></i>
                            Email Us
                        </a>
                    </div>
                </div>
                
                <div class="return-home">
                    <a href="index.php" class="home-btn">
                        <i class="ri-home-line"></i>
                        Return to Homepage
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <?php include 'partials/footer.php'; ?>
    
    <style>
        .thankyou-section {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            min-height: 80vh;
        }
        
        .thankyou-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            background: white;
            padding: 60px 40px;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 3rem;
            color: white;
            animation: successPulse 2s infinite;
        }
        
        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .thankyou-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--gray-900);
            margin-bottom: 20px;
        }
        
        .thankyou-message {
            font-size: 1.125rem;
            color: var(--gray-600);
            line-height: 1.7;
            margin-bottom: 40px;
        }
        
        .next-steps {
            margin: 50px 0;
            text-align: left;
        }
        
        .next-steps h3 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 30px;
        }
        
        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }
        
        .step-item {
            text-align: center;
            padding: 20px;
        }
        
        .step-icon {
            width: 60px;
            height: 60px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
            color: white;
        }
        
        .step-content h4 {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 8px;
        }
        
        .step-content p {
            color: var(--gray-600);
            font-size: 0.875rem;
            line-height: 1.5;
        }
        
        .contact-info {
            background: var(--gray-50);
            padding: 30px;
            border-radius: 16px;
            margin: 40px 0;
        }
        
        .contact-info p {
            color: var(--gray-700);
            margin-bottom: 20px;
            font-weight: 500;
        }
        
        .contact-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-primary, .btn-outline {
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: white;
        }
        
        .btn-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }
        
        .home-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-600);
            text-decoration: none;
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .home-btn:hover {
            background: var(--gray-100);
            color: var(--gray-900);
        }
        
        @media (max-width: 768px) {
            .thankyou-content {
                padding: 40px 20px;
                margin: 20px;
            }
            
            .thankyou-title {
                font-size: 2rem;
            }
            
            .steps-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            
            .contact-buttons {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</body>
</html>