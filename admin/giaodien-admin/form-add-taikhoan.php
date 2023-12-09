<form onsubmit="return false" class="needs-validation form-edit form-add-taikhoan" novalidate>
    <button onclick="closeFormAddTaiKhoan()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
    <h2>TẠO TÀI KHOẢN</h2>
    <div class="mb-3">
        <label for="input-add-tentaikhoan">Tên tài khoản</label>
        <input type="text" class="form-control" id="input-add-tentaikhoan" required>
        <div class="error" id="error-addtentaikhoan">
            <!-- Looks good! -->
        </div>
    </div>
    <div class="mb-3">
        <label for="input-add-matkhau">Mật khẩu</label>
        <input type="text" class="form-control" id="input-add-matkhau" required>
        <div class="error" id="error-addmatkhau">
            <!-- Looks good! -->
        </div>
    </div>
    <div class="mb-3">
        <label for="list-quyen">Quyền</label>
        <select class="list-quyen" id="list-quyen" required>

        </select>
        <div class="error" id="error-addquyen">
            <!-- Looks good! -->
        </div>
    </div>

    <button class="btn btn-primary submit-add submit-add-taikhoan" type="submit">Submit form</button>
</form>
<div class='form-edit form-detail-taikhoan'>
    <button onclick="closeFormDetailTaiKhoan()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
    <h2>TÀI KHOẢN</h2>
    <div class="load-detail-taikhoan">

    </div>
</div>
<div class='form-edit form-edit-taikhoan'>
    <button onclick="closeFormEditTaiKhoan()" class="edit-close"><i class="far fa-window-close text-light "></i></button>
    <h2>CHỈNH SỬA TÀI KHOẢN</h2>
    <div class="mb-3">
        <label for="form-edit-tentaikhoan-input" class="form-label">Tên tài khoản</label>
        <input type="text" class="form-control" id="form-edit-tentaikhoan-input">
        <div class="error" id="error-edittentaikhoan">
                <!-- Looks good! -->
            </div>
    </div>
    <div class="mb-3">
        <label for="form-edit-matkhau-input" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" id="form-edit-matkhau-input">
        <div class="error" id="error-editmatkhau">
                <!-- Looks good! -->
            </div>
    </div>
    <div class="mb-3">
        <label for="list-quyen" class="form-label">Quyền</label>
        <select id="edit-list-quyen" class='list-quyen'>

        </select>
        <div class="error" id="error-editquyen">
                <!-- Looks good! -->
            </div>
    </div>
    <button class="btn btn-primary submitEditTaikhoan">THAY ĐỔI</button>
</div>