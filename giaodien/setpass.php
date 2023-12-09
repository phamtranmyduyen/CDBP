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
    <div class="thongtintaikhoan">
        <h2 id="input-ten-CDBP"></h2>
        <?php echo "<h2>Tên tài khoản:  " . $_SESSION['Tên tài khoản'] . " </h2>" ?>
        <script>
            if(document.querySelector('.tenCDBP-login')!=null)
            {
    document.querySelector('#input-ten-CDBP').innerHTML = document.querySelector('.tenCDBP-login').value;
            }
            
        </script>
        <?php
        if ($_SESSION['Quyền'] != 'CDBP') {
            require_once('../DataProvider.php');
            $tentaikhoan = $_SESSION['Tên tài khoản'];
            $sqlInfoTVBCH = "SELECT `Tên thành viên BCH CDBP`, `Chức vụ`, `Số điện thoại`, `Email`, `Mã ban chấp hành CDBP`
                FROM `thanhvienbch`
                WHERE `Tên tài khoản` = '$tentaikhoan'";
            $queryInfoTVBCH = DataProvider::executeQuery($sqlInfoTVBCH);
            $maBCH = "";
            while ($rowInfoTVBCH = mysqli_fetch_array($queryInfoTVBCH)) {
                echo "
            <h2 id='tenTVBCH'>Tên TVBCH: " . $rowInfoTVBCH['Tên thành viên BCH CDBP'] . "</h2>
            <h2 id='chucvuTVBCH'>Chức vụ: " . $rowInfoTVBCH['Chức vụ'] . "</h2>
            <h2 id='sodienthoaiTVBCH'>Số điện thoại: 0" . $rowInfoTVBCH['Số điện thoại'] . "</h2>
            <h2 id='emailTVBCH'>Email: " . $rowInfoTVBCH['Email'] . "</h2>        
            ";
                $maBCH = $rowInfoTVBCH['Mã ban chấp hành CDBP'];
            }
            $sqlKhoaBCH = "SELECT `Khóa`
                        FROM `bch`
                        WHERE `Mã ban chấp hành CDBP` = '$maBCH'";
            $queryKhoaBCH = DataProvider::executeQuery($sqlKhoaBCH);
            while ($rowKhoaBCH = mysqli_fetch_array($queryKhoaBCH)) {
                echo "<h2 id='khoaTVBCH'>Thuộc ban chấp hành khóa: " . $rowKhoaBCH['Khóa'] . "</h2>";
            }
        }
        else
        {
            
        }
        ?>
    </div>
</div>
<div class="setpass-center">
    <div class="setpass-left">
        <h2>THAY ĐỔI MẬT KHẨU</h2>
        <div class="row mb-3">
            <label for="pass-old" class="col-sm-4 col-form-label">Mật khẩu cũ</label>
            <div class="col-sm-6">
                <?php echo  "<input type='hidden' id='tentaikhoan' value='" . $_SESSION['Tên tài khoản'] . "'>" ?>
                <input type="password" class="form-control" id="pass-old" required>
                <div class="error" id="error-pass-old">
                    <!-- Looks good! -->
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="pass-new" class="col-sm-4 col-form-label">Mật khẩu mới</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="pass-new" required>
                <div class="error" id="error-pass-new">
                    <!-- Looks good! -->
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="repass-new" class="col-sm-4 col-form-label">Nhập lại mật khẩu mới</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="repass-new" required>
                <div class="error" id="error-repass-new">
                    <!-- Looks good! -->
                </div>
            </div>
        </div>
        <button class="btn btn-primary submitSetPass">THAY ĐỔI</button>
    </div>
    <div class="setpass-right">
        <h2>THAY ĐỔI THÔNG TIN</h2>
        <div class="row mb-3">
            <label for="edit-phone-bch" class="col-sm-4 col-form-label">Số điện thoại</label>
            <div class="col-sm-6">
                <?php echo  "<input type='hidden' id='tentaikhoan' value='" . $_SESSION['Tên tài khoản'] . "'>" ?>
                <input type="text" class="form-control" id="edit-phone-bch" required>
                <div class="error" id="error-edit-phone-bch">
                    <!-- Looks good! -->
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="edit-email-bch" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="edit-email-bch" required>
                <div class="error" id="error-edit-email-bch">
                    <!-- Looks good! -->
                </div>
            </div>
        </div>
        <button class="btn btn-primary submitSetInfoBCH">THAY ĐỔI</button>
    </div>
</div>
<script>
    submitSetPass();
    submitEditInfoTVBCH();
</script>