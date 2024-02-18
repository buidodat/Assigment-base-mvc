<div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Quản lý sản phẩm</b></a></li>
                <li class="breadcrumb-item"><a href="#">Chi tiết sản phẩm</a></li>   
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <style>
                        .sanphamchitiet{
                            width:50%;
                        }
                        .list{
                            padding: 0;
                            margin: 0;
                        }
                        .list li{
                            list-style-type:none;
                            padding: 0;
                            margin: 0;
                        }
                        .list p{
                            padding: 0;
                            margin: 0;
                        }
                    </style>
                    <div class="chitietsanpham" style="width:50%;padding:20px">
                        <h4><?= $product->ten_sp ?></h4>
                        <ul class="list">
                            <p><b>Mô tả: </b><?= $product->mo_ta ?></p>
                            <li><b>Hình ảnh:</b></li>
                        </ul>
                        <img src="<?= ROOT_PATH ?>images/<?= $product->hinh ?>" alt="" width="200px" >
                    </div>
                <h3 class="tile-title"></h3>
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
                              <a class="btn btn-add btn-sm" href="<?=ROOT_PATH?>admin/product/dentail/create?ma_sp=<?=$product->ma_sp?>" title="Thêm"><i class="fas fa-plus"></i>
                                Thêm biến thể sản phẩm</a>
                            </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Chất liệu</th>
                                    <th>Số lượng</th>
                                    <th>Tình trạng</th>
                                    <th>Đơn giá</th>
                                    <th>Giảm giá</th>
                                    <th>Thành tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  if(!empty($productDentails)){?>
                                <?php 
                                    foreach($productDentails as $prodt): 
                                ?>
                                <tr>
                                    <td><?= $prodt->ma_spct ?></td>
                                    <td><?= $prodt->vat_lieu ?></td>
                                    <td><?= $prodt->so_luong ?></td>
                                     <td>
                                        <span class="badge <?= $prodt->so_luong >0?"bg-success":"bg-danger";?>">
                                        <?= $prodt->so_luong >0?"Còn Hàng":"Hết Hàng";?>
                                        </span>
                                    </td>
                                    <?php 
                                        $dongia = number_format($prodt->don_gia,0,",",".")." đ";
                                        $giamgia = number_format($prodt->giam_gia,0,",",".")." đ";
                                        $thanhtien = number_format($prodt->don_gia-$prodt->giam_gia,0,",",".")." đ";
                                    ?>
                                    <td><?= $dongia ?></td>
                                    <td><?= $giamgia ?></td>
                                    <td><b><?= $thanhtien ?></b></td>
                                    <td><?= $prodt->trang_thai==1?"Hiển Thị":"Ẩn"?></td>
                                    <td>
                                        <?php if($prodt->trang_thai==1){  ?>
                                            <a href="<?= ROOT_PATH ?>admin/product/dentail/delete?ma_spct=<?= $prodt->ma_spct ?>&ma_sp=<?=$product->ma_sp ?>" onclick="return confirm('Bạn chắc chắn muốn xóa chứ ?')";>
                                                <button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                                    ><i class="fas fa-trash-alt"></i> 
                                                </button>
                                            </a>
                                        <?php }else{ ?>
                                            <a href="<?= ROOT_PATH ?>admin/product/dentail/restore?ma_spct=<?= $prodt->ma_spct ?>&ma_sp=<?=$product->ma_sp ?>" onclick="return confirm('Bạn chắc chắn muốn khôi phục chứ ?')";>
                                                <button class="btn btn-primary btn-sm nhap-tu-file" type="button" title="Khôi phục"
                                                    ><i class="fas fa-trash-restore"></i>
                                                </button>
                                            </a>
                                        <?php } ?>
                                        <a href="<?= ROOT_PATH ?>admin/product/dentail/edit?ma_spct=<?= $prodt->ma_spct ?>&ma_sp=<?= $product->ma_sp ?>">
                                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                                            data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                
                                <?php  }else{?>
                                    <tr>
                                        <td colspan="9" class="text-center" >Sản phẩm hiện chưa có biến thể nào.</td>
                                    </tr>
                                <?php  }?>
                                <!-- <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>61304005</td>
                                    <td>Bàn ăn Reno mặt đá</td>
                                    <td><img src="/img-sanpham/reno.jpg" alt="" width="100px;"></td>
                                    <td>70</td>
                                    <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>24.200.000 đ</td>
                                    <td>Bàn ăn</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                       
                                    </td> 

                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>62304003</td>
                                    <td>Bàn ăn Vitali mặt đá</td>
                                    <td><img src="/img-sanpham/matda.jpg" alt="" width="100px;"></td>
                                    <td>40</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>33.235.000 đ</td>
                                    <td>Bàn ăn</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>72638003</td>
                                    <td>Ghế ăn gỗ Theresa</td>
                                    <td><img src="/img-sanpham/ghethera.jpg" alt="" width="100px;"></td>
                                    <td>50</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>950.000 đ</td>
                                    <td>Ghế gỗ</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button> 
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>72109004</td>
                                    <td>Ghế làm việc Zuno</td>
                                    <td><img src="/img-sanpham/zuno.jpg" alt="" width="100px;"></td>
                                    <td>50</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>3.800.000 đ</td>
                                    <td>Ghế gỗ</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>82716001</td>
                                    <td>Ghế ăn Vitali</td>
                                    <td><img src="/img-sanpham/vita.jpg" alt="" width="100px;"></td>
                                    <td>55</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>4.600.000 đ</td>
                                    <td>Ghế gỗ</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>72109001</td>
                                    <td>Ghế ăn gỗ Lucy màu trắng</td>
                                    <td><img src="/img-sanpham/lucy.jpg" alt="" width="100px;"></td>
                                    <td>38</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>1.100.000 đ</td>
                                    <td>Ghế gỗ</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i> </button>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>71304041</td>
                                    <td>Bàn ăn mở rộng Vegas</td>
                                    <td><img src="/img-sanpham/vegas.jpg" alt="" width="100px;"></td>
                                    <td>80</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>21.550.000 đ</td>
                                    <td>Bàn thông minh</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>71304037</td>
                                    <td>Bàn ăn mở rộng Gepa</td>
                                    <td><img src="/img-sanpham/banan.jpg" alt="" width="100px;"></td>
                                    <td>80</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>16.770.000 đ</td>
                                    <td>Bàn thông minh</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>71304032</td>
                                    <td>Bàn ăn mặt gốm vân đá Cera</td>
                                    <td><img src="/img-sanpham/cera.jpg" alt="" width="100px;"></td>
                                    <td>46</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>20.790.000 đ</td>
                                    <td>Bàn thông minh</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>71338008</td>
                                    <td>Bàn ăn mở rộng cao cấp Dolas</td>
                                    <td><img src="/img-sanpham/dolas.jpg" alt="" width="100px;"></td>
                                    <td>66</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>22.650.000 đ</td>
                                    <td>Bàn thông minh</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>83826226</td>
                                    <td>Tủ ly - tủ bát</td>
                                    <td><img src="/img-sanpham/tu.jpg" alt="" width="100px;"></td>
                                    <td>0</td>
                                    <td><span class="badge bg-danger">Hét hàng</span></td>
                                    <td>2.450.000 đ</td>
                                    <td>Tủ</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>83252001</td>
                                    <td>Giường ngủ Thomas</td>
                                    <td><img src="/img-sanpham/thomas.jpg" alt="" width="100px;"></td>
                                    <td>73</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>12.950.000 đ</td>
                                    <td>Giường người lớn</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>83252002</td>
                                    <td>Giường ngủ Jimmy</td>
                                    <td><img src="/img-sanpham/jimmy.jpg" alt="" width="100px;"></td>
                                    <td>60</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>16.320.000 đ</td>
                                    <td>Giường người lớn</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>83216008</td>
                                    <td>Giường ngủ Tara chân gỗ</td>
                                    <td><img src="/img-sanpham/tare.jpg" alt="" width="100px;"></td>
                                    <td>65</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>19.600.000 đ</td>
                                    <td>Giường người lớn</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td width="10"><input type="checkbox" name="check1" value="1"></td>
                                    <td>83216006</td>
                                    <td>Giường ngủ Kara 1.6x2m</td>
                                    <td><img src="/img-sanpham/kara.jpg" alt="" width="100px;"></td>
                                    <td>60</td>
                                     <td><span class="badge bg-success">Còn hàng</span></td>
                                    <td>14.500.000 đ</td>
                                    <td>Giường người lớn</td>
                                    <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa"
                                            onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                      data-target="#ModalUP"><i class="fas fa-edit"></i></button>
                                   
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <a class="btn btn-cancel" href="<?=ROOT_PATH?>admin/product/list">Danh Sách Sản Phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </main>