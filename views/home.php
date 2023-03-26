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
        <span>Why should you use honey?</span>
        <h3>Honey has so many benefits</h3>
        <p>Honey contains nutrients that are beneficial for health, Raw honey is rich in antioxidants, The antioxidants in honey are good for heart health, Honey helps heal wounds quickly, Everything is great!!!.</p>
        <a href="#" class="btn">read more</a>
    </div>

</section>

<!-- home -->
<?php include'showproducts.php';?>

<!-- script -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="script1.js"></script>

