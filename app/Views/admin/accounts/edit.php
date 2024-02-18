<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Quản lý tài khoản</li>
        <li class="breadcrumb-item"><a href="#">Cập nhật tài khoản</a></li>
    </ul>
</div>
<form action="<?=ROOT_PATH?>admin/account/edit?ma_tk=<?= $account->ma_tk ?>" method="post" enctype='multipart/form-data'>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Cập nhật tài khoản</h3>
                <div class="tile-body">
                    <div class="row element-button">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Họ & tên:</label>
                            <br>
                            <input class="form-control" type="text" name="ho_ten" value="<?= $account->ho_ten ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">*Email:</label>
                            <br>
                            <input class="form-control" type="text" name="email" value="<?= $account->email ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Số điện thoại:</label>
                            <br>
                            <input class="form-control" type="text" name="sdt" value="<?= $account->sdt ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">*Mật Khẩu:</label>
                            <br>
                            <input class="form-control" type="text" name="mat_khau" value="<?= $account->mat_khau ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Hình ảnh:</label>
                            <br>
                            <div class="img" style ="margin:10px 0">
                                <img src="<?= ROOT_PATH ?>/images/<?= $account->hinh ?>" alt="" width="120"> 
                            </div>
                            <div id="myfileupload">
                                <input type="file" id="uploadfile" name="hinh" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Địa chỉ:</label>
                            <br>
                            <textarea class="form-control" name="dia_chi"><?= $account->dia_chi ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Vai trò:</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cap_bac" id="vaiTroAdmin" value="1" <?= $account->cap_bac==1?"checked":"" ?>>
                                <label class="form-check-label" for="vaiTroAdmin">Quản Trị Viên</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cap_bac" id="vaiTroUser" value="0" <?= $account->cap_bac==0?"checked":"" ?>>
                                <label class="form-check-label" for="vaiTroUser">Người Dùng</label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-save" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?= ROOT_PATH ?>admin/account/list">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

</main>