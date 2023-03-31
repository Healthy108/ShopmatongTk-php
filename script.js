var swiper = new Swiper(".review-slider", {
  loop: true,
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
// if ($item['starts'] == 3) {
//   '<div class="stars">
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//   </div>'
// } else if ($item['starts'] == 4) {
//   '<div class="stars">
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//   </div>'
// } else if ($item['starts'] == 5) {
//   '<div class="stars">
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//   </div>'
// } else {
//   '<div class="stars">
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star"></div>
//       <div class="i fas fa-star-half-alt"></div>
//   </div>'
// }


// <?=$item['starts'] == 5 ? 
// '<div class="stars">
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
// </div>'
// : 
// '<div class="stars">
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star"></div>
//     <div class="i fas fa-star-half-alt"></div>
// </div>'
// ?>



// switch ($item['starts']) {
//   case $item['starts'] == 5:
//       '<div class="stars">
//       //       <div class="i fas fa-star"></div>
//       //       <div class="i fas fa-star"></div>
//       //       <div class="i fas fa-star"></div>
//       //       <div class="i fas fa-star"></div>
//       //       <div class="i fas fa-star"></div>
//       //   </div>'
//   break;
//   case $item['starts'] == 4:
//       '<div class="stars">
//   //       <div class="i fas fa-star"></div>
//   //       <div class="i fas fa-star"></div>
//   //       <div class="i fas fa-star"></div>
//   //       <div class="i fas fa-star"></div>
//   //   </div>'
//       break;
//   case $item['starts'] == 3:
//       '<div class="stars">
//   //       <div class="i fas fa-star"></div>
//   //       <div class="i fas fa-star"></div>
//   //       <div class="i fas fa-star"></div>
//   //   </div>'
//       break;
//   case $item['starts'] == 2:
//       '<div class="stars">
//   //       <div class="i fas fa-star"></div>
//   //       <div class="i fas fa-star"></div>
//   //   </div>'
//       break;
//   case $item['starts'] == 1:
//       '<div class="stars">
//   //       <div class="i fas fa-star"></div>
//   //   </div>'
//       break;
  
//   default:
//       '<h2>Chưa có đánh giá!</h2>'
//       break;
// }