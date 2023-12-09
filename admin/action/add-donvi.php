
<?php
require_once('../../DataProvider.php');
$tendonvi = $_POST['addTendonvi'];
$diachi = $_POST['addDiachidonvi'];
$sodienthoai = $_POST['addSodienthoaidonvi'];
$email = $_POST['addEmaildonvi'];
$tencdbp = $_POST['addTencdbp'];
$sqlLayMa = "SELECT `Mã đơn vị` as `Mã`
            FROM donvi
            ORDER BY `Mã đơn vị` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);



$sqlLayMaCDBP = "SELECT `Mã CDBP`
                FROM cdbp
                WHERE `Tên CDBP`='$tencdbp'";

$queryLayMaCDBP = DataProvider::executeQuery($sqlLayMaCDBP);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã'] = preg_replace("/[^0-9]/ ", '',$row['Mã']);
    while ($row2 = mysqli_fetch_array($queryLayMaCDBP)) {
        $madonvi = sprintf("DV%03d", (int)$row['Mã'] + 1);
        $sql = "INSERT INTO donvi(`Mã đơn vị`,`Tên đơn vị`, `Địa chỉ`, `Số điện thoại`, `Email`,`Mã CDBP`)
        VALUES ('$madonvi','$tendonvi','$diachi','$sodienthoai','$email','" . $row2['Mã CDBP'] . "');";
        $query = DataProvider::executeQuery($sql);
        
    }
}
if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>