<?php
	if(isset($_GET['id'])):
		$id=$_GET['id'];
			$connect->query("delete from orderdetail where orderid=$id");
			$connect->query("delete from orders where id=$id");
			header("location: ?option=order&status=4");
	endif;

?>
<?php
	$status =$_GET['status'];
	$query="select*from orders where status=$status";
	$result=$connect->query($query);

?>
<h1>ĐƠN HÀNG <?=$status==1?'CHƯA XỬ LÝ':($status==2?'ĐANG XỬ LÝ':($status==3?'ĐÃ XỬ LÝ':'ĐÃ HỦY'))?></h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>STT</th>
			<th>ID</th>
			<th>Ngày tạo đơn:</th>
			<th>Hoạt động</th>
		</tr>
	</thead>
<tbody>
	<?php $count=1;?>
	<?php foreach($result as $item):?>
		<tr>
			<td><?=$count++?></td>
			<td><?=$item['id']?></td>
			<td><?=$item['orderdate']?></td>
			<td><a class="btn btn-sm btn-info" href="?option=orderdetail&id=<?=$item['id']?>">Chi tiết</a> <a  style="display: <?=$status==4?'':'none'?>;" class="btn btn-sm btn-danger" href="?option=order&id=<?=$item['id']?>" onclick="return confirm('Bạn có muốn xóa không')">Xóa</a></td>
		</tr>
	<?php endforeach;?> 
</tbody>

</table>