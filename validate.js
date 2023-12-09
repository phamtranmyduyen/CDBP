function setInputValue(selector, value) {
    var element = document.getElementById(selector);
    element.value = value;
}

function getInputValue(selector) {
    var element = document.getElementById(selector);
    return element.value;
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validatePhone(phone) {
    var re = /^0(1\d{9}|9\d{8})$/;
    return re.test(phone);
}

function addCdbp(addTencdbp, addNgaythanhlapcdbp, addTentaikhoanDaco, addTaikhoancdbp) {

    var flag = true;
    if (_.isEmpty(addTencdbp)) {
        document.getElementById('error-addtencdbp').innerText = "Vui lòng nhập tên CĐBP";
        flag = false;
    } else {
        document.getElementById('error-addtencdbp').innerText = '';

    }

    if (_.isEmpty(addNgaythanhlapcdbp)) {
        document.getElementById('error-addngaythanhlapcdbp').innerText = "Vui lòng nhập ngày thành lập";
        flag = false;
    } else {
        document.getElementById('error-addngaythanhlapcdbp').innerText = '';

    }
    if (_.isEmpty(addTentaikhoanDaco) && _.isEmpty(addTaikhoancdbp)) {
        document.getElementById('error-addtaikhoancdbp-daco').innerHTML = "Vui lòng chọn tài khoản cho công đoàn";
        flag = false;
    } else {
        document.getElementById('error-addtaikhoancdbp-daco').innerHTML = '';
        document.getElementById('error-addtaikhoancdbp').innerHTML = '';

    }

    return flag;
}

function validateAddTaikhoan(addTentaikhoan, addMatkhau, addTenquyen) {
    var flag = true;

    if (_.isEmpty(addTentaikhoan)) {
        document.getElementById('error-addtentaikhoan').innerText = "Vui lòng nhập tên tài khoản";
        flag = false;
    } else {
        document.getElementById('error-addtentaikhoan').innerText = '';
    }
    if (_.isEmpty(addMatkhau)) {
        document.getElementById('error-addmatkhau').innerHTML = "Vui lòng nhập mật khẩu";
        flag = false;
    } else {
        document.getElementById('error-addmatkhau').innerHTML = '';
    }
    if (_.isEmpty(addTenquyen)) {
        document.getElementById('error-addquyen').innerHTML = "Vui lòng chọn quyền";
        flag = false;
    } else {
        document.getElementById('error-addquyen').innerHTML = '';
    }


    return flag;
}

function validateDonvi(trangthai, addTendonvi, addDiachidonvi, addSodienthoaidonvi, addEmaildonvi, addTencdbp) {
    var flag = true;

    if (_.isEmpty(addTendonvi)) {
        document.getElementById('error-' + trangthai + 'tendonvi').innerText = "Vui lòng nhập tên đơn vị";
        flag = false;
    } else {
        document.getElementById('error-' + trangthai + 'tendonvi').innerText = '';
    }
    if (_.isEmpty(addDiachidonvi)) {
        document.getElementById('error-' + trangthai + 'diachidonvi').innerHTML = "Vui lòng nhập địa chỉ";
        flag = false;
    } else {
        document.getElementById('error-' + trangthai + 'diachidonvi').innerHTML = '';
    }
    if (_.isEmpty(addSodienthoaidonvi)) {
        document.getElementById('error-' + trangthai + 'sodienthoaidonvi').innerHTML = "Vui lòng nhập số điện thoại";
        flag = false;
    } else if (!validatePhone(addSodienthoaidonvi)) {
        document.getElementById('error-' + trangthai + 'sodienthoaidonvi').innerHTML = "Số điện thoại không đúng định dạng";
        flag = false;
    } else {
        document.getElementById('error-' + trangthai + 'sodienthoaidonvi').innerHTML = '';
    }
    if (_.isEmpty(addEmaildonvi)) {
        document.getElementById('error-' + trangthai + 'emaildonvi').innerHTML = "Vui lòng nhập email";
        flag = false;
    } else if (!validateEmail(addEmaildonvi)) {
        document.getElementById('error-' + trangthai + 'emaildonvi').innerHTML = "Email không đúng định dạng";
        flag = false;
    } else {
        document.getElementById('error-' + trangthai + 'emaildonvi').innerHTML = '';
    }
    if (_.isEmpty(addTencdbp)) {
        document.getElementById('error-' + trangthai + '-congdoan').innerHTML = "Vui lòng chọn CDBP";
        flag = false;
    } else {
        document.getElementById('error-' + trangthai + '-congdoan').innerHTML = '';
    }


    return flag;

}

function validateAddBch(addBchSoluong, addBchKhoa, addBchNgaythanhlap, addBchNgayketthuc) {
    var flag = true;

    if (_.isEmpty(addBchSoluong)) {
        document.getElementById('error-addbchsoluong').innerText = "Vui lòng nhập số lượng thành viên";
        flag = false;
    } else {
        document.getElementById('error-addbchsoluong').innerText = '';
    }
    if (_.isEmpty(addBchKhoa)) {
        console.log(document.getElementById('error-addbchkhoa'));
        document.getElementById('error-addbchkhoa').innerHTML = "Vui lòng nhập khóa";
        flag = false;
    } else {
        document.getElementById('error-addbchkhoa').innerHTML = '';
    }
    if (_.isEmpty(addBchNgaythanhlap)) {
        document.getElementById('error-addbchngaythanhlap').innerHTML = "Vui lòng nhập ngày thành lập";
        flag = false;
    } else {
        document.getElementById('error-addbchngaythanhlap').innerHTML = '';
    }
    if (_.isEmpty(addBchNgayketthuc)) {
        document.getElementById('error-addbchngayketthuc').innerHTML = "Vui lòng nhập ngày kết thúc";
        flag = false;
    } else {
        document.getElementById('error-addbchngayketthuc').innerHTML = '';
    }


    return flag;

}

function validateAddQuyen(addMaquyen, addTenquyen) {
    var flag = true;

    if (_.isEmpty(addMaquyen)) {
        document.getElementById('error-addmaquyen').innerText = "Vui lòng nhập mã quyền";
        flag = false;
    } else {
        document.getElementById('error-addmaquyen').innerText = '';
    }
    if (_.isEmpty(addTenquyen)) {
        document.getElementById('error-addtenquyen').innerHTML = "Vui lòng nhập tên quyền";
        flag = false;
    } else {
        document.getElementById('error-addtenquyen').innerHTML = '';
    }

    return flag;
}

function validateAddTieuchichamdiem(addNoidungtieuchi, addDiemchuantieuchi) {
    var flag = true;

    if (_.isEmpty(addNoidungtieuchi)) {
        document.getElementById('error-addnoidungtieuchi').innerText = "Vui lòng nhập nội dung tiêu chí";
        flag = false;
    } else {
        document.getElementById('error-addnoidungtieuchi').innerText = '';
    }
    if (_.isEmpty(addDiemchuantieuchi)) {
        document.getElementById('error-adddiemchuantieuchi').innerHTML = "Vui lòng nhập điểm chuẩn tiêu chí";
        flag = false;
    } else {
        document.getElementById('error-adddiemchuantieuchi').innerHTML = '';
    }

    return flag;
}

function validateAddChucnang(addTenchucnang) {
    var flag = true;

    if (_.isEmpty(addTenchucnang)) {
        document.getElementById('error-addtenchucnang').innerText = "Vui lòng nhập tên chức năng";
        flag = false;
    } else {
        document.getElementById('error-addtenchucnang').innerText = '';
    }

    return flag;
}

function validateAddChitiettieuchichamdiem(addNoidungchitiettieuchi, addDiemchuanchitiettieuchi, addTentieuchi) {
    var flag = true;

    if (_.isEmpty(addNoidungchitiettieuchi)) {
        document.getElementById('error-addnoidungchitiettieuchi').innerText = "Vui lòng nhập nội dung chi tiết tiêu chí";
        flag = false;
    } else {
        document.getElementById('error-addnoidungchitiettieuchi').innerText = '';
    }
    if (_.isEmpty(addDiemchuanchitiettieuchi)) {
        document.getElementById('error-adddiemchuanchitiettieuchi').innerHTML = "Vui lòng nhập điểm chuẩn chi tiết tiêu chí";
        flag = false;
    } else {
        document.getElementById('error-adddiemchuanchitiettieuchi').innerHTML = '';
    }
    if (_.isEmpty(addTentieuchi)) {
        document.getElementById('error-addmatieuchi').innerHTML = "Vui lòng chọn tiêu chí";
        flag = false;
    } else {
        document.getElementById('error-addmatieuchi').innerHTML = '';
    }

    return flag;
}

function AddThanhvienbch(addTvbchTen, addTvbchChucvu, addTvbchSodienthoai, addTvbchEmail, addTvbchBCH, addTentaikhoanDaco, addTaikhoancdbp) {
    var flag = true;

    if (_.isEmpty(addTvbchTen)) {
        document.getElementById('error-addthanhvienbchten').innerText = "Vui lòng nhập họ tên";
        flag = false;
    } else {
        document.getElementById('error-addthanhvienbchten').innerText = '';
    }
    if (_.isEmpty(addTvbchChucvu)) {
        document.getElementById('error-addthanhvienbchchucvu').innerHTML = "Vui lòng nhập chức vụ";
        flag = false;
    } else {
        document.getElementById('error-addthanhvienbchchucvu').innerHTML = '';
    }
    if (_.isEmpty(addTvbchSodienthoai)) {
        document.getElementById('error-addthanhvienbchsodienthoai').innerHTML = "Vui lòng nhập số điện thoại";
        flag = false;
    } else if (!validatePhone(addTvbchSodienthoai)) {
        document.getElementById('error-addthanhvienbchsodienthoai').innerHTML = "Số điện thoại không đúng định dạng";
        flag = false;
    } else {
        document.getElementById('error-addthanhvienbchsodienthoai').innerHTML = '';
    }
    if (_.isEmpty(addTvbchEmail)) {
        document.getElementById('error-addthanhvienbchemail').innerHTML = "Vui lòng nhập email";
        flag = false;
    } else if (!validateEmail(addTvbchEmail)) {
        document.getElementById('error-addthanhvienbchemail').innerHTML = "Email không đúng định dạng";
        flag = false;
    } else {
        document.getElementById('error-addthanhvienbchemail').innerHTML = '';
    }
    if (_.isEmpty(addTvbchBCH)) {
        document.getElementById('error-addmabch').innerHTML = "Vui lòng chọn ban chấp hành";
        flag = false;
    } else {
        document.getElementById('error-addmabch').innerHTML = '';
    }
    if (_.isEmpty(addTentaikhoanDaco) && _.isEmpty(addTaikhoancdbp)) {
        console.log(1);
        document.getElementById('error-addtaikhoancdbp-daco').innerHTML = "Vui lòng chọn tài khoản cho thành viên";
        flag = false;
    } else {
        console.log(2);
        document.getElementById('error-addtaikhoancdbp-daco').innerHTML = '';
        document.getElementById('error-addtaikhoancdbp').innerHTML = '';

    }

    return flag;

}

function validateAddTaikhoanbch(addTentaikhoan, addMatkhau, addTenquyen) {
    var flag = true;

    if (_.isEmpty(addTentaikhoan)) {
        document.getElementById('error-addtentaikhoan').innerText = "Vui lòng nhập tên tài khoản";
        flag = false;
    } else {
        document.getElementById('error-addtentaikhoan').innerText = '';
    }
    if (_.isEmpty(addMatkhau)) {
        document.getElementById('error-addmatkhau').innerHTML = "Vui lòng nhập mật khẩu";
        flag = false;
    } else {
        document.getElementById('error-addmatkhau').innerHTML = '';
    }
    if (_.isEmpty(addTenquyen)) {
        document.getElementById('error-addquyen').innerHTML = "Vui lòng chọn quyền";
        flag = false;
    } else {
        document.getElementById('error-addquyen').innerHTML = '';
    }


    return flag;
}

function validateAddTaikhoanadmin(addTentaikhoanadmin, addMatkhauadmin, addQuyenadmin) {
    var flag = true;

    if (_.isEmpty(addTentaikhoanadmin)) {
        document.getElementById('error-addtentaikhoan-admin').innerText = "Vui lòng nhập tên tài khoản";
        flag = false;
    } else {
        document.getElementById('error-addtentaikhoan-admin').innerText = '';
    }
    if (_.isEmpty(addMatkhauadmin)) {
        document.getElementById('error-addmatkhau-admin').innerHTML = "Vui lòng nhập mật khẩu";
        flag = false;
    } else {
        document.getElementById('error-addmatkhau-admin').innerHTML = '';
    }
    if (_.isEmpty(addQuyenadmin)) {
        document.getElementById('error-addquyen').innerHTML = "Vui lòng chọn quyền";
        flag = false;
    } else {
        document.getElementById('error-addquyen').innerHTML = '';
    }

    return flag;
}


function passwordChanged() {
    validPass = false;
    var strength = document.getElementById('error-pass-new');
    var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{7,}).*", "g");
    var pwd = document.getElementById("pass-new");
    if (false == enoughRegex.test(pwd.value)) {
        strength.innerHTML = 'Mật khẩu tối thiểu 8 ký tự';
        validPass = false;
    } else if (strongRegex.test(pwd.value)) {
        strength.innerHTML = '<span style="color:green">Strong!</span>';
        validPass = true;
    } else if (mediumRegex.test(pwd.value)) {
        strength.innerHTML = '<span style="color:orange">Medium!</span>';
        validPass = true;
    } else {
        strength.innerHTML = '<span style="color:red">Weak!</span>';
        validPass = true;
    }
    return validPass;
}


