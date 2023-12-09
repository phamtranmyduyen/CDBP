<?php
require_once('../DataProvider.php');
$sqlUpdateTrangthai = "UPDATE cdbp
                    SET cdbp.`Trạng thái` = 'Đã chấm điểm'
                    WHERE cdbp.`Mã CDBP` IN (SELECT DISTINCT bd.`Mã CDBP`
                                            FROM bangchamdiem bd, thongbao tb
                                            WHERE bd.`Thời gian` >= tb.`Ngày thực hiện`
                                            AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                                            AND tb.`Phân loại` = 'Chấm điểm'
                                            AND tb.`Hiển thị` = '0')";
$queryUpdateTrangthai = DataProvider::executeQuery($sqlUpdateTrangthai);
$sqlUpdateTrangthaiChua = "UPDATE cdbp
                    SET cdbp.`Trạng thái` = 'Chưa chấm điểm'
                    WHERE cdbp.`Mã CDBP` NOT IN (SELECT DISTINCT bd.`Mã CDBP`
                                            FROM bangchamdiem bd, thongbao tb
                                            WHERE bd.`Thời gian` >= tb.`Ngày thực hiện`
                                            AND bd.`Thời gian` <= tb.`Ngày hết hạn`
                                            AND tb.`Phân loại` = 'Chấm điểm'
                                            AND tb.`Hiển thị` = '0')";
$queryUpdateTrangthaiChua = DataProvider::executeQuery($sqlUpdateTrangthaiChua);