<?php
require_once('../../DataProvider.php');
$tentaikhoan = $_POST['addTentaikhoan'];
$matkhau = $_POST['addMatkhau'];
$tenquyen = $_POST['addTenquyen'];
//echo "222222";

$sql2 = "INSERT INTO taikhoan
            VALUES ('$tentaikhoan','$matkhau','0','$tenquyen')";
//echo $sql2;
$query2 = DataProvider::executeQuery($sql2);


if ($query2) {
    echo "Tạo thành công";
} else echo "Tạo thất bại";
