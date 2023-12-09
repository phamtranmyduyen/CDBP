<?php
require_once('../DataProvider.php');
$arrHienthi = $_POST['arrHienthi'];
foreach($arrHienthi as $value)
{
    $sql = "SELECT `Hiển thị`
            FROM thongbao tb
            WHERE tb.`Mã thông báo` = '$value'";
    $query = DataProvider::executeQuery($sql);
    $row = mysqli_fetch_array($query);
    echo $row['Hiển thị']." ";
}
?>