<?php
   $query="select*from member where username='".$_SESSION['member']."'";
   $member=mySqli_fetch_array($connect->query($query));
?>

<div class='profile_container'>

        <h2>Thông tin người dùng</h2>
        <div class="user_image" title="Avatar">
            <image src="http://margram.vn/files/nhan-dan-mat-ong-020.jpg" width="100px" height="100px"/>
        </div>
        <h3>
            <?=$member['username']?>
            <i class="fa-solid fa-pen-to-square" title="Chỉnh sửa" onclick="location='?option=edituser'"></i>
        </h3>
        <div class="user_info">
            <label>Tên đầy đủ: </label>
            <input name="fullname" value="<?=$member['fullname']?>" disabled>
        </div>
        <div class="user_info">
            <label>Điện thoại: </label>
            <input name="mobile" value="<?=$member['mobile']?>" disabled>
        </div>
        <div class="user_info">
            <label>Địa chỉ: </label>
            <input name="address" value="<?=$member['address']?>" disabled>
        </div>
       <div class="user_info">
            <label>Email: </label>
            <input name="email" value="<?=$member['email']?>" disabled>
       </div>
    </div>
</div>

<style>
    .profile_container {
        padding: 100px;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }
    .profile_container h2 {
        margin-top: -60px;
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
</style>