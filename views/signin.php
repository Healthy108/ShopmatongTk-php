<?php
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$query = "select*from member where username='$username' and password='$password'";
	$result = $connect->query($query);
	if(mySqli_num_rows($result)==0){
		$alert="Sai tên đăng nhập hoặc mật khẩu";
	}else{
		$result=mySqli_fetch_array($result);
		if($result['status']==1){
			$alert="Tài khoản của bạn đang bị khóa hoặc đang trong quá trình xử lý!";
		}else{
			$_SESSION['member']=$username;
			if(isset($_GET['order'])){
				header("location: ?option=order");
			}elseif(isset($_GET['productId'])){
				$memberid=$result['id'];
				$productId=$_GET['productId'];
				$content=$_SESSION['content'];
				$connect->query("insert comments(memberid,productId,date,content) values($memberid,$productId,now(),'$content')");
			echo"<script>alert('Chúc mừng bạn đã comment thành công, comment của bạn sẽ sớm được hiển thị!'); location='?option=productdetail&id=$productId';</script>";
			}
			elseif(isset($_GET['id'])){
				$memberid=$result['id'];
				$productid=$_GET['id'];
				$connect->query("insert carts(memberid,productid) values($memberid,$productid)");
			header('location: ?option=cart');
			}else{
			header('location: ?option=home');
			}
		}
	}
}
?>
<section style="text-align: center; color: black; min-height: 100vh; margin-top: -35px;
		background: url(https://ongvietnam.vn/wp-content/uploads/2019/02/banner-mat-ong-1.jpg) no-repeat;
		background-size: cover;">
	<h2 style="line-height: 50px; font-size: 30px;">Đăng nhập tài khoản</h2>
	<section><?=isset($alert)?$alert:""?></section>
	<section>
		<form method="post">
			<section>
				<label>Username: </label><input type="text" name="username" required>
			</section><br>
			<section>
				<label>Password: </label><input type="password" name="password" required>
			</section><br>
			<section><input type="submit" value="Đăng nhập"></section>
		</form><br>

		<label style="color: blue;"><u>No account?</u> <a href="?option=register" style="color: blue;">Register !</a></label>
	</section>
</section>
