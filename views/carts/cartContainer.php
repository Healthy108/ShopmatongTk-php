<div class="cartContainer_container">
    <div class="cartContainer_left">
        <h3 onclick="location='?option=cart'">Giỏ hàng của tôi</h3>
        <hr>
        <h3 onclick="location='?option=ordersprocess'">Đơn hàng của tôi</h3>
        <hr>
    </div>
    <div class="cartContainer_right">
        <?php include"views/cart.php";?>
    </div>
</div>


<style>
    .cartContainer_container {
        min-height: 100vh;
        display: flex;
    }
    .cartContainer_container .cartContainer_left {
        height: auto;
        min-height: 100vh;
        width: 18%;
        background-color: #fff;
        text-align: center;
        box-shadow: 5px 0 5px -5px #353363;
        cursor: pointer;
    }
    .cartContainer_container .cartContainer_left h3:hover {
        font-size: 18px;
        color: blue;
    }
    .cartContainer_container .cartContainer_right {
        height: auto;
        min-height: 100vh;
        width: 82%;
    }
    @media (max-width: 500px) {
        .cartContainer_container .cartContainer_left {
            
        }
    }


</style>


