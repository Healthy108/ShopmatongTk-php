<?php
	$brand=mysqli_fetch_array($connect->query("select*from brands where id=".$_GET['id']));
?>

<?php
	if(isset($_POST['name'])):
		$name=$_POST['name'];
		$query="select*from brands where name='$name' and id!=".$brand['id'];
		if(mysqli_num_rows($connect->query($query))!=0):
			$alert="Tên hãng đã tồn tại!";
		else:
			$status=$_POST['status'];
			$query="update brands set name='$name',status='$status' where id=".$brand['id'];
			$connect->query($query);
			header("location: ?option=brand");
		endif;
	endif;

?>
<h1>Update hãng sản phẩm</h1>
<section style="color: #990000; text-align: center;"><?=isset($alert)?$alert:''?></section>
<section class="container col-md-5">
	<form method="post">
		<section class="form-group">
			<label>Tên hãng:</label>
			<input name="name" value="<?=$brand['name']?>" class="form-control">
		</section>
		<section class="form-group">
			<label>Trạng thái hãng:</label><br>
			<input type="radio" name="status" value="1" <?=$brand['status']==1?'checked':''?>> Active 
			<input type="radio" name="status" value="0" <?=$brand['status']==0?'checked':''?>> Unactive
		</section>
		<section>
			<input type="submit" value="Update" class="btn btn-success">
			 <input type="button" value="<< Back" onclick="location='?option=brand';"class="btn btn-secondary">
		</section>
	</form>
</section>