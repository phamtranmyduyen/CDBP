<?php
require_once('../../DataProvider.php');
function find($value, $id)
{

    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];

    // LẤY SỐ LƯỢNG CDBP THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM cdbp
                                    WHERE cdbp.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataCDBPFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countcdbp'>$countDataCDBPFind</div>";
    // __________________________



    $query =  DataProvider::executeQuery("SELECT * 
                                    FROM cdbp
                                    WHERE cdbp.`$value` like '%$find%'
                               ");
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
}
if (isset($_POST['findMacdbp'])) {
    find('Mã CDBP', 'findMacdbp');
} else if (isset($_POST['findTencdbp'])) {
    find('Tên CDBP', 'findTencdbp');
} else if (isset($_POST['findTentaikhoan'])) {
    find('Tên tài khoản', 'findTentaikhoan');
}
