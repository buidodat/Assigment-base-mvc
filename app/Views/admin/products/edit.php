<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Quản lý sản phẩm</li>
        <li class="breadcrumb-item"><a href="#">Cập nhật sản phẩm</a></li>
    </ul>
</div>
<form action="<?=ROOT_PATH?>admin/product/edit?ma_sp=<?= $pro->ma_sp ?>" method="post" enctype='multipart/form-data'>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Cập nhật sản phẩm</h3>
                <div class="tile-body">
                    <div class="row element-button">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên sản phẩm</label>
                            <br>
                            <input class="form-control" type="text" name="ten_sp" value="<?=$pro->ten_sp??""?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="exampleSelect1" class="control-label">Danh mục</label>
                            <select class="form-control" id="exampleSelect1" name="ma_dm">
                                <?php foreach ($categories as $ct) : ?>
                                    <option value="<?= $ct->ma_dm ?>" <?= $pro->ma_dm==$ct->ma_dm?"selected":"" ?>><?= $ct->ten_dm ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh sản phẩm</label>
                            <br>
                            <div id="myfileupload">
                                <input type="file" id="uploadfile" name="hinh" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả sản phẩm</label>
                            <br>
                            <textarea class="form-control" name="mo_ta" ><?= $pro->mo_ta ?></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-save" value="Cập nhật">
                <a class="btn btn-cancel" href="<?=ROOT_PATH?>admin/product/list">Hủy bỏ</a>

</form>

</main>