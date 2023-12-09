<?php
require_once('../DataProvider.php');
$sqlUpdateTrangthai = "UPDATE bangchamdiem bd
                    SET bd.`Khóa chỉnh sửa` = '1'";
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
if ($queryUpdateTrangthai) {
    echo "Đã khóa tất cả";
} else
    echo "Khóa tất cả thất bại";
