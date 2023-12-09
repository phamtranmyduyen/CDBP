<?php
require_once('../../DataProvider.php');
$ten = $_POST['tentaikhoanadmin'];
$sqlCDBP = "DELETE FROM cdbp
        WHERE `Tên tài khoản`='$ten'";
$queryCDBP = DataProvider::executeQuery($sqlCDBP);
$sqlBCH = "DELETE FROM thanhvienbch
        WHERE `Tên tài khoản`='$ten'";
$queryBCH = DataProvider::executeQuery($sqlBCH);
$sql = "DELETE FROM taikhoan
        WHERE `Tên tài khoản`='$ten'";
$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Xóa thành công";
} else echo "Xóa thất bại";
