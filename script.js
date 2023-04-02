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

{/* <div class="cartContainer_container">
    <div class="cartContainer_left">
        <h3 onclick="location='?option=cartcontainer&action=cart'">Giỏ hàng của tôi</h3>
        <hr>
        <h3 onclick="location='?option=cartcontainer&action=ordersprocess'">Đơn hàng của tôi</h3>
        <hr>
    </div>
    <div class="cartContainer_right">
        <?php 
            if(isset($_GET['action'])):
                switch($_GET['action']):
                    case'cart':include"views/cart.php"; break;
                    case'ordersprocess':include"views/carts/ordersprocess.php"; break;
                endswitch;
            else:
                include"views/cart.php";
            endif;
        ?>

    </div>
</div> */}
