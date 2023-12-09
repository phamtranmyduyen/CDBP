<?php
require_once('../DataProvider.php');
$mabangdiem = $_POST['mabangdiem'];
$sqlUpdateTrangthai = "UPDATE bangchamdiem bd
                    SET bd.`Khóa chỉnh sửa` = '1'
                    WHERE bd.`Mã bảng chấm điểm` = '$mabangdiem'";
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
if ($queryUpdateTrangthai) {
    echo "Đã khóa";
} else
    echo "Khóa thất bại";
