<?php
require_once('../../DataProvider.php');
$ma = $_POST['mathanhvienbch'];
$sql = "DELETE FROM thanhvienbch
        WHERE `Mã thành viên BCH CDBP`='$ma'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>