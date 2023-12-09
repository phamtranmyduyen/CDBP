<?php
require_once('../DataProvider.php');
if(isset($_POST['arrHienthiGioithieu']))
{
    $arrHienthi = $_POST['arrHienthiGioithieu'];
    foreach($arrHienthi as $value)
    {
        $sql = "SELECT `Hiển thị`
                FROM gioithieu gt
                WHERE gt.`Mã giới thiệu` = '$value'";
        $query = DataProvider::executeQuery($sql);
        $row = mysqli_fetch_array($query);
        echo $row['Hiển thị']." ";
    }
}
if(isset($_POST['arrHienthiChitietgioithieu']))
{
    $arrHienthi = $_POST['arrHienthiChitietgioithieu'];
    foreach($arrHienthi as $value)
    {
        $sql = "SELECT `Hiển thị`
                FROM chitietgioithieu ctgt
                WHERE ctgt.`Mã chi tiết giới thiệu` = '$value'";
        $query = DataProvider::executeQuery($sql);
        $row = mysqli_fetch_array($query);
        echo $row['Hiển thị']." ";
    }
}
?>