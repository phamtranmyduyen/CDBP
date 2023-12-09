function setInputValue(selector, value) {
    var element = document.getElementById(selector);
    element.value = value;
}

function getInputValue(selector) {
    var element = document.getElementById(selector);
    return element.value;
}

function xuly_login() {
    $('.login-body').ready(function() {

        $(document).on('click', '.login-submit', function() {
            var username = $("#id-login").val();
            var password = $("#password-login").val();
            var error = $("#error-login");
            var ok = $("#ok-login");

            // resert 2 thẻ div thông báo trở về rỗng mỗi khi click nút đăng nhập
            error.html("");
            ok.html("");

            // Kiểm tra nếu username rỗng thì báo lỗi
            if (username == "") {
                error.html("Tên đăng nhập không được để trống");
                return false;
            }
            // Kiểm tra nếu password rỗng thì báo lỗi
            if (password == "") {
                error.html("Mật khẩu không được để trống");
                return false;
            }

            // Chạy ajax gửi thông tin username và password về server xuly-login.php
            // để kiểm tra thông tin đăng nhập hợp lệ hay chưa
            $.post("xuly-login.php", {
                    username: username,
                    password: password
                },
                function(data) {
                    console.log(data);
                    // var tmp = data.substr(data.length - 1);
                    if (data == "CDBP") {
                        ok.html("Đăng nhập thành công");
                        window.location = './cdbp.php';
                    } else if (data == "AD") {
                        ok.html("Đăng nhập thành công");
                        window.location = './admin/admin.php'
                    } else if (data == "TVBCH") {
                        ok.html("Đăng nhập thành công");
                        window.location = './index-TVBCH.php'
                    } else if (data == "CTCD") {
                        ok.html("Đăng nhập thành công");
                        window.location = './index-TVBCH.php'
                    } else {
                        //  error.html("Tên đăng nhập hoặc mật khẩu không chính xác !"); //LỖI
                        ok.html("Đăng nhập thành công");
                        window.location = './admin/admin.php'
                    }
                });


        });
    });
}


function view_data(dataIndex) {
    $.post('database/data-' + dataIndex + '.php', function(data) {
        $('#load-data-' + dataIndex).html(data);
    })
}

function formatDate(StringDate) {
    var time = new Date(StringDate).toLocaleTimeString()
    if (time == "00:00:00") {
        date = new Date(StringDate).getDate() + 1;
        dateFull = new Date(new Date(StringDate).getFullYear(), new Date(StringDate).getMonth(), date)
        dateOfficial = dateFull.toISOString().slice(0, 10) + "T" + time;
    } else {
        dateFull = new Date(StringDate);
        dateOfficial = dateFull.toISOString().slice(0, 10) + "T" + time;
    }
    return dateOfficial;

}

function onclickActionThongbao(id) {
    document.querySelector('.form-edit-notification-BCH').style.display = 'block';
    var dateStart = formatDate(document.getElementsByClassName(id)[3].textContent);
    var dateEnd = formatDate(document.getElementsByClassName(id)[4].textContent);
    setInputValue('form-edit-notification-BCH-ngaythuchien', dateStart);
    setInputValue('form-edit-notification-BCH-ngayhethan', dateEnd);
    setInputValue('form-edit-notification-BCH-noidung', document.getElementsByClassName(id)[1].textContent);
}

