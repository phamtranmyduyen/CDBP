<?php
require_once('../../DataProvider.php');
function findchucnang($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM chucnang
                                    WHERE chucnang.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countchucnang'>$countDataFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM chucnang bq
                                    WHERE bq.`$value` like '%$find%'
                               ");
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
}
if (isset($_POST['findMachucnang'])) {
    findchucnang('Mã chức năng', 'findMachucnang');
} else if (isset($_POST['findTenchucnang'])) {
    findchucnang('Tên chức năng', 'findTenchucnang');
}
