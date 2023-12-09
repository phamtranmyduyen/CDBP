<?php
require_once('../DataProvider.php');
function findNotificationBCH($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM thongbao
                                    WHERE thongbao.`$value` like '%$find%'
                               ");                                           
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countData = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countnotification-BCH'>$countData</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM thongbao
                                    WHERE `$value` like '%$find%'
                               ");
    while ($rowThongbao = mysqli_fetch_array($query)) {
        // MÃ Thanhvienbch
        $sqlTenThanhvienbch = "SELECT tvbch.`Tên thành viên BCH CDBP`
   FROM thanhvienbch tvbch
   WHERE tvbch.`Mã thành viên BCH CDBP` = '" . $rowThongbao['Mã thành viên BCH CDBP'] . "'";
        $queryTenThanhvienbch = DataProvider::executeQuery($sqlTenThanhvienbch);
        while ($rowTenThanhvienbch = mysqli_fetch_array($queryTenThanhvienbch)) {
            $count++;
            $tenThanhvienbch = $rowTenThanhvienbch['Tên thành viên BCH CDBP'];
            if ($count > $start && $count <= $end) {
                echo "
                <tr>
                    <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Mã thông báo'] . "</th>
                    <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Nội dung thông báo'] . "</th>
                    <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Ngày đăng'] . "</th>
                    <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Ngày thực hiện'] . "</th>
                    <th class='".$rowThongbao['Mã thông báo']."'>" . $rowThongbao['Ngày hết hạn'] . "</th>
                    <th class='".$rowThongbao['Mã thông báo']."'>" . $rowTenThanhvienbch['Tên thành viên BCH CDBP'] . "</th>
                    <th><button value='" . $rowThongbao['Mã thông báo'] . "' class='btn btn-primary action-thong-bao'>Xử lý</button></th>
                    <th>
                    <button value='" . $rowThongbao['Mã thông báo'] . "' class='btn btn-secondary hien-thong-bao " . $rowThongbao['Mã thông báo'] . "'>Hiển thị</button>
                    <button style='display: none' value='" . $rowThongbao['Mã thông báo'] . "' class='btn btn-secondary an-thong-bao " . $rowThongbao['Mã thông báo'] . "'>Ẩn</button>
                    </th>
                </tr>";   
            }
        }
    }
}
if (isset($_POST['find-noidungthongbao'])) {
    findNotificationBCH('Nội dung thông báo', 'find-noidungthongbao');
}
else if (isset($_POST['find-phan-loai'])) {
    findNotificationBCH('Phân loại', 'find-phan-loai');
}
