<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Quản lý danh mục</li>
        <li class="breadcrumb-item"><a href="#">Tạo mới danh mục</a></li>
    </ul>
</div>
<form action="<?=ROOT_PATH?>admin/category/create" method="post" enctype='multipart/form-data'>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tạo mới danh mục</h3>
                <div class="tile-body">
                    <div class="row element-button">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên danh mục:</label>
                            <br>
                            <input class="form-control" type="text" name="ten_dm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Khẩu hiệu:</label>
                            <br>
                            <input class="form-control" type="text" name="slogan">
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-save" value="Lưu Lại">
                <a class="btn btn-cancel" href="<?= ROOT_PATH ?>admin/category/list">Hủy bỏ</a>
            </div>
        </div>
    </div>
</form>

</main>