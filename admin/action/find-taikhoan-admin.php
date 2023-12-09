<?php
require_once('../../DataProvider.php');
function findTaikhoanAdmin($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM taikhoan
                                    WHERE taikhoan.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='counttaikhoan-admin'>$countDataFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM taikhoan tk
                                    WHERE tk.`$value` like '%$find%'
                               ");
    while ($row = mysqli_fetch_array($query)) {
        $count++;

        if ($count > $start && $count <= $end) {
            echo
            "    
            <tr>
                <td class='" . $row['Tên tài khoản'] . "'>" . $row['Tên tài khoản'] . "</td>
                <td class='" . $row['Tên tài khoản'] . "'>" . $row['Mật khẩu'] . "</td>
                <td class='" . $row['Tên tài khoản'] . "'>" . $row['Mã quyền'] . "</td>        
                <td><button style='border: none' class='edit-taikhoan-admin' value=" .  $row['Tên tài khoản'] . "><i class='fas fa-edit' ></i></button></td>
                <td><button style='border: none' class='del-taikhoan-admin' value=" .  $row['Tên tài khoản'] . "><i class='fas fa-trash-alt'></i></button></td>
            </tr>";
        }
    }
}
if (isset($_POST['findTentaikhoan-admin'])) {
    findTaikhoanAdmin('Tên tài khoản', 'findTentaikhoan-admin');
} else if (isset($_POST['findQuyen-admin'])) {
    findTaikhoanAdmin('Mã quyền', 'findQuyen-admin');
}
