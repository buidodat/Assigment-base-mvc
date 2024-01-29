<?php 
namespace App\Controllers;
use App\Models\SanPhamModel;

class ProductDentailController extends BaseController{
    public function detail(){
        $ma_sp = $_GET['ma_sp'];
        $sanpham =SanPhamModel::find($ma_sp);
        return $this->view(
            "client/productdentail",
            ["sanpham"=>$sanpham]
        );
    }
}