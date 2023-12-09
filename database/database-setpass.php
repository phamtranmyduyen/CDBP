<?php
require_once("../DataProvider.php");
$tentaikhoan = $_POST['tentaikhoan'];
$passnew = $_POST['passnew'];
$sql = "UPDATE `taikhoan`
        SET `Mật khẩu` = '$passnew'
        WHERE `Tên tài khoản` = '$tentaikhoan'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thay đổi thành công";
}
else
    echo "Thay đổi thất bại";
?>