<?php 
namespace App\Controllers;
use App\Models\DanhMucModel;
use App\Models\SanPhamModel;

class ProductController extends BaseController{
    public function index(){
        $products = SanPhamModel::all();
        //lấy thông tin message
        $message = $_COOKIE['mesage']??"";
        return $this->viewadmin(
            "admin/products/list",
            ["products"=>$products ,"message" => $message]
        );
    }
    public function create(){
        $categories = DanhMucModel::all();
        return $this->viewadmin(
            "admin/products/add",
            ["categories"=>$categories]
        );
    }
    public function edit(){
        $ma_sp = $_GET['ma_sp'];
        $pro = SanPhamModel::find($ma_sp);
        $categories = DanhMucModel::all();
        return $this->viewadmin(
            "admin/products/edit",
            [
                "categories"=>$categories,
                "pro"=>$pro
            ]
        );
    }
    public function storeEdit(){
        $ma_sp =$_GET['ma_sp'];
        $data = $_POST;
        //xủ lý ảnh
        $file = $_FILES['hinh'];
        //kiểm tra xem người dùng có thêm ảnh mới vào hay không 
        if($file['size']>0){
            //lấy tên ảnh
            $hinh = $file['name'];
            move_uploaded_file($file['tmp_name'], "images/" . $hinh);
            //thêm ảnh vào data 
            $data['hinh']=$hinh;
        }
        //update dữ liệu
        SanPhamModel::update($ma_sp, $data);
        header("Location: " . ROOT_PATH . "admin/product/list");
    }
    public function storeCreate(){
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
        header("Location: " . ROOT_PATH . "admin/product/list");
    }
}