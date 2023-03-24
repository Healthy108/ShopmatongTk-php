<div class="pointerleft">
        <?php 
        $query = "select*from brands where status";
        $result = $connect->query($query);
 ?>
 <?php foreach($result as $item):?>
                <section class="left"><b><a href="?option=showproducts&brandid=<?=$item['id']?>"><?=$item['name']?></a></b></section>
 <?php endforeach; ?>
</div>
<hr/>
<div>
        <h3>Các sản phẩm mới</h3>
        <h4>Sản phẩm 1</h4>
        <h4>Sản phẩm 2</h4>
        <h4>Sản phẩm 3</h4>
        <h4>Sản phẩm 4</h4>
        <h4>Sản phẩm 5</h4>
        <h4>Sản phẩm 6</h4>
        <h4>Sản phẩm 7</h4>
        <h4>Sản phẩm 8</h4>
        <h4>Sản phẩm 9</h4>
        <h4>Sản phẩm 10</h4>
        <h4>Sản phẩm 11</h4>
</div>

<style>
       .pointerleft:hover{font-size: 16.7px; transition: all 0.3s;}
</style>