function onclickEditGioithieu(id) {
    document.querySelector('.form-edit-introduce-BCH').style.display = 'block';
    setInputValue('form-edit-introduce-BCH-noidunggioithieu', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-introduce-BCH-hinhanh-cu', document.getElementsByClassName(id)[1].value);
    const fileUploader = document.getElementById('form-edit-introduce-BCH-hinhanh');

    fileUploader.addEventListener('change', (event) => {
        const files = event.target.name;
        // console.log('files', files);
        console.log(fileUploader.value);
        lengthSplitFile = fileUploader.value.split("\\").length;
        console.log(fileUploader.value.split("\\")[length - 1]);
        fileImgNew = "./img/" + fileUploader.value.split("\\")[length - 1];
        setInputValue('form-edit-introduce-BCH-hinhanh-cu', fileImgNew);
    });
}

function phantrangBCH(id) {
    $.post('database/data-' + id + '.php', { start: start, end: end }, function(data) {
        $('#load-data-' + id).html(data);
        var StringCount = 'count' + id;
        console.log(StringCount);
        count = document.getElementById(StringCount).textContent;
        renderPage();
        $('#load-data-' + id).html(data);
        clickPage(phantrangBCH, id);
        if (id == 'index-TVBCH') {
            hienthikhoa(document.querySelectorAll('.action-bang-diem'));
        }
        if (id == 'notification-BCH') {
            hienthithongbao();
        }
        if (id == 'introduce-BCH') {
            hienthigioithieu();
            hienthichitietgioithieu();
        }
    });
}
//_________________ XỬ LÝ PHÂN TRANG CÓ TÌM KIẾM___________________________
function actionPhantrangfindBCH(id, ten, key) {
    $.post("database/find-" + id + ".php", {
        [ten]: key,
        start: start,
        end: end
    }, function(data) {
        console.log(data);
        // console.log('#load_data_' + id);
        $('#load-data-' + id).html(data);
        var StringCount = 'count' + id;
        // console.log("." + StringCount);
        count = document.querySelector('.' + StringCount).textContent;
        renderPage();
        $('#load-data-' + id).html(data);
        clickPage(actionPhantrangfindBCH, id, ten, key);
    });
}
// _____________________________________________________________________________________________
function phantrangfindBCH(id, key) {
    var ten = key;
    key = $('#input-' + ten).val();
    actionPhantrangfindBCH(id, ten, key);

}
// ________________________
function phantrangBCHBoloc(id, valueFilter) {
    $.post('database/data-' + id + '.php', {
        valueFilter: valueFilter,
        start: start,
        end: end
    }, function(data) {
        console.log('#load-data-' + id);
        $('#load-data-' + id).html(data);
        console.log(data);
        var StringCount = 'count' + id;
        console.log(StringCount);
        console.log(document.getElementById(StringCount));
        count = document.getElementById(StringCount).textContent;
        renderPage();
        $('#load-data-' + id).html(data);
        clickPageBoloc(phantrangBCHBoloc, id, valueFilter);
        if (id == 'index-TVBCH') {
            hienthikhoa(document.querySelectorAll('.action-bang-diem'));
        }
    });
}


function nextPageBoloc(page, id, valueFilter) {
    let totalPage = Math.ceil(count / perPage)
    currentPage++;
    console.log(currentPage);
    if (currentPage > totalPage) {
        currentPage = totalPage;
    }
    getCurrentPage(currentPage);
    page(id, valueFilter);
}

function prevPageBoloc(page, id, valueFilter) {
    let totalPage = Math.ceil(count / perPage)
    currentPage--;
    if (currentPage <= 1) {
        currentPage = 1;
    }
    getCurrentPage(currentPage)
    page(id, valueFilter);
}

function clickPageBoloc(page, id, valueFilter) {
    const currentPages = document.querySelectorAll('#page a');
    for (let i = 0; i < currentPages.length; i++) {
        currentPages[i].addEventListener('click', function() {
            let value = i + 1;
            currentPage = value;
            getCurrentPage(currentPage);
            page(id, valueFilter);
        })
    }
}
// SAVE ĐIỂM CĐBP CHẤM
function ValidateInputDiem() {
    $.post('database/get-diemchuan.php', function(data) {
        var diemchuan = data.split(",");
        var text;
        if (document.querySelectorAll('.textBCH').length == 0) {
            text = document.querySelectorAll('.textCDBP');
        } else
            text = document.querySelectorAll('.textBCH');
        var i = 0;
        for (var j = 0; j < text.length; j++) {
            text[j].max = diemchuan[i];
            i++;
        }
        $('input[type="number"]').on('input change keyup paste', function() {
            if (this.min) this.value = Math.max(parseInt(this.min), parseInt(this.value));
            if (this.max) this.value = Math.min(parseInt(this.max), parseInt(this.value));
        });


    });

}

function saveDiemCDBP() {
    $('.body-point-CDBP').ready(function() {
        $.post('database/set-trangthai-chamdiem.php', function(data) {
            console.log(data);
        });

        var count = 0;
        var maCDBP = document.querySelector('.maCDBP-login').textContent;
        console.log(document.querySelector('.maCDBP-login'));
        console.log(maCDBP);
        $.post('database/data-point-CDBP.php', {
            maCDBP: maCDBP
        }, function(data) {
            console.log(data);
            $('#load-data-point-CDBP').html(data);
            $(".textCDBP").focus(function() {
                if ($(this).val() == $(this).data("DefaultText"))
                    $(this).val('');
            });
            // ẨN NÚT SAVE KHI BCH KHÓA
            document.querySelector('#input-ten-CDBP').innerHTML = document.querySelector('.tenCDBP-login').value;
            // document.querySelector('#info-mabangchamdiem').innerHTML = document.querySelector('#mabangchamdiem-hientai').value;
            var diemCDBP = document.querySelectorAll('.textCDBP');

            for (var i = 0; i < diemCDBP.length; i++) {
                if (diemCDBP[i].disabled == true)
                    count++;
            }
            if (count == diemCDBP.length) {
                document.querySelector('.save-point-CDBP').style.display = 'none';
            }
            // ẨN NÚT SAVE => HIỆN NÚT UPDATE
            var countValueCDBP = 0;
            for (var i = 0; i < diemCDBP.length; i++) {
                if (diemCDBP[i].value != '')
                    countValueCDBP++;
            }
            if (countValueCDBP != 0) {
                document.querySelector('.submit-save-point-CDBP').style.display = 'none';
                document.querySelector('.submit-update-point-CDBP').style.display = 'flex';
            }
            $.post('database/tongdiemtieuchi.php', { maCDBP: maCDBP }, function(data) {
                console.log(data);
                var tongdiem = data.split("/");
                var tongdiemcdbp = tongdiem[0].split(",");
                var innerTongdiemcdbp = document.querySelectorAll('.tongdiemtieuchicdbp');
                var i = 0;
                for (var j = 0; j < innerTongdiemcdbp.length; j++) {
                    innerTongdiemcdbp[j].textContent = tongdiemcdbp[i];
                    i++;
                }


            });

            ValidateInputDiem();
        })



        $(document).on('click', '.submit-save-point-CDBP', function() {
            document.querySelector('.submit-save-point-CDBP').style.display = 'none';
            document.querySelector('.submit-update-point-CDBP').style.display = 'flex';
            var tenCDBP = document.querySelector('.maCDBP-login').textContent;
            var noidungchitiettieuchi = document.querySelectorAll('.input-macttc');
            var diemcdbpcham = document.querySelectorAll('.textCDBP');

            var saveNoidungchitiettieuchi = [];
            for (var i = 0; i < noidungchitiettieuchi.length; i++) {
                console.log(noidungchitiettieuchi[i].value);
                saveNoidungchitiettieuchi.push(noidungchitiettieuchi[i].value)


            }
            var saveDiemCDBPchitiettieuchi = [];
            for (var i = 0; i < diemcdbpcham.length; i++) {
                saveDiemCDBPchitiettieuchi.push(diemcdbpcham[i].value)
            }
            $.post("database/save-bangchamdiem-cdbp.php", {
                    saveNoidungchitiettieuchi: saveNoidungchitiettieuchi,
                    saveDiemCDBPchitiettieuchi: saveDiemCDBPchitiettieuchi,
                    tenCDBP: tenCDBP
                },
                function(data) {
                    alert(data)
                });
        });
        $(document).on('click', '.submit-update-point-CDBP', function() {
            var diemCDBPmoi = document.querySelectorAll('.textCDBP');
            var saveDiemCDBPmoi = [];
            for (var i = 0; i < diemCDBPmoi.length; i++) {
                saveDiemCDBPmoi.push(diemCDBPmoi[i].value)
            }
            var machitiettieuchi = document.querySelectorAll('.input-macttc');
            var saveMachitiettieuchi = [];
            for (var i = 0; i < machitiettieuchi.length; i++) {
                saveMachitiettieuchi.push(machitiettieuchi[i].value)
            }

            $.post("database/update-bangchamdiem.php", {
                maCDBP: maCDBP,
                saveDiemCDBPmoi: saveDiemCDBPmoi,
                saveMachitiettieuchi: saveMachitiettieuchi
            }, function(data) {
                alert(data);
            });

        })
    });

}

function saveBangDiemBCH(mabangdiem) {


    var diemBCHcham = document.getElementsByName("txtTextBCH" + mabangdiem);
    var saveDiemBCHchitiettieuchi = [];
    var diemBTV = document.querySelector('.diemBTVcham').value;
    for (var i = 0; i < diemBCHcham.length; i++) {
        saveDiemBCHchitiettieuchi.push(diemBCHcham[i].value)
    }
    var machitiettieuchi = document.querySelectorAll('.input-macttc-' + mabangdiem);
    var saveMachitiettieuchi = [];
    for (var i = 0; i < machitiettieuchi.length; i++) {
        saveMachitiettieuchi.push(machitiettieuchi[i].value)
    }


    function luukhongkhoa() {
        $.post("database/save-point-BCH.php", {
            mabangdiem: mabangdiem,
            saveDiemBCHchitiettieuchi: saveDiemBCHchitiettieuchi,
            saveMachitiettieuchi: saveMachitiettieuchi,
            diemBTV: diemBTV
        }, function(data) {
            alert(data);
        });
    }

    function luuvakhoa() {
        luukhongkhoa();
        $.post("database/data-khoachinhsua.php", {
                mabangdiem: mabangdiem
            }, function(data) {
                alert(data);
            }

        );
    }
    confirmSave("Bạn có muốn khóa bảng chấm điểm này không?", luuvakhoa, luukhongkhoa);
}
var saveDiemBCHchitiettieuchi = [];

function xulyykien(mabangdiem) {
    var actionykien = true;
    var diemBCHcham = document.getElementsByName("txtTextBCH" + mabangdiem);
    var diemBTV = document.querySelector('.diemBTVcham').value;
    for (var i = 0; i < diemBCHcham.length; i++) {
        saveDiemBCHchitiettieuchi.push(diemBCHcham[i].value)
    }
    var machitiettieuchi = document.querySelectorAll('.input-macttc-' + mabangdiem);
    var saveMachitiettieuchi = [];
    for (var i = 0; i < machitiettieuchi.length; i++) {
        saveMachitiettieuchi.push(machitiettieuchi[i].value)
    }

    $.post("database/save-point-BCH.php", {
        mabangdiem: mabangdiem,
        saveDiemBCHchitiettieuchi: saveDiemBCHchitiettieuchi,
        saveMachitiettieuchi: saveMachitiettieuchi,
        diemBTV: diemBTV,
        actionykien: actionykien
    }, function(data) {
        alert(data);
    });


}

function hienthikhoa(address) {
    var khoatmp = address;
    var khoabangdiem = document.querySelectorAll('.khoa-bang-diem');
    var mokhoabangdiem = document.querySelectorAll('.mo-khoa-bang-diem');
    var arrkhoabangdiem = [];
    for (var i = 0; i < khoatmp.length; i++) {
        arrkhoabangdiem.push(khoatmp[i].value);
    }
    $.post("database/data-check-khoachinhsua.php", {
            arrkhoabangdiem: arrkhoabangdiem
        },
        function(data) {
            var arrKhoa = data.split(" ");
            for (var i = 0; i < arrKhoa.length; i++) {
                if (arrKhoa[i] == '1') {
                    khoabangdiem[i].style.display = 'none';
                    mokhoabangdiem[i].style.display = 'inline-block';
                } else if (arrKhoa[i] == '0') {
                    khoabangdiem[i].style.display = 'inline-block';
                    mokhoabangdiem[i].style.display = 'none';
                }
            }
        });

}

function innerTongDiemTieuChi(id, value) {
    $.post('database/tongdiemtieuchi.php', {
        [id]: value
    }, function(data) {
        console.log(data);
        var tongdiem = data.split("/");
        var tongdiemcdbp = tongdiem[0].split(",");
        var tongdiembch = tongdiem[1].split(",");
        var innerTongdiemcdbp = document.querySelectorAll('.tongdiemtieuchicdbp');
        var innerTongdiembch = document.querySelectorAll('.tongdiemtieuchibch');
        console.log(innerTongdiembch);
        var i = 0;
        for (var j = 0; j < innerTongdiemcdbp.length; j++) {
            console.log(innerTongdiemcdbp[j]);
            innerTongdiemcdbp[j].textContent = tongdiemcdbp[i];
            i++;
        }
        var k = 0;
        for (var j = 0; j < innerTongdiembch.length; j++) {
            console.log(innerTongdiembch[j]);
            innerTongdiembch[j].textContent = tongdiembch[k];
            k++;
        }

    });
    ValidateInputDiem();

}

function innerIndexTVBCH() {
    var valueFilter = getInputValue('filter-index-TVBCH');
    phantrangBCHBoloc('index-TVBCH', valueFilter);
    ValidateInputDiem();
}

function xulyIndexBCH() {
    $(document).on('click', '.action-bang-diem', function() {
        document.querySelector('.filter-bangchamdiem-moinhat').style.display = 'none';
        document.querySelector('#action-page').style.display = 'none';
        document.querySelector('#load-data-index-TVBCH').style.display = 'none';
        document.querySelector('.table-action-point-CDBP').style.display = 'block';
        var mabangdiem = $(this).val();

        function innerActionPointCDBP() {
            $.post("database/data-action-point-CDBP.php", {
                    mabangdiem: mabangdiem
                },
                function(data) {
                    $('#load-data-action-point-CDBP').html(data);
                    innerTongDiemTieuChi("mabangdiem", mabangdiem);
                });
        }
        innerActionPointCDBP();
        $.post("database/data-title-action-point-CDBP.php", {
                mabangdiem: mabangdiem
            },
            function(data) {
                $('.title-action-point-CDBP').html(data);
            });

        $(document).on('click', '.save-point-BCH', function() {
            saveBangDiemBCH(mabangdiem);
            innerActionPointCDBP();
        });
    });


    $('.bangdiemcongdoan-moinhat').ready(function() {


        innerIndexTVBCH();
        $(document).on('change', '#filter-index-TVBCH', function() {
            innerIndexTVBCH();
        });
        $(document).on('click', '#nextPage', function() {
            var valueFilter = getInputValue('filter-index-TVBCH');
            nextPageBoloc(phantrangBCHBoloc, 'index-TVBCH', valueFilter);
        });
        $(document).on('click', '#prevPage', function() {
            var valueFilter = getInputValue('filter-index-TVBCH');
            prevPageBoloc(phantrangBCHBoloc, 'index-TVBCH', valueFilter);
        });


    });




    $(document).on('click', '.back', function() {
        document.querySelector('#load-data-index-TVBCH').style.display = 'flex';
        innerIndexTVBCH();
        document.querySelector('.table-action-point-CDBP').style.display = 'none';
        document.querySelector('#action-page').style.display = 'block';
        document.querySelector('.filter-bangchamdiem-moinhat').style.display = 'block';
    });
    $(document).on('click', '.khoa-bang-diem', function() {
        var mabangdiem = $(this).val();
        $.post("database/data-khoachinhsua.php", {
            mabangdiem: mabangdiem
        }, function(data) {
            hienthikhoa(document.querySelectorAll('.action-bang-diem'));
            alert(data)
        });
    });
    $(document).on('click', '.mo-khoa-bang-diem', function() {
        var mabangdiem = $(this).val();
        $.post("database/data-mokhoachinhsua.php", {
            mabangdiem: mabangdiem
        }, function(data) {
            hienthikhoa(document.querySelectorAll('.action-bang-diem'));
            alert(data)
        });
    });



}

function innerQuanLyYKien() {
    var valueFilter = getInputValue('filter-index-TVBCH');
    phantrangBCHBoloc('quanlyykien', valueFilter);
    ValidateInputDiem();
}
var saveDiemBCHchitiettieuchi_old = [];

function xulyIndexQuanLyYKien() {
    $(document).on('click', '.action-y-kien', function() {
        document.querySelector('.filter-bangchamdiem-moinhat').style.display = 'none';
        document.querySelector('#action-page').style.display = 'none';
        document.querySelector('#load-data-quanlyykien').style.display = 'none';
        document.querySelector('.table-action-point-CDBP').style.display = 'block';
        var mabangdiem = $(this).val();

        function innerActionPointCDBP() {
            $.post("database/data-action-point-CDBP.php", {
                    mabangdiem: mabangdiem
                },
                function(data) {
                    $('#load-data-action-point-CDBP').html(data);
                    innerTongDiemTieuChi("mabangdiem", mabangdiem);
                    var diemBCHcham_old = document.getElementsByName("txtTextBCH" + mabangdiem);
                    for (var i = 0; i < diemBCHcham_old.length; i++) {
                        saveDiemBCHchitiettieuchi_old.push(diemBCHcham_old[i].value)
                    }

                });
        }
        innerActionPointCDBP();

        $.post("database/data-title-action-y-kien.php", {
                mabangdiem: mabangdiem
            },
            function(data) {
                $('.title-action-y-kien').html(data);
            });

        $(document).on('click', '.save-point-BCH-ykien', function() {
            xulyykien(mabangdiem);
            if (_.isEqual(saveDiemBCHchitiettieuchi, saveDiemBCHchitiettieuchi_old) == false) {
                $.post("database/data-action-y-kien.php", {
                        mabangdiem: mabangdiem
                    },
                    function(data) {
                        alert(data);
                    });

            }
            innerActionPointCDBP();
        });
        $(document).on('click', '.back-ykien', function() {
            document.querySelector('#load-data-quanlyykien').style.display = 'flex';
            innerQuanLyYKien();
            document.querySelector('.table-action-point-CDBP').style.display = 'none';
            document.querySelector('#action-page').style.display = 'block';
            document.querySelector('.filter-bangchamdiem-moinhat').style.display = 'block';
        });
    });


    $('.bangdiemcongdoan-moinhat').ready(function() {


        innerQuanLyYKien();
        $(document).on('change', '#filter-index-TVBCH', function() {
            innerQuanLyYKien();
        });
        $(document).on('click', '#nextPage', function() {
            var valueFilter = getInputValue('filter-index-TVBCH');
            nextPageBoloc(phantrangBCHBoloc, 'quanlyykien', valueFilter);
        });
        $(document).on('click', '#prevPage', function() {
            var valueFilter = getInputValue('filter-index-TVBCH');
            prevPageBoloc(phantrangBCHBoloc, 'quanlyykien', valueFilter);
        });


    });








}

function bangchamdiemcongdoan() {
    $('.bangchamdiem-congdoan').ready(function() {

        phantrangBCH('bangdiemcongdoan');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrangBCH, 'bangdiemcongdoan');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrangBCH, 'bangdiemcongdoan');
        });

        $(document).on('click', '.show-bang-diem', function() {
            document.querySelector('#action-page').style.display = 'none';
            document.querySelector('#load-data-bangdiemcongdoan').style.display = 'none';
            document.querySelector('#danhsach-bangchamdiem-theocongdoan').style.display = 'block';
            var macdbp = $(this).val();
            $.post('database/danhsach-bangchamdiem-theocongdoan.php', {
                macdbp: macdbp
            }, function(data) {
                console.log(data);
                $('.danhsach-bangchamdiem-theocongdoan-inner').html(data);
                document.querySelectorAll('.carousel-item')[0].classList.add('active');

            });


        });
        $(document).on('click', '.danhsach-bangchamdiem-theocongdoan-back', function() {
            document.querySelector('#load-data-bangdiemcongdoan').style.display = 'flex';
            document.querySelector('#danhsach-bangchamdiem-theocongdoan').style.display = 'none';
            document.querySelector('#action-page').style.display = 'block';
        });

        $(document).on('click', '.show-danh-sach-bang-diem', function() {
            document.querySelector('#action-page').style.display = 'none';
            document.querySelector('#load-data-bangdiemcongdoan').style.display = 'none';
            document.querySelector('#danhsach-bangchamdiem-theocongdoan').style.display = 'none';
            document.querySelector('#table-danhsach-bangchamdiem-theocongdoan').style.display = 'block';
            var macdbp = $(this).val();
            $.post('database/table-danhsach-bangchamdiem-theocongdoan.php', {
                macdbp: macdbp
            }, function(data) {
                $('#inner-table-danhsach-bangchamdiem-theocongdoan').html(data);
                hienthikhoa(document.querySelectorAll('.show-detail-table-danhsach-bangchamdiem-theocongdoan'));
            });
        });
        $(document).on('click', '.table-danhsach-bangchamdiem-theocongdoan-back', function() {
            document.querySelector('#action-page').style.display = 'block';
            document.querySelector('#load-data-bangdiemcongdoan').style.display = 'flex';
            document.querySelector('#table-danhsach-bangchamdiem-theocongdoan').style.display = 'none';
        });

        $(document).on('click', '.show-detail-table-danhsach-bangchamdiem-theocongdoan', function() {

            document.querySelector('#action-page').style.display = 'none';
            document.querySelector('#load-data-bangdiemcongdoan').style.display = 'none';
            document.querySelector('#danhsach-bangchamdiem-theocongdoan').style.display = 'none';
            document.querySelector('#table-danhsach-bangchamdiem-theocongdoan').style.display = 'none';
            document.querySelector('#inner-detail-table-danhsach-bangchamdiem-theocongdoan').style.display = 'block';

            var mabangdiem = $(this).val();
            $.post('database/data-action-point-CDBP.php', {
                mabangdiem: mabangdiem
            }, function(data) {
                $('.load-data-detail-table-danhsach-bangchamdiem-theocongdoan').html(data);
                innerTongDiemTieuChi("mabangdiem", mabangdiem);
            });
            $.post("database/data-title-action-point-CDBP.php", {
                mabangdiem: mabangdiem
            }, function(data) {
                console.log(data);
                $('.title-detail-table-danhsach-bangchamdiem-theocongdoan').html(data);
            });
            $(document).on('click', '.detail-table-danhsach-bangchamdiem-theocongdoan-back', function() {
                document.querySelector('#load-data-bangdiemcongdoan').style.display = 'none';
                document.querySelector('#table-danhsach-bangchamdiem-theocongdoan').style.display = 'block';
                document.querySelector('#inner-detail-table-danhsach-bangchamdiem-theocongdoan').style.display = 'none';
                document.querySelector('#action-page').style.display = 'none';
            });
            $(document).on('click', '.detail-table-danhsach-bangchamdiem-theocongdoan-save', function() {
                saveBangDiemBCH(mabangdiem);
            });
        });

        $(document).on('click', '.khoa-bang-diem', function() {
            var mabangdiem = $(this).val();
            $.post("database/data-khoachinhsua.php", {
                mabangdiem: mabangdiem
            }, function(data) {
                hienthikhoa(document.querySelectorAll('.show-detail-table-danhsach-bangchamdiem-theocongdoan'));
                alert(data)
            });
        });
        $(document).on('click', '.mo-khoa-bang-diem', function() {
            var mabangdiem = $(this).val();
            $.post("database/data-mokhoachinhsua.php", {
                mabangdiem: mabangdiem
            }, function(data) {
                hienthikhoa(document.querySelectorAll('.show-detail-table-danhsach-bangchamdiem-theocongdoan'));
                alert(data)
            });
        });

    });
}

