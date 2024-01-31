<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item">Quản lý danh mục</li>
        <li class="breadcrumb-item"><a href="#">Danh sách danh mục</a></li>
    </ul>
    <div id="clock"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" href="<?= ROOT_PATH ?>admin/category/create" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới danh mục</a>
                    </div>
                </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên danh mục</th>
                            <th>Khẩu hiệu</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categories as $ct) :
                        ?>
                            <tr>
                                <td><?= $ct->ma_dm ?></td>
                                <td><?= $ct->ten_dm ?></td>
                                <td><?= $ct->slogan ?></td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="<?= ROOT_PATH ?>admin/product/delete?ma_dm=<?= $ct->ma_dm ?>" ;>
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i>
                                        </button>
                                    </a>
                                    <a href="<?= ROOT_PATH ?>admin/category/edit?ma_dm=<?= $ct->ma_dm ?>">
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>