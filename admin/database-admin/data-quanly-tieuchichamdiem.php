
<?php
require_once('../../DataProvider.php');

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG
$sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
            FROM tieuchichamdiem";
$queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);
$row = mysqli_fetch_array($queryLaySoLuong);
$countData = $row['Số lượng'];
echo "<div style='display:none' id='counttieuchichamdiem'>$countData</div>";
// LOAD_DATA
$query =  DataProvider::executeQuery("SELECT *
                                    FROM tieuchichamdiem");
while ($row = mysqli_fetch_array($query)) {
    $count++;
    $matieuchi = $row['Mã tiêu chí'];
    $noidungtieuchi = $row['Nội dung tiêu chí'];
    $diemchuan = $row['Điểm chuẩn tiêu chí'];
    if ($count > $start && $count <= $end) {
        echo
        "<tr>
            <td class=" . $matieuchi . ">$matieuchi</td>
            <td class=" . $matieuchi . ">$noidungtieuchi</td>
            <td class=" . $matieuchi . ">$diemchuan</td>
            <td><button style='border: none' class='edit-tieuchichamdiem' value=" . $matieuchi . "><i class='fas fa-edit' ></button</i></td>
            <td><button style='border: none' class='del-tieuchichamdiem' value=" . $matieuchi . "><i class='fas fa-trash-alt'></button></i></td>
        </tr>";
    }
}
