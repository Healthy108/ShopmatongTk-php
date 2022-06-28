<?php 
	if(isset($_POST['content'])):
		$content=$_POST['content'];
		$productId=$_GET['id'];
		if(isset($_SESSION['member'])):
			$memberid=mySqli_fetch_array($connect->query("select*from member where username='".$_SESSION['member']."'"));
			$memberid=$memberid['id'];
			$connect->query("insert comments(memberid,productId,date,content) values($memberid,$productId,now(),'$content')");
			echo"<script>alert('Chúc mừng bạn đã comment thành công, comment của bạn sẽ sớm được hiển thị!')</script>";
		else:
			$_SESSION['content']=$content;
			echo"<script>alert('Bạn phải đăng nhập để comment!'); location='?option=signin&productId=$productId';</script>";
		endif;
	endif;
 ?>
<?php
	if(isset($_GET['id'])):
		$query="select*from products where id=".$_GET['id'];
		$result=$connect->query($query);
		$item=mySqli_fetch_array($result);
	endif;
?>
<section style="text-align: center;">
	<h1><?=$item['name']?></h1>
	<hr>
	<section>
			<section><a href="?option=productdetail&id=<?=$item['id']?>"><img src="images/<?=$item['image']?>" width = 100%></a></section>
			<section><?=$item['name'] ?></section>
			<section><?=number_format($item['price'],0,',','.') ?> VNĐ</section>
			<section><input type="button" value="Đặt mua" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';"></section>
	</section>
	<hr>
	<section><?=$item['description']?></section>
	<hr>
</section>
<section>
	<h2>Nhận xét của khách hàng: </h2>
	<?php 
		$comments=$connect->query("select*from member a join comments b on  a.id=b.memberid join products c on b.productid=c.id where b.status and productId=".$_GET['id']);
		if(mySqli_num_rows($comments)==0):
			echo"<section style='colour:green'>No comments!</section>";
		else:
			foreach($comments as $comment):
	?>
				<section style="font-weight: bold;"><?=$comment['username']?>:</section>
				<section style="margin-left: 2%"><?=$comment['content']?></section>
	<?php
			endforeach;
		endif;
	?>
	<form method="post">
		<section>
		<textarea name="content" style="width: 99%" rows="5" placeholder="Write comment here...."></textarea>
		</section>
		<section><input type="submit" value="Submit"></section>
	</form>
</section> 