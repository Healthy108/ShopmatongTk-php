<?php session_start();?>
<?php $connect = new MySqli('localhost','root','','webmatongsql');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ADMIN</title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="cssadmin.css">
	<script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<?php
	if(isset($_POST['username'])){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$query="select*from admin where username='$username' and password='$password'";
		$result=$connect->query($query);
		if(mySqli_num_rows($result)==0){
			$alert="Sai tên đăng nhập hoặc mật khẩu!";
		}else{
			$result=mySqli_fetch_array($result);
			if($result['status']==0){
				$alert="Tài khoản đang bị khóa!";
			}else{
				$_SESSION['admin']=$username;
				header("Refresh:0");
			}

		}
	}
?>

<section>
	<?php if(isset($_SESSION['admin'])){
		include"admincontrolpanel.php";
	}else{
		include"loginadmin.php";
	} 
?>
</section>
</body>
</html>