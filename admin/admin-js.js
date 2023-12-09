function setInputValue(selector, value) {
    var element = document.getElementById(selector);
    element.value = value;
}

function getInputValue(selector) {
    var element = document.getElementById(selector);
    return element.value;
}
// PHÂN TRANG
let perPage = 9;
let currentPage = 1;
let start = 0;
let end = perPage;
let count = 0;
// PHÂN TRANG
function getCurrentPage(currentPage) {
    count = 0;
    start = (currentPage - 1) * perPage;
    end = currentPage * perPage;
    console.log("start:" + start);
    console.log("end:" + end);
}

function renderPage() {
    let totalPage = Math.ceil(count / perPage);
    // console.log("totalPageRENDERPAGE:" + totalPage);
    let page = '';
    if (totalPage == 1) {
        document.querySelector('.pagination').style.display = 'none';
    }
    if (totalPage != 1) {
        document.querySelector('.pagination').style.display = 'flex';
        for (let i = 1; i <= totalPage; i++) {
            page += `<li class="page-item"><a class="page-link" style="cursor:pointer">${i}</a></li>`;
        }

    }
    // console.log(document.getElementById('page'));
    document.getElementById('page').innerHTML = page;
}

function clickPage(page, id) {
    const currentPages = document.querySelectorAll('#page a');
    for (let i = 0; i < currentPages.length; i++) {
        currentPages[i].addEventListener('click', function() {
            let value = i + 1;
            currentPage = value;
            getCurrentPage(currentPage);
            page(id);
        })
    }
}


function prevPage(page, id) {
    currentPage--;
    if (currentPage <= 1) {
        currentPage = 1;
    }
    getCurrentPage(currentPage)
    page(id);
}

function nextPage(page, id) {
    let totalPage = Math.ceil(count / perPage)
        // console.log("totalPage:" + totalPage);
        // console.log("currentPage:" + currentPage);
    currentPage++;
    if (currentPage > totalPage) {
        currentPage = totalPage;
    }
    getCurrentPage(currentPage);
    page(id);
}
// CLICK - NEXT - PREV PAGE FIND
function clickPage(page, id1, id2, id3) {
    const currentPages = document.querySelectorAll('#page a');
    for (let i = 0; i < currentPages.length; i++) {
        currentPages[i].addEventListener('click', function() {
            let value = i + 1;
            currentPage = value;
            getCurrentPage(currentPage);
            page(id1, id2, id3);
        })
    }
}

// function prevPage(page, id1, id2, id3) {
//     currentPage--;
//     if (currentPage <= 1) {
//         currentPage = 1;
//     }
//     getCurrentPage(currentPage)
//     page(id1, id2, id3);
// }

// function nextPage(page, id1, id2, id3) {
//     let totalPage = Math.ceil(count / perPage)
//     currentPage++;
//     if (currentPage > totalPage) {
//         currentPage = totalPage;
//     }
//     getCurrentPage(currentPage);
//     page(id1, id2, id3);
// }


//_________________ XỬ LÝ PHÂN TRANG___________________
function phantrang(id) {
    console.log(perPage);
    $.post('database-admin/data-quanly-' + id + '.php', { start: start, end: end }, function(data) {
        $('#load_data_' + id).html(data);
        var StringCount = 'count' + id;
        count = document.getElementById(StringCount).textContent;
        // console.log("count:" + count);
        // console.log("perpage:" + perPage);
        renderPage();
        $('#load_data_' + id).html(data);
        clickPage(phantrang, id);
    });


}
// _____________________________________________________________________________
//_________________ XỬ LÝ PHÂN TRANG CÓ TÌM KIẾM___________________________
function actionPhantrangfind(id, ten, key) {
    $.post("action/find-" + id + ".php", {
        [ten]: key,
        start: start,
        end: end
    }, function(data) {
        // console.log(data);
        // console.log('#load_data_' + id);
        $('#load_data_' + id).html(data);
        var StringCount = 'count' + id;
        // console.log("." + StringCount);
        count = document.querySelector('.' + StringCount).textContent;
        renderPage();
        $('#load_data_' + id).html(data);
        clickPage(actionPhantrangfind, id, ten, key);
    });
}
// _____________________________________________________________________________________________
function phantrangfind(id, key) {
    document.querySelector("#nextPage").style.display = 'none';
    document.querySelector("#prevPage").style.display = 'none';
    var ten = key;
    key = $('#input-' + ten).val();
    actionPhantrangfind(id, ten, key);
    $(document).on('click', '#nextPage', function() {
        nextPage(phantrangfind, id, ten, key);
    });
    $(document).on('click', '#prevPage', function() {
        prevPage(phantrangfind, id, ten, key);
    });
}
// _________________________________________________________________________
function closeFormEditTaiKhoan() {
    document.querySelector('.form-edit-taikhoan').style.display = "none";
}

function closeFormDetailTaiKhoan() {
    document.querySelector('.form-detail-taikhoan').style.display = "none";
}

function closeFormDetailThanhvienBCH() {
    document.querySelector('.form-detail-thanhvienbch').style.display = "none";
}

function closeEdit() {
    document.querySelector('.form-edit').style.display = "none";
}

function displayEdit() {
    document.querySelector('.form-edit').style.display = "block";
}

function closeFormAddTaiKhoan() {
    document.querySelector('.form-add-taikhoan').style.display = "none";
}

function displayAdd() {
    display = document.querySelector('.form-find').style.display;
    if (display == 'none') {
        if (countAdd % 2 == 0) {
            document.querySelector('.form-add').style.display = "block";
            document.querySelector('.form-find').style.display = "none";
        } else {
            document.querySelector('.form-add').style.display = "none";
        }
        countAdd++;
    } else {
        document.querySelector('.form-add').style.display = "block";
        document.querySelector('.form-find').style.display = "none";
        countAdd = 1;
    }
}

function displayFind() {

    display = document.querySelector('.form-add').style.display;
    if (display == 'none') {

        if (countFind % 2 == 0) {
            document.querySelector('.form-add').style.display = "none";
            document.querySelector('.form-find').style.display = "block";
        } else {
            document.querySelector('.form-find').style.display = "none";
        }
        countFind++;
    } else {
        document.querySelector('.form-find').style.display = "block";
        document.querySelector('.form-add').style.display = "none";
        countFind = 1;
    }
}

