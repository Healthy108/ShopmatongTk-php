<?php 
	if(isset($_GET['option'])):
		switch($_GET['option']):
			case'home':include"views/home.php"; break;
			case'news':include"views/news.php";break;
			case'feedback':include"views/feedback.php";break;
			case'writefeedback':include"views/writefeedback.php";break;
			case'cart':include"views/cart.php";break;
			case'signin':include"views/signin.php";break;
			case'register':include"views/register.php";break;
			case'logout': unset($_SESSION['member']); header("location: .");break;
			case'productdetail':include"views/productdetail.php";break;
			case'showproducts':include"views/showproducts.php";break;
			case'order':include"views/order.php";break;
			case'ordersuccess': include"views/ordersuccess.php";break;
		endswitch;
	else:
		include"views/home.php";
	endif;
?>