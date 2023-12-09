<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-taikhoan-admin">
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top taikhoan-admin-top">
        <form onsubmit="return false" class="needs-validation form-add form-add form-add-taikhoan-admin" novalidate>
            <h3>THÊM TÀI KHOẢN</h3>
            <div class="row mb-3">
                <label for="input-add-tentaikhoan-admin" class="col-sm-4 col-form-label">Tên tài khoản</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-tentaikhoan-admin" required>
                    <div class="error" id="error-addtentaikhoan-admin">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-matkhau-admin" class="col-sm-4 col-form-label">Mật khẩu</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-matkhau-admin" required>
                    <div class="error" id="error-addmatkhau-admin">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="list-quyen" class="col-sm-4 col-form-label">Quyền</label>
                <div class="col-sm-8">
                    <select class="form-select list-quyen" id="list-quyen" required>

                    </select>
                    <div class="error" id="error-addquyen">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-taikhoan-admin" type="submit">THÊM</button>
        </form>

        <div class="form-find form-find-taikhoan-admin">
            <span id="noti-find-taikhoan-admin"></span>
            <h3>TÌM KIẾM TÀI KHOẢN</h3>
            <div class="row mb-3">
                <label for="input-findTentaikhoan-admin" class="col-sm-4 col-form-label">Tên tài khoản</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findTentaikhoan-admin" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findQuyen-admin" class="col-sm-4 col-form-label">Thuộc quyền</label>
                <div class="col-sm-8">
                    <select class="form-select list-quyen" id="input-findQuyen-admin">

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly taikhoan-admin'>
        <table class='table-striped table table-hover table-data-quanly table-taikhoan-admin'>
            <th>Tên tài khoản</th>
            <th>Mật khẩu</th>
            <th>Mã quyền</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load_data table-hover" id="load_data_taikhoan-admin">

            </tbody>

        </table>
    </div>

    <div class='form-edit-taikhoan-admin form-edit'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI TÀI KHOẢN</h2>
        <div class="mb-3">
            <label for="form-edit-tentaikhoan-admin-input" class="form-label">Tên tài khoản</label>
            <input type="text" class="form-control" id="form-edit-tentaikhoan-admin-input" type="text">
        </div>

        <div class="mb-3">
            <label for="form-edit-matkhau-admin-input" class="form-label">Mật khẩu</label>
            <input type="text" class="form-control" id="form-edit-matkhau-admin-input" type="text">
        </div>
        <div class="mb-3">
            <label for="list-quyen-admin" class="form-label">Quyền</label>
            <select id="list-quyen-admin" class='list-quyen'>

            </select>
        </div>



        <button class="btn btn-primary submitEditTaikhoanAdmin">THAY ĐỔI</button>
    </div>
</div>
<script>
    validate();
    quanlyTaikhoanAdmin();
</script>