function onclickEditTieuchichamdiem(id) {
    document.querySelector(".form-edit-tieuchichamdiem").style.display = 'block';
    setInputValue('form-edit-matieuchi-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-noidungtieuchi-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('form-edit-diemchuan-input', document.getElementsByClassName(id)[2].textContent);

}

function onclickEditChitiettieuchichamdiem(id) {
    document.querySelector(".form-edit-chitiettieuchichamdiem").style.display = 'block';
    setInputValue('form-edit-machitiettieuchi-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-noidungchitiettieuchi-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('form-edit-diemchuanchitiettieuchi-input', document.getElementsByClassName(id)[2].textContent);
    setInputValue('list-tieuchi', document.getElementsByClassName(id)[3].textContent);
}

function onclickEditBch(id) {
    document.querySelector(".form-edit-bch").style.display = 'block';
    setInputValue('form-edit-mabch-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-bchsoluong-input', document.getElementsByClassName(id)[1].textContent.split("\n")[1].replace(/\s/g, ''));
    setInputValue('form-edit-bchkhoa-input', document.getElementsByClassName(id)[2].textContent);
    setInputValue('form-edit-bchngaythanhlap-input', document.getElementsByClassName(id)[3].textContent);
    setInputValue('form-edit-bchngayketthuc-input', document.getElementsByClassName(id)[4].textContent);
}

function onclickEditThanhvienbch(id) {
    document.querySelector(".form-edit-thanhvienbch").style.display = 'block';
    setInputValue('form-edit-mathanhvienbch-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-tenthanhvienbch-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('form-edit-chucvubch-input', document.getElementsByClassName(id)[2].textContent);
    setInputValue('form-edit-sodienthoaibch-input', document.getElementsByClassName(id)[3].textContent);
    setInputValue('form-edit-emailbch-input', document.getElementsByClassName(id)[4].textContent);
    setInputValue('list-bch-edit', document.getElementsByClassName(id)[5].textContent);
}

function onclickEditQuyen(id) {
    document.querySelector(".form-edit-quyen").style.display = 'block';
    setInputValue('form-edit-maquyen-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-tenquyen-input', document.getElementsByClassName(id)[1].textContent);

}

function onclickEditChucnang(id) {
    document.querySelector(".form-edit-chucnang").style.display = 'block';
    console.log(document.getElementsByClassName(id));
    setInputValue('form-edit-machucnang-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-tenchucnang-input', document.getElementsByClassName(id)[1].textContent);

}

function onclickEditCdbp(id) {
    document.querySelector(".form-edit-cdbp").style.display = 'block';
    console.log(document.getElementsByClassName(id));
    setInputValue('form-edit-macdbp-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-tencdbp-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('form-edit-ngaythanhlap-input', document.getElementsByClassName(id)[2].textContent);
    setInputValue('form-edit-ngayketthuc-input', document.getElementsByClassName(id)[3].textContent);

}

function onclickEditDonvi(id) {
    document.querySelector(".form-edit-donvi").style.display = 'block';
    setInputValue('form-edit-madonvi-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-tendonvi-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('form-edit-diachi-input', document.getElementsByClassName(id)[2].textContent);
    setInputValue('form-edit-sodienthoai-input', document.getElementsByClassName(id)[3].textContent);
    setInputValue('form-edit-email-input', document.getElementsByClassName(id)[4].textContent);
    setInputValue('list-cdbp', document.getElementsByClassName(id)[5].textContent);

}

function onclickEditTaikhoan(id) {
    document.querySelector('.form-edit-taikhoan').style.display = 'block';
    console.log(document.getElementsByClassName(id));
    console.log(document.getElementsByClassName(id)[2].textContent);
    setInputValue('form-edit-tentaikhoan-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-matkhau-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('edit-list-quyen', document.getElementsByClassName(id)[2].textContent);
}

function onclickEditTaikhoanAdmin(id) {
    document.querySelector('.form-edit-taikhoan-admin').style.display = 'block';
    console.log(document.getElementsByClassName(id));
    setInputValue('form-edit-tentaikhoan-admin-input', document.getElementsByClassName(id)[0].textContent);
    setInputValue('form-edit-matkhau-admin-input', document.getElementsByClassName(id)[1].textContent);
    setInputValue('list-quyen-admin', document.getElementsByClassName(id)[2].textContent);
}

function closeAddQuyenChucnang() {
    document.querySelector(".form-add-chucnang-quyen").style.display = 'none';
}

function view_data_admin(dataQuanly) {
    $.post('database-admin/data-quanly-' + dataQuanly + '.php', function(data) {
        $('#load_data_' + dataQuanly).html(data);

    })
}



function onDisplayalertContent() {
    if (document.getElementById('alertContent').value != '') {
        $("body,html").animate({ scrollTop: 0 }, 800);
        document.querySelector('.alertContent').style.display = 'block';
    }
    var do_alert = function() {

        document.querySelector('.alertContent').style.display = 'none';
    };
    setTimeout(do_alert, 1500);

}
// INNER INDEX ADMIN
function innerAdmin() {

    $(document).on('click', '#menu-admin-CN001', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-cdbp.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN002', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-donvi.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN003', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-bch.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN004', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-thanhvienbch.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN005', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-tieuchichamdiem.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN006', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-chitiettieuchichamdiem.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN012', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-chucnang.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN013', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-quyen.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
    $(document).on('click', '#menu-admin-CN014', function() {
        $.post('bch-index.php', function(data) {
            $('.body-admin').html(data);
            $.post('giaodien-admin/quanly-taikhoan-admin.php', function(data) {
                $('.content-admin').html(data);
            });
        });
    });
}
// QUẢN LÝ TIÊU CHÍ CHẤM ĐIỂM
function quanlyTieuchichamdiem() {
    $('.body-quanly-tieuchichamdiem').ready(function() {
        phantrang('tieuchichamdiem');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'tieuchichamdiem');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'tieuchichamdiem');
        });
        $(document).on('click', '.del-tieuchichamdiem', function() {
            var matieuchi = $(this).val();
            confirmDelete("Bạn có muốn xóa tiêu chí chấm điểm này không?", function() {
                $.post("action/del-tieuchichamdiem.php", { matieuchi: matieuchi }, function(data) {
                    alert(data)
                    phantrang('tieuchichamdiem');
                });
            })
        });
        $(document).on('click', '.submit-add-tieuchichamdiem', function() {
            var addNoidungtieuchi = $('#input-add-noidungtieuchi').val();
            var addDiemchuantieuchi = $('#input-add-diemchuantieuchi').val();
            var validateTieuchichamdiem = validateAddTieuchichamdiem(addNoidungtieuchi, addDiemchuantieuchi);
            $.post("../do_validate.php", {
                    addNoidungtieuchi: addNoidungtieuchi
                },
                function(data) {
                    var flag2 = true;
                    var getData = JSON.parse(data);
                    if (getData.addNoidungtieuchi != '') {
                        document.getElementById('error-addnoidungtieuchi').innerText = getData.addNoidungtieuchi;
                        flag2 = false;
                    } else flag2 = true;
                    if (validateTieuchichamdiem == true && flag2 == true) {
                        $.post("action/add-tieuchichamdiem.php", {
                                addNoidungtieuchi: addNoidungtieuchi,
                                addDiemchuantieuchi: addDiemchuantieuchi
                            },
                            function(data) {
                                alert(data);
                                phantrang('tieuchichamdiem');

                            });
                    }


                });
        });
        $(document).on('click', '.edit-tieuchichamdiem', function() {
            var matieuchi = $(this).val();
            onclickEditTieuchichamdiem(matieuchi);
            $(document).on('click', '.submitEditTieuchichamdiem', function() {
                var editMatieuchi = $('#form-edit-matieuchi-input').val();
                var editNoidungtieuchi = $('#form-edit-noidungtieuchi-input').val();
                var editDiemchuantieuchi = $('#form-edit-diemchuan-input').val();
                $.post("action/edit-tieuchichamdiem.php", { editMatieuchi: editMatieuchi, editNoidungtieuchi: editNoidungtieuchi, editDiemchuantieuchi: editDiemchuantieuchi },
                    function(data) {
                        alert(data)
                        phantrang('tieuchichamdiem');

                    });
            });

        });
        $(document).on('keyup', '#input-findMatieuchi', function() {
            phantrangfind('quyen', 'findMatieuchi');

        });
        $(document).on('keyup', '#input-findNoidungtieuchi', function() {
            phantrangfind('quyen', 'findNoidungtieuchi');

        });
        $(document).on('keyup', '#input-findDiemchuantieuchi', function() {
            phantrangfind('quyen', 'findDiemchuantieuchi');

        })

    });
}

//QUẢN LÝ QUYỀN
function quanlyQuyen() {
    $('.body-quanly-quyen').ready(function() {
        phantrang('quyen');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'quyen');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'quyen');
        });
        $(document).on('click', '.del-quyen', function() {
            var maquyen = $(this).val();
            confirmDelete("Bạn có muốn xóa quyền này không?", function() {
                $.post("action/del-quyen.php", { maquyen: maquyen }, function(data) {
                    alert(data)
                    phantrang('quyen');
                });
            })
        })
        $(document).on('click', '.submit-add-quyen', function() {
            var addMaquyen = $('#input-add-maquyen').val();
            var addTenquyen = $('#input-add-tenquyen').val();
            var validateQuyen = validateAddQuyen(addMaquyen, addTenquyen);
            $.post("../do_validate.php", {
                    addMaquyen: addMaquyen
                },

                function(data) {
                    console.log(data);
                    var flag2;
                    var getData = JSON.parse(data);

                    if (getData.addMaquyen != '') {
                        document.getElementById('error-addmaquyen').innerText = getData.addMaquyen;
                        flag2 = false;
                    } else
                        flag2 = true;
                    if (flag2 == true && validateQuyen == true) {
                        $.post("action/add-quyen.php", {
                                addMaquyen: addMaquyen,
                                addTenquyen: addTenquyen
                            },
                            function(data) {
                                alert(data)
                                phantrang('quyen');
                            });

                    }
                });

        });
        $(document).on('click', '.edit-quyen', function() {
            var maquyen = $(this).val();
            onclickEditQuyen(maquyen);
            $(document).on('click', '.submitEditQuyen', function() {
                var editMaquyen = $('#form-edit-maquyen-input').val();
                var editTenquyen = $('#form-edit-tenquyen-input').val();
                $.post("action/edit-quyen.php", { editMaquyen: editMaquyen, editTenquyen: editTenquyen },
                    function(data) {
                        alert(data);
                        phantrang('quyen');
                    });
            })

        })
        $(document).on('keyup', '#input-findMaquyen', function() {
            phantrangfind('quyen', 'findMaquyen');

        })
        $(document).on('keyup', '#input-findTenquyen', function() {
            phantrangfind('quyen', 'findTenquyen');

        })
        view_data_chucnang_quyen('add-chucnang-quyen');

        function view_data_chucnang_quyen(dataQuanly) {
            $.post('database-admin/data-quanly-' + dataQuanly + '.php', function(data) {
                $('#list_chucnang').html(data);
            })

        }

        $(document).on('click', '.add-quyen-chucnang', function() {
            var getmaquyen = $(this).val();
            document.querySelector('.submitAddChucnang').value = getmaquyen;
            document.querySelector(".form-add-chucnang-quyen").style.display = 'block';
            $.post("action/get-chucnang.php", { maquyen: getmaquyen },
                function(data) {
                    // $("#noti-add-quyen").html(data);
                    var arrChucNang = data.split(",");
                    // console.log(arrChucNang);                    
                    for (var j = 0; j < document.getElementsByClassName('checkChucnang').length; j++) {
                        // console.log(document.getElementsByClassName('checkChucnang')[j].value)
                        document.getElementsByClassName('checkChucnang')[j].checked = false;
                        for (var i = 0; i < arrChucNang.length; i++) {
                            if (document.getElementsByClassName('checkChucnang')[j].value == arrChucNang[i]) {
                                document.getElementsByClassName('checkChucnang')[j].checked = true;
                                // console.log(arrChucNang[i])
                                // console.log(document.getElementsByClassName('checkChucnang')[j].value)
                            }
                        }
                    }

                })
            $(document).on('click', '.submitAddChucnang', function() {
                var maquyen = $(this).val();
                console.log(maquyen);
                var checkbox = document.getElementsByName('checkChucnang');
                var checkboxValue = [];
                for (var i = 0; i < checkbox.length; i++) {
                    if (checkbox[i].checked === true) {
                        checkboxValue.push(checkbox[i].value)
                    }
                }
                console.log(checkboxValue)
                $.post("action/add-quyen-chucnang.php", { addChucnang: checkboxValue, maquyen: maquyen },
                    function(data) {
                        alert(data)

                        // view_data_admin('quyen');
                    });
            })
        })
    });
}
// QUẢN LÝ CHỨC NĂNG
function quanlyChucNang() {
    $('.body-quanly-chucnang').ready(function() {
        phantrang('chucnang');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'chucnang');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'chucnang');
        });
        $(document).on('click', '.del-chucnang', function() {
            var machucnang = $(this).val();
            confirmDelete("Bạn có muốn xóa chức năng này không?", function() {
                $.post("action/del-chucnang.php", { machucnang: machucnang }, function(data) {
                    alert(data)
                    phantrang('chucnang');
                });
            })
        })
        $(document).on('click', '.submit-add-chucnang', function() {
            var addTenchucnang = $('#input-add-tenchucnang').val();
            var validateChucnang = validateAddChucnang(addTenchucnang);
            $.post("../do_validate.php", {
                    addTenchucnang: addTenchucnang,
                },
                function(data) {
                    var flag2 = true;
                    var getData = JSON.parse(data);
                    if (getData.addTenchucnang != '') {
                        document.getElementById('error-addtenchucnang').innerText = getData.addTenchucnang;
                        flag2 = false;
                    } else flag2 = true;
                    if (flag2 == true && validateChucnang == true) {
                        $.post("action/add-chucnang.php", { addTenchucnang: addTenchucnang },
                            function(data) {
                                alert(data)
                                phantrang('chucnang');
                            });
                    }
                });

        });
        $(document).on('click', '.edit-chucnang', function() {
            var machucnang = $(this).val();
            onclickEditChucnang(machucnang);
            $(document).on('click', '.submitEditChucnang', function() {
                var editMachucnang = $('#form-edit-machucnang-input').val();
                var editTenchucnang = $('#form-edit-tenchucnang-input').val();
                $.post("action/edit-chucnang.php", { editMachucnang: editMachucnang, editTenchucnang: editTenchucnang },
                    function(data) {
                        alert(data)
                        phantrang('chucnang');
                    });
            })

        })
        $(document).on('keyup', '#input-findMachucnang', function() {
            phantrangfind('chucnang', 'findMachucnang');

        })
        $(document).on('keyup', '#input-findTenchucnang', function() {
            phantrangfind('chucnang', 'findTenchucnang');

        })
    });
}
//_________________ XỬ LÝ PHÂN TRANG CDBP___________________
// function phantrangCDBP() {
//     $.post('database-admin/data-quanly-cdbp.php', { start: start, end: end }, function(data) {
//         $('#load_data_cdbp').html(data);
//         count = document.getElementById('countDataCDBP').textContent;
//         renderPage();
//         $('#load_data_cdbp').html(data);
//         clickPage(phantrangCDBP);
//     });


