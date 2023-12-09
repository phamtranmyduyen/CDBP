<?php
require_once('../DataProvider.php');
$filterMode = $_POST['filterMode'];
$valueFilter = $_POST['valueFilter'];
$sqlNoti;
if ($filterMode == 'true') {
    if ($valueFilter == 'new') {
        $sqlNoti = "SELECT *
            FROM thongbao
            WHERE `Hiển thị` = '1'
            ORDER BY `Ngày đăng` DESC";
    } else if ($valueFilter == 'old') {
        $sqlNoti = "SELECT *
        FROM thongbao
        WHERE `Hiển thị` = '1'
        ORDER BY `Ngày đăng`";
    }
}
if ($filterMode == 'false') {
    $sqlNoti = "SELECT *
    FROM thongbao
    WHERE `Hiển thị` = '0'";
}
$queryNoti = DataProvider::executeQuery($sqlNoti);
$i = 1;
// if (mysqli_fetch_row($queryNoti) == null) {
//     
// } else {
$data = '';
while ($row = mysqli_fetch_array($queryNoti)) {
    $data =
        "<div class='accordion'>
    <div class='accordion-item'>
        <h2 class='accordion-header' id='panelsStayOpen-headingOne-$i'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#panelsStayOpen-collapseOne-$i' aria-expanded='true' aria-controls='panelsStayOpen-collapseOne-$i'>
                Thông báo $i
            </button>
        </h2>
        <div id='panelsStayOpen-collapseOne-$i' class='accordion-collapse collapse' aria-labelledby='panelsStayOpen-headingOne=$i'>
            <pre class='accordion-body'>
                Ngày đăng: " . $row['Ngày đăng'] . "
                Ngày thực hiện: " . $row['Ngày thực hiện'] . "
                Ngày hết hạn: " . $row['Ngày hết hạn'] . "
                <strong>Nội dung: " . $row['Nội dung thông báo'] . "</strong>
            </pre>
        </div>
    </div>        
</div>";
    if ($data != '')
        echo $data;
    $i++;
}
if ($data == '')
    echo "<div class='none-notification'>Không có thông báo</div>";
