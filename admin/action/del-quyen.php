<?php
require_once('../../DataProvider.php');
$maquyen = $_POST['maquyen'];
$sqlTmp = "DELETE FROM quyen_chucnang
    WHERE `Mã quyền`='$maquyen'";
$queryTmp = DataProvider::executeQuery($sqlTmp);
$sql = "DELETE FROM bangquyen
        WHERE `Mã quyền`='$maquyen'";
$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Xóa thành công";
} else echo "Xóa thất bại";
