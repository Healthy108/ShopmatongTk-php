<?php
if(empty($_SESSION['cart'])){
	$_SESSION['cart']=array();
}
	if(isset($_GET['action'])){
		$nameUser = $_SESSION['member'];
		$idUser = "select*from member where fullname = ('$nameUser')";
		$memberid = mySqli_fetch_array($connect->query($idUser))['id'];
			switch($_GET['action']){
				case'add':
					$productid=$_GET['id'];
					$itemId = $_GET['id'];
					$issetProductId = "select*from carts where carts.productid = $itemId and carts.memberid = $memberid";
					$queryCart = mySqli_fetch_array($connect->query($issetProductId))['productid'];
					if (empty($queryCart)) {
							$connect->query("insert carts(memberid,productid) values($memberid,$productid)");
					} else {
						$connect->query("update carts set quantity=quantity+1 where productid = $queryCart");
					}
					header("location: ?option=cart");
					break;
				case'delete':
					$itemId = $_GET['id'];
					$connect->query("delete from carts where carts.id = $itemId");
					header("location: ?option=cart");
					break;
				case'deleteall':
					$connect->query("delete from carts where carts.memberid = $memberid");
					break;
				case'update':
					$itemId = $_GET['id'];
					$quantityInCart = "select quantity from carts where productid = $itemId";
					$queryQuantity = mySqli_fetch_array($connect->query($quantityInCart));
				if($_GET['type']=='asc') {
					$connect->query("update carts set quantity=quantity+1 where productid = $itemId");
				} else {
					if ($queryQuantity['quantity'] <= 1) {
						$connect->query("delete from carts where carts.productid = $itemId");
					} else {
						$connect->query("update carts set quantity=quantity-1 where productid = $itemId");
					}				
				}
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


<section class="cart" style="min-height: 88vh;">
<?php 
	$nameUser = $_SESSION['member'];
	$idUser = "select*from member where fullname = ('$nameUser')";
	$resultUser = mySqli_fetch_array($connect->query($idUser))['id'];
	$issetCart = "select * from carts where carts.memberid = '$resultUser'";
	$queryissetCart = mySqli_fetch_array($connect->query($issetCart));

	if(isset($queryissetCart) ):
		$queryResult = "select products.id as productId, products.name, products.image, products.price, 
		carts.id as cartid, carts.quantity as cartQuantity from products join carts 
		on products.id = carts.productid where carts.memberid = '$resultUser'";
		$result = $connect->query($queryResult);	
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
				<td><?=$item['name']?><br><input type="button" value="Delete" onclick="location='?option=cart&action=delete&id=<?=$item['cartid']?>';"></td>
				<td><?=number_format($item['price'],0,',','.')?></td>
				<td><?=$item['cartQuantity']?> 
					<input type="button" value="+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['productId']?>';">
				 	<input type="button" value="-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['productId']?>';">
				</td> 
				<td><?=number_format($subTotal=$item['price']*$item['cartQuantity'],0,',','.')?> VND</td>
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
				<section>
					<input type="button" value="Delete Cart" 
						onclick="if(confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?'))location='?option=cart&action=deleteall';">
					<input type="button" value="Đặt hàng" onclick="location='?option=cart&action=order';">
				</section>
			</td>
		</tr>
		</tbody>
	</table>
<?php
else: 
?>
	<section style="text-align: center; color: red; font-size: 30px; padding: 50px; font-weight: bold;">Giỏ hàng trống !</section>
<?php
endif;
?>
</section>
 