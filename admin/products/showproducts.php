<?php
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$products=$connect->query("select*from orderdetail where productid=$id");
		if(mySqli_num_rows($products)!=0){
			$connect->query("update products set status=0 where id=$id");
		}else{
			$connect->query("delete from products where id=$id");
			unlink("../images/".$_GET['image']);
		}

	}
?>

<?php
	$query="select*from products";
	$result=$connect->query($query);
?>
<h1>DANH SÁCH SẢN PHẨM</h1>
<section style="text-align: center;"><a href="?option=productadd" class="btn btn-success">Thêm sản phẩm</a></section>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>TÊN</th>
			<th>GIÁ (VND)</th>
			<th>ẢNH</th>
			<th>TRẠNG THÁI</th>
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
				<td><?=number_format($item['price'],0,',',',')?></td>
				<td width="20%"><img src="../images/<?=$item['image']?>" width="50%"></td>
				<td><?=$item['status']==1?'Active':'UnActive'?></td>
				<td><a class="btn btn-sm btn-info" href="?option=productupdate&id=<?=$item['id']?>">Update</a> <a href="?option=product&id=<?=$item['id']?>&image=<?=$item['image']?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>