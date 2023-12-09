<?php
require_once('../../DataProvider.php');
function findTieuchichamdiem($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                FROM tieuchichamdiem
                                WHERE tieuchichamdiem.`$value` like '%$find%'
                           ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='counttieuchichamdiem'>$countDataFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM tieuchichamdiem tccd
                                    WHERE tccd.`$value` like '%$find%'
                               ");
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
}
if (isset($_POST['findMatieuchi'])) {
    findTieuchichamdiem('Mã tiêu chí', 'findMatieuchi');
} else if (isset($_POST['findNoidungtieuchi'])) {
    findTieuchichamdiem('Nội dung tiêu chí', 'findNoidungtieuchi');
} else if (isset($_POST['findDiemchuantieuchi'])) {
    findTieuchichamdiem('Điểm chuẩn tiêu chí', 'findDiemchuantieuchi');
}
