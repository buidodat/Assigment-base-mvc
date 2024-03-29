<div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item">Quản lý sản phẩm</li>
                <li class="breadcrumb-item"><a href="#">Danh sách sản phẩm</a></li>
            </ul>
            <div id="clock"></div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="<?=ROOT_PATH?>admin/product/create" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới sản phẩm</a>
                            </div>
                        </div>
                        <div >
                        <form action="index.php?act=danh-sach-san-pham" method="post">
                            <select name="iddm" id="" style="height: 26px; margin-left: 10px; border:solid 1px #dee2e6">
                                <option value="0" selected>Tất Cả</option>
                                <!-- <?php
                                // foreach ($listdanhmuc as $danhmuc) {
                                //     extract($danhmuc);
                                //     echo '<option value="'.$id.'">'.$ten.'</option>';
                                // }
                                ;
                                ?> -->
                            </select>
                            <input style="width: 75%; float: left;border:solid 1px #dee2e6" type="text" name="kyw" id="">
                            <input style="width: 15%; float: right; border:solid 1px #dee2e6" type="submit" name="listok" value="OK">
                        </form>
                        </div>
                        <!-- //form tìm kiếm -->
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Tình Trạng</th>
                                    <th>Giá Tiền</th>
                                    <th>Danh mục</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($products as $pro): 
                                ?>
                                <tr>
                                    <td><?=$pro->ma_sp?></td>
                                    <td><?=$pro->ten_sp?></td>
                                    <td> <img src="<?=ROOT_PATH ."images/".$pro->hinh?>" width="50" ></td>
                                    <td><?= $pro->tong_so_luong??"" ?></td>
                                    <td>
                                        <span class="badge <?=$pro->tong_so_luong==''?"bg-warning":($pro->tong_so_luong==0?"bg-danger":"bg-success");?>">
                                        <?=$pro->tong_so_luong==''?"Chưa nhập biến thể":($pro->tong_so_luong==0?"Hết Hàng":"Còn Hàng");?>
                                        </span>
                                    </td>
                                    <?php 
                                       $giamin = number_format($pro->gia_min,0,",",".") ;
                                       $giamax = number_format($pro->gia_max,0,",",".") ;
                                       $giaHienThi = "$giamin - $giamax đ";
                                       if($giamin==$giamax){
                                        $giaHienThi = "$giamin đ";
                                       }
                                    ?>
                                    <td><?= $giaHienThi ?></td>
                                    <td><?= $pro->ten_dm ?></td>
                                    <td>
                                        <a href="<?=ROOT_PATH?>admin/product/edit?ma_sp=<?=$pro->ma_sp?>">
                                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                        </a>
                                        <a href="<?=ROOT_PATH?>admin/product/dentail?ma_sp=<?=$pro->ma_sp?>">
                                            <button class="btn btn-eye btn-sm trash" type="button" title="Xem">
                                                <i class="fas fa-eye"></i>
                                            </button>   
                                        </a>
                                        <a href="<?=ROOT_PATH?>admin/product/dentail/create?ma_sp=<?=$pro->ma_sp?>">
                                            <button class="btn btn-add btn-sm trash" type="button" title="Thêm"
                                                ><i class="fas fa-plus"></i> 
                                            </button>   
                                        </a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>