function onclickBangchamdiemcongdoan() {
    $(document).on('click', '.congdoan', function() {
        hienthiBangdiemTheoCongdoan();
        bangchamdiemcongdoan();
    });
}

function bangchamdiemngay() {
    $(document).on('click', '.ngay', function() {
        hienthiBangdiemTheongay();
        document.querySelector('#action-page').style.display = 'none';
        $('.bangchamdiem-congdoan').ready(function() {
            $(document).on('click', '#loc-bangdiemngay', function() {
                document.querySelector('#load-data-bangchamdiem-theongay').style.display = 'flex';
                var tungay = $('#input-bangdiem-tungay').val();
                var denngay = $('#input-bangdiem-denngay').val();
                $.post('database/data-bangchamdiem-theongay.php', {
                    tungay: tungay,
                    denngay: denngay
                }, function(data) {
                    console.log(data);
                    $('#load-data-bangchamdiem-theongay').html(data);
                });
            });
            // phantrangBCH('bangdiemngay');
            // $(document).on('click', '#nextPage', function() {
            //     nextPage(phantrangBCH, 'bangdiemngay');
            // });
            // $(document).on('click', '#prevPage', function() {
            //     prevPage(phantrangBCH, 'bangdiemngay');
            // });

            // $(document).on('click', '.show-danh-sach-bang-diem-ngay', function() {
            //     document.querySelector('#action-page').style.display = 'none';
            //     document.querySelector('#load-data-bangdiemngay').style.display = 'none';
            //     document.querySelector('#table-danhsach-bangchamdiem-theongay').style.display = 'block';
            //     var ngay = $(this).val();
            //     $.post('database/table-danhsach-bangchamdiem-theongay.php', {
            //         ngay: ngay
            //     }, function(data) {
            //         $('#inner-table-danhsach-bangchamdiem-theongay').html(data);
            //         hienthikhoa(document.querySelectorAll('.show-detail-table-danhsach-bangchamdiem-theongay'));
            //     });
            // });
            // $(document).on('click', '.table-danhsach-bangchamdiem-theongay-back', function() {
            //     document.querySelector('#action-page').style.display = 'block';
            //     document.querySelector('#load-data-bangdiemngay').style.display = 'flex';
            //     document.querySelector('#table-danhsach-bangchamdiem-theongay').style.display = 'none';
            // });
            $(document).on('click', '.show-detail-table-danhsach-bangchamdiem-theongay', function() {

                document.querySelector('#action-page').style.display = 'none';
                document.querySelector('#table-danhsach-bangchamdiem-theongay').style.display = 'none';
                document.querySelector('#inner-detail-table-danhsach-bangchamdiem-theongay').style.display = 'block';

                var mabangdiem = $(this).val();
                $.post('database/data-action-point-CDBP.php', {
                    mabangdiem: mabangdiem
                }, function(data) {
                    $('.load-data-detail-table-danhsach-bangchamdiem-theongay').html(data);
                    ValidateInputDiem();
                });
                $(document).on('click', '.detail-table-danhsach-bangchamdiem-theongay-back', function() {
                    document.querySelector('#action-page').style.display = 'none';
                    document.querySelector('#table-danhsach-bangchamdiem-theongay').style.display = 'block';
                    document.querySelector('#inner-detail-table-danhsach-bangchamdiem-theongay').style.display = 'none';
                });
                $(document).on('click', '.detail-table-danhsach-bangchamdiem-theongay-save', function() {
                    saveBangDiemBCH(mabangdiem);
                });
            });

            $(document).on('click', '.khoa-bang-diem-ngay', function() {
                var mabangdiem = $(this).val();
                $.post("database/data-khoachinhsua.php", {
                    mabangdiem: mabangdiem
                }, function(data) {
                    hienthikhoa(document.querySelectorAll('.show-detail-table-danhsach-bangchamdiem-theongay'));
                    alert(data)
                });
            });
            $(document).on('click', '.mo-khoa-bang-diem-ngay', function() {
                var mabangdiem = $(this).val();
                $.post("database/data-mokhoachinhsua.php", {
                    mabangdiem: mabangdiem
                }, function(data) {
                    hienthikhoa(document.querySelectorAll('.show-detail-table-danhsach-bangchamdiem-theongay'));
                    alert(data)
                });
            });

        });
    });
}

