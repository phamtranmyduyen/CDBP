<?php
require_once('../../DataProvider.php');
function findChitiettieuchichamdiem($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // / LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM chitiettieuchichamdiem cttc
                                    WHERE cttc.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataCTTCFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countchitiettieuchichamdiem'>$countDataCTTCFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM chitiettieuchichamdiem cttc
                                    WHERE cttc.`$value` like '%$find%'
                                    ");
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
}
if (isset($_POST['findMachitiettieuchi'])) {
    findChitiettieuchichamdiem('Mã chi tiết tiêu chí', 'findMachitiettieuchi');
} else if (isset($_POST['findNoidungchitiettieuchi'])) {
    findChitiettieuchichamdiem('Nội dung chi tiết tiêu chí', 'findNoidungchitiettieuchi');
}
