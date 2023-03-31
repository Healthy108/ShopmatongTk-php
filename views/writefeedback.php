<?php 
	if(isset($_POST['contentFeedBack'])):
        $contentFeedBack=$_POST['contentFeedBack'];
		$starts=$_POST['starts'];
            if (isset($_SESSION['member'])) {
                //Xu ly phan anh:
                $store="images/";
                $imageName=$_FILES['image']['name'];
                $imageTemp=$_FILES['image']['tmp_name'];
                $exp3=substr($imageName, strlen($imageName)-3);#abcd.jpg
                $exp4=substr($imageName, strlen($imageName)-4);#jepg, wwep,...
                if($exp3=='jpg'||$exp3=='png'||$exp3=='bmp'||$exp3=='gif'||$exp3=='JPG'||$exp3=='PNG'||$exp3=='BMP'||
                    $exp3=='GIF'||$exp4=='jpeg'||$exp4=='JPEG'||$exp4=='webp'||$exp4=='WEBP'){
                        $imageName=time().'_'.$imageName;
                        move_uploaded_file($imageTemp, $store.$imageName);
                    $memberid=mySqli_fetch_array($connect->query("select*from member where username='".$_SESSION['member']."'"));
                    $userName=$memberid['username'];
                    $connect->query("insert into feedbacks(image, contentFeedBack, starts, username) values('$imageName', '$contentFeedBack', $starts, '$userName')");
                    echo"<script>alert('Chúc mừng bạn đã gửi feedBack thành công!'); location='?option=feedback'</script>";
                } else {
                    $alert="File đã chọn không phải file ảnh!";
                }
            }else{
                echo"<script>alert('Bạn phải đăng nhập để gửi feedBack!'); location='?option=signin';</script>";
            };
	endif;
 ?>



<form class="writefeedback_container" method="post" enctype="multipart/form-data">
    <div style="padding-top: 50px">
        <h2>Nhập feedBack của bạn tại đây!</h2>
        <span>Bạn thấy chất lượng sản phẩm của shop thế nào?</span>
        <br>
        <span>Hãy đánh giá shop 5 sao nhé :D</span>

        <div style="margin-top: 20px; margin-left: 80px">
			<label>Chọn ảnh: </label>
            <input type="file" name="image">
		</div>
        <input style="margin-top: 15px" type="text" name="contentFeedBack" placeholder="Viết suy nghĩ của bạn..." require>
        <br>
        <input style="margin-top: 5px" type="number" name="starts" max='5' min='1' placeholder="Nhập số sao từ 1 - 5" require>
        <br>
        <button type='submit' style="margin-top: 20px">
            Submit
        </button>
    </div>
</form>

    
<link rel="stylesheet" type="text/css" href="css/cssToastmess.css">
<div id="toast"></div>

<style>
    .writefeedback_container {
        width: 100vw;
        height: 100vh;
        margin-top: -40px;
        text-align: center;
        background: url(https://tiemdongon.com/wp-content/uploads/2020/04/mat_ong_nguyen_chat_hu_500ml-3.jpg) no-repeat;
        background-size: cover;
    }
    .writefeedback_container input, button {
        width: 260px;
    }
</style>