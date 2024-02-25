<?php
	if (isset($_POST['username'])):
		$username = $_POST['username'];
		$query = "select*from member where username = '$username'";
		$result = $connect->query($query);
		if(mysqli_num_rows($result) > 0):
			$alert ="Tên đăng nhập này đã có người sử dụng.";
		else:
			$password = md5($_POST['password']);
			$fullname = $_POST['fullname'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$query = "insert member(username,password,fullname,mobile,address,email) values ('$username','$password','$fullname','$mobile','$address','$email')";
			$connect->query($query);
			header("location: ?option=signin");
		endif;
	endif;

?>

<section class="register">

	<h1 style="text-align: center; font-size: 30px; padding-top: 50px">Đăng ký tài khoản</h1>
	
	<section>
		<section><?=isset($alert)?$alert:""?></section>
		<form method="post" onsubmit="if(confirmpassword.value!=password.value){alert('Xác nhận mật khẩu không đúng!'); confirmpassword.value=''; confirmpassword.focus(); return false;}">
			<section>
				<label>Username: </label>
				<input type="text" name="username" required>
			</section><br>
			<section>
				<label>Password: </label>
				<input type="password" name="password" required>
			</section><br>
			<section>
				<label>Confirm password:</label>
				<input type="password" name="confirmpassword" required>
			</section><br>
			<section>
				<label>Fullname: </label>
				<input type="text" name="fullname" required>
			</section><br>
			<section>
				<label>Mobile: </label>
				<input type="tel" name="mobile" required>
			</section><br>
			<section>
				<label style="line-height: 45px">Address: </label>
				<textarea rows="3" name="address" placeholder="Nhập địa chỉ" required></textarea>
			</section><br>
			<section>
				<label>Email: </label>
				<input type="Email" name="email">
			</section><br>
			<section style="text-align:center">
				<input type="submit" value="Sign up">
			</section>
		</form>
	</section>
</section>

