<?php

if(empty($_SESSION['cart'])){
	$_SESSION['cart']=array();
}
	if(isset($_GET['action'])){
		$id=isset($_GET['id'])?$_GET['id']:'';
		switch($_GET['action']){
			case'add':
				if(array_key_exists($id, array_keys($_SESSION['cart']))){
					$_SESSION['cart'][$id]=1;
				}else{
					$_SESSION['cart'][$id]++;
				}
				header("location: ?option=cart");
				break;
			case'delete':
				unset($_SESSION['cart'][$id]);
				break;
			case'deleteall':
				unset($_SESSION['cart']);
				break;
			case'update':
			if($_GET['type']=='asc')
				$_SESSION['cart'][$id]++;
			else
				if($_SESSION['cart'][$id]>1)
				$_SESSION['cart'][$id]--;
			header("location: ?option=cart");
			break;
		case'order':
			if(isset($_SESSION['member'])){
				header("location: ?option=order");
			}else{
				header("location: ?option=signin&order=1");
			}
		break;

		}
	}
?>
<section class="cart">
<?php
if(!empty($_SESSION['cart'])):
	// $ids="0";
	// foreach(array_keys($_SESSION['cart']) as $key)
	// $ids.=",".$key;
	$ids= implode(',', array_keys($_SESSION['cart']));
	// $query="select*from products where id in($ids)";
	$query="select*from products where id in($ids)";
	$result=$connect->query($query);
?>
	<table border="1px" width="100%" cellpadding="0" cellspacing="0" style="text-align: center;">
		<thead>
			<tr>
				<td>Image</td>
				<td>Name</td>
				<td>Price(VND)</td> 
				<td>Number</td>
				<td>subTotal</td>
			</tr>
		</thead>
		<tbody>
<?php
	$toTal=0;
	$thue=0;
	$tonghoadon=0;
	foreach($result as $item):
?>
			<tr>
				<td width="20%"><img width="100%" src="images/<?=$item['image']?>"></td>
				<td><?=$item['name']?><br><input type="button" value="Delete" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';"></td>
				<td><?=number_format($item['price'],0,',','.')?></td>
				<td><?=$_SESSION['cart'][$item['id']]?> <input type="button" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';"> <input type="button" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';"></td> 
				<td><?=number_format($subTotal=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
			</tr>
			<?php $toTal+=$subTotal;
				$thue=$toTal*3/100;
				$tonghoadon=$toTal+$thue;
			?>
<?php
	endforeach;
?>
		<tr>
			<td colspan="5" style="padding: 20px;">
				<section>Tổng tiền: <?=number_format($toTal,0,',','.')?> VND</section>
				<section>Thuế: <?=number_format($thue,0,',','.')?> VND</section>
				<section><input type="button" value="Delete Cart" onclick="if(confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?'))location='?option=cart&action=deleteall';"> <input type="button" value="Đặt hàng" onclick="location='?option=cart&action=order';"></section>
			</td>
		</tr>
		</tbody>
	</table>
<?php
else:
?>
	<section style="text-align: center; color: red; font-size: 30px; margin-top: 40px; font-weight: bold;">Giỏ hàng trống !</section>
<?php
endif;
?>
</section>
