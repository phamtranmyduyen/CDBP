<div class="introduce-BCH-body">
    <div class="option">
        <button class="option-add-cdbp btn btn-primary btn-sm" onclick="displayAdd();">Thêm</button>
        <button class="option-find-cdbp btn btn-secondary btn-sm" onclick="displayFind();">Tìm kiếm</button>
    </div>
    <div class="quanly-top chucnang-top">
        <form onsubmit="return false" class="needs-validation form-add form-add-introduce" novalidate>
            <h3>THÊM THÔNG TIN GIỚI THIỆU</h3>
            <div class="body-form-add-introduce">
                <div class="add-introduce">
                    <div class="col-md-8 mb-3 add-content-introduce">
                        <label class="form-label" for="input-add-content-introduce">Nội dung giới thiệu</label>
                        <input type="text" class="form-control" id="input-add-content-introduce" required>
                        <div class="error" id="error-addContentIntroduce">
                            <!-- Looks good! -->
                        </div>
                    </div>
                    <div class="col-md-8 mb-3 add-img">
                        <label class="form-label" for="input-add-img">Hình ảnh</label>
                        <input type="file" class="form-control" id="input-add-img" required>
                        <div class="error" id="error-addimg">
                            <!-- Looks good! -->
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="input-add-ctgt-1">Chi tiết giới thiệu 1</label>
                    <input type="text" class="form-control input-add-ctgt" id="input-add-ctgt-1" required>
                    <div class="error" id="error-addctgt-1">
                        <!-- Looks good! -->
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="input-add-ctgt-2">Chi tiết giới thiệu 2</label>
                    <input type="text" class="form-control input-add-ctgt" id="input-add-ctgt-2" required>
                    <div class="error" id="error-addctgt-2">
                        <!-- Looks good! -->
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <label class="form-label" for="input-add-ctgt-3">Chi tiết giới thiệu 3</label>
                    <input type="text" class="form-control input-add-ctgt" id="input-add-ctgt-3" required>
                    <div class="error" id="error-addctgt-3">
                        <!-- Looks good! -->
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-secondary add-ctgt" type="button" style="font-weight: bold;" onclick="append_jquery()">THÊM CHI TIẾT</button>
            <button class="btn btn-primary submit-add submit-add-gioithieu" type="submit">THÊM</button>
        </form>
        <div class="form-find form-find-chucnang">
            <span id="noti-find-chucnang"></span>
            <h3>TÌM KIẾM THÔNG TIN GIỚI THIỆU</h3>
            <div>
                <h4>Nội dung giới thiệu</h4>
                <input id="input-find-noidunggioithieu" type="text" />
            </div>
            <div>
                <h4>Trạng thái hiển thị</h4>
                <select style="text-align: center" id="input-find-trangthai" class='form-select list-data' required>
                    <option value="0">Hiển thị</option>
                    <option value="1">Ẩn</option>
                </select>
            </div>
        </div>
    </div>
    <div class="table-introduce-BCH">
        <table class="table-striped table table-hover point">
            <tr>
                <th>STT</th>
                <th>Nội dung giới thiệu</th>
                <th>Hình ảnh</th>
                <th style='width:130px'>Hiển thị</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <tbody class="table-hover load-data load-data-introduce-BCH" id="load-data-introduce-BCH">
                <!-- <th>Giới thiệu</th> -->
            </tbody>
        </table>
    </div>
    <div class='form-edit form-edit-introduce-BCH'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>SỬA THÔNG TIN GIỚI THIỆU</h2>
        <div class="mb-3">
            <label for="form-edit-introduce-BCH-noidunggioithieu" class="form-label">Nội dung giới thiệu</label>
            <input class="form-control" id="form-edit-introduce-BCH-noidunggioithieu" type="text">
        </div>
        <div class="mb-3">
            <label for="form-edit-introduce-BCH-hinhanh" class="form-label">Hình ảnh</label>
            <input class="form-control" id="form-edit-introduce-BCH-hinhanh-cu" type="hidden">
            <input class="form-control" id="form-edit-introduce-BCH-hinhanh" type="file">
        </div>
        <button class="btn btn-primary submitEdit submitEditIntroduceBCH">CẬP NHẬT</button>
    </div>
</div>
<script>
    introduceBCH();
    length = document.getElementsByClassName('input-add-ctgt').length;
    lengthStrSplit = document.getElementsByClassName('input-add-ctgt')[length - 1].id.split("-").length;
    id = document.getElementsByClassName('input-add-ctgt')[length - 1].id.split("-")[length];

    var phantuThemCTGT = $(".body-form-add-introduce");

    function append_jquery() {
        id = parseInt(id) + 1;
        phantuThemCTGT.append("<div class='col-md-8 mb-3'><label class='form-label' for='input-add-ctgt-" + id + "'>Chi tiết giới thiệu " + id + "</label> <input type='text' class='form-control input-add-ctgt' id='input-add-ctgt-" + id + "' required><div class='error' id='error-addctgt-" + id + "'></div></div>");
    }
</script>