function pointOfficial() {
    $('.body-point-official').ready(function() {
        var maCDBP = document.querySelector('.maCDBP-login').textContent;
        console.log(maCDBP);
        $.post('database/data-point-official.php', {
            maCDBP: maCDBP
        }, function(data) {
            // console.log(data);
            $('#load-data-point-official').html(data);
            noteykien();
            document.querySelector('.input-ten-CDBP').innerHTML = " " + document.querySelector('.tenCDBP-login').value;
            // document.querySelector('#info-mabangchamdiem').innerHTML = document.querySelector('#mabangchamdiem-hientai').value;
            // $.post('database/tongdiemtieuchi.php', function(data) {
            //     console.log(data);
            //     var tongdiem = data.split("/");
            //     var tongdiemcdbp = tongdiem[0].split(",");
            //     var tongdiembch = tongdiem[1].split(",");
            //     var innerTongdiemcdbp = document.querySelectorAll('.tongdiemtieuchicdbp');
            //     var innerTongdiembch = document.querySelectorAll('.tongdiemtieuchibch');
            //     console.log(innerTongdiembch);
            //     var i = 0;
            //     for (var j = 0; j < innerTongdiemcdbp.length; j++) {
            //         console.log(innerTongdiemcdbp[j]);
            //         innerTongdiemcdbp[j].textContent = tongdiemcdbp[i];
            //         i++;
            //     }
            //     var k = 0;
            //     for (var j = 0; j < innerTongdiembch.length; j++) {
            //         console.log(innerTongdiembch[j]);
            //         innerTongdiembch[j].textContent = tongdiembch[k];
            //         k++;
            //     }

            // });
            innerTongDiemTieuChi("maCDBP", maCDBP);
        })

    });
}



