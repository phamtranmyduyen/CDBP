
<?php
require_once('../../DataProvider.php');
$tenchucnang = $_POST['addTenchucnang'];
$sqlLayMa = "SELECT `Mã chức năng` as `Mã`
            FROM chucnang
            ORDER BY `Mã chức năng` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã'] = preg_replace("/[^0-9]/ ", '',$row['Mã']);
    $machucnang = sprintf("CN%03d", (int)$row['Mã'] + 1);
    $sql = "INSERT INTO chucnang(`Mã chức năng`,`Tên chức năng`)
        VALUE ('$machucnang','$tenchucnang')";
    $query = DataProvider::executeQuery($sql);
}
if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>