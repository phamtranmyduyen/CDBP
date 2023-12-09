
<?php
require_once('../../DataProvider.php');

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG
$sqlLaySoLuongChucNang = "SELECT COUNT(*) AS 'Số lượng'
            FROM chucnang";
$queryLaySoLuongChucNang = DataProvider::executeQuery($sqlLaySoLuongChucNang);
$row = mysqli_fetch_array($queryLaySoLuongChucNang);
$countDataChucNang = $row['Số lượng'];
echo "<div style='display:none' id='countchucnang'>$countDataChucNang</div>";
// LOAD_DATA
$query =  DataProvider::executeQuery("SELECT *
                                    FROM chucnang");
while ($row = mysqli_fetch_array($query)) {
    $count++;
    $machucnang = $row['Mã chức năng'];
    $tenchucnang = $row['Tên chức năng'];
    if ($count > $start && $count <= $end) {
        echo
        "<tr>
            <td class=" . $machucnang . ">$machucnang</td>
            <td class=" . $machucnang . ">$tenchucnang</td>
            <td><button style='border: none' class='edit-chucnang' value=" . $machucnang . "><i class='fas fa-edit' ></button</i></td>
            <td><button style='border: none' class='del-chucnang' value=" . $machucnang . "><i class='fas fa-trash-alt'></button></i></td>
        </tr>";
    }
}
