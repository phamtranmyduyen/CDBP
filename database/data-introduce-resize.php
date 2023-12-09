<?php
require_once('../DataProvider.php');
$sql = "SELECT DISTINCT gt.`Mã giới thiệu`, gt.`Nội dung giới thiệu`, gt.`Hình ảnh`
        FROM gioithieu gt, chitietgioithieu ctgt
        WHERE  gt.`Mã giới thiệu` = ctgt.`Mã giới thiệu`
        AND gt.`Hiển thị` = 0";
$result = DataProvider::executeQuery($sql);
$i = 0;
echo
"<div class='child-introduce-only'>";
while ($row = mysqli_fetch_array($result)) {
    $i++;
    $bien = $row['Mã giới thiệu'];
   

        echo "<div class='detail-introduce'>
                <h4><span><strong>" . $row['Nội dung giới thiệu'] . "</strong></span></h4>";

        $sql1 = "SELECT DISTINCT * 
                FROM chitietgioithieu ctgt 
                WHERE ctgt.`Mã giới thiệu` = '$bien'
                AND ctgt.`Hiển thị` = 0";
        $result1 = DataProvider::executeQuery($sql1);

        while ($row1 = mysqli_fetch_array($result1)) {
            echo
            "<p><i class='fas fa-pen'></i>" . $row1['Nội dung chi tiết giới thiệu'] . "</p>";
        }
        echo "
            </div>
            <div class='img-introduce'>
                <img src='" . $row['Hình ảnh'] . "'/>
            </div>";
  
}
echo "</div>";
