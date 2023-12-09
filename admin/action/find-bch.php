<?php
require_once('../../DataProvider.php');
function findbch($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM bch
                                    WHERE bch.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataBCHFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countbch'>$countDataBCHFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM bch
                                    WHERE bch.`$value` like '%$find%'
                               ");
    while ($row = mysqli_fetch_array($query)) {
        $count++;
        $mabch = $row['Mã ban chấp hành CDBP'];
        $soluongtv = $row['Số lượng'];
        $khoabch = $row['Khóa'];
        $ngaythanhlap = $row['Ngày thành lập'];
        $ngayketthuc = $row['Ngày kết thúc'];
        if ($count > $start && $count <= $end) {
            echo
            "<tr>
                <td class=" . $mabch . ">$mabch</td>
                <td class=" . $mabch . ">
                    $soluongtv
                    <button class='btn btn-outline-primary detail-soluongtv-bch' value=" . $mabch . ">Xem chi tiết</button>
                </td>
                <td class=" . $mabch . ">$khoabch</td>
                <td class=" . $mabch . ">$ngaythanhlap</td>
                <td class=" . $mabch . ">$ngayketthuc</td>            
                <td><button style='border: none' class='edit-bch' value=" . $mabch . "><i class='fas fa-edit' ></i></button></td>
                <td><button style='border: none' class='del-bch' value=" . $mabch . "><i class='fas fa-trash-alt'></i></button></td>
            </tr>";
        }
    }
}
if (isset($_POST['findMabch'])) {
    findbch('Mã ban chấp hành CDBP', 'findMabch');
} else if (isset($_POST['findKhoabch'])) {
    findbch('Khóa', 'findKhoabch');
}
