const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn.querySelector("i");

menuBtn.addEventListener("click", (e) => {
  navLinks.classList.toggle("open");

  const isOpen = navLinks.classList.contains("open");
  menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
});

navLinks.addEventListener("click", (e) => {
  navLinks.classList.remove("open");
  menuBtnIcon.setAttribute("class", "ri-menu-line");
});

const scrollRevealOption = {
  distance: "50px",
  origin: "bottom",
  duration: 1000,
};

ScrollReveal().reveal(".header__container h1", {
  ...scrollRevealOption,
});
ScrollReveal().reveal(".header__container p", {
  ...scrollRevealOption,
  delay: 500,
});
ScrollReveal().reveal(".header__container form", {
  ...scrollRevealOption,
  delay: 1000,
});






ScrollReveal().reveal(".popular__card", {
  ...scrollRevealOption,
  interval: 500,
});


let currentSlide = 0;
        const slides = document.querySelectorAll('.flight-slide');

        function nextSlide() {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }

        // Auto change slide every 3 seconds
        setInterval(nextSlide, 3000);


// .........currentSlide.......faq..........

// const faq = document.querySelector(".faq__grid");

faq.addEventListener("click", (e) => {
  const target = e.target;
  const faqCard = target.closest(".faq__card");
  if (target.classList.contains("ri-arrow-down-s-line")) {
    if (faqCard.classList.contains("active")) {
      faqCard.classList.remove("active");
    } else {
      Array.from(faq.children).forEach((item) => {
        item.classList.remove("active");
      });
      faqCard.classList.add("active");
    }
  }
});

// ScrollReveal().reveal(".faq__image img", {
//   ...scrollRevealOption,
//   origin: "left",
// });


// blog container
ScrollReveal().reveal(".blog__card", {
  ...scrollRevealOption,
  interval: 500,
});



//contact-us
jQuery('#frmContactus').on('submit',function(e){
  jQuery('#msg').html('');
  jQuery('#submit').html('Please wait');
  jQuery('#submit').attr('disabled',true);
  jQuery.ajax({
      url:'submit.php',
      type:'post',
      data:jQuery('#frmContactus').serialize(),
      success:function(result){
          jQuery('#msg').html(result);
          jQuery('#submit').html('Submit');
          jQuery('#submit').attr('disabled',false);
          jQuery('#frmContactus')[0].reset();
      }
  });
  e.preventDefault();
});





//try of button and dropdown in the navbar
// Dropdown functionality for mobile
const dropdown = document.querySelector(".dropdown");
const dropdownMenu = document.querySelector(".dropdown-menu");

dropdown.addEventListener("click", (e) => {
  if (window.innerWidth <= 768) {
    e.preventDefault();
    dropdown.classList.toggle("active");
  }
});

// Close dropdown when clicking outside
document.addEventListener("click", (e) => {
  if (!dropdown.contains(e.target)) {
    dropdown.classList.remove("active");
  }
});




ScrollReveal().reveal(".destination__card", {
  ...scrollRevealOption,
  interval: 500,
});