// }
// _____________________________________________________________________________
function addTaikhoan() {
    $(document).on('click', '.button-add-taikhoan', function() {
        document.querySelector('.form-add-taikhoan').style.display = 'block';


        $(document).on('click', '.submit-add-taikhoan', function() {
            var addTentaikhoan = $('#input-add-tentaikhoan').val();
            var addMatkhau = $('#input-add-matkhau').val();
            var addTenquyen = $('#list-quyen').val();
            var validateTaikhoan = validateAddTaikhoan(addTentaikhoan, addMatkhau, addTenquyen);

            $.post("../do_validate.php", {
                    addTentaikhoan: addTentaikhoan,
                },

                function(data) {
                    var flag;

                    if (data != '') {
                        flag = false;
                    } else
                        flag = true;
                    if (validateTaikhoan == true && flag == true) {
                        $.post("action/add-taikhoan.php", { addTentaikhoan: addTentaikhoan, addMatkhau: addMatkhau, addTenquyen: addTenquyen },
                            function(data) {
                                alert(1111111);
                                alert(data);
                                document.getElementById('input-add-taikhoan').value = addTentaikhoan;
                                document.getElementById('input-add-taikhoan-test').value = addTentaikhoan;
                                document.getElementById('input-add-taikhoan').checked = 'true';

                            });
                    }
                });


        });
    });
}

