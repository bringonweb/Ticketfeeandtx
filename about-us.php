<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us </title>
       <!-- Latest Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="navbar-fix.css" />
    <link rel="stylesheet" href="about-styles.css" />
    <link rel="icon" type="image/x-icon" href="/assets/favicon.ico">
    
  </head>
  <body>
    <header>

    <?php include 'partials/navbar.php'; ?>
      
    </header>

    <div class="common-header">
        <h1>About Us</h1>
        <p>Your trusted travel partner for unforgettable journeys</p>
    </div>

    <!-- Enhanced About Section -->
    <section class="section__container about__container" id="about">
        <div class="about__image">
          <img src="assets/about.jpg" alt="about" />
          <div class="about__badge">
            <i class="ri-award-fill"></i>
            <span>Trusted Since 2020</span>
          </div>
        </div>
        <div class="about__content">
           <h2 class="section__header">About TicketFeeAndTx</h2>
           <p class="about__intro">We are an emerging travel company dedicated to making your travel dreams a reality with our 24/7 expert support and cutting-edge technology.</p>
           
            <p class="section__description">
              TicketFeeAndTx specializes in providing personalized travel solutions for domestic and international destinations. Our comprehensive services include flight bookings with multiple airline options, hotel reservations, honeymoon packages, corporate travel deals, and flexible booking options tailored to your schedule.
          </p>
          
            <p class="section__description">
              Our innovative approach and commitment to excellence have positioned us as a leader in the travel industry. We leverage advanced technology to offer you the best deals and seamless booking experience, saving you both time and money.
            </p>
            
            <div class="about__features">
              <div class="feature__item">
                <i class="ri-time-line"></i>
                <span>24/7 Customer Support</span>
              </div>
              <div class="feature__item">
                <i class="ri-shield-check-line"></i>
                <span>Secure Booking Platform</span>
              </div>
              <div class="feature__item">
                <i class="ri-price-tag-3-line"></i>
                <span>Best Price Guarantee</span>
              </div>
            </div>
        </div>
    </section>

    <!-- New Component 1: Our Values -->
    <section class="values__section">
      <div class="section__container">
        <div class="values__header">
          <h2 class="section__header">Our Core Values</h2>
          <p class="section__description">The principles that guide everything we do</p>
        </div>
        <div class="values__grid">
          <div class="value__card">
            <div class="value__icon">
              <i class="ri-customer-service-2-line"></i>
            </div>
            <h3>Customer First</h3>
            <p>Your satisfaction is our top priority. We go above and beyond to ensure every journey exceeds expectations.</p>
          </div>
          <div class="value__card">
            <div class="value__icon">
              <i class="ri-shield-check-line"></i>
            </div>
            <h3>Trust & Transparency</h3>
            <p>No hidden fees, no surprises. We believe in honest pricing and transparent communication.</p>
          </div>
          <div class="value__card">
            <div class="value__icon">
              <i class="ri-lightbulb-line"></i>
            </div>
            <h3>Innovation</h3>
            <p>We continuously evolve our technology and services to provide you with the best travel experience.</p>
          </div>
          <div class="value__card">
            <div class="value__icon">
              <i class="ri-global-line"></i>
            </div>
            <h3>Global Reach</h3>
            <p>Access to worldwide destinations with local expertise and international standards.</p>
          </div>
        </div>
      </div>
    </section>

 

      <?php include 'partials/footer.php'; ?>
  

      <script src="main.js"></script>
    </body>
</html>