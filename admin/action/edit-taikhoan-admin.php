
<?php
require_once('../../DataProvider.php');
$tentaikhoanOld = $_POST['tentaikhoanOld'];
$ten = $_POST['editTentaikhoanadmin'];
$matkhau = $_POST['editMatkhauadmin'];
$quyen = $_POST['editQuyenadmin'];
$sql = "UPDATE `taikhoan` 
SET `Tên tài khoản`='$ten',
`Mật khẩu`='$matkhau',
`Mã quyền`='$quyen'
WHERE `Tên tài khoản`='$tentaikhoanOld'";
echo $sql;
$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>
