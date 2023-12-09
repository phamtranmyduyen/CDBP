
<?php
require_once('../../DataProvider.php');
$ma = $_POST['editMaThanhvienbch'];
$ten= $_POST['editTenThanhvienbch'];
$chucvu = $_POST['editChucvuThanhvienbch'];
$sdt = $_POST['editSodienthoaiThanhvienbch'];
$email = $_POST['editEmailThanhvienbch'];
$bch = $_POST['editBCHThanhvienbch'];
$sql = "UPDATE `thanhvienbch` 
SET `Tên thành viên BCH CDBP`='$ten',
`Chức vụ`='$chucvu',
`Số điện thoại`='$sdt',
`Email`='$email',
`Mã ban chấp hành CDBP`='$bch'
WHERE `Mã thành viên BCH CDBP`='$ma'";
$query = DataProvider::executeQuery($sql);
if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>