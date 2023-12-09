<?php
require_once('../../DataProvider.php');
function findThanhvienbch($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG THỎA MÃN
    $queryLaySoLuong =  DataProvider::executeQuery("SELECT COUNT(*) AS 'Số lượng'
                                    FROM thanhvienbch
                                    WHERE thanhvienbch.`$value` like '%$find%'
                               ");
    $rowLaySoLuong = mysqli_fetch_array($queryLaySoLuong);
    $countDataFind = $rowLaySoLuong['Số lượng'];
    echo "<div style='display: none' class='countthanhvienbch'>$countDataFind</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM thanhvienbch tvbch
                                    WHERE tvbch.`$value` like '%$find%'
                               ");
    while ($row = mysqli_fetch_array($query)) {
        $count++;
        if ($count > $start && $count <= $end) {
            echo
            "    
        <tr>
            <td>" . $row['Mã thành viên BCH CDBP'] . "</td>
            <td>" . $row['Tên thành viên BCH CDBP'] . "</td>
            <td>" . $row['Chức vụ'] . "</td>
            <td>" . $row['Số điện thoại'] . "</td>
            <td>" . $row['Email'] . "</td>
            <td>" . $row['Mã ban chấp hành CDBP'] . "</td>
            <td>
            " . $row['Mã tài khoản'] . "
                <div class='d-grid gap-2 d-md-flex justify-content-md-end'>

                <button class='detail-taikhoan btn btn-outline-primary' value=" . $row['Mã tài khoản'] . ">Xem chi tiết</button>
                <button class='edit-detail-taikhoan btn btn-outline-primary' value=" . $row['Mã tài khoản'] . ">Chỉnh sửa tài khoản</button>
                </div>
                </td>
            <td><button style='border: none' class='edit-thanhvienbch' value=" .  $row['Mã thành viên BCH CDBP'] . "><i class='fas fa-edit' ></i></button></td>
            <td><button style='border: none' class='del-thanhvienbch' value=" .  $row['Mã thành viên BCH CDBP'] . "><i class='fas fa-trash-alt'></i></button></td>
        </tr>";
        }
    }
}
if (isset($_POST['findMathanhvienbch'])) {
    findThanhvienbch('Mã thành viên BCH CDBP', 'findMathanhvienbch');
} else if (isset($_POST['findTenthanhvienbch'])) {
    findThanhvienbch('Tên thành viên BCH CDBP', 'findTenthanhvienbch');
} else if (isset($_POST['findBch'])) {
    findThanhvienbch('Mã ban chấp hành CDBP', 'findBch');
}
