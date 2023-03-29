var swiper = new Swiper(".review-slider", {
  loop:true,
  spaceBetween: 100,
  autoplay: {
      delay: 2500,
      disableOnInteraction: false,
  },
  centereedSlides: true,
  breakpoints: {
    0: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 5,
    },
    1020: {
      slidesPerView: 6,
    },
  },
});

// ===============================================

