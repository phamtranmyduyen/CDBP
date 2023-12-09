<?php
require_once('../DataProvider.php');
$query;
if(isset($_POST['magioithieu']))
{
    // XÓA CÁC CHI TIẾT GIỚI THIỆU
    $magioithieu= $_POST['magioithieu'];
    $sql = "DELETE FROM chitietgioithieu
            WHERE `Mã giới thiệu`='$magioithieu'";
    $query = DataProvider::executeQuery($sql);
    // XÓA GIỚI THIỆU
    $magioithieu= $_POST['magioithieu'];
    $sql = "DELETE FROM gioithieu
            WHERE `Mã giới thiệu`='$magioithieu'";
    $query = DataProvider::executeQuery($sql);    
}
if(isset($_POST['machitietgioithieu']))
{
    $machitietgioithieu= $_POST['machitietgioithieu'];
    $sql = "DELETE FROM chitietgioithieu
            WHERE `Mã chi tiết giới thiệu`='$machitietgioithieu'";
    $query = DataProvider::executeQuery($sql);
}
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>