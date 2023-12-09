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
<div class="body-point-official">
    <div class="title-file-point">
        <p>BẢNG ĐIỂM CÔNG ĐOÀN BỘ PHẬN</p>
        <p>NĂM HỌC 2020-2021</p>
        <div class="title-file-tmp"></div>
    </div>
    <div class="name-file-point">
        <p>CĐBP: </p>
        <div class="input-ten-CDBP"></div>
    </div>
    <div class="note-ykien">
        <p>Ghi chú:</p>
        <div class="input-note-ykien"></div>
    </div>

    <table class="table-striped table table-hover  point">
        <tr class="table-main-CDBP">
            <th>STT</th>
            <th>Nội dung</th>
            <th>Điểm chuẩn</th>
            <th>Điểm tự chấm</th>
            <th>Ban chấp hành chấm</th>
        </tr>
        <tbody class="table-hover load-data load-data-point-official" id="load-data-point-official">
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
    <div class="send-ykien">
        <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="area-ykien" style="height: 100px"></textarea>
            <label for="area-ykien">Ý kiến (nếu có)</label>
        </div>
        <button class="btn btn-primary submit-ykien">Gửi ý kiến</button>
    </div>
</div>
<script>
    pointOfficial();
    sendYKien();
</script>