<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$products=$connect->query("select*from products where brandid=$id");
		if(mySqli_num_rows($products)!=0){
			$connect->query("update brands set status=0 where id=$id");
		}else{
			$connect->query("delete from brands where id=$id");
		}

	}
?>

<?php
	$query="select*from brands";
	$result=$connect->query($query);
?>
<h1>HÃNG SẢN XUẤT</h1>
<section style="text-align: center;"><a href="?option=brandadd" class="btn btn-success">Thêm hãng</a></section>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>MÃ HÃNG</th>
			<th>TÊN HÃNG</th>
			<th>TRẠNG THÁI HÃNG</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $count=1;?>
		<?php foreach($result as $item):?>
			<tr>
				<td><?=$count++?></td>
				<td><?=$item['id']?></td>
				<td><?=$item['name']?></td>
				<td><?=$item['status']==1?'Active':'UnActive'?></td>
				<td><a class="btn btn-sm btn-info" href="?option=brandupdate&id=<?=$item['id']?>">Update</a> <a href="?option=brand&id=<?=$item['id']?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa hãng sản phẩm này không?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>