function notification() {
    $('.body-notification').ready(function() {
        var filterMode = false;

        function enableFilter() {
            if (getInputValue('filter') == 'filter') {
                filterMode = false;
            } else filterMode = true;
        }


        function innerNotification() {
            enableFilter();
            var valueFilter = getInputValue('filter');
            $.post('database/data-notification.php', {
                    valueFilter: valueFilter,
                    filterMode: filterMode
                },
                function(data) {
                    $('.body-notification').html(data);
                    document.querySelector('#panelsStayOpen-collapseOne-1').classList.add('show');
                });
        }
        innerNotification();
        $(document).on('change', '#filter', function() {
            innerNotification();
        });

    });
}

function xulyKhoa() {
    $('.quanly-chucnang-chamdiem').ready(function() {
        document.querySelector('#action-page').style.display = 'none';

        function hienThiKhoaBangdiemchinhthuc() {
            $.post("database/hienThiKhoaBangdiemchinhthuc.php", function(data) {
                if (data == '0') {
                    document.querySelector('.mo-khoa-bangdiemchinhthuc').innerHTML = 'Mở khóa bảng điểm chính thức';
                    document.querySelector('.mo-khoa-bangdiemchinhthuc').value = '0';
                } else if (data == '1') {
                    document.querySelector('.mo-khoa-bangdiemchinhthuc').innerHTML = 'Khóa bảng điểm chính thức';
                    document.querySelector('.mo-khoa-bangdiemchinhthuc').value = '1';
                }
            });
        }
        hienThiKhoaBangdiemchinhthuc();


        $(document).on('click', '.khoa-tat-ca', function() {
            $.post("database/khoatatca.php", function(data) {
                alert(data)
            });
        });
        $(document).on('click', '.mo-khoa-tat-ca', function() {
            $.post("database/mokhoatatca.php", function(data) {
                alert(data)
            });
        });
        $(document).on('click', '.mo-khoa-bangdiemchinhthuc', function() {
            var mokhoa = $(this).val();
            $.post("database/mokhoaBangdiemchinhthuc.php", {
                mokhoa: mokhoa
            }, function(data) {
                hienThiKhoaBangdiemchinhthuc();
                if (mokhoa == '0') {
                    alert('Đã mở bảng điểm chính thức');
                } else if (mokhoa == '1') {
                    alert("Đã khóa bảng điểm chính thức");
                }
            });
        });


    });
}

var mokhoaBangdiemchinhthuc = true;

function hienthithongbao() {
    var hienthitmp = document.querySelectorAll('.action-thong-bao');
    var hienthithongbao = document.querySelectorAll('.hien-thong-bao');
    var anthongbao = document.querySelectorAll('.an-thong-bao');
    var arrHienthi = [];
    for (var i = 0; i < hienthitmp.length; i++) {
        arrHienthi.push(hienthitmp[i].value);
        console.log(arrHienthi[i]);
    }
    $.post("database/data-check-hienthi-thongbao.php", {
            arrHienthi: arrHienthi
        },
        function(data) {
            var arrCheck = data.split(" ");
            for (var i = 0; i < arrCheck.length; i++) {
                if (arrCheck[i] == '0') {
                    hienthithongbao[i].style.display = 'none';
                    anthongbao[i].style.display = 'inline-block';
                } else if (arrCheck[i] == '1') {
                    hienthithongbao[i].style.display = 'inline-block';
                    anthongbao[i].style.display = 'none';
                }
            }
        });

}

