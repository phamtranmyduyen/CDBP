<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js" integrity="sha256-aHuHTU7SdMUuRBFzJX+PRkbfy9kd0uGHS8uc4M/NVBo=" crossorigin="anonymous"></script>

</html>

<?php
session_start();
if (!isset($_SESSION['Tên tài khoản']) || $_SESSION['Tên tài khoản'] == '' || $_SESSION['Quyền'] != 'CDBP') {
    echo "
    <script>
        Swal.fire('Bạn hiện không xem được nội dung này. Hãy đăng nhập để xem nội dung!');
        click = false;
        document.querySelector('.swal2-confirm').onclick = function() {
            window.location = './index.php';
            click = true;
        }
        console.log(click);
        window.onclick=function() {
            if(click == false)
                location.reload();
        }
    
    </script>";
} ?>

<div class="body-point-CDBP">
    <!-- <div class="header-file-point">
        <div class="header-file-point-left">
            <p>LIÊN ĐOÀN LAO ĐỘNG </p>
            <p>THÀNH PHỐ HỒ CHÍ MINH</p>
            <p>CĐCS TRƯỜNG ĐẠI HỌC SÀI GÒN</p>
            <div class="header-file-point-left-tmp"></div>
        </div>
        <div class="header-file-point-right">
            <p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
            <p>Độc lập – Tự do – Hạnh phúc</p>
            <div class="header-file-point-right-tmp"></div>
            <div class="header-file-point-right-date">
                <p>TP. Hồ Chí Minh, ngày</p><input type="text" class="date" />
                <p>tháng</p><input type="text" class="date" />
                <p>năm</p><input type="text" class="date" />
            </div>

        </div>
    </div> -->
    <div class="title-file-point">
        <p>BẢNG CHẤM ĐIỂM THI ĐUA CÔNG ĐOÀN BỘ PHẬN</p>
        <p>NĂM HỌC 2020-2021</p>
        <div class="title-file-point-tmp"></div>
    </div>
    <div class="name-file-point">
        <p>CĐBP:</p>
        <div id="input-ten-CDBP"></div>
    </div>

    <table class="table-striped table table-hover point">
        <tr class="table-main-CDBP">
            <th>STT</th>
            <th>Nội dung</th>
            <th>Điểm chuẩn</th>
            <th>Điểm tự chấm</th>
        </tr>
        <tbody class="table-hover load-data load-data-point-CDBP" id="load-data-point-CDBP">
            <!-- <th>Điểm BCH công đoàn chấm</th> -->
        </tbody>
    </table>


    <div class="footer-content">
        <div class='note-point'>
            <b><u><i>Ghi chú:</i></u></b>
            <ul>
                <li>Tổng điểm >= <b>90 điểm: </b>Xếp loại <b>Hoàn thành xuất sắc</b></li>
                <li>Tổng điểm >= <b>85 điểm: </b>Xếp loại <b>Hoàn thành tốt</b></li>
                <li>Tổng điểm >= <b>50 điểm: </b>Xếp loại <b>Hoàn thành</b></li>
                <li>Tổng điểm < <b>50 điểm: </b>Xếp loại <b>Không hoàn thành</b></li>
            </ul>
        </div>
        <div class='signature'>
            <p><b>TM. BAN CHẤP HÀNH CĐBP CHỦ TỊCH</b>
                </br><i>(Ký, ghi họ tên)</i></p>
        </div>
    </div>
    <div class="save-point-CDBP">
        <button class="btn btn-primary submit-save submit-save-point-CDBP" type="submit">Lưu</button>
        <button style="display: none" class="btn btn-primary submit-save submit-update-point-CDBP" type="submit">Cập nhật</button>
    </div>
</div>
<script>
    saveDiemCDBP();
    
</script>