var swiper = new Swiper(".review-slider", {
  loop:true,
  spaceBetween: 100,
  autoplay: {
      delay: 2800,
      disableOnInteraction: false,
  },
  centereedSlides: true,
  breakpoints: {
    0: {
      slidesPerView: 6,
    },
    768: {
      slidesPerView: 6,
    },
    1020: {
      slidesPerView: 6,
    },
  },
});

// ===============================================

