// Modern JavaScript for TicketFeeAndTx
document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile menu functionality
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            const isOpen = !mobileMenu.classList.contains('hidden');
            const menuIcon = mobileMenuBtn.querySelector('svg path');
            
            if (isOpen) {
                mobileMenu.classList.add('hidden');
                menuIcon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            } else {
                mobileMenu.classList.remove('hidden');
                menuIcon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
            }
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form validation
    const bookingForm = document.querySelector('form[action="send_booking.php"]');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            const location = document.getElementById('location').value.trim();
            const start = document.getElementById('start').value.trim();
            const departure = document.getElementById('departure').value;
            
            let hasErrors = false;
            
            // Clear previous errors
            document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
            document.querySelectorAll('.form-input').forEach(el => el.classList.remove('error'));
            
            if (!location) {
                showError('location', 'Departure city is required');
                hasErrors = true;
            }
            
            if (!start) {
                showError('start', 'Destination city is required');
                hasErrors = true;
            }
            
            if (!departure) {
                showError('departure', 'Departure date is required');
                hasErrors = true;
            }
            
            if (hasErrors) {
                e.preventDefault();
                // Announce errors to screen readers
                const errorCount = document.querySelectorAll('.error-message:not(:empty)').length;
                announceToScreenReader(`Please correct ${errorCount} error${errorCount > 1 ? 's' : ''} in the form`);
            }
        });
    }

    // Set minimum date for departure
    const departureInput = document.getElementById('departure');
    const returnInput = document.getElementById('return');
    
    if (departureInput) {
        const today = new Date().toISOString().split('T')[0];
        departureInput.min = today;
        
        // Update return date minimum when departure changes
        departureInput.addEventListener('change', function() {
            if (returnInput) {
                returnInput.min = this.value;
                if (returnInput.value && returnInput.value < this.value) {
                    returnInput.value = '';
                }
            }
        });
    }

    // Airport suggestions functionality
    setupAirportSuggestions();
    
    // FAQ functionality
    setupFAQs();
    
    // Keyboard navigation improvements
    setupKeyboardNavigation();
});

function showError(fieldId, message) {
    const field = document.getElementById(fieldId);
    const errorEl = document.getElementById(fieldId + '-error');
    
    if (field) {
        field.classList.add('error');
        field.setAttribute('aria-invalid', 'true');
    }
    
    if (errorEl) {
        errorEl.textContent = message;
    }
}

function announceToScreenReader(message) {
    const announcement = document.createElement('div');
    announcement.setAttribute('aria-live', 'polite');
    announcement.setAttribute('aria-atomic', 'true');
    announcement.className = 'sr-only';
    announcement.textContent = message;
    
    document.body.appendChild(announcement);
    
    setTimeout(() => {
        document.body.removeChild(announcement);
    }, 1000);
}

function setupAirportSuggestions() {
    const locationInput = document.getElementById('location');
    const startInput = document.getElementById('start');
    const locationSuggestions = document.getElementById('location-suggestions');
    const startSuggestions = document.getElementById('start-suggestions');

    if (!locationInput || !startInput) return;

    function fetchSuggestions(query, callback) {
        fetch('https://raw.githubusercontent.com/algolia/datasets/master/airports/airports.json')
            .then(response => response.json())
            .then(data => {
                const filteredData = data.filter(airport =>
                    airport.name.toLowerCase().includes(query.toLowerCase()) ||
                    airport.city.toLowerCase().includes(query.toLowerCase())
                ).slice(0, 5);
                callback(filteredData);
            })
            .catch(error => {
                console.error('Error fetching suggestions:', error);
                callback([]);
            });
    }

    function showSuggestions(input, container) {
        if (!container) return;

        container.innerHTML = '';
        if (input.value.length > 1) {
            fetchSuggestions(input.value, function (data) {
                if (data.length > 0) {
                    data.forEach((item, index) => {
                        const div = document.createElement('div');
                        div.className = 'suggestion-item';
                        div.setAttribute('role', 'option');
                        div.setAttribute('tabindex', '-1');
                        div.innerHTML = `
                            <strong>${item.name}</strong><br>
                            <small>${item.city}, ${item.country}</small>
                        `;
                        
                        div.addEventListener('click', () => {
                            input.value = item.name;
                            container.innerHTML = '';
                            container.style.display = 'none';
                            input.focus();
                        });
                        
                        div.addEventListener('keydown', (e) => {
                            if (e.key === 'Enter') {
                                div.click();
                            }
                        });
                        
                        container.appendChild(div);
                    });
                    container.style.display = 'block';
                    container.setAttribute('role', 'listbox');
                } else {
                    container.style.display = 'none';
                }
            });
        } else {
            container.style.display = 'none';
        }
    }

    locationInput.addEventListener('input', () => {
        showSuggestions(locationInput, locationSuggestions);
    });

    startInput.addEventListener('input', () => {
        showSuggestions(startInput, startSuggestions);
    });

    // Hide suggestions when clicking outside
    document.addEventListener('click', (event) => {
        if (locationSuggestions && !locationInput.contains(event.target) && !locationSuggestions.contains(event.target)) {
            locationSuggestions.style.display = 'none';
        }
        if (startSuggestions && !startInput.contains(event.target) && !startSuggestions.contains(event.target)) {
            startSuggestions.style.display = 'none';
        }
    });
}

function setupFAQs() {
    const faqButtons = document.querySelectorAll('.faq-question');
    
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const faqItem = this.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
                const btn = item.querySelector('.faq-question');
                btn.setAttribute('aria-expanded', 'false');
            });
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
                this.setAttribute('aria-expanded', 'true');
            }
        });
        
        // Set initial ARIA attributes
        button.setAttribute('aria-expanded', 'false');
    });
}

function setupKeyboardNavigation() {
    // Trap focus in mobile menu when open
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    
    if (mobileMenu && mobileMenuBtn) {
        mobileMenuBtn.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                this.focus();
            }
        });
    }
    
    // Enhanced focus management for form elements
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.classList.remove('error');
            this.removeAttribute('aria-invalid');
        });
    });
}

// Popular routes functionality
function fillBookingForm(from, to) {
    const locationInput = document.getElementById('location');
    const startInput = document.getElementById('start');
    
    if (locationInput) locationInput.value = from;
    if (startInput) startInput.value = to;
    
    // Scroll to booking form
    const bookingForm = document.getElementById('booking-form');
    if (bookingForm) {
        bookingForm.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
        // Focus on departure date after a short delay
        setTimeout(() => {
            const departureInput = document.getElementById('departure');
            if (departureInput) departureInput.focus();
        }, 500);
    }
}

// Make function globally available
window.fillBookingForm = fillBookingForm;