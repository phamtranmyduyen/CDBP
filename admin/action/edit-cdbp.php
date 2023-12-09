
<?php
require_once('../../DataProvider.php');
$macdbp = $_POST['editMacdbp'];
$tencdbp = $_POST['editTencdbp'];
$ngaythanhlap = $_POST['editNgaythanhlap'];
$ngayketthuc = $_POST['editNgayketthuc'];
$sql = "UPDATE `cdbp` 
SET `Tên CDBP`='$tencdbp',
`Ngày thành lập`='$ngaythanhlap',
`Ngày kết thúc`='$ngayketthuc'
WHERE `Mã CDBP`='$macdbp'";

$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>