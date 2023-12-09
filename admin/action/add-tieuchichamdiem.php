
<?php
require_once('../../DataProvider.php');

$noidungtieuchi = $_POST['addNoidungtieuchi'];
$diemchuantieuchi = $_POST['addDiemchuantieuchi'];
$sqlLayMa = "SELECT `Mã tiêu chí` as `Mã`
            FROM tieuchichamdiem
            ORDER BY `Mã tiêu chí` DESC 
            LIMIT 1";
$queryLayMa = DataProvider::executeQuery($sqlLayMa);

while ($row = mysqli_fetch_array($queryLayMa)) {
    $row['Mã'] = preg_replace("/[^0-9]/ ", '',$row['Mã']);
    $matieuchi = sprintf("TC%03d", (int)$row['Mã'] + 1);
    $sql = "INSERT INTO tieuchichamdiem(`Mã tiêu chí`,`Nội dung tiêu chí`, `Điểm chuẩn tiêu chí`)
        VALUE ('$matieuchi','$noidungtieuchi','$diemchuantieuchi')";
    $query = DataProvider::executeQuery($sql);
}
if ($query) {
    echo "Thêm thành công";
} else echo "Thêm thất bại";
?>