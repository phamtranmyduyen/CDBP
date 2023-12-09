<?php
require_once('../../DataProvider.php');
$matieuchi = $_POST['matieuchi'];
$sql = "DELETE FROM tieuchichamdiem
        WHERE `Mã tiêu chí`='$matieuchi'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>