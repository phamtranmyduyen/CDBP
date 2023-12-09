
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
$maCDBP = $_POST['maCDBP'];

$sqlTrangthai = "SELECT `Trạng thái`
                FROM cdbp
                WHERE `Mã CDBP` = '$maCDBP'";
$queryTrangthai = DataProvider::executeQuery($sqlTrangthai);
$trangthai = mysqli_fetch_array($queryTrangthai);
echo $trangthai['Trạng thái'];
$sql = "SELECT DISTINCT tc.`Mã tiêu chí`, tc.`Nội dung tiêu chí`, tc.`Điểm chuẩn tiêu chí`
        FROM tieuchichamdiem tc, chitiettieuchichamdiem cttc 
        WHERE tc.`Mã tiêu chí` = cttc.`Mã tiêu chí`
        OR (tc.`Mã tiêu chí` NOT IN (
                                    SELECT cttc.`Mã tiêu chí`
                                    FROM chitiettieuchichamdiem cttc))
        ORDER BY tc.`Mã tiêu chí`";
        echo $sql;
$result = DataProvider::executeQuery($sql);

$stt = 1;
$num = 1;
$countSum = 0;
$tongdiem=0;
$tongdiemCDBPcham = 0;
while ($row = mysqli_fetch_array($result)) {

    $bien = $row['Mã tiêu chí'];
    $countSum += (int)$row['Điểm chuẩn tiêu chí'];
    echo
    "<tr class = 'point table-point'>
            <th>" . ConverToRoman($num++) . "</th>            
            <th class='noidungtieuchi'>" . $row['Nội dung tiêu chí'] . "</th>
            <th class='diemchuantieuchi'>" . $row['Điểm chuẩn tiêu chí'] . "</th>
            <th class='tongdiemtieuchicdbp'></th>
        </tr>";

    $sql1 = "SELECT DISTINCT * 
    FROM chitiettieuchichamdiem cttc 
    WHERE cttc.`Mã tiêu chí` = '$bien'";
    $result1 = DataProvider::executeQuery($sql1);


    if ($trangthai['Trạng thái'] == 'Chưa chấm điểm') {
        while ($row1 = mysqli_fetch_array($result1)) {
            
            echo
            "        
        <tr class='point table-point-detail'>
                <th>" . $stt++ . "</th>
                <th class='noidungchitiettieuchi'><input class='input-macttc' style='display: none' value='" . $row1['Mã chi tiết tiêu chí'] . "'/><pre class='txtnoidungchitiettieuchi'>" . $row1['Nội dung chi tiết tiêu chí'] . "</pre></th>
                <th class='diemchuanchitiettieuchi' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><pre class='txtdiemchuanchitiettieuchi'>" . $row1['Điểm chuẩn chi tiết tiêu chí'] . "</pre></th>
                <th class='diemcdbpcham' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><input class='textCDBP' type='number' min='0' name='txtTextCDBP' id='txtTextCDBP'/></th>
                
            </tr>";
        }
    } else if ($trangthai['Trạng thái'] == 'Đã chấm điểm') {        
        $mabangchamdiem = "";
        while ($row1 = mysqli_fetch_array($result1)) {
            $sqlDiem = "SELECT bdct.`Điểm CDBP chấm`, bd.`Khóa chỉnh sửa`, bd.`Mã bảng chấm điểm`
                    FROM bangchamdiem_chitiettieuchi bdct, bangchamdiem bd, thongbao tb
                    WHERE bdct.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm`
                    AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                    AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                    AND bd.`Mã CDBP` = '$maCDBP'
                    AND tb.`Hiển thị` = 0
                    AND tb.`Phân loại` = 'Chấm điểm'
                    AND bdct.`Mã chi tiết tiêu chí` = '" . $row1['Mã chi tiết tiêu chí'] . "'";
                    echo $sqlDiem;
            $queryDiem = DataProvider::executeQuery($sqlDiem);
            while ($rowDiem = mysqli_fetch_array($queryDiem)) {
                $tongdiem +=(int)$rowDiem['Điểm BCH chấm'];
                $tongdiemCDBPcham +=(int)$rowDiem['Điểm CDBP chấm'];
                if ($rowDiem['Khóa chỉnh sửa'] == '0') {
                echo
                "        
            <tr class='point table-point-detail'>
                <th>" . $stt++ . "</th>
                <th class='noidungchitiettieuchi'><input class='input-macttc' style='display: none' value='" . $row1['Mã chi tiết tiêu chí'] . "'/><pre class='txtnoidungchitiettieuchi'>" . $row1['Nội dung chi tiết tiêu chí'] . "</pre></th>
                <th class='diemchuanchitiettieuchi'><pre class='txtdiemchuanchitiettieuchi'>" . $row1['Điểm chuẩn chi tiết tiêu chí'] . "</pre></th>                
                <th class='diemcdbpcham'><input value='" . $rowDiem['Điểm CDBP chấm'] . "' class='textCDBP' type='number' min='0' name='txtTextCDBP' id='txtTextCDBP'/></th>
            </tr>";
                    } else if ($rowDiem['Khóa chỉnh sửa'] == '1') {
                        echo
                        "        
                <tr class='point table-point-detail'>
                    <th>" . $stt++ . "</th>
                    <th class='noidungchitiettieuchi'><input class='input-macttc' style='display: none' value='" . $row1['Mã chi tiết tiêu chí'] . "'/><pre class='txtnoidungchitiettieuchi'>" . $row1['Nội dung chi tiết tiêu chí'] . "</pre></th>
                    <th class='diemchuanchitiettieuchi' ><pre class='txtdiemchuanchitiettieuchi'>" . $row1['Điểm chuẩn chi tiết tiêu chí'] . "</pre></th>                
                    <th class='diemcdbpcham'><input disabled value='" . $rowDiem['Điểm CDBP chấm'] . "' class='textCDBP' type='number' min='0' name='txtTextCDBP' id='txtTextCDBP'/></th>
                </tr>";
                    }
            }
        }
    }
}


echo "<tr class='point'>
    <th></th>
    <th style='color:red; font-weight:bold'>TỔNG ĐIỂM:</br></th>
    <th style='color:red; font-weight:bold'>$countSum</th>
    <th style='color:red; font-weight:bold'>$tongdiemCDBPcham</th>
</tr>";
