<?php 
namespace App\Controllers;

use App\Models\SanPhamModel;
use App\Models\DanhMucModel;

class HomeController extends BaseController{
    public function index(){
        $danhsachdanhmuc = DanhMucModel::all();
        $danhsachsanpham = SanPhamModel::all();
        return $this->view(
            "client/home",
            [
                "danhsachsanpham"=>$danhsachsanpham,
                "danhsachdanhmuc"=>$danhsachdanhmuc
            ]
        );
    }
}