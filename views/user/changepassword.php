<?php
   $query="select*from member where username='".$_SESSION['member']."'";
   $member=mySqli_fetch_array($connect->query($query));
?>

<?php
   if(isset($_POST['newpassword'])):
        $username=$member['username'];
        $newpassword = md5($_POST['newpassword']);
        //xác nhận mật khẩu hiện tại
        $currentPassword = md5($_POST['password']);
        $password = $member['password'];
        
        if ($currentPassword == $password) {
            $query = "update member set password='$newpassword' where username = '$username'";
            if ($connect->query($query)) {
                echo"<script>alert('Cập nhật mật khẩu thành công!');</script>";
            } else {
                echo"<script>alert('Cập nhật mật khẩu thất bại.');</script>";
            }
        } else {
            echo"<script>alert('Mật khẩu hiện tại không đúng.');</script>";
        }
   endif;
?>

<form class='profile_container' method="post" onsubmit="if(newpasswordconfirm.value!=newpassword.value)
{alert('Xác nhận mật khẩu mới không đúng!'); newpasswordconfirm.value=''; newpasswordconfirm.focus(); return false;}">
        <h2>Thay đổi mật khẩu</h2>
        <div class="user_image" title="Avatar">
            <image src="http://margram.vn/files/nhan-dan-mat-ong-020.jpg" width="100px" height="100px"/>
        </div>
        <h3>
            <?=$member['username']?>
            <i class="fa-solid fa-pen-to-square" title="Chỉnh sửa" onclick="location='?option=edituser'"></i>
        </h3>
        <div class="user_info">
            <label>Mật khẩu hiện tại: </label>
            <input name="password" type="password" placeholder="Nhập mật khẩu hiện tại" required>
        </div>
        <div class="user_info">
            <label>Mật khẩu mới: </label>
            <input name="newpassword" type="password" placeholder="Nhập mật khẩu mới" required>
        </div>
        <div class="user_info">
            <label>Xác nhận mật khẩu mới: </label>
            <input name="newpasswordconfirm" type="password" placeholder="Nhập lại mật khẩu mới" required>
        </div>
       <div class="user_info">
            <button type="submit">Đổi mật khẩu</button>
       </div>
</form>

<style>
    .profile_container {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .profile_container h2 {
        text-align: center;
    }
    .profile_container h3 {
        text-align: center;
        color: red;
    }
    .profile_container i {
        margin-left: 5px;
        color: #000;
        cursor: pointer;
    }
    .profile_container .user_info {
        display: flex;
        flex-direction: column;
        padding: 10px;
        gap: 3px;
    }
    .profile_container .user_info label, input {
        width: 50%;
        display: flex;   
        margin-left: auto;
        margin-right: auto;
    }
    .profile_container .user_info input {
        height: 30px;
    }
    .user_image {
        display: flex;
        margin-left: auto;
        margin-right: auto;
    }
    .user_image img{
        border-radius: 50%;
        cursor: pointer;
    }
    .profile_container .user_info button {
        width: 20%;
        height: 30px;
        margin: 0 auto;
        text-align: center;
        color: #fff;
        background-color: #6a56ff;
        cursor: pointer;
    }
</style>