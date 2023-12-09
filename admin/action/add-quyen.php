
<?php
require_once('../../DataProvider.php');
$maquyen = $_POST['addMaquyen'];
$tenquyen = $_POST['addTenquyen'];

$sql = "INSERT INTO bangquyen(`Mã quyền`,`Tên quyền`)
        VALUE ('$maquyen','$tenquyen')";
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thêm thành công";
}
else echo "Thêm thất bại";
?>