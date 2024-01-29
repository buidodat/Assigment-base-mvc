<?php 

namespace App\Controllers;
use App\Models\SanPhamModel;

class ShopController extends BaseController{
    public function index(){
        $danhsachsanpham =SanPhamModel::all();
        return $this->view(
            "client/shop",
            ["danhsachsanpham"=>$danhsachsanpham]
        );
    }
}