<script>
    countAdd = 0;
    countFind = 0;
</script>

<div class="body-quanly-bch">
    <div class="panner-img">
        <img src="../img/quanly-bch.png" />
    </div>
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top bch-top">

        <form onsubmit="return false" class="needs-validation form-add form-add-bch" novalidate>
            <h3>THÊM BAN CHẤP HÀNH</h3>
            <div class="row mb-3">
                <label for="input-add-bch-soluong" class="col-sm-4 col-form-label">Số lượng thành viên</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-bch-soluong" required>
                    <div class="error" id="error-addbchsoluong">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-bch-khoa" class="col-sm-4 col-form-label">Khóa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="input-add-bch-khoa" required>
                    <div class="error" id="error-addbchkhoa">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-bch-ngaythanhlap" class="col-sm-4 col-form-label">Ngày thành lập</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="input-add-bch-ngaythanhlap" required>
                    <div class="error" id="error-addbchngaythanhlap">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-add-bch-ngayketthuc" class="col-sm-4 col-form-label">Ngày kết thúc</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="input-add-bch-ngayketthuc" required>
                    <div class="error" id="error-addbchngayketthuc">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-primary submit-add submit-add-bch" type="submit">THÊM</button>
        </form>
        <div class="form-find form-find-bch">
            <h3>TÌM KIẾM BAN CHẤP HÀNH</h3>
            <div class="row mb-3">
                <label for="input-findMabch" class="col-sm-4 col-form-label">Mã ban chấp hành</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findMabch" type="text" />
                </div>
            </div>
            <div class="row mb-3">
                <label for="input-findKhoabch" class="col-sm-4 col-form-label">Khóa</label>
                <div class="col-sm-8">
                    <input class="form-control" id="input-findKhoabch" type="text" />
                </div>
            </div>
        </div>
    </div>
    <div class='data-quanly bch'>
        <table class='table-striped table table-hover table-data-quanly table-bch'>
            <th>Mã ban chấp hành</th>
            <th>Số lượng thành viên</th>
            <th>Khóa</th>
            <th>Ngày thành lập</th>
            <th>Ngày kết thúc</th>
            <th>Sửa</th>
            <th>Xóa</th>
            <tbody class="load_data table-hover" id="load_data_bch">

            </tbody>

        </table>
    </div>

    <div class='form-edit form-edit-bch'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THAY ĐỔI BAN CHẤP HÀNH</h2>
        <div class="mb-3">
            <label for="form-edit-mabch-input" class="form-label">Mã ban chấp hành</label>
            <input type="text" class="form-control" id="form-edit-mabch-input" disabled>
        </div>
        <div class="mb-3">
            <label for="form-edit-bchsoluong-input" class="form-label">Số lượng thành viên</label>
            <input type="number" class="form-control" id="form-edit-bchsoluong-input">
        </div>
        <div class="mb-3">
            <label for="form-edit-bchkhoa-input" class="form-label">Khóa</label>
            <input type="number" class="form-control" id="form-edit-bchkhoa-input">
        </div>
        <div class="mb-3">
            <label for="form-edit-bchngaythanhlap-input" class="form-label">Ngày thành lập</label>
            <input type="number" class="form-control" id="form-edit-bchngaythanhlap-input">
        </div>
        <div class="mb-3">
            <label for="form-edit-bchngayketthuc-input" class="form-label">Ngày kết thúc</label>
            <input type="number" class="form-control" id="form-edit-bchngayketthuc-input">
        </div>
        <button class="btn btn-primary submitEditBCH">THAY ĐỔI</button>
    </div>
    <div class='form-edit form-detail-thanhvienbch'>
        <button onclick="closeFormDetailThanhvienBCH()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>THÀNH VIÊN BAN CHẤP HÀNH</h2>
        <div class="detail-thanhvien-of-bch">

        </div>
    </div>
</div>
<script>
    validate();
    quanlyBCH()
</script>