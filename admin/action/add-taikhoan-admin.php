
<?php
require_once('../../DataProvider.php');
$ten = $_POST['addTentaikhoanadmin'];
$matkhau = $_POST['addMatkhauadmin'];
$quyen = $_POST['addQuyenadmin'];
echo "1111111";
$sql = "INSERT INTO taikhoan
        VALUE ('$ten','$matkhau','0','$quyen')";
        echo $sql;
$query = DataProvider::executeQuery($sql);
if($query)
{
    echo "Thêm thành công";
}
else echo "Thêm thất bại";
?>