
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
$mabangdiem = $_POST['mabangdiem'];
$sqlTrangthai = "SELECT `Trạng thái`
                FROM bangchamdiem bd
                WHERE bd.`Mã bảng chấm điểm` = '$mabangdiem'";
$queryTrangthai = DataProvider::executeQuery($sqlTrangthai);
$trangthai = mysqli_fetch_array($queryTrangthai);
$sql = "SELECT DISTINCT tc.`Mã tiêu chí`, tc.`Nội dung tiêu chí`, tc.`Điểm chuẩn tiêu chí`
        FROM tieuchichamdiem tc, chitiettieuchichamdiem cttc 
        WHERE tc.`Mã tiêu chí` = cttc.`Mã tiêu chí`
        OR (tc.`Mã tiêu chí` NOT IN (
                                    SELECT cttc.`Mã tiêu chí`
                                    FROM chitiettieuchichamdiem cttc))
        ORDER BY tc.`Mã tiêu chí`";
$result = DataProvider::executeQuery($sql);

$stt = 1;
$num = 0;
$countSum = 0;
$checkDiemBTV = 0;
$xuly = true;
$tongdiem = 0;
$tongdiemCDBPcham = 0;
while ($row = mysqli_fetch_array($result)) {
    $num++;
    if ($num == 9) {
        echo $trangthai['Trạng thái'];
        if ($trangthai['Trạng thái'] == 'Chưa xử lý') {
            echo
            "<tr class = 'point table-point'>
            <th>" . ConverToRoman($num) . "</th>            
            <th class='noidungtieuchi'>" . $row['Nội dung tiêu chí'] . "</th>
            <th class='diemchuantieuchi'>" . $row['Điểm chuẩn tiêu chí'] . "</th>
            <th></th>
            <th><input type='number' min='0' max='5' class='diemBTVcham'/></th>
        </tr>";
        } else {
            $sqlDiemBTV = "SELECT bdtc.`Điểm BCH chấm`
            FROM bangchamdiem_tieuchi bdtc
            WHERE bdtc.`Mã bảng chấm điểm` = '$mabangdiem'
            AND bdtc.`Mã tiêu chí` = 'TC009'";
            echo $sqlDiemBTV;
            $queryDiemBTV = DataProvider::executeQuery($sqlDiemBTV);
            while ($rowDiemBTV = mysqli_fetch_array($queryDiemBTV)) {
                echo
                "<tr class = 'point table-point'>
            <th>" . ConverToRoman($num) . "</th>            
            <th class='noidungtieuchi'>" . $row['Nội dung tiêu chí'] . "</th>
            <th class='diemchuantieuchi'>" . $row['Điểm chuẩn tiêu chí'] . "</th>
            <th></th>
            <th><input type='number' min='0' max='5' class='diemBTVcham' value='".$rowDiemBTV['Điểm BCH chấm']."'/></th>
        </tr>";
            $diemBTV = $rowDiemBTV['Điểm BCH chấm'];
            }
        }
    } else {
        echo
        "<tr class = 'point table-point'>
            <th>" . ConverToRoman($num) . "</th>            
            <th class='noidungtieuchi'>" . $row['Nội dung tiêu chí'] . "</th>
            <th class='diemchuantieuchi'>" . $row['Điểm chuẩn tiêu chí'] . "</th>
            <th class='tongdiemtieuchicdbp'></th>
            <th class='tongdiemtieuchibch'></th>
        </tr>";
    }
    $bien = $row['Mã tiêu chí'];


    $sql1 = "SELECT DISTINCT * 
    FROM chitiettieuchichamdiem cttc 
    WHERE cttc.`Mã tiêu chí` = '$bien'";
    $result1 = DataProvider::executeQuery($sql1);

    while ($row1 = mysqli_fetch_array($result1)) {
        $countSum = $countSum + $row1['Điểm chuẩn chi tiết tiêu chí'];
        $sqlDiem = "SELECT bdct.`Điểm CDBP chấm`, bdct.`Điểm BCH chấm`
                    FROM bangchamdiem_chitiettieuchi bdct
                    WHERE bdct.`Mã bảng chấm điểm` = '$mabangdiem'
                    AND bdct.`Mã chi tiết tiêu chí` = '" . $row1['Mã chi tiết tiêu chí'] . "'";
        $queryDiem = DataProvider::executeQuery($sqlDiem);

        while ($rowDiem = mysqli_fetch_array($queryDiem)) {
            if ($trangthai['Trạng thái'] == 'Chưa xử lý') {
                $xuly = false;
                $tongdiemCDBPcham += (int)$rowDiem['Điểm CDBP chấm'];
                echo
                "        
                <tr class='point table-point-detail'>
                <th>" . $stt++ . "</th>
                <th class='noidungchitiettieuchi'><input class='input-macttc-$mabangdiem' style='display: none' value='" . $row1['Mã chi tiết tiêu chí'] . "'/><pre class='txtnoidungchitiettieuchi'>" . $row1['Nội dung chi tiết tiêu chí'] . "</pre></th>
                <th class='diemchuanchitiettieuchi' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><pre class='txtdiemchuanchitiettieuchi'>" . $row1['Điểm chuẩn chi tiết tiêu chí'] . "</pre></th>
                <th class='diemcdbpcham'><pre class='textCDBP' id='txtTextCDBP'>" . $rowDiem['Điểm CDBP chấm'] . "</pre></th>
                <th class='diemcdbpcham' ><input class='textBCH' type='number' min='0' name='txtTextBCH$mabangdiem' id='txtTextBCH'/></th>                
            </tr>";
            } else if ($trangthai['Trạng thái'] == 'Đã xử lý') {
                $tongdiem += (int)$rowDiem['Điểm BCH chấm'];
                $tongdiemCDBPcham += (int)$rowDiem['Điểm CDBP chấm'];
                echo
                "        
                <tr class='point table-point-detail'>
                <th>" . $stt++ . "</th>
                <th class='noidungchitiettieuchi'><input class='input-macttc-$mabangdiem' style='display: none' value='" . $row1['Mã chi tiết tiêu chí'] . "'/><pre class='txtnoidungchitiettieuchi'>" . $row1['Nội dung chi tiết tiêu chí'] . "</pre></th>
                <th class='diemchuanchitiettieuchi' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><pre class='txtdiemchuanchitiettieuchi'>" . $row1['Điểm chuẩn chi tiết tiêu chí'] . "</pre></th>
                <th class='diemcdbpcham'><pre class='textCDBP' id='txtTextCDBP'>" . $rowDiem['Điểm CDBP chấm'] . "</pre></th>
                <th class='diemcdbpcham'><input value='" . $rowDiem['Điểm BCH chấm'] . "' class='textBCH' type='number' min='0' name='txtTextBCH$mabangdiem' id='txtTextBCH'/></th>                
            </tr>";
            }
        }
    }
}

if ($xuly == false) {
    echo "<tr class='point'>
    <th></th>
    <th style='color:red; font-weight:bold'>TỔNG ĐIỂM:</br></th>
    <th style='color:red; font-weight:bold'>$countSum</th>
    <th style='color:red; font-weight:bold'>$tongdiemCDBPcham</th>
    <th style='color:red; font-weight:bold'></th>
</tr>";
} else {
    $tongdiem=$tongdiem+$diemBTV;
    echo "<tr class='point'>
    <th></th>
    <th style='color:red; font-weight:bold'>TỔNG ĐIỂM:</br></th>
    <th style='color:red; font-weight:bold'>$countSum</th>
    <th style='color:red; font-weight:bold'>$tongdiemCDBPcham</th>    
    <th style='color:red; font-weight:bold'>$tongdiem</th>
</tr>";
}


//  <th><input class='textBCH' type='text' name='txtTextBCH' id='txtTextBCH'/></th>