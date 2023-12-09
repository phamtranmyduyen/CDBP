<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Công đoàn bộ phận</title>
    <script type="text/javascript" src="./bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="cdbp-js.js"></script>
    <script src="jquery/dist/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="./bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="cdbp-css.css" />
    <link href="./fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
</head>


<body class="login-body">
    <div class="login-div">
        <div class="logo">
            <img id="logo-sgu" src="img/logo-sgu.png" />
            <div class="label-main">
                <h3>TRƯỜNG ĐẠI HỌC SÀI GÒN</h3>
                <h3>CÔNG ĐOÀN TRƯỜNG</h3>
            </div>
        </div>

        <form class="login-form" method='POST' action="login.php?do=login">
            <h2 class="login-title">ĐĂNG NHẬP</h2>
            <div class="id-cd">
                <label>Mã CĐBP</label>
                <input type="text" name="txtUsername" class="id-cd" id="id-login" />
            </div>
            <div class="password">
                <label>Mật khẩu</label>
                <input type="password" name="txtPassword" class="password" id="password-login" />
            </div>
            <div class="error" id="error-login">

            </div>
            <div class="error" id="ok-login">

            </div>
            <input type="" name="submitLogin" class="btn btn-primary login-submit" value="ĐĂNG NHẬP" />
        </form>
    </div>
</body>

</html>
<script>
    xuly_login();
</script>