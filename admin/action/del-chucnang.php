<?php
require_once('../../DataProvider.php');
$machucnang = $_POST['machucnang'];
$sql = "DELETE FROM chucnang
        WHERE `Mã chức năng`='$machucnang'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>