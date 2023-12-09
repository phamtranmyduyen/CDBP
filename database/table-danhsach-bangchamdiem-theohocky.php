<?php
require_once('../DataProvider.php');
$hocky= $_POST['hocky'];
$count = 0;
$sqlCacBangDiem = "SELECT *
                    FROM bangchamdiem bcd
                    WHERE bcd.`Học kỳ` = '$hocky'";
$queryCacBangDiem = DataProvider::executeQuery($sqlCacBangDiem);
echo "<h2>$hocky</h2>";
echo "<table class='table-striped table table-hover table-danhsach-bangchamdiem-theocongdoan'>
<tr>
    <th>STT</th>
    <th>Mã bảng chấm điểm</th>
    <th>Học kỳ</th>
    <th>Thời gian</th>
    <th>Trạng thái</th>
    <th>Xem</th>
    <th>Khóa</th>
</tr>
<tbody class='table-hover load-data-table-danhsach-bangchamdiem-theocongdoan' id='load-data-table-danhsach-bangchamdiem-theocongdoan'>";
$i =0;
while ($rowCacBangDiem = mysqli_fetch_array($queryCacBangDiem)) {
    $i++;
    // MÃ THÀNH VIÊN BCH
    $sqlMaBCH = "SELECT `Tên thành viên BCH CDBP`
                FROM thanhvienbch
                WHERE `Mã thành viên BCH CDBP` = '" . $rowCacBangDiem['Mã BCH chấm'] . "'";
    $queryMaBCH = DataProvider::executeQuery($sqlMaBCH);
    // MÃ THÀNH VIÊN BCH EDIT
    $sqlMaBCHEdit = "SELECT `Tên thành viên BCH CDBP`
                FROM thanhvienbch
                WHERE `Mã thành viên BCH CDBP` = '" . $rowCacBangDiem['Mã BCH chỉnh sửa'] . "'";
    $queryMaBCHEdit = DataProvider::executeQuery($sqlMaBCHEdit);
    while ($rowMaBCH = mysqli_fetch_array($queryMaBCH)) {
        while ($rowMaBCHEdit = mysqli_fetch_array($queryMaBCHEdit)) {
            $count++;
            echo "
    <tr>
        <th>$i</th>
        <th>" . $rowCacBangDiem['Mã bảng chấm điểm'] . "</th>
        <th>" . $rowCacBangDiem['Học kỳ'] . "</th>
        <th>" . $rowCacBangDiem['Thời gian'] . "</th>
        <th>" . $rowCacBangDiem['Trạng thái'] . "</th>
        <th>" . $rowMaBCH['Tên thành viên BCH CDBP'] . "</th>
        <th>" . $rowMaBCHEdit['Tên thành viên BCH CDBP'] . "</th>
        <th><button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-primary btn-sm show-detail-table-danhsach-bangchamdiem-theocongdoan'>Xem</button></th>
        <th>
            <button value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-secondary khoa-bang-diem'>Khóa</button>
            <button style='display: none' value='" . $rowCacBangDiem['Mã bảng chấm điểm'] . "' class='btn btn-secondary mo-khoa-bang-diem'>Mở khóa</button>
        </th>
    </tr>";
        }
    }
}
echo "</tbody>
</table>";
