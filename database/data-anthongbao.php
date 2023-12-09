<?php
require_once('../DataProvider.php');
$ma = $_POST['ma'];
$sqlUpdateTrangthai = "UPDATE thongbao tb
                    SET tb.`Hiển thị` = '1'
                    WHERE tb.`Mã thông báo` = '$ma'";
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
if ($queryUpdateTrangthai) {
    echo "Đã ẩn thông báo";
} else
    echo "Ẩn thất bại";
