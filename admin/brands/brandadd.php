<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from brands where name='$name'";
		if(mySqli_num_rows($connect->query($query))!=0){
			$alert="Tên hãng đã tồn tại!";
		}else{
			$status=$_POST['status'];
			$connect->query("insert brands(name,status) values('$name','$status')");
			header("location: ?option=brand");
		}
	}
?>

<h1>Thêm hãng sản xuất</h1>
<section style="font-weight: bold; color: blue; text-align: center;"><?=isset($alert)?$alert:""?></section>
<section class="container col-md-6">
	<form method="post">
		<section class="form-group">
			<label>Tên hãng: </label><input name="name" class="form-control">
		</section>
		<section class="form-group">
			<label>Trạng thái hãng: </label><br> <input type="radio" name="status" value="1" checked>Active	<input type="radio" name="status" value="0">Unactive		
		</section>
		<section><input type="submit" value="Thêm" class="btn btn-primary"> <a href="?option=brand" class="btn btn-outline-secondary"> << BACK</a></section>
	</form>
</section>