function notificationBCH() {

    $('.notification-BCH').ready(function() {
        phantrangBCH('notification-BCH');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrangBCH, 'notification-BCH');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrangBCH, 'notification-BCH');
        });
        $(document).on('click', '.submit-add-thongbao', function() {
            var addTenthanhvienbch = document.querySelector('.username').textContent;
            var addNoidungthongbao = $('#input-add-noidungthongbao').val();
            var addNgaythuchien = $('#input-add-ngaythuchien').val();
            var addNgayhethan = $('#input-add-ngayhethan').val();
            var addPhanloai = $('#list-phan-loai').val();
            if (addPhanloai == 'Khác') {
                addPhanloai = '';
                addPhanloai = $('#input-add-phanloai-khac').val();
            }
            if (addNoidungthongbao != '' &&
                addNgaythuchien != '' &&
                addNgayhethan != '' &&
                addPhanloai != '') {
                $.post("database/add-thongbao.php", {
                        addTenthanhvienbch: addTenthanhvienbch,
                        addNoidungthongbao: addNoidungthongbao,
                        addNgaythuchien: addNgaythuchien,
                        addNgayhethan: addNgayhethan,
                        addPhanloai: addPhanloai
                    },
                    function(data) {
                        alert(data)
                        phantrangBCH('notification-BCH');
                    });
            }
        });
        $(document).on('click', '.action-thong-bao', function() {
            var mathongbao = $(this).val();
            onclickActionThongbao(mathongbao);
            $(document).on('click', '.submitEditNotificationBCH', function() {
                var editNgaythuchien = $('#form-edit-notification-BCH-ngaythuchien').val();
                var editNgayhethan = $('#form-edit-notification-BCH-ngayhethan').val();
                var editNoidung = $('#form-edit-notification-BCH-noidung').val();
                $.post("database/edit-notification-BCH.php", {
                        mathongbao: mathongbao,
                        editNgaythuchien: editNgaythuchien,
                        editNgayhethan: editNgayhethan,
                        editNoidung: editNoidung
                    },
                    function(data) {
                        phantrangBCH('notification-BCH');
                        alert(data);


                    });
            })
        });
    });


    $(document).on('click', '.hien-thong-bao', function() {
        var ma = $(this).val();
        $.post("database/data-hienthongbao.php", {
            ma: ma
        }, function(data) {
            hienthithongbao();
            alert(data)
        });
    });
    $(document).on('click', '.an-thong-bao', function() {
        var ma = $(this).val();
        $.post("database/data-anthongbao.php", {
            ma: ma
        }, function(data) {
            hienthithongbao();
            alert(data)
        });
    });
    $(document).on('keyup', '#input-find-noidungthongbao', function() {
        phantrangfindBCH('notification-BCH', 'find-noidungthongbao');
    })
    $(document).on('change', '#input-find-phan-loai', function() {
        phantrangfindBCH('notification-BCH', 'find-phan-loai');
    })



}

function error(title) {
    Swal.fire({
        icon: 'error',
        title: title
    })
}


function disableFilter() {
    filterMode = false;
    console.log(filterMode);
}

function changeCheckBox(cboPhanloai, idInput) {
    var sPhanloai = cboPhanloai.value;
    console.log(sPhanloai);
    var s;
    switch (sPhanloai) {
        case 'Khác':
            s = phatSinhCheckBoxKhac(idInput);
            break;
        default:
            s = '';
            break;
    }
    var objCheckBoxHTML = document.querySelector('.phanloai-khac');
    objCheckBoxHTML.innerHTML = s;
}

function phatSinhCheckBoxKhac(idInput) {
    var kq = '<input type="text" class="form-control" id="' + idInput + '"required>';
    return kq;
}

function hienthiBangdiemTheoCongdoan() {
    document.querySelector('.bangchamdiem-congdoan').style.display = 'flex';
    document.querySelector('.bangchamdiem-ngay').style.display = 'none';
    document.querySelector('#action-page').style.display = 'block';
}

function hienthiBangdiemTheongay() {
    document.querySelector('.bangchamdiem-congdoan').style.display = 'none';
    document.querySelector('.bangchamdiem-ngay').style.display = 'block';
    document.querySelector('#action-page').style.display = 'block';
}

function menuLeft() {
    var menuLeft = ["CÔNG ĐOÀN CHẤM ĐIỂM", "BẢNG ĐIỂM CHÍNH THỨC", "BẢNG XẾP HẠNG"]
    var s = "";
    for (i = 0; i < menuLeft.length; i++) {
        var id = i + 1;
        var a = '<li id="menuLeft' + i + '"><a href="cdbp.php?id=' + id + '&act=menuLeft">' + menuLeft[i] + '</a></li>';
        s += a;
    }
    s = '<ul>' + s + '</ul>';
    document.getElementById("menu-left").innerHTML = s;
}
// MENU_TOP
function pointCDBPMenu() {
    var menuTop = ["CÔNG ĐOÀN CHẤM ĐIỂM", "BẢNG ĐIỂM CHÍNH THỨC", "BẢNG XẾP HẠNG"];
    var s = "";
    for (i = 0; i < menuTop.length; i++) {
        var id = i + 1;
        // var a = '<li id="subMenuTop' + i + '"><a class="blue" data-speed="4" data-color="#39f" href="cdbp.php?id=2' + id + '&act=menuTop">' + menuTop[i] + '</a></li>';
        var a = '<li id="subMenuTop' + i + '"><a id="submenu-' + id + '" class="blue" data-speed="4" data-color="#39f">' + menuTop[i] + '</a></li>';
        s += a;
    }
    document.getElementById('nav-submenu').innerHTML = s;
}

function hienthigioithieu() {
    var hienthitmp = document.querySelectorAll('.edit-gioithieu');
    var hienthigioithieu = document.querySelectorAll('.hien-gt');
    var angioithieu = document.querySelectorAll('.an-gt');
    var arrHienthiGioithieu = [];
    for (var i = 0; i < hienthitmp.length; i++) {
        arrHienthiGioithieu.push(hienthitmp[i].value);
    }
    $.post("database/data-check-hienthi-gioithieu.php", {
            arrHienthiGioithieu: arrHienthiGioithieu
        },
        function(data) {
            var arrCheck = data.split(" ");
            for (var i = 0; i < arrCheck.length; i++) {
                if (arrCheck[i] == '0') {
                    hienthigioithieu[i].style.display = 'none';
                    angioithieu[i].style.display = 'inline-block';
                } else if (arrCheck[i] == '1') {
                    hienthigioithieu[i].style.display = 'inline-block';
                    angioithieu[i].style.display = 'none';
                }
            }
        });

}

function hienthichitietgioithieu() {
    var hienthitmp = document.querySelectorAll('.edit-chitietgioithieu');
    var hienthichitietgioithieu = document.querySelectorAll('.hien-ctgt');
    var anchitietgioithieu = document.querySelectorAll('.an-ctgt');
    var arrHienthiChitietgioithieu = [];
    for (var i = 0; i < hienthitmp.length; i++) {
        arrHienthiChitietgioithieu.push(hienthitmp[i].value);
    }
    $.post("database/data-check-hienthi-gioithieu.php", {
            arrHienthiChitietgioithieu: arrHienthiChitietgioithieu
        },
        function(data) {
            console.log(data);
            var arrCheck = data.split(" ");
            for (var i = 0; i < arrCheck.length; i++) {
                if (arrCheck[i] == '0') {
                    hienthichitietgioithieu[i].style.display = 'none';
                    anchitietgioithieu[i].style.display = 'inline-block';
                } else if (arrCheck[i] == '1') {
                    hienthichitietgioithieu[i].style.display = 'inline-block';
                    anchitietgioithieu[i].style.display = 'none';
                }
            }
        });

}



