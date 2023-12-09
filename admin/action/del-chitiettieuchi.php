<?php
require_once('../../DataProvider.php');
$machitiettieuchi = $_POST['machitiettieuchi'];
$sql = "DELETE FROM chitiettieuchichamdiem
        WHERE `Mã chi tiết tiêu chí`='$machitiettieuchi'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Xóa thành công";
}
else echo "Xóa thất bại";
?>