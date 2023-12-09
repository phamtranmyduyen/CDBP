<?php
require_once('../../DataProvider.php');
$macdbp= $_POST['macdbp'];
$sql = "DELETE FROM cdbp
        WHERE `Mã CDBP`='$macdbp'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>