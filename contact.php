<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <!-- Latest Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="navbar-fix.css" />
    <link rel="stylesheet" href="contact-styles.css" />
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    <title>Contact Us</title>
  </head>
  <body>
    <header>

    <?php include 'partials/navbar.php'; ?>
      
    </header>

    <div class="common-header">
        <h1>Contact Us</h1>
        <p>Get in touch with our travel experts</p>
    </div>

    <?php
    session_start();
    if (isset($_SESSION['success_message'])) {
        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
        unset($_SESSION['error_message']);
    }
    if (isset($_SESSION['warning_message'])) {
        echo '<div class="alert alert-warning">' . htmlspecialchars($_SESSION['warning_message']) . '</div>';
        unset($_SESSION['warning_message']);
    }
    ?>

    <!-- Enhanced Contact Section -->
    <section class="contact-main-section">
      <div class="section__container">
        <div class="contact-grid">
          <!-- Left Side: Contact Information -->
          <div class="contact-info-content">
            <!-- <h2 class="section__header">Let's Start Planning</h2> -->
            <!-- <p class="contact__intro">
              Our travel experts are ready to help you create unforgettable memories. Reach out to us and let's make your dream trip a reality.
            </p> -->
            
            <div class="contact-details">
              <div class="contact-detail-item">
                <div class="detail-icon">
                  <i class="ri-phone-line"></i>
                </div>
                <div class="detail-content">
                  <h3>Call Us Anytime</h3>
                  <p>+1 (877) 413-0030</p>
                  <span>Available 24/7 for your convenience</span>
                </div>
              </div>
              
              <div class="contact-detail-item">
                <div class="detail-icon">
                  <i class="ri-mail-line"></i>
                </div>
                <div class="detail-content">
                  <h3>Email Support</h3>
                  <p>admin@ticketfeeandtx.com</p>
                  <span>We respond within 2-4 hours</span>
                </div>
              </div>
              
              <div class="contact-detail-item">
                <div class="detail-icon">
                  <i class="ri-customer-service-2-line"></i>
                </div>
                <div class="detail-content">
                  <h3>Expert Assistance</h3>
                  <p>Personalized Travel Planning</p>
                  <span>Tailored solutions for every traveler</span>
                </div>
              </div>
            </div>
            
            <div class="contact-features">
              <div class="feature-tag">
                <i class="ri-shield-check-line"></i>
                <span>Secure Booking</span>
              </div>
              <div class="feature-tag">
                <i class="ri-price-tag-3-line"></i>
                <span>Best Prices</span>
              </div>
              <div class="feature-tag">
                <i class="ri-time-line"></i>
                <span>Quick Response</span>
              </div>
            </div>
          </div>
          
          <!-- Right Side: Contact Form -->
          <div class="contact-form-content">
            <h3>Send Us a Message</h3>
            <form id="contact-form" action="submit.php" method="POST">
              <div class="form__group">
                  <input type="text" name="first_name" class="contact-input" placeholder="First Name" required />
                  <input type="text" name="last_name" class="contact-input" placeholder="Last Name" required />
              </div>
              <div class="form__group">
                  <input type="email" name="email" class="contact-input" placeholder="Email Address" required />
                  <input type="text" name="phone" class="contact-input" placeholder="Phone Number" required />
              </div>
              <textarea name="message" class="contact-textarea" cols="30" rows="5" placeholder="How can we help you?" required></textarea>
              
              <div class="form-footer-wrapper">
                  <button type="submit" class="contact-submit-btn" name="submit">
                      <i class="ri-send-plane-line"></i>
                      <span class="submit-text">Send Message</span>
                      <div class="spinner hidden"></div>
                  </button>
                  <div class="response-message"></div>
              </div>
          </form>
          </div>
        </div>
      </div>
    </section>

    <!-- New Component 1: Contact Info Cards -->
    <section class="contact-info-section">
      <div class="section__container">
        <div class="contact-info-grid">
          <div class="info-card">
            <div class="info-icon">
              <i class="ri-phone-line"></i>
            </div>
            <h3>Call Us</h3>
            <p>Speak with our travel experts</p>
            <a href="tel:+1877413-0030">+1 (877) 413-0030</a>
          </div>
          <div class="info-card">
            <div class="info-icon">
              <i class="ri-mail-line"></i>
            </div>
            <h3>Email Us</h3>
            <p>Send us your travel queries</p>
            <a href="mailto:admin@ticketfeeandtx.com">admin@ticketfeeandtx.com</a>
          </div>
          <div class="info-card">
            <div class="info-icon">
              <i class="ri-time-line"></i>
            </div>
            <h3>24/7 Support</h3>
            <p>We're here whenever you need us</p>
            <span>Round the clock assistance</span>
          </div>
        </div>
      </div>
    </section>





     <?php include 'partials/footer.php'; ?>

      <script src="main.js"></script>
      <script>
        // Contact form handling
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('.contact-submit-btn');
            const submitText = document.querySelector('.submit-text');
            const spinner = document.querySelector('.spinner');
            
            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = 'Sending...';
            spinner.classList.remove('hidden');
        });
      </script>

    </body>
</html>
  