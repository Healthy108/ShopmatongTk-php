<?php $product=mySqli_fetch_array($connect->query("select*from products where id=".$_GET['id']));?>

<?php
	if(isset($_POST['name'])){
		$name=$_POST['name'];
		$query="select*from products where name='$name' and id!=".$product['id'];
		if(mySqli_num_rows($connect->query($query))!=0){
			$alert="Tên sản phẩm đã tồn tại!";
		}else{
			$brandid=$_POST['brandid'];
			$price=$_POST['price'];
			$description=$_POST['description'];
			$status=$_POST['status'];
			//Xu ly phan anh:
			$store="../images/";
			$imageName=$_FILES['image']['name'];
			$imageTemp=$_FILES['image']['tmp_name'];
			$exp3=substr($imageName, strlen($imageName)-3);#abcd.jpg
			$exp4=substr($imageName, strlen($imageName)-4);#jepg, wwep,...
			if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=='JPG'||$exp3=='PNG'||$exp3=='BMP'||$exp3=='GIF'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP'){
				$imageName=time().'_'.$imageName;
				move_uploaded_file($imageTemp, $store.$imageName);
				unlink($store.$product['image']);
			}else{
				$alert="File da chon ko phai file anh!";
			}
			if(empty($imageName)){
				$imageName=$product['image'];
			}
			/////////////
		$connect->query("update products set brandid='$brandid',name='$name',price='$price',image='$imageName',description='$description',status='$status' where id=".$product['id']);
		header("location: ?option=product");
		}
	}
?>

<?php $brands=$connect->query("select*from brands");?>

<h1>Update sản phẩm</h1>
<section style="font-weight: bold; color: blue; text-align: center;"><?=isset($alert)?$alert:""?></section>
<section class="container col-md-6">
	<form method="post" enctype="multipart/form-data">
		<section class="form-group">
			<section>
				<label>Hãng: </label>
				<select name="brandid" class="form-control">
					<option hidden>----Chọn hãng----</option>
					<?php foreach($brands as $item):?>
						<option value="<?=$item['id']?>" <?=$item['id']==$product['brandid']?'selected':''?>><?=$item['name']?></option>
					<?php endforeach;?>
				</select>
			</section>
		<section class="form-group">
			<label>Tên: </label><input name="name" class="form-control" required value="<?=$product['name']?>">
		</section>
		<section class="form-group">
			<label>Giá: </label><input type="number" min="50000" name="price" class="form-control" value="<?=$product['price']?>">
		</section>
		<section class="form-group">
			<label>Ảnh: </label><br>
			<img src="../images/<?=$product['image']?>">
			<input type="file" name="image" class="form-control">
		</section>
		<section class="form-group">
			<label>Mô tả: </label><textarea name="description" id="description"><?=$product['description']?></textarea>
			<script>CKEDITOR.replace("description");</script>
		</section>

		<section class="form-group">
			<label>Trạng thái: </label><br> <input type="radio" name="status" value="1" checked <?=$product['status']==1?'checked':''?>>Active	<input type="radio" name="status" value="0" <?=$product['status']==0?'checked':''?>>Unactive		
		</section>

		<section><input type="submit" value="Update" class="btn btn-primary"> <a href="?option=product" class="btn btn-outline-secondary"> << BACK</a></section>
	</form>
</section>