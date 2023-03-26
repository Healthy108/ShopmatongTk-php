<div style="min-height: 100vh">
	<style>
		label{display: block; float: left; width: 42%; text-align: right; color: blue;}
	</style>
	<?php
		$query="select*from member where username='".$_SESSION['member']."'";
		$member=mySqli_fetch_array($connect->query($query));
	?>
	<?php
		if(isset($_POST['name'])){
			$name=$_POST['name'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$email=$_POST['email'];
			$note=$_POST['note'];
			$ordermethodid=$_POST['ordermethodid'];
			$memberid=$member['id'];
			$query="insert orders(ordermethodid, memberid, name, address, mobile, email, note) values($ordermethodid, $memberid, '$name', '$address', '$mobile', '$email', '$note')";
			$connect->query($query);
			$query="select id from orders order by id desc limit 1";
			$orderid=mySqli_fetch_array($connect->query($query))['id'];
			foreach($_SESSION['cart'] as $key=>$value){
				$productid=$key;
				$number=$value;
				$query="select price from products where id=$key";
				$price=mySqli_fetch_array($connect->query($query))['price'];
				$query="insert orderdetail values($productid,$orderid,$number,$price)";
				$connect->query($query);
			}
			unset($_SESSION['cart']);
			header("location: ?option=ordersuccess");
	
		}
	?>
	<h1 style="font-size: 40px; text-align: center;">ĐẶT HÀNG</h1>
	<form method="post">
	<h2 style="text-align: center;">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
	<section>
		
			<section>
				<label>Họ tên: </label><input name="name" value="<?=$member['fullname']?>" required>
			</section><br>
			<section>
				<label>Điện thoại: </label><input type="tel" name="mobile" value="<?=$member['mobile']?>" required>
			</section><br>
			<section>
				<label style="line-height: 50px">Địa chỉ: </label><textarea name="address" rows="3" <?=$member['mobile']?> required></textarea>
			</section><br>
			<section>
				<label>Email: </label><input type="email" name="email" value="<?=$member['email']?>" required>
			</section><br>
			<section>
				<label style="line-height: 50px">Ghi chú: </label><textarea name="note" rows="3" required></textarea>
			</section><br>
	</section>
	<h2 style="text-align: center";>Chọn phương thức thanh toán</h2>
	<?php
		$query="select*from ordermethod where status";
		$result=$connect->query($query);
	?>
	<div style="text-align: center;">
	<select name="ordermethodid">
	<?php foreach($result as $item):?>
		<option value="<?=$item['id']?>"><?=$item['name']?></option>
	<?php endforeach;?>
	</select>
	<section>
		<input type="submit" value="Đặt hàng" style="margin-top: 20px;">
	</section>
	</div>
	</form>

	</div>	