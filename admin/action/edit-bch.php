
<?php
require_once('../../DataProvider.php');
$mabch = $_POST['editMaBch'];
$bchsoluong = $_POST['editBchSoluong'];
$bchkhoa = $_POST['editBchKhoa'];
$bchngaythanhlap = $_POST['editBchNgaythanhlap'];
$bchngayketthuc = $_POST['editBchNgayketthuc'];
$sql = "UPDATE `bch` 
SET `Số lượng`='$bchsoluong',
`Khóa`='$bchkhoa',
`Ngày thành lập`='$bchngaythanhlap',
`Ngày kết thúc`='$bchngayketthuc'
WHERE `Mã ban chấp hành CDBP`='$mabch'";

$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>