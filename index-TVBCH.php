<html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js" integrity="sha256-aHuHTU7SdMUuRBFzJX+PRkbfy9kd0uGHS8uc4M/NVBo=" crossorigin="anonymous"></script>

</html>
<?php
session_start();
if (!isset($_SESSION['Tên tài khoản'])) {

    echo "<script>Swal.fire('Bạn hiện không xem được nội dung này. Hãy đăng nhập!')
    
    document.querySelector('.swal2-container').onclick = function() {
        window.location = 'index.php';
    }
    document.querySelector('.swal2-confirm').onclick = function() {
        window.location = 'index.php';
    }
    </script>";
} else {
    if (isset($_SESSION['Quyền']) && ($_SESSION['Quyền'] != 'TVBCH' && $_SESSION['Quyền'] != 'CTCD')) {
        echo "<script>Swal.fire('Bạn hiện không truy cập được vào trang này. Hãy đăng nhập!')
        document.querySelector('.swal2-container').onclick = function() {
            window.location = 'index.php';
        }
        document.querySelector('.swal2-confirm').onclick = function() {
            window.location = 'index.php';
        }
        </script>";
    }
}

?>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link href="fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

    <!-- SweetAlert2 -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js" integrity="sha256-aHuHTU7SdMUuRBFzJX+PRkbfy9kd0uGHS8uc4M/NVBo=" crossorigin="anonymous"></script> -->
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <title>Công đoàn bộ phận</title>
    <link type="text/css" rel="stylesheet" href="cdbp-css.css" />
</head>
<script src="./cdbp-js.js"></script>
<script src="admin/admin-js.js"></script>
<script src="validate.js"></script>

<script>
    innerBCH();
</script>

<body class="body-menu-bch">
    <div class="content-all">
        <input type="checkbox" id="check" />
        <label class="check-label" for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="slidebar">
            <header class="slidebar-header"><a class="username" style="text-decoration: none; color: red"><?php echo $_SESSION['Tên tài khoản']; ?></a></header>
            <ul>
                <?php require_once('./DataProvider.php'); ?>
                <?php require('./admin/database-admin/data-bch-menu.php'); ?>
                <script>
                    var sections = document.querySelectorAll('.btn-outline-primary');
                    for (let i = 0; i < sections.length; i++) {
                        sections[i].classList.remove('btn');
                        sections[i].classList.remove('btn-outline-primary');
                    }
                    var optionLiMenu = document.querySelectorAll('.option-li-menu')
                    for (let j = 0; j < optionLiMenu.length; j++) {

                        optionLiMenu[j].style.display = 'none';
                    }
                </script>
                <li id="menu-setpass-BCH" style="cursor: pointer;">
                        <a>Đổi mật khẩu</a>
                </li>
                <li class="menu-logout-BCH"><a href="logout.php">Đăng xuất</a></li>

            </ul>
        </div>
        <div class="header" style="margin-bottom: 20px">
            <div class="logo">
                <img id="logo-sgu" src="img/logo-sgu.png" />
                <div class="label-main">
                    <h3>TRƯỜNG ĐẠI HỌC SÀI GÒN</h3>
                    <h3>CÔNG ĐOÀN TRƯỜNG</h3>
                </div>
            </div>

        </div>
        <div class="content-admin">
        </div>
        <nav id="action-page" aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" id="prevPage" aria-label="Previous" style="cursor:pointer">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item" id="page" style="display: flex">
                </li>
                <li class="page-item">
                    <a class="page-link" id="nextPage" aria-label="Next" style="cursor:pointer">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="footer">
        <div>Copyright ©2009 Trường ĐH Sài Gòn - Đại học chính quy</div>
        <div style="margin: 7px">Quản lý bởi Ủy ban nhân dân TP. Hồ Chí Minh</div>
    </footer>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js" integrity="sha256-aHuHTU7SdMUuRBFzJX+PRkbfy9kd0uGHS8uc4M/NVBo=" crossorigin="anonymous"></script>