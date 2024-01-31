<?php 
namespace App\Controllers;
use App\Models\DanhMucModel;
use App\Models\SanPhamModel;

class ProductController extends BaseController{
    public function index(){
        $products = SanPhamModel::all();
        return $this->viewadmin(
            "admin/products/list",
            ["products"=>$products]
        );
    }
    public function create(){
        $categories = DanhMucModel::all();
        return $this->viewadmin(
            "admin/products/add",
            ["categories"=>$categories]
        );
    }
    public function store(){
        $data = $_POST;
        //xủ lý ảnh
        $file = $_FILES['hinh'];
        //lấy tên ảnh
        $hinh = $file['name'];
        move_uploaded_file($file['tmp_name'], "images/" . $hinh);
        //thêm ảnh vào datta 
        $data['hinh']=$hinh;
        //insert vào dtb

        SanPhamModel::insert($data);
        header("Location: " . ROOT_PATH . "product/list");
    }
}