function validatePass(passnew, repassnew) {
    var flag = true;
    if (_.isEmpty(repassnew)) {
        document.getElementById('error-repass-new').innerText = "Vui lòng nhập lại mật khẩu mới";
        flag = false;
    } else {
        document.getElementById('error-repass-new').innerText = '';
    }
    if (repassnew != passnew) {
        document.getElementById('error-repass-new').innerText = 'Mật khẩu nhập lại không đúng'; //LỖI : Mật khẩu nhập lại không đúng
        flag = false;
    } else {
        document.getElementById('error-repass-new').innerText = '';
    }

    return flag;
}

function validateEditThanhvienbch(addTvbchSodienthoai, addTvbchEmail) {
    var flag = true;
    if (_.isEmpty(addTvbchSodienthoai) == false) {
        if (!validatePhone(addTvbchSodienthoai)) {
            document.getElementById('error-edit-phone-bch').innerHTML = "Số điện thoại không đúng định dạng";
            flag = false;
        } else {
            document.getElementById('error-edit-phone-bch').innerHTML = '';
        }
    }
    if (_.isEmpty(addTvbchEmail) == false) {
        if (!validateEmail(addTvbchEmail)) {
            document.getElementById('error-edit-email-bch').innerHTML = "Email không đúng định dạng";
            flag = false;
        } else {
            document.getElementById('error-edit-email-bch').innerHTML = '';
        }
    }



    return flag;

}