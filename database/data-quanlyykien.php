<?php
require_once('../DataProvider.php');
if (isset($_POST['start']))
    $start = $_POST['start'];
if (isset($_POST['end']))
    $end = $_POST['end'];
$count = 0;
$valueFilter = $_POST['valueFilter'];
// echo $valueFilter;
// LẤY SỐ LƯỢNG
$sqlLaySoLuong;
$sqlBangdiem;
if ($valueFilter == 'filter') {
    $sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
                    FROM ykien yk, bangchamdiem bd, thongbao tb
                    WHERE yk.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm` 
                    AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                    AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                    AND tb.`Hiển thị` = 0
                    AND tb.`Phân loại` = 'Chấm điểm'";
    $sqlBangdiem = "SELECT bd.`Thời gian`, yk.`Trạng thái`, yk.`Sự thay đổi`, bd.`Mã bảng chấm điểm`, bd.`Mã CDBP`, yk.`Nội dung ý kiến`
                    FROM ykien yk, bangchamdiem bd, thongbao tb
                    WHERE yk.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm` 
                    AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                    AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                    AND tb.`Hiển thị` = 0
                    AND tb.`Phân loại` = 'Chấm điểm'";
} else {
    $sqlLaySoLuong = "SELECT COUNT(*) AS 'Số lượng'
                    FROM ykien yk, bangchamdiem bd, thongbao tb
                    WHERE yk.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm` 
                    AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                    AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                    AND tb.`Hiển thị` = 0
                    AND tb.`Phân loại` = 'Chấm điểm'
                    AND `Trạng thái` like '$valueFilter'";

    $sqlBangdiem = "SELECT bd.`Thời gian`, yk.`Trạng thái`, yk.`Sự thay đổi`, bd.`Mã bảng chấm điểm`, bd.`Mã CDBP`, yk.`Nội dung ý kiến`
                    FROM ykien yk, bangchamdiem bd, thongbao tb
                    WHERE yk.`Mã bảng chấm điểm` = bd.`Mã bảng chấm điểm` 
                    AND bd.`Thời gian` >= tb.`Ngày thực hiện`
                    AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                    AND tb.`Hiển thị` = 0
                    AND tb.`Phân loại` = 'Chấm điểm'
                    AND `Trạng thái` like '$valueFilter'";
}
$queryLaySoLuong = DataProvider::executeQuery($sqlLaySoLuong);
$row = mysqli_fetch_array($queryLaySoLuong);
$countData = $row['Số lượng'];
if ($countData == '0') {
    echo "<div class='none-bangchamdiem-moinhat'>Không có bảng chấm điểm</div>";
} else {
    echo "<div style='display:none' id='countquanlyykien'>$countData</div>";


    // XỬ LÝ
    $queryBangdiem = DataProvider::executeQuery($sqlBangdiem);

    while ($rowBangdiem = mysqli_fetch_array($queryBangdiem)) {

        // MÃ CDBP
        $sqlTenCDBP = "SELECT cd.`Tên CDBP`
                FROM cdbp cd
                WHERE cd.`Mã CDBP` = '" . $rowBangdiem['Mã CDBP'] . "'";
        $queryTenCDBP = DataProvider::executeQuery($sqlTenCDBP);
        $data = "";
        while ($rowTenCDBP = mysqli_fetch_array($queryTenCDBP)) {
            $count++;
            $tenCDBP = $rowTenCDBP['Tên CDBP'];
            if ($count > $start && $count <= $end) {
                echo "
            <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>$tenCDBP</h5>
                    <p class='card-text'>Thời gian: " . $rowBangdiem['Thời gian'] . "</p>
                    <p class='card-text'>Nội dung ý kiến: " . $rowBangdiem['Nội dung ý kiến'] . "</p>";
                if ($rowBangdiem['Trạng thái'] == 0) {
                    echo  "<p class='card-text'>Trạng thái: Chưa xử lý</p>";
                } else
                    echo  "<p class='card-text'>Trạng thái: Đã xử lý</p>";
                if ($rowBangdiem['Sự thay đổi'] == 0) {
                    echo "<p class='card-text'>Sự thay đổi: Không thay đổi</p>";
                } else {
                    echo "<p class='card-text'>Sự thay đổi: Có thay đổi</p>";
                }
                echo "<button value='" . $rowBangdiem['Mã bảng chấm điểm'] . "' class='btn btn-primary action-y-kien'>Xử lý</button>                    
                </div>
            </div>
      
            ";
            }
            // }

        }
    }
}
