
<?php
require_once('../../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
// LẤY SỐ LƯỢNG CDBP
$sqlLaySoLuongCDBP = "SELECT COUNT(*) AS 'Số lượng'
            FROM cdbp";
$queryLaySoLuongCDBP = DataProvider::executeQuery($sqlLaySoLuongCDBP);

    $row = mysqli_fetch_array($queryLaySoLuongCDBP);
    $countDataCDBP = $row['Số lượng'];
    echo "<div style='display:none' id='countcdbp'>$countDataCDBP</div>";

// LOAD_DATA_CDBP
$query =  DataProvider::executeQuery("SELECT *
                                    FROM cdbp");
while ($row = mysqli_fetch_array($query)) {
    $count++;
    $macdbp = $row['Mã CDBP'];
    $tencdbp = $row['Tên CDBP'];
    $ngaythanhlap = $row['Ngày thành lập'];
    $ngayketthuc = $row['Ngày kết thúc'];
    $tentaikhoan = $row['Tên tài khoản'];

    if ($count > $start && $count <= $end) {
        echo
        "    
        <tr>
            <td class=" . $macdbp . ">$macdbp</td>
            <td class=" . $macdbp . ">$tencdbp</td>
            <td class=" . $macdbp . ">$ngaythanhlap</td>
            <td class=" . $macdbp . ">$ngayketthuc</td>
            <td class=" . $macdbp . ">
                $tentaikhoan
                <div class='d-grid gap-2 d-md-flex justify-content-md-end'>

                <button class='detail-taikhoan btn btn-outline-primary' value=" . $tentaikhoan . ">Xem chi tiết</button>
                <button class='edit-detail-taikhoan btn btn-outline-primary' value=" . $tentaikhoan . ">Chỉnh sửa tài khoản</button>
                </div>
                </td>
            <td><button style='border: none' class='edit-cdbp' value=" . $macdbp . "><i class='fas fa-edit' ></i></button></td>
            <td><button style='border: none' class='del-cdbp' value=" . $macdbp . "><i class='fas fa-trash-alt'></i></button></td>
        </tr>";
    }
}
