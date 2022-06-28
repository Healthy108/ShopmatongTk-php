<div style="background: seashell; height: auto;">
	<?php
$chuaXuLy=mysqli_num_rows($connect->query("select*from orders where status=1"));
$dangXuLy=mysqli_num_rows($connect->query("select*from orders where status=2"));
$daXuLy=mysqli_num_rows($connect->query("select*from orders where status=3"));
$huy=mysqli_num_rows($connect->query("select*from orders where status=4"));
?>

<table class="table table-bordered tbl-admin">
	<tbody style="line-height: 35px">
		<tr>
			<td width="15%" height="100px"><b style="color: red;">Hello:</b> <?=$_SESSION['admin']?><br>[<a href="?option=logout">LogOut</a>]</td>
			<td style="text-align: center;"><b style="color: red; font-size: 30px; line-height: 70px;">ADMIN CONTROLPANEL</b></td>
		</tr>
		<tr>
			<td>
				<section><a href="?option=brand">>>> Hãng sản xuất</a></section><br>
				<section><a href="?option=product">>>>>> Sản phẩm</a></section><br>
				<section>
					<b style="color: red;">>>>>> Đơn hàng</b>
					<section><a href="?option=order&status=1">>>> Đơn hàng chưa xử lý [<span style="color: red;"><?=$chuaXuLy?></span>]</a></section>
					<section><a href="?option=order&status=2">>>> Đơn hàng đang xử lý <span style="color: red;"><?=$dangXuLy?></span>]</a></section>
					<section><a href="?option=order&status=3">>>>>> Đơn hàng đã xử lý <span style="color: red;"><?=$daXuLy?></span>]</a></section>
					<section><a href="?option=order&status=4">>>>>>>Đơn hàng Hủy <span style="color: red;"><?=$huy?></span>]</a></section>
				</section>
			</td>
			<td>
				<?php
					if(isset($_GET['option'])){
						switch($_GET['option']){
							case'logout':
								unset($_SESSION['admin']);
								header("location: .");
								break;
							case'brand':
								include"brands/showbrands.php";						
								break;
							case'brandadd':
								include"brands/brandadd.php";						
								break;
							case'brandupdate':
								include"brands/brandupdate.php";						
								break;
							case'product':
								include"products/showproducts.php";						
								break;
							case'productadd':
								include"products/productadd.php";						
								break;
							case'productupdate':
								include"products/productupdate.php";						
								break;
							case'order':
								include"orders/showorders.php";						
								break;
							case'orderdetail':
								include"orders/orderdetail.php";						
								break;	
						}	
					}
				?>
			</td>
		</tr>
	</tbody>

</table>
</div>