
<?php
session_start();
if (!isset($_SESSION['Tên tài khoản'])) {

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
 <div class="panner-img">
        <div>
            <img src="./img/contact-background.png" />
        </div>
        <div>
            <img src="./img/contact-text.png" />
        </div>
    </div>
<div class="contact">   
    <div class="contact-top">
        <div class="contact-top-detail">
            <div class="contact-address"> <i class="fas fa-angle-right"></i> Địa chỉ: Phòng HB.004, 273 An Dương Vương, P3, Q5, TP.HCM</div>
            <div class="contact-phone"><i class="fas fa-angle-right"></i> Điện thoại:
                <a style="text-decoration: none" href="tel: (028) 3835 5000">(028) 3835 5000</a>
            </div>
            <div class="contact-email"><i class="fas fa-angle-right"></i> Email:
                <a style="text-decoration: none" href="mailto:vpcongdoandhsg@gmail.com">vpcongdoandhsg@gmail.com</a>
            </div>
            <div class="contact-web"><i class="fas fa-angle-right"></i> Website:
                <a style="text-decoration: none" href="http://congdoan.sgu.edu.vn" target="_blank" rel="noopener">http://congdoan.sgu.edu.vn</a>
            </div>
        </div>
    </div>
    <div class="contact-bottom">
        <h2 style="padding: 30px">Thành viên ban chấp hành công đoàn</h2>
        <?php require('../database/data-lienhe.php'); ?>
    </div>
</div>