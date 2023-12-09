<?php
require_once('../../DataProvider.php');
$madonvi = $_POST['madonvi'];
$sql = "DELETE FROM donvi
        WHERE `Mã đơn vị`='$madonvi'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>