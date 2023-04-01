<?php session_start();?>
<?php $connect = new MySqli('localhost','root','','webmatongsql');?>
<?php ob_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1">
	<title>Shop mật ong TK!</title>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-free-5.15.4-web/css/all.min.css">
	<link 
		rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
		integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" 
		crossorigin="anonymous" referrerpolicy="no-referrer" 
	/>
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<link rel="stylesheet" type="text/css" href="css/style2.css">
</head>

<body class="body">
	<header>
		<?php include"views/layout/header.php";?>
	</header>
	<!-- <aside><?php include"views/layout/left.php";?></aside> -->
	<article>
		<?php include"views/layout/article.php";?>
	</article>
	<div style="position: fixed; right: 15px; bottom: 15px; z-index: 999; color: red">
		<a href="https://www.facebook.com/messages/t/100011911782194">
			<img src="https://www.mdsiglobal.com/wp-content/uploads/2018/09/messenger-1495274_1920.png" width="90%" height="65px">
		</a>
	</div>
	<!-- <aside><?php include"views/layout/right.php";?></aside> -->
	<footer>
		<?php include"views/layout/footer.php";?>
	</footer>
</body>
</html>