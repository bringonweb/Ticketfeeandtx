<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketFeeAndTx.com - Premium Flight Booking | Best Deals & 24/7 Support</title>
    <meta name="description" content="Book cheap flights with TicketFeeAndTx. Premium service, transparent pricing, 24/7 support. Find the best deals on domestic and international flights.">
    
    <link rel="stylesheet" href="premium-styles.css">
    <link rel="stylesheet" href="testimonials-fix.css">
    <link rel="stylesheet" href="navbar-fix.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/assets/favicon.png">
</head>
<body class="index-page">
    <!-- Navigation -->
    <?php include 'partials/navbar.php'; ?>

    <!-- Hero Section with Slider -->
    <section class="hero-slider">
        <div class="hero-slide active" style="background-image: url('assets/slider1 (1).jpg')"></div>
        <div class="hero-slide" style="background-image: url('assets/slider1 (2).jpg')"></div>
        <div class="hero-slide" style="background-image: url('assets/slider1 (3).jpg')"></div>
        <div class="hero-slide" style="background-image: url('assets/slider1 (4).jpg')"></div>
        <div class="hero-slide" style="background-image: url('assets/slider1 (5).jpg')"></div>
        
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">Find Your Perfect Flight</h1>
                <p class="hero-subtitle">Book with confidence. Travel with peace of mind.</p>
            </div>
            
            <!-- Booking Form -->
            <div class="booking-card" id="booking-form">
                <form id="flight-search-form" class="booking-form">
                    <div class="form-group">
                        <label for="location" class="form-label">From *</label>
                        <input type="text" name="location" id="location" class="form-input" placeholder="City or Airport" required>
                        <div id="location-suggestions" class="suggestions"></div>
                    </div>

                    <div class="form-group">
                        <label for="start" class="form-label">To *</label>
                        <input type="text" name="start" id="start" class="form-input" placeholder="City or Airport" required>
                        <div id="start-suggestions" class="suggestions"></div>
                    </div>

                    <div class="form-group">
                        <label for="departure" class="form-label">Departure *</label>
                        <input type="date" name="departure_date" id="departure" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <label for="return" class="form-label">Return</label>
                        <input type="date" name="return_date" id="return" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="travellers" class="form-label">Travelers *</label>
                        <select name="travellers" id="travellers" class="form-input" required>
                            <option value="1">1 Traveler</option>
                            <option value="2">2 Travelers</option>
                            <option value="3">3 Travelers</option>
                            <option value="4">4 Travelers</option>
                            <option value="5">5 Travelers</option>
                            <option value="6">6 Travelers</option>
                            <option value="7">7 Travelers</option>
                            <option value="8">8 Travelers</option>
                            <option value="9">9 Travelers</option>
                        </select>
                    </div>

                    <button type="button" class="search-btn" onclick="openContactPopup()">
                        <i class="ri-search-line"></i>
                        Search Flights
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Slider Indicators -->
        <div class="slider-indicators">
            <button class="indicator active" onclick="goToSlide(0)"></button>
            <button class="indicator" onclick="goToSlide(1)"></button>
            <button class="indicator" onclick="goToSlide(2)"></button>
            <button class="indicator" onclick="goToSlide(3)"></button>
            <button class="indicator" onclick="goToSlide(4)"></button>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust-section">
        <div class="container">
            <!-- <div class="section-header">
                <h2 class="section-title">Why Choose TicketFeeAndTx?</h2>
                <p class="section-subtitle">Experience the difference with our premium travel services</p>
            </div> -->
            <div class="trust-grid">
                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="ri-time-line"></i>
                    </div>
                    <h3 class="trust-title">24×7 Support</h3>
                    <p class="trust-desc">Round-the-clock customer service with experienced travel agents</p>
                </div>
                
                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="ri-shield-check-line"></i>
                    </div>
                    <h3 class="trust-title">Transparent Pricing</h3>
                    <p class="trust-desc">No hidden fees or surprise charges. What you see is what you pay</p>
                </div>
                
                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="ri-exchange-line"></i>
                    </div>
                    <h3 class="trust-title">Flexible Booking</h3>
                    <p class="trust-desc">Easy changes and cancellations with flexible booking options</p>
                </div>
                
                <div class="trust-card">
                    <div class="trust-icon">
                        <i class="ri-secure-payment-line"></i>
                    </div>
                    <h3 class="trust-title">Secure Payments</h3>
                    <p class="trust-desc">SSL encrypted transactions with multiple payment options</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Routes -->
    <section class="routes-section" id="deals">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Popular Routes</h2>
                <p class="section-subtitle">Discover amazing deals on our most popular flight destinations</p>
            </div>

            <div class="routes-grid">
                <div class="route-card">
                    <img src="assets/destination-1.jpg.jpg" alt="New York to Los Angeles" class="route-image">
                    <div class="route-content">
                        <h3 class="route-title">New York → Los Angeles</h3>
                        <div class="route-price">$299 <span class="price-label">per person</span></div>
                        <button class="route-btn" onclick="fillForm('New York', 'Los Angeles')">Book Now</button>
                    </div>
                </div>

                <div class="route-card">
                    <img src="assets/destination-2.jpg.jpg" alt="Miami to Las Vegas" class="route-image">
                    <div class="route-content">
                        <h3 class="route-title">Miami → Las Vegas</h3>
                        <div class="route-price">$249 <span class="price-label">per person</span></div>
                        <button class="route-btn" onclick="fillForm('Miami', 'Las Vegas')">Book Now</button>
                    </div>
                </div>

                <div class="route-card">
                    <img src="assets/destination-3.jpg.jpg" alt="Chicago to San Francisco" class="route-image">
                    <div class="route-content">
                        <h3 class="route-title">Chicago → San Francisco</h3>
                        <div class="route-price">$329 <span class="price-label">per person</span></div>
                        <button class="route-btn" onclick="fillForm('Chicago', 'San Francisco')">Book Now</button>
                    </div>
                </div>

                <div class="route-card">
                    <img src="assets/destination-4.jpg.jpg" alt="Boston to Seattle" class="route-image">
                    <div class="route-content">
                        <h3 class="route-title">Boston → Seattle</h3>
                        <div class="route-price">$279 <span class="price-label">per person</span></div>
                        <button class="route-btn" onclick="fillForm('Boston', 'Seattle')">Book Now</button>
                    </div>
                </div>

                <div class="route-card">
                    <img src="assets/destination-5.jpg.jpg" alt="Dallas to Denver" class="route-image">
                    <div class="route-content">
                        <h3 class="route-title">Dallas → Denver</h3>
                        <div class="route-price">$199 <span class="price-label">per person</span></div>
                        <button class="route-btn" onclick="fillForm('Dallas', 'Denver')">Book Now</button>
                    </div>
                </div>

                <div class="route-card">
                    <img src="assets/destination-6.jpg.jpg" alt="Atlanta to Phoenix" class="route-image">
                    <div class="route-content">
                        <h3 class="route-title">Atlanta → Phoenix</h3>
                        <div class="route-price">$259 <span class="price-label">per person</span></div>
                        <button class="route-btn" onclick="fillForm('Atlanta', 'Phoenix')">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-section">
        <div class="container">
            <div class="why-choose-wrapper">
                <div class="why-choose-left">
                    <!-- <div class="section-badge">
                        <i class="ri-star-fill"></i>
                        <span>Trusted by Millions</span>
                    </div> -->
                    <h2 class="why-choose-title">Why Millions Choose Us</h2>
                    <p class="why-choose-subtitle">Experience the difference with our award-winning travel services and join millions of satisfied customers worldwide.</p>
                    
                    <div class="features-grid">
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <div class="feature-icon">
                                    <i class="ri-award-fill"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h4>Award-Winning Service</h4>
                                <p>Recognized for excellence in customer service and satisfaction</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <div class="feature-icon">
                                    <i class="ri-global-fill"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h4>Global Network</h4>
                                <p>Access to 500+ airlines and millions of flight combinations worldwide</p>
                            </div>
                        </div>
                        
                        <div class="feature-card">
                            <div class="feature-icon-wrapper">
                                <div class="feature-icon">
                                    <i class="ri-price-tag-3-fill"></i>
                                </div>
                            </div>
                            <div class="feature-content">
                                <h4>Best Price Guarantee</h4>
                                <p>Find a lower price? We'll match it and give you an extra discount</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="why-choose-right">
                    <div class="image-stats-wrapper">
                        <div class="hero-image">
                            <img src="assets/about.jpg" alt="Travel Experience" class="main-image">
                            <div class="image-overlay"></div>
                        </div>
                        
                        <div class="stats-floating">
                            <div class="stat-item">
                                <div class="stat-number">2M+</div>
                                <div class="stat-text">
                                    <span class="stat-label">HAPPY</span>
                                    <span class="stat-desc">CUSTOMERS</span>
                                </div>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-number">500+</div>
                                <div class="stat-text">
                                    <span class="stat-label">AIRLINES</span>
                                    <span class="stat-desc">PARTNERS</span>
                                </div>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-number">24/7</div>
                                <div class="stat-text">
                                    <span class="stat-label">CUSTOMER</span>
                                    <span class="stat-desc">SUPPORT</span>
                                </div>
                            </div>
                            
                            <div class="stat-item">
                                <div class="stat-number">99.9%</div>
                                <div class="stat-text">
                                    <span class="stat-label">UPTIME</span>
                                    <span class="stat-desc">GUARANTEE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Support Section -->
    <section class="support-section" id="support">
        <div class="container">
            <div class="support-content">
                <h2 class="section-title">Trust & Support</h2>
                <p class="support-text">
                    As an independent online travel agency (OTA), we're committed to providing exceptional service and transparent pricing. Our experienced travel agents work around the clock to ensure you get the best deals and support throughout your journey.
                </p>
                <div class="support-buttons">
                    <a href="tel:+1877413-0030" class="btn-primary">
                        <i class="ri-phone-line"></i>
                        Call 24/7 Support
                    </a>
                    <a href="admin@ticketfeeandtx.com" class="btn-outline">
                        <i class="ri-mail-line"></i>
                        Email Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section" id="faq">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Find answers to common questions about booking, changes, and support</p>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>How do I book a flight through your website?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Simply use our search form above to enter your departure and destination cities, select your travel dates, and choose the number of travelers. Click 'Search Flights' and we'll show you available options with competitive prices.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>Can I change or cancel my booking?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Yes, you can modify or cancel your booking depending on the airline's policy and fare type. Contact our 24/7 customer support team for assistance with changes. Some changes may incur fees as per airline policies.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>What is your refund policy?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Refund eligibility depends on the airline's fare rules and the type of ticket purchased. We offer full support in processing refunds according to airline policies. Contact us within 24 hours of booking for the best refund options.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>How do cancellations work?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Cancellations can be processed through our customer service team. The cancellation fees and refund amount depend on the airline's policy, fare type, and timing of cancellation.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>What are the baggage allowances?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Baggage allowances vary by airline and fare type. Most economy tickets include one carry-on bag, while checked baggage may incur additional fees. We'll provide detailed information during booking.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFAQ(this)">
                        <span>How can I contact customer support?</span>
                        <i class="ri-arrow-down-s-line faq-icon"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Our customer support team is available 24/7. You can reach us by phone at +1 (833) 666-3503 or email us at info@ticketfeeandtx.com. We're here to help with all your travel needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">What Our Customers Say</h2>
                <p class="section-subtitle">Real experiences from real travelers</p>
            </div>
            
            <div class="testimonials-slider">
                <div class="testimonials-wrapper">
                    <div class="testimonial-slide active">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="testimonial-text">"Excellent service! Found the best deals for my family vacation. The customer support was amazing and helped us through every step."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <span>SJ</span>
                                </div>
                                <div class="author-info">
                                    <h4>Sarah Johnson</h4>
                                    <span>Family Traveler</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="testimonial-text">"Professional and reliable. I've been using TicketFeeAndTx for all my business trips. Never had any issues and always get great prices."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <span>MC</span>
                                </div>
                                <div class="author-info">
                                    <h4>Michael Chen</h4>
                                    <span>Business Traveler</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="testimonial-text">"Saved me hundreds on my honeymoon flights! The booking process was smooth and the 24/7 support gave us peace of mind."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <span>ER</span>
                                </div>
                                <div class="author-info">
                                    <h4>Emily Rodriguez</h4>
                                    <span>Leisure Traveler</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="testimonial-text">"Amazing experience! The team found me last-minute flights at incredible prices. Their expertise saved my business trip."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <span>DW</span>
                                </div>
                                <div class="author-info">
                                    <h4>David Wilson</h4>
                                    <span>Corporate Executive</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-slide">
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="testimonial-text">"Outstanding customer service! They handled my complex multi-city itinerary perfectly. Will definitely use again."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <span>LM</span>
                                </div>
                                <div class="author-info">
                                    <h4>Lisa Martinez</h4>
                                    <span>Travel Blogger</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-card">
                            <div class="quote-icon">
                                <i class="ri-double-quotes-l"></i>
                            </div>
                            <div class="stars">
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                                <i class="ri-star-fill"></i>
                            </div>
                            <p class="testimonial-text">"Fast and efficient service! Booked my international flight in minutes. Great customer support and competitive prices."</p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <span>JT</span>
                                </div>
                                <div class="author-info">
                                    <h4>James Thompson</h4>
                                    <span>Frequent Flyer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-nav">
                    <button class="nav-btn prev-btn" onclick="changeTestimonial(-1)">
                        <i class="ri-arrow-left-s-line"></i>
                    </button>
                    <button class="nav-btn next-btn" onclick="changeTestimonial(1)">
                        <i class="ri-arrow-right-s-line"></i>
                    </button>
                </div>
                
                <div class="testimonial-dots">
                    <button class="dot active" onclick="currentTestimonial(1)"></button>
                    <button class="dot" onclick="currentTestimonial(2)"></button>
                    <button class="dot" onclick="currentTestimonial(3)"></button>
                </div>
            </div>
        </div>
    </section>  

    <!-- Footer -->
    <?php include 'partials/footer.php'; ?>

    <script>
        // Hero Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const indicators = document.querySelectorAll('.indicator');
        
        function updateSlide(index) {
            slides[currentSlide].classList.remove('active');
            indicators[currentSlide].classList.remove('active');
            
            currentSlide = index;
            
            slides[currentSlide].classList.add('active');
            indicators[currentSlide].classList.add('active');
        }
        
        function nextSlide() {
            const next = (currentSlide + 1) % slides.length;
            updateSlide(next);
        }
        
        function goToSlide(index) {
            updateSlide(index);
        }
        
        setInterval(nextSlide, 5000);
        
        // Make goToSlide globally available
        window.goToSlide = goToSlide;

        // Airport Suggestions
        document.addEventListener('DOMContentLoaded', function() {
            const locationInput = document.getElementById('location');
            const startInput = document.getElementById('start');
            const departureInput = document.getElementById('departure');
            
            const today = new Date().toISOString().split('T')[0];
            departureInput.min = today;

            function fetchSuggestions(query, callback) {
                fetch('https://raw.githubusercontent.com/algolia/datasets/master/airports/airports.json')
                    .then(response => response.json())
                    .then(data => {
                        const filtered = data.filter(airport =>
                            airport.name.toLowerCase().includes(query.toLowerCase()) ||
                            airport.city.toLowerCase().includes(query.toLowerCase())
                        ).slice(0, 5);
                        callback(filtered);
                    })
                    .catch(() => callback([]));
            }

            function showSuggestions(input, containerId) {
                const container = document.getElementById(containerId);
                if (!container || input.value.length < 2) {
                    if (container) container.style.display = 'none';
                    return;
                }

                fetchSuggestions(input.value, function(data) {
                    container.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.style.cssText = 'padding:12px;cursor:pointer;border-bottom:1px solid #f1f5f9;';
                            div.innerHTML = `<strong>${item.name}</strong><br><small style="color:#64748b;">${item.city}, ${item.country}</small>`;
                            div.onmouseover = () => div.style.background = '#f8fafc';
                            div.onmouseout = () => div.style.background = 'white';
                            div.onclick = () => {
                                input.value = item.name;
                                container.style.display = 'none';
                            };
                            container.appendChild(div);
                        });
                        container.style.cssText = 'position:absolute;background:white;border:1px solid #e2e8f0;border-radius:8px;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);max-height:200px;overflow-y:auto;width:100%;z-index:1000;display:block;margin-top:4px;';
                    }
                });
            }

            locationInput.addEventListener('input', () => showSuggestions(locationInput, 'location-suggestions'));
            startInput.addEventListener('input', () => showSuggestions(startInput, 'start-suggestions'));
        });

        // FAQ Toggle
        function toggleFAQ(button) {
            const item = button.parentElement;
            const isActive = item.classList.contains('active');
            
            document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
            
            if (!isActive) {
                item.classList.add('active');
            }
        }

        // Fill Form
        function fillForm(from, to) {
            document.getElementById('location').value = from;
            document.getElementById('start').value = to;
            document.getElementById('booking-form').scrollIntoView({behavior: 'smooth'});
        }
    </script>

    <style>
        .suggestions {
            position: absolute;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            max-height: 200px;
            overflow-y: auto;
            width: 100%;
            z-index: 1000;
            display: none;
            margin-top: 4px;
        }
        
        .form-group {
            position: relative;
        }
        
        .price-label {
            font-size: 0.875rem;
            font-weight: 400;
            color: #64748b;
        }
    </style>

    <!-- Contact Popup Modal -->
    <div id="contactModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Complete Your Flight Search</h3>
                <span class="close" onclick="closeContactPopup()">&times;</span>
            </div>
            <div class="modal-body">
                <p>Please provide your contact details to receive personalized flight options and exclusive deals.</p>
                <form id="contactForm" action="send_booking.php" method="POST">
                    <!-- Hidden flight details -->
                    <input type="hidden" id="hiddenFrom" name="from">
                    <input type="hidden" id="hiddenTo" name="to">
                    <input type="hidden" id="hiddenDeparture" name="departure">
                    <input type="hidden" id="hiddenReturn" name="return">
                    <input type="hidden" id="hiddenTravelers" name="travelers">
                    
                    <div class="form-group">
                        <label for="customerName">Full Name *</label>
                        <input type="text" id="customerName" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="customerPhone">Phone Number *</label>
                        <input type="tel" id="customerPhone" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="customerEmail">Email Address *</label>
                        <input type="email" id="customerEmail" name="email" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">
                        <i class="ri-send-plane-line"></i>
                        Get Flight Options
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openContactPopup() {
            // Validate flight form first
            const form = document.getElementById('flight-search-form');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            
            // Get flight details
            const from = document.getElementById('location').value;
            const to = document.getElementById('start').value;
            const departure = document.getElementById('departure').value;
            const returnDate = document.getElementById('return').value;
            const travelers = document.getElementById('travellers').value;
            
            // Fill hidden fields
            document.getElementById('hiddenFrom').value = from;
            document.getElementById('hiddenTo').value = to;
            document.getElementById('hiddenDeparture').value = departure;
            document.getElementById('hiddenReturn').value = returnDate;
            document.getElementById('hiddenTravelers').value = travelers;
            
            // Show modal
            document.getElementById('contactModal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        function closeContactPopup() {
            document.getElementById('contactModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            // Clear only contact form, preserve flight form
            document.getElementById('contactForm').reset();
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('contactModal');
            if (event.target === modal) {
                closeContactPopup();
            }
        }
        
        // Handle form submission success
        document.getElementById('contactForm').addEventListener('submit', function() {
            // Form will redirect to thank you page, no need to clear flight form
        })
        
        // Testimonials Slider
        document.addEventListener('DOMContentLoaded', function() {
            let testimonialIndex = 0;
            const testimonialSlides = document.querySelectorAll('.testimonial-slide');
            const testimonialDots = document.querySelectorAll('.testimonial-dots .dot');
            
            function showTestimonialSlide(index) {
                testimonialSlides.forEach(slide => slide.classList.remove('active'));
                testimonialDots.forEach(dot => dot.classList.remove('active'));
                
                if (testimonialSlides[index]) {
                    testimonialSlides[index].classList.add('active');
                }
                if (testimonialDots[index]) {
                    testimonialDots[index].classList.add('active');
                }
            }
            
            window.changeTestimonial = function(direction) {
                testimonialIndex += direction;
                if (testimonialIndex >= testimonialSlides.length) testimonialIndex = 0;
                if (testimonialIndex < 0) testimonialIndex = testimonialSlides.length - 1;
                showTestimonialSlide(testimonialIndex);
            }
            
            window.currentTestimonial = function(index) {
                testimonialIndex = index - 1;
                showTestimonialSlide(testimonialIndex);
            }
            
            // Auto-play testimonials
            let testimonialInterval = setInterval(() => {
                window.changeTestimonial(1);
            }, 5000);
            
            // Pause auto-play on hover
            const testimonialSection = document.querySelector('.testimonials-slider');
            if (testimonialSection) {
                testimonialSection.addEventListener('mouseenter', () => {
                    clearInterval(testimonialInterval);
                });
                
                testimonialSection.addEventListener('mouseleave', () => {
                    testimonialInterval = setInterval(() => {
                        window.changeTestimonial(1);
                    }, 5000);
                });
            }
        });
    </script>

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 10000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }
        
        .modal-content {
            background-color: white;
            margin: 5% auto;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
            animation: modalSlideIn 0.3s ease;
        }
        
        @keyframes modalSlideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .modal-header {
            padding: 24px 24px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .modal-header h3 {
            margin: 0;
            color: var(--gray-900);
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .close {
            color: var(--gray-400);
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            line-height: 1;
        }
        
        .close:hover {
            color: var(--gray-600);
        }
        
        .modal-body {
            padding: 24px;
        }
        
        .modal-body p {
            color: var(--gray-600);
            margin-bottom: 24px;
            line-height: 1.6;
        }
        
        .modal-body .form-group {
            margin-bottom: 20px;
        }
        
        .modal-body label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--gray-700);
        }
        
        .modal-body input {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }
        
        .modal-body input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
        
        .submit-btn {
            width: 100%;
            background: var(--gradient-primary);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
        }
        
        @media (max-width: 768px) {
            .modal-content {
                margin: 10% auto;
                width: 95%;
            }
        }
    </style>
</body>
</html>