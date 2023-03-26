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

<!-- home -->
<?php include'showproducts.php';?>