function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return year + "-" + month + "-" + day;
}
// QUẢN LÝ CDBP
function quanlyCdbp() {
    $('.body-quanly-cdbp').ready(function() {
        phantrang('cdbp');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'cdbp');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'cdbp');
        });
        $.post('database-admin/data-add-quyen-taikhoan.php', function(data) {
            $('.list-quyen').html(data);
        });
        $.post('database-admin/data-add-taikhoan-user.php', function(data) {
            $('.list-taikhoan').html(data);
        });
        // _________________________________________________________

        $(document).on('click', '.del-cdbp', function() {
            var macdbp = $(this).val();
            confirmDelete("Bạn có muốn xóa công đoàn bộ phận này không?", function() {
                $.post("action/del-cdbp.php", { macdbp: macdbp }, function(data) {
                    alert(data);
                    phantrang('cdbp');
                });
            })


        });
        $(document).on('click', '.submit-add-cdbp', function() {
            var addTencdbp = $('#input-add-tencdbp').val();
            var addNgaythanhlap = $('#input-add-ngaythanhlapcdbp').val();
            var addNgayketthuc = $('#input-add-ngayketthuccdbp').val();
            var addTentaikhoanDaco = $('#list-taikhoan').val();
            var addTentaikhoan = $('#input-add-taikhoan-test').val();
            var addTentaikhoanOfficial = '';
            if (addTentaikhoanDaco != '') {
                addTentaikhoanOfficial = addTentaikhoanDaco;
            } else addTentaikhoanOfficial = addTentaikhoan;
            var validateCDBP = addCdbp(addTencdbp, addNgaythanhlap, addTentaikhoanDaco, addTentaikhoan);
            if ($('#input-add-ngaythanhlapcdbp').val() != "") {
                addNgaythanhlap = new Date($('#input-add-ngaythanhlapcdbp').val()).toLocaleDateString('fr-CA');
            } else
                addNgaythanhlap = "0000-00-00";
            if ($('#input-add-ngayketthuccdbp').val() != "") {
                addNgayketthuc = new Date($('#input-add-ngayketthuccdbp').val()).toLocaleDateString('fr-CA');
                if (addNgayketthuc > addNgaythanhlap) {
                    document.getElementById('error-addngayketthuccdbp').innerText = "Ngày kết thúc phải sau ngày thành lập";
                }
            } else {
                addNgayketthuc = "0000-00-00";
            }


            $.post("../do_validate.php", {
                    addTencdbp: addTencdbp,
                    addTentaikhoanDaco: addTentaikhoanDaco
                },

                function(data) {

                    var flag2;
                    var flag3;
                    var getData = JSON.parse(data);
                    console.log(getData.addTencdbp);
                    console.log(getData.addTentaikhoanDaco);
                    if (getData.addTencdbp != '') {
                        document.getElementById('error-addtencdbp').innerText = getData.addTencdbp;
                        flag2 = false;
                    } else
                        flag2 = true;
                    if (getData.addTentaikhoanDaco != '') {
                        document.getElementById('error-addtaikhoancdbp-daco').innerText = getData.addTentaikhoanDaco;
                        flag3 = false;
                    } else
                        flag3 = true;
                    if (flag3 == true && flag2 == true && validateCDBP == true) {
                        $.post("action/add-cdbp.php", {
                                addTencdbp: addTencdbp,
                                addNgaythanhlap: addNgaythanhlap,
                                addNgayketthuc: addNgayketthuc,
                                addTentaikhoan: addTentaikhoanOfficial
                            },
                            function(data) {
                                alert(data);
                                phantrang('cdbp');
                                if (data = 'Thêm thành công')
                                    document.querySelector('.form-add-cdbp').reset();

                            });
                    }
                });




        });
        $(document).on('click', '.edit-cdbp', function() {
            var macdbp = $(this).val();
            onclickEditCdbp(macdbp);
            $(document).on('click', '.submitEditCdbp', function() {
                var editMacdbp = $('#form-edit-macdbp-input').val();
                var editTencdbp = $('#form-edit-tencdbp-input').val();
                var editNgaythanhlap = $('#form-edit-ngaythanhlap-input').val();
                var editNgayketthuc = $('#form-edit-ngayketthuc-input').val();
                $.post("action/edit-cdbp.php", { editMacdbp: editMacdbp, editTencdbp: editTencdbp, editNgaythanhlap: editNgaythanhlap, editNgayketthuc: editNgayketthuc },
                    function(data) {
                        alert(data)
                        phantrang('cdbp');

                    });
            })
        });

        addTaikhoan();
        $(document).on('click', '.detail-taikhoan', function() {
            var tentaikhoan = $(this).val();
            document.querySelector('.form-detail-taikhoan').style.display = 'block';
            $.post('database-admin/view-taikhoan.php', { tentaikhoan: tentaikhoan },
                function(data) {
                    $('.load-detail-taikhoan').html(data);
                })
        });
        $(document).on('click', '.edit-detail-taikhoan', function() {
            var tentaikhoan = $(this).val();
            $.post('database-admin/view-taikhoan.php', { tentaikhoan: tentaikhoan },
                function(data) {
                    $('.load-detail-taikhoan').html(data);
                    onclickEditTaikhoan(tentaikhoan);
                });
            $(document).on('click', '.submitEditTaikhoan', function() {
                var tentaikhoanOld = tentaikhoan;
                var editTentaikhoan = $('#form-edit-tentaikhoan-input').val();
                var editMatkhau = $('#form-edit-matkhau-input').val();
                var editQuyen = $('#edit-list-quyen').val();

                $.post("action/edit-taikhoan.php", { tentaikhoanOld: tentaikhoanOld, editTentaikhoan: editTentaikhoan, editMatkhau: editMatkhau, editQuyen: editQuyen },
                    function(data) {
                        console.log(editQuyen);
                        alert(data);
                        phantrang('cdbp');
                        if ((data).indexOf("Thay đổi thành công") != -1) {
                            document.querySelector('.form-edit-taikhoan').style.display = 'none';
                        }
                    });



            })
        });
        $(document).on('keyup', '#input-findMacdbp', function() {
            phantrangfind('cdbp', 'findMacdbp');
        })
        $(document).on('keyup', '#input-findTencdbp', function() {
            phantrangfind('cdbp', 'findTencdbp');

        })
        $(document).on('keyup', '#input-findTentaikhoan', function() {
            phantrangfind('cdbp', 'findTentaikhoan');

        })

    });

}
// QUẢN LÝ ĐƠN VỊ
function quanlyDonvi() {
    $('.body-quanly-donvi').ready(function() {
        phantrang('donvi');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'donvi');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'donvi');
        });
        $.post('database-admin/data-add-cdbp-donvi.php', function(data) {
            $('.list-cdbp').html(data);
        });
        $(document).on('click', '.del-donvi', function() {
            var madonvi = $(this).val();
            confirmDelete("Bạn có muốn xóa đơn vị này không?", function() {
                $.post("action/del-donvi.php", { madonvi: madonvi }, function(data) {
                    alert(data)
                    phantrang('donvi');
                });
            })

        });
        $(document).on('click', '.submit-add-donvi', function() {
            var addTendonvi = $('#input-add-tendonvi').val();
            var addDiachidonvi = $('#input-add-diachidonvi').val();
            var addSodienthoaidonvi = $('#input-add-sodienthoaidonvi').val();
            var addEmaildonvi = $('#input-add-emaildonvi').val();
            var addTencdbp = $('.list-cdbp').val();
            var validatedonvi = validateDonvi('add', addTendonvi, addDiachidonvi, addSodienthoaidonvi, addEmaildonvi, addTencdbp);
            $.post("../do_validate.php", {
                    addMadonvi: '',
                    addTendonvi: addTendonvi,
                    addSodienthoaidonvi: addSodienthoaidonvi,
                    addEmaildonvi: addEmaildonvi
                },

                function(data) {
                    var flag2;
                    var getData = JSON.parse(data);
                    if (getData.addTendonvi != '') {
                        document.getElementById('error-addtendonvi').innerText = getData.addTendonvi;
                        flag2 = false;
                    } else if (getData.addSodienthoaidonvi != '') {
                        document.getElementById('error-addsodienthoaidonvi').innerText = getData.addSodienthoaidonvi;
                        flag2 = false;
                    } else if (getData.addEmaildonvi != '') {
                        document.getElementById('error-addemaildonvi').innerText = getData.addEmaildonvi;
                        flag2 = false;
                    } else flag2 = true;
                    if (validatedonvi == true && flag2 == true) {
                        $.post("action/add-donvi.php", { addTendonvi: addTendonvi, addDiachidonvi: addDiachidonvi, addSodienthoaidonvi: addSodienthoaidonvi, addEmaildonvi: addEmaildonvi, addTencdbp: addTencdbp },
                            function(data) {
                                alert(data)
                                phantrang('donvi');
                            });
                    }
                });

        });

        $(document).on('click', '.edit-donvi', function() {
            var madonvi = $(this).val();
            onclickEditDonvi(madonvi);
            $(document).on('click', '.submitEditdonvi', function() {
                var editTendonvi = $('#form-edit-tendonvi-input').val();
                var editDiachi = $('#form-edit-diachi-input').val();
                var editSodienthoai = $('#form-edit-sodienthoai-input').val();
                var editEmail = $('#form-edit-email-input').val();
                var editTencdbp = $('#list-cdbp').val();
                var validatedonvi = validateDonvi('edit', editTendonvi, editDiachi, editSodienthoai, editEmail, editTencdbp);
                $.post("../do_validate.php", {
                        addMadonvi: madonvi,
                        addTendonvi: editTendonvi,
                        addSodienthoaidonvi: editSodienthoai,
                        addEmaildonvi: editEmail
                    },
                    function(data) {

                        var flag2;
                        var getData = JSON.parse(data);
                        console.log("--" + getData.addTendonvi.length + "--");
                        if (getData.addTendonvi.length != 0) {
                            document.getElementById('error-edittendonvi').innerText = getData.addTendonvi;
                            console.log(1);
                            flag2 = false;
                        } else if (getData.addSodienthoaidonvi.length != 0) {
                            document.getElementById('error-editsodienthoaidonvi').innerText = getData.addSodienthoaidonvi;
                            flag2 = false;
                        } else if (getData.addEmaildonvi.length != 0) {
                            document.getElementById('error-editemaildonvi').innerText = getData.addEmaildonvi;
                            flag2 = false;
                        } else flag2 = true;
                        console.log(validatedonvi + "-" + flag2);
                        if (validatedonvi == true && flag2 == true) {
                            $.post("action/edit-donvi.php", {
                                    editMadonvi: madonvi,
                                    editTendonvi: editTendonvi,
                                    editDiachi: editDiachi,
                                    editSodienthoai: editSodienthoai,
                                    editEmail: editEmail,
                                    editTencdbp: editTencdbp
                                },
                                function(data) {
                                    alert(data);
                                    phantrang('donvi');

                                });
                        }
                    });

            })
        });
        $(document).on('keyup', '#input-findMadonvi', function() {
            phantrangfind('donvi', 'findMadonvi');

        })
        $(document).on('keyup', '#input-findTendonvi', function() {
            phantrangfind('donvi', 'findTendonvi');

        })


    });
}
// QUẢN LÝ CHI TIẾT TIÊU CHÍ CHẤM ĐIỂM
function quanlyChitiettieuchichamdiem() {
    $('.body-quanly-chitiettieuchichamdiem').ready(function() {
        phantrang('chitiettieuchichamdiem');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'chitiettieuchichamdiem');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'chitiettieuchichamdiem');
        });
        $.post('database-admin/data-add-tieuchi-chitiet.php', function(data) {
            $('.list-tieuchi').html(data);
        });

        $(document).on('click', '.submit-add-chitiettieuchichamdiem', function() {
            var addNoidungchitiettieuchi = $('#input-add-noidungchitiettieuchi').val();
            var addDiemchuanchitiettieuchi = $('#input-add-diemchuanchitiettieuchi').val();
            var addTentieuchi = $('.list-tieuchi').val();
            console.log(addTentieuchi);
            var validateChitiettieuchichamdiem = validateAddChitiettieuchichamdiem(addNoidungchitiettieuchi, addDiemchuanchitiettieuchi, addTentieuchi);
            $.post("../do_validate.php", {
                    addNoidungchitiettieuchi: addNoidungchitiettieuchi,
                },
                function(data) {
                    var flag2 = true;
                    var getData = JSON.parse(data);
                    if (getData.addNoidungchitiettieuchi != '') {
                        document.getElementById('error-addnoidungchitiettieuchi').innerText = getData.addNoidungchitiettieuchi;
                        flag2 = false;
                    }
                    flag2 = true;
                    if (flag2 == true && validateChitiettieuchichamdiem == true) {
                        $.post("action/add-chitiettieuchi.php", {
                                addNoidungchitiettieuchi: addNoidungchitiettieuchi,
                                addDiemchuanchitiettieuchi: addDiemchuanchitiettieuchi,
                                addTentieuchi: addTentieuchi
                            },
                            function(data) {
                                alert(data)
                                phantrang('chitiettieuchichamdiem');
                            });
                    }
                });

        });
        $(document).on('click', '.del-chitiettieuchichamdiem', function() {
            var machitiettieuchi = $(this).val();
            confirmDelete("Bạn có muốn xóa chi tiết tiêu chí chấm điểm này không?", function() {
                $.post("action/del-chitiettieuchi.php", { machitiettieuchi: machitiettieuchi }, function(data) {
                    alert(data)
                    phantrang('chitiettieuchichamdiem');
                });
            })
        });
        $(document).on('click', '.edit-chitiettieuchichamdiem', function() {
            var machitiettieuchi = $(this).val();
            onclickEditChitiettieuchichamdiem(machitiettieuchi);
            $(document).on('click', '.submitEditChitiettieuchichamdiem', function() {
                var editMachitiettieuchi = $('#form-edit-machitiettieuchi-input').val();
                var editNoidungchitiettieuchi = $('#form-edit-noidungchitiettieuchi-input').val();
                var editDiemchuanchitiettieuchi = $('#form-edit-diemchuanchitiettieuchi-input').val();
                var editNoidungtieuchi = $('#list-tieuchi').val();
                $.post("action/edit-chitiettieuchi.php", {
                        editMachitiettieuchi: editMachitiettieuchi,
                        editNoidungchitiettieuchi: editNoidungchitiettieuchi,
                        editDiemchuanchitiettieuchi: editDiemchuanchitiettieuchi,
                        editNoidungtieuchi: editNoidungtieuchi
                    },
                    function(data) {
                        alert(data)
                        phantrang('chitiettieuchichamdiem');

                    });
            })
        });
        $(document).on('keyup', '#input-findMachitiettieuchi', function() {
            phantrangfind('chitiettieuchichamdiem', 'findMachitiettieuchi');

        })
        $(document).on('keyup', '#input-findNoidungchitiettieuchi', function() {
            phantrangfind('chitiettieuchichamdiem', 'findNoidungchitiettieuchi');

        });
    });
}
// QUẢN LÝ BAN CHẤP HÀNH
function quanlyBCH() {
    $('.body-quanly-bch').ready(function() {
        phantrang('bch');
        console.log(document.querySelector('.error'));
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'bch');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'bch');
        });
        $(document).on('click', '.detail-soluongtv-bch', function() {
            var mabch = $(this).val();
            document.querySelector('.form-detail-thanhvienbch').style.display = 'block';
            $.post('database-admin/view-tv-bch.php', { mabch: mabch },
                function(data) {
                    $('.detail-thanhvien-of-bch').html(data);
                })
        });
        $(document).on('click', '.submit-add-bch', function() {
            var addBchSoluong = $('#input-add-bch-soluong').val();
            var addBchKhoa = $('#input-add-bch-khoa').val();
            var addBchNgaythanhlap = $('#input-add-bch-ngaythanhlap').val();
            var addBchNgayketthuc = $('#input-add-bch-ngayketthuc').val();
            var validateBch = validateAddBch(addBchSoluong, addBchKhoa, addBchNgaythanhlap, addBchNgayketthuc);
            // if (addBchSoluong != '' && addBchKhoa != '' && addBchNgaythanhlap != '' && addBchNgayketthuc != '') {
            $.post("../do_validate.php", {
                    addBchKhoa: addBchKhoa,
                },
                function(data) {
                    var flag2 = true;
                    var getData = JSON.parse(data);
                    if (getData.addBchKhoa != '') {
                        document.getElementById('error-addbchkhoa').innerText = getData.addBchKhoa;
                        flag2 = false;
                    }
                    flag2 = true;
                    if (flag2 == true && validateBch == true) {
                        $.post("action/add-bch.php", {
                                addBchSoluong: addBchSoluong,
                                addBchKhoa: addBchKhoa,
                                addBchNgaythanhlap: addBchNgaythanhlap,
                                addBchNgayketthuc: addBchNgayketthuc
                            },
                            function(data) {
                                alert(data)
                                phantrang('bch');
                            });
                    }
                });

        });

        $(document).on('click', '.del-bch', function() {
            var mabch = $(this).val();
            confirmDelete("Bạn có muốn xóa ban chấp hành này không?", function() {
                $.post("action/del-bch.php", { mabch: mabch }, function(data) {
                    alert(data)
                    phantrang('bch');
                });
            })
        });
        $(document).on('click', '.edit-bch', function() {
            var mabch = $(this).val();
            onclickEditBch(mabch);
            $(document).on('click', '.submitEditBCH', function() {
                var editMaBch = $('#form-edit-mabch-input').val();
                var editBchSoluong = $('#form-edit-bchsoluong-input').val();
                var editBchKhoa = $('#form-edit-bchkhoa-input').val();
                var editBchNgaythanhlap = $('#form-edit-bchngaythanhlap-input').val();
                var editBchNgayketthuc = $('#form-edit-bchngayketthuc-input').val();
                $.post("action/edit-bch.php", {
                        editMaBch: editMaBch,
                        editBchSoluong: editBchSoluong,
                        editBchKhoa: editBchKhoa,
                        editBchNgaythanhlap: editBchNgaythanhlap,
                        editBchNgayketthuc: editBchNgayketthuc
                    },
                    function(data) {
                        alert(data);
                        phantrang('bch');

                    });
            })
        });
        $(document).on('keyup', '#input-findMabch', function() {
            phantrangfind('bch', 'findMabch');
        })
        $(document).on('keyup', '#input-findKhoabch', function() {
            phantrangfind('bch', 'findKhoabch');

        })
    });
}
// QUẢN LÝ THÀNH VIÊN BCH
function quanlyThanhvienBCH() {
    $('.body-quanly-thanhvienbch').ready(function() {
        phantrang('thanhvienbch');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'thanhvienbch');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'thanhvienbch');
        });
        $.post('database-admin/data-add-quyen-taikhoan.php', function(data) {
            $('.list-quyen').html(data);
        });
        $.post('database-admin/data-add-bch-tvbch.php', function(data) {
            $('.list-bch').html(data);
        });
        $.post('database-admin/data-add-taikhoan-user.php', function(data) {
            $('.list-taikhoan').html(data);
        });
        $(document).on('click', '.submit-add-thanhvienbch', function() {
            var addTvbchTen = $('#input-add-thanhvienbch-ten').val();
            var addTvbchChucvu = $('#input-add-thanhvienbch-chucvu').val();
            var addTvbchSodienthoai = $('#input-add-thanhvienbch-sodienthoai').val();
            var addTvbchEmail = $('#input-add-thanhvienbch-email').val();
            var addTvbchBCH = $('#list-bch').val();
            var addTentaikhoanDaco = $('#list-taikhoan').val();
            var addTentaikhoan = $('#input-add-taikhoan-test').val();
            var addTentaikhoanOfficial = '';
            if (addTentaikhoanDaco != '') {
                addTentaikhoanOfficial = addTentaikhoanDaco;
            } else addTentaikhoanOfficial = addTentaikhoan;
            var validateThanhvien = AddThanhvienbch(addTvbchTen, addTvbchChucvu, addTvbchSodienthoai, addTvbchEmail, addTvbchBCH, addTentaikhoanDaco, addTentaikhoan);
            $.post("../do_validate.php", {
                    addTvbchTen: addTvbchTen,
                    addTvbchSodienthoai: addTvbchSodienthoai,
                    addTvbchEmail: addTvbchEmail,
                    addTentaikhoanDaco: addTentaikhoanDaco
                },
                function(data) {
                    console.log(data);
                    var flag2 = true;
                    var getData = JSON.parse(data);
                    console.log(getData);
                    if (getData.addTvbchSodienthoai != '') {
                        document.getElementById('error-addthanhvienbchsodienthoai').innerText = getData.addTvbchSodienthoai;
                        flag2 = false;
                    } else if (getData.addTvbchEmail != '') {
                        document.getElementById('error-addthanhvienbchemail').innerText = getData.addTvbchEmail;
                        flag2 = false;
                    } else if (getData.addTvbchTen != '') {
                        document.getElementById('error-addthanhvienbchten').innerText = getData.addTvbchTen;
                        flag2 = false;
                    } else if (getData.addTentaikhoanDaco != '') {
                        document.getElementById('error-addtaikhoancdbp-daco').innerText = getData.addTentaikhoanDaco;
                        flag2 = false;
                    } else flag2 = true;
                    if (validateThanhvien == true && flag2 == true) {
                        $.post("action/add-thanhvienbch.php", {
                                addTvbchTen: addTvbchTen,
                                addTvbchChucvu: addTvbchChucvu,
                                addTvbchSodienthoai: addTvbchSodienthoai,
                                addTvbchEmail: addTvbchEmail,
                                addTvbchBCH: addTvbchBCH,
                                addTvbchTaikhoan: addTentaikhoanOfficial
                            },
                            function(data) {
                                alert(data)
                                phantrang('thanhvienbch');
                            });
                    }
                });
        });
        $(document).on('click', '.del-thanhvienbch', function() {
            var mathanhvienbch = $(this).val();
            confirmDelete("Bạn có muốn xóa thành viên ban chấp hành này không?", function() {
                $.post("action/del-thanhvienbch.php", { mathanhvienbch: mathanhvienbch }, function(data) {
                    alert(data)
                    phantrang('thanhvienbch');
                });
            })
        });
        $(document).on('click', '.edit-thanhvienbch', function() {
            var mabch = $(this).val();
            onclickEditThanhvienbch(mabch);
            $(document).on('click', '.submitEditThanhvienbch', function() {
                var editMaThanhvienbch = $('#form-edit-mathanhvienbch-input').val();
                var editTenThanhvienbch = $('#form-edit-tenthanhvienbch-input').val();
                var editChucvuThanhvienbch = $('#form-edit-chucvubch-input').val();
                var editSodienthoaiThanhvienbch = $('#form-edit-sodienthoaibch-input').val();
                var editEmailThanhvienbch = $('#form-edit-emailbch-input').val();
                var editBCHThanhvienbch = $('#list-bch-edit').val();
                $.post("action/edit-thanhvienbch.php", {
                        editMaThanhvienbch: editMaThanhvienbch,
                        editTenThanhvienbch: editTenThanhvienbch,
                        editChucvuThanhvienbch: editChucvuThanhvienbch,
                        editSodienthoaiThanhvienbch: editSodienthoaiThanhvienbch,
                        editEmailThanhvienbch: editEmailThanhvienbch,
                        editBCHThanhvienbch: editBCHThanhvienbch
                    },
                    function(data) {
                        alert(data);
                        phantrang('thanhvienbch');

                    });
            })
        });
        $(document).on('keyup', '#input-findMathanhvienbch', function() {
            phantrangfind('thanhvienbch', 'findMathanhvienbch');
        });
        $(document).on('keyup', '#input-findTenthanhvienbch', function() {
            phantrangfind('thanhvienbch', 'findTenthanhvienbch');

        });
        $(document).on('change', '#input-findBch', function() {
            phantrangfind('thanhvienbch', 'findBch');

        });
        addTaikhoan();
        $(document).on('click', '.detail-taikhoan', function() {
            var tentaikhoan = $(this).val();
            document.querySelector('.form-detail-taikhoan').style.display = 'block';
            $.post('database-admin/view-taikhoan.php', { tentaikhoan: tentaikhoan },
                function(data) {
                    $('.load-detail-taikhoan').html(data);
                })
        });
        $(document).on('click', '.edit-detail-taikhoan', function() {
            var tentaikhoan = $(this).val();
            $.post('database-admin/view-taikhoan.php', { tentaikhoan: tentaikhoan },
                function(data) {
                    $('.load-detail-taikhoan').html(data);
                    onclickEditTaikhoan(tentaikhoan);
                });
            $(document).on('click', '.submitEditTaikhoan', function() {
                var tentaikhoanOld = tentaikhoan;
                var editTentaikhoan = $('#form-edit-tentaikhoan-input').val();
                var editMatkhau = $('#form-edit-matkhau-input').val();
                var editQuyen = document.getElementById('edit-list-quyen').value;
                $.post("action/edit-taikhoan.php", { tentaikhoanOld: tentaikhoanOld, editTentaikhoan: editTentaikhoan, editMatkhau: editMatkhau, editQuyen: editQuyen },
                    function(data) {
                        alert(data);
                        phantrang('thanhvienbch');
                    });
            })
        });

    });
}
// QUẢN LÝ THÀNH VIÊN BCH
function quanlyTaikhoanAdmin() {
    $('.body-quanly-taikhoan-admin').ready(function() {
        phantrang('taikhoan-admin');
        $(document).on('click', '#nextPage', function() {
            nextPage(phantrang, 'taikhoan-admin');
        });
        $(document).on('click', '#prevPage', function() {
            prevPage(phantrang, 'taikhoan-admin');
        });
        $.post('database-admin/data-add-quyen-taikhoan.php', function(data) {
            $('.list-quyen').html(data);
        });
        $(document).on('click', '.submit-add-taikhoan-admin', function() {
            var addTentaikhoanadmin = $('#input-add-tentaikhoan-admin').val();
            var addMatkhauadmin = $('#input-add-matkhau-admin').val();
            var addQuyenadmin = $('#list-quyen').val();
            var validateTaikhoanadmin = validateAddTaikhoanadmin(addTentaikhoanadmin, addMatkhauadmin, addQuyenadmin);
            $.post("../do_validate.php", {
                    addTentaikhoanadmin: addTentaikhoanadmin,
                },
                function(data) {
                    var flag2 = true;
                    if (data != '') {
                        document.getElementById('error-addtentaikhoan-admin').innerText = data;
                        flag2 = false;
                    }
                    flag2 = true;
                    if (flag2 == true && validateTaikhoanadmin == true)
                        $.post("action/add-taikhoan-admin.php", {
                                addTentaikhoanadmin: addTentaikhoanadmin,
                                addMatkhauadmin: addMatkhauadmin,
                                addQuyenadmin: addQuyenadmin
                            },
                            function(data) {
                                alert(data)
                                phantrang('taikhoan-admin');
                            });
                });
        });
        $(document).on('click', '.del-taikhoan-admin', function() {
            var tentaikhoanadmin = $(this).val();
            confirmDelete("Bạn có muốn xóa tài khoản này cùng với người dùng sử dụng tài khoản này không?", function() {
                $.post("action/del-taikhoan-admin.php", { tentaikhoanadmin: tentaikhoanadmin }, function(data) {
                    alert(data);
                    phantrang('taikhoan-admin');
                });
            })
        });
        $(document).on('click', '.edit-taikhoan-admin', function() {
            var tentaikhoanadmin = $(this).val();
            onclickEditTaikhoanAdmin(tentaikhoanadmin);
            $(document).on('click', '.submitEditTaikhoanAdmin', function() {
                var tentaikhoanOld = tentaikhoanadmin;
                var editTentaikhoanadmin = $('#form-edit-tentaikhoan-admin-input').val();
                var editMatkhauadmin = $('#form-edit-matkhau-admin-input').val();
                var editQuyenadmin = $('#list-quyen-admin').val();
                $.post("action/edit-taikhoan-admin.php", {
                        tentaikhoanOld: tentaikhoanOld,
                        editTentaikhoanadmin: editTentaikhoanadmin,
                        editMatkhauadmin: editMatkhauadmin,
                        editQuyenadmin: editQuyenadmin,
                    },
                    function(data) {
                        alert(data);
                        phantrang('taikhoan-admin');

                    });
            })
        });
        $(document).on('keyup', '#input-findTentaikhoan-admin', function() {
            phantrangfind('taikhoan-admin', 'findTentaikhoan-admin');

        });
        $(document).on('change', '#input-findQuyen-admin', function() {
            phantrangfind('taikhoan-admin', 'findQuyen-admin');

        });

    });
}
// VALIDATE

function validate() {
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                console.log("VALIDATE");
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })();
}

function alert(title) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 100000,

    })

    Toast.fire({
        icon: 'success',
        title: title
    })
}
var flagDelete = false;

function confirmDelete(title, action) {
    Swal.fire({
        title: title,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa!'
    }).then((result) => {
        if (result.isConfirmed) {
            action();
        }
    })
}

function confirmSave(title, action1, action2) {
    Swal.fire({
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Lưu và khóa',
        denyButtonText: `Lưu không khóa`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            action1();
        } else if (result.isDenied) {
            action2();
        }
    })
}