function introduceBCH() {
    $('.introduce-BCH-body').ready(function() {
        phantrangBCH('introduce-BCH');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrangBCH, 'introduce-BCH');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrangBCH, 'introduce-BCH');
        });

    });
    const fileAddImg = document.getElementById('input-add-img');
    var hinhanh = "";
    fileAddImg.addEventListener('change', (event) => {
        console.log(fileAddImg.value);
        lengthSplitFile = fileAddImg.value.split("\\").length;
        console.log(fileAddImg.value.split("\\")[length - 1]);
        hinhanh = "./img/" + fileAddImg.value.split("\\")[length - 1];
    });
    console.log(hinhanh);
    $(document).on('click', '.submit-add-gioithieu', function() {
        var noidunggioithieu = $('#input-add-content-introduce').val();
        var chitietgioithieu = [];
        length = document.getElementsByClassName('input-add-ctgt').length;
        for (i = 0; i < length; i++) {
            if (document.getElementsByClassName('input-add-ctgt')[i].value != '') {
                chitietgioithieu.push(document.getElementsByClassName('input-add-ctgt')[i].value);
            }
        }
        $.post("database/add-gioithieu.php", {
                noidunggioithieu: noidunggioithieu,
                hinhanh: hinhanh,
                chitietgioithieu: chitietgioithieu,
            },
            function(data) {
                alert(data)
                phantrangBCH('introduce-BCH');
            });

    });
    $(document).on('click', '.edit-gioithieu', function() {
        var magioithieu = $(this).val();
        onclickEditGioithieu(magioithieu);
        $(document).on('click', '.submitEditIntroduceBCH', function() {
            var editNoidung = $('#form-edit-introduce-BCH-noidunggioithieu').val();
            var editHinhanh = $('#form-edit-introduce-BCH-hinhanh-cu').val();
            $.post("database/edit-introduce-BCH.php", {
                    magioithieu: magioithieu,
                    editNoidung: editNoidung,
                    editHinhanh: editHinhanh
                },
                function(data) {
                    phantrangBCH('introduce-BCH');
                    alert(data);
                });
        })
    });
    $(document).on('click', '.del-gioithieu', function() {
        var magioithieu = $(this).val();
        confirmDelete("Bạn có muốn xóa giới thiệu này cùng với các chi tiết thuộc giới thiệu này không?", function() {
            $.post("database/del-gioithieu.php", { magioithieu: magioithieu }, function(data) {
                alert(data)
                phantrangBCH('introduce-BCH');
            });
        })
    });
    $(document).on('click', '.del-chitietgioithieu', function() {
        var machitietgioithieu = $(this).val();
        confirmDelete("Bạn có muốn xóa chi tiết thuộc giới thiệu này không?", function() {
            $.post("database/del-gioithieu.php", { machitietgioithieu: machitietgioithieu }, function(data) {
                alert(data)
                phantrangBCH('introduce-BCH');
            });
        })
    });
    $(document).on('keyup', '#input-find-noidunggioithieu', function() {
        phantrangfindBCH('introduce-BCH', 'find-noidunggioithieu');
    })
    $(document).on('change', '#input-find-trangthai', function() {
        phantrangfindBCH('introduce-BCH', 'find-trangthai');
    })
    $(document).on('click', '.hien-gt', function() {
        var magioithieu = $(this).val();
        console.log(magioithieu);
        $.post("database/data-hiengioithieu.php", {
            magioithieu: magioithieu
        }, function(data) {
            hienthigioithieu();
            hienthichitietgioithieu();
            alert(data)
        });
    });
    $(document).on('click', '.an-gt', function() {
        var magioithieu = $(this).val();
        console.log(magioithieu);
        $.post("database/data-angioithieu.php", {
            magioithieu: magioithieu
        }, function(data) {
            hienthigioithieu();
            hienthichitietgioithieu();
            alert(data)
        });
    });
    $(document).on('click', '.hien-ctgt', function() {
        var machitietgioithieu = $(this).val();
        $.post("database/data-hiengioithieu.php", {
            machitietgioithieu: machitietgioithieu
        }, function(data) {
            hienthichitietgioithieu();
            alert(data)
        });
    });
    $(document).on('click', '.an-ctgt', function() {
        var machitietgioithieu = $(this).val();
        $.post("database/data-angioithieu.php", {
            machitietgioithieu: machitietgioithieu
        }, function(data) {
            hienthichitietgioithieu();
            alert(data)
        });
    });
}

function selectDateRank() {
    display = document.querySelector('.date-xephang').style.display;

    if (countDate % 2 == 0) {
        document.querySelector('.date-xephang').style.display = "flex";
    } else {
        document.querySelector('.date-xephang').style.display = "none";
    }
    countDate++;

}

function rankAll() {
    document.querySelector('.date-xephang').style.display = 'none';
}

function rank() {
    $('.rank-content').ready(function() {
        function innerRank() {
            var valueFilter = getInputValue('filter-rank');
            phantrangBCHBoloc('rank', valueFilter);
        }
        innerRank();
        $(document).on('change', '#filter-rank', function() {
            innerRank();
        });
        $(document).on('click', '#nextPage', function() {
            var valueFilter = getInputValue('filter-rank');
            nextPageBoloc(phantrangBCHBoloc, 'rank', valueFilter);
        });
        $(document).on('click', '#prevPage', function() {
            var valueFilter = getInputValue('filter-rank');
            prevPageBoloc(phantrangBCHBoloc, 'rank', valueFilter);
        });


    });
    $(document).on('click', '.find-rank', function() {
        var tungay = $('#input-rank-tungay').val();
        var denngay = $('#input-rank-denngay').val();
        $.post('database/data-rank-theongay.php', {
            tungay: tungay,
            denngay: denngay
        }, function(data) {
            console.log(data);
            if (data == "<div class='none-rank-theongay'>Không có bảng điểm trong thời gian này</div>") {
                $('#main-rank').html(data);
            } else {
                $('#load-data-rank').html(data);
            }

        });
    });
    $(document).on('click', '.filter-rank', function() {
        document.querySelector('.date-xephang').style.display = 'none';
    });

}

function anMenu() {
    bien++;
    if (bien % 2 == 0)
        document.querySelector(".main-header").style.visibility = "hidden";
    else document.querySelector(".main-header").style.visibility = "visible";

}

