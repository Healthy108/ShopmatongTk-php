<?php
   $query="select*from member where username='".$_SESSION['member']."'";
   $member=mySqli_fetch_array($connect->query($query));
?>

<?php
   if(isset($_POST['fullname']) || isset($_POST['mobile']) || isset($_POST['address']) || isset($_POST['email'])):
        $username=$member['username'];
        $fullnameUpdate = $_POST['fullname'];
        $mobileUpdate=$_POST['mobile'];
        $addressUpdate=$_POST['address'];
        $emailUpdate=$_POST['email'];

        $query = "update member set fullname='$fullnameUpdate', mobile='$mobileUpdate', 
        address='$addressUpdate', email='$emailUpdate' where username = '$username'";
        if ($connect->query($query)) {
            echo"<script>alert('Cập nhật thông tin thành công!');</script>";
        } else {
            echo"<script>alert('Cập nhật thông tin thất bại.');</script>";
        }

   endif;
?>

<form class='profile_container' method="post">
        <h2>Chỉnh sửa thông tin người dùng</h2>
        <div class="user_image" title="Avatar">
            <image src="http://margram.vn/files/nhan-dan-mat-ong-020.jpg" width="100px" height="100px"/>
        </div>
        <h3>
            <?=$member['username']?>
            <i class="fa-solid fa-user" title="Thông tin người dùng" onclick="location='?option=user'"></i>
        </h3>
        <div class="user_info">
            <label>Tên đầy đủ: </label>
            <input name="fullname" value="<?=$member['fullname']?>">
        </div>
        <div class="user_info">
            <label>Điện thoại: </label>
            <input name="mobile" value="<?=$member['mobile']?>">
        </div>
        <div class="user_info">
            <label>Địa chỉ: </label>
            <input name="address" value="<?=$member['address']?>">
        </div>
       <div class="user_info">
            <label>Email: </label>
            <input name="email" value="<?=$member['email']?>">
       </div>
       <div class="user_info">
            <button type="submit">Update</button>
       </div>
       <br>
       <span onclick="location='?option=changepassword'">Đổi mật khẩu?</span>
</form>

<style>
    .profile_container {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        text-align: center;
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
    .profile_container .user_info button {
        width: 20%;
        height: 30px;
        margin: 0 auto;
        text-align: center;
        color: #fff;
        background-color: #6a56ff;
        cursor: pointer;
    }
    .profile_container span {
        cursor: pointer;
    }
    .profile_container span:hover {
        color: blue;
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
</style>