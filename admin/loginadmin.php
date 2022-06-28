<section style="text-align: center; color: black; font-weight: bold; background: snow; height: 608px">
	<h1 style="line-height: 50px; font-size: 20px;">ĐĂNG NHẬP TÀI KHOẢN ADMIN</h1>
	<section style="font-weight: bold; color: blue;"><?=isset($alert)?$alert:""?></section><br>
	<section>
		<form method="post">
			<section>
				<label>Username:</label><input type="text" name="username" required>
			</section><br>
			<section>
				<label>Password: </label><input type="password" name="password" required>
			</section><br>
			<section><input type="submit" value="Đăng nhập"></section>
		</form>
	</section>
</section>