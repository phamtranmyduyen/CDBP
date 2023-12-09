<?php
require_once('../DataProvider.php');
$sqlUpdateTrangthai = "UPDATE bangchamdiem bd
                    SET bd.`Khóa chỉnh sửa` = '0'";
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
if ($queryUpdateTrangthai) {
    echo "Đã mở khóa tất cả";
} else
    echo "Mở khóa tất cả thất bại";
