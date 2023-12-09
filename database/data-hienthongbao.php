<?php
require_once('../DataProvider.php');
$ma = $_POST['ma'];
$sqlUpdateTrangthai = "UPDATE thongbao tb
                    SET tb.`Hiển thị` = '0'
                    WHERE tb.`Mã thông báo` = '$ma'";
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
if ($queryUpdateTrangthai) {
    echo "Đã hiển thị";
} else
    echo "Hiển thị thất bại";
