<?php
require_once('../../DataProvider.php');
function findQuyen($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM bangquyen
                                    WHERE bangquyen.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countquyen'>$countDataFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM bangquyen bq
                                    WHERE bq.`$value` like '%$find%'
                               ");
    while ($row = mysqli_fetch_array($query)) {
        $count++;
        $maquyen = $row['Mã quyền'];
        $tenquyen = $row['Tên quyền'];
        if ($count > $start && $count <= $end) {
            echo
            "<tr>
            <td class=" . $maquyen . ">$maquyen</td>
            <td class=" . $maquyen . ">$tenquyen</td>
            <td style='text-align: center;
            justify-content: center;
            align-items: center;'><button style='border: none' class='add-quyen-chucnang' value=" . $maquyen . "><i class='far fa-list-alt'></i></button></i></td>            
            <td><button style='border: none' class='edit-quyen' value=" . $maquyen . "><i class='fas fa-edit' ></button></i></td>            
            <td><button style='border: none' class='del-quyen' value=" . $maquyen . "><i class='fas fa-trash-alt'></button></i></td>
        </tr>";
        }
    }
}
if (isset($_POST['findMaquyen'])) {
    findQuyen('Mã quyền', 'findMaquyen');
} else if (isset($_POST['findTenquyen'])) {
    findQuyen('Tên quyền', 'findTenquyen');
}
