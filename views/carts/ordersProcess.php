<?php
    $nameUser = $_SESSION['member'];
    $idUser = "select*from member where fullname = ('$nameUser')";
    $memberid = mySqli_fetch_array($connect->query($idUser))['id'];
    $query="select*from orders where memberid=$memberid";
    $orders=($connect->query($query));
?>

<div class="ordersProcess">
    <?php $count=1;?>
    <h1>Đơn hàng của: <?=$nameUser?></h1>
    <table border=1>
        <th>STT</th>
        <th>Mã đơn hàng</th>
        <th>Trạng thái đơn hàng</th>
        <th>Ngày tạo đơn</th>
        <th>Hoạt động</th>
        <tbody>
            <?php foreach($orders as $item):?>
                <tr>
                    <td><?=$count++?></td>
                    <td><?=$item['id']?></td>
                    <td>
                        <?=$item['status'] == 1 ? '<span>Chưa xử lý</span>' : ''?>
                        <?=$item['status'] == 2 ? '<span>Đang xử lý</span>' : ''?>
                        <?=$item['status'] == 3 ? '<span>Đã xử lý</span>' : ''?>
                        <?=$item['status'] == 4 ? '<span>Đã bị hủy</span>' : ''?>
                    </td>
                    <td><?=$item['orderdate']?></td>
                    <td>
                        <button onclick="location='?option=orderuserdetails&id=<?=$item['id']?>'">Xem chi tiết</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .ordersProcess {
        height: auto;
        min-height: 100vh;
        text-align: center;
    }
    .ordersProcess table {
        margin: 0 auto;
        width: 80%;
    }
    .ordersProcess th, tr, td {
        height: 30px;
    }
</style>