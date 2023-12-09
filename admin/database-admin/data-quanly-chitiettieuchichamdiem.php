
<?php
require_once('../../DataProvider.php');

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG
$sqlLaySoLuongCTTC = "SELECT COUNT(*) AS 'Số lượng'
            FROM chitiettieuchichamdiem";
$queryLaySoLuongCTTC = DataProvider::executeQuery($sqlLaySoLuongCTTC);
$row = mysqli_fetch_array($queryLaySoLuongCTTC);
$countDataCTTC = $row['Số lượng'];
echo "<div style='display:none' id='countchitiettieuchichamdiem'>$countDataCTTC</div>";
// LOAD_DATA
$query =  DataProvider::executeQuery("SELECT *
                                    FROM chitiettieuchichamdiem");
while ($row = mysqli_fetch_array($query)) {
    $count++;
    $machitiettieuchi = $row['Mã chi tiết tiêu chí'];
    $noidungchitiettieuchi = $row['Nội dung chi tiết tiêu chí'];
    $diemchuanchitiettieuchi = $row['Điểm chuẩn chi tiết tiêu chí'];
    $matieuchi = $row['Mã tiêu chí'];
    $sqlLayTenTieuchi = "SELECT `Nội dung tiêu chí`
                            FROM tieuchichamdiem tc
                            WHERE tc.`Mã tiêu chí`='$matieuchi'";
    $queryLayTenTieuchi = DataProvider::executeQuery($sqlLayTenTieuchi);
    while ($row2 = mysqli_fetch_array($queryLayTenTieuchi)) {
        if ($count > $start && $count <= $end) {
            echo
            "<tr>
            <td class=" . $machitiettieuchi . ">$machitiettieuchi</td>
            <td class=" . $machitiettieuchi . ">$noidungchitiettieuchi</td>
            <td class=" . $machitiettieuchi . ">$diemchuanchitiettieuchi</td>
            <td class=" . $machitiettieuchi . ">" . $row2['Nội dung tiêu chí'] . "</td>
            <td><button style='border: none' class='edit-chitiettieuchichamdiem' value=" . $machitiettieuchi . "><i class='fas fa-edit' ></button</i></td>
            <td><button style='border: none' class='del-chitiettieuchichamdiem' value=" . $machitiettieuchi . "><i class='fas fa-trash-alt'></button></i></td>
        </tr>";
        }
    }
}
