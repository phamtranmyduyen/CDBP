<script>
    var countDang = 0;
    var countTim = 0;
</script>
<div class="notification-BCH">
    <div class="notification-BCH-top">
        <button class='btn btn-primary btn-lg dang-thong-bao' data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Đăng thông báo
        </button>
        <button class='btn btn-primary btn-lg tim-thong-bao' data-bs-toggle="collapse" data-bs-target="#collapseFindNoti" aria-expanded="false" aria-controls="collapseFindNoti">
            Tìm kiếm
        </button>
    </div>
    <div class="col">
        <div class="collapse multi-collapse form-dang-thong-bao" id="collapseExample">
            <div class="card card-body">
                <form onsubmit="return false" class="needs-validation form-add-notification" novalidate>
                    <h3>THÔNG BÁO</h3>
                    <div class="col-md-8 mb-3 add-noidungthongbao">
                        <label class="form-label" for="input-add-noidungthongbao">Nội dung thông báo</label>
                        <input type="text" class="form-control" id="input-add-noidungthongbao" required>
                        <div class="error" id="error-addnoidungthongbao">
                            <!-- Looks good! -->
                        </div>
                    </div>                    
                    <div class="col-md-8 mb-3 add-ngaythuchien">
                        <label class="form-label" for="input-add-ngaythuchien">Ngày thực hiện</label>
                        <input type="datetime-local" class="form-control" id="input-add-ngaythuchien" required>
                        <div class="error" id="error-addngaythuchien">
                            <!-- Looks good! -->
                        </div>
                    </div>
                    <div class="col-md-8 mb-3 add-ngayhethan">
                        <label class="form-label" for="input-add-ngayhethan">Ngày hết hạn</label>
                        <input type="datetime-local" class="form-control" id="input-add-ngayhethan" required>
                        <div class="error" id="error-addngayhethan">
                            <!-- Looks good! -->
                        </div>
                    </div>
                    <div class="col-md-8 mb-3 add-phanloai">
                        <label class="form-label" for="input-add-phanloai">Phân loại</label>
                        <select name="cboPhanloai" id="list-phan-loai" class='form-select list-phan-loai' onchange="changeCheckBox(document.getElementById('list-phan-loai'),'input-add-phanloai-khac');">
                            <option selected value="Thông báo">Thông báo</option>
                            <option value="Chấm điểm">Chấm điểm</option>
                            <option value="Khác">Khác</option>
                        </select>
                        <div class="phanloai-khac">
                            <!-- <input type="text" class="form-control" id="input-add-phanloai-khac" required> -->
                        </div>

                        <div class="error" id="error-addphanloai">
                            <!-- Looks good! -->
                        </div>
                    </div>
                    <button class="btn btn-primary submit-add-thongbao" type="submit">ĐĂNG</button>
                </form>
            </div>
        </div>
        <div class="collapse multi-collapse form-tim-thong-bao" id="collapseFindNoti">
            <div class="card card-body">
                <form onsubmit="return false" class="needs-validation form-find-notification" novalidate>
                    <h3>TÌM KIẾM</h3>
                    <div class="col-md-8 mb-3 find-noidungthongbao">
                        <label class="form-label" for="input-find-noidungthongbao">Nội dung thông báo</label>
                        <input type="text" class="form-control" id="input-find-noidungthongbao" required>
                    </div>
                    <div class="col-md-8 mb-3 find-phanloai">
                        <label class="form-label" for="input-find-phanloai">Phân loại</label>
                        <select name="cboPhanloai" id="input-find-phan-loai" class='form-select list-phan-loai' onchange="changeCheckBox(document.getElementById('input-find-phan-loai'),'input-find-phanloai-khac' );">
                            <option selected value="Thông báo">Thông báo</option>
                            <option value="Chấm điểm">Chấm điểm</option>
                            <option value="Khác">Khác</option>
                        </select>
                        <div class="phanloai-khac">
                            <!-- <input type="text" class="form-control" id="input-find-phanloai-khac" required> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="table-danhsach-thongbao">
        <table class="table-striped table table-hover point">
            <tr>
                <th>Mã thông báo</th>
                <th>Nội dung</th>
                <th>Ngày đăng</th>
                <th>Ngày thực hiện</th>
                <th>Ngày hết hạn</th>
                <th>Người đăng</th>
                <th>Chỉnh sửa</th>
                <th>Hiển thị</th>
            </tr>
            <tbody class="table-hover load-data list-notification" id="load-data-notification-BCH">
                <!-- <th>THÔNG BÁO</th> -->
            </tbody>
        </table>
    </div>
    <div class='form-edit form-edit-notification-BCH'>
        <button onclick="closeEdit()" class="edit-close"><i class="far fa-window-close text-light"></i></button>
        <h2>CẬP NHẬT THÔNG BÁO</h2>
        <div class="mb-3">
            <label for="form-edit-notification-BCH-ngaythuchien" class="form-label">Ngày thực hiện</label>
            <input class="form-control" id="form-edit-notification-BCH-ngaythuchien" type="datetime-local">
        </div>
        <div class="mb-3">
            <label for="form-edit-notification-BCH-ngayhethan" class="form-label">Ngày hết hạn</label>
            <input class="form-control" id="form-edit-notification-BCH-ngayhethan" type="datetime-local">
        </div>
        <div class="mb-3">
            <label for="form-edit-notification-BCH-noidung" class="form-label">Nội dung</label>
            <textarea class="form-control" id="form-edit-notification-BCH-noidung"></textarea>
        </div>
        <button class="btn btn-primary submitEdit submitEditNotificationBCH">CẬP NHẬT</button>
    </div>
</div>
<script>
    notificationBCH();
</script>