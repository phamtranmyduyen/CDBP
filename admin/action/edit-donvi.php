
<?php
require_once('../../DataProvider.php');
$madonvi = $_POST['editMadonvi'];
$tendonvi = $_POST['editTendonvi'];
$diachi = $_POST['editDiachi'];
$sodienthoai = $_POST['editSodienthoai'];
$email = $_POST['editEmail'];
$tencdbp = $_POST['editTencdbp'];
$query;
$sqlLayMaCDBP = "SELECT `Mã CDBP`
                FROM cdbp
                WHERE `Tên CDBP`='$tencdbp'";
$queryLayMaCDBP = DataProvider::executeQuery($sqlLayMaCDBP);
while ($row = mysqli_fetch_array($queryLayMaCDBP)) {
    $sql = "UPDATE `donvi` 
            SET `Tên đơn vị`='$tendonvi',
            `Địa chỉ`='$diachi',
            `Số điện thoại`='$sodienthoai',
            `Email`='$email',
            `Mã CDBP`='".$row['Mã CDBP']."'
            WHERE `Mã đơn vị`='$madonvi'";
    $query = DataProvider::executeQuery($sql);
}

if ($query) {
    echo "Thay đổi thành công";
} else echo "Thay đổi thất bại";
?>