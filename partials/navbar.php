<nav style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); border-bottom: 1px solid rgba(226, 232, 240, 0.5); transition: all 0.3s ease;">
  <div>
    <div style="display: flex; align-items: center; justify-content: space-between; height: 70px; padding: 0 4rem;">
      <!-- Logo -->
      <div>
        <img src="./assets/logo_dark.png" style="height:auto; width:8rem;" alt="" srcset="">
      </div>

      <!-- Desktop Navigation -->
      <div style="display: none; align-items: center; gap: 2rem;" class="desktop-nav">
        <a href="index.php" class="nav-link" data-page="index" style="color: #334155; font-weight: 500; text-decoration: none; transition: all 0.3s ease; padding: 0.5rem 1rem; border-radius: 0.5rem;">
          Home 
        </a>
        <a href="about-us.php" class="nav-link" data-page="about-us" style="color: #334155; font-weight: 500; text-decoration: none; transition: all 0.3s ease; padding: 0.5rem 1rem; border-radius: 0.5rem;">
          About Us
        </a>
        <a href="contact.php" class="nav-link" data-page="contact" style="color: #334155; font-weight: 500; text-decoration: none; transition: all 0.3s ease; padding: 0.5rem 1rem; border-radius: 0.5rem;">
          Contact Us
        </a>
      </div>

      <!-- Desktop CTA -->
      <div style="display: none; align-items: center; gap: 1rem;" class="desktop-cta">
        <!-- <a href="tel:+18336663503" style="color: #2563eb; font-weight: 600; text-decoration: none; transition: all 0.3s ease; padding: 0.5rem 1rem; border-radius: 0.5rem;" onmouseover="this.style.background='#f1f5f9';" onmouseout="this.style.background='transparent';">
          📞 Call 24×7
        </a> -->
        <a href="tel:+1 (877) 413-0030" style="background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 0.75rem; font-weight: 600; text-decoration: none; transition: all 0.3s ease; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.1)';">
          📞+1 (877) 413-0030
        </a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-btn" style="display: block; padding: 0.5rem; border-radius: 0.5rem; border: none; background: none; cursor: pointer; transition: background 0.3s ease;" class="mobile-menu-btn" onmouseover="this.style.background='#f1f5f9';" onmouseout="this.style.background='transparent';">
        <svg style="width: 1.5rem; height: 1.5rem; color: #334155;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" style="display: none; padding: 1.5rem 2rem; border-top: 1px solid #e2e8f0;">
      <div style="display: flex; flex-direction: column; gap: 1rem;">
        <a href="index.php" class="mobile-nav-link" data-page="index" style="color: #334155; font-weight: 500; text-decoration: none; padding: 0.75rem 1rem; border-radius: 0.5rem; transition: all 0.3s ease;">
          Home
        </a>
        <a href="about-us.php" class="mobile-nav-link" data-page="about-us" style="color: #334155; font-weight: 500; text-decoration: none; padding: 0.75rem 1rem; border-radius: 0.5rem; transition: all 0.3s ease;">
          About Us
        </a>
        <a href="contact.php" class="mobile-nav-link" data-page="contact" style="color: #334155; font-weight: 500; text-decoration: none; padding: 0.75rem 1rem; border-radius: 0.5rem; transition: all 0.3s ease;">
          Contact Us
        </a>
        <div style="padding-top: 1rem; border-top: 1px solid #e2e8f0; display: flex; flex-direction: column; gap: 0.75rem;">
          <a href="#booking-form" style="background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 0.75rem; font-weight: 600; text-decoration: none; text-align: center; transition: all 0.3s ease;">
            Book Now
          </a>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Show desktop nav on larger screens
    function updateNav() {
      const desktopNav = document.querySelector('.desktop-nav');
      const desktopCta = document.querySelector('.desktop-cta');
      const mobileBtn = document.querySelector('.mobile-menu-btn');
      
      if (window.innerWidth >= 768) {
        desktopNav.style.display = 'flex';
        desktopCta.style.display = 'flex';
        mobileBtn.style.display = 'none';
      } else {
        desktopNav.style.display = 'none';
        desktopCta.style.display = 'none';
        mobileBtn.style.display = 'block';
      }
    }
    
    updateNav();
    window.addEventListener('resize', updateNav);
    
    // Mobile menu toggle
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
      const menu = document.getElementById('mobile-menu');
      const icon = this.querySelector('svg path');
      
      if (menu.style.display === 'none' || !menu.style.display) {
        menu.style.display = 'block';
        icon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
      } else {
        menu.style.display = 'none';
        icon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
      }
    });
    
    // Active page highlighting
    function setActiveNavLink() {
      const currentPage = window.location.pathname.split('/').pop().replace('.php', '');
      const navLinks = document.querySelectorAll('.nav-link');
      
      navLinks.forEach(link => {
        const linkPage = link.getAttribute('data-page');
        if (currentPage === linkPage || (currentPage === '' && linkPage === 'index')) {
          link.style.color = '#2563eb';
          link.style.background = '#f1f5f9';
          link.style.fontWeight = '600';
        } else {
          link.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
              this.style.color = '#2563eb';
              this.style.background = '#f1f5f9';
            }
          });
          link.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
              this.style.color = '#334155';
              this.style.background = 'transparent';
            }
          });
        }
      });
    }
    
    // Mobile active page highlighting
    function setActiveMobileNavLink() {
      const currentPage = window.location.pathname.split('/').pop().replace('.php', '');
      const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
      
      mobileNavLinks.forEach(link => {
        const linkPage = link.getAttribute('data-page');
        if (currentPage === linkPage || (currentPage === '' && linkPage === 'index')) {
          link.style.color = '#2563eb';
          link.style.background = '#f1f5f9';
          link.style.fontWeight = '600';
        } else {
          link.addEventListener('click', function() {
            this.style.color = '#2563eb';
            this.style.background = '#f1f5f9';
          });
        }
      });
    }
    
    setActiveNavLink();
    setActiveMobileNavLink();
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  </script>
</nav>