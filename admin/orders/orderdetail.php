<?php
	if(isset($_GET['action'])){
		$condition=" where orderid=".$_GET['orderid']." and productid=".$_GET['productid'];
		if($_GET['type']=='asc'){
			$query="update orderdetail set number=number+1".$condition; 
		}else{
			$query="update orderdetail set number=number-1".$condition;
		}
		$connect->query($query);
		header("location: ?option=orderdetail&id=".$_GET['id']);
	}

	if(isset($_POST['status'])){
		$connect->query("update orders set status=".$_POST['status']." where id=".$_GET['id']);
		header("Refresh: 0");
	}
?>

<?php
	$query="select a.fullname,a.mobile as 'mobilemember',a.address as 'addressmember' ,a.email as 'emailmember',
	b.*,c.name as 'nameordermethod' from member a join orders b on a.id=b.memberid join ordermethod c 
	on b.ordermethodid=c.id where b.id=".$_GET['id'];
	$order=mySqli_fetch_array($connect->query($query));
 ?>
 <h1>CHI TIẾT ĐƠN HÀNG<br>(Mã đơn hàng: <?=$order['id']?>)</h1>
 <h2>Ngày tạo đơn</h2>
 <section><?=$order['orderdate']?></section>
 <h2>Thông tin người đặt hàng:</h2>
 <table class="table">
 	<tbody>
 		<tr>
 			<td>Họ tên: </td>
 			<td><?=$order['fullname']?></td>
 		</tr>
 		<tr>
 			<td>Điện thoại: </td>
 			<td><?=$order['mobile']?></td>
 		</tr>
 		<tr>
 			<td>Địa chỉ: </td>
 			<td><?=$order['address']?></td>
 		</tr>
 		<tr>
 			<td>Email: </td>
 			<td><?=$order['email']?></td>
 		</tr>
 		<tr>
 			<td>Note: </td>
 			<td><?=$order['note']?></td>
 		</tr>
 	</tbody>
 </table>
  <h2>Thông tin người nhận hàng:</h2>
 <table class="table">
 	<tbody>
 		<tr>
 			<td>Họ tên: </td>
 			<td><?=$order['fullname']?></td>
 		</tr>
 		<tr>
 			<td>Điện thoại: </td>
 			<td><?=$order['mobilemember']?></td>
 		</tr>
 		<tr>
 			<td>Địa chỉ: </td>
 			<td><?=$order['addressmember']?></td>
 		</tr>
 		<tr>
 			<td>Email: </td>
 			<td><?=$order['emailmember']?></td>
 		</tr>
 	</tbody>
 </table>
 <h2>Phương thức thanh toán</h2>
 <p><?=$order['nameordermethod']?></p>
 <?php
 	// $query="select b.*,c.name,c.image from orders a join orderdetail b 
	// on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
 	// $orderdetails=$connect->query($query);
	 $query="select b.*,c.name,c.image from orders a join orderdetail b 
	 on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
	  $orderdetails=$connect->query($query);
?>
<form method="post">
	<h2>Các sản phẩm đặt mua</h2>
	<?php $count=1;?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh</th>
				<th>Giá (VND)</th>
				<th>Số lượng</th>
				<th>Tổng tiền (VND)</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($orderdetails as $item):?>
		<tr>
			<td><?=$count++?></td>
			<td><?=$item['name']?></td>
			<td width="30%"><img src="../images/<?=$item['image']?>" width="20%"></td>
			<td><?=number_format($item['price'],0,',','.')?></td>
			<td><?=$item['number']?> <input type="button" value="+" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=asc&orderid=<?=$item['orderid']?>&productid=<?=$item['productid']?>';"> <input <?=$item['number']==0?'disabled':''?> type="button" value="-" onclick="location='?option=orderdetail&id=<?=$_GET['id']?>&action=update&type=desc&orderid=<?=$item['orderid']?>&productid=<?=$item['productid']?>';"></td>
			<td><?=number_format($item['price']*$item['number'],0,',','.')?></td>
		</tr>
	<?php endforeach;?>
		</tbody>
	</table>
	<h2>Trạng thái đơn hàng</h2>
	<p style="display: <?=$order['status']==2 || $order['status']==3?'none;':'block'?>"><input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?>> Chưa xử lý</p>

	<p style="display: <?=$order['status']==3?'none;':''?>"><input type="radio" name="status" value="2" <?=$order['status']==2?'checked':''?>> Đang xử lý</p>

	<p><input type="radio" name="status" value="3" <?=$order['status']==3?'checked':''?>> Đã xử lý</p>

	<p style="display: <?=$order['status']==3?'none;':''?>"><input type="radio" name="status" value="4" <?=$order['status']==4?'checked':''?>> Hủy</p>

	<section><input <?=$order['status']==3?'disabled':''?> type="submit" value="Update đơn hàng" class="btn btn-primary"> <a href="?option=order&status=1" class="btn btn-outline-secondary"> << Back</a></section>
</form>