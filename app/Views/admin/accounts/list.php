<div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item">Quản lý tài khoản</li>
        <li class="breadcrumb-item"><a href="#">Danh sách tài khoản</a></li>
    </ul>
    <div id="clock"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" href="<?= ROOT_PATH ?>admin/account/create" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới tài khoản</a>
                    </div>
                </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Họ & tên</th>
                            <th>Hình ảnh</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Vai trò</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($accounts as $a) :
                        ?>
                            <tr>
                                <td><?= $a->ma_tk ?></td>
                                <td><?= $a->ho_ten ?></td>
                                <td><img src="<?= ROOT_PATH ?>images/<?= $a->hinh ?>" width="50"/></td>
                                <td><?= $a->email ?></td>
                                <td><?= $a->sdt ?></td>
                                <td><?= $a->dia_chi ?></td>
                                <td><?= $a->cap_bac==1?"Quản Trị Viên":"Người Dùng" ?></td>
                                <td>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href="<?= ROOT_PATH ?>admin/account/delete?ma_tk=<?= $a->ma_tk ?>" ;>
                                        <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"><i class="fas fa-trash-alt"></i>
                                        </button>
                                    </a>
                                    <a href="<?= ROOT_PATH ?>admin/account/edit?ma_tk=<?= $a->ma_tk ?>">
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