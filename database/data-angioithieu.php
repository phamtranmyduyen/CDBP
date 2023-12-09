<?php
require_once('../DataProvider.php');
if (isset($_POST['magioithieu'])) {
    $ma = $_POST['magioithieu'];
    $sqlUpdateTrangthai = "UPDATE gioithieu gt
                    SET gt.`Hiển thị` = '1'
                    WHERE gt.`Mã giới thiệu` = '$ma'";
    $queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
    $sqlUpdateTrangthaiChitiet = "UPDATE chitietgioithieu ctgt
                    SET ctgt.`Hiển thị` = '1'
                    WHERE ctgt.`Mã giới thiệu` = '$ma'";
    $queryUpdateTrangthaiChitiet = DataProvider::executeQuery($sqlUpdateTrangthaiChitiet);
    if ($queryUpdateTrangthai &&  $queryUpdateTrangthaiChitiet) {
        echo "Đã ẩn";
    } else
        echo "Ẩn thất bại";
}
if (isset($_POST['machitietgioithieu'])) {
    $ma = $_POST['machitietgioithieu'];
    $sqlUpdateTrangthaiChitiet = "UPDATE chitietgioithieu ctgt
                    SET ctgt.`Hiển thị` = '1'
                    WHERE ctgt.`Mã chi tiết giới thiệu` = '$ma'";
    $queryUpdateTrangthaiChitiet = DataProvider::executeQuery($sqlUpdateTrangthaiChitiet);
    if ($queryUpdateTrangthaiChitiet) {
        echo "Đã ẩn";
    } else
        echo "Ẩn thất bại";
}



