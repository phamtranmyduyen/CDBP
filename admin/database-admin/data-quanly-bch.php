
<?php
require_once('../../DataProvider.php');

if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG
$sqlLaySoLuongBCH = "SELECT COUNT(*) AS 'Số lượng'
            FROM donvi";
$queryLaySoLuongBCH = DataProvider::executeQuery($sqlLaySoLuongBCH);
$row = mysqli_fetch_array($queryLaySoLuongBCH);
$countDataBCH = $row['Số lượng'];
echo "<div style='display:none' id='countbch'>$countDataBCH</div>";
// LOAD_DATA
$query =  DataProvider::executeQuery("SELECT *
                                    FROM bch");
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
