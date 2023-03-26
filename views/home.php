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

<section class="category">

    <a href="#" class="box">
        <img src="images/1679568570_mat-ong-hoa-ca-phe-1kg-3.jpg" alt="">
        <p>Mật Ong Hoa Cafe</p>
    </a>

    <a href="#" class="box">
        <img src="images/1640226726_mat-ong-nhan-db-1000g.jpg" alt="">
        <p>Mật Ong Hoa Nhãn</p>
    </a>

    <a href="#" class="box">
        <img src="images/1635324414_mat-ong-hoa-rung.jpg" alt="">
        <p>Mật Ong Hoa Rừng</p>
    </a>

    <a href="#" class="box">
        <img src="images/matongtaybac.jpg" alt="">
        <p>Mật Ong Tây Bắc</p>
    </a>

    <a href="#" class="box">
        <img src="images/matonghoanhanplus.jpg" alt="">
        <p>Mật Ong Normal</p>
    </a>

</section>

<!-- category section ends -->

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



