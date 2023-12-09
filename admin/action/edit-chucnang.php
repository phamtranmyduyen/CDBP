
<?php
require_once('../../DataProvider.php');
$machucnang = $_POST['editMachucnang'];
$tenchucnang = $_POST['editTenchucnang'];
$sql = "UPDATE `chucnang` 
SET `Tên chức năng`='$tenchucnang' 
WHERE `Mã chức năng`='$machucnang'";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thay đổi thành công";
}
else echo "Thay đổi thất bại";
?>