function innerIndex() {
    function resizeIntroduce(width) {
        $('.introduce').ready(function() {
            if (width > 1140) {
                $.post("database/data-introduce.php", function(data) {
                    console.log('data-introduce');
                    $('.content-introduce').html(data);
                })
            } else {
                $.post("database/data-introduce-resize.php", function(data) {
                    console.log('data-introduce-resize');
                    $('.content-introduce').html(data);
                })
            }
        });
    }

    function resizeIndex() {
        if ($(window).width() > 1140) {
            document.querySelector(".main-header").style.visibility = "visible";
            resizeIntroduce($(window).width());
        } else {
            document.querySelector(".main-header").style.visibility = "hidden";
            bien = 0;
            resizeIntroduce($(window).width());
        }
    }

    function innerIntroduce() {
        $.post('giaodien/introduce.php', function(data) {
            $(".content").html(data);
            /**----------------------SLIDESHOW----------------------------------------------- */
            $(".introduce").ready(function() {
                const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
                const imgContainer = document.querySelector(".aspect-ratio-169")
                const dotItem = document.querySelectorAll(".dot")
                let imgNumber = imgPosition.length
                let index = 0;

                function slider(index) {
                    imgContainer.style.left = "-" + index * 100 + "%"
                    const dotActive = document.querySelector(".active")
                    if (dotActive != null) {
                        dotActive.classList.remove("active")
                        dotItem[index].classList.add("active")
                    }

                }

                function imgSlide() {
                    index++;
                    if (index >= imgNumber) {
                        index = 0;
                    }
                    slider(index);
                }

                imgPosition.forEach(function(image, index) {
                    image.style.left = index * 100 + "%" //Sắp hình theo chiều ngang
                    dotItem[index].addEventListener("click", function() {
                        slider(index)
                    })
                })
                setInterval(imgSlide, 5000)
            });
            //***************************************************************************** */ 
            resizeIndex();
            window.onresize = function(event) {
                resizeIndex();
            };
        })
    }
    // innerIntroduce();
    $.post('giaodien/point-CDBP.php', function(data) {
        $(".content").html(data);
    })
    $(document).on('click', '#menu-introduce', function() {
        innerIntroduce();
    })

    $(document).on('click', '#menu-notification', function() {

        $.post('giaodien/notification.php', function(data) {
            $(".content").html(data);
        })
    })
    $(document).on('click', '#menu-contact', function() {
        $.post('giaodien/lienhe.php', function(data) {
            $(".content").html(data);
        })
    })
    $(document).on('click', '#maCDBP-login', function() {
        $.post('giaodien/setpass.php', function(data) {
            $(".content").html(data);
        })
    })
    $(document).on('click', '#submenu-1', function() {
        $.post('giaodien/point-CDBP.php', function(data) {
            $(".content").html(data);
        })
    })
    $(document).on('click', '#submenu-2', function() {
        $.post('giaodien/point-official.php', function(data) {
            $(".content").html(data);
        })
    })
    $(document).on('click', '#submenu-3', function() {
        $.post('giaodien/rank.php', function(data) {
            $(".content").html(data);
        })
    })


}
// INNER INDEX BCH
function innerBCH() {

    $.post('giaodien/bangchamdiem-moinhat.php', function(data) {
        $('.content-admin').html(data);
    });
    $(document).on('click', '#menu-admin-CN007', function() {
        $.post('giaodien/bangchamdiem-moinhat.php', function(data) {
            $('.content-admin').html(data);
        });
    });
    $(document).on('click', '#menu-admin-CN008', function() {
        $.post('giaodien/bangchamdiem-congdoan.php', function(data) {

            $('.content-admin').html(data);
        });
    });
    $(document).on('click', '#menu-admin-CN009', function() {

        $.post('giaodien/khoa-chucnang-chamdiem.php', function(data) {
            $('.content-admin').html(data);
        });
    });
    $(document).on('click', '#menu-admin-CN010', function() {
        $.post('giaodien/notification-BCH.php', function(data) {
            $('.content-admin').html(data);
        });
    });
    $(document).on('click', '#menu-admin-CN015', function() {

        $.post('giaodien/introduce-BCH.php', function(data) {
            $('.content-admin').html(data);
        });
    });
    $(document).on('click', '#menu-admin-CN016', function() {

        $.post('giaodien/quanly-ykien.php', function(data) {
            $('.content-admin').html(data);
        });
    });
    $(document).on('click', '#menu-setpass-BCH', function() {
        $.post('giaodien/setpass.php', function(data) {
            $('.content-admin').html(data);
            document.querySelector('.setpass-left').style.width = "45%";
            document.querySelector('.setpass-left').style.float = "left";
            document.querySelector('.setpass-left').style.marginLeft = "4%";
            document.querySelector('.setpass-right').style.width = "45%";
            document.querySelector('.setpass-right').style.float = "left";
            document.querySelector('.setpass-right').style.marginLeft = "4%";
            document.querySelector('.setpass-right').style.background = "#041461";
            document.querySelector('.setpass-right').style.color = "white";
            document.querySelector('.setpass-right h2').style.color = "white";
            document.querySelector('.panner-img').style.marginTop = "0px";
            document.querySelector('#input-ten-CDBP').style.display = "none";
            var h2TTTK = document.querySelectorAll('.thongtintaikhoan h2');
            for (var i = 0; i < h2TTTK.length; i++) {
                h2TTTK[i].style.paddingTop = "20px";
                h2TTTK[i].style.fontSize = "25px";
            }
        });
    });

}


function submitSetPass() {
    testPassNew = false;
    $(document).on('click', '.submitSetPass', function() {
        var tentaikhoan = $('#tentaikhoan').val();
        var passold = $('#pass-old').val();
        var passnew = $('#pass-new').val();
        var repassnew = $('#repass-new').val();
        validatePassNew = false;
        testPassNew = passwordChanged();
        if (testPassNew == true) {
            validatePassNew = validatePass(passnew, repassnew);
        }
        $.post("./do_validate.php", {
                tentaikhoan: tentaikhoan,
                passold: passold
            },
            function(data) {
                var flag2 = true;
                console.log(data);
                var getData = JSON.parse(data);
                document.getElementById('error-pass-old').innerText = getData.testPass;
                if (getData.testPass != '') {
                    flag2 = false;
                } else flag2 = true;

                if (validatePassNew == true && flag2 == true) {
                    $.post("database/database-setpass.php", {
                            tentaikhoan: tentaikhoan,
                            passnew: passnew
                        },
                        function(data) {
                            alert(data);
                        });

                }
            });

    });
}

function submitEditInfoTVBCH() {
    $(document).on('click', '.submitSetInfoBCH', function() {
        var tentaikhoan = $('#tentaikhoan').val();
        var sodienthoaiEdit = $('#edit-phone-bch').val();
        var emailEdit = $('#edit-email-bch').val();
        var validateThanhvien = validateEditThanhvienbch(sodienthoaiEdit, emailEdit);
        console.log(validateThanhvien);
        if (validateThanhvien == true) {
            $.post("./do_validate.php", {
                    addTvbchSodienthoai: sodienthoaiEdit,
                    addTvbchEmail: emailEdit
                },
                function(data) {
                    var flag2 = true;
                    var getData = JSON.parse(data);
                    console.log(getData);
                    if (getData.addTvbchSodienthoai != '') {
                        document.getElementById('error-edit-phone-bch').innerText = getData.addTvbchSodienthoai;
                        flag2 = false;
                    } else if (getData.addTvbchEmail != '') {
                        document.getElementById('error-edit-email-bch').innerText = getData.addTvbchEmail;
                        flag2 = false;
                    } else flag2 = true;
                    console.log(flag2);
                    if (flag2 == true) {
                        $.post("database/data-editInfoTVBCH.php", {
                                tentaikhoan: tentaikhoan,
                                sodienthoaiEdit: sodienthoaiEdit,
                                emailEdit: emailEdit
                            },
                            function(data) {
                                alert(data)
                            });
                    }
                });
        }
    });
}

function sendYKien() {
    $(document).on('click', '.submit-ykien', function() {

        var mabangchamdiem = document.querySelector('.mabangchamdiem').value;
        var noidungykien = document.getElementById('area-ykien').value;
        $.post("database/data-sendykien.php", {
                mabangchamdiem: mabangchamdiem,
                noidungykien: noidungykien
            },
            function(data) {
                alert(data);
            });
    });
}

function noteykien() {
    var mabangchamdiem = document.querySelector('.mabangchamdiem').value;
    $.post("database/data-noteykien.php", {
            mabangchamdiem: mabangchamdiem
        },
        function(data) {
            $(".input-note-ykien").html(data);
        });
}