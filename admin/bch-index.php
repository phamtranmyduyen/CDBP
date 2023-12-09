<!-- <html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="../bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link href="../fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
    <script src="../jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js" integrity="sha256-aHuHTU7SdMUuRBFzJX+PRkbfy9kd0uGHS8uc4M/NVBo=" crossorigin="anonymous"></script>
    <title>Công đoàn bộ phận</title>
    <link type="text/css" rel="stylesheet" href="../cdbp-css.css" />
    <link href="../fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
</head>
<script src="./admin-js.js"></script>

<body class="body-admin"> -->
<?php
session_start();
?>
    <input type="checkbox" id="check" />
    <label class="check-label" for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="slidebar">
        <header class="slidebar-header"><a style="text-decoration: none; color: red" href="admin.php">CÔNG ĐOÀN SGU</a></header>
        <ul>
            <?php require_once('../DataProvider.php'); ?>
            <?php require('database-admin/data-bch-menu.php'); ?>
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
            <li id="logout-admin"><a href="../logout.php">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="content-admin">

    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item" id="prevPage">
                <a class="page-link" aria-label="Previous" style="cursor:pointer">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item" id="page" style="display: flex">
            </li>
            <li class="page-item" id="nextPage">
                <a class="page-link" aria-label="Next" style="cursor:pointer">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<!-- </body>

</html> -->