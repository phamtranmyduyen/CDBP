
<?php
require_once('../../DataProvider.php');
$machitiettieuchi= $_POST['editMachitiettieuchi'];
$noidungchitiettieuchi = $_POST['editNoidungchitiettieuchi'];
$diemchuanchitiettieuchi = $_POST['editDiemchuanchitiettieuchi'];;
$noidungtieuchi = $_POST['editNoidungtieuchi'];
$query;
$sqlLayMaTC = "SELECT `Mã tiêu chí`
                FROM tieuchichamdiem
                WHERE `Nội dung tiêu chí`='$noidungtieuchi'";
$queryLayMaTC = DataProvider::executeQuery($sqlLayMaTC);
while ($row = mysqli_fetch_array($queryLayMaTC)) {
    $sql = "UPDATE `chitiettieuchichamdiem` 
            SET `Nội dung chi tiết tiêu chí`='$noidungchitiettieuchi',
            `Điểm chuẩn chi tiết tiêu chí`='$diemchuanchitiettieuchi',
            `Mã tiêu chí`='".$row['Mã tiêu chí']."'
            WHERE `Mã chi tiết tiêu chí`='$machitiettieuchi'";
    $query = DataProvider::executeQuery($sql);
}

if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>