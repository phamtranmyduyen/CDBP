<?php
require_once('../../DataProvider.php');
function findDonvi($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM donvi
                                    WHERE donvi.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataDonviFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countdonvi'>$countDataDonviFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM donvi dv
                                    WHERE dv.`$value` like '%$find%'
                               ");
    while ($row = mysqli_fetch_array($query)) {
        $count++;
        $madonvi = $row['Mã đơn vị'];
        $tendonvi = $row['Tên đơn vị'];
        $diachi = $row['Địa chỉ'];
        $sodienthoai = sprintf("0%d", (int)$row['Số điện thoại']);
        $email = $row['Email'];
        $macdbp = $row['Mã CDBP'];
        $sql = "SELECT `Tên CDBP`
                    FROM cdbp cd
                    WHERE `Mã CDBP`='$macdbp'";
        $query2 = DataProvider::executeQuery($sql);
        while ($row2 = mysqli_fetch_array($query2)) {
            if ($count > $start && $count <= $end) {
                echo
                "<tr>
                <td class=" . $madonvi . ">$madonvi </td>
                <td class=" . $madonvi . ">$tendonvi</td>
                <td class=" . $madonvi . ">$diachi </td>
                <td class=" . $madonvi . ">$sodienthoai</td>
                <td class=" . $madonvi . ">$email </td>        
                <td class=" . $madonvi . ">" . $row2['Tên CDBP'] . "</td>             
                <td><button style='border: none' class='edit-donvi' value=" . $madonvi . "><i class='fas fa-edit' ></button></i></td>            
                <td><button style='border: none' class='del-donvi' value=" . $madonvi . "><i class='fas fa-trash-alt'></button></i></td>
            </tr>";
            }
        }
    }
}
if (isset($_POST['findMadonvi'])) {
    findDonvi('Mã đơn vị', 'findMadonvi');
} else if (isset($_POST['findTendonvi'])) {
    findDonvi('Tên đơn vị', 'findTendonvi');
}
