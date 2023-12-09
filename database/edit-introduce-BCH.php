
<?php
require_once('../DataProvider.php');
$magioithieu = $_POST['magioithieu'];
$noidung = $_POST['editNoidung'];
$hinhanh = $_POST['editHinhanh'];
$sql = "UPDATE `gioithieu` 
SET `Nội dung giới thiệu`='$noidung',
`Hình ảnh`='$hinhanh'
WHERE `Mã giới thiệu`='$magioithieu '";

$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>