<?php
	$option='home';
	$query="select*from products where status=1";
	if(isset($_GET['brandid'])){
	$query.=" and brandid=".$_GET['brandid'];	
	$option='showproducts&brandid='.$_GET['brandid'];
  }
  elseif(isset($_GET['keyword'])){
	$query.=" and name like'%".$_GET['keyword']."%'";
	$option='showproducts&keyword='.$_GET['keyword'];
  }
  elseif(isset($_GET['range'])){
	$query.=" and price<=".$_GET['range'];
	$option='showproducts&range='.$_GET['range'];
  }

  //$page: xem casc san pham o trang so bao nhieu?
  $page=1;
  if(isset($_GET['page'])){
  	$page=$_GET['page'];
  }
  //so luong san pham o moi trang:
  $productsperpage=4;
  //lay cac san pham bat dau tu chi so bao nhieu trong bang (0 tức là bắt đầu từ bản ghi đầu tiên)
  $from=($page-1)*$productsperpage;
  //lấy tổng số sản phẩm
  $totalProducts=$connect->query($query);
  //tính tổng số trang có được:
  $totalPages=ceil(mysqli_num_rows($totalProducts)/$productsperpage);
  //lấy các sản phẩm ở trang hiện thời
  $query.=" limit $from,$productsperpage";
  $result=$connect->query($query);
?>

<?php if(mySqli_num_rows($result) == 0):?>
	<section style="text-align: center; margin-top: 30px; font-weight: bold; font-size: 30px;">Không tìm thấy sản phẩm!</section>
<?php else: ?>
<section>
	<?php foreach($result as $item):?>
		<section class="product">
			<section class="img"><a href="?option=productdetail&id=<?=$item['id']?>"><img src="images/<?=$item['image']?>"></a></section>
			<section class="name"><?=$item['name']?></section>
			<section class="price"><?=number_format($item['price'],0,',','.')?> VND</section>
			<section><input type="button" value="Đặt mua" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section>
		</section>
	<?php endforeach;?>


    <script src="script.js"></script>

</section>
<section class="pages">
	<?php for($i=1; $i<=$totalPages; $i++):?>
		<a class="<?=(empty($_GET['page'])&&$i==1)||(isset($_GET['page'])&&$_GET['page']==$i)?'highlight':''?>" href="?option=<?=$option?>&page=<?=$i?>"><?=$i?></a>
	<?php endfor;?>
</section>
<?php endif;?>

<style>
    

 
.img {
    position: relative;
    overflow: hidden;
}

.img:hover img {
    transform: scale(1.5);
    transition: all ease-in-out 0.5s;
}
</style>