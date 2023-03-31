<?php
    $resultFeedBack = "select * from feedbacks";
    $queryResultFeedBack = $connect->query($resultFeedBack);
?>

<section class="review">
    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            <?php foreach($queryResultFeedBack as $item):?>
                <div class="swiper-slide box">
                    <img src="images/<?=$item['image']?>">
                    <p><?=$item['contentFeedBack']?></p>
                    <h3><?=$item['username']?></h3>
                    <?=$item['starts'] == 5 ? 
                        '<div class="stars">
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                        </div>'
                        : 
                        '<div class="stars">
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star-half-alt"></div>
                        </div>'
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div>
    <?php
        $checkUser = isset($_SESSION['member']) ? '?option=writefeedback' : '?option=signin'
    ?>
    <p style="text-align: center">Mọi bài đánh giá SHOP vui lòng gửi về đường mail:
        <a href="mailto:tuankhanh668sdtq@gmail.com">tuankhanh668sdtq@gmail.com</a>
        <p style="text-align: center; cursor: pointer; color: blue;">
            <a onclick="location='<?=$checkUser?>'">Hoặc gửi tại đây!</a>
        </p>
        <p style="text-align: center">Xin cảm ơn quý khách!</p>
    </p>
</div>

<section class="review">
    <div class="swiper review-slider">
        <div class="swiper-wrapper">
            <?php foreach($queryResultFeedBack as $item):?>
                <div class="swiper-slide box">
                    <img src="images/<?=$item['image']?>">
                    <p><?=$item['contentFeedBack']?></p>
                    <h3><?=$item['username']?></h3>
                    <?=$item['starts'] == 5 ? 
                        '<div class="stars">
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                        </div>'
                        : 
                        '<div class="stars">
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star"></div>
                            <div class="i fas fa-star-half-alt"></div>
                        </div>'
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".review-slider", {
    loop:true,
    spaceBetween: 100,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    centereedSlides: true,
    breakpoints: {
        0: {
        slidesPerView: 1,
        },
        768: {
        slidesPerView: 2,
        },
        1020: {
        slidesPerView: 3,
        },
    },
    });

</script>

<style>
    .review .review-slider{
        padding: 1rem 1;
    }

    .review .review-slider .box{
        background: #000;
        border-radius: .5rem;
        text-align: center;
        padding: 2.5rem 0rem;
        outline-offset: -1rem;
        outline: .1rem solid rgba(0,0,0,.1);
        box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.1);
        transition: .2s linear;
        margin-left: 0px;
        margin-top: 10px;
        margin-bottom: 10px;
    }


    .review .review-slider .box:hover{
        outline: .2rem solid black;
        outline-offset: 0rem;
    }


    .review .review-slider .box img{
        height: 80px;
        width: 80px;
        border-radius: 50%;
    }

    .review img:hover{
        
        transform: scale(1.2);
        transition: all ease-in-out 0.5s;
    }

    .review .review-slider .box p{
        padding: 1rem 0;
        line-height: 0.2;
        color: red;
        font-size: 1.5rem;
    }

    .review .review-slider .box h3{
        padding-bottom: 0px;
        color: #fff;
        font-size: 1rem;
        line-height: 10px;
    }

    .review .review-slider .box .stars i{
        color: orange;
        font-size: 1.7rem;
    }

    .review .review-slider .box .stars div{
        color: orange;
        font-size: 1.7rem;
    }

</style>





