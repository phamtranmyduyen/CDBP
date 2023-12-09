<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="../bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link href="../fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
    <script src="../jquery/dist/jquery.min.js"></script>
    <script src="../validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js" integrity="sha256-aHuHTU7SdMUuRBFzJX+PRkbfy9kd0uGHS8uc4M/NVBo=" crossorigin="anonymous"></script>
    <title>Công đoàn bộ phận</title>
    <link type="text/css" rel="stylesheet" href="../cdbp-css.css" />
    <link href="../fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
    <script src="./admin-js.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    
</head>

<body class="body-admin">
    <?php
    session_start();
    if (!isset($_SESSION['Tên tài khoản'])) {

        echo "<script>Swal.fire('Bạn hiện không xem được nội dung này. Hãy đăng nhập!')
    
    document.querySelector('.swal2-container').onclick = function() {
        window.location = '../index.php';
    }
    document.querySelector('.swal2-confirm').onclick = function() {
        window.location = '../index.php';
    }
    </script>";
    } else {
        if (isset($_SESSION['Quyền']) && ($_SESSION['Quyền'] != 'AD') && ($_SESSION['Quyền'] != 'TVBCH')) {
            echo "<script>Swal.fire('Bạn hiện không truy cập được vào trang này. Hãy đăng nhập!')
        document.querySelector('.swal2-container').onclick = function() {
            window.location = '../index.php';
        }
        document.querySelector('.swal2-confirm').onclick = function() {
            window.location = '../index.php';
        }
        </script>";
        }
    }

    ?>
    <div class="content-all">
        <div class="header">

            <div class="logo">

                <img id="logo-sgu" src="../img/logo-sgu.png" />
                <div class="label-main">
                    <h3>TRƯỜNG ĐẠI HỌC SÀI GÒN</h3>
                    <h3>CÔNG ĐOÀN TRƯỜNG</h3>
                </div>
                <a href="../logout.php" class="logout btn btn-secondary">
                    ĐĂNG XUẤT
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </div>

        </div>
        <div class="funtions">
            <div class="funtions-list">
                <?php require_once('../DataProvider.php'); ?>
                <?php require('./database-admin/data-bch-menu.php'); ?>
                <script>
                    var funtionsListLi = document.querySelectorAll('.funtions-list li');
                    if (funtionsListLi.length <= 3) {
                        for (i = 0; i < funtionsListLi.length; i++) {
                            funtionsListLi[i].style.marginLeft = '400px';
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div>Copyright ©2009 Trường ĐH Sài Gòn - Đại học chính quy</div>
        <div style="margin: 7px">Quản lý bởi Ủy ban nhân dân TP. Hồ Chí Minh</div>
    </footer>
</body>

</html>
<script>
    innerAdmin();
</script>