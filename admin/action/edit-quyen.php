
<?php
require_once('../../DataProvider.php');
$maquyen = $_POST['editMaquyen'];
$tenquyen = $_POST['editTenquyen'];
$sql = "UPDATE `bangquyen` 
SET `Tên quyền`='$tenquyen' 
WHERE `Mã quyền`='$maquyen'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thay đổi thành công";
}
else echo "Thay đổi thất bại";
?>