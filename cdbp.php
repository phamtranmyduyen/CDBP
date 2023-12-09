<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css" />
    <link href="fontawesome-free-5.15.4/css/all.min.css" rel="stylesheet" />
    <script type="text/javascript" src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <title>Công đoàn bộ phận</title>
    <link type="text/css" rel="stylesheet" href="cdbp-css.css" />
</head>
<script src="cdbp-js.js"></script>
<script src="admin/admin-js.js"></script>
<script src="validate.js"></script>
<script>
    var bien = 0;
</script>

<body class='body-index'>
<div class="content-all">

    <div class="logo">
        <img id="logo-sgu" src="./img/logo-sgu.png" />
        <div class="label-main">
            <h3>TRƯỜNG ĐẠI HỌC SÀI GÒN</h3>
            <h3>CÔNG ĐOÀN TRƯỜNG</h3>
        </div>
        <div class="clickmenu" onclick="anMenu();"><i class="fas fa-bars"></i></div>
    </div>

    <header class="main-header">
        <div class="menu">
            <?php require("giaodien/menu-top.php"); ?>
        </div>
    </header>

    <div class="content">

    </div>
</div>
<footer class="footer">
    <div>Copyright ©2009 Trường ĐH Sài Gòn - Đại học chính quy</div>
    <div style="margin: 7px">Quản lý bởi Ủy ban nhân dân TP. Hồ Chí Minh</div>
</footer>
</body>

<script>
    
    
    window.onload = function() {
        pointCDBPMenu();
        innerIndex();
        


        var $elems = $('nav a');

        function Border(opt) {
            this.elem = opt.elem;
            this.active = false;
            this.canvas = document.createElement('canvas');
            this.ctx = this.canvas.getContext('2d');
            this.width = this.canvas.width = this.elem.outerWidth();
            this.height = this.canvas.height = this.elem.outerHeight();
            this.borderSize = parseInt(this.elem.css('border-left-width'), 10);
            this.waypoints = [
                [0, 0],
                [this.width - this.borderSize, 0],
                [this.width - this.borderSize, this.height - this.borderSize],
                [0, this.height - this.borderSize]
            ];
            this.tracer = {
                x: 0,
                y: 0,
                color: opt.color,
                speed: opt.speed,
                waypoint: 0
            };
            this.canvas.style.top = -this.borderSize + 'px';
            this.canvas.style.left = -this.borderSize + 'px';
            this.elem.append($(this.canvas));
            console.log($elems.outerWidth());
        }

        Border.prototype.loop = function() {
            if (this.active) {
                requestAnimationFrame($.proxy(this.loop, this));
                this.ctx.globalCompositeOperation = 'destination-out';
                this.ctx.fillStyle = 'rgba(0, 0, 0, .05)';
                this.ctx.fillRect(0, 0, this.width, this.height);
                this.ctx.globalCompositeOperation = 'source-over';
                this.ctx.fillStyle = this.tracer.color;
                this.ctx.fillRect(this.tracer.x, this.tracer.y, this.borderSize, this.borderSize);

                var previousWaypoint = (this.tracer.waypoint == 0) ? this.waypoints[this.waypoints.length - 1] : this.waypoints[this.tracer.waypoint - 1],
                    dxTotal = previousWaypoint[0] - this.waypoints[this.tracer.waypoint][0],
                    dyTotal = previousWaypoint[1] - this.waypoints[this.tracer.waypoint][1],
                    distanceTotal = Math.sqrt(dxTotal * dxTotal + dyTotal * dyTotal),
                    angle = Math.atan2(this.waypoints[this.tracer.waypoint][1] - this.tracer.y, this.waypoints[this.tracer.waypoint][0] - this.tracer.x),
                    vx = Math.cos(angle) * this.tracer.speed,
                    vy = Math.sin(angle) * this.tracer.speed,
                    dxFuture = previousWaypoint[0] - (this.tracer.x + vx),
                    dyFuture = previousWaypoint[1] - (this.tracer.y + vy),
                    distanceFuture = Math.sqrt(dxFuture * dxFuture + dyFuture * dyFuture);

                if (distanceFuture >= distanceTotal) {
                    this.tracer.x = this.waypoints[this.tracer.waypoint][0];
                    this.tracer.y = this.waypoints[this.tracer.waypoint][1];
                    this.tracer.waypoint = (this.tracer.waypoint == this.waypoints.length - 1) ? 0 : this.tracer.waypoint + 1;
                } else {
                    this.tracer.x += vx;
                    this.tracer.y += vy;
                }
            } else {
                this.ctx.clearRect(0, 0, this.width, this.height);
            }
        }

        $elems.each(function() {
            var $this = $(this);
            var border = $this.data('border', new Border({
                elem: $this,
                color: $this.data('color'),
                speed: $this.data('speed')
            }));
            $this.data('border').loop();
        });

        $elems.on('mouseenter', function() {
            var border = $(this).data('border');
            $(border.canvas).stop(true).animate({
                'opacity': 1
            }, 400);
            if (!border.active) {
                border.active = true;
                border.loop();
            }
        });

        $elems.on('mouseleave', function() {
            var border = $(this).data('border');
            $(border.canvas).stop(true).animate({
                'opacity': 0
            }, 400, function() {
                border.active = false;
                border.tracer.x = 0;
                border.tracer.y = 0;
                border.tracer.waypoint = 0;
            });
        });

        function stickyContent() {
            const header = document.querySelector("header")
            const content = document.querySelector(".content")
            window.addEventListener("scroll", function() {
                x = window.pageYOffset
                if (x > 1) {
                    header.classList.add("sticky")
                    content.classList.add("sticky")
                } else {
                    header.classList.remove("sticky")
                    content.classList.remove("sticky")
                }
            })
        }
        stickyContent();
        $.post("database/hienThiKhoaBangdiemchinhthuc.php", function(data) {
            if (data == '0') {
                console.log(document.querySelector("#menuLeft1"));
                document.querySelector("#subMenuTop1").style.display = 'none';
            } else {
                document.querySelector('#subMenuTop1').style.display = 'block';
            }
        });
    }
</script>

</html>