
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
$maCDBP = $_POST['macdbp'];
$sqlCacBangDiem = "SELECT `Mã bảng chấm điểm`
                    FROM bangchamdiem bcd
                    WHERE bcd.`Mã CDBP` = '$maCDBP'";
$queryCacBangDiem = DataProvider::executeQuery($sqlCacBangDiem);
while ($rowCacBangDiem = mysqli_fetch_array($queryCacBangDiem)) {

    $sql = "SELECT DISTINCT tc.`Mã tiêu chí`, tc.`Nội dung tiêu chí`, tc.`Điểm chuẩn tiêu chí`
        FROM tieuchichamdiem tc, chitiettieuchichamdiem cttc 
        WHERE tc.`Mã tiêu chí` = cttc.`Mã tiêu chí`
        OR (tc.`Mã tiêu chí` NOT IN (
                                    SELECT cttc.`Mã tiêu chí`
                                    FROM chitiettieuchichamdiem cttc))
        ORDER BY tc.`Mã tiêu chí`";
    $result = DataProvider::executeQuery($sql);

    $stt = 1;
    $num = 1;
    $countSum = 0;
    $tongdiem=0;
$tongdiemCDBPcham = 0;
    echo "<div class='carousel-item'>";
    echo "<h2 style='text-align:center'>" . $rowCacBangDiem['Mã bảng chấm điểm'] . "</h2>";
    echo "<table class='table-striped table table-hover point'>
        <tr class='table-main-CDBP'>
            <th>STT</th>
            <th>Nội dung</th>
            <th>Điểm chuẩn</th>
            <th>Điểm tự chấm</th>
            <th>Ban chấp hành chấm</th>
        </tr>
        <tbody class='table-hover load-data load-data-point-official' id='load-data-point-official'>";
    while ($row = mysqli_fetch_array($result)) {

        $bien = $row['Mã tiêu chí'];
        echo
        "<tr class = 'point table-point'>
            <th>" . ConverToRoman($num++) . "</th>
            <th class='noidungtieuchi'>" . $row['Nội dung tiêu chí'] . "</th>
            <th class='diemchuantieuchi'>" . $row['Điểm chuẩn tiêu chí'] . "</th>
            <th class='tongdiemtieuchicdbp'></th>
            <th class='tongdiemtieuchibch'></th>
        </tr>";

        $sql1 = "SELECT DISTINCT * 
    FROM chitiettieuchichamdiem cttc 
    WHERE cttc.`Mã tiêu chí` = '$bien'";
        $result1 = DataProvider::executeQuery($sql1);


        while ($row1 = mysqli_fetch_array($result1)) {
            $countSum = $countSum + $row1['Điểm chuẩn chi tiết tiêu chí'];
            $sqlDiem = "SELECT bdct.`Điểm CDBP chấm`, bdct.`Điểm BCH chấm`, bd.`Mã bảng chấm điểm`
                    FROM bangchamdiem_chitiettieuchi bdct, bangchamdiem bd
                    WHERE bdct.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm`
                    AND bd.`Mã CDBP` = '$maCDBP'
                    AND bdct.`Mã chi tiết tiêu chí` = '" . $row1['Mã chi tiết tiêu chí'] . "'
                    AND bd.`Mã bảng chấm điểm` = '" . $rowCacBangDiem['Mã bảng chấm điểm'] . "'                    
                    ";
            $queryDiem = DataProvider::executeQuery($sqlDiem);
            while ($rowDiem = mysqli_fetch_array($queryDiem)) {
                $tongdiem +=(int)$rowDiem['Điểm BCH chấm'];
                $tongdiemCDBPcham +=(int)$rowDiem['Điểm CDBP chấm'];
                echo
                "        
                <tr class='point table-point-detail'>
                    <th>" . $stt++ . "</th>
                    <th class='noidungchitiettieuchi'><input class='input-macttc' style='display: none' value='" . $row1['Mã chi tiết tiêu chí'] . "'/><pre class='txtnoidungchitiettieuchi'>" . $row1['Nội dung chi tiết tiêu chí'] . "</pre></th>
                    <th class='diemchuanchitiettieuchi' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><pre class='txtdiemchuanchitiettieuchi'>" . $row1['Điểm chuẩn chi tiết tiêu chí'] . "</pre></th>                
                    <th class='diemcdbpcham' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><pre class='textCDBP' id='txtTextCDBP'>" . $rowDiem['Điểm CDBP chấm'] . "</pre></th>
                    <th class='diemcdbpcham' value='" . $row1['Nội dung chi tiết tiêu chí'] . "'><pre class='textCDBP' id='txtTextCDBP'>" . $rowDiem['Điểm BCH chấm'] . "</pre></th>
                </tr>";
            }
        }
    }



    echo "<tr class='point'>
    <th></th>
    <th style='color:red; font-weight:bold'>TỔNG ĐIỂM:</br></th>
    <th style='color:red; font-weight:bold'>$countSum</th>
    <th style='color:red; font-weight:bold'>$tongdiemCDBPcham</th>
    <th style='color:red; font-weight:bold'>$tongdiem</th>
</tr>";
    echo "</tbody>
</table>";
    echo '</div>';
}
