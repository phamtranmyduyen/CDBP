
<?php
require_once('../DataProvider.php');
$mathongbao = $_POST['mathongbao'];
$ngaythuchien = $_POST['editNgaythuchien'];
$ngayhethan = $_POST['editNgayhethan'];
$noidung = $_POST['editNoidung'];
$sql = "UPDATE `thongbao` 
SET `Ngày thực hiện`='$ngaythuchien ',
`Ngày hết hạn`='$ngayhethan',
`Nội dung thông báo`='$noidung'
WHERE `Mã thông báo`='$mathongbao '";

$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>