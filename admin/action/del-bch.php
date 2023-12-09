<?php
require_once('../../DataProvider.php');
$mabch= $_POST['mabch'];
$sql = "DELETE FROM bch
        WHERE `Mã ban chấp hành CDBP`='$mabch'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>