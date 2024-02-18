<div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><b>Quản lý sản phẩm</b></li>
        <li class="breadcrumb-item"><a href="#">Thêm mới biến thể</a></li>
      </ul>
    </div>
    <form action="" method="post">
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Thêm mới biến thể</h3>
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
          <div class="tile-body">
            <div class="row element-button">
            </div>
            <div class="row">
              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Chất liệu</label>
                <select class="form-control"  name="ma_vl">
                  <?php foreach($vatlieus as $vl):?>
                    <option value="<?= $vl->ma_vl ?>" >
                      <?=$vl->vat_lieu?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Đơn giá</label>
                <br>
                <input class="form-control" type="number" name="don_gia">
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giảm giá</label>
                <br>
                <!-- <span style="color:red"><?php echo !empty($error['gia'])? $error['gia']:false ?></span> -->
                <input class="form-control" type="number" name="giam_gia">
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Số lượng</label>
                <br>
                <span style="color:red"><?php echo !empty($error['soluong'])? $error['soluong']:false ?></span>
                <input class="form-control" type="number" name="so_luong">
              </div>
          </div>
          <div class="ghichu" style="margin-bottom:10px; color:#b0aeae">
                <span>*Không thể thêm biến thể mà sản phẩm đã có trước đó.</span>    
          </div>
          <input type="submit" class="btn btn-save" value="Lưu Lại">
          <input type="hidden" name="ma_sp" value="<?= $product->ma_sp ?>">
          <a class="btn btn-cancel" href="<?= ROOT_PATH ?>admin/product/dentail?ma_sp=<?= $product->ma_sp ?>">Hủy bỏ</a>
          </form>
    </div>
  </main>