
<?php
require_once('../../DataProvider.php');
$tentaikhoanOld = $_POST['tentaikhoanOld'];
$tentaikhoan = $_POST['editTentaikhoan'];
$matkhau = $_POST['editMatkhau'];
$quyen = $_POST['editQuyen'];
$sql = "UPDATE `taikhoan` 
SET `Tên tài khoản`='$tentaikhoan',
`Mật khẩu`='$matkhau ',
`Mã quyền`='$quyen'
WHERE `Tên tài khoản`='$tentaikhoanOld'";
$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>