<?php
require_once("../DataProvider.php");
$tentaikhoan = $_POST['tentaikhoan'];
$sodienthoai = $_POST['sodienthoaiEdit'];
$email = $_POST['emailEdit'];
if($sodienthoai!='')
{
    $sql = "UPDATE `thanhvienbch`
    SET `Số điện thoại` = '$sodienthoai'
    WHERE `Tên tài khoản` = '$tentaikhoan'";
}
if($email!='')
{
    $sql = "UPDATE `thanhvienbch`
    SET `Email` = '$email'
    WHERE `Tên tài khoản` = '$tentaikhoan'";
}
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thay đổi thành công";
}
else
    echo "Thay đổi thất bại";
?>