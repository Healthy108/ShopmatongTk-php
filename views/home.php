<!-- slider -->
<div class="slider">
    <section class="home" id="home">

    <div class="slide active">
        <div class="content">
            <img src="images/1635324238_matongrung,jpg.jpg" alt="">
            <span>new arrivals 2022</span>
            <h3>natural honey</h3>
            <a href="#products" class="btn">Xem thêm</a>
            <div class="controls">
                <div class="fas fa-angle-left" onclick="prev()"></div>
                <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
        </div>
        <div class="image">
            <img src="images/1635324238_matongrung,jpg.jpg" alt="">
        </div>
    </div>

    <div class="slide">
        <div class="content">
            <img src="images/mat-ong-quat-tam-dao-1-1.jpg" alt="">
            <span>new arrivals 2022</span>
            <h3>forest honey</h3>
            <a href="#products" class="btn">Xem thêm</a>
            <div class="controls">
                <div class="fas fa-angle-left" onclick="prev()"></div>
                <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
        </div>
        <div class="image">
            <img src="images/mat-ong-quat-tam-dao-1-1.jpg" alt="">
        </div>
    </div>

    <div class="slide">
        <div class="content">
            <img src="images/mat-ong-hoa-ca-phe-1kg-3.jpg" alt="">
            <span>new collections</span>
            <h3>Coffee Honey</h3>
            <a href="#products" class="btn">Xem thêm</a>
            <div class="controls">
                <div class="fas fa-angle-left" onclick="prev()"></div>
                <div class="fas fa-angle-right" onclick="next()"></div>
            </div>
        </div>
        <div class="image">
            <img src="images/mat-ong-hoa-ca-phe-1kg-3.jpg" alt="">
        </div>
    </div>
    </section>

	<script>
        let slides = document.querySelectorAll(".home .slide");
        let index = 0;

        function next() {
        slides[index].classList.remove("active");
        index = (index + 1) % slides.length;
        slides[index].classList.add("active");
        }

        function prev() {
        slides[index].classList.remove("active");
        index = (index - 1 + slides.length) % slides.length;
        slides[index].classList.add("active");
        }
    </script>
</div>


<!-- category section starts  -->
<?php 
    $query = "select*from brands where status";
    $result = $connect->query($query);
?>
<section class="review">
    <div class="swiper review-slider">
        <div class="swiper-wrapper" >
            <?php foreach($result as $item):?>
            <div class="swiper-slide box category">
            <a  class="box" href="?option=showproducts&brandid=<?=$item['id']?>">
                <img src="<?=$item['image']?>" alt="">
                <p><?=$item['name']?></p>
            </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- about section starts  -->
<section class="about" id="about">

    <div class="contentread">
        <span>Tại sao bạn nên sử dụng mật ong?</span>
        <h3>Mật ong có rất nhiều lợi ích</h3>
        <p>Mật ong chứa nhiều dưỡng chất có lợi cho sức khỏe, Mật ong thô giàu chất chống oxy hóa, Chất chống oxy hóa trong mật ong tốt cho sức khỏe tim mạch, Mật ong giúp vết thương nhanh lành, Tất cả đều tuyệt vời!!!.</p>
        <a href="?option=news" class="btn">Xem thêm</a>
    </div>
    
    <script>
        gsap.from(".contentread", { opacity: 0, y: "100%", delay: 1, duration: 4 });
    </script>
</section>

<!-- home -->
<?php include'showproducts.php';?>

<!-- script -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="script1.js"></script>

