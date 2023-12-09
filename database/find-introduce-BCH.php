<?php
function ConverToRoman($num)
{
    $n = intval($num);
    $res = '';

    //array of roman numbers
    $romanNumber_Array = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    );

    foreach ($romanNumber_Array as $roman => $number) {
        //divide to get  matches
        $matches = intval($n / $number);

        //assign the roman char * $matches
        $res .= str_repeat($roman, $matches);

        //substract from the number
        $n = $n % $number;
    }

    // return the result
    return $res;
}
require_once('../DataProvider.php');
function findIntroduceBCH($value, $id)
{
    if (isset($_POST['start']))
        $start = $_POST['start'];
    if (isset($_POST['end']))
        $end = $_POST['end'];
    $count = 0;
    $find = $_POST[$id];
    // LẤY SỐ LƯỢNG CHI TIẾT GIỚI THIỆU
    $sqlLaySoLuongCT = "SELECT COUNT(*) AS 'Số lượng'
    FROM chitietgioithieu ctgt, gioithieu gt
    WHERE ctgt.`Mã giới thiệu` = gt.`Mã giới thiệu`
    AND gt.`$value` like '%$find%'";
    $queryLaySoLuongCT = DataProvider::executeQuery($sqlLaySoLuongCT);
    $rowCT = mysqli_fetch_array($queryLaySoLuongCT);
    //SÔ LƯỢNG GIỚI THIỆU
    $sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
    FROM gioithieu gt
    WHERE gt.`$value` like '%$find%'";
    $queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);
    $row = mysqli_fetch_array($queryLaySoLuong);
    // 
    $countData = $row['Số lượng'] + $rowCT['Số lượng'];
    echo "<div style='display:none' class='countintroduce-BCH'>$countData</div>";
    // _______________________________
    $query =  DataProvider::executeQuery("SELECT *
                                    FROM gioithieu
                                    WHERE `$value` like '%$find%'");
    $num = 0;
    while ($row = mysqli_fetch_array($query)) {
        $num++;
        $bien = $row['Mã giới thiệu'];
        $count++;
        if ($count > $start && $count <= $end) {
            echo
            "<tr>
                <th style='color: red'>" . ConverToRoman($num) . "</th>
                <th style='color: red'>" . $row['Nội dung giới thiệu'] . "</th>
                <th style='color: red'><img style='width:50px; height: 50px' src='" . $row['Hình ảnh'] . "'/></th>
                <th style='color: red'>
                    <button value='$bien' class='btn btn-primary hien-gt'>Hiển thị</button>
                    <button style='display: none' value='$bien' class='btn btn-secondary an-gt'>Ẩn</button>
                </th>
                <td style='border: none'><button style='border: none; background:none; color: red' class='edit-gioithieu' value=" . $row['Mã giới thiệu'] . "><i class='fas fa-edit' ></button</i></td>
                <td style='border: none'><button style='border: none; background:none; color: red' class='del-gioithieu' value=" . $row['Mã giới thiệu'] . "><i class='fas fa-trash-alt'></button></i></td>
            </tr>";
        }
        $sql1 = "SELECT DISTINCT * 
        FROM chitietgioithieu ctgt 
        WHERE ctgt.`Mã giới thiệu` = '$bien'";
        $result1 = DataProvider::executeQuery($sql1);
        $stt = 1;
        while ($row1 = mysqli_fetch_array($result1)) {
            $count++;
            if ($count > $start && $count <= $end) {
                echo
                "        
            <tr>
                <th>" . $stt++ . "</th>
                <th>" . $row1['Nội dung chi tiết giới thiệu'] . "</th>
                <th></th>
                <th>
                    <button value='" . $row1['Mã chi tiết giới thiệu'] . "' class='btn btn-primary hien-ctgt'>Hiển thị</button>
                    <button style='display: none' value='" . $row1['Mã chi tiết giới thiệu'] . "' class='btn btn-secondary an-ctgt'>Ẩn</button>
                </th>
               <th></th>
               <th></th>
            </tr>";
            }
        }
    }
}
if (isset($_POST['find-noidunggioithieu'])) {
    findIntroduceBCH('Nội dung giới thiệu', 'find-noidunggioithieu');
} else if (isset($_POST['find-trangthai'])) {
    findIntroduceBCH('Hiển thị', 'find-trangthai');
}
